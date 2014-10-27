<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postcomment_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function add($data){
		$this->db->insert('Post_Comments',$data);
	}

	function delete($pcomment_id){
		$this->db->delete('Greedd',$pcomment_id);
	}

	function getComment($post_id){
		$this->db->select('Post_Comments.comment,Post_Comments.timestamp,Users.name,Users.username,Users.surname,Users.photo_url');
		$this->db->from('Post_Comments');
		$this->db->join('Users', 'Post_Comments.user_id = Users.id');
		$this->db->where('post_id',$post_id);
		$this->db->order_by("Post_Comments.timestamp", "asc"); 


		$query = $this->db->get();
		return $query->result();
	}

	function countComment($post_id){
		$this->db->select('*');
		$this->db->from('Post_Comments');
		$this->db->where('post_id',$post_id);

		$query = $this->db->get();
		return $query->num_rows();
	}

}
