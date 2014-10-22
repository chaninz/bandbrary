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
			ดูงาน
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<div class="job-hea2"><?= $job->name ?></div>
				<?php if ($current_employment_status == 2): ?>
					<div class="ui visible success message">
						<i class="icon ok sign"></i> ยินดีด้วย คุณได้งานนี้
					</div>
				<?php elseif ($job->status == 0): ?>
					<div class="ui visible info message">
						<i class="icon info"></i> ขออภัย งานนี้ปิดรับสมัครแล้ว
					</div>
				<?php endif; ?>
				<div class="ui divided list">
					<div class="item">
						<div class="content">
							<div class="header">ประเภทงาน</div>
							<?= $job->job_type ?>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">สไตล์</div>
							<?= $job->style ?>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">สถานที่</div>
							<?= $job->venue ?>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">จังหวัด</div>
							<?= $job->province ?>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">ค่าจ้าง</div>
							<?= $job->budget ?>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">รายละเอียด</div>
							<?= $job->description ?>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">วันที่</div>
							<?= mdate("%d/%n/%Y", strtotime($job->date)) ?>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">เวลา</div>
							<?= mdate("%H:%i", strtotime($job->time)) ?> น.
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">ระยะเวลา</div>
							<?= $this->utils->duration_text($job->duration) ?>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">ผู้สนใจ</div>
							<?php if ($job_requests): ?><?php foreach ($job_requests as $job_request) : ?>
							<div id="job-pd" class="field">
								<div class="jp1"><?php if($this->session->userdata('photo_url')): ?>
									<img src="<?= base_url('uploads/images/profile/'.$this->session->userdata('photo_url')) ?>" class="img-preview"/><?php else: ?>
									<img src="<?= base_url('images/no_profile.jpg') ?>" class="img-preview"/><?php endif; ?>
								</div>
								<div class="jp2"><?= $job_request->name.' '.$job_request->surname ?></div>
								<div class="jp3">
									<?php if ($job->status == 1): ?>
										<?php if ($job_request->status == 1): ?>
											<a class="ui green button" href="<?= base_url('job/accept/'.$job->id.'?user='.$job_request->user_id) ?>">ยืนยัน</a>
											<a class="ui red button" href="<?= base_url('job/reject/'.$job->id.'?user='.$job_request->user_id) ?>">ปฏิเสธ</a>
										<?php elseif ($job_request->status == 2): ?>
											<a class="ui green active button">ยืนยันแล้ว</a>
											<a class="ui button" href="<?= base_url('job/reset/'.$job->id.'?user='.$job_request->user_id) ?>">ยกเลิก</a>
										<?php elseif ($job_request->status == 3): ?>
											<a class="ui red active button">ปฏิเสธแล้ว</a>
											<a class="ui button" href="<?= base_url('job/reset/'.$job->id.'?user='.$job_request->user_id) ?>">ยกเลิก</a>
										<?php endif; ?>	
									<?php endif; ?>
								</div>
							</div>
							<?php endforeach; ?><?php else: ?>
							ไม่มีผู้สนใจ
						<?php endif; ?>
						</div>
					</div>
				</div>
				<?php if ($job->status == 1): ?>
					<?php if ($current_employment_status == 0): ?>
						<a class="ui red button" href="<?= base_url('job/request/'.$job->id) ?>">รับงานนี้</a>
					<?php elseif ($current_employment_status == 1): ?>
						<a class="ui button" href="<?= base_url('job/cancel/'.$job->id) ?>">ยกเลิกงานนี้</a>
					<?php elseif ($current_employment_status == 2): ?>
						<a class="ui button" href="<?= base_url('job/cancel/'.$job->id) ?>">ยกเลิกงานนี้</a>
					<?php elseif ($current_employment_status == 3): ?>
						<a class="ui disabled button" href="<?= base_url('job/cancel/'.$job->id) ?>">ถูกปฏิเสธแล้ว</a>
					<?php endif; ?>
				<?php else: ?>
					<?php if ($current_employment_status == 3): ?>
						<a class="ui disabled button" href="<?= base_url('job/cancel/'.$job->id) ?>">ถูกปฏิเสธแล้ว</a>
					<?php else: ?>
						<a class="ui disabled button">ปิดรับสมัครแล้ว</a>
					<?php endif; ?>
				<?php endif; ?>
				<a class="ui button">ปิดรับสมัคร</a>
			</div>

			<div class="col-xs-2"></div>
		</div>
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8"></div>
			<div class="col-xs-2">
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
	<?php $this->load->view('job/sidebar_left'); ?>
	<?php $this->load->view('footer'); ?>
	<script>
	$('.demo.sidebar').first().sidebar('attach events', '.toggle.button');
	</script>
</body>
</html>