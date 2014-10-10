<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_User extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function getAll() {
			$this->report_user_model->get_all_report();
	}

	public function getApproved() {
			$this->report_user_model->get_approved_report();
	}
	public function getNotApprove() {
			$this->report_user_model->get_not_approve_report();
	}


}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */