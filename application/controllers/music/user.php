<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_music_model');
		$this->load->model('user_model');
		$this->load->model('user_album_model');
	}

	public function index() {
		 $this->load->view('user/manageMusic');
	}
	
	public function upload() {
		if ($this->input->post()) {
			$current_id = $this->session->userdata('id');
			$data = array(
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('licenese'),
				'visibility' => $this->input->post('visibility')
			);
			//print_r($data);
			$this->user_music_model->upload($data);
		}
		else{
			 $data = array('albums' => $this->user_album_model->getAll());
			$this->load->view('user/uploadMusic',$data);
			//redirect('/band/'.$band_id.'/post');

		}
	}

	public function edit($music_id) {
		if ($this->input->post()) {
			$current_id = $this->session->userdata('id');
			$data = array(
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('license'),
				'visibility' => $this->input->post('visibility')
			);
			//print_r($data);
			$this->user_music_model->edit($data,$music_id);
		}
		else{
			$music = $this->user_music_model->getMusic($music_id);
			$data = array(
			'music' => $music ,
			'albums' => $this->user_album_model->getAll(),
			'albumMusic' => $this->user_album_model->getAlbum($music->album_id)
			 );
			//print_r($data);
			$this->load->view('user/editMusic',$data);
		}
	}

	public function delete($music_id){
			$this->user_music_model->delete($music_id);
			//redirect('/band/'.$band_id.'/post');

	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */