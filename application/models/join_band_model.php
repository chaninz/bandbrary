<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join_band_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function get($id){
		$this->db->select('band_id');
		$this->db->from('Join_Band');
		$this->db->where('user_id',$id);

		$query = $this->db->get();
		return $query->row();
	}

	function get_band($id){
		$this->db->select('*');
		$this->db->from('Join_Band');
		$this->db->join('Bands', 'Bands.id = Join_Band.band_id');
		$this->db->where('user_id',$id);

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