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
		border-radius: 0px;
	}
	a.list-group-item.active > .badge, .nav-pills > .active > a > .badge {
		color: #E72A30;
	}
	.center {
		background-color: #F7F6F6; 
		margin-top: 14px;
		margin-left: 4px;
		-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
		box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
		word-wrap: break-word;
		padding: 25px;
	}
	h2.ui.header {
		font-size: 2.5rem;
	}
	.ui.header .sub.header {
		font-size: 1.4rem;
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
					<div class="col-xs-7">
						<div class="center">
							<img src="../../images/audio_player.jpg" class="audio-player">
							<div id="timeline-btn" class="ui red button">
								<i class="heart icon"></i>
								Greedd
							</div>
							<div id="timeline-btn" class="ui red button">
								<i class="share icon"></i>
								Share
							</div>
							<div class="line"></div>
							<img src="../../images/audio_player.jpg" class="audio-player">
							<div id="timeline-btn" class="ui red button">
								<i class="heart icon"></i>
								Greedd
							</div>
							<div id="timeline-btn" class="ui red button">
								<i class="share icon"></i>
								Share
							</div>
							<div class="line"></div>
							<img src="../../images/audio_player.jpg" class="audio-player">
							<div id="timeline-btn" class="ui red button">
								<i class="heart icon"></i>
								Greedd
							</div>
							<div id="timeline-btn" class="ui red button">
								<i class="share icon"></i>
								Share
							</div>
							<div class="line"></div>
							<img src="../../images/audio_player.jpg" class="audio-player">
							<div id="timeline-btn" class="ui red button">
								<i class="heart icon"></i>
								Greedd
							</div>
							<div id="timeline-btn" class="ui red button">
								<i class="share icon"></i>
								Share
							</div>
							<div class="line"></div>
							<img src="../../images/audio_player.jpg" class="audio-player">
							<div id="timeline-btn" class="ui red button">
								<i class="heart icon"></i>
								Greedd
							</div>
							<div id="timeline-btn" class="ui red button">
								<i class="share icon"></i>
								Share
							</div>
							<div class="line"></div>
						</div>
					</div>
					<div class="col-xs-2">
						<div class="advt"></div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<?php $this->load->view('footer'); ?>
</body>
</html>