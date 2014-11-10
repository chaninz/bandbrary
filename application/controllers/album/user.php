<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_album_model');

		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->lang->load('upload', 'thai');
	}

	public function add(){
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$user_id = $this->session->userdata('id');
		$username = $this->session->userdata('username');

		if ( ! empty($name)) {
			$data = array('user_id' => $user_id,
				'name' => $name,
				'description' => $description,
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
				redirect(base_url('user/'.$username.'/music'));
			}
			
		} else {
			$this->load->view('user/add_album');
		}
	}

	public function edit($album_id) {
		$album = $this->user_album_model->get($album_id);
		$user_id = $this->session->userdata('id');

		if ($album->user_id == $user_id) {
			// Check if album is added by themselves
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$is_image_upload = $this->input->post('image-upload');

			if ( ! empty($name)) {
				echo $name.$description;
				$new_data = array('user_id' => $user_id,
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

				// Retrieve data for refresh page
				$album = $this->user_album_model->get($album_id);
				$msg = array('type' => 3, 
					'header' => '',
					'text' => 'บันทึกข้อมูลเรียบร้อย');
				$display = array('album' => $album,
					'msg_image' => $msg_image,
					'msg' => $msg);

				$this->load->view('user/edit_album', $display);
			} else {
				// If not send data from form

				$display = array('album' => $album);
				$this->load->view('user/edit_album', $display);
			}
		} else {
			show_404();
		}
	}

}

/* End of file user.php */
/* Location: ./application/controllers/album/user.php */