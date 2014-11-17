<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_music_model');
		$this->load->model('band_model');
	}

	public function index() {
		$user_id = $this->session->userdata('id');
		$music = $this->user_music_model->get_music_feed($user_id);
		$bands = $this->band_model->get_suggestion($user_id);
		
		$display = array('music' => $music,
			'bands' => $bands);
		$this->load->view('feed', $display);
	}

}

/* End of file feed.php */
/* Location: ./application/controllers/feed.php */