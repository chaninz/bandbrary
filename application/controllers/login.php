<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('join_band_model');
	}

	public function index() {
		if ($this->session->userdata('email')) {
			// $bid = $this->session->userdata('band_id'); ---> use for check band_id
			// echo $bid;
			echo "successful";
			//redirect('home');
		} else if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->user_model->login($username, $password);
			if ($result) {
				$bid = $this->join_band_model->get($result->id);
				$user = array('id' => $result->id,
					'username' => $result->username,
					'email' => $result->email,
					'name' => $result->name,
					'photo_url' => $result->photo_url,
					'band_id' => $bid->band_id
					);
				$this->session->set_userdata($user);
				// $this->load->view('feed');
			}
		} else {
			$this->load->view('login');
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */