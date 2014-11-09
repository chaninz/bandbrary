<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>งานที่จัดใกล้เคียงวงของฉัน | Bandbrary</title>

	<?php $this->load->view('header'); ?>

	<style>
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
	.ui.corner.label .icon {
		font-size: 1.4em;
		margin: 0em 0em 0em 0.35em;
	}
	</style>
</head>
<body>

	<?php $this->load->view('navigation'); ?>

	<div class="job-top">
		<div class="job-hea1">
			งานที่จัดใกล้เคียงวงของฉัน
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-10">
				<div class="job-hea2">ค้นพบ <span class="job-total"><?= count($jobs) ?></span> งาน</div>
			</div>
			<div class="col-xs-2"></div>
		</div>
		<div class="row">
			<div class="col-xs-10">
				<div class="ui four items"><?php foreach ($jobs as $job): ?>
					<div id="preview-job" class="item view job" data-id="<?= $job->id ?>">
						<div class="content">
							<div class="name"><a href="<?= base_url('job/view/'.$job->id) ?>"><?= $job->name ?></a></div>
							<p class="description"><?= $job->description ?></p>
							<div>ค่าจ้าง <?= $job->budget ?> บาท</div>
							<div>สถานที่ <?= $job->venue ?></div>
							<div>วันที่ <?= mdate("%d/%n/%Y", strtotime($job->date)) ?></div>
							<div>เวลา <?= mdate("%H:%i", strtotime($job->time)) ?> น.</div>
						</div>
						<i id="job-icon" class="map marker icon"></i>
						<span class="job-location"><?= $job->province ?></span>
						<div class="job-red-line"></div>
					</div><?php endforeach ?>
				</div>
			</div>
			<?php $this->load->view('job/sidebar_right'); ?>
		</div>
	</div>


	<?php $this->load->view('job/sidebar_left'); ?>
	<?php $this->load->view('footer'); ?>
</div>

<script>
	$('.demo.sidebar').first().sidebar('attach events', '.toggle.button');
</script>
</body>
</html>