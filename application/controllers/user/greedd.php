<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Greedd extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('greedd_model');
	}

	public function add($music_id) {
			$data = array(
				'user_id' => $this->session->userdata('id'),
				'music_id' => $music_id	
			);
			$this->greedd_model->add($data);
		
		
	}

	public function delete($music_id) {
			$data = array(
				'id' => $this->session->userdata('id'),
				'music_id' => $music_id
			);
			$this->greedd_model->delete($data);
		
	}

	

}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */