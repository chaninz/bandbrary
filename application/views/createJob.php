<div>
	<form action="<?php echo base_url().'user/createJob'; ?>" method="post" >  
		
		Job Name : <input type="text" name="event" required> <br />    
		Job Type : <select name="job_type">
					  <option value="1">Wedding</option>
					  <option value="2">Restuarant</option>
					  <option value="3">Hotel</option>
					</select>
		Style :  <select name="style">
					  <option value="1">pop</option>
					  <option value="2">rock</option>
					  <option value="3">punk</option>
				 </select>
		Description : <input type="text" name="description"> <br /> 
		Venue : <input type="text" name="venue"> <br />  
		Province : <input type="text" name="province"> <br /> 
		Budget : <input type="number" name="budget"> <br />
		Start Time : <input type="datetime" name="start_time"> <br />
		End Time : <input type="datetime" name="end_time"> <br>
		** Year/Month/Date


	</form>
</div>			