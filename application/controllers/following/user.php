<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('follow_model');
	}

	public follow($user_id) {
		$current_id = $this->session->userdata('id');
		$this->follow->follow_user($current_id, $user_id);
	}

	public unfollow($user_id) {
		$current_id = $this->session->userdata('id');
		$this->follow->follow_user($current_id, $user_id);
	}

}

/* End of file user.php */
/* Location: ./application/controllers/following/user.php */