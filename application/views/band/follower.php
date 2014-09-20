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
	.ui.form textarea, .ui.textarea {
		height: 11.4em;
		border-radius: 0px;
	}
	.ui.modal {
		height: 500px;
	}
	.ui.modal > .header {
		font-family: 'TH sarabunPSK';
		font-size: 32px;
	}
	.ui.modal > .content {
		font-family: 'TH sarabunPSK';
		font-size: 22px;
	}
	.ui.comments .comment .actions {
		text-align: left;
	}
	.ui.modal .actions {
		padding: 1rem 0em;
	}
	.ui.comments .reply.form textarea {
		height: 5em;
	}
	.ui.textarea, .ui.form textarea {
		min-height: 0em;
	}
	.ui.comments .comment .reply.form {
		margin:0em;
	}
	.ui.comments .reply.form {
		max-width: 96%;
	}
	.ui.accordion, .ui.accordion .accordion {
		font-size: 1em;
	}
	.center {
		margin-top: 15px;
	}
	</style>

</head>
<body>
	<?php $this->load->view('headerBar'); ?>
	<!-- <header>
		<div class="navbar-item1">	
			<i class="home icon" style="font-size: 2.7rem"></i>
			<div class="ui basic buttons">
				<div class="ui button">Explore</div>
				<div class="ui button">Jobs</div>
			</div>
		</div>
		<div class="navbar-item2">
			<div class="ui icon input">
				<input type="text" placeholder="Search...">
				<i class="search icon" style="font-size: 1.2rem"></i>
			</div>
		</div>
		<div class="bb-logo">
			<img src="../../images/bandbrary_logo_16-9.png">
		</div>
		<div class="navbar-item3">
			<div class="ui compact menu">
				<div class="ui pointing dropdown link item">
					<img src="" alt="" class="profile-pic1">
					<div class="user-name">
						Bandbrary
					</div>
					<i class="dropdown icon" style="font-size: 1.2rem;"></i>
					<div class="menu">
						<a class="item"></i>Music</a>
						<a class="item" href="post.html"></i>Post</a>
						<a class="item" href="follower.html"></i>Follower</a>
						<a class="item" href="following.html"></i>Following</a>
						<a class="item" href="event.html"></i>Event</a>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar-item4">
			<i class="bell icon"></i>
			<i class="mail icon"></i>
			<div class="ui pointing dropdown icon">
				<i class="settings icon"></i>
				<div class="menu" style="margin-top: 1.11em; border-top:0px;">
					<div class="item">Go to Band</div>
					<div class="line"></div>
					<div class="item">Create Band</div>
					<div class="item">Manage Band</div>
					<div class="line"></div>
					<div class="item">Create Job</div>
					<div class="item">Manage Job</div>
					<div class="line"></div>
					<div class="item">Setting</div>
					<div class="item">Sign out</div>
					<div class="line"></div>
					<div class="item">Help</div>
					<div class="item">Report a Problem</div>
				</div>
			</div>
		</div>
	</header> -->
 	<?php $this->load->view('coverSectionBand'); ?>
	<!-- <section>
		<article>
			<div class="top-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="profile-cover">
								<img src="" alt="">
							</div>
						</div>	
					</div>
				</div>
				<img src="" alt="" id="profile-pic2"class="img-thumbnail">
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
						<div class="col-md-12">
							<div class="menu-profile">
								<ul class="nav nav-tabs nav-justified" role="tablist">
									<li>
										<a href=""><span class="badge pull-right">0</span>Timeline</a>
									</li>
									<li>
										<a href=""><span class="badge pull-right">0</span>Music</a>
									</li>
									<li>
										<a href="post.html"><span class="badge pull-right">0</span>Post</a>
									</li>
									<li class="active">
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
		</section>
 --> 
		<section>
			<article>
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div id="status-button"class="ui icon button">
								<i class="pencil icon" style="font-size: 1.5rem"></i>
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
							</div>
						</div>
						<div class="col-md-7">
							<div class="center">
								<div class="ui five connected items">
									<?php 
									//foreach ($band_post as $post) { ?>
									<div class="item">
										<div class="image">
											<img src="/images/demo/highres4.jpg">
											<a class="star ui corner label">
												<i class="star icon"></i>
											</a>
										</div>
										<div class="content">
											<div class="name"></div>
											<p class="description">This dog has some things going for it. Its pretty cute and looks like it'd be fun to cuddle up with.</p>
										</div>
									</div>
									<div class="item">
										<div class="image">
											<img src="/images/demo/highres5.jpg">
											<a class="star ui corner label">
												<i class="star icon"></i>
											</a>
										</div>
										<div class="content">
											<div class="name">Faithful Dog</div>
											<p class="description">Sometimes its more important to have a dog you know you can trust. But not every dog is trustworthy, you can tell by looking at its smile.</p>
										</div>
									</div>
									<div class="item">
										<div class="image">
											<img src="/images/demo/highres3.jpg">
											<a class="star ui corner label">
												<i class="star icon"></i>
											</a>
										</div>
										<div class="content">
											<div class="name">Silly Dog</div>
											<p class="description">Silly dogs can be quite fun to have as companions. You never know what kind of ridiculous thing they will do.</p>
										</div>
									</div>
									<div class="item">
										<div class="image">
											<img src="/images/demo/highres2.jpg">
											<a class="star ui corner label">
												<i class="star icon"></i>
											</a>
										</div>
										<div class="content">
											<div class="name">Happy Dog</div>
											<p class="description">Happy dogs are pretty interesting if you are an unhappy person.</p>
										</div>
									</div>
									<div class="item">
										<div class="image">
											<img src="/images/demo/highres.jpg">
											<a class="star ui corner label">
												<i class="star icon"></i>
											</a>
										</div>
										<div class="content">
											<div class="name">Quiet Dog</div>
											<p class="description">A quiet dog is nice if you dont like a lot of upkeep for your dogs.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="advt"></div>
						</div>
					</div>
				</div>
			</article>
		</section>

  		<?php $this->load->view('footer'); ?>
		<script>
		$('.ui.accordion')
		.accordion()
		;
		</script>
	</body>
	</html>