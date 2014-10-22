<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Open extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
	}

	public function index($job_id) {
		$current_id = $this->session->userdata('id');
		$job = $this->job_model->get($job_id);

		if ( ! empty($job_id) && ! empty($current_id) && ! empty($job)) {
			if ($job->user_id == $current_id) {
				$this->job_model->open($job_id);
				
				redirect(base_url('job/view/'.$job_id));
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

}

/* End of file open.php */
/* Location: ./application/views/job/open.php */