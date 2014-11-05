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


	function getNewMusic(){
		$query = $this->db->query('
		SELECT Bands.name,Band_Music.name,Band_Music.timestamp AS bandtime
		FROM `Band_Music`
		JOIN Band_Albums ON  Band_Albums.id = Band_Music.album_id
		JOIN Bands on Bands.id = Band_Albums.band_id
		UNION ALL
		SELECT Users.name,User_Music.name,User_Music.timestamp
		FROM `User_Music` 
		JOIN User_Albums ON  User_Albums.id = User_Music.album_id
		JOIN Users on Users.id = User_Albums.user_id
		ORDER BY bandtime desc
		LIMIT 0,10');
		return $query->result();
	}
		

	

}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */