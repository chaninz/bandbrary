<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Job_Model extends CI_Model {

	public function __construct() {

	}
	
	public function add($data) {
		$this->db->insert('users',$data);
		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;	
	}
	
	public function get_all() {

	}

	function createJob ($data){
		$this->db->insert('Jobs',$data);
	}
	function getJob(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Jobs');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->row();
	}

	function update($data) {
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('Jobs',$data);
	}

	public function getAllJobs() {
		$this->db->get('jobs');
		foreach ($row as $query => $result) {
			echo $row->description;
		}
	}
}
?>