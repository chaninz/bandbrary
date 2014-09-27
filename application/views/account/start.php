<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Information | Bandbrary</title>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/arimo.css'; ?>">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.cus.css'; ?>">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/semantic.css'; ?>">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/bandbrary.css'; ?>">
	<script src="<?php echo base_url().'assets/js/jquery.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/jquery.address.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/semantic.js'; ?>"></script>

	<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'; ?>">
	<script>
	$(function() {
		$( "#dob" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd",
			minDate: "-100Y",
			maxDate: "-12Y"
		});
	});
	</script>

	<style>
	html, body {
		font-size: 15px;
	}
	body {
		width: 100%;
		display: table;
	}
	header {
		background-color: #E72A30;
		width: 100%;
		height: 40px;
		z-index: 1000;
		position: fixed;
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
	.col-centered {
		display: inline-block;
		float: none;
		/* reset the text-align */
		text-align: left;
		/* inline-block space fix */
		margin-right: -4px;
	}
	.content-wrapper {
		background-color: #FFFFFF;
		padding-top: 80px;
		text-align: center;
		border-left: 1px solid rgba(0,0,0,0.1);
		border-right: 1px solid rgba(0,0,0,0.1);
	}
	.content {

	}
	.bb-logo {
		text-align: center;
		margin-left: 0px;
	}
	</style>

</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<div class="bb-logo col-centered">
						<img src="<?php echo base_url().'images/bandbrary_logo_16-9.png'; ?>">
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row text-center">
			<div class="content-wrapper col-xs-10 col-centered">
				<div class="col-xs-8 col-centered">
					<div class="content col-xs-10">
						<h3>User Profile</h3>
						<p>Please complete the registration form </p>
						<div class="ui form">
							<form class="initial-form" action="start" method="post">
								<div class="two fields">
									<div class="field">
										<label>Name</label>
										<div class="ui labeled icon input">
											<input type="text" name="name"/>
											<div class="ui corner label">
												<i class="icon asterisk"></i>
											</div>
										</div>
									</div>
									<div class="field">
										<label>Surname</label>
										<div class="ui labeled icon input">
											<input type="text" name="surname"/>
											<div class="ui corner label">
												<i class="icon asterisk"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="date field">
									<label>Date of Birth</label>
									<div class="ui left labeled icon input">
										<i class="icon calendar"></i>
										<input type="text" placeholder="YYYY-MM-DD" name="dob" id="dob"/>
										<div class="ui corner label">
											<i class="icon asterisk"></i>
										</div>
									</div>

								</div>
								<div class="field">
									<label>Province</label>
									<div class="ui labeled icon input">
										<div class="ui fluid selection dropdown">

											<div class="text">Select</div>
											<i class="dropdown icon"></i>
											<input type="hidden" name="province">
											<div class="menu">
												<div class="item" data-value="10" style="font-size: 14px;">Bangkok</div>
												<div class="item" data-value="36" style="font-size: 14px;">Chaiyaphum</div>
											</div>
											<div class="ui corner label">
												<i class="icon asterisk"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="field">
									<label>Biography</label>
									<textarea name="biography"></textarea>
								</div>
								<div class="field">
									<label>Facebook URL</label>
									<div class="ui left labeled icon input">
										<input type="text" placeholder="facebook.com/bandbrary" name="fburl">
										<i class="facebook icon"></i>
									</div>
								</div>
								<div class="field">
									<label>Twitter URL</label>
									<div class="ui left labeled icon input">
										<input type="text" placeholder="twitter.com/bandbrary" name="twurl">
										<i class="twitter icon"></i>
									</div>
								</div>
								<div class="field">
									<label>Youtube URL</label>
									<div class="ui left labeled icon input">
										<input type="text" placeholder="youtube.com/user/bandbrary" name="yturl">
										<i class="youtube icon"></i>
									</div>
								</div>

								<?php if ($this->session->userdata('user_type') == 2) {
									echo '<div class="field">
									<label>Style*</label>
									<div class="ui three fields">
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" name="style" value="1">
												<label>Blues</label>
											</div>
										</div>
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" name="style" value="2"> 
												<label>Country</label>
											</div>
										</div>
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" name="style" value="3">
												<label>Hip Hop</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" name="style" value="4">
												<label>Jazz</label>
											</div>
										</div>
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" name="style" value="5">
												<label>Latin</label>
											</div>
										</div>
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" name="style" value="6">
												<label>Pop</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" name="style" value="7">
												<label>Reggae</label>
											</div>
										</div>
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" name="style" value="8">
												<label>R&B</label>
											</div>
										</div>
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" name="style" value="9">
												<label>Rock</label>
											</div>
										</div>
									</div>
								</div>

								<div class="field groupped inline">
									<label>Skill*</label>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" value="1">
												<label>Vocal</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" value="2">
												<label>Guitar</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" value="3">
												<label>Bass</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" value="4">
												<label>Drum</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" value="5">
												<label>Piano</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" value="6">
												<label>Keyboard</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" value="7">
												<label>Saxophone</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" value="8">
												<label>Trumpets</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" value="9">
												<label>Violin</label>
											</div>
										</div>
									</div>
								</div>';
								} ?>
								<div class="field text-center">
									<div id="initial-button" class="ui red small submit button">Finish</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('footer'); ?>

</body>
</html>
