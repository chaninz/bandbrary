<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_music_model extends CI_Model {

	function add($data) {
		$this->db->insert('User_Music', $data);
	}
	function delete($music_id){
		$this->db->where('id',$music_id);
		$this->db->delete('User_Music');
	}

	function edit($data,$music_id){
		$this->db->where('id',$music_id);
		$this->db->update('User_Music',$data);
	}

	function get($music_id) {
		$this->db->select('*');
		$this->db->select('User_Music.id AS id');
		$this->db->select('User_Music.name AS name');
		$this->db->select('User_Albums.name AS album_name');
		$this->db->select('User_Music.timestamp AS upload_date');
		$this->db->join('User_Albums', 'User_Albums.id = User_Music.album_id');
		$query = $this->db->get_where('User_Music', array('User_Music.id' => $music_id));
		$result = $query->row();

		return $result;
	}

	function get_by_id($music_id) {
		$query = $this->db->get_where('User_Music', array('User_Music.id' => $music_id));
		$result = $query->row();

		return $result;
	}

	function get_by_album($album_id) {
		$this->db->select('*');
		$this->db->select('User_Music.id AS id');
		$this->db->select('User_Music.name AS name');
		$this->db->select('User_Albums.name AS album_name');
		$this->db->select('User_Music.timestamp AS upload_date');
		$this->db->join('User_Albums', 'User_Albums.id = User_Music.album_id');
		$query = $this->db->get_where('User_Music', array('User_Music.album_id' => $album_id));
		$result = $query->result();

		return $result;
	}

	function getMusician($music_id){
		$id = $this->session->userdata('id');
		$this->db->select('Users.id');
		$this->db->from('User_Music');
		$this->db->join('User_Albums', 'User_Albums.id = User_Music.album_id');
		$this->db->join('Users', 'Users.id = User_Albums.user_id');
		$this->db->where('User_Music.id',$music_id);
		$this->db->where('User_Albums.user_id !=', (int)$id);

		$query = $this->db->get();
		return $query->row();
	}

	function get_new_music(){
		$query = $this->db->query('SELECT User_Music.id, User_Music.name, Users.name AS artist, User_Albums.image_url, User_Music.timestamp, 1 AS type
			FROM User_Music 
			JOIN User_Albums ON User_Albums.id = User_Music.album_id
			JOIN Users ON Users.id = User_Albums.user_id
			UNION ALL
			SELECT Band_Music.id, Band_Music.name, Bands.name AS artist, Band_Albums.image_url, Band_Music.timestamp, 2 AS type
			FROM Band_Music
			JOIN Band_Albums ON  Band_Albums.id = Band_Music.album_id
			JOIN Bands ON Bands.id = Band_Albums.band_id
			ORDER BY timestamp DESC
			LIMIT 0, 10');
		$result = $query->result();

		return $result;
	}

	function get_recommended_music(){
		$query = $this->db->query('SELECT *
			FROM (SELECT User_Music.id, User_Music.name, Users.name AS artist, User_Albums.image_url, User_Music.timestamp, 1 AS type
				FROM User_Music 
				JOIN User_Albums ON User_Albums.id = User_Music.album_id
				JOIN Users ON Users.id = User_Albums.user_id
				UNION ALL
				SELECT Band_Music.id, Band_Music.name, Bands.name AS artist, Band_Albums.image_url, Band_Music.timestamp, 2 AS type
				FROM Band_Music
				JOIN Band_Albums ON  Band_Albums.id = Band_Music.album_id
				JOIN Bands ON Bands.id = Band_Albums.band_id
				ORDER BY RAND()
				LIMIT 0, 12) AS recommended
			ORDER BY timestamp');
		$result = $query->result();

		return $result;
	}

}

/* End of file user_music_model.php */
/* Location: ./application/models/user_music_model.php */