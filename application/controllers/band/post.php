<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('post_model');
	}

	public function add() {
		if ($this->input->post()) {

			$post = array(
				'band_id' => 1 ,
				'topic' => $this->input->post('topic'),
				'post' => $this->input->post('post'),
				'image_url' => $this->input->post('imageurl')
			);
			$this->post_model->add($post);
		} else {
			$band_id = $this->session->userdata('band_id');
			$data = array (
			'band_post' => $this->post_model->getAllPost($band_id),
			'id' => $this->session->userdata('id'),
			'name' => $this->session->userdata('name'),
			'photo_url' => $this->session->userdata('photo_url')
		);
			$this->load->view('headerBar',$data);
			$this->load->view('coverSection');
			$this->load->view('band/post',$data);
			}
	}

	public function edit() {
		if ($this->input->post()) {
			// edit band to get band name from session
			$post = array('post' => $this->input->post('post'),
				'image_url' => $this->input->post('imageurl')
			);
			$this->post_model->editPost($post);
		} else {
			$this->load->model('user_model');
			$data = $this->post_model->getPost();
			$this->load->view('temp/editPost',$data);
		}
	}

	public function delete(){
		if ($this->input->post()) {
			// edit band to get band name from session
			$post = array('post' => $this->input->post('post'),
				'image_url' => $this->input->post('imageurl')
			);
			$this->band_model->delete($post);
		}
	}

	public function view($post_id){
		// if ($this->input->post()) {
		// 	// edit band to get band name from session
		// 	$post_id = 4 ;//$this->input->post('post_id')
		// 	$data = $this->post_model->getPost($post_id);
		// 	$this->load->view('temp/viewPost',$data);
		// } else {
		// 	$data = $this->post_model->getPost(4);
		// 	$this->load->view('temp/viewPost',$data);
		// }
		$band_id = $this->session->userdata('band_id');
		$data = array (
		'post' => $this->post_model->getPost($post_id),
		'id' => $this->session->userdata('id'),
		'name' => $this->session->userdata('name'),
		'photo_url' => $this->session->userdata('photo_url')

		);
		$this->load->view('temp/viewPost');
	}

	public function viewAll($band_id){
		// if ($this->input->post()) {
		// 	// edit band to get band name from session
		// 	$band_id = $this->input->post('band_id');
		// 	$this->post_model->getAllPost($band_id);
		// } else {
		// 	$data = $this->post_model->getAllPost();
		// 	$this->load->view('temp/getAllPost',$data);
		// }
		// $band_id = $this->session->userdata('band_id');
		$data = array (
		'band_post' => $this->post_model->getAllPost($band_id),
		'id' => $this->session->userdata('id'),
		'name' => $this->session->userdata('name'),
		'photo_url' => $this->session->userdata('photo_url')

		);
		$this->load->view('headerBar',$data);
		$this->load->view('coverSection');
		$this->load->view('band/post',$data);

	}

}