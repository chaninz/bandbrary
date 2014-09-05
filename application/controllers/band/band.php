<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model','band');
	}

	public function index() {
		echo 'test';
	}

	public function create() {
		$data = array(
			'name' => $this->input->post('name'),
			'biography' => $this->input->post('biography'),
			'style' => $this->input->post('style'),
			'fb_url' => $this->input->post('fburl'),
			'tw_url' => $this->input->post('twurl')
		);
		$this->band->create($data);
	}

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */