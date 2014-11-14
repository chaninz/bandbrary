<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_music_model extends CI_Model {

	function add($data) {
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

	function get($music_id) {
		$this->db->select('*');
		$this->db->select('Band_Music.id AS id');
		$this->db->select('Band_Music.name AS name');
		$this->db->select('Band_Albums.name AS album_name');
		$this->db->select('Band_Music.timestamp AS upload_date');
		$this->db->join('Band_Albums', 'Band_Albums.id = Band_Music.album_id');
		$query = $this->db->get_where('Band_Music', array('Band_Music.id' => $music_id));
		$result = $query->row();

		return $result;
	}

	function get_by_id($music_id){
		$query = $this->db->get_where('Band_Music', array('Band_Music.id' => $music_id));
		$result = $query->row();

		return $result;
	}

	function get_band($music_id){
		$this->db->select('Bands.id');
		$this->db->from('Band_Music');
		$this->db->join('Band_Albums', 'Band_Albums.id = Band_Music.album_id');
		$this->db->join('Bands', 'Bands.id = Band_Albums.band_id');
		$this->db->where('Band_Music.id', $music_id);

		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */