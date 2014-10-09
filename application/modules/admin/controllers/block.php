<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Block extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($band_id) {
		if ($this->input->post()) {
			$data = array(
			'user_report' => $this->session->userdata('id'),
			'band_id' => $band_id,
			'report_type' => $this->input->post('report_type')
		);
			$this->report_band_model->add($data);
		}
	}


}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */