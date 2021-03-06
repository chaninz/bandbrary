<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เปลี่ยนรหัสผ่าน | Bandbrary</title>
	<?php $this->load->view('header'); ?>  

</head>
<style>
body {
	background: #FFFFFF;
}
footer {
		margin-top: 0px;
}
.col-xs-2 {
	min-height: 100%;
	display: table;
	background-color: #FFFFFF;
}
.col-xs-3 {
	height: 800px;
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
	padding-left: 10px;
	padding-right: 0px;
	border: 0px solid #FFFFFF;
}
.ui.form.segment {
	padding-top: 100px;
}
.ui.vertical.menu {
	width: 15.2rem;
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
	padding: 1em 1em;
}
.ui.form.segment{
	-webkit-box-shadow: none;
	box-shadow: none;
}
</style>
<body>
	<?php $this->load->view('navigation'); ?>

	<div class="container">
		<div class="row">
			<?php $this->load->view('account/sidebar_left'); ?>
			<div class="col-xs-7">
				<div class="ui form segment"><p><p/>
					<h2 class="ui header">เปลี่ยนรหัสผ่าน</h2>
					<div class="line"></div><p></p>
					<?php if ( ! empty($msg)): if ($msg['type'] == 1): ?>
					<div class="ui visible error message">
						<div class="header"><?= $msg['header'] ?></div>
						<i class="icon attention"></i> <?= $msg['text'] ?>
					</div><?php elseif ($msg['type'] == 2): ?>
					<div class="ui visible info message">
						<div class="header"><?= $msg['header'] ?></div>
						<i class="icon info"></i> <?= $msg['text'] ?>
					</div><?php elseif ($msg['type'] == 3): ?>
					<div class="ui visible success message">
						<div class="header"><?= $msg['header'] ?></div>
						<i class="icon ok sign"></i> <?= $msg['text'] ?>
					</div><?php endif; endif; ?>
					<form action="<?= base_url('account/password') ?>" method="post" id="change-password-form">
						<div class="field">
							<label>รหัสผ่านปัจจุบัน</label>
							<div class="ui left labeled icon input">
								<input type="password" id="current-password" name="current-password"/>
								<i class="lock icon"></i>
							</div>
						</div>
						<div class="field">
							<label>รหัสผ่านใหม่</label>
							<div class="ui left labeled icon input">
								<input type="password" id="new-password" name="new-password"/>
								<i class="lock icon"></i>
							</div>
						</div>
						<div class="field">
							<label>ยืนยันรหัสผ่านใหม่</label>
							<div class="ui left labeled icon input">
								<input type="password" id="confirm-password"/>
								<i class="lock icon"></i>
							</div>
						</div>
						<br/><p/><div class="line"></div/><p/><br/>
						<input class="ui red submit button" type="submit" value="บันทึก"/>
					</form>
				</div>
			</div>
			<div class="col-xs-2"></div>
		</div>
	</div>  
	<script>
	</script>
	<?php $this->load->view('footer'); ?>
</body>
</html>