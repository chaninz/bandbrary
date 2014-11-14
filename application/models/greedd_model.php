<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Greedd_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function greedd_user_music($user_id, $music_id){
		$this->db->insert('Greedd_User_Music', array('user_id' => $user_id,
			'music_id' => $music_id));	
	}

	function greedd_band_music($user_id, $music_id){
		$this->db->insert('Greedd_Band_Music', array('user_id' => $user_id,
			'music_id' => $music_id));	
	}

	function ungreedd_user_music($user_id, $music_id){
		$this->db->delete('Greedd_User_Music', array('user_id' => $user_id,
			'music_id' => $music_id));
	}

	function ungreedd_band_music($user_id, $music_id){
		$this->db->delete('Greedd_Band_Music', array('user_id' => $user_id,
			'music_id' => $music_id));	
	}

	function is_greedd_user_music($user_id, $music_id) {
		$query = $this->db->get_where('Greedd_User_Music', array('user_id' => $user_id,
			'music_id' => $music_id));
		$result = $query->row();

		return $result;
	}

	function is_greedd_band_music($user_id, $music_id) {
		$query = $this->db->get_where('Greedd_Band_Music', array('user_id' => $user_id,
			'music_id' => $music_id));
		$result = $query->row();

		return $result;
	}

	function count_greedd_user_music($music_id) {
		$this->db->select('COUNT(*) AS count');
		$query = $this->db->get_where('Greedd_User_Music', array('music_id' => $music_id));
		$result = $query->row()->count;

		return $result;
	}

	function count_greedd_band_music($music_id) {
		$this->db->select('COUNT(*) AS count');
		$query = $this->db->get_where('Greedd_Band_Music', array('music_id' => $music_id));
		$result = $query->row()->count;

		return $result;
	}

	function delete($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->delete('Greedd',$data);
	}

	function top_greedd_music() {
		$query = $this->db->query('SELECT Greedd_User_Music.music_id, User_Music.name AS name, Users.name AS artist, User_Albums.image_url, COUNT(*) AS count, 1 AS type
			FROM Greedd_User_Music 
			JOIN User_Music ON User_Music.id = Greedd_User_Music.music_id 
			JOIN User_Albums ON  User_Albums.id = User_Music.album_id
			JOIN Users ON Users.id = User_Albums.user_id
			GROUP BY music_id
			UNION ALL
			SELECT Greedd_Band_Music.music_id, Band_Music.name AS name, Bands.name AS artist, Band_Albums.image_url, COUNT(*) AS count, 2 AS type
			FROM Greedd_Band_Music
			JOIN Band_Music ON Band_Music.id = Greedd_Band_Music.music_id
			JOIN Band_Albums ON  Band_Albums.id = Band_Music.album_id
			JOIN Bands ON Bands.id = Band_Albums.band_id
			GROUP BY music_id
			ORDER BY count DESC
			LIMIT 0, 5');
		$result = $query->result();

		return $result;
	}

}

/* End of file greedd_model.php */
/* Location: ./application/models/greedd_model.php */