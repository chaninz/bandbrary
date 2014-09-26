<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Following extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('follow_user_model');
		$this->load->model('follow_band_model');
		$this->load->model('user_model');
		$this->load->model('band_model');
		$this->load->model('join_band_model');
	}

	public function user($user_id){
		$my_id = $this->session->userdata('id');
		$profile_user = $this->user_model->getProfile($user_id);
		$data = array (
		'following' => $this->follow_user_model->get_following_user($user_id),
		// 'band_name' => $this->session->userdata('band_name'),
		'user' => $this->user_model->getProfile($my_id),
		'profile_user' => $profile_user,
		'user_id' => $user_id,
		'member' => $this->user_model->getProfile($user_id),
		'band_profile_user' => $this->join_band_model->get_band($profile_user->id)
		);
		//print_r($data); 
		$this->load->view('user/followingUser',$data);
	}

	public function band($user_id){
		$my_id = $this->session->userdata('id');
		$profile_user = $this->user_model->getProfile($user_id);
		$data = array (
		'following' => $this->follow_band_model->get_following_band($user_id),
		// 'band_name' => $this->session->userdata('band_name'),
		'user' => $this->user_model->getProfile($my_id),
		'profile_user' => $profile_user,
		'user_id' => $user_id,
		'band_profile_user' => $this->join_band_model->get_band($profile_user->id)
		);
		//print_r($data); 
		$this->load->view('user/followingBand',$data);
	}
}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */