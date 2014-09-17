<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model {

	function add($data){
		$this->db->insert('Band_Posts',$data);	
	}
	
	function getPost($data){
		$this->db->select('*');
		$this->db->from('Band_Posts');
		$this->db->where('id',$data);

		$query = $this->db->get();
		return $query->row();
	}

	function getAllPost($band_id){
		$this->db->select('*');
		$this->db->from('Band_Posts');
		$this->db->where('band_id',$band_id);

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