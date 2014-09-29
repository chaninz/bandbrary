<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('user_model');
	}

	public function index() {
		$user_id = $this->session->userdata('id');
		$jobs = $this->job_model->get_by_user($user_id);
		$data = array('jobs' => $jobs);
		$this->load->view('job/job', $data);
	}

}

/* End of file my.php */
/* Location: ./application/controllers/job/my.php */