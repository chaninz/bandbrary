<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discover extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
		$this->load->model('follow_model');
		$this->load->model('greedd_model');
		$this->load->model('user_music_model');
		$this->load->model('cover_banner_model');
	}

	public function index() {
		$recommended_music = $this->user_music_model->get_recommended_music();
		$new_music = $this->user_music_model->get_new_music();
		$top_follower_artists = $this->follow_model->get_top_follower();
		$top_music = $this->greedd_model->top_greedd_music();
		$banners = $this->cover_banner_model->get_all();
		
		$display = array('recommended_music' => $recommended_music,
			'new_music' => $new_music,
			'top_follower_artists' => $top_follower_artists,
			'top_music' => $top_music,
			'banners' => $banners);
		$this->load->view('discover', $display);
	}

}

/* End of file discover.php */
/* Location: ./application/controllers/discover.php */