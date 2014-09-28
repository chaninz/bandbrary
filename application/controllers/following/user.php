<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('follow_model');
	}

	public function follow($user_id) {
		$current_id = $this->session->userdata('id');
		$ref = $this->input->get('ref');
		$this->follow_model->follow_user($current_id, $user_id);

		redirect($ref);
	}

	public function unfollow($user_id) {
		$current_id = $this->session->userdata('id');
		$ref = $this->input->get('ref');
		$this->follow_model->unfollow_user($current_id, $user_id);

		redirect($ref);
	}

}

/* End of file user.php */
/* Location: ./application/controllers/following/user.php */