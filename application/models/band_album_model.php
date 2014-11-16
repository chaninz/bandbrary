<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_album_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function add($data) {
		$this->db->insert('Band_Albums', $data);
	}

	function edit($id, $data){
		$this->db->where('id', $id);
		$this->db->update('Band_Albums', $data);
	}

	function delete($id) {
		$this->db->delete('Band_Albums', array('id' => $id));
	}	

	function get($id) {
		$query = $this->db->get_where('Band_Albums', array('id' => $id));
		$result = $query->row();

		return $result;
	}

	function get_all() {
		$query = $this->db->get('Band_Albums');
		$result = $query->result();

		return $result;
	}

	function get_by_band($band_id) {
		$this->db->order_by('timestamp DESC');
		$query = $this->db->get_where('Band_Albums', array('band_id' => $band_id));
		$result = $query->result();

		return $result;
	}

}

/* End of file band_album_model.php */
/* Location: ./application/models/band_album_model.php */