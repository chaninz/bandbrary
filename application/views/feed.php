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
		width: 508px;
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
				<div class="col1">
					<div class="feed-user box">
						<div class="feed-name">
							<a class="ui header">Chetniphat Varasai</a>
							<div class="sub header">2 days ago</div>
						</div>
						<div class="user-avatar box">
							<img src="images/no_profile.jpg">
						</div>
					</div>
				</div>
				<!--end username-->
			</div>

			<div id="feed-center" class="col-xs-7">
				<!--start feedbox-->
				<div class="col2">
					<div class="feed-box box">
						<img src="images/audio_player.jpg" alt="" class="audio-player">
						<div>
							<div class="ui red tiny icon button">
								<i class="heart icon greedd popup" title="กรี๊ด" data-variation="inverted"></i>
							</div>
							<div class="ui tiny icon button">
								<i class="retweet icon rebox popup" title="รีกล่อง" data-variation="inverted"></i>
							</div>
							<div class="ui black tiny icon button">
								<i class="share icon share popup" title="แบ่งปัน" data-variation="inverted"></i>
							</div>
						</div>
						<div class="line"></div>
						<div class="ui comments">
							<div class="comment">
								<a class="avatar">
									<img src="<?= base_url('images/tle.jpg') ?>">
								</a>
								<div class="content">
									<a class="author">Chetniphat Varasai</a>
									<div class="metadata">
										<div class="date">2 days ago</div>
									</div>
									<div class="text">
										...ทั้งหมดนั้น...ที่ไม่เคยบอก...เพราะสิ่งนั้น...ยังไม่ชัดเจน...
									</div>
								</div>
							</div>
						</div>
						<div class="ui comments">
							<div class="comment">
								<a class="avatar">
									<img src="<?= base_url('images/nin.jpg') ?>">
								</a>
								<div class="content">
									<a class="author">Chanin N.</a>
									<div class="metadata">
										<div class="date">3 days ago</div>
									</div>
									<div class="text">
										เห่ย! เพราะโครต
									</div>
								</div>
							</div>
						</div>
						<div class="ui comments">
							<div class="comment">
								<a class="avatar">
									<img src="<?= base_url('images/pun.jpg') ?>">
								</a>
								<div class="content">
									<a class="author">Punpun Sa</a>
									<div class="metadata">
										<div class="date">4 days ago</div>
									</div>
									<div class="text">
										กรี๊ด ชอบมากกกกกกกกก 
									</div>
								</div>
							</div>
						</div>
						<div>
							<div class="ui tiny icon button" style="margin-left: 185px">
								ดูความคิดเห็นทั้งหมด
							</div>
						</div>
						<div class="line"></div>
						<div class="ui form">
							<div class="field">
								<input placeholder="Write a Comment..." type="text" style="width: 455px; border-radius: 0px;">
								<div class="ui tiny icon button" style="margin: 0px; padding: 0.99em; margin-bottom: 2px;">
									ส่ง
								</div>
							</div>
						</div>
					</div>
				</div>
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