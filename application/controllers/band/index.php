<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
	}

	public function band($band_id) {
		$band_profile = $this->band_model->get($band_id);
		print_r($band_profile);
		if ($band_profile) {
			redirect('/band/'.$band_id.'/timeline');
		} else {
			show_404();
		}
		
	}

}

/* End of file index.php */
/* Location: ./application/controllers/band/index.php */