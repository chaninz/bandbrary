<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music_model extends CI_Model {
	function upload($band) {
		$this->db->insert('Music', $band);
	}

}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */