<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('report_band_model');

	}

	public function getAll() {
			$data = array('reports' => $this->report_band_model->get_all_report()
			);
			$this->load->view('reports/band',$data);
	}

	public function getApproved() {
			$this->report_band_model->get_approved_report();
	}
	public function getNotApprove() {
			$this->report_band_model->get_not_approve_report();
	}


}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */