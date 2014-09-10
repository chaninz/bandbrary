<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postcomment_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function add($data){
		$this->db->insert('Post_Comments',$data);
	}

	function delete($pcomment_id){
		$this->db->delete('Greedd',$pcomment_id);
	}

	funcion getComment(){

	}

}
