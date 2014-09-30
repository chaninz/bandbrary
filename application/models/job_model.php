<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_model extends CI_Model {

	function add($data){
		$this->db->insert('Jobs',$data);
	}

	function get($job_id){
		$this->db->select('*');
		$this->db->from('Jobs');
		$this->db->where('id',$job_id);

		$query = $this->db->get();
		return $query->row();
	}

	function countJob(){
		$this->db->select('*');
		$this->db->from('Jobs');

		$query = $this->db->get();
		return $query->num_rows();
	}

	function edit($data,$id) {
		$this->db->where('id',$id);
		$this->db->update('Jobs',$data);
	}

	public function get_all() {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');

		$query = $this->db->get('Jobs');
		return $query->result();
	}

	public function get_by_region($region) {
		$query = $this->db->get_where('Jobs', array('region_id' => $region));

		return $query->result();
	}

	public function get_by_province($province) {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$query = $this->db->get_where('Jobs', array('province_id' => $province));
		$result = $query->result();

		return $result;
	}

	public function get_by_user($user_id) {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$query = $this->db->get_where('Jobs', array('user_id' => $user_id));
		$result = $query->result();

		return $result;
	}

	public function get_get_job($user_id) {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Employment', 'Employment.job_id = Jobs.id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$query = $this->db->get_where('Jobs', array('Employment.user_id' => $user_id));
		$result = $query->result();

		return $result;
	}

	// requested = 1, joined = 2, leaved =4
	function request($data) {
		$this->db->insert('Employment', $data);
	}

	function join($data) {
		$user_status = $this->get_user_status($data['user_id'], $data['band_id']);
		if ($user_status == 0) {
			// if never join
			$this->db->insert('Employment', $data);
		} elseif ($user_status == 3 || $user_status == 4) {
			// if leaved
			$this->set_status($data['user_id'], $data['band_id'], 1);
		} else {
			// if joining other band
			return -1;
		}
	}

	function set_status($job_id, $status) {
		$this->db->where('user_id', $status);
		$this->db->update('Employment', array('status' => $status));
	}

	function cancel($job_id) {
		$this->db->delete('Employment', array('id', $job_id));
	}

	function accept($job_id,$user_id) {
		$this->set_status($user, $job_id, 2);
	}

	function reject($job_id,$user_id) {
		$this->set_status($user, $job_id, 3);
	}

	function get_user_status($job_id) {
		$result = 0;
		$query = $this->db->get_where('Employment', array('id', $job_id));
		if ($query->num_rows() == 0) {
			return;
		} else {
			$result = $query->row()->status;
		}

		return $result;
	}

}

/* End of file job_model.php */
/* Location: ./application/models/job_model.php */