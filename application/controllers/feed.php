<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends CI_Controller {

	public function index() {
		$greedd = $this->greedd_model->countGreedd($music_id);
		$this->load->view('feed');
	}

}

/* End of file feed.php */
/* Location: ./application/controllers/feed.php */