<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เพิ่มโพสต์ | Bandbrary</title>
	<?php $this->load->view('header'); ?>
	<style>
	#angle-bth {
		font-size: 1.3em;
		margin-top: 5px;
		margin-left: 2px;
		float: left;
		color: #929292;
	}
	.center {
		margin-top: 0px;
	}
	</style>
</head>
<body>
	<?php $this->load->view('navigation'); ?>
	<?php $this->load->view('band/cover'); ?>
	<section>
		<article>
			<div class="container">
				<div class="row">
					<?php $this->load->view('band/sidebar_left'); ?>
					<div class="col-md-9">
						<div class="center"> 
							<form action="<?= base_url('band/post/add') ?>" method="post" enctype="multipart/form-data">
								<h3>เพิ่มโพสต์</h3>
								<br/><p><p/>
								<div class="line"></div>
								<p/>
								<div class="field">
									<label>ชื่อเรื่อง</label>
									<input type="text" name="topic" value="<?= ! empty($topic) ? $topic : '' ?>"/>
								</div>
								<div class="line"></div>
								<p><p/>
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
								<div class="line"></div>
								<p><p/>
								<div class="actions">
									<input type="submit" class="ui red submit small button" value="โพสต์">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<!--Create post modal-->
	<div class="ui form transition segment createpost modal">
		
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