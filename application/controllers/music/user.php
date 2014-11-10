<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_music_model');
		$this->load->model('user_model');
		$this->load->model('user_musiccomment_model');
		$this->load->model('follow_model');
		$this->load->model('user_album_model');
		$this->load->model('notification_model','notification');
		$this->load->model('receive_noti_model','receive_noti');
		$this->load->model('join_band_model','join_band');
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
			 $data = array('albums' => $this->user_album_model->get_all());
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

	public function view($music_id){
	
		 $current_user_id = $this->session->userdata('id');
		 $music = $this->user_music_model->getMusic($music_id);
		 $albumMusic = $this->user_album_model->getAlbum($music->album_id);
		 $user_profile = $this->user_model->get($albumMusic->user_id);
		 $is_follow_user = $this->follow_model->is_follow_user($current_user_id, $user_profile->id);
		 $comments = $this->user_musiccomment_model->getComment($music_id);

		 $data = array (
		 'music' => $music,
		 'albumMusic' => $albumMusic,
		 'user_profile' => $user_profile,
		 'is_follow_user' => $is_follow_user,
		 'comments' => $comments
		 );
		 //print_r($data);
		$this->load->view('user/viewMusic',$data);
	}

	public function addComment($music_id) {
		if ($this->input->post()) {
		 	$data = array(
		 	'user_id' =>  $this->session->userdata('id'),
		 	'music_id' => $music_id,
		 	'comment' => $this->input->post('comment')
		 );
		 	$this->user_musiccomment_model->add($data);

		 	//noti to comment user music
			$noti = array('user_id' => $this->session->userdata('id'),
						  'music_user_id' => $music_id,
						  'type' => "comment_music_user",
						  'link' => "#",
						  'text' => "ได้แสดงความคิดเห็นบนเพลง"
			);
			$insert_id = $this->notification->add($noti);

			$musician =  $this->user_music_model->getMusician($music_id);
			//print_r($musician);
			//select receiver
			$receiver  = array('receive_id' => $insert_id,
								'user_id'    => $musician->id		
					);
				
			$this->receive_noti->addOnce($receiver);
		 	
			redirect(base_url('music/user/view/'.$music_id));
		}
		// } else {
		// 	$data = $this->post_model->getPost();
		// 	$this->load->view('temp/getPost',$data);
		// }
		
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */