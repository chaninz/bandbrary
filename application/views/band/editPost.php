<!-- <div>
	<form action="<?php echo base_url().'band/post/edit'; ?>" method="post">
		<input type="text" placeholder="topic" name="topic" readonly> <br>
		<input type="text" placeholder="post" name="post"> <br
		<input type="file" placeholder="file" name="imageurl"> <br>
		<input type="submit" class="btn" value="Share">

	</form>
</div> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	
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
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<form action="<?php echo base_url().'band/post/edit'; ?>" method="post">	
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
						<div class="field">
							<label>ชื่อ</label>
							<input type="text" placeholder="" name="topic" value="<?= $post->topic ?>" readonly>
						</div>
						<div class="field">
							<label>คำอธิบาย</label>
							<textarea name="post" class="ckeditor"><?= $post->post; ?></textarea>
						</div>
						<div class="field">
							<label>รูปภาพ</label>
							<input type="file" name="image_url" value="<?= $post->image_url; ?>">
						</div>
					</form>
				</div>
				<input class="ui small red submit button" style="float: right" type="submit" value="บันทึก">
			</div>
			<div class="col-xs-3"></div>
		</div>
	</div>
	<?php $this->load->view('footer'); ?>
</body>
</html>