<?php class Register_m extends CI_Model {     
function get_data(){        
return mysql_query("select * from Users");    
	} 
} ?>