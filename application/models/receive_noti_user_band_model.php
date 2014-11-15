<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Receive_noti_user_band_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();  
	}

	function add($data) {
		$this->db->insert_batch('Receive_Noti_User_Band', $data);
		
	}

	function getReceive_NotiBand(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Receive_Noti_User_Band');
		$this->db->join('PM_Bands', 'Receive_Noti_User_Band.receive_id = PM_Bands.id');
		$this->db->where('Receive_Noti_User_Band.user_id',$id);

		$query = $this->db->get();
		return $query->result();
	}


	function get_total_noti_band(){
		$id = $this->session->userdata('id');
		$band_id = $this->session->userdata('band_id');
		$this->db->select('*');
		$this->db->from('Receive_Noti_User_Band');
		$this->db->where('user_id',$id);
		$this->db->where('band_id',$band_id);
		$this->db->where('seen_date is null',null,false);

		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_total_noti_PM(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Receive_Noti_User_Band');
		$this->db->where('user_id',$id);
		$this->db->where('seen_date is null',null,false);

		$query = $this->db->get();
		return $query->num_rows();
	}

	 function seenUserAndBandPm($pm_group_id){		
	 	$user_id = $this->session->userdata('id');
	 	$sql = "
	 	UPDATE Receive_Noti_User_Band r 
join PM_User_And_Band p ON r.receive_id= p.id 
SET seen_date = '".date('Y-m-d H:i:s', now())."'
WHERE r.user_id = ".$user_id." and p.pm_group_id =".$pm_group_id;
		$this->db->query($sql);

	}
}