<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>แนะนำเพลง | Bandbrary</title>

	<?php $this->load->view('header'); ?>

	<style>
	body {
		 background: url('<?= base_url().'images/noise-black.png' ?>');
	}
	.album-group { 
		max-width: 980px; 
		margin-left: 15px;
		margin-right: 15px;
	}
	.ui.avatar.image {
		width: 40px;
		height: 40px;
	}
	.ui.avatar.image {
		width: 50px;
		height: 50px;
	}
	i.icon.left {
		margin: 7em 0em 0em -1em;
	}
	i.icon.right {
		margin: 7em 0em 0em 1em;
	}
	.job-red-line {
		width: 920px;
		margin: 0px;
		margin-left: 15px; 
		margin-right: 15px;
		margin-bottom: 20px;
	}
	.ui.block.header {
		background-color: #FFFFFF;
	}
	</style>
</head>
<body>
	<?php $this->load->view('navigation'); ?>

	<div class="discover-top">
		<div class="discover-header">
			แนะนำเพลง
		</div>
	</div>

	<div class="container" style="padding-top: 50px;">
		<div class="row">
			<div class="col-xs-12">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width: 920px; height: 500px; margin-left: 15px; margin-right: 15px;">
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
						<li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
						<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
						<li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
						<li data-target="#carousel-example-generic" data-slide-to="5" class=""></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item">
							<img src="<?= base_url('images/maroon5.jpg') ?>" alt="">
							<div class="carousel-caption">
								<h3>New Album</h3>
							</div>
						</div>
						<div class="item active">
							<img src="<?= base_url('images/linkinpark.jpg') ?>" alt="">
							<div class="carousel-caption">
								<h3>New Album</h3>
							</div>
						</div>
						<div class="item">
							<img src="<?= base_url('images/taylorswift.jpg') ?>" alt="">
							<div class="carousel-caption">
								<h3>New Album</h3>
							</div>
						</div>
						<div class="item">
							<img src="<?= base_url('images/taylorswift.jpg') ?>" alt="">
							<div class="carousel-caption">
								<h3>New Album</h3>
							</div>
						</div>
						<div class="item">
							<img src="<?= base_url('images/taylorswift.jpg') ?>" alt="">
							<div class="carousel-caption">
								<h3>New Album</h3>
							</div>
						</div>
						<div class="item">
							<img src="<?= base_url('images/taylorswift.jpg') ?>" alt="">
							<div class="carousel-caption">
								<h3>New Album</h3>
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span><i class="left arrow icon" style="font-size: 1.7em;"></i></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span><i class="right arrow icon" style="font-size: 1.7em;"></i></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-xs-12"> 
				<h3 class="ui block header" style="margin-left: 15px; margin-right: 15px; margin-top: 50px; margin-bottom: 0px;">แนะนำเพลง</h3>
				<div class="job-red-line"></div>
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

		<h3 class="ui block header" style="margin-left: 15px; margin-right: 15px; margin-bottom: 0px;">เพลงใหม่</h3>
		<div class="job-red-line"></div>
		<div class="row">
			<div class="col-xs-12">
				<div class="album-group">
					<!--เพลงใหม่-->
					<?php foreach($newmusics as $newmusic): ?>
					<div class="discover-item2">
						<div class="ui image dimmable">
							<div class="ui dimmer">
								<div class="content">
									<div class="center">
										<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
									</div>
								</div>
							</div>
							<img src="<?= base_url('images/t11.jpg') ?>" alt="" class="discover-cover2">
						</div>
						<div class="discover-content">
							<b>ชื่อเพลง</b>
							<p>ชื่อศิลปิน</p>
						</div>
					</div>
				<?php endforeach; ?>
					<!--จบ เพลงใหม่-->
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-7">
				<h3 class="ui block header" style="width: 479px; margin-left: 15px; margin-right: 15px; margin-top: 30px; margin-bottom: 0px;">ศิลปินที่มีคนติดตามมากที่สุด</h3>
				<div class="job-red-line" style="width: 479px;"></div>
				<!--ศฺลปินที่มีคนติดตามมากที่สุด-->
				<?php foreach($topfollowers as $topfollower): ?>
				<div class="discover-item3">
					<div class="ui image dimmable">
						<div class="ui dimmer">
							<div class="content">
								<div class="center">
									<a class="ui tiny button"><i class="play circle icon" style="margin: 0px; font-size: 2em"></i></a>
								</div>
							</div>
						</div>
						<img src="<?= base_url('images/bodyslam2.jpg') ?>" alt="" class="discover-cover3">
					</div>
					<div class="discover-content">
						<b><?= $topfollower->name ?></b>
						<p>ชื่อศิลปิน</p>
					</div>
				</div>
			<?php endforeach; ?>
				<!--จบ ศิลปินที่มีคนติดตามมากที่สุด-->
			</div>

			<div class="col-xs-5">
				<h3 class="ui block header" style="margin-top: 30px; margin-bottom: 0px;">เพลงยอดนิยม</h3>
				<div class="job-red-line" style="width: 378px; margin-left: 0px;"></div>
				<div class="ui segment" style="padding: 0px">
					<div class="ui divided selection list">
						<!--เพลงยอดนิยม-->
						<?php foreach($topmusics as $topmusic): ?>
						<div class="item" style="padding: 15px">
							<img class="ui avatar image" src="<?= base_url('images/t1.jpg') ?>">
							<div class="content" style="float: left; width: 250px; margin-top: 10px;">
								<div class="header"><?= $topmusic->musicname ?></div>
								<?= $topmusic->name ?>
							</div>
							<div class="top-song" style="margin-left: 17px; margin-top: 5px;">
								<h2 class="ui header" style="font-weight: 100; color: #939aa0">1</h2>
							</div>
						</div>
					<?php endforeach; ?>
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