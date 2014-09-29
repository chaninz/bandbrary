<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>  

</head>
<style>
.col-xs-3 {
	float: left;
	height: 650px;
	background-color: #f7f7f7;
	border-left: 1px solid #C0C0C0;
	border-right: 1px solid #C0C0C0;
	-webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
	-moz-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
	box-shadow: 0 1px 0px rgba(0,0,0,0.05);
	background-color: #F7F6F6 ;
	padding-left: 0px;
	padding-right: 0px;
}
.col-xs-7 {
	padding-left: 10px;
	padding-right: 0px;
	border: 0px solid #FFFFFF;
}
.container {
	background-color: #FFFFFF;
	-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
	box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
}
.ui.vertical.menu {
	width: 29rem;
	border-radius: 0px;
}
.ui.vertical.menu > .active.item {
	box-shadow: 0em 0 0 inset;
}
.ui.vertical.pointing.menu > .active.item:after {
	border-top: 0px;
	border-right: 0px;
	border-left: 1px solid #C0C0C0;;
	margin-top: -.4em;
	left: 28.9rem;
}
.ui.pointing.menu > .active.item:after {
	background-color: #FFFFFF;
	width: .8em;
	height: .8em;
}
.ui.menu {
	background-color: #F7F6F6;
}
.ui.menu .item {
	font-size: 1.5rem;
	padding: 1em 1em;
}
.ui.menu:first-child {
	margin-top: 3rem;
}
.ui.form.segment{
	-webkit-box-shadow: none;
	box-shadow: none;
}
.line {
	width: 750px;
}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-3">
				<div class="ui vertical menu">
					<div class="header item">
						<i class="user icon"></i>
						ACCOUNT
					</div>
					<div class="menu">
						<a href="<?= base_url('account/edit') ?>" class="item">Genaral</a>
						<a href="<?= base_url('account/password') ?>" class="item">Password</a>
					</div>
					<div class="header item">
						<i class="circle blank icon"></i>
						BAND
					</div>
					<div class="menu">
						<a href="<?= base_url('band/edit') ?>" class="item">Information</a>
						<a href="<?= base_url('band/request') ?>" class="item">Join Request</a>
						<a href="<?= base_url('band/role') ?>" class="item">Roles</a>
					</div>
				</div>
			</div>
			<div class="col-xs-7">
				<div class="ui form segment"><p>
					<h1>Change Password</h1>
					<div class="line"></div><br><p>
					<div class="field">
						<label>Current Password</label>
						<div class="ui left labeled icon input">
							<input type="password" placeholder="Current Password" id="password" name="password" required>
							<i class="lock icon"></i>
						</div>
					</div>
					<div class="field">
						<label>New Password</label>
						<div class="ui left labeled icon input">
							<input type="password" placeholder="New Password" id="password" name="password" required>
							<i class="lock icon"></i>
						</div>
					</div>
					<div class="field">
						<label>Confirm Password</label>
						<div class="ui left labeled icon input">
							<input type="password" placeholder="Confirm Password" id="confirmPass" required>
							<i class="lock icon"></i>
						</div>
						<span id="errorMsg" style="color:red"> </span>
					</div>
					<br><p><div class="line"></div><p>
					<div class="ui red submit button">Save Change</div>
				</div>
			</div>
			<div class="col-xs-2"></div>
		</div>
	</div>

	<?php $this->load->view('footer'); ?>  
	<script>
	</script>
</body>
</html>