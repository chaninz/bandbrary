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
						<h3 class="ui header">ภาพอัลบัมแนะนำ</h3>
						<hr style="margin-top: 0px" />
						<div class="ui celled list">
							<?php foreach ($banners as $banner): ?>
								<div class="item searchuser" style="padding: 20px;">
									<img class="ui avatar image" style="border-radius: 0px;" src="<?= base_url().'uploads/banner/' . $banner->image_url ?>">
									<div class="content">
										<div><b>คำบรรยาย:</b> <?= ! empty($banner->caption) ? $banner->caption : 'ไม่มี' ?></div>
										<div><b>ไฮเปอร์ลิงก์:</b> <?php if ( ! empty($banner->url)): ?><a href="<?= $banner->url ?>"><?= $banner->url ?></a><?php endif; ?></div>
										<div style="margin-top: 5px;">
											<a class="ui tiny icon button" href="<?= base_url('webadmin/cover/edit/' . $banner->id) ?>">
												<i class="edit icon"></i>แก้ไข
											</a>
											<a class="ui tiny icon button" href="<?= base_url('webadmin/cover/delete/' . $banner->id) ?>" onclick="return window.confirm('คุณต้องการลบ ?')">
												<i class="trash icon"></i>ลบ
											</a>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="text-center">
							<a class="ui red small button" href="<?= base_url('webadmin/cover/add') ?>">เพิ่ม</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('footer'); ?>
	</body>
	</html>