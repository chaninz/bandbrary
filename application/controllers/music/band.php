<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_music_model');
		$this->load->model('band_album_model');
		$this->load->model('follow_model');
		$this->load->model('band_musiccomment_model');
	}

	public function index() {
		 $this->load->view('user/manageMusic');
	}
	
	public function upload() {
		if ($this->input->post()) {
			$band_id = $this->session->userdata('band_id');
			$data = array(
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('licenese'),
				'visibility' => $this->input->post('visibility')
			);
			$this->band_music_model->upload($data);
		}
		else{
			 $data = array('albums' => $this->band_album_model->getAll());
			 $this->load->view('band/uploadMusic',$data);
		}
	}

	public function edit($music_id) {
		if ($this->input->post()) {
			$data = array(
				'name' => $this->input->post('name'),
				'album_id' => $this->input->post('album'),	
				'lyric' => $this->input->post('lyric'),
				'license_type' => $this->input->post('license'),
				'visibility' => $this->input->post('visibility')
			);
			//print_r($data);
			$this->band_music_model->edit($data,$music_id);
		}
		else{
			$music = $this->band_music_model->getMusic($music_id);
			$data = array(
			'music' => $music ,
			'albums' => $this->band_album_model->getAll(),
			'albumMusic' => $this->band_album_model->getAlbum($music->album_id)
			 );
			//print_r($data);
			$this->load->view('band/editMusic',$data);
		}
	}

	public function view($music_id){
	
		 $current_user_id = $this->session->userdata('id');
		 $music = $this->band_music_model->getMusic($music_id);
		 $albumMusic = $this->band_album_model->getAlbum($music->album_id);
		 $band_profile = $this->band_model->get($albumMusic->band_id);
		 $band_members = $this->join_band_model->get_current_member($albumMusic->band_id);
		 $is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
		 $comments = $this->band_musiccomment_model->getComment($music_id);

		 $data = array (
		 'music' => $music,
		 'albumMusic' => $albumMusic,
		 'band_profile' => $band_profile,
		 'band_members' => $band_members,
		 'is_follow_band' => $is_follow_band,
		 'comments' => $comments
		 );
		// print_r($data);
		$this->load->view('band/viewMusic',$data);
	}

	public function addComment($music_id) {
		if ($this->input->post()) {
		 	$data = array(
		 	'user_id' =>  $this->session->userdata('id'),
		 	'music_id' => $music_id,
		 	'comment' => $this->input->post('comment')
		 );
		 	$this->band_musiccomment_model->add($data);
			redirect(base_url('music/band/view/'.$music_id));
		}
		// } else {
		// 	$data = $this->post_model->getPost();
		// 	$this->load->view('temp/getPost',$data);
		// }
		
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */