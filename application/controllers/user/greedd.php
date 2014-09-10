<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Greedd extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('greedd_model');
	}

	public function add() {
		if ($this->input->post()) {
			$user_data = array(
			// edit user id to use session
				'id' => $this->session->userdata('id'),
				'music_id' => 1
			);
			$this->greedd_model->add($user_data);
		}else{
			$this->load->model('greedd_model');
			$this->load->view('temp/greedd');
			} 
		
	}

	public function delete() {
		if ($this->input->post()) {
			$user_data = array(
			// edit user id to use session
				'id' => $this->session->userdata('id'),
				'music_id' => $this->input->post('music_id'),
				'greedd' => $this->input->post('greedd')
			);

			$this->greedd_model->delete($user_data);
		} 
	}

	

}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */