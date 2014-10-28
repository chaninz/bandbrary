<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_model extends CI_Model {

	function add($band) {
		$this->db->insert('Bands', $band);
	}

	function is_exist($bandname) {
		// Check if band name is exist.
		$result = 0;
		$this->db->where('name', $bandname);
		$query = $this->db->get('Bands');
		if ($query->num_rows() > 0) {
			$result = 1;
		}
		else {
			$result = 0;
		}

		return $result;
	}

	function edit($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('Bands', $data);
	}
	
	function get($band_id){
		$this->db->select('*');
		$this->db->select('Bands.id AS id');
		$this->db->join('Styles', 'Bands.style_id = Styles.id');
		$this->db->join('Provinces', 'Bands.province_id = Provinces.id');
		$query = $this->db->get_where('Bands', array('Bands.id' => $band_id));
		$result = $query->row();

		return $result;
	}

	function get_by_name($bandname) {
		$this->db->where('name', $bandname);
		$query = $this->db->get('Bands');
		$result = $query->row();

		return $result;
	}

}

/* End of file band_model.php */
/* Location: ./application/models/band_model.php */