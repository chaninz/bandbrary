<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	/* user_type = 1-user, 2-band */
	function add($data, $user_type) {
		// Add event for user and band
		if ($user_type == 1)
			$this->db->insert('User_Events', $data);
		elseif ($user_type == 2)
			$this->db->insert('Band_Events', $data);
	}

	function edit($id, $data, $user_type) {
		// Edit existing event fot user and band
		if ($user_type == 1) {
			// WHERE id AND user_id
			$this->db->where($id);
			$this->db->update('User_Events', $data);
		} elseif ($user_type == 2) {
			// WHERE id AND band_id
			$this->db->where($id);
			$this->db->update('Band_Events', $data);
		}
	}

	function delete($id, $user_type) {
		// Delete event for user and band
		if ($user_type == 1)
			$this->db->delete('User_Events', array('id' => $id));
		elseif ($user_type == 2)
			$this->db->delete('Band_Events', array('id' => $id));
	}

	function get_by_user($id, $user_type) {
		// Get event by id of user and band
		if ($user_type == 1)
			$query = $this->db->get_where('User_Events', array('user_id' => $id));
		elseif ($user_type == 2)
			$query = $this->db->get_where('Band_Events', array('band_id' => $id));
		$result = $query->result();

		return $result;
	}

}

/* End of file event_model.php */
/* Location: ./application/models/event_model.php */