<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_album_model extends CI_Model {

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
		$current_id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('User_Albums');
		$this->db->where('user_id',$current_id);

		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */