<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employment_model extends CI_Model {

	function get_request($job_id){
		$query = $this->db->query('SELECT job_id, user_id, Employment.status, Users.id, name, surname, photo_url, 1 AS type 
			FROM Employment 
			JOIN Users ON Users.id = Employment.user_id 
			WHERE Employment.job_id = '.$job_id.' 
			UNION 
			SELECT job_id, band_id, Band_Employment.status, Bands.id, Bands.name, \'\', photo_url, 2 AS type 
			FROM Band_Employment 
			JOIN Bands ON Bands.id = Band_Employment.band_id 
			WHERE Band_Employment.job_id = '.$job_id);
		$result = $query->result();

		return $result;
	}

	// requested = 1, confirmed = 2, rejected = 3
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

}

/* End of file employment_model.php */
/* Location: ./application/models/employment_model.php */