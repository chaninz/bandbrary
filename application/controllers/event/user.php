<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('event_model');
	}

	public function add() {
		if ($this->input->post()) {
			$user_id = $this->session->userdata('id');
			$user_data = array('user_id' => $user_id,
				'event' => $this->input->post('event'),
				'description' => $this->input->post('description'),
				'venue' => $this->input->post('venue'),
				'start_time' => $this->input->post('start_date').' '.$this->input->post('start_time'),
				'end_time' => $this->input->post('end_time'));
			$ref = $this->input->get('ref');
			//print_r($user_data);
			$this->event_model->add($user_data, 1);

			redirect($ref);
		} else {
			//redirect(base_url('user/event')); 
		}
	}

}

/* End of file user.php */
/* Location: ./application/controllers/event/user.php */