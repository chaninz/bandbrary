<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Greedd_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function greedd_user_music($data){
		$this->db->insert('Greedd_User_Music',$data);	
	}

	function greedd_band_music($data){
		$this->db->insert('Greedd_Band_Music',$data);	
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

	function topGreeddUserMusic(){
		$query = $this->db->query('
			SELECT count(*) AS count ,Greedd_User_Music.music_id,User_Music.name 
			FROM `Greedd_User_Music`
            Join User_Music on User_Music.id = Greedd_User_Music.music_id
			GROUP by music_id
			ORDER by count desc
			LIMIT 0,5
		');
		return $query->result();
	}

	function topGreeddBandMusic(){
		$query = $this->db->query('
			SELECT count(*) AS count ,Greedd_Band_Music.music_id,Band_Music.name 
			FROM `Greedd_Band_Music`
            Join Band_Music on Band_Music.id = Greedd_Band_Music.music_id
			GROUP by music_id
			ORDER by count desc
			LIMIT 0,5
		');
		return $query->result();
	}

	function topGreeddMusic(){
			$query = $this->db->query('
			SELECT count(*) AS count ,Greedd_User_Music.music_id,User_Music.name as musicname ,Users.name
			FROM `Greedd_User_Music`
            Join User_Music on User_Music.id = Greedd_User_Music.music_id
            JOIN User_Albums ON  User_Albums.id = User_Music.album_id
			JOIN Users on Users.id = User_Albums.user_id
			GROUP by music_id
			UNION ALL
			SELECT count(*),Greedd_Band_Music.music_id,Band_Music.name as musicname,Bands.name
			FROM `Greedd_Band_Music`
            Join Band_Music on Band_Music.id = Greedd_Band_Music.music_id
            JOIN Band_Albums ON  Band_Albums.id = Band_Music.album_id
			JOIN Bands on Bands.id = Band_Albums.band_id
			GROUP by music_id
			ORDER by count desc
			LIMIT 0,5
			');
		return $query->result();
	}
}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */