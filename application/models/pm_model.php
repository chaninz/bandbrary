<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function add($data){
		$this->db->insert('PM_Users',$data);	
	}
	
	function view($target_user){
		$current_id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('PM_Users');
		$this->db->where('from_user_id',$current_id);
		$this->db->where('to_user_id',$target_user);
		$this->db->order_by("timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}

	function delete($data){
		$current_id = $this->session->userdata('id');
		$this->db->where('id',$current_id);
		$this->db->delete('Greedd',$data);
	}

	function AllChat(){
		$current_id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('PM_Users');
		$this->db->join('Users', 'PM_Users.from_user_id = Users.id');
		$this->db->where('to_user_id',$target_user);
		$this->db->where('from_user_id',$current_id);

		$query = $this->db->get();
		return $query->result();
	}
	
}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */