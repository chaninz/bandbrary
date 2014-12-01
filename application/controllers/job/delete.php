<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('employment_model');
	}

	public function index($job_id) {
		$current_id = $this->session->userdata('id');
		$job = $this->job_model->get($job_id);

		if ( ! empty($job_id) && ! empty($current_id) && ! empty($job)) {
			if ($job->user_id == $current_id && $job->status = 1) {
				$this->job_model->delete($job_id);
				
				redirect(base_url('job'));
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

}

/* End of file delete.php */
/* Location: ./application/controllers/job/delete.php */