<header>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="navbar-item1">	
					<i class="home icon" style="font-size: 1.8rem"></i>
					<div class="ui basic buttons">
						<div class="ui button">แนะนำ</div>
						<a class="ui button" href="<?= base_url().'job' ?>">งาน</a>
					</div>
				</div>
				<div class="navbar-item2">
					<div class="ui icon input">
						<input type="text">
						<i class="search icon" style="font-size: 0.8rem"></i>
					</div>
				</div>	
				<div class="bb-logo">
					<img src="<?= base_url('images/bandbrary_logo_16-9.png') ?>">
				</div>
				<div class="bb-player">
					<img src="<?= base_url('images/header_player.png') ?>">
				</div>
				<div class="navbar-item3">
					<div class="ui compact menu">
						<div class="ui pointing dropdown link item"><?php if($this->session->userdata('photo_url')): ?>
							<img src="<?= base_url('uploads/profile/'.$this->session->userdata('photo_url')) ?>" alt="" class="profile-pic1"/><?php else: ?>
							<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" class="profile-pic1"/><?php endif; ?>
							<div class="user-name">
								<?= $this->session->userdata('name'); ?>
							</div>
							<i class="dropdown icon" style="font-size: 1em;"></i>
							<div class="menu" style="font-size: 1em;">
								<a class="item" href="<?= base_url('user/'.$this->session->userdata('username').'/timeline') ?>"></i>ไทม์ไลน์</a>
								<a class="item" href="<?= base_url('user/'.$this->session->userdata('username').'/music') ?>"></i>เพลง</a>
								<a class="item" href="<?= base_url('user/'.$this->session->userdata('username').'/follower') ?>"></i>ผู้ติดตาม</a>
								<a class="item" href="<?= base_url('user/'.$this->session->userdata('username').'/following') ?>"></i>กำลังติดตาม</a>
								<a class="item" href="<?= base_url('user/'.$this->session->userdata('username').'/event') ?>"></i>ตารางงาน</a>
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
							<div class="item"><a href="<?= base_url('user/'.$this->session->userdata('username')) ?>">เข้าสู่วงดนตรี</a></div>
							<div class="line"></div>
							<div class="item"><a href="<?= base_url().'account/edit' ?>">การตั้งค่า</div>
							<div class="item"><a href="<?= base_url().'account/signout' ?>">ออกจากระบบ</a></div>
							<div class="line"></div>
							<div class="item">ความช่วยเหลือ</div>
							<div class="item admin report">รายงานปัญหา</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<!--Report modal-->
<div class="ui report basic modal transition selection list">
	<div class="header">
		รายงานปัญหา
	</div>
	<div class="content">
			<div class="ui inverted segment" style="padding: 0px;">
				<div class="ui inverted relaxed divided list" style="padding: 0px;">
					<div class="item" style="padding: 0.9em;">
						<div class="content">
							<div class="header">ผู้ใช้</div>
							An excellent companion
						</div>
					</div>
					<div class="item" style="padding: 0.9em;">
						<div class="content">
							<div class="header">วงดนตรี</div>
							A poodle, its pretty basic
						</div>
					</div>
					<div class="item" style="padding: 0.9em;">
						<div class="content">
							<div class="header">เพลง</div>
							He's also a dog
						</div>
					</div>
					<div class="item" style="padding: 0.9em;">
						<div class="content">
							<div class="header">โพสต์</div>
							He's also a dog
						</div>
					</div>
				</div>
			</div>
	</div>
	<div class="actions" style="padding: 0px">
		<div class="two fluid ui buttons" style="margin-left: 420px; width: 30%;">
			<a class="ui red button">Red Button</a>
		</div>
	</div>
</div>