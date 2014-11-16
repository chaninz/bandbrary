<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $user_profile->name . " " . $user_profile->surname ?> - ไทม์ไลน์ | Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
	.ui.piled.segment:after, .ui.piled.segment:before {
		background-color: #F7F6F6;
	}
	i.circular.icon {
		box-shadow: 0em 0em 0em 0.1em #000000 inset;
	}
	</style>

</head>
<body>
	<?php $this->load->view('navigation'); ?>
	<?php $this->load->view('user/cover'); ?>
	<section>
		<article>
			<div class="container">
				<div class="row">
					<?php $this->load->view('user/sidebar_left'); ?>
					<div class="col-xs-9">
						<div class="ui piled feed segment" style="margin-top: 20px; width: 699px;">
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
									 	<b><?= $timeline->username ?> <?= $timeline->surname ?></b> ได้เพิ่มเพลงใหม่
									</div>
									<div class="extra text">
										<a href="<?= base_url('music/user/view/'.$timeline->id) ?>">เพลง <?= $timeline->text ?></a>
									</div>
								</div>
							</div>
							<!-- <div class="event">
								<div class="label">
									<i class="circular pencil icon"></i>
								</div>
								<div class="content">
									<div class="date">
										3 days ago
									</div>
									<div class="summary">
										Chanin Nualprasong ได้เขียนโพสต์ใหม่
									</div>
									<div class="extra text">
										<a> เนื้อเพลง รักเธอทั้งหมดของหัวใจ </a>
									</div>
								</div>
							</div> -->
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
										<b><?= $timeline->username ?> <?= $timeline->surname ?> </b>ได้อัพเดตสถานะใหม่
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