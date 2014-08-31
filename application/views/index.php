<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Bandbrary</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('header'); ?>
	
	<style>
	.welcome-msg {
		color:#FFFFFF;
		margin-left: 60px;
	}
	.register-form {
		border:1px solid black;
	}
	</style>
</head>
<body id="page">
	<ul class="cb-slideshow">
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
	</ul>

	<div class="row">
		<div class="col-md-12">
			<header style="background-color: #FFFFFF; height: 80px;">
				<div class="col-md-8">
					<img src="images/bandbrary_logo2.png" alt="" width="80px" height="80px" style="margin-left:50px;">
				</div>
				<div class="col-md-4">
					<div class="login-form">
						<div class="ui small form segment" 
						style="-webkit-box-shadow: none; box-shadow: none; border-radius: 0px; font-size: 1rem; padding:0em; margin-top: 0.4em;">
							<div class="three fields">
								<div class="field">
									<label>Username</label>
									<input placeholder="Username" type="text">
								</div>
								<div class="field">
									<label>Password</label>
									<input placeholder="Password" type="password">
								</div>
								<div class="field">
									<div class="ui red small submit button" style="font-size: 1rem; margin-top: 1.8em;">Sign in</div>
								</div>
							</div>
							<div class="inline field">
								<div class="ui checkbox">
									<input type="checkbox">
									<label>Remember me</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>
	</div>
	<div class="container" style="margin-top:100px;">
		<div class="row">
			<div class="col-md-5">
				<div class="welcome-msg">
					<h1>Welcome to Bandbrary.</h1>
				</div>
			</div>
			<div class="col-md-7">
				<div class="register-form">
					<!--ใส่ register form ตรงนี้นะ -->
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('footer'); ?>

</body>
</html>