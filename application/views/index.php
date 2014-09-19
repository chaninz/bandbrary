<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>
	
	<style>
	body {
		width: 100%;
		display: table;
	}
	.container {
		width: 1170px;
		max-width: none !important;
	}
	.navigation {
		background-color: #FFFFFF;
		height: 80px;
		position: relative;
		z-index: 10;
		width: 100%;
		-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
		box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
	}
	.login-form {
		font-size: 1rem !important;
		padding:0em;
		margin-top: 0.4em;
	}
	.welcome-msg {
		color:#FFFFFF;
		margin-left: 60px;
	}
	.signup-msg {
		font-size: 16px;
		font-weight: 10px;
		margin-bottom: 5px;
	}
	.register-form {
		/*padding: 20px 80px 20px 80px;*/
	}
	.text-bold {
		font-weight: bold;
	}
	h3.ui.header {
		margin-bottom: 0.3em;
		color: #555555;
		font-size: 0.875em;
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
	<div class="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-8">
					<a href="<?php echo base_url(); ?>">
						<img src="images/bandbrary_logo2.png" alt="" height="80px" style="margin-left:50px;">
					</a>
				</div>

				<div class="col-xs-4">
					<div class="login-form ui small form">
						<form action="login" method="post">
							<div class="three fields">
								<div class="field">
									<label>Username</label>
									<input placeholder="Username" type="text" name="username">
								</div>
								<div class="field">
									<label>Password</label>
									<input placeholder="Password" type="password">
								</div>
								<div class="field">
									<input class="ui red small submit button" type="submit" style="font-size: 1rem !important; margin-top: 1.8em;" value="Sign in"/>
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
	</div>

	<div class="container" style="margin-top:100px;">
		<div class="row">
			<div class="col-xs-7">
				<div class="welcome-msg">
					<h1>Welcome to Bandbrary.</h1>
				</div>
			</div>

			<div class="col-xs-4">
				<div class="register-form">
					<div class="ui form segment">
						<div class="signup-msg">
							<p><span class="text-bold">Register</span> to Bandbrary</p>
						</div>
						<!-- <div class="line"></div> -->
						<form action="register" method="post">
							<div class="field">
								<label>Username</label>
								<div class="ui left labeled icon input">
									<input type="text" name="username" required/>
									<i class="user icon"></i>
								</div>
							</div>
							<div class="two fields">
								<div class="field">
									<label>Password</label>
									<div class="ui left labeled icon input">
										<input type="password" id="password" name="password" required/>
										<i class="lock icon"></i>
									</div>
								</div>
								<div class="field">
									<label>Confirm Password</label>
									<div class="ui left labeled icon input">
										<input type="password" id="confirm-pass" required/>
										<i class="lock icon"></i>
									</div>
								</div>
							</div>
							<div class="field">
								<label>Email Address</label>
								<div class="ui left labeled icon input">
									<input type="email" name="email" required/>
									<i class="mail icon"></i>
								</div>
							</div>

							<h3 class="ui header">Who are you?</h3>
							<div class="three fields">
								<div class="field">
									<div class="ui radio checkbox">
										<input id="audience" type="radio" name="usertype" value="1">
										<label for="audience">Audience</label>
									</div>
								</div>
								<div class="field">
									<div class="ui radio checkbox">
										<input id="musician" type="radio" name="usertype" value="2">
										<label for="musician">Musician</label>
									</div>
								</div>
							</div>
							<div>
								<input class="ui red submit button" type="submit" value="register"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php $this->load->view('footer'); ?>

</body>
</html>
