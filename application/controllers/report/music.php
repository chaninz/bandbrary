<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_music_model');
		$this->load->model('band_music_model');
		$this->load->model('report_music_model');
	}

	public function index($music_id) {
		if ($this->input->post()) {
			$data = array(
				'user_report' => $this->session->userdata('id'),
				'music_id' => $music_id,
				'report_type' => $this->input->post('report_type'));
			$this->report_music_model->add($data);
		}
	}

	public function user($music_id) {
		$user_id = $this->session->userdata('id');
		$reason = $this->input->post('reason');
		$music = $this->user_music_model->get($music_id);

		if ( ! empty($music_id) && ! empty($reason) && ! empty($music)) {
			$data = array('user_report' => $user_id,
				'music_id' => $music_id,
				'reason' => $reason,
				'music_name' => $music->name,
				'artist' => $music->artist);

			$this->report_music_model->report_user_music($data);
			redirect(base_url('music/user/view/' . $music_id));
		}
	}

	public function band($music_id) {
		$user_id = $this->session->userdata('id');
		$reason = $this->input->post('reason');
		$music = $this->band_music_model->get($music_id);

		if ( ! empty($music_id) && ! empty($reason) && ! empty($music)) {
			$data = array('user_report' => $user_id,
				'music_id' => $music_id,
				'reason' => $reason,
				'music_name' => $music->name,
				'artist' => $music->artist);

			$this->report_music_model->report_band_music($data);
			redirect(base_url('music/band/view/' . $music_id));
		}
	}

}

/* End of file music.php */
/* Location: ./application/controllers/report/music.php */