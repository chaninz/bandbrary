<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('user_model');
	}

	public function index($job_id) {
		$current_id = $this->session->userdata('id');
		$ref = $this->input->get('ref');
		$this->job_model->request(array('job_id' => $job_id,
			'user_id' => $current_id,
			'status' => 1));

		//redirect($ref);
	}

}

/* End of file request.php */
/* Location: ./application/controllers/job/request.php */