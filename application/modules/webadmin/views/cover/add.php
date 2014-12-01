<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ส่วนผู้ดูแลระบบ | Bandbrary</title>

	<?php $this->load->view('header'); ?>

	<style> 
	.ui.avatar.image {
		width: 5em;
		height: 5em;
	}

	th {
		text-align: center;
	}

	</style>
	<body>
		<?php $this->load->view('navigation'); ?>

		<div class="container" style="padding-top: 120px">
			<div class="row">
				<div class="col-xs-3">
					<?php $this->load->view('sidebar_left'); ?>
				</div>
				<div class="col-xs-9">
					<div class="ui segment">
						<h3 class="ui header">เพิ่มภาพอัลบัมแนะนำ</h3>
						<hr style="margin-top: 0px" />
						<form action="<?= base_url('webadmin/cover/add') ?>" id="cover-banner-form" method="post" enctype="multipart/form-data">
							<div class="ui form">
								<div class="field">
									<label>คำบรรยาย</label>
									<input type="text" name="caption"/>
								</div>
								<div class="field">
									<label>ไฮเปอร์ลิงก์</label>
									<input type="text" name="url"/>
								</div>
								<div class="field">
									<label>รูปภาพ</label>
									<input type="file" name="image" id="image"/>
									<input type="hidden" name="image-name" id="image-name"/>
								</div>
							</div>
							<input class="ui small red submit button" style="float: right" type="submit" value="บันทึก">
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('footer'); ?>
	</body>
	</html>