<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('event_model');
		$this->load->model('province_model');
	}

	public function add() {
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');

		$event = $this->input->post('event');
		$venue = $this->input->post('venue');
		$province_id = $this->input->post('province');
		$description = $this->input->post('description');
		$date = $this->input->post('date');
		$time = $this->input->post('time');

		if ( ! empty($event) && ! empty($venue) && ! empty($province_id) && ! empty($description) && ! empty($date) && 
			! empty($time) && ! empty($band_id) && $is_master == 1) {
			$time = str_replace('.', ':', $time);
			$data = array('band_id' => $band_id,
				'event' => $event,
				'venue' => $venue,
				'province_id' => $province_id,
				'description' => $description,
				'date' => $date,
				'time' => $time);

			$this->event_model->add($data, 2);

			redirect(base_url('band/' . $band_id . '/event'));
		} else {
			$provinces = $this->province_model->get_all();
			$display = array('provinces' => $provinces);

			$this->load->view('band/add_event', $display);
		}
	}

}

/* End of file band.php */
/* Location: ./application/controllers/event/band.php */