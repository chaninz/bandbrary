<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
	}

	public function add() {
		if ($this->input->post()) {

			$post = array('id' => $this->session->userdata('id'),
				'topic' => $this->input->post('topic'),
				'post' => $this->input->post('post'),
				'image_url' => $this->input->post('imageurl')
			);
			$this->band_model->add($post);
		} else {
			$this->load->view('temp/addPost');
			}
	}

	public function edit() {
		if ($this->input->post()) {
			// edit band to get band name from session
			$post = array('post' => $this->input->post('post'),
				'image_url' => $this->input->post('imageurl')
			);
			$this->band_model->edit($post);
		} else {
			echo 'no data input';
		}
	}

}