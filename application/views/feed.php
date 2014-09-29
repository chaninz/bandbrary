<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
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
		font-size: 0.9em;
	}
	.sub.header {
		font-size: 0.9em;
	}
	a {
		color: #E72A30;
	}
	.audio-player {
		width: 589px;
		margin: 0px;
	}
	#feed-left {
		height: 1280px;
		background: #edeeef url('../images/noise-2.png');
	}
	#feed-center {
		height: 1280px;
		background: #e0e1e2 url('../images/noise-2.png');
		box-shadow: inset 1px 0 0 rgba(0,0,0,.05),inset -1px 0 0 rgba(0,0,0,.05);
		border: 1px solid rgba(0,0,0,.1);
		padding: 110px 30px 30px 30px;

	}
	#feed-right {
		height: 1280px;
		background: #edeeef url('../images/noise-2.png');
	}
	</style>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bb-logo" style="margin-left: 482px;">
						<img src="../images/bandbrary_logo_16-9.png">
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="row">
		<div id="feed-left" class="col-xs-3">
			<div class="feed-user">
				<div class="feed-name">
					<a class="ui header">Chetniphat Varasai</a>
					<div class="sub header">2 days ago</div>
				</div>
				<div class="user-avatar">
					<img src="../images/no_profile.jpg">
				</div>
			</div>
			<div class="feed-user" style="margin-top: 459px; margin-left: 190px;">
				<div class="feed-name">
					<a class="ui header">Punpun Sa</a>
					<div class="sub header">1 days ago</div>
				</div>
				<div class="user-avatar">
					<img src="../images/no_profile.jpg">
				</div>
			</div>
		</div>
		<div id="feed-center" class="col-xs-6">
			<div class="feed-box">
				<img src="../images/audio_player.jpg" alt="" class="audio-player">
				<div class="ui red button">
					<i class="heart icon"></i>
					Greedd
				</div>
				<div class="ui red button">
					<i class="share icon"></i>
					Share
				</div>
				<div class="line"></div>
				<div class="ui comments">
					<div class="comment">
						<a class="avatar">
							<img src="/images/demo/avatar.jpg">
						</a>
						<div class="content">
							<a class="author">Chetniphat Varasai</a>
							<div class="metadata">
								<div class="date">2 days ago</div>
								<div class="stars">
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon empty star"></i>
									<i class="icon empty star"></i>
								</div>
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
							<img src="/images/demo/avatar.jpg">
						</a>
						<div class="content">
							<a class="author">Chanin N.</a>
							<div class="metadata">
								<div class="date">3 days ago</div>
								<div class="stars">
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon empty star"></i>
									<i class="icon empty star"></i>
								</div>
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
							<img src="/images/demo/avatar.jpg">
						</a>
						<div class="content">
							<a class="author">Punpun Sa</a>
							<div class="metadata">
								<div class="date">4 days ago</div>
								<div class="stars">
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon empty star"></i>
									<i class="icon empty star"></i>
								</div>
							</div>
							<div class="text">
								กรี๊ด ชอบมากกกกกกกกก 
							</div>
						</div>
					</div>
				</div>
				<div class="line"></div>
				<div class="ui form">
					<div class="field">
						<input placeholder="Write a Comment..." type="text" style="border-radius: 0px;">
					</div>
				</div>
			</div>
			<div class="feed-box" style="width: 500px; margin-top: 48px; margin-left: 45px;">
				<img src="../images/headphones.jpg" style="width: 498px;" alt="" class="audio-player">
				<div class="ui red button">
					<i class="heart icon"></i>
					Greedd
				</div>
				<div class="ui red button">
					<i class="share icon"></i>
					Share
				</div>
				<div class="line"></div>
				<div class="ui comments">
					<div class="comment">
						<a class="avatar">
							<img src="/images/demo/avatar.jpg">
						</a>
						<div class="content">
							<a class="author">Punpun Sa</a>
							<div class="metadata">
								<div class="date">2 days ago</div>
								<div class="stars">
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon empty star"></i>
									<i class="icon empty star"></i>
								</div>
							</div>
							<div class="text">
								ขโมยหูฟังเพื่อนมา >3<
							</div>
						</div>
					</div>
				</div>
				<div class="ui comments">
					<div class="comment">
						<a class="avatar">
							<img src="/images/demo/avatar.jpg">
						</a>
						<div class="content">
							<a class="author">Chanin N.</a>
							<div class="metadata">
								<div class="date">3 days ago</div>
								<div class="stars">
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon empty star"></i>
									<i class="icon empty star"></i>
								</div>
							</div>
							<div class="text">
								ของใครละเนี่ย 555+
							</div>
						</div>
					</div>
				</div>
				<div class="ui comments">
					<div class="comment">
						<a class="avatar">
							<img src="/images/demo/avatar.jpg">
						</a>
						<div class="content">
							<a class="author">Chetniphat Varasai</a>
							<div class="metadata">
								<div class="date">4 days ago</div>
								<div class="stars">
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon star"></i>
									<i class="icon empty star"></i>
									<i class="icon empty star"></i>
								</div>
							</div>
							<div class="text">
								เอาของเราไปไม T_T
							</div>
						</div>
					</div>
				</div>
				<div class="line"></div>
				<div class="ui form">
					<div class="field">
						<input placeholder="Write a Comment..." type="text" style="border-radius: 0px;">
					</div>
				</div>
			</div>
		</div>
		<div id="feed-right" class="col-xs-3"></div>
	</div>

	<script src="../assets/js/bandbrary.js"></script>
	<script></script>
</body>
</html>