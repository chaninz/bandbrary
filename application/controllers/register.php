<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		if ($this->input->post()) {
			$data = array(
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'user_type' => $this->input->post('user-type'),
				// 'name' => $this->input->post('name'),
				// 'surname' => $this->input->post('surname')
				// 'province_id' => $this->input->post('province'),
				
				// 'biography' => $this->input->post('biography'),
				// 'fb_url' => $this->input->post('fburl'),
				// 'tw_url' => $this->input->post('twurl'),
				// 'yt_url' => $this->input->post('yturl'),
				// 'dob' => $this->input->post('dob')
				);
			$user_type = $this->input->post('user-type');
			if ($user_type == 'audience')
				$data['user_type'] = 1;
			else if ($user_type == 'musician')
				$data['user_type'] = 2;
			$this->user_model->register($data);
		} else {
			$this->load->view('register');
		}	
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */