<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>


</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
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
						<i class="bell icon" style="margin-left: 7px;"></i>
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
				</div>
			</div>
		</div>
	</header>

	<?php $this->load->view('footer'); ?>
</body>
</html>