<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->user->login($username,$password);
			$session = array('id'=> $data->id,'username' => $data->username);
			$this->session->set_userdata($session);
			$this->load->view('profile',$session);

			//$this->load->view('message',$data);	
			/*if($check){
				redirect(base_url('feed'));
			}
			else{
				$this->load->view('notfound');
			}*/

		} else {
			$this->load->view('login');
		}
	}

	public function welcome() {
		$this->load->view('welcome_message');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */