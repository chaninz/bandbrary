<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model','user');
	}
	
	public function index(){
		$this->load->view('index');	
		}
		
	public function register(){
		//echo "register controller";
		$data = array(
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'province_id' => $this->input->post('province'),
			'user_type' => $this->input->post('usertype'),
			'biography' => $this->input->post('biography'),
			'fb_url' => $this->input->post('fburl'),
			'tw_url' => $this->input->post('twurl'),
			'yt_url' => $this->input->post('yturl'),
			'dob' => $this->input->post('dob')
		);
		
		$this->user->register($data);
		// model >function()
	}
	public function login(){
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
	}
	public function logout(){
		$this->load->model('user');
		$this->session->sess_destroy();
		redirect(base_url('feed')); 
	}
	
	public function editProfile(){ 
		$this->load->model('user');
		$data = $this->user->getProfile();
		$this->load->view('editProfile',$data);
		//print_r($data);
	}

	public function updateProfile(){
		$data = array(
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'province_id' => $this->input->post('province'),
			'user_type' => $this->input->post('usertype'),
			'biography' => $this->input->post('biography'),
			'fb_url' => $this->input->post('fburl'),
			'tw_url' => $this->input->post('twurl'),
			'yt_url' => $this->input->post('yturl'),
			'dob' => $this->input->post('dob')
		);
		
		$this->user->updateProfile($data);
		
	}
	
	public function editBiography(){
		$this->load->model('user');
		$data = $this->user->getBiography();
		$this->load->view('editBiography',$data);
	}

	public function updateBiography(){
		$data = array (
			'id' => $this->session->userdata('id'),
			'biography' => $this->input->post('biography')
		);
		$this->user->updateProfile($data);

	}
	public function writeStatus(){
		$this->load->model('user');
		$data = $this->user->getStatus();
		$this->load->view('writeStatus',$data);
	}
	
	public function updateStatus(){
		$data = array (
			'id' => $this->session->userdata('id'),
			'status' => $this->input->post('status')
		);
		$this->user->updateStatus($data);
	}


	
	public function goBandProfile(){
	}
	
	public function createBand(){
		$data = array(
			'name' => $this->input->post('name'),
			'biography' => $this->input->post('biography'),
			'style' => $this->input->post('style'),
			'fb_url' => $this->input->post('fburl'),
			'tw_url' => $this->input->post('twurl')
		);
		$this->user->createBand($data);
	}
	
	public function createAlbum(){
		$data = array(
			'id' => $this->session->userdata('id'),
			'name' => $this->input->post('name'),
			'cover_url' => $this->input->post('cover_url')
		);
		$this->user->createAlbum($data);
	}

	public function deleteAlbum(){
		$data = array(
			'user_id' => $this->session->userdata('id'),
			'id' => $this->input->post('id')
		);
		$this->user->deleteAlbum($data);
	}
	
	public function privateMessage(){
	}
	
	public function profile(){
		$data =array(
			'email' => $this->session->userdata('email'),
			'username' => $this->session->userdata('name')
		);
			$this->load->view('profile',$data);
	}
	
	public function getText(){
		$data = $this->input->post('data');
		echo 'Due to browser security restrictions, most "Ajax" requests are subject to the same origin policy; the request can not successfully retrieve data from a different domain, subdomain, port, or protocol.'.$data;	
	}
	

	public function createJob(){
		$data = array(
			'id' => $this->session->userdata('id'),
			''
		);
	}
	
	
}