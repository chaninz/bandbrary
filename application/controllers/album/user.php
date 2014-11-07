<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Basic model for user profile page
		$this->load->model('user_album_model');
	}

	public function create(){
		if ($this->input->post()) {
			$current_id = $this->session->userdata('id');
			$data = array(
				'user_id' => $current_id ,
				'name' => $this->input->post('name'),
				'cover_url' => $this->input->post('cover')
			);
			$this->user_album_model->create($data);
		}
		else{
			 $this->load->view('user/createAlbum');
		}
	}
	public function edit($album_id) {
		if ($this->input->post()) {
			$data = array(
				'name' => $this->input->post('name'),
				'cover_url' => $this->input->post('cover')
			);
			//print_r($data);
			$this->user_album_model->edit($data,$album_id);
		}
		else{
			$data = array(
			'album' => $this->user_album_model->getAlbum($album_id)
			 );
			//print_r($data);
			$this->load->view('user/editAlbum',$data);
		}
	}
}

/* End of file music.php */
/* Location: ./application/views/user/music.php */