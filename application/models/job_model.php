<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_model extends CI_Model {

	function add($data){
		$this->db->insert('Jobs', $data);
	}

	function edit($job_id, $data) {
		$this->db->where('id', $job_id);
		$this->db->update('Jobs', $data);
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

	function get_near($province_id) {
		$query = $this->db->query('SELECT *, Jobs.id AS id, CASE WHEN province_id = '.$province_id.' THEN 1 ELSE 0 END AS my_province 
			FROM Jobs 
			JOIN Provinces ON Jobs.province_id = Provinces.id 
			WHERE Provinces.region = (SELECT Provinces.region FROM Provinces WHERE Provinces.id = '.$province_id.') 
			AND date > CURDATE() 
			ORDER BY my_province DESC, Jobs.date ASC');
		$result = $query->result();

		return $result;
	}

	function get_by_province($province_id) {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$query = $this->db->get_where('Jobs', array('province_id' => $province_id));
		$result = $query->result();

		return $result;
	}

	function get_by_region($region) {
		$query = $this->db->get_where('Jobs', array('region_id' => $region));

		return $query->result();
	}

	function get_by_user($user_id) {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$query = $this->db->get_where('Jobs', array('user_id' => $user_id));
		$result = $query->result();

		return $result;
	}

	function get_by_user_employment($user_id, $status) {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Employment', 'Employment.job_id = Jobs.id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$query = $this->db->get_where('Jobs', array('Employment.user_id' => $user_id,
			'Employment.status' => $status));
		$result = $query->result();

		return $result;
	}

	function get_by_band_employment($band_id, $status) {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Band_Employment', 'Band_Employment.job_id = Jobs.id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$query = $this->db->get_where('Jobs', array('Band_Employment.band_id' => $band_id,
			'Band_Employment.status' => $status));
		$result = $query->result();

		return $result;
	}

	function get_by_style($style_id) {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$query = $this->db->get_where('Jobs', array('style_id' => $style_id));
		$result = $query->result();

		return $result;
	}

	function get_request($user_id) {
		return $this->get_by_user_employment($user_id, 1);
	}

	function get_confirm($user_id) {
		return $this->get_by_user_employment($user_id, 2);
	}

	function get_reject($user_id) {
		return $this->get_by_user_employment($user_id, 3);
	}

	function get_band_request($band_id) {
		return $this->get_by_band_employment($band_id, 1);
	}

	function get_band_confirm($band_id) {
		return $this->get_by_band_employment($band_id, 2);
	}

	function get_band_reject($band_id) {
		return $this->get_by_band_employment($band_id, 3);
	}

	function get_all() {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$this->db->where('date > CURDATE()');
		$query = $this->db->get('Jobs');
		$result = $query->result();
		
		return $result;
	}

	function get_current_all() {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$this->db->where('date > CURDATE() AND status = 1');
		$query = $this->db->get('Jobs');
		$result = $query->result();
		
		return $result;
	}

	function search($keyword) {
		$this->db->select('*');
		$this->db->select('Jobs.id AS id');
		$this->db->join('Provinces', 'Jobs.province_id = Provinces.id');
		$this->db->like('name', $keyword);
		$query = $this->db->get('Jobs');
		$result = $query->result();

		return $result;
	}

	function set_status($job_id, $status) {
		$this->db->where('id', $job_id);
		$this->db->update('Jobs', array('status' => $status));
	}

	function open($job_id) {
		$this->set_status($job_id, 1);
	}

	function close($job_id) {
		$this->set_status($job_id, 0);
	}

	function delete($job_id) {
		$this->db->delete('Jobs', array('id' => $job_id));
	}
//-------------------------------------------------

	function countJob(){
		$this->db->select('*');
		$this->db->from('Jobs');

		$query = $this->db->get();
		return $query->num_rows();
	}

}

/* End of file job_model.php */
/* Location: ./application/models/job_model.php */