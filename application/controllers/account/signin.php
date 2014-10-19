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
			// If user signed in
			//print_r($this->session->all_userdata());
			$username = $this->session->userdata('username');

			redirect('user/'.$username);
		} else if ($this->input->post()) {
			// When user send data from form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$is_remember = $this->input->post('remember');
			$ref = $this->input->post('ref');
			$result = $this->user_model->signin($username, $password);

			if ($result) {
				// If sign in complete
				$user = $this->utils->refresh_user($result->id);

				if ($is_remember == 'on') {
					// Set ID to cookie and send to client
					$cookie_id = array('name' => 'id',
						'value' => $user['id'],
						'expire' => '86500');
					set_cookie($cookie_id);
				}

				if (empty($user['name']) && empty($user['surname'])) {
					// First time signin, forward to initial page to complete the profile
					redirect('account/start');
				} else if ( ! empty($ref)) {
					// Redirect to requested page
					redirect(base_url($ref));
				} else {
					// Redirect to profile page
					redirect('user/'.$username);
				}
			} else {
				// No user found
				$display = array('msg' => array('type' => 1, 
				'header' => '',
				'text' => 'ไม่พบชื่อผู้ใช้ หรือ รหัสผ่าน'));

				$this->load->view('account/signin', $display);
			}
		} else {
			// If user not sign in
			$ref = $this->input->get('ref');
			$display = array('ref' => $ref);

			$this->load->view('account/signin', $display);
		}
	}

}

/* End of file signin.php */
/* Location: ./application/controllers/account/signin.php */