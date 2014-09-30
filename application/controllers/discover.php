<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discover extends CI_Controller {

	public function index() {
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