<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Greedd_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function add($data){
		$this->db->insert('Greedd',$data);	
	}
	
	function getPost(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Band_Posts');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->row();
	}

	function delete($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->delete('Greedd',$data);
	}

	function countGreedd(){
		$this->db->select('COUNT (*)');
		$this->db->from('Greedd');
		$this->db->where('music_id',$music_id);
	}
}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */