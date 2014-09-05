<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('event_model','event');
	}

	public function index() {
		redirect();
	}

	public function add() {
		if ($this->input->post()) {
			$user_data = array(
			// edit user id to use session
				'user_id' => $this->input->post('user_id'),
				'event' => $this->input->post('event'),
				'description' => $this->input->post('description'),
				'venue' => $this->input->post('venue'),
				'start_time' => $this->input->post('start_time'),
				'end_time' => $this->input->post('end_time'));
			$user_type = 1;
			$this->event->add($user_data, $user_type);
		} else {
			redirect(base_url('user/event')); 
		}
		
	}

	public function edit() {
		$id = array('id' => $this->input->post('id'),
			// edit user id to use session
			'user_id' => $this->input->post('user_id'));
		$data = array('event' => $this->input->post('event'),
			'description' => $this->input->post('description'),
			'venue' => $this->input->post('venue'),
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time'));
		$user_type = 1;
		$this->event->edit($data, $user_type, $id);
	}

	public function delete() {
		$post_id = array('id' => $this->input->get('post_id'));
		$user_type = 1;
		$this->event->delete($post_id, $user_type);
	}

	public function view() {
		// edit user id to use session
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