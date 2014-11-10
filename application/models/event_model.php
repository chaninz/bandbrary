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
			$this->db->where(array('id' => $id));
			$this->db->update('User_Events', $data);
		} elseif ($user_type == 2) {
			// WHERE id AND band_id
			$this->db->where(array('id' => $id));
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

	function get($id, $user_type) {
		if ($user_type == 1)
			$query = $this->db->get_where('User_Events', array('id' => $id));
		elseif ($user_type == 2)
			$query = $this->db->get_where('Band_Events', array('id' => $id));

		$result = $query->row();
		return $result;
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

	function get_current_by_user($user_id) {
		$query = $this->db->query('SELECT user_id, event, description, venue, province, date, time, duration, event_id 
			FROM (SELECT user_id, event, description, venue, province_id, date, time, duration, id AS event_id 
				FROM User_Events 
				WHERE user_id = '.$user_id.' 
				UNION 
				SELECT Employment.user_id, name, description, venue, province_id, date, time, duration, 0 AS event_id 
				FROM Jobs 
				JOIN Employment ON Employment.job_id = Jobs.id 
				WHERE Employment.user_id = '.$user_id.' 
					AND Employment.status = 2 
					AND Jobs.status = 0) AS Events 
			JOIN Provinces ON Events.province_id = Provinces.id 
			WHERE date >= CURDATE() 
			ORDER BY date, time');
		$result = $query->result();

		return $result;
	}

	function get_current_by_band($band_id) {
		$query = $this->db->query('SELECT band_id, event, description, venue, province, date, time, duration, event_id 
			FROM (SELECT band_id, event, description, venue, province_id, date, time, duration, id AS event_id 
				FROM Band_Events 
				WHERE band_id = '.$band_id.' 
				UNION 
				SELECT Band_Employment.band_id, name, description, venue, province_id, date, time, duration, 0 AS event_id 
				FROM Jobs 
				JOIN Band_Employment ON Band_Employment.job_id = Jobs.id 
				WHERE Band_Employment.band_id = '.$band_id.' 
					AND Band_Employment.status = 2 
					AND Jobs.status = 0) AS Events 
			JOIN Provinces ON Events.province_id = Provinces.id 
			ORDER BY date, time');
		$result = $query->result();

		return $result;
	}

}

/* End of file event_model.php */
/* Location: ./application/models/event_model.php */