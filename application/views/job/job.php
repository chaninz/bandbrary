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
		background: #FFFFFF url('<?= base_url('images/noise-2.png') ?>');
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
	</style>
</head>
<body>

	<?php $this->load->view('navigation'); ?>

	<div class="job-top">

		<div class="job-hea1">
			All Jobs
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<div class="job-hea2">Explore <span class="job-total"><?= count($jobs) ?></span> Jobs</div>
			</div>
			<div class="col-xs-2"></div>
		</div>
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<div class="ui four items"><?php foreach ($jobs as $job): ?>
					<div id="preview-job" class="item view job" data-id="<?= $job->id ?>">
						<div class="image">
							<img src="<?= base_url('images/bass.jpg') ?>">
							<a class="star ui corner label">
								<i class="star icon"></i>
							</a>
						</div>
						<div class="content">
							<div class="name"><?= $job->name ?></div>
							<p class="description"><?= $job->description ?></p>
						</div>
						<i id="job-icon" class="map marker icon"></i>
						<span class="job-location"><?= $job->province ?>, Thailand</span>
						<div class="job-red-line"></div>
					</div><?php endforeach ?>
				</div>
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


	<?php $this->load->view('job/sidebar_left'); ?>

	<!-- View job modal -->
	<div class="ui form segment create modal">
		<i class="close icon"></i>
		<div class="header">
			<span id="jobname"></span>
		</div>
		<div class="content">
			<div class="left" style="width: 120px">
				<div class="ui divided list">
					<div class="item">
						<div class="content">
							<div class="header">Date</div>
							<span id="jobstart"></span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Time</div>
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
		</div>
		<div class="actions">
			<div class="ui button">Cancel</div>
			<input type="submit" class="ui red submit button" value="Get job">
		</div>
	</div>

	<?php $this->load->view('footer'); ?>
	<script>
	$('.demo.sidebar').first().sidebar('attach events', '.toggle.button');
	$(".view.job").click(function(){
		var id = $(this).attr("data-id");
		$.ajax({
			type:'POST',
			url:'<?= base_url('job/index/get'); ?>',
			data:{id:id},
			success:function(data){
				console.log(data);
				var job = JSON.parse(data);
				$("#jobname").text(job.name);
				$("#jobvenue").text(job.venue);
				$("#jobstart").text(job.start);
				$("#jobend").text(job.end);
				$("#jobbudget").text(job.budget);
				$("#jobdescription").text(job.description);
				$('.create.modal').modal('show');
			}
		});
		
	})	
	
	</script>
</body>
</html>