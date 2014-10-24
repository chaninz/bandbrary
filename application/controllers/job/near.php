<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Near extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('user_model');
	}

	public function index() {
		$province_id = $this->session->userdata('province_id');
		$jobs = $this->job_model->get_near($province_id);
		$data = array('jobs' => $jobs);
		$this->load->view('job/near', $data);
	}

}

/* End of file near.php */
/* Location: ./application/controllers/job/near.php */