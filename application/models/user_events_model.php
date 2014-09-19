<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_events_model extends CI_Model {

	function add($data){
	}
	
	function getEvent($event_id){
		$this->db->select('*');
		$this->db->from('User_Events');
		$this->db->where('id',$event_id);

		$query = $this->db->get();
		return $query->row();
	}

	function getAll($id){
		$this->db->select('*');
		$this->db->from('User_Events');
		$this->db->where('user_id',$id);

		$query = $this->db->get();
		return $query->result();
	}

	function editPost($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('Band_Posts',$data);
	}

	function deletePost($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->delete('Band_Posts',$data);
	}

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */