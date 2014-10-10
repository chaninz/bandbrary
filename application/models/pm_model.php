<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function add($data){
		$this->db->insert('PM_Users',$data);	
	}
	
	function getMessage($target_user){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('PM_Users');
		$this->db->where('from_user_id',$id);
		$this->db->where('to_user_id',$target_user);

		$query = $this->db->get();
		return $query->row();
	}

	function delete($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->delete('Greedd',$data);
	}

	function countGreedd($music_id){
		$this->db->select('COUNT (*)');
		$this->db->from('Greedd');
		$this->db->where('music_id',$music_id);
	}
}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */