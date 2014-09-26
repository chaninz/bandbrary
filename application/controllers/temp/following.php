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

	
}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */