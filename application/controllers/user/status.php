<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('status_model');
		$this->load->model('user_model');
		$this->load->model('follow_model');
		$this->load->model('user_music_model');
		$this->load->model('event_model');
	}

	public function all($username) {
		// Basic data for user profile page
		$user_profile = $this->user_model->get_by_username($username);

		if ( ! empty($user_profile)) {
			// Cover
			$total_timeline = $this->user_model->get_count_timeline($user_profile->id);
			$total_follower = $this->follow_model->get_count_follower_user($user_profile->id);
			$total_following = $this->follow_model->get_count_following_user($user_profile->id);
			$total_music = $this->user_music_model->get_count_music_user($user_profile->id);
			$total_event = $this->event_model->get_count_by_user($user_profile->id);

			$statuss = $this->status_model->get_by_user($user_profile->id);

			$data = array('total_timeline' => $total_timeline,
				'total_follower' => $total_follower,
				'total_following' => $total_following,
				'total_music' => $total_music,
				'total_event' => $total_event,
				'statuss' => $statuss,
				'user_profile' => $user_profile);

			$this->load->view('user/status_all', $data);
		} else {
			show_404();
		}
	}

}

/* End of file status.php */
/* Location: ./application/controllers/user/status.php */