<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Basic model for user profile page
		$this->load->model('user_model');
		$this->load->model('status_model');
		$this->load->model('skill_model');
		$this->load->model('style_model');
		$this->load->model('follow_model');
		$this->load->model('join_band_model');
		$this->load->model('user_music_model');
		$this->load->model('event_model');
		// Page model
		$this->load->model('user_musiccomment_model');
		$this->load->model('user_album_model');
		$this->load->model('notification_model','notification');
		$this->load->model('receive_noti_model','receive_noti');
		$this->load->model('greedd_model');
	}

	public function index() {
		 $this->load->view('user/manage_music');
	}
	
	public function add() {
		$current_user_id = $this->session->userdata('id');
		$name = $this->input->post('name');
		$album = $this->input->post('album');
		$lyric = $this->input->post('lyric');
		$music_url = $this->input->post('music-url');
		$license = $this->input->post('license');
		$visibility = $this->input->post('visibility');

		if ( ! empty($name) && ! empty($album) && ! empty($lyric) && ! empty($music_url) && ! empty($license) &&
			 ! empty($visibility)) {
			$data = array('name' => $name,
				'album_id' => $album,	
				'lyric' => $lyric,
				'music_url' => $music_url,
				'license_type' => $license,
				'visibility' => $visibility);
			
			$this->user_music_model->add($data);
			redirect(base_url('music/user'));
		} else {
			$display = array('albums' => $this->user_album_model->get_by_user($current_user_id));
			$this->load->view('user/add_music', $display);
		}
	}

	public function edit($music_id) {
		$music = $this->user_music_model->get($music_id);
		$current_user_id = $this->session->userdata('id');

		if ($music->user_id == $current_user_id) {
			$name = $this->input->post('name');
			$album = $this->input->post('album');
			$lyric = $this->input->post('lyric');
			$license = $this->input->post('license');
			$visibility = $this->input->post('visibility');

			if ( ! empty($name) && ! empty($album) && ! empty($lyric) && ! empty($license) && ! empty($visibility)) {
				$data = array('name' => $name,
					'album_id' => $album,	
					'lyric' => $lyric,
					'music_url' => $music_url,
					'license_type' => $license,
					'visibility' => $visibility);

				$this->user_music_model->edit($data, $music_id);
				redirect(base_url('music/user/view/' . $music_id));
			} else {
				$music = $this->user_music_model->get($music_id);

				$display = array('music' => $music,
					'albums' => $this->user_album_model->get_by_user($current_user_id));
				$this->load->view('user/edit_music', $display);
			}
		} else {
			show_404();
		}
	}

	public function delete($music_id) {
		$music = $this->user_music_model->get($music_id);
		$current_user_id = $this->session->userdata('id');
		$username = $this->session->userdata('username');

		if ($music->user_id == $current_user_id) {
			$this->user_music_model->delete($music_id);
			redirect(base_url('user/' . $username . '/music'));
		} else {
			show_404();
		}
	}

	public function view($music_id) {
		$music = $this->user_music_model->get($music_id);

		if ( ! empty($music)) {
			// Basic data for user profile page
			$user_profile = $this->user_model->get($music->user_id);
			$status = $this->status_model->get_last_by_user($user_profile->id);
			$band_profile = $this->join_band_model->get_current_band($user_profile->id);
			$join_band_history = $this->join_band_model->get_join_all($user_profile->id);
			$skills = $this->skill_model->get_by_user($user_profile->id);
			$styles = $this->style_model->get_by_user($user_profile->id);
			// Cover
			$total_timeline = $this->user_model->get_count_timeline($user_profile->id);
			$total_follower = $this->follow_model->get_count_follower_user($user_profile->id);
			$total_following = $this->follow_model->get_count_following_user($user_profile->id);
			$total_music = $this->user_music_model->get_count_music_user($user_profile->id);
			$total_event = $this->event_model->get_count_by_user($user_profile->id);
			// Current user info
			$current_user_id = $this->session->userdata('id');
			$is_follow_user = $this->follow_model->is_follow_user($current_user_id, $user_profile->id);

			$count_greedd_user_music = $this->greedd_model->count_greedd_user_music($music_id);
			$is_greedd_user_music = $this->greedd_model->is_greedd_user_music($current_user_id, $music_id);
			$comments = $this->user_musiccomment_model->getComment($music_id);

			$display = array('user_profile' => $user_profile, 
				'status' => $status,
				'band_profile' => $band_profile,
				'join_band_history' => $join_band_history,
				'skills' => $skills,
				'styles' => $styles,
				'total_timeline' => $total_timeline,
				'total_follower' => $total_follower,
				'total_following' => $total_following,
				'total_music' => $total_music,
				'total_event' => $total_event,
				'is_follow_user' => $is_follow_user,
				'music' => $music,
				'count_greedd_user_music' => $count_greedd_user_music,
				'is_greedd_user_music' => $is_greedd_user_music,
				'comments' => $comments);
			$this->load->view('user/view_music', $display);
		} else {
			show_404();
		}
	}

	public function greedd($music_id) {
		$user_id = $this->session->userdata('id');
		$this->greedd_model->greedd_user_music($user_id, $music_id);
	}

	public function ungreedd($music_id) {
		$user_id = $this->session->userdata('id');
		$this->greedd_model->ungreedd_user_music($user_id, $music_id);
	}

	public function addComment($music_id) {
		if ($this->input->post()) {
			$data = array('user_id' =>  $this->session->userdata('id'),
				'music_id' => $music_id,
				'comment' => $this->input->post('comment'));

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
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */