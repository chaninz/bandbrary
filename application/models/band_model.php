<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_Model extends CI_Model {

	function create($data) {
		$this->db->insert('Band',$data);
	}

}

/* End of file band_model.php */
/* Location: ./application/models/band_model.php */