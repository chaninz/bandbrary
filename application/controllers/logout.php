<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index() {
		$this->load->model('user');
		$this->session->sess_destroy();
		redirect(base_url('home')); 
	}

}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */