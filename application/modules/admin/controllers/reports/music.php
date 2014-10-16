<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('report_music_model');
	}

	public function getAll() {
			$data = array('reports' => $this->report_music_model->get_all_report()
			);
			$this->load->view('reports/music',$data);
			
	}

	public function getApproved() {
			$this->report_music_model->get_approved_report();
	}
	public function getNotApprove() {
			$data = array('reports' => $this->report_music_model->get_not_approve_report()
			);
			$this->load->view('reports/music',$data);
	}


}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */