<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Job_Model extends CI_Model {

	
	// public function add($data) {
	// 	$this->db->insert('users',$data);
	// 	$id = $this->db->insert_id();
	// 	return (isset($id)) ? $id : FALSE;	
	// }

	function add($data){
		$this->db->insert('Jobs',$data);
	}
	function get($id){
		$this->db->select('*');
		$this->db->from('Jobs');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->row();
	}

	function edit($data,$id) {
		$this->db->where('id',$id);
		$this->db->update('Jobs',$data);
	}

	public function get_all() {
		$this->db->get('jobs');
		foreach ($row as $query => $result) {
			echo $row->description;
		}
	}

	public function get_by_region($region) {
		$this->db->get_where('Jobs', array('region' => $region));
	}

	public function get_by_province($province) {
		$this->db->get_where('Jobs', array('province' => $province));
	}
}
?>