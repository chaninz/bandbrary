<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_format_model extends CI_Model {

	function get_all() {
		$query = $this->db->get('Job_Formats');
		$result = $query->result();

		return $result;
	}

}

/* End of file job_format_model.php */
/* Location: ./application/models/job_format_model.php */