<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cover extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('cover_banner_model');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->lang->load('upload', 'thai');
	}

	public function index() {
		$this->view();
	}

	public function view() {
		$banners = $this->cover_banner_model->get_all();
		$display = array('banners' => $banners);

		$this->load->view('cover/view', $display);
	}

	public function edit($banner_id) {
		$banner = $this->cover_banner_model->get($banner_id);
		if ( ! empty($banner)) {
			if ($this->input->post()) {
				$caption = $this->input->post('caption');
				$url = $this->input->post('url');
				$data = array('caption' => $caption,
					'url' => $url);

				$this->cover_banner_model->edit($banner_id, $data);
				redirect('webadmin/cover/view');
			} else {
				$display = array('banner' => $banner);
				$this->load->view('cover/edit', $display);
			}

		} else {
			show_404();
		}
	}

	public function add() {
		$caption = $this->input->post('caption');
		$url = $this->input->post('url');
		$upload_image_name = $this->input->post('image-name');

		if ( ! empty($upload_image_name)) {
			$data = array('caption' => $caption,
				'url' => $url,
				'image_url' => $upload_image_name);
			$is_uploaded = 1;

			if ( ! empty($upload_image_name)) {
				$photo_path = realpath('uploads/banner');
				$photo_name = 'banner-'.time();

				// Upload photo to server
				$config = array('allowed_types' => 'jpg|jpeg',
					'max_size' => 1024,
					'overwrite' => TRUE,
					'file_name' => $photo_name,
					'upload_path' => $photo_path.'/original');
				$this->upload->initialize($config);
				$result = $this->upload->do_upload('image');
				$msg_image = $this->upload->display_errors();
				$image_data = $this->upload->data();
				
				if (empty($msg_image)) {
					// If upload complete
					$data['image_url'] = $image_data['file_name'];

					// Resize
					$config = array('source_image' => $image_data['full_path'],
						'new_image' => $photo_path,
						'maintain_ratio' => FALSE,
						'height' => 500,
						'width' => 920);
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				} else {
					$is_uploaded = 0;
				}
			}

			if ($is_uploaded == 0) {
				$display = array('caption' => $caption,
					'url' => $url);
				$this->load->view('cover/add', $display);
			} else {
				$this->cover_banner_model->add($data);
				redirect('webadmin/cover/view');
			}
			
		} else {
			$this->load->view('cover/add');
		}
	}

	public function delete($banner_id) {
		$this->cover_banner_model->delete($banner_id);
		redirect('webadmin/cover/view');
	}

}

/* End of file cover.php */
/* Location: ./application/modules/webadmin/controllers/cover.php */