<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_Post_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function approve($report_id){
		$this->db->where('id',$report_id);
		$this->db->update('Report_Post',array('status' => 2));
		// 2 is approve	
	}
	function decline($report_id){
		$this->db->where('id',$report_id);
		$this->db->update('Report_Post',array('status' => 3));	
		// 3 is cancle
	}

	function get_all_report(){
		$this->db->select('*');
		$this->db->from('Report_Post');
		$this->db->where('status',1);
		$this->db->order_by("timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}	

	function get_approved_report(){
		$this->db->select('*');
		$this->db->from('Report_Post');
		$this->db->where('status',2);
		$this->db->order_by("timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}

	function get_not_approve_report(){
		$this->db->select('*');
		$this->db->from('Report_Post');
		$this->db->where('status',1);
		$this->db->order_by("timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}
	function countReport(){
		$this->db->select('COUNT (*)');
		$this->db->from('Report_Post');
		$this->db->where('status',1);
		// 1 is waiting admin approve
		// for admin check thier job
	} 

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */