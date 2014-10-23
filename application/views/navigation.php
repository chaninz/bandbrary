<header>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div id="bb-feed" class="ui secondary menu">
					<a class="item" style="padding: 0px;">
						<i class="home icon" style="color: #FFFFFF; font-size: 1.7em; opacity: 0.9;"></i>
					</a>
				</div>
				<div id="navbar-item1" class="ui inverted menu">
					<a class="item" style="color: #FFFFFF; font-size: 0.9rem; padding: 0.95em 0.95em; width: 63px; text-align: center;">
						แนะนำ
					</a>
					<a class="item" style="color: #FFFFFF; font-size: 0.9rem; padding: 0.95em 0.95em; width: 63px; text-align: center;" href="<?= base_url().'job' ?>">
						งาน
					</a>
				</div>
				<div id="navbar-item2">
					<div id="bb-search" class="ui icon input">
						<input type="text" placeholder="" style="border-radius: 1px; padding: 0.3em 0.5em;">
						<i class="search link icon" style="font-size: 0.85em; padding-top: 0.6em; border-left: 1px solid rgba(0, 0, 0, 0.1);"></i>
					</div>
				</div>	
				<div class="bb-logo">
					<img src="<?= base_url('images/bandbrary_logo_16-9.png') ?>">
				</div>
					<!-- <div class="ui inverted menu">
						<div class="ui item"><?php if($this->session->userdata('photo_url')): ?>
							<img src="<?= base_url('uploads/images/profile/'.$this->session->userdata('photo_url')) ?>" alt="" class="profile-pic1"/><?php else: ?>
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
					</div> -->
					<div id="navbar-item3" class="ui inverted menu">
						<a class="item" style="color: #FFFFFF; font-size: 0.9rem; padding: 0.45em 0.95em;" href="<?= base_url('user/'.$this->session->userdata('username').'/timeline') ?>">
							<?php if($this->session->userdata('photo_url')): ?>
							<img src="<?= base_url('uploads/images/profile/'.$this->session->userdata('photo_url')) ?>" alt="" class="profile-pic1"/><?php else: ?>
							<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" class="profile-pic1"/><?php endif; ?>
							<div class="navbar-username">
								<?= $this->session->userdata('name'); ?>
							</div>
						</a>
					</div>

				<!-- <div id="navbar-item4">
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
				</div> -->
				<div id="navbar-item4" class="ui secondary  menu">
					<a class="item" style="padding: 0px;">
						<i class="bell icon" style="color: #FFFFFF; font-size: 1.4em; opacity: 0.9;"></i> 
					</a>
					<a class="item" style="padding: 0px;">
						<i class="mail icon" style="color: #FFFFFF; font-size: 1.4em; opacity: 0.9;"></i> 
					</a>
					<a class="item test add" style="padding: 0px;">
						<i class="add sign icon" style="color: #FFFFFF; font-size: 1.4em; opacity: 0.9;"></i> 
					</a>
				</div>
				<div id="navbar-item5" class="ui top pointing dropdown icon">
					<i id="navbar-reorder" class="reorder icon"></i>
					<div class="menu" style="margin-left: -37px;">
						<div class="item"><a href="<?= base_url('user/'.$this->session->userdata('username')) ?>">เข้าสู่วงดนตรี</a></div>
						<div class="line"></div>
						<div class="item"><a href="<?= base_url().'account/edit' ?>">การตั้งค่า</div>
						<div class="item"><a href="<?= base_url().'account/signout' ?>">ออกจากระบบ</a></div>
						<div class="line"></div>
						<div class="item">ความช่วยเหลือ</div>
						<div class="item">รายงานปัญหา</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<!--Report modal-->
<div class="ui add basic modal transition selection list">
	<div class="header">
		การสร้าง
	</div>
	<div class="content">
		<div class="ui inverted segment" style="padding: 0px;">
			<div class="ui inverted relaxed divided list" style="padding: 0px;">
				<div class="item" style="padding: 0.9em;">
					<div class="content">
						<div class="header">สร้างงาน</div>
						An excellent companion
					</div>
				</div>
				<div class="item" style="padding: 0.9em;">
					<div class="content">
						<div class="header">สร้างอัลบั้มเพลง</div>
						A poodle, its pretty basic
					</div>
				</div>
				<div class="item" style="padding: 0.9em;">
					<div class="content">
						<div class="header">สร้างวงดนตรี</div>
						He's also a dog
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="actions" style="padding: 0px">
		<div class="two fluid ui buttons" style="margin-left: 420px; width: 30%;">
			<a class="ui red button">ยกเลิก</a>
		</div>
	</div>
</div>
