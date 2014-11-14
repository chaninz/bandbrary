<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm_band_model extends CI_Model {

	function __construct(){
		parent::__construct();	
		$this->load->model('join_band_model','Join_Band');
	}

	function add($data){
		$this->db->insert('PM_Bands',$data);
		$id = $this->db->insert_id();
		return $id;	
	}

	function getPmBand(){
		$user_id = $this->session->userdata('id');
		$band_id = $this->Join_Band->get_current_band($user_id);
		if($band_id == null){
			$band_id = 0;
		}else{
			$band_id = $band_id->band_id;
		}

		$query = $this->db->query('
			select PM_Bands.band_id AS band_id,Bands.name,PM_Bands.timestamp,PM_Bands.text,Users.name AS username,Users.photo_url AS from_photo  FROM PM_Bands
						Join Users on PM_Bands.user_id = Users.id
						Join Bands on PM_Bands.band_id = Bands.id
						WHERE PM_Bands.timestamp = (SELECT MAX(timestamp)
                   					from PM_Bands 
                   					join Join_Band on PM_Bands.user_id = Join_Band.user_id
                             		where  PM_Bands.band_id = '.$band_id.' and Join_Band.status = 2           
                                             )
						ORDER BY PM_Bands.timestamp
						
		');
		return $query->result();
	}

	function getMsgToBand(){
		$user_id = $this->session->userdata('id');
		$band_id = $this->Join_Band->get_current_band($user_id);
		if($band_id == null){
			$band_id = 0;
		}else{
			$band_id = $band_id->band_id;
		}

		$query = $this->db->query('
			select distinct pm1.*,count(*) as total_msg ,u.name,u.surname,u.photo_url
			from (select * from PM_Bands order by PM_Bands.timestamp desc) as pm1 
			join Users u on pm1.user_id  = u.id
            join Receive_Noti_Band r on pm1.id = r.receive_id
			where  r.user_id = '.$user_id.' and r.band_id = '.$band_id.' and r.seen_date is null and
            NOT EXISTS (select * from Join_Band j where pm1.user_id = j.user_id)
			group by pm1.user_id
			order by pm1.timestamp desc
						
		');
		return $query->result();
	}

	function getTotalMsgToBand(){
		$user_id = $this->session->userdata('id');
		$band_id = $this->Join_Band->get_current_band($user_id);
		if($band_id == null){
			$band_id = 0;
		}else{
			$band_id = $band_id->band_id;
		}

		$query = $this->db->query('
			select count(*) as total_msg 
			from (select * from PM_Bands order by PM_Bands.timestamp desc) as pm1 
			join Users u on pm1.user_id  = u.id
            join Receive_Noti_Band r on pm1.id = r.receive_id
			where  r.user_id = '.$user_id.' and r.band_id = '.$band_id.' and r.seen_date is null and
            NOT EXISTS (select * from Join_Band j where pm1.user_id = j.user_id)
			group by pm1.user_id
			order by pm1.timestamp desc
						
		');
		$total = 0;
		foreach ($query->result() as $value) {
			$total += $value->total_msg;
		}
		return $total;
	}
	
	function view($band_id){
		$current_id = $this->session->userdata('id');
		$query = $this->db->query('select *,Users.photo_url AS from_photo FROM PM_Bands
									join Join_Band on PM_Bands.user_id = Join_Band.user_id 
									Join Users on Users.id = PM_Bands.user_id 
									where PM_Bands.band_id = '.$band_id.' and Join_Band.status = 2
									order by PM_Bands.timestamp,PM_Bands.id ');
		return $query->result();

		// $query = $this->db->get();
		// return $query->result();
	}

	function delete($data){
		$current_id = $this->session->userdata('id');
		$this->db->where('id',$current_id);
		$this->db->delete('Greedd',$data);
	}

	
	
	function get_pm_by_bandid($id){
		$this->db->select('PM_Bands.*,f.name as from_user_name ,f.surname as from_user_surname ,f.photo_url as from_photo,Bands.name as bandname');
		$this->db->from('PM_Bands');
		$this->db->join('Users f', 'PM_Bands.user_id = f.id');
		$this->db->join('Bands', 'PM_Bands.band_id = Bands.id');
		$this->db->where('PM_Bands.id',$id);	
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */