<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('user_model');
	}

	public function index() {
		$jobs = $this->job_model->get_near(50);
		$data = array('jobs' => $jobs);
		$this->load->view('job/job', $data);
	}

	public function get(){
		$job_id = $this->input->post('id');
		$job = $this->job->get($job_id);
		echo json_encode($job);
	}
}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */