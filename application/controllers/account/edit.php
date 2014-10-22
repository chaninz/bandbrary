<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('province_model');
		$this->load->model('skill_model');
		$this->load->model('style_model');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->lang->load('upload', 'thai');
	}

	public function index() {
		$id = $this->session->userdata('id');

		if ($this->input->post()) {
			$cover_path = realpath('uploads/images/cover');
			$cover_thumb_path = realpath('uploads/images/cover/thumb');
			$photo_path = realpath('uploads/images/profile');
			$photo_thumb_path = realpath('uploads/images/profile/thumb');
			$cover_name = $id.'-cover';
			$photo_name = $id.'-profile';
			$msg_cover = $msg_photo = NULL;

			$is_photo_upload = $this->input->post('profile-photo-upload');
			$is_cover_upload = $this->input->post('cover-photo-upload');

			// New data from form
			$new_data = array(
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'province_id' => $this->input->post('province'),
				'user_type' => $this->input->post('usertype'),
				'biography' => $this->input->post('biography'),
				'fb_url' => $this->input->post('fburl'),
				'tw_url' => $this->input->post('twurl'),
				'yt_url' => $this->input->post('yturl'));

			if ($this->input->post('user-type') == 2) {
				// Change user type
				$new_data['user_type'] = 2;
			}

			// Skills and Styles
			$styles = $this->input->post('style');
			$skills = $this->input->post('skill');

			if ($new_data['user_type'] == 2 && ! empty($styles) && ! empty($skills)) {
				// Insert styles and skills to database
				$this->style_model->edit($id, $styles);
				$this->skill_model->edit($id, $skills);
			}
			// END Skills and Styles

			// Profile and Cover
			if ($is_photo_upload == 1) {
				// Delete profile photo
				$new_data['photo_url'] = NULL;
			} else if ($is_photo_upload == 2) {
				// Upload profile photo to server
				$config = array('allowed_types' => 'jpg|jpeg',
					'max_size' => 1024,
					'overwrite' => TRUE,
					'file_name' => $photo_name,
					'upload_path' => $photo_path);
				$this->upload->initialize($config);
				$result = $this->upload->do_upload('profile-photo');
				$msg_photo = $this->upload->display_errors();
				$image_data = $this->upload->data();

				// Crop
				$config = array(
					'source_image' => $image_data['full_path'],
					'new_image' => $photo_path,
					'maintain_ratio' => FALSE,
					'height' => $image_data['image_width'] > $image_data['image_height'] ? $image_data['image_height'] : $image_data['image_width'],
					'width' => $image_data['image_width'] > $image_data['image_height'] ? $image_data['image_height'] : $image_data['image_width']);
				$this->image_lib->initialize($config);
				$this->image_lib->crop();

				if ( ! empty($result)) {
					// If upload complete
					$new_data['photo_url'] = $image_data['file_name'];

					// Resize to 75px
					$config = array(
						'source_image' => $photo_path.'/'.$image_data['file_name'],
						'new_image' => $photo_thumb_path,
						'height' => 75,
						'width' => 75);
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}
				
			}
			if ($is_cover_upload == 1) {
				// Delete cover photo
				$new_data['cover_url'] = NULL;
			} else if ($is_cover_upload == 2) {
				// Upload cover photo to server
				$config = array('allowed_types' => 'jpg|jpeg',
					'max_size' => 1024,
					'overwrite' => TRUE,
					'file_name' => $cover_name,
					'upload_path' => $cover_path.'/original');
				$this->upload->initialize($config);
				$result = $this->upload->do_upload('cover-photo');
				$msg_cover = $this->upload->display_errors();
				$image_data = $this->upload->data();

				// Resize to 1500x500px
				$config = array(
					'source_image' => $image_data['full_path'],
					'new_image' => $cover_path,
					'maintain_ratio' => FALSE,
					'height' => 500,
					'width' => 1500);
				$this->image_lib->initialize($config);
				$this->image_lib->resize();

				if ( ! empty($result)) {
					// If upload complete
					$new_data['cover_url'] = $image_data['file_name'];

					// Crop
					$config = array(
						'source_image' => $cover_path.'/'.$image_data['file_name'],
						'new_image' => $cover_thumb_path,
						'maintain_ratio' => FALSE,
						'height' => 500,
						'width' => 500);
					$this->image_lib->initialize($config);
					$this->image_lib->crop();

					// Resize to 75px
					$config = array(
						'source_image' => $cover_thumb_path.'/'.$image_data['file_name'],
						'new_image' => $cover_thumb_path,
						'maintain_ratio' => TRUE,
						'height' => 75,
						'width' => 75);
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}
			}
			// END Profile and Cover

			$this->user_model->update($id, $new_data);

			// Retrieve data for refresh page
			$user = $this->user_model->get($id);
			$provinces = $this->province_model->get_th_all();
			$skills = $this->skill_model->get_by_user($id);
			$styles = $this->style_model->get_by_user($id);
			$msg = array('type' => 3, 
				'header' => '',
				'text' => 'บันทึกข้อมูลเรียบร้อย');
			$display = array('user' => $user,
				'provinces' => $provinces,
				'skills' => $skills,
				'styles' => $styles,
				'msg_photo' => $msg_photo,
				'msg_cover' => $msg_cover,
				'msg' => $msg);

			$this->utils->refresh_user($user->id);
			$this->load->view('account/edit', $display);
		} else {
			$user = $this->user_model->get($id);
			$provinces = $this->province_model->get_th_all();
			$skills = $this->skill_model->get_by_user($id);
			$styles = $this->style_model->get_by_user($id);

			$display = array('user' => $user,
				'provinces' => $provinces,
				'skills' => $skills,
				'styles' => $styles);
			$this->load->view('account/edit', $display);
		}
	}
	
}

/* End of file edit.php */
/* Location: ./application/controllers/account/edit.php */