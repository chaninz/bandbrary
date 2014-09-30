<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

	<?php $this->load->view('header'); ?>

	<style>
	.col-xs-3 {
		height: 1280px;
		background-color: #FFFFFF;
		padding-top: 100px;
	}
	.col-xs-9 {
		height: 1280px;
		background-color: #FFFFFF;
		padding-top: 100px;
	}
	.ui.menu .item {
		font-size: 1.8rem;
	}
	.ui.vertical.menu .item > .menu > .item {
		padding: 1rem 1.5rem;
		font-size: 0.9em;
	}
	.audio-player {
		width: 840px;
		margin-top: 30px;
		margin-bottom: 20px;
	}
	.ui.header {
		font-size: 1.7em;
	}
	.ui.items .item > .image > img {
		width: 302px;
		height: 302px;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-3">
				<div class="ui fluid vertical menu">
					<a class="item" href="<?= base_url().'discover/disPopArtist' ?> ">
						Popular Artist
					</a>
					<a class="item" href="<?= base_url().'discover/disTopMusic' ?> ">
						20 Top Music Chart
					</a>
					<div class="item">
						<div class="menu">
							<a class="item" href="<?= base_url().'discover/disBlues' ?> ">Blue</a>
							<a class="item">Country</a>
							<a class="item">Hiphop</a>
							<a class="item">Jazz</a>
							<a class="item">Pop</a>
							<a class="item">Reggae</a>
							<a class="item">R&B</a>
							<a class="item">Rock</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-9">
				<div class="ui header">Popular Artist on Bandbrary</div>
				<div class="ui items">
					<div class="item">
						<div class="image">
							<img src="<?= base_url('images/bodyslam2.jpg') ?>">
							<a class="like ui corner label">
								<i class="like icon"></i>
							</a>
						</div>
						<div class="content">
							<div class="name">Bodyslam</div>
						</div>
					</div>
					<div class="item">
						<div class="image">
							<img src="<?= base_url('images/potato.jpg') ?>">
							<a class="like ui corner label">
								<i class="like icon"></i>
							</a>
						</div>
						<div class="content">
							<div class="name">Potato</div>
						</div>
					</div>
					<div class="item">
						<div class="image">
							<img src="<?= base_url('images/paradox.jpg') ?>">
							<a class="like ui corner label">
								<i class="like icon"></i>
							</a>
						</div>
						<div class="content">
							<div class="name">Paradox</div>
						</div>
					</div>
					<div class="item">
						<div class="image">
							<img src="<?= base_url('images/stamp.jpg') ?>">
							<a class="like ui corner label">
								<i class="like icon"></i>
							</a>
						</div>
						<div class="content">
							<div class="name">Stamp Apiwat</div>
						</div>
					</div>
					<div class="item">
						<div class="image">
							<img src="<?= base_url('images/joey.jpg') ?>">
							<a class="like ui corner label">
								<i class="like icon"></i>
							</a>
						</div>
						<div class="content">
							<div class="name">Joey Boy</div>
						</div>
					</div>
					<div class="item">
						<div class="image">
							<img src="<?= base_url('images/kim.jpg') ?>">
							<a class="like ui corner label">
								<i class="like icon"></i>
							</a>
						</div>
						<div class="content">
							<div class="name">Jennifer Kim</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('footer'); ?>
	<script></script>
</body>
</html>