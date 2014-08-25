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
Form Register
<div>
	<form action="<?php echo base_url().'user/register'; ?>" method="post" >  
    	Email : <span style="color:red">*</span> <input type="text" maxlength="30" name="email" required> <br />
    	Username : <span style="color:red">*</span> <input type="text" maxlength="30" name="username" required> <br />
        Password : <span style="color:red">*</span> <input type="password" maxlength="30" name="password" required> <br />
        Confirm Password : <span style="color:red">*</span> <input type="cpassword" maxlength="30" name="cpassword" required> <br />
        Name : <span style="color:red">*</span> <input type="name" maxlength="30" name="name" required> <br />
        Surname : <span style="color:red">*</span> <input type="surname" maxlength="30" name="surname" required> <br />
        Province : <span style="color:red">*</span> <input type="province" name="province" required><br />
        usertype : <input type="radio" name="usertype" value="00" required> member <br /> <input type="radio"
		name="usertype" value="01" /> artist  <br />
 		Cover image : <input type="file" name="cover" required> <br />     
        Profile image : <input type="file" name="profile" required> <br>  
        Biography : <input type="text" name="biography" required> <br />
        Facebook URL : <input type="text" name="fburl" > <br />
        Twitter URL : <input type="text" name="twurl" ><br />
        
        <input type="submit" value="Register" />
    </form>
</div>

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