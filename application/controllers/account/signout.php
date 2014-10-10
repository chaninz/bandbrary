<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signout extends CI_Controller {

	public function index() {
		$this->session->sess_destroy();
		delete_cookie('id');
		redirect(''); 
	}

}

/* End of file signout.php */
/* Location: ./application/controllers/account/signout.php */