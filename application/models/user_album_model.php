<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_album_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function add($data) {
		$this->db->insert('User_Albums', $data);
	}

	function edit($id, $data){
		$this->db->where('id', $id);
		$this->db->update('User_Albums', $data);
	}

	function delete($id) {
		$this->db->delete('User_Albums', array('id' => $id));
	}	

	function get($album_id) {
		$query = $this->db->get_where('User_Albums', array('id' => $album_id));
		$result = $query->row();

		return $result;
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