<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
		$this->load->model('province_model');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->lang->load('upload', 'thai');
	}

	public function index() {
		$is_master = $this->session->userdata('is_master');
		$band_id = $this->session->userdata('band_id');

		if ( ! empty($is_master) && $is_master ==1) {
			if ($this->input->post()) {
				// Var for photo upload
				$cover_path = realpath('uploads/cover/band');
				$cover_thumb_path = realpath('uploads/cover/band/thumb');
				$photo_path = realpath('uploads/profile/band/');
				$photo_thumb_path = realpath('uploads/profile/band/thumb');
				$cover_name = $band_id.'-cover';
				$photo_name = $band_id.'-profile';
				$msg_cover = $msg_photo = NULL;

				$is_photo_upload = $this->input->post('profile-photo-upload');
				$is_cover_upload = $this->input->post('cover-photo-upload');

				$new_data = array('biography' => $this->input->post('biography'),
					'province_id' => $this->input->post('province'),
					'style_id' => $this->input->post('style'),
					'fb_url' => $this->input->post('fburl'),
					'tw_url' => $this->input->post('twurl'),
					'yt_url' => $this->input->post('yturl'));

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

				$this->band_model->edit($band_id, $new_data);

				// Retrieve data for refresh page
				$band = $this->band_model->get($band_id);
				$provinces = $this->province_model->get_all();
				$msg = array('type' => 3, 
					'header' => '',
					'text' => 'บันทึกข้อมูลเรียบร้อย');
				$display = array('band' => $band,
					'provinces' => $provinces,
					'msg_photo' => $msg_photo,
					'msg_cover' => $msg_cover,
					'msg' => $msg);
				$this->load->view('band/edit', $display);
			} else {
				$band_id = $this->session->userdata('band_id');
				$band = $this->band_model->get($band_id);
				$provinces = $this->province_model->get_all();

				$display = array('band' => $band,
					'provinces' => $provinces);
				$this->load->view('band/edit', $display);
			}
		} else {
			show_404();
		}
	}

}

/* End of file edit.php */
/* Location: ./application/controllers/band/edit.php */