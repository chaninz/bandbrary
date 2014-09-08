<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Greedd extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model','user');
	}

	public function index() {
		redirect();
	}

	public function greedd() {
		if ($this->input->post()) {
			$user_data = array(
			// edit user id to use session
				'id' => $this->session->userdata('id'),
				'music_id' => $this->input->post('music_id'),
				'greedd' => $this->input->post('greedd')
			);

			$this->user->greedd($user_data);
		} 
		
	}

	public function ungreedd() {
		if ($this->input->post()) {
			$user_data = array(
			// edit user id to use session
				'id' => $this->session->userdata('id'),
				'music_id' => $this->input->post('music_id'),
				'greedd' => $this->input->post('greedd')
			);

			$this->user->ungreedd($user_data);
		} 
	}

	

}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */