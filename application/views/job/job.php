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
	.ui.items .item > .image > img {
		height: 130px;
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
	.ui.red.labels .label, .ui.red.label {
		margin-top: 4px;
		margin-left: 2px;
	}
	.ui.items .item > .content > .name {
		font-size: 1.1em;
		height: 40px;
	}
	.ui.items .item > .content > .description {
		font-size: 1em;
		height: 115px;
	}
	</style>
</head>
<body>

	<?php $this->load->view('navigation'); ?>

	<div class="job-top">
		<div class="job-hea1">
			งาน
		</div>
	</div>
	
	<div class="container">
		<div class="row">
		<div class="col-xs-10">
			<div class="job-hea2">ทั้งหมด <span class="job-total"><?= count($jobs) ?></span> งาน</div>
		</div>
		<div class="col-xs-2"></div>
		</div>
		<div class="row">
			<div class="col-xs-10">
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
				<div class="job-control">
					<div class="ui vertical labeled icon menu" style="background-color: #232323">
						<a class="item button" style="color: #FFFFFF" href="<?= base_url('job/add') ?>">
							<i class="add icon"></i>
							สร้างงาน
						</a>
						<a class="item toggle button" style="color: #FFFFFF">
							<i class="reorder icon"></i>
							เมนู
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php $this->load->view('job/sidebar_left'); ?>
		<div class="actions">
			<div class="ui button">Cancel</div>
			<input type="submit" class="ui red submit button" value="Get job">
		</div>
	</div>

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