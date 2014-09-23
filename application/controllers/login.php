<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('join_band_model');
		$this->load->model('band_model');
	}

	public function index() {
		if ($this->session->userdata('email')) {
			print_r($this->session->all_userdata());
			//redirect('home');
		} else if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->user_model->login($username, $password);

			// If login complete
			if ($result) {
				$user = array('id' => $result->id,
					'username' => $result->username,
					'email' => $result->email,
					'name' => $result->name,
					'surname' => $result->surname,
					'user_type' => $result->user_type,
					'band_id' => NULL);

				// Check if he is a musician
				if ($user['user_type'] == 2) {
					$bid = $this->join_band_model->get($user['id']);

					// If the user joined band, put id of his band to session
					if ($bid) {
						$user['band_id'] = $bid;
					}
				}

				$this->session->set_userdata($user);

				// First time login, forward to initial page to complete the profile
				if (empty($user['name']) && empty($user['surname'])) {
					redirect('initial');
				}
			} else {
				$data = array('error_code' => 0,
					'error_type' => 0);
				$this->load->view('login', $data);
			}
		} else {
			$this->load->view('login');
		}
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
?>