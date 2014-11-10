<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Basic model for band profile page
		$this->load->model('band_model');
		$this->load->model('status_model');
		$this->load->model('follow_model');
		$this->load->model('join_band_model');
		$this->load->model('skill_model');
		// Page model
		$this->load->model('event_model');
		$this->load->model('province_model');
	}

	public function index($band_id) {
		// Basic data for user profile page
		$band_profile = $this->band_model->get($band_id);

		if ( ! empty($band_profile)) {
			// Basic data for user profile page
			$status = $this->status_model->get_last_by_band($band_id);
			$band_members = $this->join_band_model->get_current_member($band_id);
			// Current user info
			$current_user_id = $this->session->userdata('id');
			$is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
			$user_status =  $this->join_band_model->get_user_status($current_user_id, $band_id);
			$current_user_skills = $this->skill_model->get_by_user($current_user_id);
			// Page data
			$provinces = $this->province_model->get_all();
			$events = $this->event_model->get_current_by_band($band_id);

			$display = array('band_profile' => $band_profile,
				'status' => $status,
				'band_members' => $band_members,
				'is_follow_band' => $is_follow_band,
				'user_status' => $user_status,
				'current_user_skills' => $current_user_skills,
				'events' => $events,
				'provinces' => $provinces);

			$this->load->view('band/event', $display);
		} else {
			show_404();
		}
	}

}

/* End of file event.php */
/* Location: ./application/controllers/band/event.php */