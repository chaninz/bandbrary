<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

	<?php $this->load->view('header'); ?>

	<style>
	.ui.header {
		margin-left: 60px;
		font-weight: bold;
	}
	.col-xs-8 {
		padding-top: 140px;
	}
	.col-xs-6 {
		padding-bottom: 70px;
	}
	</style>

</head>
<body>
		<?php $this->load->view('navigation'); ?>

	<div class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<h2 class="ui header">
					อัพโหลดเพลง
				</h2>
				<p/>
				<div class="line"></div>
				<p/><br/>
			</div>
			<div class="col-xs-2"></div>
		</div>
		<div class="row">
			<div class="col-xs-3"></div>
			<div class="col-xs-6">
				<div class="ui form segment">
				<form action="<?= base_url().'music/user/upload' ?>" method="post">
					<div class="field">
						<label>ชื่อเพลง</label>
						<input type="text" placeholder="" name="name">
					</div>
					<div class="field">
						<label>เนื้อเพลง</label>
						<textarea name="lyric"></textarea>
					</div>
					<div class="field">
						<label>เพลง</label>
						<input type="file" name="" value="">
					</div>
					<div class="field">
						<label>อัลบั้ม</label>
						<div class="ui fluid selection dropdown">
							<div class="text">เลือก</div>
							<i class="dropdown icon"></i>
							<input type="hidden" name="album">
							<div class="menu"><?php if (! empty($albums)): foreach ($albums as $album): ?>
								<div class="item" data-value="<?= $album->id ?>" style="font-size: 14px;"><?= $album->name ?></div><?php endforeach; endif; ?>
							</div>
						</div>
					</div>
					<div class="field">
						<label>ลิขสิทธิ์</label>
						<div class="ui fluid selection dropdown">
							<div class="text">เลือก</div>
							<i class="dropdown icon"></i>
							<input type="hidden" name="licenese">
							<div class="menu">
								<div class="item" style="font-size: 14px;" data-value="1">ห้ามทำซ้ำ</div>
								<div class="item" style="font-size: 14px;" data-value="2">ทำซ้ำได้</div>
								<div class="item" style="font-size: 14px;" data-value="3">ดัดแปลงได้</div>
							</div>
						</div>
					</div>
					<div class="field">
						<label>ความเป็นส่วนตัว</label>
						<div class="grouped inline fields">
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="1" name="visibility">
									<label>ส่วนตัว</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="2" name="visibility">
									<label>สาธารณะ</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<input class="ui small red submit button" style="float: right" type="submit" value="บันทึก">
			</form>
				<div class="col-xs-3"></div>
			</div>
		</div>

		<?php $this->load->view('footer'); ?>
		
	</body>
	</html>