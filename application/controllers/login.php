<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		if ($this->session->userdata('email')) {
			//redirect('home');
		} elseif ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->user_model->login($username, $password);
			if ($result) {
				$user = array('id' => $result->id,
					'username' => $result->username,
					'email' => $result->email);
				$this->session->set_userdata($user);
				$this->load->view('feed');
			}
		} else {
			$this->load->view('login');
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */