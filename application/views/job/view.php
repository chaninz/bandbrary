<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>
	
	<style>
	body {
		background: #FFFFFF url('images/noise-2.png');
	}
	.ui.menu .item {
		font-size: 1.5rem;
	}
	.ui.buttons .button, .ui.button {
		font-size: 1.3rem;
	}
	.ui.items .item > .image > img {
		height: 120px;
	}
	.ui.items:first-child {
		margin-top: 2em;
	}
	
	.ui.items > .row > .item, .ui.items > .item {
		padding: 0px;
	}
	.ui.segment {
		padding-top: 10px;
		padding-bottom: 2px;
		padding-left: 0px;
		padding-right: 0px;
	}
	.ui.items {
		margin: 0px;
	}
	i.inverted.icon {
		background-color: #E72A30;
	}
	.ui.label {
		font-size: 1.1rem;
	}
	.ui.red.labels .label, .ui.red.label {
		margin-top: 4px;
		margin-left: 2px;
	}
	.ui.items .item > .content > .description {
		height: 130px;
	}
	.job-hea2 {
		font-size: 22px;
		margin-top: 50px;
		font-weight: 600;
	}
	#job-pd {
		height: 75px;
		width: 570px;
		border: 1px solid #EBEBEB;
		margin-top: 10px;
		margin-left: 30px;
	}
	.jp1 {
		width: 73px;
		height: 73px;
		float: left;
	}
	.jp2 {
		width: 73px;
		height: 73px;
		float: left;
		margin-top: 7px;
		margin-left: 9px;
	}
	.jp3 {
		float: left;
		margin-top: 21px;
		margin-left: 250px;
	}
	.ui.buttons .button, .ui.button {
		font-size: 1rem;
	}
	</style>
</head>
<body>
	<?php $this->load->view('navigation'); ?>

	<div class="job-top">

		<div class="job-hea1">
			My Jobs
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<div class="job-hea2">Jobs Name</div>
				<div class="ui divided list">
					<div class="item">
						<div class="content">
							<div class="header">Type</div>
							An excellent companion
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Style</div>
							A poodle, its pretty basic
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Venue</div>
							<span id="jobvenue"></span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Province</div>
							He's also a dog
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Budget</div>
							<span id="jobbudget"></span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Description</div>
							<span id="jobdescription"></span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Start Time</div>
							<span id="jobstart"></span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">End Time</div>
							<span id="jobend"></span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Pending</div>
							<div id="job-pd" class="field">
								<div class="jp1"><img src="../../images/no_profile.jpg" alt="" id="img-preview"></div>
								<div class="jp2">
									<span><label><?= $job_request->name.' '.$job_request->surname ?></label></span>								</div>
								<div class="jp3">
									<div class="ui red button">
										<a class="ui red button" href="<?= base_url('job/request/accept/'.$job_request->id.'?ref='.uri_string()) ?>">
									</div>
									<div class="ui button">
										<a class="ui button" href="<?= base_url('job/request/reject/'.$job_request->id.'?ref='.uri_string()) ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-2"></div>
		</div>
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
			</div>
			<div class="col-xs-2">
				<!-- <a id="job-btn-add" class="circular ui red icon add button" href="<?= base_url('job/add') ?>">
					<i class="icon add"></i>
				</a>
				<div id="job-btn-menu" class="circular ui red icon toggle button">
					<i class="icon reorder"></i>
				</div> -->
				<div class="job-control">
					<div class="ui vertical labeled icon menu" style="background-color: #D95C5C">
						<a class="red item" style="color: #FFFFFF" href="<?= base_url('job/add') ?>">
							<i class="add icon"></i>
							Add
						</a>
						<a class="red item toggle button" style="color: #FFFFFF">
							<i class="reorder icon"></i>
							Sidebar
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Sidebar Job -->
	<div class="ui red vertical demo sidebar menu">
		<a class="item">
			<i class="home icon"></i>
			All Jobs
		</a>
		<a class="active item" href="nearJob.html">
			<i class="heart icon"></i>
			Near Jobs
		</a>
		<a class="item" href="myJob1.html">
			<i class="heart icon"></i>
			My Jobs
		</a>
		<a class="item" href="getJob.html">
			<i class="tasks icon"></i>
			Get Jobs
		</a>
		<div class="item">
			<b>Search</b>
			<p/>
			<div class="ui icon input">
				<input type="text" placeholder="Search...">
				<i class="inverted search icon"></i>
			</div>
		</div>
		<div class="item">
			<b>Tag</b>
			<p/>
			<div class="ui red labels">
				<a class="ui label">
					Blues
				</a>
				<a class="ui label">
					Country
				</a>
				<a class="ui label">
					Hip Hop
				</a>
				<a class="ui label">
					Jazz
				</a>
				<a class="ui label">
					Latin
				</a>
				<a class="ui label">
					Pop
				</a>
				<a class="ui label">
					Reggae
				</a>
				<a class="ui label">
					R&B
				</a>
				<a class="ui label">
					Rock
				</a>
				<a class="ui label">
					Wedding
				</a>
				<a class="ui label">
					Restuarant
				</a>
				<a class="ui label">
					Hotel
				</a>
			</div>
		</div>
	</div>

	<!-- View job modal -->
	<div class="ui form segment create modal">
		<i class="close icon"></i>
		<div class="header">
			<span id="jobname"></span>
		</div>
		<div class="content">
			<div class="left" style="width: 60px">
				<img src="" alt="" class="job-img">
				<div class="ui divided list">
					<div class="item">
						<div class="content">
							<div class="header">Start Time</div>
							<span id="jobstart"></span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">End Time</div>
							<span id="jobend"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="ui divided list">
					<div class="item">
						<div class="content">
							<div class="header">Type</div>
							An excellent companion
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Style</div>
							A poodle, its pretty basic
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Venue</div>
							<span id="jobvenue"></span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Province</div>
							He's also a dog
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Budget</div>
							<span id="jobbudget"></span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Description</div>
							<span id="jobdescription"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="actions">
			<div class="ui button">Pin Job</div>
			<input type="submit" class="ui red submit button" value="Get job">
		</div>
	</div>

	<?php $this->load->view('footer'); ?>
	<script>
	$('.demo.sidebar').first().sidebar('attach events', '.toggle.button');
	</script>
</body>
</html>