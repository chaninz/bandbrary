<div>
	<form action="user/createBand" method="post" > 
    	Band name : <span style="color:red">*</span> <input type="text" maxlength="30" name="name" required> <br />
        Cover image : <input type="file" name="cover" required> <br>  
        Profile image : <input type="file" name="photo" required> <br>  
        Biography : <input type="text" name="biography" required> <br />
        Facebook URL : <input type="text" name="fburl" > <br />
        Twitter URL : <input type="text" name="twurl" ><br />
        
        <input type="submit" value="Register" />
    </form>
</div>