<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_model extends CI_Model {

	function create($band) {
		$this->db->insert('Bands',$band);
	}

	// Check if band name is exist.
	function is_exist($bandname) {
		$result = 0;
		$this->db->or_where('name', $bandname);
		$query = $this->db->get('Bands');
		if ($query->num_rows() > 0) {
			$result = 1;
		}
		else {
			$result = 0;
		}

		return $result;
	}

	function edit($band) {
		$this->db->where('name', $band['name']);
		$this->db->update('Bands', $band);
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

	function get($band_id){
		$this->db->select('*');
		$this->db->from('Bands');
		$this->db->where('id',$band_id);

		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file band_model.php */
/* Location: ./application/models/band_model.php */