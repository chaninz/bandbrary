<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join_band_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	// requested = 1, joined = 2, leaved =4
	function get($id, $user_type, $status) {
		$this->db->join('Bands', 'Bands.id = Join_Band.band_id');
		if ($user_type == 1) {
			$query = $this->db->get_where('Join_Band', array('user_id' => $id,
				'status' => $status));
		} elseif ($user_type == 2) {
			$query = $this->db->get_where('Join_Band', array('band_id' => $id,
				'status' => $status));
		}
		$result = $query->row();

		return $result;
	}

	function get_by_user($user_id, $status) {
		// Get user and band details from user_id
		return $this->get($user_id, 1, $status);
	}

	function get_by_band($band_id, $status) {
		// Get band members and band details from band_id 
		return $this->get($user_id, 2, $status);
	}

	function get_current_band($user_id) {
		return $this->get_by_user($user_id, 2);
	}

	function get_current_member($band_id) {
		return $this->get_by_band($band_id, 2);
	}

	function get_band($user_id){
		$this->db->select('*');
		$this->db->from('Join_Band');
		$this->db->join('Bands', 'Bands.id = Join_Band.band_id');
		$this->db->where('user_id',$user_id);

		$query = $this->db->get();
		return $query->row();
	}

	function getMember($band_id){
		$this->db->select('*');
		$this->db->from('Join_Band');
		$this->db->where('band_id',$band_id);

		$query = $this->db->get();
		return $query->row();
	}

	// requested = 1, joined = 2, leaved =4
	function join($data) {
		$user_status = $this->check_user_status($data['user_id'], $data['band_id']);
		if ($user_status == 0) {
			// if never join
			$this->db->insert('Join_Band', $data);
		} elseif ($user_status == 4) {
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

	function accept($user, $band) {
		$this->set_status($user, $band, 2);
	}

	function reject($user, $band) {
		$this->set_status($user, $band, 3);
	}

	function leave($user, $band) {
		$this->set_status($user, $band, 4);
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

	function check_user_status($user, $band) {
		$result = 0;
		$query = $this->db->get_where('Join_Band', array('user_id' => $user,
			'band_id' => $band));
		if ($query->num_rows() == 0) {
			return $result;
		} else {
			$result = $query->row()->status;
			return $result;
		}
	}
}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */