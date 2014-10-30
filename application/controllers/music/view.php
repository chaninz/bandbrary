<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class view extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('follow_model');
		$this->load->model('join_band_model');
		$this->load->model('user_model');
	}

	public function index() {	
		 $current_user_id = $this->session->userdata('id');
		 $is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
		 $user_status =  $this->join_band_model->get_user_status($current_user_id,$post->band_id);

		 $data = array (
		 'is_follow_band' => $is_follow_band,
		 'user_status' => $user_status,
		 );
		$this->load->view('user/viewMusic',$data);

	}

}