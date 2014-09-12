<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function create($data) {
		$this->db->insert('Albums', $data);
	}
	function delete($data) {
		$this->db->delete('Albums', $data);
	}	

}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */