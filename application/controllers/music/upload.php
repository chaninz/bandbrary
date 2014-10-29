<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
		$this->load->model('join_band_model');
	}

	public function index() {
		if ($this->input->post()) {
			$music = array('name' => $this->input->post('name'),
				'lyric' => $this->input->post('lyric'),
				'visibility' => $this->input->post('visibility'),
				'album_id' => $this->input->post('album'),
				);
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