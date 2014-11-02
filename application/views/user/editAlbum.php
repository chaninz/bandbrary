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
					แก้ไขอัลบั้มเพลง
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
				<form action="<?= base_url().'album/user/edit/'.$album->id ?>" method="post">

					<div class="field">
						<label>ชื่ออัลบั้ม</label>
						<input type="text" placeholder="" name="name" value="<?= $album->name ?>">
					</div>
					<div class="field">
						<label>คำอธิบาย</label>
						<textarea name="description" class="ckeditor"></textarea>
					</div>
					<div class="field">
						<label>ปกอัลบั้ม</label>
						<input type="file" name="cover" value="<?= $album->name ?>">
					</div>
				</div>
				<input class="ui small red submit button" style="float: right" type="submit" value="บันทึก">
				<div class="col-xs-3"></div>
				</form>
			</div>
		</div>

		<script src="../../assets/js/bandbrary.js"></script>
		<script></script>
	</body>
	</html>