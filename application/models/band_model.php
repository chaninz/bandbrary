<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->model('event_model','event');
	}

	function create($data) {
		$this->db->insert('Band',$data);
	}

}

/* End of file band_model.php */
/* Location: ./application/models/band_model.php */