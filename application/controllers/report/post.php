<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('report_post_model');
	}

	public function index() {
		echo $this->input->post('postid');
		if ($this->input->post()) {
			$data = array(
			'user_report' => $this->session->userdata('id'),
			'post_id' => $this->input->post('postid'),
			'type' => $this->input->post('type')
		);
			print_r($data);
			$this->report_post_model->add($data);
		}
	}

}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */