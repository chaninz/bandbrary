<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Style_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function get_all() {
		$query = $this->db->get('Styles');
		$result = $query->result();

		return $result;
	}

	function add($user_id, $styles) {
		foreach ($styles as $style) {
			$this->db->insert('Has_Styles', array('user_id' => $user_id,
				'style_id' => $style));
		}
	}

	function edit($user_id, $styles) {
		$this->delete($user_id);
		$this->add($user_id, $styles);
	}

	function delete($user_id) {
		$this->db->where('user_id', $user_id);
		$this->db->delete('Has_Styles');
	}

	function get_by_user($user_id) {
		$query = $this->db->get_where('Has_Styles', array('user_id' => $user_id));
		$result_set = $query->result();
		$result = array();

		foreach ($result_set as $row) {
			$result[$row->style_id] = TRUE;
		}

		return $result;
	}

}

/* End of file style_model.php */
/* Location: ./application/models/style_model.php */