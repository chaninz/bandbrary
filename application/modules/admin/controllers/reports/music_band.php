<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music_Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('report_music_band_model');
	}

	public function getAll() {
			$data = array('reports' => $this->report_music_band_model->get_all_report()
			);
			$this->load->view('reports/music/all',$data);
			
	}

	public function getApproved() {
			$data = array('reports' => $this->report_music_band_model->get_approved_report()
			);
			$this->load->view('reports/music/approved',$data);

	}
	public function getNotApprove() {
			$data = array('reports' => $this->report_music_band_model->get_not_approve_report()
			);
			$this->load->view('reports/music/notapprove',$data);
	}


}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */