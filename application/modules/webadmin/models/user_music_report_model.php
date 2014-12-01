<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_music_report_model extends CI_Model {

	function accept($id) {
		$this->db->where('id', $id);
		$this->db->update('Report_Music_User', array('status' => 2));
	}

	function delete($id) {
		$this->db->where('id', $id);
		$this->db->update('Report_Music_User', array('status' => 3));
	}

	function get_all_report(){
		$this->db->select('*');
		$this->db->select('Report_Music_User.id AS id');
		$this->db->select('Users.name AS reporter');
		$this->db->select('Users.username AS reporter_username');
		$this->db->join('Users', 'Report_Music_User.user_report = Users.id');
		$this->db->order_by("Report_Music_User.timestamp", "DESC"); 
		$query = $this->db->get('Report_Music_User');
		$result = $query->result();

		return $result;
	}

	function get($id) {
		$query = $this->db->get_where('Report_Music_User', array('id' => $id));
		$result = $query->row();

		return $result;
	}

	// function get_approved_report(){
	// 	$this->db->select('Report_Music_User.*,Users.name as reporter,User_Music.name as musicname');
	// 	$this->db->from('Report_Music_User');
	// 	$this->db->join('Users', 'Report_Music_User.user_report = Users.id');
	// 	$this->db->join('User_Music', 'Report_Music_User.music_id = User_Music.id');
	// 	$this->db->where('Report_Music_User.status',2);
	// 	$this->db->order_by("Report_Music_User.timestamp", "desc"); 

	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// function get_not_approve_report(){
	// 	$this->db->select('Report_Music_User.*,Users.name as reporter,User_Music.name as musicname');
	// 	$this->db->from('Report_Music_User');
	// 	$this->db->join('Users', 'Report_Music_User.user_report = Users.id');
	// 	$this->db->join('User_Music', 'Report_Music_User.music_id = User_Music.id');
	// 	$this->db->where('Report_Music_User.status',1);
	// 	$this->db->order_by("Report_Music_User.timestamp", "desc"); 

	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

}

/* End of file user_music_report.php */
/* Location: ./application/modules/webadmin/models/user_music_report.php */