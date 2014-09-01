<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>

</head>
<body>
		<div class="container">
			<form action="<?php echo base_url().'user/register'; ?>" method="post">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<!-- Step 1 -->
					<div class="ui form segment">
						<div class="field">
							<label>Username</label>
							<div class="ui left labeled icon input">
								<input type="text" placeholder="Username" name="username" required>
								<i class="user icon"></i>
							</div>
						</div>
						<div class="field">
							<label>Password</label>
							<div class="ui left labeled icon input">
								<input type="password" placeholder="Password" id="password" name="password" required>
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
						<div class="field">
							<label>Email address</label>
							<div class="ui left labeled icon input">
								<input type="email" placeholder="Email address" name="email" required>
								<i class="mail icon"></i>
							</div>
						</div>
						<div class="ui red submit button">Next</div>
					</div>
					<div class="ui three steps">
						<div class="ui active step">
							Step 1
						</div>
						<div class="ui disabled step">
							Step 2
						</div>
						<div class="ui disabled step">
							Step 3
						</div>
					</div> 
					<!-- End Step 1 -->
				</div>
				<div class="col-md-3"></div>
			</div>

			<p><br>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<!-- Step 2 -->
					<div class="ui form segment">
						<div class="two fields">
							<div class="field">
								<label>First Name</label>
								<input placeholder="First Name" type="text" name="name" required>
							</div>
							<div class="field">
								<label>Last Name</label>
								<input placeholder="Last Name" type="text" name="surname" required>
							</div>
						</div>
						<div class="ui form">
							<div class=" field">
								<label>Birthday</label>
								<input type="date" placeholder="xx/xx/xxxx" name="dob" required>
							</div>
						</div>
						<div class="field">
							<label>Province</label>
							<div class="ui fluid selection dropdown">
								<div class="text">Select</div>
								<i class="dropdown icon"></i>
								<input type="hidden" name="province">
								<div class="menu">
									<div class="item" data-value="01" style="font-size: 14px;">Bangkok</div>
									<div class="item" data-value="02" style="font-size: 14px;">Changmai</div>
								</div>
							</div>
						</div>
						<div class="field" name="biography">
							<label>Biography</label>
							<textarea></textarea>
						</div>
						<div class="field">
							<label>Facebook URL</label>
							<div class="ui left labeled icon input">
								<input type="text" placeholder="Facebook URL" name="fburl">
								<i class="facebook icon"></i>
							</div>
						</div>
						<div class="field">
							<label>Twitter URL</label>
							<div class="ui left labeled icon input">
								<input type="text" placeholder="Twitter URL" name="twurl">
								<i class="twitter icon"></i>
							</div>
						</div>
						<div class="field">
							<label>Youtube URL</label>
							<div class="ui left labeled icon input">
								<input type="text" placeholder="Youtube URL" name="yturl">
								<i class="youtube icon"></i>
							</div>
						</div>
						<div class="ui red submit button">Next</div>
					</div>
					<div class="ui three steps">
						<div class="ui disabled step">
							Step 1
						</div>
						<div class="ui active step">
							Step 2
						</div>
						<div class="ui disabled step">
							Step 3
						</div>
					</div>
					<!-- End Step 2 -->
				</div>
				<div class="col-md-3"></div>
			</div>

			<p><br>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<!-- Step 3 -->
					<div class="ui form segment">
						<div class="field">
							<label>Member Type</label>
							<div class="grouped inline fields">
								<div class="field">
									<div class="ui slider checkbox">
										<input type="radio" name="usertype" value="1">
										<label>Audience</label>
									</div>
								</div>
								<div class="field">
									<div class="ui slider checkbox">
										<input type="radio" name="usertype" value="2">
										<label>Musician</label>
									</div>
								</div>
							</div>
						</div>
						<div class="field">
							<label>Style</label>
							<div class="grouped inline fields">
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="style" value="1">
										<label>Blues</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="style" value="2"> 
										<label>Country</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="style" value="3">
										<label>Hip Hop</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="style" value="4">
										<label>Jazz</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="style" value="5">
										<label>Latin</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="style" value="6">
										<label>Pop</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="style" value="7">
										<label>Reggae</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="style" value="8">
										<label>R&B</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="style" value="9">
										<label>Rock</label>
									</div>
								</div>
							</div>
						</div>
						<div class="field">
							<label>Skill</label>
							<div class="grouped inline fields">
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="vocal" value="1">
										<label>Vocal</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="guitar" value="2">
										<label>Guitar</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="bass" value="3">
										<label>Bass</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="drum" value="4">
										<label>Drum</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="piano" value="5">
										<label>Piano</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="keyboard" value="6">
										<label>Keyboard</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="saxophone" value="7">
										<label>Saxophone</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="trumpets" value="8">
										<label>Trumpets</label>
									</div>
								</div>
								<div class="field">
									<div class="ui checkbox">
										<input type="checkbox" name="violin" value="9">
										<label>Violin</label>
									</div>
								</div>
							</div>
						</div>
						<input class="ui red submit button" type="submit" value="register">
					</div>
					<div class="ui three steps">
						<div class="ui disabled step">
							Step 1
						</div>
						<div class="ui disabled step">
							Step 2
						</div>
						<div class="ui active step">
							Step 3
						</div>
					</div>
					<!-- End Step 3 -->
				</div>
				<div class="col-md-3"></div>
			</div>
			</form>
		</div> 
	<?php $this->load->view('footer'); ?>

</body>
</html>