<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_User_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function approve($report_id){
		$this->db->where('id',$report_id);
		$this->db->update('Report_User',array('status' => 2));
		// 2 is approve	
	}
	function decline($report_id){
		$this->db->where('id',$report_id);
		$this->db->update('Report_User',array('status' => 3));	
		// 3 is cancle
	}

	function get_all_report(){
		$this->db->select('Report_User.*,u.username as username,r.username as reporter');
		$this->db->from('Report_User');
		$this->db->join('Users AS u', 'Report_User.user_id = u.id');
		$this->db->join('Users AS r', 'Report_User.user_report = r.id');
		$this->db->order_by("Report_User.timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}	

	function get_approved_report(){
		$this->db->select('Report_User.*,u.username as username,r.username as reporter');
		$this->db->from('Report_User');
		$this->db->join('Users AS u', 'Report_User.user_id = u.id');
		$this->db->join('Users AS r', 'Report_User.user_report = r.id');
		$this->db->where('Report_User.status',2);
		$this->db->order_by("Report_User.timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}

	function get_not_approve_report(){
		$this->db->select('Report_User.*,u.username as username,r.username as reporter');
		$this->db->from('Report_User');
		$this->db->join('Users AS u', 'Report_User.user_id = u.id');
		$this->db->join('Users AS r', 'Report_User.user_report = r.id');
		$this->db->where('Report_User.status',1);
		$this->db->order_by("Report_User.timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}
	function countReport(){
		$this->db->select('COUNT (*)');
		$this->db->from('Report_User');
		$this->db->where('status',1);
		// 1 is waiting admin approve
		// for admin check thier job
	} 

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */