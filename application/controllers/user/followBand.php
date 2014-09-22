<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Followband extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('follow_band_model');
		$this->load->model('user_model');
		$this->load->model('band_model');

	}

	public function follow($follow_band) {
			$data = array(
				'user_id' => $this->session->userdata('id'),
				'follow_band' => $follow_band	
			);
			$this->follow_band_model->follow($data);
		
	}

	public function unfollow($follow_band) {
			$data = array(
				'user_id' => $this->session->userdata('id'),
				'follow_band' => $follow_band	
			);
			$this->follow_band_model->unfollow($data);
		
	}

	public function view($band_id){
		$my_id = $this->session->userdata('id');
		$data = array (
		'follower' => $this->follow_band_model->get_follow_band($band_id),
		// 'band_name' => $this->session->userdata('band_name'),
		'user' => $this->user_model->getProfile($my_id),
		'band' => $this->band_model->get($band_id),
		'band_id' => $band_id,
		'isFollow' =>$this->follow_band_model->isFollow($band_id,$my_id)
		);
		// print_r($data); 
		$this->load->view('band/follower',$data);
	}

}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */