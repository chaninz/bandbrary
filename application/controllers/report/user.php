<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($post_id) {
		if ($this->input->post()) {
			$data = array(
			'user_report' => $this->session->userdata('id'),
			'user_id' => $post_id
			'report_type' => $this->input->post('report_type')
		);
			$this->report_model->add($data);
		}
	}

}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */