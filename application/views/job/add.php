<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>
</head>

<style>
.ui.header {
	font-size: 2.4em;
	margin-left: 60px;
	font-weight: bold;
}
.col-xs-8 {
	padding-top: 70px;
}
.col-xs-6 {
	padding-bottom: 70px;
}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<div class="ui header">
					Create Job
				</div>
				<p/>
				<div class="line"></div>
				<p/><br/>
			</div>
			<div class="col-xs-2"></div>
		</div>
		<div class="row">
			<div class="col-xs-3"></div>
			<div class="col-xs-6">
				<form action="<?php echo base_url().'job/add'; ?>" method="post" > 
					<div class="ui form segment">
						<div class="field">
							<label>Job Name</label>
							<input type="text" placeholder="Job Name" name="name">
						</div>
						<div class="field">
							<label>Job Type</label>
							<div class="ui fluid selection dropdown">
								<div class="text">Select</div>
								<i class="dropdown icon"></i>
								<input type="hidden" name="job_type">
								<div class="menu">
									<div class="item" data-value="1" style="font-size: 14px;">Wedding</div>
									<div class="item" data-value="2" style="font-size: 14px;">Restuarant</div>
									<div class="item" data-value="3" style="font-size: 14px;">Hotel</div>
								</div>
							</div>
						</div>
						<div class="field">
							<label>Style</label>
							<div class="ui fluid selection dropdown">
								<div class="text">Select</div>
								<i class="dropdown icon"></i>
								<input type="hidden" name="style">
								<div class="menu">
									<div class="item" data-value="1" style="font-size: 14px;">Blues</div>
									<div class="item" data-value="2" style="font-size: 14px;">Country</div>
									<div class="item" data-value="3" style="font-size: 14px;">Hip Hop</div>
									<div class="item" data-value="4" style="font-size: 14px;">Jazz</div>
									<div class="item" data-value="5" style="font-size: 14px;">Latin</div>
									<div class="item" data-value="6" style="font-size: 14px;">Pop</div>
									<div class="item" data-value="7" style="font-size: 14px;">Reggae</div>
									<div class="item" data-value="8" style="font-size: 14px;">R&B</div>
									<div class="item" data-value="9" style="font-size: 14px;">Rock</div>
								</div>
							</div>
						</div>
						<div class="field">
							<label>Description</label>
							<textarea name="description"></textarea>
						</div>
						<div class="field">
							<label>Venue</label>
							<input type="text" placeholder="Location" name="venue">
						</div>
						<div class="field">
							<label>Province</label>
							<div class="ui fluid selection dropdown">
								<div class="text">Select</div>
								<i class="dropdown icon"></i>
								<input type="hidden" name="province">
								<div class="menu">
									<div class="item" data-value="10" style="font-size: 14px;">Bangkok</div>
									<div class="item" data-value="36" style="font-size: 14px;">Chaiyaphum</div>
									<div class="item" data-value="50" style="font-size: 14px;">Chiang Mai</div>
								</div>
							</div>
						</div>
						<div class="field">
							<label>Budget</label>					
							<input type="number" placeholder="Budget" name="budget">
						</div>
						<div class="field">
							<label>Date</label>
							<div class="ui left labeled icon input">
								<input type="date" placeholder="" style="padding: .01em 1em;" name="start_time">
								<i class="calendar icon"></i>
							</div>
						</div>
						<div class="field">
							<label>Time</label>
							<div class="ui left labeled icon input">
								<input type="time" placeholder="" style="padding: .01em 1em;" name="end_time">
								<i class="time icon"></i>
							</div>
						</div>

						<input class="ui red submit button" type="submit" value="register">

					</div>
				</form>
			</div>
			<div class="col-xs-3"></div>
		</div>
	</div>
	<?php $this->load->view('footer'); ?>
</body>
</html>