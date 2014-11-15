<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {

	function add($band) {
		$this->db->insert('Bands', $band);
	}

	
	function music($words){
		$query = $this->db->query('
			SELECT User_Music.id as musicid,User_Music.name as musicname,User_Albums.image_url
			FROM User_Music
			JOIN User_Albums ON User_Albums.id = User_Music.album_id
			JOIN Users ON Users.id = User_Albums.user_id
			WHERE User_Music.name LIKE \'%'.$words.'%\' 

			UNION ALL
			SELECT Band_Music.id as musicid,Band_Music.name as musicname,Band_Albums.image_url
			FROM Band_Music
			JOIN Band_Albums ON Band_Albums.id = Band_Music.album_id
			JOIN Bands ON Bands.id = Band_Albums.band_id
			WHERE Band_Music.name LIKE  \'%'.$words.'%\'');
		return $query->result();
	}

	function user($words){
		$query = $this->db->query('
			SELECT id,name,surname,photo_url
			FROM Users
			WHERE Users.name LIKE \'%'.$words.'%\'  or Users.surname LIKE \'%'.$words.'%\'');
		return $query->result();
	}

	function band($words){
		$query = $this->db->query('
			SELECT id,name,photo_url
			FROM Bands
			WHERE Bands.name LIKE \'%'.$words.'%\'
		');
		return $query->result();
	}

	function album($words){
		$query = $this->db->query('
			SELECT User_Albums.id as albumid,User_Albums.name as albumname,User_Albums.image_url
			FROM User_Albums
			JOIN Users ON Users.id = User_Albums.user_id
			WHERE User_Albums.name LIKE \'%'.$words.'%\'

			UNION ALL

			SELECT Band_Albums.id as albumid,Band_Albums.name as albumname,Band_Albums.image_url
			FROM Band_Albums 
			JOIN Bands ON Bands.id = Band_Albums.band_id
			WHERE Band_Albums.name LIKE \'%'.$words.'%\'');
		return $query->result();
	}


}

/* End of file band_model.php */
/* Location: ./application/models/band_model.php */