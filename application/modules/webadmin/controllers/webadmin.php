<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webadmin extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		redirect(base_url('webadmin/music/user'));
	}

}

/* End of file webadmin.php */
/* Location: ./application/modules/webadmin/controllers/webadmin.php */