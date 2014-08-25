<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {
	
	function __construct(){
		parent::__construct();	
	}
	
	function register ($data){
		$this->db->insert('Users',$data);
	}
	
	function login ($username,$password){
		$query = $this->db->get_where('Users',array('username' => $username,'password'=> $password ));
		/*foreach ($query->result() as $row){
			$id = $row->id;
			$this->session->set_userdata('id',$row->id);
			$this->session->set_userdata('username',$row->username);
			$this->session->set_userdata('password',$row->password);
		}
		if (isset($id)){
			$query2 = $this->db->query("SELECT count(id) COUNT from post where by_id = $id");
			$result = $query2->row();
			$this->session->set_userdata('count',$row->COUNT);
		}*/
		return $query->row();
	}
	
	function post ($by_id,$username,$content,$type){
		$id = $this->session->userdata('id');
		$query = $this->db->query("insert into (by_id,username,content) values ($by_id,'$username','$content')");
		$query2 = $this->db->query("select COUNT(id) COUNT from post where by_id = $id");
		$result = $query2->row();
		$this->session->set_userdata('count',$result->COUNT);
	}
	
	function writePost($data){
		$id = $this->session->userdata('id');
		$this->db->insert('',$data);	
	}
	
	function createAlbum($data){
		$id = $this->session->userdata('id');
		$this->db->insert('Albums',$data);
	}
	
	function createBand ($data){
		$this->db->insert('Band',$data);
	}
}
