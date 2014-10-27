<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_User_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function add($data){
		$this->db->insert('Report_User',$data);
	}


	function getUsername($user_id){
		$this->db->select('Users.username');
		$this->db->from('Report_User');
		$this->db->join('Users', 'Users.id = Report_User.user_id');
		$this->db->where('Report_User.user_id',$user_id);

		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */