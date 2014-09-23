<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skill_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function add($id, $data) {
		foreach ($data as $skill) {
			$this->db->insert('Has_Skills', array('user_id' => $id,
				'skill_id' => $skill));
		}
	}

	function edit($id, $data) {
		$this->delete($id);
		$this->add($id, $data);
	}

	function delete($id) {
		$this->db->where('user_id', $id);
		$this->db->delete('Has_Skills');
	}
	
}

/* End of file skill_model.php */
/* Location: ./application/models/skill_model.php */