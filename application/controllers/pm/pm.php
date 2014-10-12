<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pm extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('pm_model');
		$this->load->model('user_model');
	}

	public function index() {
		redirect();
	}

	public function add($text,$target_user) {
		if ($this->input->post()) {
			$data = array(
			'from_user_id' => $this->session->userdata('id'),
			'text'=> $text,
			'to_user_id' = $target_user
		);
			$this->pm_model->add($data);
		} else {
			$this->load->view('user/createJob');
		}
		
	}


	// view only one job
	public function view($target_user) {
		$this->pm_model->view($target_user);
		$this->load->view('user/job',$data);
	}

	//view all job (all job in job's page)
	public function allChat() {
		$data = $this->pm_model->get_all();
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