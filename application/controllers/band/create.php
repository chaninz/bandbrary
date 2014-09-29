<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
		$this->load->model('join_band_model');
	}

	public function index() {
		if ($this->input->post()) {
			$band = array('name' => $this->input->post('name'),
				'biography' => $this->input->post('biography'),
				'province_id' => $this->input->post('province'),
				'style_id' => $this->input->post('style'),
				'fb_url' => $this->input->post('fburl'),
				'tw_url' => $this->input->post('twurl'),
				'yt_url' => $this->input->post('yturl'));
			if ($this->band_model->is_exist($band['name']) == 0) {
				$this->band_model->add($band);

				$position = $this->input->post('position');
				$current_id = $this->session->userdata('id');
				$band_profile = $this->band_model->get_by_name($band['name']);
				$data = array('band_id' => $band_profile->id,
					'user_id' => $current_id,
					'position' => $position,
					'status' => 2,
					'is_master' => 1);
				$this->join_band_model->join($data);
				
				redirect(base_url('account/signout'));
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