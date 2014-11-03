<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
	body {
		background: #F7F6F6;
	}
	.album-group { 
		max-width: 980px; 
		margin-left: 30px;
	}
	.discover-item1 {
		width: 160px;
		height: 305px;
		float: left;
		margin-left: 30px;
		margin-bottom: 30px;
		background-color: #FFFFFF;
	}
	.discover-cover1 {
		width: 160px;
		height: 240px!important;
	}
	.discover-item2 {
		width: 136px;
		height: 201px;
		float: left;
		margin-left: 30px;
		margin-bottom: 30px;
		background-color: #FFFFFF;
	}
	.discover-cover2 {
		width: 136px;
		height: 136px;
	}
	.discover-cover3 {
		width: 200px;
		height: 90px!important;
		border-radius: 10px;
	}
	.discover-content {
		padding: 10px;
	}
	.ui.avatar.image {
		width: 40px;
		height: 40px;
	}
	.top-song {
		float: left;
	}
	.ui.avatar.image {
width: 50px;
height: 50px;
}
	</style>
</head>
<body>
	<?php $this->load->view('navigation'); ?>

	<div class="container" style="padding-top: 140px;">
		<h3 class="ui header" style="margin-left: 30px;">แนะนำเพลง</h3>
		<div class="row">
			<div class="col-xs-12"> 
				<!--แนะนำเพลง-->
				<div class="discover-item1">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t1.jpg') ?>" alt="" class="discover-cover1">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item1">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t2.jpg') ?>" alt="" class="discover-cover1">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item1">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t3.jpg') ?>" alt="" class="discover-cover1">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item1">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t4.jpg') ?>" alt="" class="discover-cover1">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item1">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t5.jpg') ?>" alt="" class="discover-cover1">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item1">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t6.jpg') ?>" alt="" class="discover-cover1">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item1">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t7.jpg') ?>" alt="" class="discover-cover1">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item1">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t8.jpg') ?>" alt="" class="discover-cover1">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item1">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t9.jpg') ?>" alt="" class="discover-cover1">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item1">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t10.jpg') ?>" alt="" class="discover-cover1">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<!--จบ แนะนำเพลง-->
			</div>
		</div>

		<h3 class="ui header" style="margin-left: 30px;">เพลงใหม่</h3>
		<div class="row">
			<div class="col-xs-12">
				<div class="album-group">
					<!--เพลงใหม่-->
					<div class="ui image dimmable" style="margin-left: 30px; margin-bottom: 20px; border-radius: 10px;">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t11.jpg') ?>" alt="" class="discover-cover3">
					</div>
					<div class="ui image dimmable" style="margin-left: 30px; margin-bottom: 20px; border-radius: 10px;">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t12.jpg') ?>" alt="" class="discover-cover3">
					</div>
					<div class="ui image dimmable" style="margin-left: 30px; margin-bottom: 20px; border-radius: 10px;">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t13.jpg') ?>" alt="" class="discover-cover3">
					</div>
					<div class="ui image dimmable" style="margin-left: 30px; margin-bottom: 20px; border-radius: 10px;">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t14.jpg') ?>" alt="" class="discover-cover3">
					</div>
					<div class="ui image dimmable" style="margin-left: 30px; margin-bottom: 20px; border-radius: 10px;">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t15.jpg') ?>" alt="" class="discover-cover3">
					</div>
					<div class="ui image dimmable" style="margin-left: 30px; margin-bottom: 20px; border-radius: 10px;">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t16.jpg') ?>" alt="" class="discover-cover3">
					</div>
					<div class="ui image dimmable" style="margin-left: 30px; margin-bottom: 20px; border-radius: 10px;">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t17.jpg') ?>" alt="" class="discover-cover3">
					</div>
					<div class="ui image dimmable" style="margin-left: 30px; margin-bottom: 20px; border-radius: 10px;">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t18.jpg') ?>" alt="" class="discover-cover3">
					</div>
					<div class="ui image dimmable" style="margin-left: 30px; margin-bottom: 20px; border-radius: 10px;">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t19.jpg') ?>" alt="" class="discover-cover3">
					</div>
					<div class="ui image dimmable" style="margin-left: 30px; margin-bottom: 20px; border-radius: 10px;">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/t20.png') ?>" alt="" class="discover-cover3">
					</div>
					<!--จบ เพลงใหม่-->
				</div>
			</div>
		</div>

		<h3 class="ui header" style="float: left; margin-left: 30px;">ศิลปินที่มีคนติดตามมากที่สุด</h3>
		<h3 class="ui header" style="margin-left: 573px;">เพลงยอดนิยม</h3>
		<div class="row">
			<div class="col-xs-7">
				<!--ศฺลปินที่มีคนติดตามมากที่สุด-->
				<div class="discover-item2">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/bodyslam2.jpg') ?>" alt="" class="discover-cover2">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item2">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/potato.jpg') ?>" alt="" class="discover-cover2">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item2">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/paradox.jpg') ?>" alt="" class="discover-cover2">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item2">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/stamp.jpg') ?>" alt="" class="discover-cover2">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item2">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/joey.jpg') ?>" alt="" class="discover-cover2">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<div class="discover-item2">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/kim.jpg') ?>" alt="" class="discover-cover2">
					</div>
					<div class="discover-content">
						<b>ชื่อเพลง</b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
				<!--จบ ศิลปินที่มีคนติดตามมากที่สุด-->
			</div>

			<div class="col-xs-5">
				<div class="ui segment" style="padding: 0px">
					<div class="ui divided selection list">
						<!--เพลงยอดนิยม-->
						<div class="item" style="padding: 15px">
							<img class="ui avatar image" src="<?= base_url('images/t1.jpg') ?>">
							<div class="content" style="float: left; width: 250px; margin-top: 10px;">
								<div class="header">ชื่อเพลง</div>
								ชื่อศิลปิน
							</div>
							<div class="top-song" style="margin-left: 17px; margin-top: 5px;">
								<h2 class="ui header" style="font-weight: 100; color: #939aa0">1</h2>
							</div>
						</div>
						<div class="item" style="padding: 15px">
							<img class="ui avatar image" src="<?= base_url('images/t2.jpg') ?>">
							<div class="content" style="float: left; width: 250px; margin-top: 10px;">
								<div class="header">ชื่อเพลง</div>
								ชื่อศิลปิน 
							</div>
							<div class="top-song" style="margin-left: 17px; margin-top: 5px;">
								<h2 class="ui header" style="font-weight: 100; color: #939aa0">2</h2>
							</div>
						</div>
						<div class="item" style="padding: 15px">
							<img class="ui avatar image" src="<?= base_url('images/t3.jpg') ?>">
							<div class="content" style="float: left; width: 250px; margin-top: 10px;">
								<div class="header">ชื่อเพลง</div>
								ชื่อศิลปิน 
							</div>
							<div class="top-song" style="margin-left: 17px; margin-top: 5px;">
								<h2 class="ui header" style="font-weight: 100; color: #939aa0">3</h2>
							</div>
						</div>
						<div class="item" style="padding: 15px">
							<img class="ui avatar image" src="<?= base_url('images/t4.jpg') ?>">
							<div class="content" style="float: left; width: 250px; margin-top: 10px;">
								<div class="header">ชื่อเพลง</div>
								ชื่อศิลปิน 
							</div>
							<div class="top-song" style="margin-left: 17px; margin-top: 5px;">
								<h2 class="ui header" style="font-weight: 100; color: #939aa0">4</h2>
							</div>
						</div>
						<div class="item" style="padding: 15px">
							<img class="ui avatar image" src="<?= base_url('images/t5.jpg') ?>">
							<div class="content" style="float: left; width: 250px; margin-top: 10px;">
								<div class="header">ชื่อเพลง</div>
								ชื่อศิลปิน 
							</div>
							<div class="top-song" style="margin-left: 17px; margin-top: 10px;">
								<h2 class="ui header" style="font-weight: 100; color: #939aa0">5</h2>
							</div>
						</div>
						<!--จบ เพลงยอดนิยม-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	$('.ui.dimmable .dimmer')
	.dimmer({
		on: 'hover'
	})
	;
	</script>
	<?php $this->load->view('footer'); ?>
</body>
</html>