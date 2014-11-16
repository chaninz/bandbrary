<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $music->name ?> - <?= $band_profile->name ?> | Bandbrary</title>
	<?php $this->load->view('header'); ?>
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/jplayer.blue.monday.css') ?>">
	<script src="<?= base_url('assets/js/jplayer/jquery.jplayer.min.js') ?>"></script>
	<script>
		//<![CDATA[
		$(document).ready(function(){

			$("#jquery_jplayer_1").jPlayer({
				ready: function (event) {
					$(this).jPlayer("setMedia", {
						title: "<?= $music->name ?>",
						mp3: "<?= base_url('uploads/music/'.$music->music_url) ?>"
					});
				},
				swfPath: "<?= base_url('assets/js/jplayer') ?>",
				supplied: "mp3",
				wmode: "window",
				useStateClassSkin: true,
				autoBlur: false,
				smoothPlayBar: true,
				keyEnabled: true,
				remainingDuration: true,
				toggleDuration: true
			});
		});
		//]]>
	</script>
	<style>
	.center {
		background-color: #FFFFFF;
		padding: 20px;
		-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
		box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
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
					<div class="col-md-9">
						<div class="center">
							<!-- Music Player -->
							<img style="float: left" width="111px" width="111px" src="<?= base_url('uploads/album/'.$music->image_url) ?>" />
							<div id="jquery_jplayer_1" class="jp-jplayer"></div>
							<div id="jp_container_1" class="jp-audio" style="margin-left: 111px;" role="application" aria-label="media player">
								<div class="jp-type-single">
									<div class="jp-gui jp-interface">
										<div class="jp-controls">
											<button class="jp-play" role="button" tabindex="0">เล่น</button>
											<button class="jp-stop" role="button" tabindex="0">หยุด</button>
										</div>
										<div class="jp-progress">
											<div class="jp-seek-bar">
												<div class="jp-play-bar"></div>
											</div>
										</div>
										<div class="jp-volume-controls">
											<button class="jp-mute" role="button" tabindex="0">ปิดเสียง</button>
											<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
											<div class="jp-volume-bar">
												<div class="jp-volume-bar-value"></div>
											</div>
										</div>
										<div class="jp-time-holder">
											<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
											<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
											<div class="jp-toggles">
												<button class="jp-repeat" role="button" tabindex="0">เล่นซ้ำ</button>
											</div>
										</div>
									</div>
									<div class="jp-details">
										<div class="jp-title" aria-label="title">&nbsp;</div>
									</div>
									<div class="jp-no-solution">
										<span>Update Required</span>
										To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
									</div>
								</div>
							</div>
							<!--END-Music Player -->

							<div class="ui vertical segment">
								<div>
								<p/>เพลง: <?= $music->name ?>
								<p/>ศิลปิน: <?= $band_profile->name ?>
								<p/>อัลบั้ม: <?= $music->album_name ?>
								</div>
								<br/>
								<?php if(empty($is_greedd_band_music)): ?>
									<a class="ui small icon button" id="greedd-band-music-button" data-value="<?= $music->id ?>">
	  									<i class="heart icon"></i> กรี๊ด
	  								</a>
								<?php else: ?>
									<a class="ui small icon active button" id="greedd-band-music-button" data-value="<?= $music->id ?>">
	  									<i class="heart icon"></i> เลิกกรี๊ด
	  								</a>
								<?php endif; ?>
								<?php if($band_profile->id == $this->session->userdata('band_id') && $this->session->userdata('is_master') == 1): ?>
									<a class="ui small icon button" href="<?= base_url('music/band/edit/' . $music->id) ?>">
	  									<i class="edit icon"></i>แก้ไข
									</a>
									<a class="ui small icon button" href="<?= base_url('music/band/delete/' . $music->id) ?>" onclick="return window.confirm('คุณต้องการลบเพลงนี้ ?')">
	  									<i class="trash icon"></i>ลบ
									</a>
								<?php endif; ?>	
								<div>
									มีคนกรี๊ดเพลงนี้ <span id="count-greedd"><?= $count_greedd_band_music ?></span> คน
								</div>
								<div>
									<a class="fb-share-button" data-href="<?= base_url(uri_string()) ?>" data-layout="button_count"></a>
									<a class="twitter-share-button" data-count="horizontal" href="<?= base_url(uri_string()) ?>"> Tweet</a>
								</div>
								<br/>
									<div class="ui piled segment">
								 <b>อัปโหลดเมื่อ <?= $music->upload_date ?></b>
								 <p>
								 	<h5>เนื้อเพลง</h5>
								 	<?= $music->lyric ?>
								 </p>
								</div>
								<br/>
								<h5 class="ui header">ความคิดเห็นทั้งหมด</h5>
							</div>
							<div class="ui comments" style="margin-top: 20px; margin-bottom: 25px;">
								<?php foreach($comments as $comment): ?>
									<div class="comment">
										<a class="avatar">
											<?php if($comment->photo_url): ?>
												<img src="<?= base_url().'uploads/profile/user/'.$comment->photo_url ?>">
											<?php else: ?>
												<img src="<?= base_url().'images/no_profile.jpg' ?>">
											<?php endif; ?>
										</a>
										<div class="content">
											<a class="author" href="<?= base_url('user/'.$comment->username) ?>"><b><?= $comment->name.' '.$comment->surname ?></b></a>
											<div class="metadata">
												<div class="date">
													<?= mdate("%d %M %Y", strtotime($comment->timestamp)) ?>
												</div>
											</div>
											<div class="text">
												<?= $comment->comment ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							<form class="ui reply form" id="comment-form" method="post" action="<?= base_url().'music/band/addComment/'.$music->id ?>">
								<div class="field">
									<textarea name="comment" style="margin-left: 50px;" id="comment-box"></textarea>
								</div>
								<input type="submit" class="ui small button submit" style="margin-left: 537px;" value="โพสต์" >
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>
<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '661475693972173',
			xfbml      : true,
			version    : 'v2.2'
		});
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
</script>

<?php $this->load->view('footer'); ?>

</body>
</html>