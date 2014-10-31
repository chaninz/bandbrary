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
				'current_id' => $current_id ,
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('licenese'),
				'visibility' => $this->input->post('visibility')
			);
			$this->music_model->upload($data);
		}
		else{
			  $data = array('albums' => $this->user_album_model->getAll()
			   );
			$this->load->view('user/uploadMusic',$data);
		}
	}

	public function edit() {
		if ($this->input->post()) {
			$current_id = $this->session->userdata('id');
			$data = array(
				'current_id' => $band_id ,
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('licenese'),
				'visibility' => $this->input->post('visibility')
			);
			$this->music_model->add($data);
		}
		else{
			$data = array('albums' => $this->user_album_model->getAll()
			 );
			 $this->load->view('user/editMusic');
		}
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */