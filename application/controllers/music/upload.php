<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->model('music_model');
		$this->load->model('user_model');
	}

	public function index() {
		if ($this->input->post()) {
			// Set the uplaod directory
			$upload_dir = realpath('uploads/music').'/';

			// Set the allowed file extensions
			$file_type = array('mp3'); // Allowed file extensions

			$verify_token = md5('unique_salt' . $_POST['timestamp']);

			if (!empty($_FILES) && ! empty($_FILES['Filedata']['tmp_name']) && $_POST['token'] == $verify_token) {
				$timestamp = $this->input->post('timestamp');
				$temp_file = $_FILES['Filedata']['tmp_name'];
				//$upload_dir  = $_SERVER['DOCUMENT_ROOT'] . $upload_dir;
				$extension = end(explode('.', $_FILES['Filedata']['name']));
				$file_name = $timestamp . '.' . $extension;
				$target_file = $upload_dir . $file_name;

				// Validate the filetype
				$fileParts = pathinfo($_FILES['Filedata']['name']);
				if (in_array(strtolower($fileParts['extension']), $file_type)) {

					// Save the file
					move_uploaded_file($temp_file, $target_file);
					echo $file_name;

				} else {
					// The file type wasn't allowed
					echo 2;
				}
			}
		} else {
			show_404();
		}
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */