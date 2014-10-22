<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('employment_model');

	}

	public function index($job_id) {
		$current_id = $this->session->userdata('id');

		if ( ! empty($job_id) && ! empty($current_id)) {
			$this->employment_model->request($job_id, $current_id);

			redirect(base_url('job/view/'.$job_id));
		} else {
			show_404();
		}
	}

}

/* End of file request.php */
/* Location: ./application/controllers/job/request.php */