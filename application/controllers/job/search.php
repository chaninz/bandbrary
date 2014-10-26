<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
	}

	public function index() {
		$keyword = $this->input->post('keyword');

		if ( ! empty($keyword)) {
			$jobs = $this->job_model->search($keyword);
			$display = array('jobs' => $jobs,
				'keyword' => $keyword);

			$this->load->view('job/search', $display);
		} else {
			show_404();
		}
	}

	public function style($style_id) {
		if ( ! empty($style_id) && $style_id <= 9) {
			$jobs = $this->job_model->get_by_style($style_id);
			$styles = array(1 => 'บลูส์',
				2 => 'คันทรี',
				3 => 'ฮิปฮอป',
				4 => 'แจ๊ส',
				5 => 'ลาติน',
				6 => 'ป็อป',
				7 => 'เรกเก้',
				8 => 'อาร์แอนด์บี',
				9 => 'ร็อค');

			$keyword = $styles[$style_id];
			$display = array('jobs' => $jobs,
				'keyword' => $keyword);

			$this->load->view('job/search', $display);
		} else {
			show_404();
		}
	}

}

/* End of file search.php */
/* Location: ./application/controllers/job/search.php */