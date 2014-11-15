<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เขียนโพสต์ | Bandbrary</title>
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

	<div id="bb-container" class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<h2 class="ui header">
					เขียนโพสต์
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
					<form action="<?= base_url('band/post/add') ?>" id="post-form" method="post" enctype="multipart/form-data">
						<div class="ui form segment">
							<div class="field">
								<label>ชื่อเรื่อง</label>
								<input type="text" name="topic" value="<?= ! empty($topic) ? $topic : '' ?>"/>
							</div>
							<div class="field">
								<label>รายละเอียด</label>
								<textarea name="post" class="ckeditor"><?= ! empty($post) ? $post : '' ?></textarea>
							</div>
							<div class="field">
								<label>รูปภาพประกอบ</label>
								<input type="file" name="post-image" id="post-image"/>
								<input type="hidden" name="post-image-name" id="post-image-name"/>
							</div>
							<div><?= ! empty($msg_image) ? $msg_image : '' ?></div>
							<div class="line"></div><p/>
						</div>
						<input type="submit" class="ui red submit small button" style="float: right;" value="โพสต์">
					</form>
				</div>
				<div class="col-xs-3"></div>
			</div>
		</div>

<script>
$("#post-image").change(function() {
	var fileName = $("#post-image")[0].files[0];
	if (fileName) {
		$("#post-image-name").val(fileName.name);
	} else {
		$("#post-image-name").val("");
	}
})
</script>
<?php $this->load->view('footer'); ?>

</body>
</html>