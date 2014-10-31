<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_music_model extends CI_Model {
	function upload($data) {
		$this->db->insert('User_Music', $data);
	}

}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */