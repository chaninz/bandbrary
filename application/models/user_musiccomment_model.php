<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_musiccomment_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function add($data){
		$this->db->insert('User_Music_Comments',$data);
	}

	function delete($comment_id){
		$this->db->delete('User_Music_Comments',$pcomment_id);
	}

	function getComment($music_id){
		$this->db->select('User_Music_Comments.comment,User_Music_Comments.timestamp,Users.name,Users.username,Users.surname,Users.photo_url');
		$this->db->from('User_Music_Comments');
		$this->db->join('Users', 'User_Music_Comments.user_id = Users.id');
		$this->db->where('music_id',$music_id);
		$this->db->order_by("User_Music_Comments.timestamp", "asc"); 


		$query = $this->db->get();
		return $query->result();
	}

	 function countComment($music_id){
		$this->db->select('*');
		$this->db->from('User_Music_Comments');
		$this->db->where('music',$music_id);

		$query = $this->db->get();
		return $query->num_rows();
	}

}
