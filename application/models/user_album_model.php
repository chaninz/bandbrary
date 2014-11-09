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

	function get($id) {
		$query = $this->db->get_where('User_Albums', array('id' => $id));
		$result = $query->row();

		return $result;
	}

	function get_all() {
		$query = $this->db->get('User_Albums');
		$result = $query->result();

		return $result;
	}

	function get_by_user($user_id) {
		$query = $this->db->get_where('User_Albums', array('user_id' => $user_id));
		$result = $query->result();

		return $result;
	}

}

/* End of file user_album_model.php */
/* Location: ./application/models/user_album_model.php */