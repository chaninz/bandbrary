<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
Form login
<form method="post" action="<?php echo base_url().'user/login'; ?>">
	username : <input type="text" name="username" maxlength="30" />
    password : <input type="password" name="password" />
    <input type="submit" ckass="btn" value="Login" />
</form>
<hr/>


<div class="ajaxcontent">
ajax content
<p></p>
</div>
</body>
<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"/></script>
<script>
	$(document).ready(function(e) {
		$.ajax({
		  type:"POST",
		  url: "user/getText",
		  data :{data:' ::: punpun sa :3'},
		  success: function(msg){
			  $(".ajaxcontent p").html(msg);
			}
		});
    });
</script>

</html>