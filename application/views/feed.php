<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
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
		width: 150px;
		height: 150px;
		margin: 0px;
	}
	body {
		background: #edeeef url('images/noise-2.png');
	}
	.col1 {
		height: 346px;
		margin-top: 110px;
	}
	.col2 {
		height: 346px;
		margin-top: 110px;
	}
	.col3 {
		height: 346px;
		margin-top: 110px;
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
				<?php foreach ($music as $e_music): ?>
				<div class="col2">
					<div class="feed-box box">
							<?php if ($e_music->type == 1): ?>
								<a href="<?= base_url('music/user/view/' . $e_music->music_id) ?>"><img src="<?= $e_music->cover_image != NULL ? base_url('uploads/album/' . $e_music->cover_image) : base_url('images/no_album_cover.jpg') ?>" class="audio-player"></a>
							<?php elseif ($e_music->type == 2): ?>
								<a href="<?= base_url('music/band/view/' . $e_music->music_id) ?>"><img src="<?= $e_music->cover_image != NULL ? base_url('uploads/album/' . $e_music->cover_image) : base_url('images/no_album_cover.jpg') ?>" class="audio-player"></a>
							<?php endif; ?>
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
						<div class="line"></div>
					</div>
				</div>
				<?php endforeach; ?>
				<!--end feedbox-->
			</div>

			<div id="feed-right" class="col-xs-2">
				<!--start advt-->
				<div class="col3">
					<div class="advt box">
						<h5 class="ui header" style="margin: 0px; margin-bottom: 5px;">นักร้องหญิงดิ้นได้</h5>
						<img class="ui small image"  style="margin: 0px; margin-left: 11px; margin-bottom: 5px;" src="/images/demo/photo2.jpg">
						<p>ต้องการนักร้องเพศหญิง มีความสามารถเต้นและร้องได้ โดยเฉพาะเพลงลูกทุ่ง จังหวะแดนซ์ ยิ่งเต้น... <a href="">Read more</a></p>
					</div>
				</div>
			</div>
			<!--end advt-->
		</div>

	</div>
</div>

<?php $this->load->view('footer'); ?>

</body>
</html>