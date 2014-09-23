<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_model extends CI_Model {

	function create($band) {
		$this->db->insert('Bands',$band);
	}

	// Check if band name is exist.
	function is_exist($bandname) {
		$result = 0;
		$this->db->or_where('name', $bandname);
		$query = $this->db->get('Bands');
		if ($query->num_rows() > 0) {
			$result = 1;
		}
		else {
			$result = 0;
		}

		return $result;
	}

	function edit($band) {
		$this->db->where('name', $band['name']);
		$this->db->update('Bands', $band);
	}
	

	function get($band_id){
		$this->db->select('*');
		$this->db->from('Bands');
		$this->db->where('id',$band_id);

		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file band_model.php */
/* Location: ./application/models/band_model.php */