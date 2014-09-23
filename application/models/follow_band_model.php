<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Follow_Band_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function follow($data){
		$this->db->insert('Follow_Bands',$data);	
	}
	
	function get_follow_band($band_id){
		$this->db->select('*');
		$this->db->from('Follow_Bands');
		$this->db->join('Users', 'Follow_Bands.user_id = Users.id');
		$this->db->where('follow_band',$band_id);
		$query = $this->db->get();
		return $query->result();
	}

	function unfollow($data){
		$id = $this->session->userdata('id');
		$this->db->where('user_id',$id);
		$this->db->delete('Follow_Bands',$data);
	}

	function countFollow(){
		$this->db->select('COUNT (*)');
		$this->db->from('Follow_Bands');
		$this->db->where('music_id',$music_id);
	}

	function isFollow($band_id){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Follow_Bands');
		$this->db->where('follow_band',$band_id);
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_following_band($user_id){
		$this->db->select('*');
		$this->db->from('Follow_Bands');
		$this->db->join('Bands', 'Follow_Bands.follow_band = Bands.id');
		$this->db->where('user_id',$user_id);

		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */