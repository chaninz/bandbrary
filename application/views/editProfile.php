<div>
    <?php echo $email;?>
	<form action="<?php echo base_url().'user/register'; ?>" method="post" >  
    	Email : <span style="color:red">*</span> <input type="text" maxlength="30" name="email" value="<?php echo $email; ?>" disabled> <br />
        Name : <span style="color:red">*</span> <input type="name" maxlength="30" name="name" value="<?php echo $name; ?>" required> <br />
        Surname : <span style="color:red">*</span> <input type="surname" maxlength="30" name="surname" value="<?php echo $surname; ?>" required> <br />
        Province : <span style="color:red">*</span> <input type="province" name="province" required><br />
        Usertype : <input type="radio" name="usertype" value="00" required> member <br /> <input type="radio"
		name="usertype" value="01" /> artist  <br />
 		Cover image : <input type="file" name="cover" value="<?php echo $cover_url; ?>" required> <br />     
        Profile image : <input type="file" name="profile" value="<?php echo $photo_url; ?>" required> <br>  
        Biography : <input type="text" name="biography" value="<?php echo $biography; ?>"required> <br />
        Facebook URL : <input type="text" name="fburl" > <br />
        Twitter URL : <input type="text" name="twurl" ><br />
        
        <input type="submit" value="Register" />
    </form>