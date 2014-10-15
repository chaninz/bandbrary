<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_All_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	

	function get_all_report(){
		$this->db->select('Report_Band.*,Users.name as username,Bands.name as bandname');
		$this->db->from('Report_Band');
		$this->db->join('Users', 'Report_Band.user_report = Users.id');
		$this->db->join('Bands', 'Report_Band.band_id = Bands.id');
		$this->db->order_by("timestamp", "desc"); 
		$query = $this->db->get();
		return $query->result();
	}	

	function get_approved_report(){
		$this->db->select('*');
		$this->db->from('Report_Band');
		$this->db->join('Users', 'Report_Band.user_report = Users.id');
		$this->db->join('Bands', 'Report_Band.band_id = Bands.id');
		$this->db->where('status',2);
		$this->db->order_by("timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}

	function get_not_approve_report(){
		$this->db->select('*');
		$this->db->from('Report_Band');
		$this->db->join('Users', 'Report_Band.user_report = Users.id');
		$this->db->join('Bands', 'Report_Band.band_id = Bands.id');
		$this->db->where('status',1);
		$this->db->order_by("timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}
	function countReport(){
		$this->db->select('COUNT (*)');
		$this->db->from('Report_Band');
		$this->db->where('status',1);
		// 1 is waiting admin approve
		// for admin check thier job
	} 

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */