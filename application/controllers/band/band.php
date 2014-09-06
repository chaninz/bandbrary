<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
	}

	public function index() {
		echo 'test';
	}

	public function create() {
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
			echo 'no data input';
		}
	}

	public function edit() {
		if ($this->input->post()) {
			// edit band to get band name from session
			$band = array('name' => $this->input->post('name'),
				'biography' => $this->input->post('biography'),
				'style' => $this->input->post('style'),
				'fb_url' => $this->input->post('fburl'),
				'tw_url' => $this->input->post('twurl'),
				'yt_url' => $this->input->post('yturl'));
			$this->band_model->edit($band);
		} else {
			echo 'no data input';
		}
	}

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */