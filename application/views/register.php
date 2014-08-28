Form Register
<div>
	<form action="<?php echo base_url().'user/register'; ?>" method="post" >  
    	Email : <span style="color:red">*</span> <input type="text" maxlength="30" name="email" required> <br />
    	Username : <span style="color:red">*</span> <input type="text" maxlength="30" name="username" required> <br />
        Password : <span style="color:red">*</span> <input type="password" maxlength="30" name="password" required> <br />
        Confirm Password : <span style="color:red">*</span> <input type="cpassword" maxlength="30" name="cpassword" required> <br />
        Name : <span style="color:red">*</span> <input type="name" maxlength="30" name="name" required> <br />
        Surname : <span style="color:red">*</span> <input type="surname" maxlength="30" name="surname" required> <br />
        Birthday :
        Province : <span style="color:red">*</span> <input type="province" name="province" required><br />
        Usertype : <input type="radio" name="usertype" value="00" required> member <br /> <input type="radio"
		name="usertype" value="01" /> artist  <br />
        Biography : <input type="text" name="biography" required> <br />
        Facebook URL : <input type="text" name="fburl" > <br />
        Twitter URL : <input type="text" name="twurl" ><br />
        
        <input type="submit" value="Register" />
    </form>
</div>