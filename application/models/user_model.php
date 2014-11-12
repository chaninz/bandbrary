<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function signup($user) {
		$this->db->insert('Users',$user);
	}

	function is_exist($username, $email) {
		// Check if email or username are exist.

		$result = 0;
		$email_exist = FALSE;
		$username_exist = FALSE;
		$this->db->or_where($id);
		$query = $this->db->get('Users');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				if ($row->username == $username)
					$username_exist = TRUE;
				if ($row->email == $email)
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

	function is_username_exist($username) {
		$query = $this->db->get_where('Users', array('username' => $username));
		$user = $query->row();
		$result = 0;
		if ($user != NULL) {
			$result = 1;
		}

		return $result;
	}

	function is_email_exist($email) {
		$query = $this->db->get_where('Users', array('email' => $email));
		$user = $query->row();
		$result = 0;
		if ($user != NULL) {
			$result = 1;
		}

		return $result;
	}
	
	function signin($username, $password) {
		$query = $this->db->get_where('Users', array('username' => $username,
			'password' => $password));
		$result = $query->row();

		return $result;
	}
	
	function get($id) {
		$this->db->select('*');
		$this->db->select('Users.id AS id');
		$this->db->join('Provinces', 'Provinces.id = Users.province_id');
		$query = $this->db->get_where('Users', array('Users.id' => $id));
		$result = $query->row();

		return $result;
	}

	function get_by_id($id) {
		$query = $this->db->get_where('Users', array('Users.id' => $id));
		$result = $query->row();

		return $result;
	}

	function get_by_username($username) {
		$this->db->select('*');
		$this->db->select('Users.id AS id');
		$this->db->join('Provinces', 'Provinces.id = Users.province_id');
		$query = $this->db->get_where('Users', array('username' => $username));
		$result = $query->row();

		return $result;
	}

	function get_by_pass_str($pass_str) {
		$this->db->select('id');
		$query = $this->db->get_where('Users', array('pass_str' => $pass_str));
		$result = $query->row();

		return $result;
	}

	function update($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('Users', $data);
	}

	function get_biography($id) {
		$this->db->select('biography');
		$query = $this->db->get_where('Users', array('id' => $id));
		$result = $query->row();

		return $result;
	}

	// function get_oldband($id) {
	// 	$this->db->select('Bands.name');
	// 	$this->db->from('Users');
	// 	$this->db->join('Join_Band', 'Join_Band.user_id = Users.id');
	// 	$this->db->join('Bands', 'Join_Band.band_id = Bands.id');
	// 	$this->db->where('Users.id',$id);

	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	/************* Above code is production code *************/
	/************* Below code for temporary used *************/

	// proceeding

	function post($by_id,$username,$content,$type){
		$id = $this->session->userdata('id');
		$query = $this->db->query("insert into (by_id,username,content) values ($by_id,'$username','$content')");
		$query2 = $this->db->query("select COUNT(id) COUNT from post where by_id = $id");
		$result = $query2->row();
		$this->session->set_userdata('count',$result->COUNT);
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

	function timeline($user_id){
		$query = $this->db->query('
		SELECT User_Status.id,User_Status.status as text,User_Status.timestamp,"Status" as type,Users.name as username,Users.surname as surname
		FROM User_Status
		JOIN Users ON User_Status.user_id = Users.id
		where Users.id = '.$user_id.'
		union all
		select User_Music.id,User_Music.name as text,User_Music.timestamp,"Music" as type,Users.name as username,Users.surname as surname
		from User_Music
		JOIN User_Albums on User_Music.album_id = User_Albums.id
		JOIN Users on User_Albums.user_id = Users.id
		where Users.id = '.$user_id.'

		ORDER BY timestamp desc');
		return $query->result();


	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */