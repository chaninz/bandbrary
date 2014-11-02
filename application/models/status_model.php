<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function add_user_status($user_id, $status) {
		 $result = $this->db->insert('User_Status', array('user_id' => $user_id,
			'status' => $status));

		 return $result;
	}

	function add_band_status($band_id, $status) {
		 $result = $this->db->insert('Band_Status', array('band_id' => $band_id,
			'status' => $status));

		 return $result;
	}
	
	function get_by_user($user_id) {
		$this->db->order_by('timestamp DESC');
		$query = $this->db->get_where('User_Status', array('user_id' => $user_id));
		$result = $query->result();

		return $result;
	}

	function get_by_band($band_id) {
		$this->db->order_by('timestamp DESC');
		$query = $this->db->get_where('Band_Status', array('band_id' => $band_id));
		$result = $query->result();

		return $result;
	}

	function get_last_by_user($user_id) {
		$this->db->order_by('timestamp DESC');
		$query = $this->db->get_where('User_Status', array('user_id' => $user_id), 1, 0);
		$result = $query->row();

		return $result;
	}

	function get_last_by_band($band_id) {
		$this->db->order_by('timestamp DESC');
		$query = $this->db->get_where('Band_Status', array('band_id' => $band_id), 1, 0);
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