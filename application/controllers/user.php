<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model','user');
	}
	
	public function index(){
		$this->load->view('login');	
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
		$data = $this->user->login($username,$password);
		$session = array('id'=> $data->id,'username' => $data->username);
		$this->session->set_userdata($session);
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
	
	}
	
	public function editBiography(){
	}
	
	
	public function goBandProfile(){
	}
	
	public function createBand(){
		$data = array(
			'name' => $this->input->post('name'),
			'cover_url' => $this->input->post('cover'),
			'photo_url' => $this->input->post('photo'),
			'biography' => $this->input->post('biography'),
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
	}
	
	public function manageBand(){
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
	
	public function writeStatus(){
		$data = array (
			'username' => $this->session->userdata('username'),
			'name' => $this->input->post('name'),
			'status' => $this->input->post('writeStatus')
		);
	}
	
	
}