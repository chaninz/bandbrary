<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('status_model');
	}

	public function add() {
		$user_id = $this->session->userdata('id');
		$status = $this->input->post('status');
		if ( ! empty($status)) {
			echo $this->status_model->add_user_status($user_id, $status);
		}
	}

}

/* End of file user.php */
/* Location: ./application/controllers/status/user.php */