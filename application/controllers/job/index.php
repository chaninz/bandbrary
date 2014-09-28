<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model','job');
		$this->load->model('user_model');
	}

	public function index() {
		$jobs = $this->job->get_all();
		$data = array('jobs' => $jobs);
		$this->load->view('job/job', $data);
	}

	public function edit($id=0) {
		if ($this->input->post()) {
			$data = array (
			'job_type' => $this->input->post('job_type'),
			'style' => $this->input->post('style'),
			'description' => $this->input->post('description'),
			'venue' => $this->input->post('venue'),
			'province_id' => $this->input->post('province'),
			'budget' => $this->input->post('budget'),
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time')
		);
			$id = $this->input->post('id');
			$this->job->edit($data,$id);
		} else {
			$data = $this->job->get($id);
			$this->load->view('job/editJob',$data);
		}

	}

	public function delete($id) {
		$id = $this->input->post('id');
		$this->job->delete($id);
	}

	// view only one job
	public function view() {
		$my_id = $this->session->userdata('id');
		$job = $this->job->get_all();
		$data = array(
		'name' => $this->session->userdata('name'),
		'photo_url' => $this->session->userdata('photo_url'),
		'user' => $this->user_model->getProfile($my_id),
		'jobs' => $job,
		'countJob' => $this->job->countJob()
		);
		//print_r($data);
		$this->load->view('job/job',$data);
	}

	public function get(){
		$job_id = $this->input->post('id');
		$job = $this->job->get($job_id);
		echo json_encode($job);
	}
}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */