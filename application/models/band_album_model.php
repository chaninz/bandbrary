<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_album_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function create($data) {
		$this->db->insert('User_Albums', $data);
	}
	function delete($data) {
		$this->db->delete('User_Albums', $data);
	}	
	function getAll(){
		$band_id = $this->session->userdata('band_id');
		$this->db->select('*');
		$this->db->from('Band_Albums');
		$this->db->where('band_id',$band_id);

		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */