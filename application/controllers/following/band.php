<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('follow_model');
	}

	public follow($user_id) {
		$current_id = $this->session->userdata('id');
		$this->follow->follow_band($current_id, $user_id);
	}

	public unfollow($user_id) {
		$current_id = $this->session->userdata('id');
		$this->follow->follow_band($current_id, $user_id);
	}

}

/* End of file band.php */
/* Location: ./application/controllers/following/band.php */