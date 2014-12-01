<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>แก้ไขข้อมูลวงดนตรี | Bandbrary</title>

	<?php $this->load->view('header'); ?>

</head>
<style>
body {
	background: #FFFFFF;
}
footer {
		margin-top: 0px;
}
.col-xs-2 {
	background-color: #FFFFFF;
}
.col-xs-3 {
	height: 1170px;
	float: left;
	background-color: #f7f7f7;
	border-left: 1px solid #C0C0C0;
	border-right: 1px solid #C0C0C0;
	-webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
	-moz-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
	box-shadow: 0 1px 0px rgba(0,0,0,0.05);
	background-color: #F7F6F6 ;
	padding-left: 0px;
	padding-right: 0px;
}
.col-xs-7 {
	padding-left: 10px;
	padding-right: 0px;
	border: 0px solid #FFFFFF;
}
.ui.form.segment {
	padding-top: 100px;
}
.ui.vertical.menu {
	width: 15.2rem;
	border-radius: 0px;
	padding-top: 80px;
}
.ui.vertical.menu > .active.item {
	box-shadow: 0em 0 0 inset;
}
.ui.vertical.pointing.menu > .active.item:after {
	border-top: 0px;
	border-right: 0px;
	border-left: 1px solid #C0C0C0;;
	margin-top: -.4em;
	left: 28.9rem;
}
.ui.pointing.menu > .active.item:after {
	background-color: #FFFFFF;
	width: .8em;
	height: .8em;
}
.ui.menu {
	background-color: #F7F6F6;
}
.ui.menu .item {
	padding: 1em 1em;
}
.ui.form.segment{
	-webkit-box-shadow: none;
	box-shadow: none;
}
</style>
<body>
	<?php $this->load->view('navigation'); ?>

	<div class="container">
		<div class="row">
			<?php $this->load->view('account/sidebar_left'); ?>
			<div class="col-xs-7">
				<form action="<?= base_url('band/edit') ?>" method="post" enctype="multipart/form-data">
					<div class="ui form segment"><p>
						<h2 class="ui header">แก้ไขข้อมูลวงดนตรี</h2>
						<div class="line"></div><br><p>
						<div class="field">
							<label>ชื่อวงดนตรี</label>
							<input type="text" placeholder="" name="name" style="background-color: #EBEBEB;" value="<?= $band->name ?>" disabled> 
						</div>
						<div class="field">
							<label>ประวัติ</label>
							<textarea name="biography" <?= $this->session->userdata('is_master') == 1 ? '' : 'readonly' ?>><?= $band->biography ?></textarea>
						</div>
						<div class="field">
							<label>จังหวัด</label>
							<div class="ui fluid selection dropdown">
								<div class="text">Select</div>
								<i class="dropdown icon"></i>
								<input type="hidden" name="province" value="<?= $band->province_id; ?>" >
								<div class="menu"><?php if ( ! empty($provinces)): foreach ($provinces as $province): ?>
									<div class="item" data-value="<?= $province->id ?>" style="font-size: 14px;"><?= $province->province ?></div><?php endforeach; endif; ?>
								</div>
							</div>
						</div>
						<div class="field">
							<label>รูปโปรไฟล์</label>
							<?php if($band->photo_url): ?>
								<img src="<?= base_url('uploads/profile/band/thumb/'.$band->photo_url) ?>" alt="" id="img-preview"/>
							<?php else: ?>
								<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" id="img-preview"/>
							<?php endif; ?>
							<div class="ui selection dropdown" style="margin-left: 10px;">
								<div class="default text"><b>เปลี่ยนรูปโปรไฟล์</b></div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="file-upload item" data-value="2" style="font-size: 14px;">อัพโหลดรูป<input class="upload" type="file" id="profile-photo" name="profile-photo"></div>
									<div class="item" data-value="1" style="font-size: 14px;">ลบ</div>
								</div>
								<input type="hidden" name="profile-photo-upload" value="0"/>
							</div><?php if ( ! empty($msg_photo)): ?>
							<div><?= $msg_photo ?></div><?php endif; ?>
						</div>
						<div class="field">
							<label>รูปภาพปก</label>
							<?php if($band->cover_url): ?>
								<img src="<?= base_url('uploads/cover/band/thumb/'.$band->cover_url) ?>" alt="" id="img-preview">
							<?php else: ?>
								<img src="<?= base_url('images/no_image.jpg') ?>" alt="" id="img-preview"/>
							<?php endif; ?>
							<div class="ui selection dropdown" style="margin-left: 10px;">
								<div class="default text"><b>เปลี่ยนรูปภาพปก</b></div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="file-upload item" data-value="2" style="font-size: 14px;">อัพโหลดรูป<input class="upload" type="file" id="cover-photo" name="cover-photo"></div>
									<div class="item" data-value="1" style="font-size: 14px;">ลบ</div>
								</div>
								<input type="hidden" name="cover-photo-upload" value="0"/>
							</div><?php if ( ! empty($msg_cover)): ?>
							<div><?= $msg_cover ?></div><?php endif; ?>
						</div>
						<div class="field">
							<label>สไตล์</label>
							<div class="ui three fields">
								<div class="field">
									<div class="ui radio checkbox">
										<input type="radio" name="style" data-validate="style" value="1" <?= $band->style_id == 1 ? 'checked' : '' ?> />
										<label>บลูส์</label>
									</div>
								</div>
								<div class="field">
									<div class="ui radio checkbox">
										<input type="radio" name="style" data-validate="style" value="2" <?= $band->style_id == 2 ? 'checked' : '' ?> /> 
										<label>คันทรี</label>
									</div>
								</div>
								<div class="field">
									<div class="ui radio checkbox">
										<input type="radio" name="style" data-validate="style" value="3" <?= $band->style_id == 3 ? 'checked' : '' ?> />
										<label>ฮิปฮอป</label>
									</div>
								</div>
							</div>
							<div class="ui three fields">
								<div class="field">
									<div class="ui radio checkbox">
										<input type="radio" name="style" data-validate="style" value="4" <?= $band->style_id == 4 ? 'checked' : '' ?> />
										<label>แจ๊ส</label>
									</div>
								</div>
								<div class="field">
									<div class="ui radio checkbox">
										<input type="radio" name="style" data-validate="style" value="5" <?= $band->style_id == 5 ? 'checked' : '' ?> />
										<label>ลาติน</label>
									</div>
								</div>
								<div class="field">
									<div class="ui radio checkbox">
										<input type="radio" name="style" data-validate="style" value="6" <?= $band->style_id == 6 ? 'checked' : '' ?> />
										<label>ป็อป</label>
									</div>
								</div>
							</div>
							<div class="ui three fields">
								<div class="field">
									<div class="ui radio checkbox">
										<input type="radio" name="style" data-validate="style" value="7" <?= $band->style_id == 7 ? 'checked' : '' ?> />
										<label>เร้กเก้</label>
									</div>
								</div>
								<div class="field">
									<div class="ui radio checkbox">
										<input type="radio" name="style" data-validate="style" value="8" <?= $band->style_id == 8 ? 'checked' : '' ?> />
										<label>อาร์แอนด์บี</label>
									</div>
								</div>
								<div class="field">
									<div class="ui radio checkbox">
										<input type="radio" name="style" data-validate="style" value="9" <?= $band->style_id == 9 ? 'checked' : '' ?> />
										<label>ร็อก</label>
									</div>
								</div>
							</div>
						</div>
						<div class="field">
							<label>Facebook URL</label>
							<div class="ui left labeled icon input">
								<input type="text" placeholder="Facebook URL" name="fburl" value="<?= $band->fb_url ?>" <?= $this->session->userdata('is_master') == 1 ? '' : 'readonly' ?>>
								<i class="facebook icon"></i>
							</div>
						</div>
						<div class="field">
							<label>Twitter URL</label>
							<div class="ui left labeled icon input">
								<input type="text" placeholder="Twitter URL" name="twurl" value="<?= $band->tw_url ?>" <?= $this->session->userdata('is_master') == 1 ? '' : 'readonly' ?>>
								<i class="twitter icon"></i>
							</div>
						</div>
						<div class="field">
							<label>Youtube URL</label>
							<div class="ui left labeled icon input">
								<input type="text" placeholder="Youtube URL" name="yturl" value="<?= $band->yt_url ?>" <?= $this->session->userdata('is_master') == 1 ? '' : 'readonly' ?>>
								<i class="youtube icon"></i>
							</div>
						</div>
						<br><p><div class="line"></div><p>
						<?php if ($this->session->userdata('is_master') == 1): ?>
						<input type="submit" class="ui red submit button" value="บันทึก"/>
					<?php endif; ?>
				</div>
			</form>
		</div>
		<div class="col-xs-2"></div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>