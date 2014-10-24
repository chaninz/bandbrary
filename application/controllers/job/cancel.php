<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cancel extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('employment_model');
	}

	public function index($job_id) {
		$current_id = $this->session->userdata('id');
		$user_type = $this->session->userdata('user_type');

		if ( ! empty($job_id) && ! empty($current_id) && $user_type == 2) {
			$this->employment_model->cancel($job_id, $current_id);

			redirect(base_url('job/view/'.$job_id));
		} else {
			show_404();
		}
	}

}

/* End of file cancel.php */
/* Location: ./application/controllers/job/cancel.php */