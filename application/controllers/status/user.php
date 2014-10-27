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
			echo $this->status_model->add($user_id, $status);
		}
	}

	public function get() {
		$user_id = $this->session->userdata('id');
		$status = $this->status_model->get_last($user_id);
	}

	public function all() {
		$user_id = $this->session->userdata('id');
		$status = $this->status_model->get_by_user($user_id);
		
		$display = array('status' => $status);
		$this->load->view('View File', $display);
	}

}

/* End of file user.php */
/* Location: ./application/controllers/status/user.php */