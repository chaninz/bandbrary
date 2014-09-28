<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Follower extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
		$this->load->model('follow_model');
		$this->load->model('join_band_model');
		$this->load->model('post_model');
	}

	public function index($band_id) {
		// Basic data for band profile page
		$band_profile = $this->band_model->get($band_id);
		$band_members = $this->join_band_model->get_current_member($band_id);
		// Current user info
		$current_user_id = $this->session->userdata('id');
		$is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
		$user_status =  $this->join_band_model->get_user_status($current_user_id, $band_id);

		$data = array('band_profile' => $band_profile,
			'is_follow_band' => $is_follow_band,
			'user_status' => $user_status,
			'band_members' => $band_members,
			'followers' => $this->follow_model->get_band_follower($band_id));

		//print_r($data['followers']);
		$this->load->view('band/follower', $data);
	}

}

/* End of file follower.php */
/* Location: ./application/controllers/band/follower.php */