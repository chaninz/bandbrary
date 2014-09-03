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
		return $query->row();
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
		
	}
	
	function post ($by_id,$username,$content,$type){
		$id = $this->session->userdata('id');
		$query = $this->db->query("insert into (by_id,username,content) values ($by_id,'$username','$content')");
		$query2 = $this->db->query("select COUNT(id) COUNT from post where by_id = $id");
		$result = $query2->row();
		$this->session->set_userdata('count',$result->COUNT);
	}
	
	function writeStatus($data){
		$this->db->insert('Status',$data);	
	}
	function getStatus(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Status');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->row();
	}
	function updateStatus($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('Status',$data);

	}
	
	function createAlbum(){
		$this->db->insert('Albums',$data);
	}
	function deleteAlbum($data){
		$this->db->delete('Albums',$data);
	}

	
	function createBand ($data){
		$this->db->insert('Band',$data);
	}

	function createJob ($data){
		$this->db->insert('Jobs',$data);
	}

	function getProfile(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Users');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->row();
		// return 1 person
	}

	function updateProfile($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('Users',$data);
	} // get data but do not care about type

	function getBiography(){
		$id = $this->session->userdata('id');
		$this->db->select('biography');
		$this->db->from('Users');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->row();
	}

	function updateBiography($biography){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->insert('Users',$data);
	}



}
