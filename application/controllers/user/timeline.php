<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeline extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Basic model for user profile page
		$this->load->model('user_model');
		$this->load->model('join_band_model');
		$this->load->model('follow_model');
		$this->load->model('status_model');
	}

	public function index($username) {
		/* Basic data for user profile page */
		$user_profile = $this->user_model->get_by_username($username);
		$band_profile = $this->join_band_model->get_current_band($user_profile->id);
		$status = $this->status_model->get_last($user_profile->id);
		// Current user info
		$current_user_id = $this->session->userdata('id');
		$is_follow_user = $this->follow_model->is_follow_user($current_user_id, $user_profile->id);
	
		$data = array('user_profile' => $user_profile, 
			'band_profile' => $band_profile,
			'status' => $status,
			'is_follow_user' => $is_follow_user);

		$this->load->view('user/timeline', $data);
	}

}

/* End of file timeline.php */
/* Location: ./application/controllers/user/timeline.php */