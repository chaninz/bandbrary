<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_Post_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function add($data){
		$this->db->insert('Report_Post',$data);
	}

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */