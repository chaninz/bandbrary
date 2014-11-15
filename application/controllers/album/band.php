<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

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
		$this->load->model('event_model');
		// Page model
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->lang->load('upload', 'thai');
		$this->load->model('band_album_model');
	}

	public function add(){
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');

		if ( ! empty($band_id) && ! empty($name) && $is_master == 1) {
			$data = array('band_id' => $band_id,
				'name' => $name,
				'description' => $description,
				'image_url' => NULL);
			$is_uploaded = 1;

			$upload_photo_name = $this->input->post('cover-name');

			if ( ! empty($upload_photo_name)) {
				$photo_path = realpath('uploads/album');
				$photo_name = 'band-'.$band_id.'-album-'.time();

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
				$this->load->view('band/add_album', $display);
			} else {
				$this->user_album_model->add($data);
				redirect(base_url('band/'.$username.'/music'));
			}
			
		} else {
			$this->load->view('band/add_album');
		}
	}

	public function edit($album_id) {
		$album = $this->band_album_model->get($album_id);
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');

		if ($album->band_id == $band_id && $is_master == 1) {
			// Check if album is added by themselves
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$is_image_upload = $this->input->post('image-upload');

			if ( ! empty($name)) {
				$new_data = array('band_id' => $band_id,
					'name' => $name,
					'description' => $description,
					'image_url' => NULL);
				$msg_image = NULL;

				$upload_photo_name = $this->input->post('cover-name');

				if ($is_image_upload == 1) {
					// Delete profile photo
					$new_data['image_url'] = NULL;
				} else if ($is_image_upload == 2) {
					$photo_path = realpath('uploads/album');
					$photo_name = 'band-'.$band_id.'-album-'.time();

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
				$this->band_album_model->edit($album_id, $new_data);

				// Retrieve data for refresh page
				$album = $this->band_album_model->get($album_id);
				$msg = array('type' => 3, 
					'header' => '',
					'text' => 'บันทึกข้อมูลเรียบร้อย');
				$display = array('album' => $album,
					'msg_image' => $msg_image,
					'msg' => $msg);
				$this->load->view('band/edit_album', $display);
			} else {
				// If not send data from form
				$display = array('album' => $album);
				$this->load->view('band/edit_album', $display);
			}
		} else {
			show_404();
		}
	}

	public function view($album_id) {
		$album = $this->band_album_model->get($album_id);
		
		if ( ! empty($album)) {
			// Basic data for user profile page
			$band_profile = $this->band_model->get($album->band_id);
			$status = $this->status_model->get_last_by_band($band_profile->id);
			$band_members = $this->join_band_model->get_current_member($band_profile->id);
			// Cover
			$total_timeline = $this->band_model->get_count_timeline($band_profile->id);
			$total_follower = $this->follow_model->get_count_following_band($band_profile->id);
			$total_music = $this->band_music_model->get_count_music_band($band_profile->id);
			$total_post = $this->post_model->get_count_post_band($band_profile->id);
			$total_event = $this->event_model->get_count_by_band($band_profile->id);
			// Current user info
			$current_user_id = $this->session->userdata('id');
			$is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
			$user_status =  $this->join_band_model->get_user_status($current_user_id, $band_profile->id);
			$current_user_skills = $this->skill_model->get_by_user($current_user_id);
			// Page data
			$albums = $this->band_album_model->get_by_user($band_profile->id);
			$album_music = $this->band_music_model->get_by_album($album_id);

			$display = array('band_profile' => $band_profile,
				'status' => $status,
				'band_members' => $band_members,
				'total_timeline' => $total_timeline,
				'total_follower' => $total_follower,
				'total_music' => $total_music,
				'total_post' => $total_post,
				'total_event' => $total_event,
				'is_follow_band' => $is_follow_band,
				'user_status' => $user_status,
				'current_user_skills' => $current_user_skills,
				'albums' => $albums,
				'album_music' => $album_music);

			$this->load->view('band/music', $display);
		} else {
			show_404();
		}
	}

}

/* End of file music.php */
/* Location: ./application/views/user/music.php */