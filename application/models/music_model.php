<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music_Model extends CI_Model {

	function createAlbum(){
		$this->db->insert('Albums',$data);
	}
	function deleteAlbum($data){
		$this->db->delete('Albums',$data);
	}

}

/* End of file music_model.php */
/* Location: ./application/models/music_model.php */