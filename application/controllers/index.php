<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function index() {
		if ($this->session->userdata('email')) {
			// Check if signed in
			$username = $this->session->userdata('username');
			$name = $this->session->userdata('name');
			$surname = $this->session->userdata('surname');

			if (empty($name) && empty($surname)) {
				// First time signin, forward to initial page to complete the profile
				redirect('account/start');
			} else {
				redirect('user/'.$username);
			}
		} else {
			$this->load->view('index');
		}
	}




}

/* End of file index.php */
/* Location: ./application/controllers/index.php */