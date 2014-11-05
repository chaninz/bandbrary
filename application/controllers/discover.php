<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discover extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
		$this->load->model('follow_model');
		$this->load->model('greedd_model');
	}

	public function index() {
		$topband = $this->follow_model->get_top_band_follower();
		$topuser = $this->follow_model->get_top_user_follower();
		$topmusicuser = $this->greedd_model->topGreeddUserMusic();
		$topmusicband = $this->greedd_model->topGreeddBandMusic();

		$data = array(
		'topband' => $topband,
		'topuser' => $topuser,
		'topmusicuser' => $topmusicuser,
		'topmusicband' => $topmusicband
		 );
		print_r($data);
		$this->load->view('discover/discover');
	}

	public function disBlues(){
		$this->load->view('discover/discoverBlues');

	}

	public function disPopArtist(){
		$this->load->view('discover/discoverPopArtist');

	}

	public function disTopMusic(){
		$this->load->view('discover/discoverTopMusic');

	}
}

/* End of file discover.php */
/* Location: ./application/controllers/discover.php */