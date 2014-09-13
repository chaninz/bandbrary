<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model','job');
	}

	public function index() {
		redirect();
	}

	public function add() {
		if ($this->input->post()) {
			$data = array(
			'user_id' => $this->session->userdata('id'),
			'event' => $this->input->post('event'),
			'job_type' => $this->input->post('job_type'),
			'style' => $this->input->post('style'),
			'description' => $this->input->post('description'),
			'venue' => $this->input->post('venue'),
			'province_id' => $this->input->post('province'),
			'budget' => $this->input->post('budget'),
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time')
		);
			$this->job->add($data);
		} else {
			redirect(base_url('user/add')); 
		}
		
	}

	public function edit() {
		if ($this->input->post()) {
			$data = array (
			'job_type' => $this->input->post('job_type'),
			'style' => $this->input->post('style'),
			'description' => $this->input->post('description'),
			'venue' => $this->input->post('venue'),
			'province' => $this->input->post('province'),
			'budget' => $this->input->post('budget'),
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time')
		);
			$this->job->edit($data);
		} else {
			$data = $this->job->getJob();
			$this->load->view('editJob',$data);
		}


	}

	public function delete($id) {
		$id = $this->input->post('id');
		$this->job->delete($id);
	}

	// view only one job
	public function view($id) {
		$data = $this->job->get($id);
		$this->load->view('temp/viewJob');
	}

	//view all job (all job in job's page)
	public function viewAll() {
		$data = $this->job->get_all();
		$this->load->view('temp/viewJob');
	}

}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */