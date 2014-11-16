<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เพิ่มอัลบัม | Bandbrary</title>

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
	footer {
		margin-top: 0px;
	}
	</style>

</head>
<body>
	<?php $this->load->view('navigation'); ?>
	<div id="bb-container" class="container" style="height: 650px;">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<h2 class="ui header">
					เพิ่มอัลบั้มเพลง
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
				<form action="<?= base_url('album/band/add') ?>" id="album-form" method="post" enctype="multipart/form-data">
				<div class="ui form segment">
					<div class="field">
						<label>ชื่ออัลบั้ม</label>
						<input type="text" name="name" value="<?= ! empty($name) ? $name : '' ?>">
					</div>
					<!-- <div class="field">
						<label>คำอธิบาย</label>
						<textarea name="description"><?= ! empty($description) ? $description : '' ?></textarea>
					</div> -->
					<div class="field">
						<label>รูปภาพปก</label>
						<input type="file" name="cover" id="cover"/>
						<input type="hidden" name="cover-name" id="cover-name"/>
					</div>
				</div>
				<input class="ui small red submit button" style="float: right" type="submit" value="บันทึก">
				</form>
				<div class="col-xs-3"></div>
			</div>
		</div>
	</div>

		<?php $this->load->view('footer'); ?>
		
	</body>
	</html>