<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('event_model');
		$this->load->model('join_band_model');
		$this->load->model('follow_model');
		$this->load->model('status_model');
		$this->load->model('event_model');
		$this->load->model('province_model');
	}

	public function add() {
		$user_id = $this->session->userdata('id');
		$username = $this->session->userdata('username');

		$event = $this->input->post('event');
		$venue = $this->input->post('venue');
		$province_id = $this->input->post('province');
		$description = $this->input->post('description');
		$date = $this->input->post('date');
		$time = $this->input->post('time');

		if ( ! empty($event) && ! empty($venue) && ! empty($province_id) && ! empty($description) && ! empty($date) && 
			! empty($time)) {
			$time = str_replace('.', ':', $time);
			$user_data = array('user_id' => $user_id,
				'event' => $event,
				'venue' => $venue,
				'province_id' => $province_id,
				'description' => $description,
				'date' => $date,
				'time' => $time);

			$this->event_model->add($user_data, 1);

			redirect(base_url('user/'.$username.'/event'));
		} else {
			show_404();
		}
	}

	public function edit($event_id) {
		$event = $this->event_model->get($event_id, 1);

		if ( ! empty($event_id) && ! empty($event)) {
			$current_id = $this->session->userdata('id');
			$user_id = $event->user_id;
			$username = $this->session->userdata('username');

			$name = $this->input->post('event');
			$venue = $this->input->post('venue');
			$province_id = $this->input->post('province');
			$description = $this->input->post('description');
			$date = $this->input->post('date');
			$time = $this->input->post('time');

			if ( ! empty($name) && ! empty($venue) && ! empty($province_id) && ! empty($description) && ! empty($date) && 
				! empty($time) && $user_id == $current_id) {
				$time = str_replace('.', ':', $time);
				$data = array('event' => $name,
					'venue' => $venue,
					'province_id' => $province_id,
					'description' => $description,
					'date' => $date,
					'time' => $time);

				$this->event_model->edit($event_id, $data, 1);

				redirect(base_url('user/'.$username.'/event'));
			} else if ($user_id == $current_id) {
				// Basic data for user profile page
				$user_profile = $this->user_model->get($event->user_id);
				$band_profile = $this->join_band_model->get_current_band($user_profile->id);
				$status = $this->status_model->get_last($user_profile->id);
				// Current user info
				$current_user_id = $this->session->userdata('id');
				$is_follow_user = $this->follow_model->is_follow_user($current_user_id, $user_profile->id);

				$provinces = $this->province_model->get_all();
				

				$data = array('user_profile' => $user_profile, 
					'band_profile' => $band_profile,
					'status' => $status,
					'event' => $event,
					'provinces' => $provinces,
					'is_follow_user' => $is_follow_user);

				$this->load->view('user/edit_event', $data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function delete($event_id) {
		$user_id = $this->session->userdata('id');
		$username = $this->session->userdata('username');

		if ( ! empty($event_id)) {
			$event = $this->event_model->get($event_id, 1);
			if ( ! empty($event) && $user_id == $event->user_id) {
				$this->event_model->delete($event_id, 1);
			} else {
				show_404();
			}

			redirect(base_url('user/'.$username.'/event'));
		} else {
			show_404();
		}
	}

//-------------------

	public function view() {
		$user_id = array('user_id' => $this->input->get('user_id'));
		$user_type = 1;
		$query = $this->event->get_by_user($user_id, $user_type);
		// test to print. pls edit to sent data to view
		foreach ($query->result() as $row) {
				echo $row->user_id.' ';
				echo $row->event.'<br/>';
		}
	}

}

/* End of file user.php */
/* Location: ./application/controllers/event/user.php */