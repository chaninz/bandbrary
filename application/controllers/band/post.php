<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
		$this->load->model('follow_model');
		$this->load->model('join_band_model');
		$this->load->model('post_model');
	}

	public function index($band_id) {
		// Basic data for user profile page
		$band_profile = $this->band_model->get($band_id);
		$band_members = $this->join_band_model->get_current_member($band_id);
		// Current user info
		$current_user_id = $this->session->userdata('id');
		$is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
		$user_status =  $this->join_band_model->get_user_status($current_user_id, $band_id);

		$posts = $this->post_model->get_band_post($band_id);

		$data = array('band_profile' => $band_profile,
			'is_follow_band' => $is_follow_band,
			'user_status' => $user_status,
			'band_members' => $band_members,
			'posts' => $posts);

		$this->load->view('band/post', $data);
	}

	public function add() {
		if ($this->input->post()) {
			$band_id = $this->session->userdata('band_id');
			$ref = $this->input->get('ref');
			$post = array(
				'band_id' => $band_id ,
				'topic' => $this->input->post('topic'),
				'post' => $this->input->post('post'),
				'image_url' => $this->input->post('imageurl')
			);
			$this->post_model->add($post);

			redirect($ref);
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
			$post = array('post' => $this->input->post('post'),
				'image_url' => $this->input->post('imageurl')
			);
			$this->post_model->editPost($post);
		} else {
			$data = array(
			'post' => $this->post_model->getPost($post_id)
			);
			$this->load->view('band/editPost',$data);
		}
	}

	public function delete($post_id){
			$this->band_model->delete($post_id);
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
		

	}

}