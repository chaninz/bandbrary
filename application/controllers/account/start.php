<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('style_model');
		$this->load->model('skill_model');
		$this->load->model('province_model');
	}

	public function index()	{
		$name = $this->session->userdata('name');
		$surname = $this->session->userdata('surname');

		if ( ! empty($name) && ! empty($surname)) {
			// Initialized
			redirect('');
		} else if ($this->input->post()) {
			// Receive data from form
			$user_id = $this->session->userdata('id');
			$name = $this->input->post('name');
			$surname = $this->input->post('surname');
			$dob = $this->input->post('dob');
			$province_id = $this->input->post('province');
			$user_type = $this->session->userdata('user_type');

			if ( ! empty($name) && ! empty($surname) && ! empty($dob) && ! empty($province_id)) {
				$data = array('name' => $name,
					'surname' => $surname,
					'dob' => $dob,
					'province_id' => $province_id,
					'biography' => $this->input->post('biography'),
					'fb_url' => $this->input->post('fburl'),
					'tw_url' => $this->input->post('twurl'),
					'yt_url' => $this->input->post('yturl'));

				$styles = $this->input->post('style');
				$skills = $this->input->post('skill');

				if ($user_type == 2 && ! empty($styles) && ! empty($skills)) {
					// Insert styles and skills to database
					$this->style_model->add($user_id, $styles);
					$this->skill_model->add($user_id, $skills);
				}
				
				$this->user_model->update($user_id, $data);
				$user = $this->utils->refresh_user($user_id);
				redirect(base_url('user/'.$user['username']));
			} else {
				show_404();
			}
		} else {
			$provinces = $this->province_model->get_all();
			$this->load->view('account/start', array('provinces' => $provinces));
		}
	}

}

/* End of file start.php */
/* Location: ./application/controllers/account/start.php */