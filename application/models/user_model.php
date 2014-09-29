<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function signup($user) {
		$this->db->insert('Users',$user);
	}

	function is_exist($user) {
		// Check if email or username are exist.

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
	
	function signin($username, $password) {
		$this->db->where(array('username' => $username,
				'password' => $password));
		$query = $this->db->get('Users');
		$result = $query->row();

		return $result;
	}
	
	function get($id){
		$this->db->select('*');
		$this->db->select('Users.id AS id');
		$this->db->join('Provinces', 'Users.province_id = Provinces.id');
		$query = $this->db->get_where('Users', array('Users.id' => $id));
		$result = $query->row();

		return $result;
	}

	function get_by_username($username){
		$this->db->select('*');
		$this->db->select('Users.id AS id');
		$this->db->join('Provinces', 'Users.province_id = Provinces.id');
		$query = $this->db->get_where('Users', array('username' => $username));
		$result = $query->row();

		return $result;
	}

	function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update('Users', $data);
	}

	function get_biography($id){
		$this->db->select('biography');
		$query = $this->db->get_where('Users', array('id' => $id));
		$result = $query->row();

		return $result;
	}

	/************* Above code is production code *************/
	/************* Below code for temporary used *************/

	// moved code
	function updateProfile($data,$id){
		$this->db->where('id',$id);
		$this->db->update('Users',$data);
	} // get data but do not care about type

	function getProfile(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Users');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->row();
		// return 1 person
	}
	
	function getBiography(){
		$id = $this->session->userdata('id');
		$this->db->select('biography');
		$this->db->from('Users');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->row();
	}

	// proceeding

	function post($by_id,$username,$content,$type){
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

	function updateBiography($biography){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->insert('Users',$data);
	}

	function greedd(){
		$this->db->insert($data);
	}

	function ungreedd(){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->delete('greedd',$data);	
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */