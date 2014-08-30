<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Job_Model extends CI_Model {

	public function __construct() {

	}
	
	public function add($data) {
		$this->db->insert('users',$data);
		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;	
	}
	
	public function getAllJobs() {
		$this->db->get('jobs');
		foreach ($row as $query => $result) {
			echo $row->description;
		}
	}
}
?>