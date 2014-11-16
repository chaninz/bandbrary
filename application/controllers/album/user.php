<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Basic model for user profile page
		$this->load->model('user_model');
		$this->load->model('status_model');
		$this->load->model('skill_model');
		$this->load->model('style_model');
		$this->load->model('follow_model');
		$this->load->model('join_band_model');
		$this->load->model('user_music_model');
		$this->load->model('event_model');
		// Page model
		$this->load->model('user_album_model');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->lang->load('upload', 'thai');
	}

	public function add(){
		$name = $this->input->post('name');
		//$description = $this->input->post('description');
		$user_id = $this->session->userdata('id');
		$username = $this->session->userdata('username');

		if ( ! empty($name)) {
			$data = array('user_id' => $user_id,
				'name' => $name,
				//'description' => $description,
				'image_url' => NULL);
			$is_uploaded = 1;

			$upload_photo_name = $this->input->post('cover-name');

			if ( ! empty($upload_photo_name)) {
				$photo_path = realpath('uploads/album');
				$photo_name = 'user-'.$user_id.'-album-'.time();

				// Upload photo to server
				$config = array('allowed_types' => 'jpg|jpeg',
					'max_size' => 1024,
					'overwrite' => TRUE,
					'file_name' => $photo_name,
					'upload_path' => $photo_path.'/original');
				$this->upload->initialize($config);
				$result = $this->upload->do_upload('cover');
				$msg_image = $this->upload->display_errors();
				$image_data = $this->upload->data();
				
				if (empty($msg_image)) {
					// If upload complete
					$data['image_url'] = $image_data['file_name'];

					// Resize to 400px
					$config = array('source_image' => $image_data['full_path'],
						'new_image' => $photo_path,
						'maintain_ratio' => FALSE,
						'height' => 400,
						'width' => 400);
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				} else {
					$is_uploaded = 0;
				}
			}

			if ($is_uploaded == 0) {
				$display = array('name' => $name,
					'description' => $description);
				$this->load->view('user/add_album', $display);
			} else {
				$this->user_album_model->add($data);
				redirect('user/' . $username . '/music');
			}
			
		} else {
			$this->load->view('user/add_album');
		}
	}

	public function edit($album_id) {
		$album = $this->user_album_model->get($album_id);
		$user_id = $this->session->userdata('id');

		if (! empty($album) && $album->user_id == $user_id) {
			// Check if album is added by themselves
			$name = $this->input->post('name');
			//$description = $this->input->post('description');
			$is_image_upload = $this->input->post('image-upload');

			if ( ! empty($name)) {
				$new_data = array('user_id' => $user_id,
					'name' => $name);
					//'description' => $description);
				$msg_image = NULL;

				$upload_photo_name = $this->input->post('cover-name');

				if ($is_image_upload == 1) {
					// Delete profile photo
					$new_data['image_url'] = NULL;
				} else if ($is_image_upload == 2) {
					$photo_path = realpath('uploads/album');
					$photo_name = 'user-'.$user_id.'-album-'.time();

					// Upload photo to server
					$config = array('allowed_types' => 'jpg|jpeg',
						'max_size' => 1024,
						'overwrite' => TRUE,
						'file_name' => $photo_name,
						'upload_path' => $photo_path.'/original');
					$this->upload->initialize($config);
					$result = $this->upload->do_upload('cover');
					$msg_image = $this->upload->display_errors();
					$image_data = $this->upload->data();

					if (empty($msg_image)) {
					// If upload complete
						$new_data['image_url'] = $image_data['file_name'];

					// Resize to 400px
						$config = array('source_image' => $image_data['full_path'],
							'new_image' => $photo_path,
							'maintain_ratio' => FALSE,
							'height' => 400,
							'width' => 400);
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
					}
				}

				// Update new data to database
				$this->user_album_model->edit($album_id, $new_data);

				// // Retrieve data for refresh page
				// $album = $this->user_album_model->get($album_id);
				// $msg = array('type' => 3, 
				// 	'header' => '',
				// 	'text' => 'บันทึกข้อมูลเรียบร้อย');
				// $display = array('album' => $album,
				// 	'msg_image' => $msg_image,
				// 	'msg' => $msg);

				// $this->load->view('user/edit_album', $display);
				
				$this->view($album_id);
			} else {
				// If not send data from form

				$display = array('album' => $album);
				$this->load->view('user/edit_album', $display);
			}
		} else {
			show_404();
		}
	}

	public function delete($album_id) {
		$album = $this->user_album_model->get($album_id);
		$user_id = $this->session->userdata('id');

		if (! empty($album) && $album->user_id == $user_id) {
			$this->user_album_model->delete($album_id);
			$username = $this->session->userdata('username');

			redirect('user/' . $username . '/music');
		} else {
			show_404();
		}
	}

	public function view($album_id) {
		$album = $this->user_album_model->get($album_id);

		if ( ! empty($album)) {
			// Basic data for user profile page
			$user_profile = $this->user_model->get($album->user_id);
			$status = $this->status_model->get_last_by_user($user_profile->id);
			$band_profile = $this->join_band_model->get_current_band($user_profile->id);
			$join_band_history = $this->join_band_model->get_join_all($user_profile->id);
			$skills = $this->skill_model->get_by_user($user_profile->id);
			$styles = $this->style_model->get_by_user($user_profile->id);
			// Cover
			$total_timeline = $this->user_model->get_count_timeline($user_profile->id);
			$total_follower = $this->follow_model->get_count_follower_user($user_profile->id);
			$total_following = $this->follow_model->get_count_following_user($user_profile->id);
			$total_music = $this->user_music_model->get_count_music_user($user_profile->id);
			$total_event = $this->event_model->get_count_by_user($user_profile->id);
			// Current user info
			$current_user_id = $this->session->userdata('id');
			$is_follow_user = $this->follow_model->is_follow_user($current_user_id, $user_profile->id);

			$albums = $this->user_album_model->get_by_user($user_profile->id);
			$album_music = $this->user_music_model->get_by_album($album_id);

			$display = array('user_profile' => $user_profile, 
				'status' => $status,
				'band_profile' => $band_profile,
				'join_band_history' => $join_band_history,
				'skills' => $skills,
				'styles' => $styles,
				'total_timeline' => $total_timeline,
				'total_follower' => $total_follower,
				'total_following' => $total_following,
				'total_music' => $total_music,
				'total_event' => $total_event,
				'is_follow_user' => $is_follow_user,
				'album' => $album,
				'albums' => $albums,
				'album_music' => $album_music);

			$this->load->view('user/music', $display);
		} else {
			show_404();
		}
	}

}

/* End of file user.php */
/* Location: ./application/controllers/album/user.php */