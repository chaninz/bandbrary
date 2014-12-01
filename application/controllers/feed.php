<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_music_model');
		$this->load->model('band_model');
		$this->load->model('job_model');
	}

	public function index() {
		$user_id = $this->session->userdata('id');
		$band_id = $this->session->userdata('band_id') != NULL ? $band_id = $this->session->userdata('band_id') : 0;
		$music = $this->user_music_model->get_music_feed($user_id);
		$bands = $this->band_model->get_suggestion($user_id, $band_id);
		$user_jobs = $this->job_model->get_user_suggestion($user_id);
		$band_jobs = NULL;
		if ($band_id != 0) {
			$band_jobs = $this->job_model->get_band_suggestion($band_id);
		}

		$display = array('music' => $music,
			'bands' => $bands,
			'user_jobs' => $user_jobs,
			'band_jobs' => $band_jobs);
		$this->load->view('feed', $display);
	}

}

/* End of file feed.php */
/* Location: ./application/controllers/feed.php */