<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	public function index(){
		echo 'ddd';
		$this->load->view('login');		
		}
		
		public function welcome(){
		$this->load->view('welcome_message');
		}
}