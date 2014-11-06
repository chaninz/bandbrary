<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Receive_noti_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}


	function add($data) {
		$this->db->insert_batch('Receive_Noti', $data);
		
	}
	function addOnce($data) {
		$this->db->insert('Receive_Noti', $data);
		
	}

	function getReceive_NotiUser(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Receive_Noti');
		$this->db->where('user_id',$id);

		$query = $this->db->get();
		return $query->result();
	}

	function getReceive_NotiMaster(){
		$band_id = $this->session->userdata('band_id');
		$this->db->select('*');
		$this->db->from('Receive_Noti');
		$this->db->where('band_id',$band_id);
		$this->db->or_where('user_id',$user_id);

		$query = $this->db->get();
		return $query->result();
	}

	function is_Master(){
		$user_id = $this->session->userdata('id');
		$band_id = $this->session->userdata('band_id');

		$this->db->select('is_master');
		$this->db->from('Join_Band');
		$this->db->where('band_id',$band_id);
		$this->db->where('user_id',$user_id);

		$query = $this->db->get();
		return $query->row();
	}


}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */