<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_Model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	/* user_type = 1-user, 2-band */
	// Add event for user and band.
	function add($data, $user_type) {
		if ($user_type == 1)
			$this->db->insert('User_Events', $data);
		if ($user_type == 2)
			$this->db->insert('Band_Events', $data);
	}

	// Edit existing event fot user and band.
	function edit($data, $user_type, $id) {
		if ($user_type == 1)
			// WHERE id AND user_id
			$this->db->where($id);
			$this->db->update('User_Events',$data);
		if ($user_type == 2)
			// WHERE id AND band_id
			$this->db->where($id);
			$this->db->update('Band_Events',$data);
	}

	// Delete event for user and band.
	function delete($post_id, $user_type) {
		if ($user_type == 1)
			$this->db->delete('User_Events', $post_id);
		if ($user_type == 2)
			$this->db->delete('Band_Events', $post_id);
	}

	// Get event by id of user and band.
	function Get_by_user($id, $user_type) {
		if ($user_type == 1) {
			$query = $this->db->get_where('User_Events', $id);
			return $query;
		}
		if ($user_type == 2)
			$query = $this->db->get_where('Band_Events', $id);
			return $query;
	}
}

/* End of file post_model.php */
/* Location: ./application/models/event_model.php */