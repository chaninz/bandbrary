<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Followuser extends CI_Controller {
	
	//This is use for follower
	public function __construct() {
		parent::__construct();
		$this->load->model('follow_user_model');
		$this->load->model('user_model');
		$this->load->model('band_model');
		$this->load->model('join_band_model');
	}

	public function follow($follow_user) {
			$data = array(
				'user_id' => $this->session->userdata('id'),
				'follow_user' => $follow_user
			);
			$this->follow_user_model->follow($data);
		
		
	}

	public function unfollow($follow_band) {
			$data = array(
				'id' => $this->session->userdata('id'),
				'follow_band' => $follow_user	
			);
			$this->follow_user_model->unfollow($data);
		
	}

	public function view($user_id){
		$my_id = $this->session->userdata('id');
		$profile_user = $this->user_model->getProfile($user_id);
		$data = array (
		'follower' => $this->follow_user_model->get_follow_user($user_id),
		// 'band_name' => $this->session->userdata('band_name'),
		'user' => $this->user_model->getProfile($my_id),
		'profile_user' => $profile_user,
		'user_id' => $user_id,
		'band_profile_user' => $this->join_band_model->get_band($profile_user->id)
		);
		//print_r($data); 
		$this->load->view('user/follower',$data);
	}

}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */