<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Followband extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('follow_band_model');
	}

	public function follow($follow_band) {
			$data = array(
				'user_id' => $this->session->userdata('id'),
				'follow_band' => $follow_band	
			);
			$this->follow_band_model->follow($data);
		
		
	}

	public function unfollow($follow_band) {
			$data = array(
				'id' => $this->session->userdata('id'),
				'follow_band' => $follow_band	
			);
			$this->follow_band_model->unfollow($data);
		
	}

	

}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */