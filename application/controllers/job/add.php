<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
	}

	public function index() {
		if ($this->input->post()) {
			$data = array(
			'user_id' => $this->session->userdata('id'),
			'name' => $this->input->post('name'),
			'job_type' => $this->input->post('job_type'),
			'style' => $this->input->post('style'),
			'description' => $this->input->post('description'),
			'venue' => $this->input->post('venue'),
			'province_id' => $this->input->post('province'),
			'budget' => $this->input->post('budget'),
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time'));
			$this->job_model->add($data);
		} else {
			$this->load->view('job/add');
		}
		
	}

}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */