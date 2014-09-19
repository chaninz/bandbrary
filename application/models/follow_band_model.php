<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Follow_Band_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function follow($data){
		$this->db->insert('Follow_Bands',$data);	
	}
	
	function get_follow_band(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Band_Posts');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->row();
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
}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */