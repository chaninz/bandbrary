<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index() {
		if ($this->input->post()) {
			$data = array(
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'province_id' => $this->input->post('province'),
				'user_type' => $this->input->post('usertype'),
				'biography' => $this->input->post('biography'),
				'cover_url' => $this->input->post('cover'),
				'photo_url' => $this->input->post('photo'),
				'fb_url' => $this->input->post('fburl'),
				'tw_url' => $this->input->post('twurl'),
				'yt_url' => $this->input->post('yturl'),
				'dob' => $this->input->post('dob'));
			$this->user_model->updateProfile($data);
		} else {
			$data = $this->user_model->getProfile();
			//echo print_r($data);
			$this->load->view('account/edit', $data);
		}
	}
	

}

/* End of file edit.php */
/* Location: ./application/controllers/account/edit.php */