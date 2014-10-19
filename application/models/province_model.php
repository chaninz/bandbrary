<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Province_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_th_all() {
		$this->db->select('id, region, province_th');
		$this->db->order_by('province_th');
		$query = $this->db->get('Provinces');
		$result = $query->result();

		return $result;
	}	

}

/* End of file province_model.php */
/* Location: ./application/models/province_model.php */