<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
	.ui.piled.segment:after, .ui.piled.segment:before {
		background-color: #F7F6F6;
	}
	i.circular.icon {
		box-shadow: 0em 0em 0em 0.1em #FFFFFF inset;
	}
	</style>

</head>
<body>
	<?php $this->load->view('navigation'); ?>
	<?php $this->load->view('band/cover'); ?>
	<section>
		<article>
			<div class="container">
				<div class="row">

					<?php $this->load->view('band/sidebar_left'); ?>
					<div class="col-xs-9">
						<div class="ui piled feed segment" style="margin-top: 20px; z-index: 1;">
							<?php foreach ($timelines as $timeline): ?>
							<?php if($timeline->type == "Music"): ?>
							<div class="event">
								<div class="label">
									<i class="circular music icon"></i>
								</div>
								<div class="content">
								<div class="date">
										<?= $timeline->timestamp ?>
									</div>
									<div class="summary">
									 	<?= $timeline->bandname ?> ได้เพิ่มเพลงใหม่
									</div>
									<div class="extra text">
										<a href="<?= base_url('music/band/view/'.$timeline->id) ?>">>เพลง <?= $timeline->text ?></a>
									</div>
								</div>
							</div>
							 <?php elseif ($timeline->type == "Post"): ?>
							<div class="event">
								<div class="label">
									<i class="circular pencil icon"></i>
								</div>
								<div class="content">
									<div class="date">
										<?= $timeline->timestamp ?>
									</div>
									<div class="summary">
										<?= $timeline->bandname ?> ได้เขียนโพสต์ใหม่
									</div>
									<div class="extra text">
										<a href="<?= base_url('band/post/view/'.$timeline->id) ?>"> <?= $timeline->text ?> </a>
									</div>
								</div>
							</div>
							<?php elseif ($timeline->type == "Status"): ?>
							<div class="event">
								<div class="label">
									<i class="circular text file icon"></i>
								</div>
								<div class="content">
									<div class="date">
										<?= $timeline->timestamp ?>
									</div>
									<div class="summary">
										<?= $timeline->bandname ?> ได้อัพเดตสถานะใหม่
									</div>
									<div class="extra text">
										 <?= $timeline->text ?>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<?php $this->load->view('footer'); ?>
</body>
</html>