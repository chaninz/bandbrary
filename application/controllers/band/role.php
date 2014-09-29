<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
	}

	public function index() {
		if ($this->input->post()) {
			$band = array('name' => $this->input->post('name'),
				'biography' => $this->input->post('biography'),
				'style' => $this->input->post('style'),
				'fb_url' => $this->input->post('fburl'),
				'tw_url' => $this->input->post('twurl'),
				'yt_url' => $this->input->post('yturl'));
			if ($this->band_model->is_exist($band['name']) == 0) {
				$this->band_model->create($band);
				echo 'success';
			} else {
				echo 'cannot create band';
			}
		} else {
			$this->load->view('band/create');
		}
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */