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
					<div class="field">
						<label>ชื่อเพลง</label>
						<input type="text" placeholder="" name="topic" value="">
					</div>
					<div class="field">
						<label>เนื้อเพลง</label>
						<textarea name="post" class="ckeditor"></textarea>
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
							<input type="hidden" name="gender">
							<div class="menu">
								<div class="item" data-value="male">อัลบั้ม1</div>
								<div class="item" data-value="female">อัลบั้ม2</div>
							</div>
						</div>
					</div>
					<div class="field">
						<label>ความเป็นส่วนตัว</label>
						<div class="grouped inline fields">
							<div class="field">
								<div class="ui slider checkbox">
									<input type="radio" value="1" name="style">
									<label>ส่วนตัว</label>
								</div>
							</div>
							<div class="field">
								<div class="ui slider checkbox">
									<input type="radio" value="2" name="style">
									<label>สาธารณะ</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<input class="ui small red submit button" style="float: right" type="submit" value="บันทึก">
				<div class="col-xs-3"></div>
			</div>
		</div>

		<script src="../../assets/js/bandbrary.js"></script>
		<script></script>
	</body>
	</html>