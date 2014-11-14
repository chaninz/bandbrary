<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
		parent::__construct();
				$this->load->model('search_model');

	}

	public function index() {
		if ($this->input->post()) {
			$words = $this->input->post('searchword');

			$data = array(
			'users' =>	$this->search_model->user($words),
			'bands' =>	$this->search_model->band($words),
			'music' => 	$this->search_model->music($words),
			'albums' => $this->search_model->album($words)

			);
			print_r($data);
			//$this->load->view('search', $data);
			//edirect('/band/'.$band.'/timeline');

		}
		else
			echo "string";
	}

}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */