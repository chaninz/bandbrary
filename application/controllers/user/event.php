<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_events_model','event');
		$this->load->model('user_model');
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

	// public function view($event_id){
	// 	$data = array (
	// 	'event' => $this->event->getEvent($event_id),
	// 	'id' => $this->session->userdata('id'),
	// 	'name' => $this->session->userdata('name'),
	// 	'photo_url' => $this->session->userdata('photo_url')

	// 	);
	// 	print_r($data);
	// }

	public function viewAll($id){
		$my_id = $this->session->userdata('id');
		$data = array (
		'event' => $this->event->getAll($id),
		// 'user_id' => $this->session->userdata('id'),
		// 'name' => $this->session->userdata('name'),
		// 'surname' => $this->session->userdata('surname'),
		// 'photo_url' => $this->session->userdata('photo_url'),
		// 'cover_url' => $this->session->userdata('cover_url'),
		// 'biography' => $this->session->userdata('biography'),
		// 'fb_url' => $this->session->userdata('fb_url'),
		// 'tw_url' => $this->session->userdata('tw_url'),
		// 'yt_url' => $this->session->userdata('yt_url'),
		'member' => $this->user_model->getProfile($id),
		'band_name' => $this->session->userdata('band_name'),
		'user' => $this->user_model->getProfile($my_id)

		);
		// $this->load->view('headerBar',$data);
		$this->load->view('user/event',$data);
		//$this->load->view('coverSection');
		//$this->load->view('band/post',$data);

	}
}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */