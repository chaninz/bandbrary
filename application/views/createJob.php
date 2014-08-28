<div>
	<form action="<?php echo base_url().'user/createJob'; ?>" method="post" >  
		
		Job Name : <input type="text" name="event" required> <br />    
		Job Type : <select>
					  <option value="Wedding">Volvo</option>
					  <option value="Restuarant">Saab</option>
					  <option value="Hotel">Mercedes</option>
					</select>
		Style :  <select>
					  <option value="Wedding">Volvo</option>
					  <option value="Restuarant">Saab</option>
					  <option value="Hotel">Mercedes</option>
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