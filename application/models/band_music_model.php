<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_music_model extends CI_Model {
	function upload($data) {
		$this->db->insert('Band_Music', $data);
	}

}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */