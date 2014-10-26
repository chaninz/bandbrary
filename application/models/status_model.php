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
	
	function get_last($user_id) {
		$this->db->order_by('timestamp DESC');
		$query = $this->db->get_where('Status', array('user_id' => $user_id), 1, 0);
		$result = $query->row();

		return $result;
	}

	// function getStatus(){
	// 	$id = $this->session->userdata('id');
	// 	$this->db->select('*');
	// 	$this->db->from('Status');
	// 	$this->db->where('id',$id);

	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	function edit($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('Status',$data);
	}

}

/* End of file band_model.php */
/* Location: ./application/models/band_model.php */