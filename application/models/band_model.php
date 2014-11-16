<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_model extends CI_Model {

	function add($band) {
		$this->db->insert('Bands', $band);
	}

	function is_exist($bandname) {
		// Check if band name is exist.
		$result = 0;
		$this->db->where('name', $bandname);
		$query = $this->db->get('Bands');
		if ($query->num_rows() > 0) {
			$result = 1;
		}
		else {
			$result = 0;
		}

		return $result;
	}

	function edit($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('Bands', $data);
	}
	
	function get($band_id){
		$this->db->select('*');
		$this->db->select('Bands.id AS id');
		$this->db->join('Styles', 'Bands.style_id = Styles.id');
		$this->db->join('Provinces', 'Bands.province_id = Provinces.id');
		$query = $this->db->get_where('Bands', array('Bands.id' => $band_id));
		$result = $query->row();

		return $result;
	}

	function get_by_name($bandname) {
		$this->db->where('name', $bandname);
		$query = $this->db->get('Bands');
		$result = $query->row();

		return $result;
	}

	function close_join($band_id) {
		$this->db->where('id', $band_id);
		$this->db->update('Bands', array('status' => 0));
	}

	function open_join($band_id) {
		$this->db->where('id', $band_id);
		$this->db->update('Bands', array('status' => 1));
	}

	function timeline($band_id){
			$query = $this->db->query('
		SELECT Band_Status.id,Band_Status.status as text,Band_Status.timestamp,"Status" as type,Bands.name as bandname
		FROM Band_Status
		JOIN Bands ON Band_Status.band_id = Bands.id
		WHERE Bands.id = '.$band_id.'
		
		union all
	
		SELECT Band_Music.id,Band_Music.name as text,Band_Music.timestamp,"Music" as type,Bands.name as bandname
		FROM Band_Music
		JOIN Band_Albums on Band_Music.album_id = Band_Albums.id
		JOIN Bands ON Band_Albums.band_id = Bands.id
		WHERE Bands.id = '.$band_id.'
		
		union all
	
		SELECT Band_Posts.id,Band_Posts.topic as text,Band_Posts.timestamp,"Post" as type,Bands.name as bandname
    	FROM Band_Posts
        JOIN Bands ON Band_Posts.band_id = Bands.id
		WHERE Bands.id = '.$band_id.'

		ORDER BY timestamp desc');
		return $query->result();
	}

	function get_count_timeline($band_id){
			$query = $this->db->query('SELECT COUNT(*) AS count 
		FROM (SELECT Band_Status.id,Band_Status.status as text,Band_Status.timestamp,"Status" as type,Bands.name as bandname
		FROM Band_Status
		JOIN Bands ON Band_Status.band_id = Bands.id
		WHERE Bands.id = '.$band_id.'
		
		union all
	
		SELECT Band_Music.id,Band_Music.name as text,Band_Music.timestamp,"Music" as type,Bands.name as bandname
		FROM Band_Music
		JOIN Band_Albums on Band_Music.album_id = Band_Albums.id
		JOIN Bands ON Band_Albums.band_id = Bands.id
		WHERE Bands.id = '.$band_id.'
		
		union all
	
		SELECT Band_Posts.id,Band_Posts.topic as text,Band_Posts.timestamp,"Post" as type,Bands.name as bandname
    	FROM Band_Posts
        JOIN Bands ON Band_Posts.band_id = Bands.id
		WHERE Bands.id = '.$band_id.') AS timeline');
		return $query->row()->count;
	}

	function get_suggestion($user_id) {
		$query = $this->db->query('SELECT Bands.id, Bands.name, Bands.photo_url
			FROM Bands
			JOIN Users ON Users.province_id = Bands.province_id
			JOIN Has_Styles ON Has_Styles.style_id = Bands.style_id
			WHERE Has_Styles.user_id = ' . $user_id . ' AND Users.id = ' . $user_id . '
			ORDER BY RAND() 
			LIMIT 0, 3');
		$result = $query->result();

		return $result;
	}

}

/* End of file band_model.php */
/* Location: ./application/models/band_model.php */