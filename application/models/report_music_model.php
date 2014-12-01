<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_Music_model extends CI_Model {

	function add($data){
		$this->db->insert('Report_Music_User',$data);
	}

	function report_user_music($data) {
		$this->db->insert('Report_Music_User', $data);
	}

	function report_band_music($data) {
		$this->db->insert('Report_Music_Band', $data);
	}

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */