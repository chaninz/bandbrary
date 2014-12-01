<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cover_banner_model extends CI_Model {

	function add($data){
		$this->db->insert('Cover_Banners', $data);
	}

	function edit($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('Cover_Banners', $data);
	}	

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('Cover_Banners');
	}

	function get($id) {
		$query = $this->db->get_where('Cover_Banners', array('id' => $id));
		$result = $query->row();

		return $result;
	}

	function get_all() {
		$query = $this->db->get('Cover_Banners');
		$result = $query->result();

		return $result;
	}

}

/* End of file cover_banner_model.php */
/* Location: ./application/models/cover_banner_model.php */