<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Basic model for band profile page
		$this->load->model('band_model');
		$this->load->model('status_model');
		$this->load->model('follow_model');
		$this->load->model('join_band_model');
		$this->load->model('skill_model');
		$this->load->model('post_model');
		$this->load->model('band_music_model');
		$this->load->model('event_model');
		// Page model
		$this->load->model('band_album_model');
		$this->load->model('band_musiccomment_model');
		$this->load->model('notification_model','notification');
		$this->load->model('receive_noti_model','receive_noti');
		$this->load->model('greedd_model');
	}

	public function index() {
		 $this->load->view('band/manage_music');
	}
	
	public function add() {
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');
		$name = $this->input->post('name');
		$album = $this->input->post('album');
		$lyric = $this->input->post('lyric');
		$music_url = $this->input->post('music-url');
		$license = $this->input->post('license');
		//$visibility = $this->input->post('visibility');

		if ( ! empty($band_id) && ! empty($is_master) && ! empty($name) && ! empty($album) && ! empty($lyric) &&
			! empty($music_url) && ! empty($license)) {
			$data = array('name' => $name,
				'album_id' => $album,	
				'lyric' => $lyric,
				'music_url' => $music_url,
				'license_type' => $license,
				'visibility' => $visibility);
			
			$this->band_music_model->add($data);
			redirect(base_url('music/band'));
		} else {
			$albums = $this->band_album_model->get_by_band($band_id);
			$display = array('albums' => $albums);
			$this->load->view('band/add_music', $display);
		}
	}

	public function edit($music_id) {
		$music = $this->band_music_model->get($music_id);
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');

		if ( ! empty($band_id) && ! empty($is_master) && ! empty($music) && $music->band_id == $band_id) {
			$name = $this->input->post('name');
			$album = $this->input->post('album');
			$lyric = $this->input->post('lyric');
			$license = $this->input->post('license');

			if ( ! empty($name) && ! empty($album) && ! empty($lyric) && ! empty($license)) {
				$data = array('name' => $name,
					'album_id' => $album,	
					'lyric' => $lyric,
					'music_url' => $music_url,
					'license_type' => $license,
					'visibility' => $visibility);

				$this->band_music_model->edit($data, $music_id);
				redirect(base_url('music/band/view/' . $music_id));
			} else {
				$music = $this->band_music_model->get($music_id);
				$albums = $this->band_album_model->get_by_band($band_id);

				$display = array('music' => $music,
					'albums' => $albums);
				$this->load->view('band/edit_music', $display);
			}

		} else {
			show_404();
		}
	}

	public function delete($music_id) {
		$music = $this->band_music_model->get($music_id);
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');

		if ( ! empty($band_id) && ! empty($is_master) && ! empty($music) && $music->band_id == $band_id) {
			$this->band_music_model->delete($music_id);
			redirect(base_url('band/' . $band_id . '/music'));
		} else {
			show_404();
		}
	}

	public function view($music_id){
		$music = $this->band_music_model->get($music_id);

		if ( ! empty($music)) {
			$band_profile = $this->band_model->get($music->band_id);
			$band_id = $music->band_id;
			// Basic data for user profile page
			$status = $this->status_model->get_last_by_band($band_id);
			$band_members = $this->join_band_model->get_current_member($band_id);
			// Cover
			$total_timeline = $this->band_model->get_count_timeline($band_profile->id);
			$total_follower = $this->follow_model->get_count_following_band($band_profile->id);
			$total_music = $this->band_music_model->get_count_music_band($band_profile->id);
			$total_post = $this->post_model->get_count_post_band($band_profile->id);
			$total_event = $this->event_model->get_count_by_band($band_profile->id);
			// Current user info
			$current_user_id = $this->session->userdata('id');
			$is_follow_band = $this->follow_model->is_follow_band($current_user_id, $band_profile->id);
			$user_status =  $this->join_band_model->get_user_status($current_user_id, $band_id);
			$current_user_skills = $this->skill_model->get_by_user($current_user_id);
			
			$count_greedd_band_music = $this->greedd_model->count_greedd_band_music($music_id);
			$is_greedd_band_music = $this->greedd_model->is_greedd_band_music($current_user_id, $music_id);
			$comments = $this->band_musiccomment_model->getComment($music_id);

			$display = array('band_profile' => $band_profile,
				'status' => $status,
				'band_members' => $band_members,
				'total_timeline' => $total_timeline,
				'total_follower' => $total_follower,
				'total_music' => $total_music,
				'total_post' => $total_post,
				'total_event' => $total_event,
				'is_follow_band' => $is_follow_band,
				'user_status' => $user_status,
				'current_user_skills' => $current_user_skills,
				'music' => $music,
				'count_greedd_band_music' => $count_greedd_band_music,
				'is_greedd_band_music' => $is_greedd_band_music,
				'comments' => $comments);

			$this->load->view('band/view_music', $display);
		} else {
			show_404();
		}
	}

	public function greedd($music_id) {
		$user_id = $this->session->userdata('id');
		$this->greedd_model->greedd_band_music($user_id, $music_id);
	}

	public function ungreedd($music_id) {
		$user_id = $this->session->userdata('id');
		$this->greedd_model->ungreedd_band_music($user_id, $music_id);
	}

	public function addComment($music_id) {
		if ($this->input->post()) {
			$data = array('user_id' =>  $this->session->userdata('id'),
				'music_id' => $music_id,
				'comment' => $this->input->post('comment'));

		 	$this->band_musiccomment_model->add($data);

		 // 	//noti
			// $user_id = $this->session->userdata('id');
			// $band_id = $this->band_music_model->get_band($music_id);

			// $noti = array('user_id' => $user_id,
			// 			  'band_id' => $band_id->id,
			// 			  'music_band_id' => $music_id,
			// 			  'type' => "comment_music_band",
			// 			  'link' => "commentmusicband",
			// 			  'text' => "ได้แสดงความคิดเห็นบนเพลง");
			
			// //print_r($noti);
			// $insert_id = $this->notification->add($noti);

			// //select receiver
			// $member =  $this->join_band_model->get_member_band($band_id->id);

			// $receiver_list = array();
			// foreach ($member as $value) {
			// 		$r  = array('receive_id' => $insert_id,
			// 					'user_id'    => $value->user_id		
			// 		);
			// 		array_push($receiver_list, $r);
			// }
			// $this->receive_noti->add($receiver_list);

			redirect(base_url('music/band/view/' . $music_id));
		}
	}

}

/* End of file band.php */
/* Location: ./application/controllers/music/band.php */