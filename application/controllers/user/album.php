<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Basic model for user profile page
		$this->load->model('user_album_model');
		$this->load->model('join_band_model');
		$this->load->model('follow_model');
		$this->load->model('status_model');
	}

	// public function index($username) {
	// 	/* Basic data for user profile page */
	// 	$user_profile = $this->user_model->get_by_username($username);
	// 	$band_profile = $this->join_band_model->get_current_band($user_profile->id);
	// 	$status = $this->status_model->get_last_by_user($user_profile->id);
	// 	// Current user info
	// 	$current_user_id = $this->session->userdata('id');
	// 	$is_follow_user = $this->follow_model->is_follow_user($current_user_id, $user_profile->id);
	
	// 	$data = array('user_profile' => $user_profile, 
	// 		'band_profile' => $band_profile,
	// 		'status' => $status,
	// 		'is_follow_user' => $is_follow_user);

	// 	$this->load->view('user/music', $data);
	// }

	public function create() {
		if ($this->input->post()) {
			$current_id = $this->session->userdata('id');
			$data = array(
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('licenese'),
				'visibility' => $this->input->post('visibility')
			);
			//print_r($data);
			$this->user_music_model->upload($data);
		}
		else{
			 $data = array('albums' => $this->user_album_model->getAll());
			$this->load->view('user/uploadMusic',$data);
			//redirect('/band/'.$band_id.'/post');

		}
	}
}

/* End of file music.php */
/* Location: ./application/views/user/music.php */