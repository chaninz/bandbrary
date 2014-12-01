<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_music_report_model extends CI_Model {

	function accept($id) {
		$this->db->where('id', $id);
		$this->db->update('Report_Music_Band', array('status' => 2));
	}

	function delete($id) {
		$this->db->where('id', $id);
		$this->db->update('Report_Music_Band', array('status' => 3));
	}

	function get_all_report(){
		$this->db->select('*');
		$this->db->select('Report_Music_Band.id AS id');
		$this->db->select('Users.name AS reporter');
		$this->db->select('Users.username AS reporter_username');
		$this->db->join('Users', 'Report_Music_Band.user_report = Users.id');
		$this->db->order_by("Report_Music_Band.timestamp", "DESC"); 
		$query = $this->db->get('Report_Music_Band');
		$result = $query->result();

		return $result;
	}

	function get($id) {
		$query = $this->db->get_where('Report_Music_Band', array('id' => $id));
		$result = $query->row();

		return $result;
	}

}

/* End of file band_music_report_model.php */
/* Location: ./application/modules/webadmin/models/band_music_report_model.php */