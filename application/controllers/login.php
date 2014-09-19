<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('join_band_model');
		$this->load->model('band_model');
	}

	public function index() {
		if ($this->session->userdata('email')) {
			// $bid = $this->session->userdata('band_id'); ---> use for check band_id
			// echo $bid;
			echo "successful";
			print_r($this->session->all_userdata());

			//redirect('home');
		} else if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->user_model->login($username, $password);
			if ($result) {
				$bid = $this->join_band_model->get($result->id);
				$band =$this->band_model->get($bid->band_id);
				$user = array('id' => $result->id,
					'username' => $result->username,
					'email' => $result->email,
					'name' => $result->name,
					'surname' => $result->surname,
					// 'biography' => $result->biography,
					// 'fb_url' => $result->fb_url,
					// 'tw_url' => $result->tw_url,
					// 'yt_url' => $result->yt_url,
					// 'cover_url' => $result->cover_url,
					// 'photo_url' => $result->photo_url,
					'band_id' => $bid->band_id,
					'band_name' => $band->name
					 //'band' => $band
					);
				$this->session->set_userdata($user);
				//print_r($user);
				//redirect('login/test');
				//$this->load->view('feed');
			}
		} else {
			//echo "mzxvzxv";
			$this->load->view('login');
		}
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
?>