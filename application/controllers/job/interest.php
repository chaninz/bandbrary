<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interest extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('user_model');
	}

	public function index() {
		$current_id = $this->session->userdata('id');
		$request_jobs = $this->job_model->get_request($current_id);
		$confirm_jobs = $this->job_model->get_confirm($current_id);
		$reject_jobs = $this->job_model->get_reject($current_id);

		$display = array('request_jobs' => $request_jobs,
			'confirm_jobs' => $confirm_jobs,
			'reject_jobs' => $reject_jobs);
		$this->load->view('job/interest', $display);
	}


}

/* End of file interest.php */
/* Location: ./application/controllers/job/interest.php */