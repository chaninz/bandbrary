<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User profile | Bandbrary</title>
	<?php $this->load->view('header'); ?>  
	<style>
	.col-xs-2 {
		height: 1370px;
		background-color: #FFFFFF;
	}
	.col-xs-3 {
		height: 1370px;
		float: left;
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
		padding-left: 0px;
		padding-right: 0px;
		border: 0px solid #FFFFFF;
	}
	.ui.form.segment {
		height: 1370px;
		padding-top: 100px;
	}
	.ui.vertical.menu {
		width: 16.2rem;
		border-radius: 0px;
		padding-top: 80px;
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
		font-size: 1rem;
		padding: 1em 1em;
	}
	.ui.form.segment{
		-webkit-box-shadow: none;
		box-shadow: none;
	}
	.line {
		width: 700px;
	}
</style>
</head>
<body>
	<?php $this->load->view('navigation'); ?>

	<div class="container">
		<div class="row">
			<?php $this->load->view('account/sidebar_left'); ?>
			<div class="col-xs-7">
				<div class="ui form segment">
					<form action="<?= base_url('account/edit') ?>" method="post">
					<p/>
					<h1>Edit Profile</h1>
					<div class="line"></div>
					<br/><p/>
					<div class="field">
						<label>Username</label>
						<div class="ui left labeled icon input">
							<input type="text" placeholder="Username" name="username" value="<?php echo $user->username; ?>" readonly>
							<i class="user icon"></i>
						</div>
					</div>
					<div class="field">
						<label>Email address</label>
						<div class="ui left labeled icon input">
							<input type="email" placeholder="Email address" name="email" value="<?php echo $user->email; ?>" readonly>
							<i class="mail icon"></i>
						</div>
					</div>
					<div class="two fields">
						<div class="field">
							<label>First Name</label>
							<input placeholder="First Name" type="text" name="name" value="<?php echo $user->name; ?>" required>
						</div>
						<div class="field">
							<label>Last Name</label>
							<input placeholder="Last Name" type="text" name="surname" value="<?php echo $user->surname; ?>" required>
						</div>
					</div>
					<div class="field">
						<label>Province</label>
						<div class="ui fluid selection dropdown">
							<div class="text">Select</div>
							<i class="dropdown icon"></i>
							<input type="hidden" name="province" value="<?php echo $user->province_id; ?>" >

							<div class="menu">
								<div class="item  <?php echo ($user->province_id ==10)?'active':'';?>" data-value="1" style="font-size: 14px;">Bangkok</div>
								<div class="item <?php echo ($user->province_id ==36)?'active':'';?>" data-value="2" style="font-size: 14px;">Chaiyaphum</div>
							</div>
						</div>
					</div>
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
					<div class="line"></div>
					<p/>
					<div class="field">
						<label>Profile Photo</label>
						<img src="<?php echo base_url().'images/'.$user->photo_url; ?>" alt="" id="img-preview"/>
						<div class="ui selection dropdown" style="margin-left: 10px;">
							<input type="hidden" name="profile-photo">
							<div class="default text"><b>Change photo</b></div>
							<i class="dropdown icon"></i>
							<div class="menu">
								<div class="fileUpload item" data-value="1" style="font-size: 14px;">Upload photo<input id="uploadBtn" type="file" class="upload" name="photo" value="<?php echo $user->photo_url; ?>"></div>
								<div class="item" data-value="0" style="font-size: 14px;">Remove</div>
							</div>
						</div>
					</div>
					<div class="field">
						<label>Cover Photo</label>
						<img src="<?php echo base_url().'images/'.$user->cover_url; ?>" alt="" id="img-preview">
						<div class="ui selection dropdown" style="margin-left: 10px;">
							<input type="hidden" name="cover-photo">
							<div class="default text"><b>Change cover</b></div>
							<i class="dropdown icon"></i>
							<div class="menu">
								<div class="fileUpload item" data-value="1" style="font-size: 14px;">Upload photo<input id="uploadBtn" type="file" class="upload" name="cover" value="<?php echo $user->cover_url; ?>"></div>
								<div class="item" data-value="0" style="font-size: 14px;">Remove</div>
							</div>
						</div>
					</div>
					<div class="field" >
						<label>Biography</label>
						<textarea name="biography" required><?php echo $user->biography; ?></textarea>
					</div>
					<div class="line"></div>
					<p/>
					<div class="field">
						<label>Facebook URL</label>
						<div class="ui left labeled icon input">
							<input type="text" placeholder="Facebook URL" name="fburl" value="<?php echo $user->fb_url; ?>">  
							<i class="facebook icon"></i>
						</div>
					</div>
					<div class="field">
						<label>Twitter URL</label>
						<div class="ui left labeled icon input">
							<input type="text" placeholder="Twitter URL" name="twurl" value="<?php echo $user->tw_url; ?>">
							<i class="twitter icon"></i>
						</div>
					</div>
					<div class="field">
						<label>Youtube URL</label>
						<div class="ui left labeled icon input">
							<input type="text" placeholder="Youtube URL" name="yturl" value="<?php echo $user->yt_url; ?>">
							<i class="youtube icon"></i>
						</div>
					</div>
					<br/><p/>
					<div class="line"></div>
					<br><p/>
					<input class="ui small red submit button" type="submit" value="Save Change">
				</form>
				</div> 
			</div>
			<div class="col-xs-2"></div>
		</div>
	</div>
	
	<script>
	$(document).ready(function() {
		$('#entertain').mouseover(function(){
			$('#content').load('entertainment.html').hide(0).fadeIn(1000);
		});
		$('#sports').mouseover(function(){
			$('#content').load('Sport.html').hide(0).fadeIn(1000);
		});
		document.getElementById("uploadBtn").onchange = function () {
			document.getElementById("uploadFile").value = this.value;
		};
		</script>

	</body>
	</html>
