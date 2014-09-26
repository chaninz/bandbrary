<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('post_model');
		$this->load->model('band_model');
		$this->load->model('user_model');
		$this->load->model('follow_band_model');
	}

	public function add() {
		if ($this->input->post()) {
			$post = array(
				'band_id' => $band_id ,
				'topic' => $this->input->post('topic'),
				'post' => $this->input->post('post'),
				'image_url' => $this->input->post('imageurl')
			);
			$this->post_model->add($post);
		} else {
			$my_id = $this->session->userdata('id');
			$band_id = $this->session->userdata('band_id');
			$data = array (
			'band' => $this->band_model->get($band_id),
			'band_post' => $this->post_model->getAllPost($band_id),
			'band_id' => $band_id,
			'user' => $this->user_model->getProfile($my_id),
			'isFollow' =>$this->follow_band_model->isFollow($band_id,$my_id)
		);
			// $this->load->view('headerBar',$data);
			$this->load->view('band/post',$data);
			}
	}

	public function edit($post_id) {
		if ($this->input->post()) {
			// edit band to get band name from session
			$post = array('post' => $this->input->post('post'),
				'image_url' => $this->input->post('imageurl')
			);
			$this->post_model->editPost($post);
		} else {
			$post = $this->post_model->getPost($post_id);
			$this->load->view('temp/editPost',$post);
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
		$my_id = $this->session->userdata('id');
		$post = $this->post_model->getPost($post_id);
		$data = array (
		'post' => $post,
		'name' => $this->session->userdata('name'),
		'photo_url' => $this->session->userdata('photo_url'),
		'user' => $this->user_model->getProfile($my_id),
		'band_id' => $post->band_id,
		'isFollow' => $this->follow_band_model-> isFollow($post->band_id,$my_id),
		'band' => $this->band_model->get($post->band_id),
		);
		//print_r($data);
		$this->load->view('band/viewPost',$data);
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

		// $data = array (
		// 'band_post' => $this->post_model->getAllPost($band_id),
		// 'id' => $this->session->userdata('id'),
		// 'name' => $this->session->userdata('name'),
		// 'photo_url' => $this->session->userdata('photo_url'),
		// 'band' => $this->band_model->get($band_id)
		// );
		// $this->load->view('headerBar',$data);
		// $this->load->view('coverSection');
		$my_id = $this->session->userdata('id');
		$data = array( 
		'band' => $this->band_model->get($band_id),
		'band_post' => $this->post_model->getAllPost($band_id),
		'id' => $this->session->userdata('id'),
		'name' => $this->session->userdata('name'),
		'band_id' => $band_id,
		'user' => $this->user_model->getProfile($my_id),
		'isFollow' =>$this->follow_band_model->isFollow($band_id,$my_id)
		);

		$this->load->view('band/post',$data);

	}

}