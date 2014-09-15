<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
		<?php $this->load->view('header'); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="<?php echo base_url().'user/job/edit'; ?>" method="post"/>  
				<div class="ui form segment">
					<div class="field">
						<label>Job Name</label>
							<input type="hidden" name="id" value="<?php echo $id; ?>"> 
							<input type="text" placeholder="Job Name" name="name" value="<?php echo $name; ?>" readonly>
					</div>
					<div class="field">
						<label>Job Type</label>
						<div class="ui fluid selection dropdown">
							<div class="text">Select</div>
							<i class="dropdown icon"></i>
							<input type="hidden" name="job_type" value="<?php echo $job_type; ?>" >
							<div class="menu">
								<div class="item <?php echo ($job_type ==1)?'active':'';?>" data-value="1" style="font-size: 14px;">Wedding</div>
								<div class="item <?php echo ($job_type ==2)?'active':'';?>" data-value="2" style="font-size: 14px;">Restuarant</div>
								<div class="item <?php echo ($job_type ==3)?'active':'';?>" data-value="3" style="font-size: 14px;">Hotel</div>
							</div>
						</div>
					</div>
					<div class="field">
						<label>Style</label>
						<div class="ui fluid selection dropdown">
							<div class="text">Select</div>
							<i class="dropdown icon"></i>
							<input type="hidden" name="style" value="<?php echo $style; ?>">
							<div class="menu">
								<div class="item <?php echo ($style ==1)?'active':'';?>" data-value="1" style="font-size: 14px;">Blues</div>
								<div class="item <?php echo ($style ==2)?'active':'';?>" data-value="2" style="font-size: 14px;">Country</div>
								<div class="item <?php echo ($style ==3)?'active':'';?>" data-value="3" style="font-size: 14px;">Hip Hop</div>
								<div class="item <?php echo ($style ==4)?'active':'';?>" data-value="4" style="font-size: 14px;">Jazz</div>
								<div class="item <?php echo ($style ==5)?'active':'';?>" data-value="5" style="font-size: 14px;">Latin</div>
								<div class="item <?php echo ($style ==6)?'active':'';?>" data-value="6" style="font-size: 14px;">Pop</div>
								<div class="item <?php echo ($style ==7)?'active':'';?>" data-value="7" style="font-size: 14px;">Reggae</div>
								<div class="item <?php echo ($style ==8)?'active':'';?>" data-value="8" style="font-size: 14px;">R&B</div>
								<div class="item <?php echo ($style ==9)?'active':'';?>" data-value="9" style="font-size: 14px;">Rock</div>
							</div>
						</div>
					</div>
					<div class="field">
						<label>Description</label>
						<textarea name="description"> <?php echo $description; ?></textarea>
					</div>
					<div class="field">
						<label>Venue</label>
							<input type="text" placeholder="Job Name" name="venue"  value="<?php echo $venue; ?>">
					</div>
					<div class="field">
						<label>Province</label>
						<div class="ui fluid selection dropdown">
							<div class="text">Select</div>
							<i class="dropdown icon"></i>
							<input type="hidden" name="province" value="<?php echo $province_id; ?>" >
							<div class="menu">
								<div class="item  <?php echo ($province_id ==1)?'active':'';?>" data-value="1" style="font-size: 14px;">Bangkok</div>
								<div class="item <?php echo ($province_id ==2)?'active':'';?>" data-value="2" style="font-size: 14px;">Changmai</div>
							</div>
						</div>
					</div>
					<div class="field">
						<label>Budget</label>					
							<input type="number" placeholder="Budget" name="budget"  value="<?php echo $budget; ?>">
					</div>
					<div class="field">
						<label>Start Time</label>
						<div class="ui left labeled icon input">
							<input type="date" placeholder="" style="padding: .2em 1em;" name="start_time" value="<?php echo $start_time; ?>" > 
							<i class="calendar icon"></i>
						</div>
					</div>
					<div class="field">
						<label>End Time</label>
						<div class="ui left labeled icon input">
							<input type="date" placeholder="" style="padding: .2em 1em;" name="end_time" value="<?php echo $end_time; ?>" >
							<i class="calendar icon"></i>
						</div>
					</div>
					<input class="ui red submit button" type="submit" value="Save Change">
				</form>
				</div>
			</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<?php $this->load->view('footer'); ?>
</body>
</html>