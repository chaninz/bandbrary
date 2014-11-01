<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_music_model');
		$this->load->model('band_album_model');

	}

	public function index() {
		 $this->load->view('user/manageMusic');
	}
	
	public function upload() {
		if ($this->input->post()) {
			$band_id = $this->session->userdata('band_id');
			$data = array(
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('licenese'),
				'visibility' => $this->input->post('visibility')
			);
			$this->band_music_model->upload($data);
		}
		else{
			 $data = array('albums' => $this->band_album_model->getAll());
			 $this->load->view('band/uploadMusic',$data);
		}
	}

	public function edit($music_id) {
		if ($this->input->post()) {
			$data = array(
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('license'),
				'visibility' => $this->input->post('visibility')
			);
			//print_r($data);
			$this->band_music_model->edit($data,$music_id);
		}
		else{
			$music = $this->band_music_model->getMusic($music_id);
			$data = array(
			'music' => $music ,
			'albums' => $this->band_album_model->getAll(),
			'albumMusic' => $this->band_album_model->getAlbum($music->album_id)
			 );
			//print_r($data);
			$this->load->view('band/editMusic',$data);
		}
	}


}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */