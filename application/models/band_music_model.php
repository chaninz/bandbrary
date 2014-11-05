<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_music_model extends CI_Model {
	function upload($data) {
		$this->db->insert('Band_Music', $data);
	}
	function delete($music_id){
		$this->db->where('id',$music_id);
		$this->db->delete('User_Music');
	}

	function edit($data,$music_id){
		$this->db->where('id',$music_id);
		$this->db->update('Band_Music',$data);
	}

	function getMusic($music_id){
		$this->db->select('*');
		$this->db->from('Band_Music');
		$this->db->where('id',$music_id);

		$query = $this->db->get();
		return $query->row();
	}

	

}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */