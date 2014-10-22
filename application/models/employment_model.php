<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employment_model extends CI_Model {

	function get_request($job_id){
		$this->db->join('Users', 'Users.id = Employment.user_id');
		$query = $this->db->get_where('Employment', array('Employment.job_id' => $job_id));
		$result = $query->result();

		return $result;
	}

	// requested = 1, accpeted = 2, rejected = 3
	function request($job_id, $user_id) {
		$this->db->insert('Employment', array('job_id' => $job_id,
			'user_id' => $user_id,
			'status' => 1));
	}

	function cancel($job_id, $user_id) {
		$this->db->delete('Employment', array('job_id' => $job_id,
			'user_id' => $user_id));
	}

	function set_status($job_id, $user_id, $status) {
		$this->db->where(array('job_id' => $job_id,
			'user_id' => $user_id));
		$this->db->update('Employment', array('status' => $status));
	}

	function accept($job_id, $user_id) {
		$this->set_status($job_id, $user_id, 2);
	}

	function reject($job_id, $user_id) {
		$this->set_status($job_id, $user_id, 3);
	}

	function reset($job_id, $user_id) {
		$this->set_status($job_id, $user_id, 1);
	}

	function get_status($job_id, $user_id) {
		$result = 0;
		$query = $this->db->get_where('Employment', array('job_id' => $job_id,
			'user_id' => $user_id));
		if ($query->num_rows() == 0) {
			$result = 0;
		} else {
			$result = $query->row()->status;
		}

		return $result;
	}
// -------------------------------------
	function join($data) {
		$user_status = $this->get_user_status($data['user_id'], $data['band_id']);
		if ($user_status == 0) {
			// if never join
			$this->db->insert('Employment', $data);
		} elseif ($user_status == 3 || $user_status == 4) {
			// if leaved
			$this->set_status($data['user_id'], $data['band_id'], 1);
		} else {
			// if joining other band
			return -1;
		}
	}
}

/* End of file employment_model.php */
/* Location: ./application/models/employment_model.php */