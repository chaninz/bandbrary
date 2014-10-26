<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('report_band_model');

	}

	public function index() {
		if ($this->input->post()) {
			$data = array(
			'user_report' => $this->session->userdata('id'),
			'band_id' => $this->input->post('bandid'),
			'type' => $this->input->post('type')
		);
			print_r($data);
			$this->report_band_model->add($data);
		}
	}


}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */