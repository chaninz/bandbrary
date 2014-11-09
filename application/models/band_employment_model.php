<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_employment_model extends CI_Model {

	// requested = 1, confirmed = 2, rejected = 3
	function request($job_id, $band_id) {
		$this->db->insert('Band_Employment', array('job_id' => $job_id,
			'band_id' => $band_id,
			'status' => 1));
	}

	function cancel($job_id, $band_id) {
		$this->db->delete('Band_Employment', array('job_id' => $job_id,
			'band_id' => $band_id));
	}

	function set_status($job_id, $band_id, $status) {
		$this->db->where(array('job_id' => $job_id,
			'band_id' => $band_id));
		$this->db->update('Band_Employment', array('status' => $status));
	}

	function accept($job_id, $band_id) {
		$this->set_status($job_id, $band_id, 2);
	}

	function reject($job_id, $band_id) {
		$this->set_status($job_id, $band_id, 3);
	}

	function reset($job_id, $band_id) {
		$this->set_status($job_id, $band_id, 1);
	}

	function get_status($job_id, $band_id) {
		$result = 0;
		$query = $this->db->get_where('Band_Employment', array('job_id' => $job_id,
			'band_id' => $band_id));
		if ($query->num_rows() == 0) {
			$result = 0;
		} else {
			$result = $query->row()->status;
		}

		return $result;
	}

}

/* End of file band_employment_model.php */
/* Location: ./application/models/band_employment_model.php */