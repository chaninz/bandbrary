<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model {

	function addPost($data){
		$this->db->insert('Band_Posts',$data);	
	}
	
	function getPost(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Band_posts');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->row();
	}

	function editPost($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('Band_posts',$data);
	}

	function deletePost($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('Band_posts',$data);
	}

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */