<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		if ($this->input->post()) {
			$user_type = $this->input->post('user-type');
			$data = array(
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'user_type' => $user_type);
			if ($user_type == 'audience')
				$data['user_type'] = 1;
			else if ($user_type == 'musician')
				$data['user_type'] = 2;
			$this->user_model->signup($data);
		} else {
			redirect('');
		}	
	}

}

/* End of file signup.php */
/* Location: ./application/controllers/account/signup.php */