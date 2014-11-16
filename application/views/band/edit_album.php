<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>แก้ไขอัลบั้ม | Bandbrary</title>

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
	<div id="bb-container" class="container" style="height: 700px;">
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
				<form action="<?= base_url('album/band/edit/'.$album->id) ?>" method="post" enctype="multipart/form-data">
				<div class="ui form segment">
					<div class="field">
						<label>ชื่ออัลบั้ม</label>
						<input type="text" placeholder="" name="name" value="<?= $album->name ?>">
					</div>
					<!-- <div class="field">
						<label>คำอธิบาย</label>
						<textarea name="description"><?= $album->description ?></textarea>
					</div> -->
					<div class="field">
						<label>ปกอัลบั้ม</label>
						<div class="ui selection dropdown">
							<div class="default text"><b>เปลี่ยนรูปปกอัลบั้ม</b></div>
							<i class="dropdown icon"></i>
							<div class="menu">
								<div class="file-upload item" data-value="2" style="font-size: 14px;">อัพโหลดรูป<input class="upload" type="file" name="cover" value=""></div>
								<div class="item" data-value="1" style="font-size: 14px;">ลบ</div>
							</div>
							<input type="hidden" name="image-upload" id="image-upload" value="0"/>
						</div>
						<?php if($album->image_url != NULL): ?>
						<div style="margin-top: 20px;">
							<img id="img-preview" src="<?= base_url('uploads/album/'.$album->image_url) ?>"/>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<input class="ui small red submit button" style="float: right" type="submit" value="บันทึก">
				</form>
				<div class="col-xs-3"></div>
			</div>
		</div>
	</div>

		<script>
			$("#cover").change(function() {
				var fileName = $("#cover")[0].files[0];
				if (fileName) {
					$("#cover-name").val(fileName.name);
				} else {
					$("#cover-name").val("");
				}
			})
		</script>

		<?php $this->load->view('footer'); ?>

	</body>
	</html>