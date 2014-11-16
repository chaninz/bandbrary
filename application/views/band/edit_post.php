<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>แก้ไขโพสต์ | Bandbrary</title>
	
	<?php $this->load->view('navigation'); ?>
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
	<div id="bb-container" class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">	
				<h2 class="ui header">
					แก้ไขโพสต์
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
					<form action="<?= base_url('band/post/edit/'.$post->id) ?>" method="post" enctype="multipart/form-data">
						<div class="field">
							<label>ชื่อ</label>
							<input type="text" placeholder="" name="topic" value="<?= $post->topic ?>" readonly>
						</div>
						<div class="field">
							<label>คำอธิบาย</label>
							<textarea name="content" class="ckeditor"><?= $post->post; ?></textarea>
						</div>
						<div class="field">
							<label>รูปภาพ</label>
							<?php if ($post->image_url != NULL): ?>
								<img class="ui medium image" src="<?= base_url().'uploads/post/band/'.$post->image_url ?>">
							<?php endif; ?>
							<div class="ui selection dropdown" style="margin-left: 10px;">
								<div class="default text"><b>อัพโหลดรูปภาพ</b></div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="file-upload item" data-value="2" style="font-size: 14px;">อัพโหลดรูป<input class="upload" type="file" id="post-image" name="post-image"></div>
									<div class="item" data-value="1" style="font-size: 14px;">ลบ</div>
								</div>
								<input type="hidden" name="post-image-upload" id="post-image-upload" value="0"/>
							</div>
						</div>
						<input class="ui small red submit button" style="float: right" type="submit" value="บันทึก">
					</form>
				</div>
			</div>
			<div class="col-xs-3"></div>
		</div>
	</div>
	<?php $this->load->view('footer'); ?>
</body>
</html>