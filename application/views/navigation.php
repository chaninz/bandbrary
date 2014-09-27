<header>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="navbar-item1">	
					<i class="home icon" style="font-size: 2.7rem"></i>
					<div class="ui basic buttons">
						<div class="ui button">Explore</div>
						<div class="ui button"><a href="<?= base_url().'job' ?>">Jobs</a></div>
					</div>
				</div>
				<div class="navbar-item2">
					<div class="ui icon input">
						<input type="text" placeholder="Search...">
						<i class="search icon" style="font-size: 1.2rem"></i>
					</div>
				</div>	
				<div class="bb-logo">
					<img src="<?= base_url().'images/bandbrary_logo_16-9.png' ?>">
				</div>
				<div class="bb-player">
					<img src="<?= base_url().'images/header_player.png' ?>" alt="">
				</div>
				<div class="navbar-item3">
					<div class="ui compact menu">
						<div class="ui pointing dropdown link item"><?php if($this->session->userdata('photo_url')): ?>
							<img src="<?= base_url().'uploads/profile/'.$this->session->userdata('photo_url') ?>" alt="" class="profile-pic1"/><?php else: ?>
							<img src="<?= base_url().'images/no_profile.jpg' ?>" alt="" class="profile-pic1"/><?php endif; ?>
							<div class="user-name">
								<?= $this->session->userdata('name'); ?>
							</div>
							<i class="dropdown icon" style="font-size: 1.2rem;"></i>
							<div class="menu">
								<a class="item" href="<?= base_url().'user/'.$user_profile->username.'/music' ?>"></i>Music</a>
								<a class="item" href="<?= base_url().'user/'.$user_profile->username.'/post' ?>"></i>Post</a>
								<a class="item" href="<?= base_url().'user/'.$user_profile->username.'/follower' ?>"></i>Follower</a>
								<a class="item" href="<?= base_url().'user/'.$user_profile->username.'/following' ?>"></i>Following</a>
								<a class="item" href="<?= base_url().'user/'.$user_profile->username.'/event' ?>"></i>Event</a>
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
							<div class="item"><?= base_url().'account/signout' ?>Go to Profile</div>
							<div class="line"></div>
							<div class="item">Setting</div>
							<div class="item"><a href="<?= base_url().'account/signout' ?>">Sign out</a></div>
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