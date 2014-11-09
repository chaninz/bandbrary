<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reject extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('employment_model');
		$this->load->model('band_employment_model');
	}

	public function index($job_id) {
		$current_id = $this->session->userdata('id');
		$user_id = $this->input->get('user');
		$band_id = $this->input->get('band');
		$job = $this->job_model->get($job_id);

		if ( ! empty($job_id) && ! empty($current_id) && ! empty($job) && $job->user_id == $current_id) {
			if ( ! empty($user_id)) {
				$this->employment_model->reject($job_id, $user_id);
				
				redirect(base_url('job/view/'.$job_id));
			} elseif ( ! empty($band_id)) {
				$this->band_employment_model->reject($job_id, $band_id);
				
				redirect(base_url('job/view/'.$job_id));
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

}

/* End of file reject.php */
/* Location: ./application/controllers/job/reject.php */