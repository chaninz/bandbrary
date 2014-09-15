<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Headerbar extends CI_Controller {
	public function index(){
		$this->load->model('user_model');
		$this->load->view('headerBar');		
	}
}