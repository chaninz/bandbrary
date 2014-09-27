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
	height: 1000px;
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
	padding-left: 20px;
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
						<a class="item">Genaral</a>
						<a href="changePassword.html" class="item">Password</a>
					</div>
					<div class="header item">
						<i class="circle blank icon"></i>
						BAND
					</div>
					<div class="menu">
						<a href="bandInfo.html" class="item">Information</a>
						<a href="joinRequest.html" class="item">Join Request</a>
						<a href="roles.html" class="item">Roles</a>
					</div>
				</div>
			</div>
			<div class="col-xs-7">
				<div class="ui form segment"><p>
					<h1>Edit Band Information</h1>
					<div class="line"></div><br><p>
					<div class="field">
						<label>Band Name</label>
						<input type="text" placeholder="" name="name" style="background-color: #EBEBEB;" readonly> 
					</div>
					<div class="field">
						<label>Biography</label>
						<textarea></textarea>
					</div>
					<div class="field">
						<label>Style</label>
						<div class="grouped inline fields">
							<div class="field">
								<div class="ui checkbox">
									<input type="checkbox" value="1" name="style">
									<label>Blues</label>
								</div>
							</div>
							<div class="field">
								<div class="ui checkbox">
									<input type="checkbox" value="2" name="style">
									<label>Country</label>
								</div>
							</div>
							<div class="field">
								<div class="ui checkbox">
									<input type="checkbox" value="3" name="style">
									<label>Hip Hop</label>
								</div>
							</div>
							<div class="field">
								<div class="ui checkbox">
									<input type="checkbox" value="4" name="style">
									<label>Jazz</label>
								</div>
							</div>
							<div class="field">
								<div class="ui checkbox">
									<input type="checkbox" value="5" name="style">
									<label>Latin</label>
								</div>
							</div>
							<div class="field">
								<div class="ui checkbox">
									<input type="checkbox" value="6" name="style">
									<label>Pop</label>
								</div>
							</div>
							<div class="field">
								<div class="ui checkbox">
									<input type="checkbox" value="7" name="style">
									<label>Reggae</label>
								</div>
							</div>
							<div class="field">
								<div class="ui checkbox">
									<input type="checkbox" value="8" name="style">
									<label>R&B</label>
								</div>
							</div>
							<div class="field">
								<div class="ui checkbox">
									<input type="checkbox" value="9" name="style">
									<label>Rock</label>
								</div>
							</div>
						</div>
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
					<br><p><div class="line"></div><p>
					<div class="ui red submit button">Save Change</div>
				</div>
			</div>
			<div class="col-xs-2"></div>
		</div>
	</div>

	<script src="../../../assets/js/bandbrary.js"></script>
	<script>
	</script>
</body>
</html>