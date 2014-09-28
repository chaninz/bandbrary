<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function user($username) {
		$user_profile = $this->user_model->get_by_username($username);
		if ($user_profile) {
			redirect('/user/'.$username.'/timeline');
		} else {
			show_404();
		}
		
	}


}

/* End of file index.php */
/* Location: ./application/controllers/user/index.php */