<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		if ($this->input->post('username') != NULL &&
			$this->input->post('password') != NULL &&
			$this->input->post('email') != NULL &&
			$this->input->post('user-type') != NULL) {

			$data = array('email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'user_type' => $this->input->post('user-type'));
			$this->user_model->signup($data);

			$display = array('msg' => array('type' => 3, 
				'header' => "",
				'text' => "สมัครสมาชิกเสร็จสมบูรณ์"));
			$this->load->view('account/signin', $display);
		} else {
			show_404();
		}	
	}

	public function check_username() {
		$username = $this->input->post('username');
		if ($username != NULL) {
			echo $this->user_model->is_username_exist($username);
		}
	}

	public function check_email() {
		$email = $this->input->post('email');
		if ($email != NULL) {
			echo $this->user_model->is_email_exist($email);
		}
	}

	public function test() {
		echo random_string('alnum', 16);
	}

}

/* End of file signup.php */
/* Location: ./application/controllers/account/signup.php */