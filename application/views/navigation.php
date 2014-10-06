<header>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="navbar-item1">	
					<i class="home icon" style="font-size: 1.8rem"></i>
					<div class="ui basic buttons">
						<div class="ui button">Discover</div>
						<a class="ui button" href="<?= base_url().'job' ?>">Jobs</a>
					</div>
				</div>
				<div class="navbar-item2">
					<div class="ui icon input">
						<input type="text" placeholder="Search...">
						<i class="search icon" style="font-size: 0.8rem"></i>
					</div>
				</div>	
				<div class="bb-logo">
					<img src="<?= base_url('images/bandbrary_logo_16-9.png') ?>">
				</div>
<!-- 				<div class="bb-player">
					<img src="<?= base_url('images/header_player.png') ?>">
				</div> -->
				<div class="navbar-item3">
					<div class="ui compact menu">
						<div class="ui pointing dropdown link item"><?php if($this->session->userdata('photo_url')): ?>
							<img src="<?= base_url('uploads/profile/'.$this->session->userdata('photo_url')) ?>" alt="" class="profile-pic1"/><?php else: ?>
							<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" class="profile-pic1"/><?php endif; ?>
							<div class="user-name">
								<?= $this->session->userdata('name'); ?>
							</div>
							<i class="dropdown icon" style="font-size: 1em;"></i>
							<div class="menu">
								<a class="item" href="<?= base_url('user/'.$this->session->userdata('username').'/timeline') ?>"></i>Timeline</a>
								<a class="item" href="<?= base_url('user/'.$this->session->userdata('username').'/music') ?>"></i>Music</a>
								<a class="item" href="<?= base_url('user/'.$this->session->userdata('username').'/follower') ?>"></i>Follower</a>
								<a class="item" href="<?= base_url('user/'.$this->session->userdata('username').'/following') ?>"></i>Following</a>
								<a class="item" href="<?= base_url('user/'.$this->session->userdata('username').'/event') ?>"></i>Event</a>
							</div>
						</div>
					</div>
				</div>
				<div class="navbar-item4">
					<i class="bell icon" style="margin-left: 7px;"></i>
					<i class="mail icon"></i>
					<div class="ui pointing dropdown icon">
						<i class="settings icon"></i>
						<div class="menu" id="setting-dd">
							<div class="item"><a href="<?= base_url('user/'.$this->session->userdata('username')) ?>">Go to Profile</a></div>
							<div class="line"></div>
							<div class="item"><a href="<?= base_url().'account/edit' ?>">Setting</div>
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