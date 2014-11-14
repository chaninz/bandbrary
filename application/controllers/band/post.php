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
		$this->load->model('post_model');
		$this->load->model('band_music_model');
		// Page import
		$this->load->model('post_model');
		$this->load->model('postcomment_model');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->lang->load('upload', 'thai');
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


			$total_follower = $this->follow_model->get_count_following_band($band_profile->id);
			$total_music = $this->band_music_model->get_count_music_band($band_profile->id);
			$total_post = $this->post_model->get_count_post_band($band_profile->id);
			$timelines = $this->band_model->timeline($band_id);
			$display = array('band_profile' => $band_profile,
				'status' => $status,
				'band_members' => $band_members,
				'is_follow_band' => $is_follow_band,
				'user_status' => $user_status,
				'current_user_skills' => $current_user_skills,
				'posts' => $posts,
				'total_timeline' => count($timelines),
				'total_follower' => $total_follower,
				'total_post' => $total_post,
				'total_music' => $total_music);

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
			// If data is sent from form
			$post_image_name = $this->input->post('post-image-name');
			$data = array('band_id' => $band_id,
				'topic' => $topic,
				'post' => $post);
			$is_uploaded = 1;

			if ( ! empty($post_image_name)) {
				$photo_path = realpath('uploads/post/band');
				$photo_name = $band_id.'-post-'.time();

				// Upload photo to server
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
					$config = array('source_image' => $image_data['full_path'],
						'new_image' => $photo_path,
						'master_dim' => 'width',
						'height' => 1,
						'width' => 600);
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				} else {
					$is_uploaded = 0;
				}
			}

			if ($is_uploaded == 0) {
				// Basic data for user profile page
				$band_profile = $this->band_model->get($band_id);
				$status = $this->status_model->get_last_by_band($band_id);
				$band_members = $this->join_band_model->get_current_member($band_id);
				// Current user info
				$current_user_id = $this->session->userdata('id');
				$is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
				$user_status =  $this->join_band_model->get_user_status($current_user_id, $band_id);
				$current_user_skills = $this->skill_model->get_by_user($current_user_id);

				$display = array('band_profile' => $band_profile,
					'status' => $status,
					'band_members' => $band_members,
					'is_follow_band' => $is_follow_band,
					'user_status' => $user_status,
					'current_user_skills' => $current_user_skills,
					'msg_image' => $msg_image,
					'topic' => $topic,
					'post' => $post);
				
				$this->load->view('band/add_post', $display);
			} else {
				$this->post_model->add($data);
				redirect(base_url('band/'.$band_id.'/post'));
			}
		} else {
			// View page
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
				
				$display = array('band_profile' => $band_profile,
					'status' => $status,
					'band_members' => $band_members,
					'is_follow_band' => $is_follow_band,
					'user_status' => $user_status,
					'current_user_skills' => $current_user_skills);

				$this->load->view('band/add_post', $display);
			}
		}
	}

	public function edit($post_id) {
		$post = $this->post_model->get($post_id);
		$band_id = $this->session->userdata('band_id');

		if ($post->band_id == $band_id) {
			// Check if is the band master
			$topic = $this->input->post('topic');
			$content = $this->input->post('content');
			$is_image_upload = $this->input->post('post-image-upload');

			if ( ! empty($topic) && ! empty($content)) {
				// Edit data
				$new_data = array('topic' => $topic,
					'post' => $content);
				$msg_image = NULL;

				if ($is_image_upload == 1) {
					// Delete profile photo
					$new_data['image_url'] = NULL;
				} else if ($is_image_upload == 2) {
					$photo_path = realpath('uploads/post/band');
					$photo_name = $band_id.'-post-'.time();

					// Upload photo to server
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
						$new_data['image_url'] = $image_data['file_name'];

						// Resize to 600px
						$config = array('source_image' => $image_data['full_path'],
							'new_image' => $photo_path,
							'master_dim' => 'width',
							'height' => 1,
							'width' => 600);
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
					}
				}

				// Update new data to database
				$this->post_model->edit($post_id, $new_data);

				// Retrieve data for refresh page
				$post = $this->post_model->get($post_id);
				$msg = array('type' => 3, 
					'header' => '',
					'text' => 'บันทึกข้อมูลเรียบร้อย');
				$display = array('post' => $post,
					'msg_image' => $msg_image,
					'msg' => $msg);
				$this->load->view('band/edit_post', $display);
			} else {
				// If not send data from form
				$display = array('post' => $post);
				$this->load->view('band/edit_post', $display);
			}
		} else {
			show_404();
		}
	}

	public function delete($post_id) {
		$band_id = $this->session->userdata('band_id');
		$this->post_model->deletePost($post_id);
		redirect('/band/'.$band_id.'/post');

	}

	public function view($post_id) {
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

/* End of file post.php */
/* Location: ./application/controllers/band/post.php */