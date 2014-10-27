<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function add($user_id, $status) {
		 $result = $this->db->insert('Status', array('user_id' => $user_id,
			'status' => $status));

		 return $result;
	}
	
	function get_by_user($user_id) {
		$this->db->order_by('timestamp DESC');
		$result = $this->db->get_where('Status', array('user_id' => $user_id));
		$result = $query->result();

		return $result;
	}

	function get_last($user_id) {
		$this->db->order_by('timestamp DESC');
		$query = $this->db->get_where('Status', array('user_id' => $user_id), 1, 0);
		$result = $query->row();

		return $result;
	}

//-------------------------

	function edit($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('Status',$data);
	}

}

/* End of file status_model.php */
/* Location: ./application/models/status_model.php */