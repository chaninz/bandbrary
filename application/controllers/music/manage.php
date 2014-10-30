<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('music_model');
	}

	public function index() {
		if ($this->input->post()) {
			$current_id = $this->session->userdata('id');
			$data = array(
				'current_id' => $current_id ,
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('licenese'),
				'visibility' => $this->input->post('visibility')
			);
			$this->music_model->add($data);
		}
		else{
			 $this->load->view('user/manageMusic');
		}
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */