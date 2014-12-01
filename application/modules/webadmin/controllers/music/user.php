<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_music_report_model');
		$this->load->model('user_music_model');
	}

	public function index() {
		$this->view();
	}

	public function view() {
		$reports = $this->user_music_report_model->get_all_report();
		$display = array('reports' => $reports,
			'header' => 'รายงานเกี่ยวกับเพลงของนักดนตรี',
			'type' => 1);
		
		$this->load->view('music_report', $display);
	}

	public function accept($report_id) {
		if ( ! empty($report_id)) {
			$this->user_music_report_model->accept($report_id);
		}
		redirect(base_url('webadmin/music/user'));
	}

	public function delete($report_id) {
		$report = $this->user_music_report_model->get($report_id);
		if ( ! empty($report_id) && ! empty($report)) {
			$this->user_music_report_model->delete($report_id);
			$this->user_music_model->delete($report->music_id);
		}
		redirect(base_url('webadmin/music/user'));
	}

}

/* End of file music.php */
/* Location: ./application/modules/webadmin/controllers/music.php */