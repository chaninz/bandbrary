<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('report_post_model');
	}

	public function getAll() {
			$data = array('reports' => $this->report_post_model->get_all_report()
			);
			$this->load->view('reports/post/all',$data);
	}

	public function getApproved() {
			$data = array('reports' => $this->report_post_model->get_approved_report()
			);
			$this->load->view('reports/post/approved',$data);
	}
	public function getNotApprove() {
			$data = array('reports' => $this->report_post_model->get_not_approve_report()
			);
			$this->load->view('reports/post/notapprove',$data);
	}


}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */