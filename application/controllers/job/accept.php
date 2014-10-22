<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accept extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('employment_model');
	}

	public function index($job_id) {
		$current_id = $this->session->userdata('id');
		$user_id = $this->input->get('user');
		$job = $this->job_model->get($job_id);

		if ( ! empty($job_id) && ! empty($current_id) && ! empty($user_id) && ! empty($job)) {
			if ($job->user_id == $current_id) {
				$this->employment_model->accept($job_id, $user_id);
				
				redirect(base_url('job/view/'.$job_id));
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

}

/* End of file accept.php */
/* Location: ./application/controllers/job/accept.php */