<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$this->load->view('login');
	}

	public function welcome() {
		$this->load->view('welcome_message');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */