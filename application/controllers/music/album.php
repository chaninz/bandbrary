<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class album extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_album_model');
	}

	// public function index() {
	// 	if ($this->input->post()) {
	// 		$current_id = $this->session->userdata('id');
	// 		$data = array(
	// 			'current_id' => $current_id ,
	// 			'name' => $this->input->post('name'),
	// 			'album_id' => $this->input->post('album'),	
	// 			'lyric' => $this->input->post('lyric'),
	// 			'license_type' => $this->input->post('licenese'),
	// 			'visibility' => $this->input->post('visibility')
	// 		);
	// 		$this->music_model->add($data);
	// 	}
	// 	else{
	// 		 $this->load->view('user/uploadMusic');
	// 	}
	// }

	public function create(){
		if ($this->input->post()) {
			$current_id = $this->session->userdata('id');
			$data = array(
				'current_id' => $current_id ,
				'name' => $this->input->post('name'),
				'band_id' => $this->input->post('lyric'),
				'cover_url' => $this->input->post('licenese')
			);
			$this->music_model->add($data);
		}
		else{
			 $this->load->view('user/createAlbum');
		}
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */