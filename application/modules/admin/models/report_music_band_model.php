<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_Music_Band_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function approve($report_id){
		$this->db->where('id',$report_id);
		$this->db->update('Report_Music_Band',array('status' => 2));
		// 2 is approve	
	}
	function decline($report_id){
		$this->db->where('id',$report_id);
		$this->db->update('Report_Music_Band',array('status' => 3));	
		// 3 is cancle
	}

	function get_all_report(){
		$this->db->select('Report_Music_Band.*,Users.username as reporter,User_Music.name as musicname');
		$this->db->from('Report_Music_Band');
		$this->db->join('Users', 'Report_Music_Band.user_report = Users.id');
		$this->db->join('User_Music', 'Report_Music_Band.music_id = User_Music.id');
		$this->db->order_by("Report_Music_Band.timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	
	}	

	function get_approved_report(){
		$this->db->select('Report_Music_Band.*,Users.name as reporter,User_Music.name as musicname');
		$this->db->from('Report_Music_Band');
		$this->db->join('Users', 'Report_Music_Band.user_report = Users.id');
		$this->db->join('User_Music', 'Report_Music_Band.music_id = User_Music.id');
		$this->db->where('Report_Music_Band.status',2);
		$this->db->order_by("Report_Music_Band.timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}

	function get_not_approve_report(){
		$this->db->select('Report_Music_Band.*,Users.name as reporter,User_Music.name as musicname');
		$this->db->from('Report_Music_Band');
		$this->db->join('Users', 'Report_Music_Band.user_report = Users.id');
		$this->db->join('User_Music', 'Report_Music_Band.music_id = User_Music.id');
		$this->db->where('Report_Music_Band.status',1);
		$this->db->order_by("Report_Music_Band.timestamp", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}
	function countReport(){
		$this->db->select('COUNT (*)');
		$this->db->from('Report_Music_Band');
		$this->db->where('Report_Music_Band.status',1);
		// 1 is waiting admin approve
		// for admin check thier job
	} 

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */