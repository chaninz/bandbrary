<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

	<?php $this->load->view('header'); ?>


	<style> 
	.ui.avatar.image {
		width: 5em;
		height: 5em;
	}
	</style>

	<body>
		<div class="container" style="margin-top: 120px">
			<div class="row">
				<div class="col-xs-3">
					<div class="ui fluid vertical pointing menu">
						<a class="active item">
							<i class="user icon"></i> ผู้ใช้
						</a>
						<a class="item">
							<i class="circle blank icon"></i> วงดนตรี
						</a>
						<a class="item">
							<i class="music icon"></i> เพลง
						</a>
						<a class="item">
							<i class="folder outline icon"></i> อัลบั้ม
						</a>
					</div>
				</div>
				<div class="col-xs-9">
					<div class="ui segment" style="padding: 0px">
						<h3 class="ui header" style="padding-top: 20px; margin-left: 20px;">
							<i class="search icon"></i>
							<div class="content">
								ผลการค้นหาสำหรับ <คำที่ค้นหา>
							</div>
						</h3>
						<div class="ui celled list">
							<div class="item" style="padding: 20px;">
								<img class="ui avatar image" style="border-radius: 0px;" src="">
								<div class="content">
									<h5 class="ui header">Chanin Nualprasong</h5>
									สมาชิกวง NinUP DUO
								</div>
							</div>
							<div class="item" style="padding: 20px;">
								<img class="ui avatar image" style="border-radius: 0px;" src="">
								<div class="content">
									<h5 class="ui header">Bodyslam</h5>
									Rock
								</div>
							</div>
							<div class="item" style="padding: 20px;">
								<img class="ui avatar image" style="border-radius: 0px;" src="">
								<div class="content">
									<h5 class="ui header">เพลง ขีดเส้นใต้</h5>
									ศิลปิน กบ ทรงสิทธิ์
								</div>
							</div>
							<div class="item" style="padding: 20px;">
								<img class="ui avatar image" style="border-radius: 0px;" src="">
								<div class="content">
									<h5 class="ui header">อัลบั้ม Believe</h5>
									ศิลปิน Bodyslam
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>