<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('report_post_model');
	}

	public function index() {
		if ($this->input->post()) {
			$data = array(
				'user_report' => $this->session->userdata('id'),
				'post_id' => $this->input->post('postid'),
				'type' => $this->input->post('type')
			);
			 $this->report_post_model->add($data);
			 $band = $this->report_post_model->getBand($data['post_id']);
			//print_r($band->band_id);
			redirect('/band/'.$band->band_id.'/timeline');
		}
	}

}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */