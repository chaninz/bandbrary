<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('pm_model');
		$this->load->model('user_model');
	}

	public function index() {
		redirect();
	}

	public function add() {
		if ($this->input->post()) {
			$data = array(
			'user_id' => $this->session->userdata('id'),
			'name' => $this->input->post('name'),
			'end_time' => $this->input->post('end_time')
		);
			$this->job->add($data);
		} else {
			// redirect(base_url('user/add')); 
			$this->load->view('user/createJob');
		}
		
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
		$this->load->view('user/job',$data);
	}

	//view all job (all job in job's page)
	public function viewAll() {
		$data = $this->job->get_all();
		$this->load->view('temp/viewJob');
	}

	public function get(){
		$job_id = $this->input->post('id');
		$job = $this->job->get($job_id);
		echo json_encode($job);
	}
}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */