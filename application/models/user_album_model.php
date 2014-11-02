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

	function edit($data,$album_id){
		$this->db->where('id',$album_id);
		$this->db->update('User_Albums',$data);
	}

	function getAll(){
		$current_id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('User_Albums');
		$this->db->where('user_id',$current_id);

		$query = $this->db->get();
		return $query->result();
	}

	function getAlbum($album_id){
		$this->db->select('*');
		$this->db->from('User_Albums');
		$this->db->where('id',$album_id);

		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */