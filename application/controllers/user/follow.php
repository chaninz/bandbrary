<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Follow extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('follow_model');
	}

	public function add($follow_band) {
			$data = array(
				'user_id' => $this->session->userdata('id'),
				'follow_band' => $follow_band;	
			);
			$this->follow_model->add($data);
		
		
	}

	public function delete($follow_band) {
			$data = array(
				'id' => $this->session->userdata('id'),
				'follow_band' => $follow_band;	
			);
			$this->follow_model->delete($data);
		
	}

	

}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */