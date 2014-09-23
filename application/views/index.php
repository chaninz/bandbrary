<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<link type="text/css" type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/bg-slide.css'; ?>">
	<link type="text/css" type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/arimo.css'; ?>">
	<link type="text/css" type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.cus.css'; ?>">
	<link type="text/css" type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/semantic.css'; ?>">
	<script src="<?php echo base_url().'assets/js/jquery.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/jquery.address.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/semantic.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/bg-slide.js'; ?>"></script>
	<style>
	html, body {
		font-size: 15px;
		font-family: Arimo, 'Helvetica Neue', Helvetica, Arial, sans-serif;
	}
	body {
		width: 100%;
		display: table;
	}
	header {
		background-color: #FFFFFF;
		width: 100%;
		height: 80px;
		z-index: 1000;
		position: relative;
		-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
		box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
	}
	.container {
		width: 1170px;
		max-width: none !important;
	}
	.ui.label {
		text-transform: none;
	}
	.text-bold {
		font-weight: bold;
	}
	.signin-form {
		padding: 0em;
		margin-top: 0.3em;
	}
	.signin-field {
		height: 100%;
		vertical-align: bottom;
		margin-bottom: 5px !important;
	}
	#welcome-msg {
		color:#FFFFFF;
		margin-left: 60px;
	}
	#signup-msg {
		font-size: 16px;
		font-weight: 10px;
		margin-bottom: 15px;
	}
	#signin-button {
		margin-top: 1.25rem;
	}
	#signup-button {
		margin-bottom: 0px;
	}
	</style>
</head>
<body>
	<ul class="cb-slideshow">
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
	</ul>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-xs-8">
					<a href="<?php echo base_url(); ?>">
						<img src="images/bandbrary_logo2.png" alt="" height="80px" style="margin-left:50px;">
					</a>
				</div>

				<div class="col-xs-4">
					<div class="signin-form ui small form">
						<form class="signin-form" action="account/signin" method="post">
							<div class="three fields">
								<div class="field signin-field">
									<label>Username</label>
									<input placeholder="" type="text" name="username">
								</div>
								<div class="signin-field field">
									<label>Password</label>
									<input placeholder="" type="password">
								</div>
								<div class="signin-field field">
									<div id="signin-button" class="ui red small submit button">Sign in</div>
								</div>
							</div>
							<div class="inline field">
								<div class="ui checkbox">
									<input type="checkbox">
									<label>Remember me</label>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="container" style="margin-top:100px;">
		<div class="row">
			<div class="col-xs-7">
				<div id="welcome-msg">
					<h1>Welcome to Bandbrary.</h1>
				</div>
			</div>

			<div class="col-xs-4">
				<div id="signup-form" class="ui form segment">
					<div id="signup-msg">
						<p><span class="text-bold">Sign up</span> to Bandbrary</p>
					</div>
					<form class="signup-form" action="<?php echo base_url().'account/signup'; ?>" method="post">
						<div class="field">
							<label>Username</label>
							<div class="ui left labeled icon input">
								<input type="text" name="username"/>
								<i class="user icon"></i>
							</div>
						</div>
						<div class="two fields">
							<div class="field">
								<label>Password</label>
								<div class="ui left labeled icon input">
									<input type="password" id="password" name="password"/>
									<i class="lock icon"></i>
								</div>
							</div>
							<div class="field">
								<label>Confirm Password</label>
								<div class="ui left labeled icon input">
									<input type="password" id="confirm-password"/>
									<i class="lock icon"></i>
								</div>
							</div>
						</div>
						<div class="field">
							<label>Email Address</label>
							<div class="ui left labeled icon input">
								<input type="text" name="email"/>
								<i class="mail icon"></i>
							</div>
						</div>
						<div id="signup-button" class="text-center field">
							<div class="ui large buttons" style="display: inline-block;">
								<input class="ui button" name="user-type" type="submit" value="audience"/>
								<div class="or"></div>
								<input class="ui button" name="user-type" type="submit" value="musician"/>
							</div>
						</div>
						<div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<?php $this->load->view('footer'); ?>

</body>
</html>
