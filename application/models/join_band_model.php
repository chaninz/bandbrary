<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join_band_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	// requested = 1, joined = 2, leaved =4
	function get($id, $user_type, $status) {
		$this->db->select('*');
		$this->db->select('Positions.position AS position');
		$this->db->join('Positions', 'Positions.id = Join_Band.position');
		if ($user_type == 1) {
			$this->db->join('Bands', 'Bands.id = Join_Band.band_id');
			$query = $this->db->get_where('Join_Band', array('user_id' => $id,
				'Join_Band.status' => $status));
		} elseif ($user_type == 2) {
			$this->db->select('Users.id AS user_id');
			$this->db->join('Users', 'Users.id = Join_Band.user_id');
			$query = $this->db->get_where('Join_Band', array('band_id' => $id,
				'status' => $status));
		}
		$result = $query->result();
		
		return $result;
	}

	function get_by_user($user_id, $status) {
		// Get user and band details from user_id
		return $this->get($user_id, 1, $status);
	}

	function get_by_band($band_id, $status) {
		// Get band members and band details from band_id 
		return $this->get($band_id, 2, $status);
	}

	function get_current_band($user_id) {
		$result = $this->get_by_user($user_id, 2);
		if ($result) {
			return $this->get_by_user($user_id, 2)[0];
		} else {
			return $result;
		}
	}

	function get_current_member($band_id) {
		return $this->get_by_band($band_id, 2);
	}

	function get_join_request($band_id) {
		return $this->get_by_band($band_id, 1);
	}
 
	function get_band($user_id){
		$this->db->select('*');
		$this->db->from('Join_Band');
		$this->db->join('Bands', 'Bands.id = Join_Band.band_id');
		$this->db->get_where('user_id',$user_id);

		$query = $this->db->get();
		return $query->row();
	}

	// requested = 1, joined = 2, rejectd = 3, leaved =4,
	function join($data) {
		$user_status = $this->get_user_status_num($data['user_id'], $data['band_id']);
		if ($user_status == 0) {
			// if never join
			$this->db->insert('Join_Band', $data);
		} elseif ($user_status == 3 || $user_status == 4) {
			// if leaved
			$this->set_status($data['user_id'], $data['band_id'], 1);
		} else {
			// if joining other band
			return -1;
		}
	}

	function set_status($user, $band, $status) {
		$this->db->where('user_id', $user);
		$this->db->where('band_id', $band);
		$this->db->update('Join_Band', array('status' => $status));
	}

	function cancel($user, $band) {
		$this->set_status($user, $band, 3);
	}

	function accept($user, $band) {
		$this->db->where('user_id', $user);
		$this->db->where('band_id', $band);
		$this->db->update('Join_Band', array('status' => 2,
				'join_date' => mdate("%Y-%m-%d", now()),
				'leave_date' => NULL));
	}

	function reject($user, $band) {
		$this->set_status($user, $band, 3);
	}

	function leave($user, $band) {
		$this->db->where('user_id', $user);
		$this->db->where('band_id', $band);
		$this->db->update('Join_Band', array('status' => 4,
				'leave_date' => mdate("%Y-%m-%d", now())));
	}

	function set_master($user, $band, $is_master) {
		$this->db->where('user_id', $user);
		$this->db->where('band_id', $band);
		$this->db->update('Join_Band', array('is_master' => $is_master));
	}

	function master($user, $band) {
		$this->set_master($user, $band, 1);
	}

	function unmaster($user, $band) {
		$this->set_master($user, $band, 0);
	}

	function get_user_status($user, $band) {
		$result = 0;
		$this->db->join('Positions', 'Positions.id = Join_Band.position');
		$query = $this->db->get_where('Join_Band', array('user_id' => $user,
			'band_id' => $band));
		if ($query->num_rows() == 0) {
			return;
		} else {
			$result = $query->row();
		}

		return $result;
	}

	function get_user_status_num($user, $band) {
		$result = 0;
		$query = $this->db->get_where('Join_Band', array('user_id' => $user,
			'band_id' => $band));
		if ($query->num_rows() == 0) {
			return;
		} else {
			$result = $query->row()->status;
		}

		return $result;
	}

	function get_joining($user_id) {
		$query = $this->db->get_where('Join_Band', array('user_id' => $user_id,
			'status' => 2));
		$result = $query->result();

		return $result;
	}

	function get_join_all($user_id) {
		$this->db->select('Bands.name, leave_date');
		$this->db->order_by('leave_date DESC');
		$this->db->join('Bands', 'Bands.id = Join_Band.band_id');
		$this->db->where('leave_date IS NOT NULL');
		$query = $this->db->get_where('Join_Band', array('user_id' => $user_id));
		$result = $query->result();

		return $result;
	}

	function get_band_master($band_id){
		$this->db->select('user_id');
		$this->db->from('Join_Band');
		$this->db->where('band_id',$band_id);
		$this->db->where('is_master',1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function get_joiner_band($band_id){
		$this->db->select('user_id');
		$this->db->from('Join_Band');
		$this->db->where('band_id',$band_id);
		$this->db->where('status',1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function get_member_band($band_id){
		$id = $this->session->userdata('id');
		$this->db->select('user_id');
		$this->db->from('Join_Band');
		$this->db->where('band_id',$band_id);
		$this->db->where('status',2);
		$this->db->where('user_id !=', (int)$id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */