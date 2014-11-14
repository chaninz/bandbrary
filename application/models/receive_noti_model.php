<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Receive_noti_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}


	function add($data) {
		$this->db->insert_batch('Receive_Noti', $data);
		
	}
	function addOnce($data) {
		$this->db->insert('Receive_Noti', $data);
		
	}

	function getReceive_NotiUser(){
		$id = $this->session->userdata('id');
		$this->db->select('Notification.*,Users.name AS from_user_name,Users.surname as from_user_surname,Notification.type,Bands.name as bandname,User_Music.name as usermusic,Band_Music.name as bandmusic,Jobs.name as jobname,Band_Posts.topic as topicband');
		$this->db->from('Receive_Noti');
		$this->db->join('Notification', 'Receive_Noti.receive_id = Notification.id');
		$this->db->join('Users', 'Notification.user_id = Users.id');
		$this->db->join('Bands', 'Notification.band_id = Bands.id');
		$this->db->join('Band_Music', 'Notification.music_band_id = Band_Music.id','left');
		$this->db->join('User_Music', 'Notification.music_user_id = User_Music.id','left');
		$this->db->join('Jobs', 'Notification.job_id = Jobs.id','left');
		$this->db->join('Band_Posts','Notification.post_id = Band_Posts.id','left');


		$this->db->where('Receive_Noti.user_id',$id);
		$this->db->order_by('Notification.noti_date','desc');

		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->result();
	}

	// function getReceive_NotiMaster(){
	// 	$band_id = $this->session->userdata('band_id');
	// 	$this->db->select('*');
	// 	$this->db->from('Receive_Noti');
	// 	$this->db->where('band_id',$band_id);
	// 	$this->db->or_where('user_id',$user_id);

	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	function get_total_noti_User(){
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('Receive_Noti');
		$this->db->where('user_id',$id);
		$this->db->where('seen_date is null',null,false);

		$query = $this->db->get();
		return $query->num_rows();
	}

	function is_Master(){
		$user_id = $this->session->userdata('id');
		$band_id = $this->session->userdata('band_id');

		$this->db->select('is_master');
		$this->db->from('Join_Band');
		$this->db->where('band_id',$band_id);
		$this->db->where('user_id',$user_id);

		$query = $this->db->get();
		return $query->row();
	}

	 function seen(){		
	 	$user_id = $this->session->userdata('id');
		$data = array(
               'seen_date' => mdate("%Y-%m-%d %H:%i:%s", now())
            );

		$this->db->where('user_id', $user_id);
		$this->db->update('Receive_Noti', $data); 
	}

	 function seenPM($from_user_id){		
	 	$user_id = $this->session->userdata('id');
		$data = array(
               'seen_date' => mdate("%Y-%m-%d %H:%i:%s", now())
            );
		$this->db->where('to_user_id', $user_id);
		$this->db->where('from_user_id', $from_user_id);
		$this->db->update('PM_Users', $data); 
	}

	//  function seenPMBands(){		
	//  	$user_id = $this->session->userdata('id');
	//  	$band_id = $this->session->userdata('band_id');
	// 	$data = array(
 //               'seen_date' => now()
 //            );

	// 	$this->db->where('user_id', $user_id);
	// 	$this->db->where('band_id', $band_id);
	// 	$this->db->update('PM_Bands', $data); 
	// }
}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */