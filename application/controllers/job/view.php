<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('employment_model');
		$this->load->model('band_employment_model');
		$this->load->model('user_model');
		$this->load->model('join_band_model');
	}

	public function index($job_id) {
		$current_id = $this->session->userdata('id');
		$band_id = $this->session->userdata('band_id');
		$job = $this->job_model->get($job_id);
		$job_requests = $this->employment_model->get_request($job_id);
		$current_employment_status = $this->employment_model->get_status($job_id, $current_id);
		$current_band_employment_status = $this->band_employment_model->get_status($job_id, $band_id);

		if ( ! empty($job)) {
			$current_job_owner_band = $this->join_band_model->get_current_band(1);
			$display = array('job' => $job,
				'job_requests' => $job_requests,
				'current_employment_status' => $current_employment_status,
				'current_band_employment_status' => $current_band_employment_status,
				'current_job_owner_band' => $current_job_owner_band);
			
			$this->load->view('job/view', $display);
		} else {
			show_404();
		}
	}

}

/* End of file view.php */
/* Location: ./application/controllers/job/view.php */