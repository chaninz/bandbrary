<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('follow_model');
	}

	public function follow($user_id) {
		$current_id = $this->session->userdata('id');
		$ref = $this->input->get('ref');
		$this->follow_model->follow_band($current_id, $user_id);

		redirect($ref);
	}

	public function unfollow($user_id) {
		$current_id = $this->session->userdata('id');
		$ref = $this->input->get('ref');
		$this->follow_model->unfollow_band($current_id, $user_id);

		redirect($ref);
	}

}

/* End of file band.php */
/* Location: ./application/controllers/following/band.php */