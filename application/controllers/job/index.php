<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('user_model');
	}
	
	public function all() {
		$jobs = $this->job_model->get_current_all();

		$display = array('jobs' => $jobs);
		$this->load->view('job/all', $display);
	}
}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */