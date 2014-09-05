<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index() {
		if ($this->input->post()) {
			$data = array(
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'province_id' => $this->input->post('province'),
				'user_type' => $this->input->post('usertype'),
				'biography' => $this->input->post('biography'),
				'fb_url' => $this->input->post('fburl'),
				'tw_url' => $this->input->post('twurl'),
				'yt_url' => $this->input->post('yturl'),
				'dob' => $this->input->post('dob')
				);
			$this->user->register($data);
		} else {
			$this->load->view('register');
		}	
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */