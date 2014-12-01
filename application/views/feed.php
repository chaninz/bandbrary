<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ฟีดเพลง | Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
	.ui.popup {
		max-width: 80px;
		text-align: center;
	}
	.ui.button {
		padding: 0.7em 0.8em;
		margin-top: 5px;
		margin-left: 5px;
		margin-bottom: 5px;
		border-radius: 0px;
	}
	.ui.form {
		margin: 5px;
	}
	.ui.form .field {
		clear: both;
		margin: 0em 0em 0.3em;
	}
	.ui.comments {
		margin-top: 5px;
	}
	.ui.comments .comment .avatar img {
		width: 3em;
		height: 3em;
		border-radius: 0px;
	}
	.ui.header {
		font-size: 0.96em;
	}
	.sub.header {
		font-size: 0.96em;
	}
	a {
		color: #E72A30;
	}
	.audio-player {
		width: 250px;
		height: 250px;
		margin: 0px;
	}
	body {
		background: #edeeef url('images/noise-2.png');
	}
	.col1 {
		height: 396px;
		margin-top: 110px;
	}
	.col2 {
		height: 396px;
		margin-top: 110px;
	}
	.col3 {
		margin-top: 110px;
	}
	footer{
		width: 0px;
		height: 0px;
		margin: 0px;
	}
	</style>
</head>
<body>

	<?php $this->load->view('navigation'); ?>
	
	<div class="container">
		<div class="row">

			<div id="feed-left" class="col-xs-3">
				<!--start username-->
				<?php foreach ($music as $e_music): ?>
					<div class="col1">
						<div class="feed-user box">
							<div class="feed-name">
								<a class="ui header"><?= $e_music->artist ?></a>
								<div class="sub header"><?= $e_music->timestamp ?></div>
							</div>
							<div class="user-avatar box">
								<?php if ($e_music->type == 1): ?>
									<img src="<?= $e_music->photo_url != NULL ? base_url('uploads/profile/user/' . $e_music->photo_url) : base_url('images/no_profile.jpg') ?>">
								<?php elseif ($e_music->type == 2): ?>
									<img src="<?= $e_music->photo_url != NULL ? base_url('uploads/profile/band/' . $e_music->photo_url) : base_url('images/no_profile.jpg') ?>">
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<!--end username-->
			</div>

			<div id="feed-center" class="col-xs-7">
				<!--start feedbox-->
				<?php if ( ! empty($music)): ?>
					<?php foreach ($music as $e_music): ?>
					<div class="col2">
						<div class="feed-box box" style="padding: 10px;">
								<?php if ($e_music->type == 1): ?>
									<a href="<?= base_url('music/user/view/' . $e_music->music_id) ?>"><img src="<?= $e_music->cover_image != NULL ? base_url('uploads/album/' . $e_music->cover_image) : base_url('images/no_album_cover.jpg') ?>" class="audio-player"></a>
								<?php elseif ($e_music->type == 2): ?>
									<a href="<?= base_url('music/band/view/' . $e_music->music_id) ?>"><img src="<?= $e_music->cover_image != NULL ? base_url('uploads/album/' . $e_music->cover_image) : base_url('images/no_album_cover.jpg') ?>" class="audio-player"></a>
								<?php endif; ?>
								<div class="line" style="margin-top: 10px; margin-bottom: 10px;"></div>
							<div>
								<?php if ($e_music->type == 1): ?>
									<p/>เพลง: <a href="<?= base_url('music/user/view/' . $e_music->music_id) ?>"><?= $e_music->name ?></a>
								<?php elseif ($e_music->type == 2): ?>
									<p/>เพลง: <a href="<?= base_url('music/band/view/' . $e_music->music_id) ?>"><?= $e_music->name ?></a>
								<?php endif; ?>
								<p/>ศิลปิน: <?= $e_music->artist ?>
								<p/>อัลบั้ม: <?= $e_music->album ?>
							</div>
							<div>
								<!-- <div class="ui red tiny icon button">
									<i class="heart icon greedd popup" title="กรี๊ด" data-variation="inverted"></i>
								</div> -->
							</div>
							<!-- <div class="line"></div>
							<div>
								<div class="ui tiny icon button" style="margin-left: 185px">
									ดูความคิดเห็นทั้งหมด
								</div>
							</div> -->
						</div>
					</div>
					<?php endforeach; ?>
				<?php else: ?>
					<div class="col2 text-center">
						<h4>ไม่มีข้อมูล</h4>
					</div>
				<?php endif; ?>
				<!--end feedbox-->
			</div>

			<div id="feed-right" class="col-xs-2">
				<!--start advt-->
					<div class="col3">
						<?php if ( ! empty($bands)): ?>
							<div>
								<h4>วงที่เหมาะกับคุณ</h4>
								<div class="advt box" style="display: table;">
									<?php foreach ($bands as $band): ?>
										<a href="<?= base_url('band/' . $band->id) ?>"><h5 class="ui header" style="margin: 0px; margin-bottom: 5px;"><?= $band->name ?></h5></a>
										<a href="<?= base_url('band/' . $band->id) ?>">
										<?php if ($band->photo_url != NULL): ?>
											<img class="ui small image"  style="margin: 0px; margin-left: 11px; margin-bottom: 5px;" src="<?= base_url('uploads/profile/band/' . $band->photo_url) ?>">
										<?php else: ?>
											<img class="ui small image"  style="margin: 0px; margin-left: 11px; margin-bottom: 5px;" src="<?= base_url('images/no_profile.jpg') ?>">
										<?php endif; ?>
										</a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
						
						<?php if ( ! empty($user_jobs)): ?>
							<div style="margin-top: 30px;">
								<h4>งานแนะนำ</h4>
								<div class="advt box" style="display: table;">
									<?php $end = count($user_jobs) - 1; $count = 0; ?>
									<?php foreach ($user_jobs as $job): ?>
										<h5 class="ui header" style="margin: 0px; margin-bottom: 5px;"><a href="<?= base_url('job/view/' . $job->id) ?>"><?= $job->name ?></a></h5>
										<li><b>วันที่</b> <?= mdate("%d/%n/%Y", strtotime($job->date)) ?></li>
										<li><b>สถานที่</b> <?= $job->venue ?></li>
										<li><b>ค่าจ้าง</b> <?= $job->budget ?> บาท</li>
										<?php if ($count != $end): ?>
											<hr style="margin: 10px; 105px;"/>
										<?php endif; ?>
										<?php $count++; ?>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>

						<?php if ( ! empty($band_jobs)): ?>
							<div style="margin-top: 30px;">
								<h4>งานที่เหมาะกับวง</h4>
								<div class="advt box" style="display: table;">
									<?php $end = count($band_jobs) - 1; $count = 0; ?>
									<?php foreach ($band_jobs as $job): ?>
										<h5 class="ui header" style="margin: 0px; margin-bottom: 5px;"><a href="<?= base_url('job/view/' . $job->id) ?>"><?= $job->name ?></a></h5>
										<li><b>วันที่</b> <?= mdate("%d/%n/%Y", strtotime($job->date)) ?></li>
										<li><b>สถานที่</b> <?= $job->venue ?></li>
										<li><b>ค่าจ้าง</b> <?= $job->budget ?> บาท</li>
										<?php if ($count != $end): ?>
											<hr style="margin: 10px; 105px;"/>
										<?php endif; ?>
										<?php $count++; ?>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				<!--end advt-->
			</div>
		</div>

	</div>
</div>

<?php $this->load->view('footer'); ?>

</body>
</html>