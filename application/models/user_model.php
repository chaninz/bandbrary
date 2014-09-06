<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function register($user) {
		$this->db->insert('Users',$user);
	}

	// Check if email or username are exist.
	function is_exist($user) {
		$result = 0;
		$email_exist = FALSE;
		$username_exist = FALSE;
		$this->db->or_where($user);
		$query = $this->db->get('Users');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				if ($row->username == $user['username'])
					$username_exist = TRUE;
				if ($row->email == $user['email'])
					$email_exist = TRUE;
			}

			if ($email_exist && $username_exist) {
				$result = 3;
			} elseif ($email_exist) {
				$result = 2;
			} elseif ($username_exist) {
				$result = 1;
			}
		}
		else {
			$result = 0;
		}

		return $result;
	}
	
	function login($username, $password) {
		$query = $this->db->get_where('Users', array('username' => $username,
			'password' => $password));
		$result = $query->row();

		return $result;
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
