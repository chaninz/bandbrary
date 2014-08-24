<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model','user');
	}
	
	public function index(){
		echo "kakarm";
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
			'cover_url' => $this->input->post('cover'),
			'photo_url' => $this->input->post('profile'),
			'biography' => $this->input->post('biography'),
			'fb_url' => $this->input->post('fburl'),
			'tw_url' => $this->input->post('twurl')
		);
		
		$this->user->register($data);
		// model >function()
	}
	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$check = $this->user->login($username,$password);
		
		if($check){
			redirect(base_url('feed'));
		}
		else{
			$this->load->view('notfound');
		}
	}
	public function logout(){
		$this->load->model('user');
		$this->session->sess_destroy();
		redirect(base_url('feed')); 
	}
	
	public function editProfile(){ 
	
	}
	
	public function editBiography(){
	}
	
	
	public function goBandProfile(){
	}
	
	public function createBand(){
		$data = array(
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'province_id' => $this->input->post('province'),
			'user_type' => $this->input->post('usertype'),
			'cover_url' => $this->input->post('cover'),
			'photo_url' => $this->input->post('profile'),
			'biography' => $this->input->post('biography'),
			'fb_url' => $this->input->post('fburl'),
			'tw_url' => $this->input->post('twurl')
		);
		
		$this->user->register($data);
	}
	
	public function manageBand(){
	}
	
	public function privateMessage(){
	}
	
	public
}