<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends CI_Controller {

	public function index() {
		$this->load->view('job/view');
	}

}

/* End of file view.php */
/* Location: ./application/controllers/job/view.php */