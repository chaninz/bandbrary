<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Band extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('band_model','band');
	}

	public function index(){
		$this->load->view('login');	
		}

	public function manageBand(){