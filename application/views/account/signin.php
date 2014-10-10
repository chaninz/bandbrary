<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เข้าสู่ระบบ | Bandbrary</title>

	<?php $this->load->view('header'); ?>  
	<style>
		body {
			font-size: 15px;
		}
		.col-md-6 {
			margin-top: 100px;
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
		.col-centered {
			display: inline-block;
			float: none;
			/* reset the text-align */
			text-align: left;
			/* inline-block space fix */
			margin-right: -4px;
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
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div id="login-form-full" class="ui form segment">
					<h3 id="login-hea-text">เข้าสู่ระบบ</h3>
					<p></p>
					<div class="line"></div>
					<p></p><?php if ( ! empty($msg)): if ($msg['type'] == 1): ?>
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

					<form id="signin-form" action="<?php echo base_url().'account/signin'; ?>" method="post">
						<div class="field">
							<label>ชื่อผู้ใช้</label>
							<div class="ui left labeled icon input">
								<input type="text" name="username">
								<i class="user icon"></i>
								<div class="ui corner label">
									<i class="icon asterisk"></i>
								</div>
							</div>
						</div>
						<div class="field">
							<label>รหัสผ่าน</label>
							<div class="ui left labeled icon input">
								<input type="password" name="password">
								<i class="lock icon"></i>
								<div class="ui corner label">
									<i class="icon asterisk"></i>
								</div>
							</div>
						</div>
						<div class="field">
							<div class="ui checkbox">
								<input type="checkbox" name="remember"/>
								<label>จำรหัสผ่าน</label>
							</div>
						</div>
						<div class="field text-center"><?php if( ! empty($ref)): ?>
							<input type="hidden" name="ref" value="<?= $ref ?>"/><?php endif; ?>
							<input class="ui button primary" type="submit" value="เข้าสู่ระบบ"/>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<script src="<?php echo base_url().'assets/js/bandbrary.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/jquery-ui.min.js'; ?>"></script>
</body>
</html>