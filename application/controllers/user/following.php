<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Following extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Basic model for user profile page
		$this->load->model('user_model');
		$this->load->model('status_model');
		$this->load->model('follow_model');
		$this->load->model('join_band_model');
		$this->load->model('user_music_model');

	}

	public function index($username) {
		$this->user($username);
	}

	public function user($username) {
		// Basic data for user profile page
		$user_profile = $this->user_model->get_by_username($username);

		if ( ! empty($user_profile)) {
			// Basic data for user profile page
			$band_profile = $this->join_band_model->get_current_band($user_profile->id);
			$join_band_history = $this->join_band_model->get_join_all($user_profile->id);
			// Current user info
			$current_user_id = $this->session->userdata('id');
			$is_follow_user = $this->follow_model->is_follow_user($current_user_id, $user_profile->id);
			// Page data
			$following_users = $this->follow_model->get_following_user($user_profile->id);
			
			$timelines = $this->user_model->timeline($user_profile->id);
			$total_follower = $this->follow_model->get_count_follower_user($user_profile->id);
			$total_following = $this->follow_model->get_count_following_user($user_profile->id);
			$total_music = $this->user_music_model->get_count_music_user($user_profile->id);
			$display = array('user_profile' => $user_profile,
				'band_profile' => $band_profile,
				'join_band_history' => $join_band_history,
				'is_follow_user' => $is_follow_user,
				'following_users' => $following_users,
				'total_timeline' => count($timelines),
				'total_follower' => $total_follower,
				'total_following' => $total_following,
				'total_music' => $total_music);

			$this->load->view('user/following_user', $display);
		} else {
			show_404();
		}
		
	}

	public function band($username) {
		// Basic data for user profile page
		$user_profile = $this->user_model->get_by_username($username);

		if ( ! empty($user_profile)) {
			// Basic data for user profile page
			$band_profile = $this->join_band_model->get_current_band($user_profile->id);
			$join_band_history = $this->join_band_model->get_join_all($user_profile->id);
			// Current user info
			$current_user_id = $this->session->userdata('id');
			$is_follow_user = $this->follow_model->is_follow_user($current_user_id, $user_profile->id);
			// Page data
			$following_bands = $this->follow_model->get_following_band($user_profile->id);

			$display = array('user_profile' => $user_profile,
				'band_profile' => $band_profile,
				'join_band_history' => $join_band_history,
				'is_follow_user' => $is_follow_user,
				'following_bands' => $following_bands);

			$this->load->view('user/following_band', $display);
		} else {
			show_404();
		}
	}

}

/* End of file following.php */
/* Location: ./application/controllers/user/following.php */