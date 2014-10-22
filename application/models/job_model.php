<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_model extends CI_Model {

	function add($data){
		$this->db->insert('Jobs',$data);
	}

	function get($job_id){
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->select('Jobs.name AS name');
		$this->db->select('Users.name AS users_name');
		$this->db->join('Users', 'Users.id = Jobs.user_id');
		$this->db->join('Job_Types', 'Job_Types.id = Jobs.type_id');
		$this->db->join('Styles', 'Styles.id = Jobs.style_id');
		$this->db->join('Provinces', 'Provinces.id = Jobs.province_id');
		$query = $this->db->get_where('Jobs', array('Jobs.id' => $job_id));
		$result = $query->row();

		return $result;
	}

	function set_status($job_id, $status) {
		$this->db->where(array('id' => $job_id));
		$this->db->update('Jobs', array('status' => $status));
	}

	function open($job_id) {
		$this->set_status($job_id, 1);
	}

	function close($job_id) {
		$this->set_status($job_id, 0);
	}

//-------------------------------------------------

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

	

}

/* End of file job_model.php */
/* Location: ./application/models/job_model.php */