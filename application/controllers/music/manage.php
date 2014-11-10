<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->model('music_model');
	}

	public function index() {
		 $this->load->view('user/manageMusic');
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */