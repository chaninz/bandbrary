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
		height: 470px;
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
					<img src="../../images/<?php echo $photo_url; ?>" alt="" class="profile-pic1">
					<div class="user-name">
						<?php echo $name; ?>;
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
		</section>
	-->
	<section>
		<article>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
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
					<div class="col-md-7">
						<div class="center">
							<?php if($this->session->userdata("band_id") == $band_id){ ?> 
							<div class="create-post test nin">
								<div id="create-post-button" class="ui icon button">
									<i class="add sign icon" style="font-size: 3.7rem; color: #D6D6D6;"></i>
								</div>
								<h4 style="color: #D6D6D6; margin-left: 40px; margin-top: 10px;">Create a post</h4>
							</div>
							<?php }?>
							<?php 
							foreach ($band_post as $post) {

								echo '
								<div class="view-post">
								<div class="post-date">
								<div class="post-day">'.'14'.'</div>
								<div class="post-month">'.'MAR'.'</div>
								<div class="post-white-line">'.'2014'.'</div>
								</div>
								<div class="post-heading">
								'.$post->topic.' 
								</div>
								<div class="post-body">
								'.$post->post.'
								</div>
								<div class="icon-comment">
								<i class="comment icon" style=" color: #E72A30; font-size: 1em; float:left; margin-top: 3px;"></i>
								<div class="amount-comment">'.$post->count.'</div>
								</div>
								</div>
								';
							} ?>
						</div>
					</div>
					<div class="col-md-2">
						<div class="advt"></div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<!--Modal semantic-->

	<!--Create post modal-->
	<div class="ui form segment create modal">
		<i class="close icon"></i>
		<form action="<?php echo base_url().'band/post/add'; ?>" method="post">
			<h3>Create a Post</h3>
			<div class="line"></div>
			<p/>
			<div class="field">
				<label>Title</label>
				<input type="text" placeholder="" name="topic" required>
			</div>
			<div class="line"></div>
			<p/>
			<div class="field">
				<label>Description</label>
				<textarea name="post"></textarea>
			</div>
			<div class="field">
				<label>Profile Photo</label>
				<input type="file" name="image_url">
			</div>
			<div class="line"></div>
			<p/>
			<div class="actions">
				<div class="ui button">cancel</div>
				<input type="submit" class="ui red submit button" value="Create Post">
			</div>
		</form>
	</div>

	<?php $this->load->view('footer'); ?>
	<script>
	$('.create.modal')
	.modal('attach events', '.test.nin', 'show');
	</script>
</body>
</html>