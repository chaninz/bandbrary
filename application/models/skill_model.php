<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skill_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function add($user_id, $skills) {
		foreach ($skills as $skill) {
			$this->db->insert('Has_Skills', array('user_id' => $user_id,
				'skill_id' => $skill));
		}
	}

	function edit($user_id, $skills) {
		$this->delete($user_id);
		$this->add($user_id, $skills);
	}

	function delete($user_id) {
		$this->db->where('user_id', $user_id);
		$this->db->delete('Has_Skills');
	}
	
	function get_by_user($user_id) {
		$this->db->join('Skills', 'Skills.id = Has_Skills.skill_id');
		$query = $this->db->get_where('Has_Skills', array('user_id' => $user_id));
		$result = $query->result();

		return $result;
	}

	function get_by_user_array($user_id) {
		$query = $this->db->get_where('Has_Skills', array('user_id' => $user_id));
		$result_set = $query->result();
		$result = array();

		foreach ($result_set as $row) {
			$result[$row->skill_id] = TRUE;
		}

		return $result;
	}
	
}

/* End of file skill_model.php */
/* Location: ./application/models/skill_model.php */