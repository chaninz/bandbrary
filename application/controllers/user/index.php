<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($username) {
		redirect('/user/'.$username.'/timeline');
	}


}

/* End of file index.php */
/* Location: ./application/controllers/user/index.php */