<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_album_model');

		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->lang->load('upload', 'thai');
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
		print_r($album);
		echo $is_master;

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
}

/* End of file music.php */
/* Location: ./application/views/user/music.php */