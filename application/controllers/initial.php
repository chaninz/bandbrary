<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Initial extends CI_Controller {

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

			// Insert styles and skills to database
			if ($this->session->userdata('user_type') == 2) {
				$data['style_id'] = $this->input->post('style');
				$this->skill_model->add($id, $this->input->post('skill'));
			}

			$this->user_model->update_profile($id, $data);
		} else {
			$this->load->view('initial');
		}
	}

}

/* End of file initial.php */
/* Location: ./application/controllers/initial.php */