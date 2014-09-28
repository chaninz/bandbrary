<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

	<?php $this->load->view('header'); ?>

	<style>
	a.list-group-item.active > .badge, .nav-pills > .active > a > .badge {
		color: #E72A30;
	}
	.ui.segment {
		padding: 2em;
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
	<?php $this->load->view('coverSectionBand'); ?>

	<!-- <section>
		<article>
			<div class="top-bg">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="profile-cover">
								<img src="" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="../../../images/no_profile.jpg" alt="" id="profile-pic2" class="img-thumbnail">
			<div class="profile-name">
				<div id="pn1">Bandbrary</div>
				<div id="pn2">Rock/Blues/Jazz</div>
			</div>
			<div id="greedd"class="ui button">
				<i class="add icon"></i>Follow</div>
				<div id="joinBand" class="ui red buttons">
					<div class="ui button" 
					style="border-top-left-radius: 0em; 
					border-bottom-left-radius: 0em; ">
					<i class="circle blank icon"></i>JOIN</div>
					<div class="ui red floating dropdown icon button">
						<i class="dropdown icon" style="font-size: 1.1em;"></i>
						<div class="menu">
							<div class="item"><i class="hide icon"></i>Vocal</div>
							<div class="item"><i class="hide icon"></i>Guitar</div>
							<div class="item"><i class="hide icon"></i>Bass</div>
							<div class="item"><i class="hide icon"></i>Drum</div>
							<div class="item"><i class="hide icon"></i>Piano</div>
							<div class="item"><i class="hide icon"></i>Keybroad</div>
							<div class="item"><i class="hide icon"></i>Saxophone</div>
							<div class="item"><i class="hide icon"></i>Trumpets</div>
							<div class="item"><i class="hide icon"></i>Violin</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="menu-profile">
							<ul class="nav nav-tabs nav-justified" role="tablist">
								<li>
									<a href=""><span class="badge pull-right">0</span>Timeline</a>
								</li>
								<li>
									<a href=""><span class="badge pull-right">0</span>Music</a>
								</li>
								<li class="active">
									<a href="post.html"><span class="badge pull-right">0</span>Post</a>
								</li>
								<li>
									<a href="follower.html"><span class="badge pull-right">0</span>Follower</a>
								</li>
								<li>
									<a href="following.html"><span class="badge pull-right">0</span>Following</a>
								</li>
								<li>
									<a href="event.html"><span class="badge pull-right">0</span>Event</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section> -->

	<section>
		<article>
			<div class="container">
				<div class="row">
					<div class="col-xs-3">
						<div id="status-button"class="ui icon button">
							<i class="edit icon" style="font-size: 1.5rem"></i>
						</div>
						<div class="status">
							<div class="body">
								<div class="ui form">
									<div class="field">
										<textarea id="bg-status"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="about">
							<div class="title-box">ABOUT</div>
							<div class="ui list">
								<div class="list">
									<div class="item">
										<i class="book icon"></i>
										<div class="content">
											<a class="header">Biography</a>
											<div class="description"><?php echo $band->biography; ?></div>
										</div>
									</div>
									<div class="item">
										<i class="attention icon"></i>
										<div class="content">
											<a class="header">Genre</a>
											<div class="description">Im so glad you chose to bring me home from the shelter...</div>
										</div>
									</div>
									<div class="item">
										<i class="map marker icon"></i>
										<div class="content">
											<a class="header">Location</a>
											<div class="description">Man i am so tired that walk today really was too far...</div>
										</div>
									</div>

									<? if(strlen($band->fb_url)!=0  ){?>
									<div class="item">
										<i class="facebook sign icon"></i>
										<div class="content">
											<a class="header">Facebook</a>
											<div class="description"><?php echo $band->fb_url; ?> <br></div>
										</div>
									</div>
									<? } ?>
									<? if(strlen($band->tw_url)!=0  ){?>
									<div class="item">
										<i class="twitter icon"></i>
										<div class="content">
											<a class="header">Twitter</a>
											<div class="description"><?php echo $band->tw_url; ?> </div>
										</div>
									</div>
								    <? } ?>
								    <? if(strlen($band->yt_url)!=0  ){?>
									<div class="item">
										<i class="youtube play icon"></i>
										<div class="content">
											<a class="header">Youtube</a>
											<div class="description"><?php echo $band->yt_url; ?> </div>
										</div>
									</div>
									<? } ?>
								</div>
							</div>
						</div>
						<div class="member">
							<div class="title-box">MEMBER</div>
							<div class="ui list">
								<div class="list">
									<div class="item">
										<img id="member-pic" class="ui avatar image" src="/images/demo/avatar2.jpg">
										<div id="member-nam" class="content">
											<div class="header">Schnoodle</div>
											Vocal
										</div>
									</div>
									<div class="item">
										<img id="member-pic" class="ui avatar image" src="/images/demo/avatar2.jpg">
										<div id="member-nam" class="content">
											<div class="header">Schnoodle</div>
											Guitar
										</div>
									</div>
									<div class="item">
										<img id="member-pic" class="ui avatar image" src="/images/demo/avatar2.jpg">
										<div id="member-nam" class="content">
											<div class="header">Schnoodle</div>
											Bass
										</div>
									</div>
									<div class="item">
										<img id="member-pic" class="ui avatar image" src="/images/demo/avatar2.jpg">
										<div id="member-nam" class="content">
											<div class="header">Schnoodle</div>
											Drum
										</div>
									</div>
									<div class="item">
										<img id="member-pic" class="ui avatar image" src="/images/demo/avatar2.jpg">
										<div id="member-nam" class="content">
											<div class="header">Schnoodle</div>
											Keyboard
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="center">
							<div class="view-post">
								<a class="ui red button" href="<? echo base_url().'band/post/edit/'.$post->id ?>" style="margin-left: 530px">
									<i class="edit icon"></i>
									Edit
								</a>
								<h2 class="ui header">
									<?php echo $post->topic; ?> 
									<div class="sub header">14 March 2014</div>
								</h2>
								<h5><?php echo $post->post; ?> 
								</h5>
							</div>
						</div>
					</div>
					<div class="col-xs-2">
						<div class="advt"></div>
					</div>
				</div>
			</div>
		</article>
	</section>


	<div class="footmix">
		<div class="footleft"></div>
		<div class="footright"></div>
	</div>

	<footer></footer>

	<?php $this->load->view('footer'); ?>
	<script>
	</script>
</body>
</html>