<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Follow_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	/* follow_type = 1-user, 2-band */
	function follow($user_id, $followed_id, $follow_type) {
		// Add follow for user and band
		if ($follow_type == 1) {
			$this->db->insert('Follow_Users', array('user_id' => $user_id,
				'follow_user' => $followed_id));
		} elseif ($follow_type == 2) {
			$this->db->insert('Follow_Bands', array('user_id' => $user_id,
				'follow_band' => $followed_id));
		}
	}
	
	function follow_user($user_id, $followed_id) {
		$this->follow($user_id, $followed_id, 1);
	}

	function follow_band($user_id, $followed_id) {
		$this->follow($user_id, $followed_id, 2);
	}

	function is_follow($user_id, $followed_id, $follow_type) {
		if ($follow_type == 1) {
			$query = $this->db->get_where('Follow_Users', array('user_id' => $user_id,
				'follow_user' => $followed_id));
		} elseif ($follow_type == 2) {
			$query = $this->db->get_where('Follow_Bands', array('user_id' => $user_id,
				'follow_band' => $followed_id));
		}
		$result = $query->row();

		return $result;
	}

	function is_follow_user($user_id, $followed_id) {
		return $this->is_follow($user_id, $followed_id, 1);
	}

	function is_follow_band($user_id, $followed_id) {
		return $this->is_follow($user_id, $followed_id, 2);
	}

	function unfollow($user_id, $followed_id, $follow_type) {
		if ($follow_type == 1) {
			$this->db->delete('Follow_Users', array('user_id' => $user_id,
				'follow_user' => $followed_id));
		} elseif ($follow_type == 2) {
			$this->db->delete('Follow_Bands', array('user_id' => $user_id,
				'follow_band' => $followed_id));
		}
	}

	function unfollow_user($user_id, $followed_id) {
		$this->unfollow($user_id, $followed_id, 1);
	}

	function unfollow_band($user_id, $followed_id) {
		$this->unfollow($user_id, $followed_id, 2);
	}

	function get_following($id, $follow_type) {
		// Get following of user from their ID
		if ($follow_type == 1) {
			$this->db->join('Users', 'Follow_Users.follow_user = Users.id');
			$query = $this->db->get_where('Follow_Users', array('user_id' => $id));
		} elseif ($follow_type == 2) {
			$this->db->join('Bands', 'Follow_Bands.follow_band = Bands.id');
			$query = $this->db->get_where('Follow_Bands', array('user_id' => $id));
		}
		$result = $query->result();

		return $result;
	}

	function get_following_user($user_id) {
		return $this->get_following($user_id, 1);
	}

	function get_following_band($user_id) {
		return $this->get_following($user_id, 2);
	}

	function get_follower($id, $user_type) {
		// Get follower of user, band from their ID
		if ($user_type == 1) {
			$this->db->join('Users', 'Follow_Users.follow_user = Users.id');
			$query = $this->db->get_where('Follow_Users', array('user_id' => $id));
		} elseif ($user_type == 2) {
			$this->db->join('Users', 'Follow_Bands.follow_band = Bands.id');
			$query = $this->db->get_where('Follow_Bands', array('user_id' => $id));
		}
		$result = $query->result();

		return $result;
	}

	function get_user_follower($user_id) {
		return $this->get_follower($user_id, 1);
	}

	function get_band_follower($band_id) {
		return $this->get_follower($band_id, 2);
	}

}

/* End of file follow_model.php */
/* Location: ./application/models/follow_model.php */