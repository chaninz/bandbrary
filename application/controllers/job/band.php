<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
		$this->load->model('job_model');
		$this->load->model('employment_model');
		$this->load->model('band_employment_model');
	}

	public function near() {
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');
		$band = $this->band_model->get($band_id);

		if ( ! empty($band_id) && ! empty($is_master) && ! empty($band)) {
			$province_id = $band->province_id;
			$jobs = $this->job_model->get_near($province_id);

			$display = array('jobs' => $jobs);
			$this->load->view('job/near_band', $display);
		} else {
			show_404();
		}
	}

	public function interest() {
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');
		$band = $this->band_model->get($band_id);

		if ( ! empty($band_id) && ! empty($is_master) && ! empty($band)) {
			$request_jobs = $this->job_model->get_band_request($band_id);
			$confirm_jobs = $this->job_model->get_band_confirm($band_id);
			$reject_jobs = $this->job_model->get_band_reject($band_id);

			$display = array('request_jobs' => $request_jobs,
				'confirm_jobs' => $confirm_jobs,
				'reject_jobs' => $reject_jobs);
			$this->load->view('job/interest_band', $display);
		} else {
			show_404();
		}
	}

	public function request($job_id) {
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');
		$job = $this->job_model->get($job_id);

		if ( ! empty($band_id) && ! empty($is_master) && ! empty($job) && $job->status == 1) {
			$this->band_employment_model->request($job_id, $band_id);

			redirect(base_url('job/view/'.$job_id));
		} else {
			show_404();
		}
	}

	public function cancel($job_id) {
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');
		$job = $this->job_model->get($job_id);

		if ( ! empty($band_id) && ! empty($is_master) && ! empty($job) && $job->status == 1) {
			$this->band_employment_model->cancel($job_id, $band_id);

			redirect(base_url('job/view/'.$job_id));
		} else {
			show_404();
		}
	}

}

/* End of file band.php */
/* Location: ./application/controllers/job/band.php */