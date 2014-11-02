<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Basic model for band profile page
		$this->load->model('band_model');
		$this->load->model('status_model');
		$this->load->model('follow_model');
		$this->load->model('join_band_model');
		$this->load->model('skill_model');
		// Page model
		$this->load->model('post_model');
		$this->load->model('postcomment_model');
		$this->load->library('upload');
		$this->load->library('image_lib');
	}


	public function index($band_id) {
		// Basic data for user profile page
		$band_profile = $this->band_model->get($band_id);

		if ( ! empty($band_profile)) {
			// Basic data for user profile page
			$status = $this->status_model->get_last_by_band($band_id);
			$band_members = $this->join_band_model->get_current_member($band_id);
			// Current user info
			$current_user_id = $this->session->userdata('id');
			$is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
			$user_status =  $this->join_band_model->get_user_status($current_user_id, $band_id);
			$current_user_skills = $this->skill_model->get_by_user($current_user_id);
			// Page data
			$posts = $this->post_model->get_all($band_id);

			$display = array('band_profile' => $band_profile,
				'status' => $status,
				'band_members' => $band_members,
				'is_follow_band' => $is_follow_band,
				'user_status' => $user_status,
				'current_user_skills' => $current_user_skills,
				'posts' => $posts);

			$this->load->view('band/post', $display);
		} else {
			show_404();
		}
	}

	public function add() {
		$band_id = $this->session->userdata('band_id');
		$topic = $this->input->post('topic');
		$post = $this->input->post('post');

		if ( ! empty($band_id) && ! empty($topic) && ! empty($post)) {
			$post_image_name = $this->input->post('post-image-name');
			$data = array('band_id' => $band_id,
				'topic' => $topic,
				'post' => $post);

			if ( ! empty($post_image_name)) {
				$photo_path = realpath('uploads/post/band');
				$photo_name = $band_id.'-post-'.time();

				// Upload cover photo to server
				$config = array('allowed_types' => 'jpg|jpeg',
					'max_size' => 1024,
					'overwrite' => TRUE,
					'file_name' => $photo_name,
					'upload_path' => $photo_path.'/original');
				$this->upload->initialize($config);
				$result = $this->upload->do_upload('post-image');
				$msg_image = $this->upload->display_errors();
				$image_data = $this->upload->data();

				if ( ! empty($result)) {
					// If upload complete
					$data['image_url'] = $image_data['file_name'];

					// Resize to 600px
					$config = array(
						'source_image' => $image_data['full_path'],
						'new_image' => $photo_path,
						'maintain_ratio' => TRUE,
						'width' => 600);
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}
			}

			$this->post_model->add($data);
			redirect(base_url('band/'.$band_id.'/post'));
		} else {
			show_404();
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
			$band_id = $this->session->userdata('band_id');
			$this->post_model->deletePost($post_id);
			redirect('/band/'.$band_id.'/post');

	}

	public function view($post_id){
		// Basic data for user profile page
		$post = $this->post_model->get($post_id);

		if ( ! empty($post)) {
			// Basic data for user profile page
			$band_id = $post->band_id;
			$band_profile = $this->band_model->get($band_id);
			$status = $this->status_model->get_last_by_band($band_id);
			$band_members = $this->join_band_model->get_current_member($band_id);
			// Current user info
			$current_user_id = $this->session->userdata('id');
			$is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
			$user_status =  $this->join_band_model->get_user_status($current_user_id, $band_id);
			$current_user_skills = $this->skill_model->get_by_user($current_user_id);
			// Page data
			$comments = $this->postcomment_model->getComment($post_id);

			$display = array('band_profile' => $band_profile,
				'status' => $status,
				'band_members' => $band_members,
				'is_follow_band' => $is_follow_band,
				'user_status' => $user_status,
				'current_user_skills' => $current_user_skills,
				'post' => $post,
				'comments' => $comments);

			$this->load->view('band/view_post', $display);
		} else {
			show_404();
		}
	}

}