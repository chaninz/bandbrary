<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()	{
		show_404();
	}

}

/* End of file index.php */
/* Location: ./application/controllers/account/index.php */