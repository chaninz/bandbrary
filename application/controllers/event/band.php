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

	public function edit($event_id) {
		$event = $this->event_model->get($event_id, 2);

		if ( ! empty($event_id) && ! empty($event)) {
			$current_band_id = $this->session->userdata('band_id');
			$is_master = $this->session->userdata('is_master');
			$band_id = $event->band_id;
			$username = $this->session->userdata('username');

			$name = $this->input->post('event');
			$venue = $this->input->post('venue');
			$province_id = $this->input->post('province');
			$description = $this->input->post('description');
			$date = $this->input->post('date');
			$time = $this->input->post('time');

			if ( ! empty($name) && ! empty($venue) && ! empty($province_id) && ! empty($description) && ! empty($date) && 
				! empty($time) && ! empty($current_band_id) && ! empty($is_master) && $band_id == $current_band_id && $is_master == 1) {
				$time = str_replace('.', ':', $time);
				$data = array('event' => $name,
					'venue' => $venue,
					'province_id' => $province_id,
					'description' => $description,
					'date' => $date,
					'time' => $time);

				$this->event_model->edit($event_id, $data, 2);

				redirect(base_url('band/' . $band_id . '/event'));
			} else if ($band_id == $current_band_id) {
				$provinces = $this->province_model->get_all();

				$display = array('event' => $event,
					'provinces' => $provinces);

				$this->load->view('band/edit_event', $display);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function delete($event_id) {
		$current_band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');

		if ( ! empty($event_id)) {
			$event = $this->event_model->get($event_id, 2);
			$band_id = $event->band_id;

			if ( ! empty($band_id) && ! empty($is_master) && $band_id == $current_band_id && $is_master == 1) {
				$this->event_model->delete($event_id, 2);
			} else {
				show_404();
			}

			redirect(base_url('band/' . $band_id . '/event'));
		} else {
			show_404();
		}
	}

}

/* End of file band.php */
/* Location: ./application/controllers/event/band.php */