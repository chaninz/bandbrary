<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('join_band_model');
		$this->load->model('band_model');
	}

	public function index() {
		if ($this->session->userdata('email')) {
			print_r($this->session->all_userdata());
			//redirect('');
		} else if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->user_model->signin($username, $password);

			if ($result) {
				// If sign in complete
				$user = array('id' => $result->id,
					'username' => $result->username,
					'email' => $result->email,
					'name' => $result->name,
					'surname' => $result->surname,
					'user_type' => $result->user_type,
					'band_id' => NULL);

				if ($user['user_type'] == 2) {
					// Check if he is a musician
					$bid = $this->join_band_model->get_current_band($user['id'])->band_id;

					if ($bid) {
						// If the user joined band, put id of his band to session
						$user['band_id'] = $bid;
					}
				}

				$this->session->set_userdata($user);

				if (empty($user['name']) && empty($user['surname'])) {
					// First time signin, forward to initial page to complete the profile
					redirect('account/start');
				}
			} else {
				$data = array('error_code' => 0,
					'error_type' => 0);
				$this->load->view('account/signin', $data);
			}
		} else {
			$this->load->view('account/signin');
		}
	}

}

/* End of file signin.php */
/* Location: ./application/controllers/account/signin.php */