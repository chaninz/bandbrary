<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>คำร้องขอเข้าร่วมวง | Bandbrary</title>

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
		background-color: #FFFFFF;
	}
	.col-xs-3 {
		height: 1280px;
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
	.ui.small.button {
		font-size: 0.8rem;
	}
</style>
<body>
	<?php $this->load->view('navigation'); ?>
	
	<div class="container">
		<div class="row">
			<?php $this->load->view('account/sidebar_left'); ?>
			<div class="col-xs-7">
				<div class="ui form segment"><p>
					<h2 class="ui header">คำร้องขอเข้าร่วมวง</h2>
					<div class="line"></div><br><p>
					<?php if ($band_requests): ?>
						<?php foreach ($band_requests as $band_request) : ?>
							<div id="join-rq" class="field">
								<div class="jb1"><?php if($band_request->photo_url): ?>
									<img src="<?= base_url('uploads/profile/user/'.$band_request->photo_url) ?>" alt="" id="img-preview"/><?php else: ?>
									<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" id="img-preview"/><?php endif; ?>
								</div>
								<div class="jb2">
									<a href="<?= base_url('user/'.$band_request->username) ?>"><?= $band_request->name.' '.$band_request->surname ?></a>
								</div>
								<?php if ($this->session->userdata('is_master') == 1): ?>
									<div class="jb3">
										<a class="ui small green button" href="<?= base_url('band/request/accept/'.$band_request->id.'?ref='.uri_string()) ?>">
											ยืนยัน
										</a>
										<a class="ui small red button" href="<?= base_url('band/request/reject/'.$band_request->id.'?ref='.uri_string()) ?>">
											ปฏิเสธ
										</a>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						ไม่มีคำร้องขอร่วมวง
					<?php endif; ?>
				</div>
			</div>
		<div class="col-xs-2"></div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>