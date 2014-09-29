<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
	}

	public function index() {
		if ($this->input->post()) {
			// edit band to get band name from session
			$band = array(
				'name' => $this->input->post('name'),
				'biography' => $this->input->post('biography'),
				'style_id' => $this->input->post('style'),
				'fb_url' => $this->input->post('fburl'),
				'tw_url' => $this->input->post('twurl'),
				'yt_url' => $this->input->post('yturl'));
			$this->band_model->edit($band);

			redirect(base_url('band/edit'));
		} else {
			$band_id = $this->session->userdata('band_id');
			$band_profile = $this->band_model->get($band_id);
			
			$this->load->view('band/edit', $band_profile);
		}
	}

}

/* End of file edit.php */
/* Location: ./application/controllers/band/edit.php */