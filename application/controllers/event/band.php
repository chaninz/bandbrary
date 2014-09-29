<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('event_model');
	}

	public function add() {
		if ($this->input->post()) {
			$band_id = $this->session->userdata('band_id');
			$user_data = array('band_id' => $band_id,
				'event' => $this->input->post('event'),
				'description' => $this->input->post('description'),
				'venue' => $this->input->post('venue'),
				'start_time' => $this->input->post('start_date').' '.$this->input->post('start_time'),
				'end_time' => $this->input->post('end_time'));
			$ref = $this->input->get('ref');
			//print_r($user_data);
			$this->event_model->add($user_data, 2);

			redirect($ref);
		} else {
			//redirect(base_url('user/event')); 
		}
	}

}

/* End of file band.php */
/* Location: ./application/controllers/event/band.php */