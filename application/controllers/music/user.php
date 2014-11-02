<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_music_model');
		$this->load->model('user_model');
		$this->load->model('post_model');
		$this->load->model('postcomment_model');

				$this->load->model('follow_model');
		$this->load->model('user_album_model');
	}

	public function index() {
		 $this->load->view('user/manageMusic');
	}
	
	public function upload() {
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

	public function edit($music_id) {
		if ($this->input->post()) {
			$current_id = $this->session->userdata('id');
			$data = array(
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('license'),
				'visibility' => $this->input->post('visibility')
			);
			//print_r($data);
			$this->user_music_model->edit($data,$music_id);
		}
		else{
			$music = $this->user_music_model->getMusic($music_id);
			$data = array(
			'music' => $music ,
			'albums' => $this->user_album_model->getAll(),
			'albumMusic' => $this->user_album_model->getAlbum($music->album_id)
			 );
			//print_r($data);
			$this->load->view('user/editMusic',$data);
		}
	}

	public function delete($music_id){
			$this->user_music_model->delete($music_id);
			//redirect('/band/'.$band_id.'/post');

	}

	public function view($post_id){
		// if ($this->input->post()) {
		// 	// edit band to get band name from session
		// 	$post_id = 4 ;//$this->input->post('post_id')
		// 	$data = $this->post_model->getPost($post_id);
		// 	$this->load->view('temp/viewPost',$data);
		// } else {
		// 	$data = $this->post_model->getPost(4);
		// 	$this->load->view('temp/viewPost',$data);
		// }


		 $current_user_id = $this->session->userdata('id');
		 $post = $this->post_model->getPost($post_id);
		 $band_profile = $this->band_model->get($post->band_id);
		 $band_members = $this->join_band_model->get_current_member($post->band_id);
		 $is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
		 $user_status =  $this->join_band_model->get_user_status($current_user_id,$post->band_id);

		 $data = array (
		 'post' => $post,
		 'band_profile' => $band_profile,
		 'band_members' => $band_members,
		 'is_follow_band' => $is_follow_band,
		 'user_status' => $user_status,
		 'comments' => $this->postcomment_model->getComment($post_id)
		 );
		// print_r($post);

		$this->load->view('user/viewMusic',$data);
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */