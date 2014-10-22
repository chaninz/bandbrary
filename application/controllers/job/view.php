<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('user_model');
	}

	// public function index() {
	// 	$this->load->view('job/view');
	// }

	public function index($job_id) {
		$job = $this->job_model->get($job_id);
		$job_requests = $this->job_model->get_request_user($job_id);
		print_r($job_requests);
		if ( ! empty($job)) {
			$display = array('job' => $job,
				'job_requests' => $job_requests);
			print_r($display);
			$this->load->view('job/view', $display);
		} else {
			show_404();
		}
	}

	public function accept($user_id) {
		if ($this->input->get()) {
			$ref = $this->input->get('ref');
			$this->job_model->accept($user_id, $band_id);

			redirect($ref);
		}
	}

	public function reject($user_id) {
		if ($this->input->get()) {
			$ref = $this->input->get('ref');
			$band_id = $this->session->userdata('band_id');
			$this->job_model->reject($user_id, $band_id);

			redirect($ref);
		}
	}

}

/* End of file view.php */
/* Location: ./application/controllers/job/view.php */