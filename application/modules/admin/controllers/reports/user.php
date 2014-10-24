<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('report_user_model');
	}

	public function getAll() {
		$data = array('reports' => $this->report_user_model->get_all_report()
		);	
		$this->load->view('reports/user/all',$data);
	}

	public function getApproved() {
		$data = array('reports' => $this->report_user_model->get_approved_report()
		);	
		$this->load->view('reports/user/approved',$data);
	}

	public function getNotApprove() {
		$data = array('reports' => $this->report_user_model->get_not_approve_report()
		);	
		$this->load->view('reports/user/notapprove',$data);
	}

}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */