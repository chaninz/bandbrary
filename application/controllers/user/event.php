<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('event_model');
		$this->load->model('join_band_model');
		$this->load->model('follow_model');
	}

	public function index($username) {
		// Basic data for user profile page
		$user_profile = $this->user_model->get_by_username($username);
		$band_profile = $this->join_band_model->get_current_band($user_profile->id);
		// Current user info
		$current_user_id = $this->session->userdata('id');
		$is_follow_user = $this->follow_model->is_follow_user($current_user_id, $user_profile->id);

		$data = array('user_profile' => $user_profile, 
			'band_profile' => $band_profile,
			'events' => $this->event_model->get_by_user($user_profile->id, 1),
			'is_follow_user' => $is_follow_user);

		$this->load->view('user/event', $data);
	}

	public function edit() {
		$id = $this->input->post('id');
		$data = array('event' => $this->input->post('event'),
			'description' => $this->input->post('description'),
			'venue' => $this->input->post('venue'),
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time'));
		$this->event->edit($id, $data, 1);
	}

	public function delete() {
		$post_id = $this->input->get('id');
		$this->event->delete($post_id, 1);
	}

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

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */