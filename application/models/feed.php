<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class feed extends CI_Model {

	function getMusic(){
		$current_id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Band_Music');
		$this->db->where('id',$music_id);

		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */