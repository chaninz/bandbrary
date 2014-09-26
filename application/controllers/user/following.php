<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Following extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('join_band_model');
		$this->load->model('follow_model');
	}

	public function index($user_id)	{
		$this->user($user_id);
	}

	public function user($username) {
		// Basic data for user profile page
		$user_profile = $this->user_model->get_by_username($username);
		$band_profile = $this->join_band_model->get_current_band($user_profile->id);

		$data = array('user_profile' => $user_profile, 
			'band_profile' => $band_profile,
			'following_users' => $this->follow_model->get_following_user($user_profile->id));

		$this->load->view('user/following_user', $data);
	}

	public function band($username){
		// Basic data for user profile page
		$user_profile = $this->user_model->get_by_username($username);
		$band_profile = $this->join_band_model->get_current_band($user_profile->id);

		$data = array('user_profile' => $user_profile, 
			'band_profile' => $band_profile,
			'following_bands' => $this->follow_model->get_following_band($user_profile->id));

		$this->load->view('user/following_band', $data);
	}

}

/* End of file following.php */
/* Location: ./application/controllers/user/following.php */