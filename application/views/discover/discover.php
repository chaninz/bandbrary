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
		border: 1px solid #000000;
	}
	.col-xs-9 {
		height: 300px;
		border: 1px solid #000000;
	}
	.ui.menu .item {
		font-size: 1.5rem;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-3">
				<div class="ui vertical menu">
					<div class="item">
						<div class="ui input"><input type="text" placeholder="Search..."></div>
					</div>
					<div class="item">
						<i class="home icon"></i> Home
						<div class="menu">
							<a class="active item">Search</a>
							<a class="item">Add</a>
							<a class="item">Remove</a>
						</div>
					</div>
					<a class="item">
						<i class="grid layout icon"></i> Browse
					</a>
					<a class="item">
						<i class="mail icon"></i> Messages
					</a>
					<div class="ui dropdown item">
						More <i class="dropdown icon"></i>
						<div class="menu">
							<a class="item"><i class="edit icon"></i> Edit Profile</a>
							<a class="item"><i class="globe icon"></i> Choose Language</a>
							<a class="item"><i class="settings icon"></i> Account Settings</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-9"></div>
		</div>
	</div>
	<?php $this->load->view('footer'); ?>
</body>
</html>