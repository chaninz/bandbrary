<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_model extends CI_Model {

	function create($band) {
		$this->db->insert('Bands', $band);
	}

	function is_exist($bandname) {
		// Check if band name is exist.
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
		$this->db->select('Bands.id AS id');
		$this->db->join('Style', 'Bands.style_id = Style.id');
		$this->db->join('Provinces', 'Bands.province_id = Provinces.id');
		$query = $this->db->get_where('Bands', array('Bands.id' => $band_id));
		$result = $query->row();

		return $result;
	}

}

/* End of file band_model.php */
/* Location: ./application/models/band_model.php */