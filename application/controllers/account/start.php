<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('skill_model');
	}

	public function index()	{
		if ($this->input->post()) {
			$data = array('name' => $this->input->post('name'),
			 'surname' => $this->input->post('surname'),
			 'dob' => $this->input->post('dob'),
			 'province_id' => $this->input->post('province'),
			 'biography' => $this->input->post('biography'),
			 'fb_url' => $this->input->post('fburl'),
			 'tw_url' => $this->input->post('twurl'),
			 'yt_url' => $this->input->post('yturl'));
			$id = $this->session->userdata('id');

			if ($this->session->userdata('user_type') == 2) {
				// Insert styles and skills to database
				$data['style_id'] = $this->input->post('style');
				$this->skill_model->add($id, $this->input->post('skill'));
			}

			$this->user_model->update($id, $data);
			//redirect('')
		} else {
			$this->load->view('account/start');
		}
	}

}

/* End of file start.php */
/* Location: ./application/controllers/account/start.php */