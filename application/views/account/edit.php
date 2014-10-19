<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>แก้ไขข้อมูลส่วนตัว | Bandbrary</title>
	<?php $this->load->view('header'); ?>  
	<style>
	.col-xs-2 {
		height: 1370px;
		background-color: #FFFFFF;
	}
	.col-xs-3 {
		height: 1370px;
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
		padding-left: 0px;
		padding-right: 0px;
		border: 0px solid #FFFFFF;
	}
	.ui.form.segment {
		height: 1370px;
		padding-top: 100px;
	}
	.ui.vertical.menu {
		width: 16.2rem;
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
		font-size: 1rem;
		padding: 1em 1em;
	}
	.ui.form.segment{
		-webkit-box-shadow: none;
		box-shadow: none;
	}
	.line {
		width: 700px;
	}
	.footmix {
		margin-top: 0px;
	}
	</style>
</head>
<body>
	<?php $this->load->view('navigation'); ?>

	<div class="container">
		<div class="row">
			<?php $this->load->view('account/sidebar_left'); ?>
			<div class="col-xs-7">
				<form id="edit-account" action="<?= base_url('account/edit') ?>" method="post" enctype="multipart/form-data">
					<div class="ui form segment">
						<p/>
						<h2>แก้ไขข้อมูลส่วนตัว</h2>
						<div class="line"></div>
						<br/><p/>
						<div class="field">
							<label>ชื่อผู้ใช้</label>
							<div class="ui left labeled icon input">
								<input type="text" value="<?= $user->username; ?>" disabled/>
								<i class="user icon"></i>
							</div>
						</div>
						<div class="field">
							<label>อีเมล</label>
							<div class="ui left labeled icon input">
								<input type="email" value="<?= $user->email; ?>" disabled/>
								<i class="mail icon"></i>
							</div>
						</div>
						<div class="two fields">
							<div class="field">
								<label>ชื่อ</label>
								<input type="text" name="name" value="<?= $user->name; ?>"/>
							</div>
							<div class="field">
								<label>นามสกุล</label>
								<input type="text" name="surname" value="<?= $user->surname; ?>" required>
							</div>
						</div>
						<div class="field">
							<label>จังหวัด</label>
							<div class="ui fluid selection dropdown">
								<div class="text">Select</div>
								<i class="dropdown icon"></i>
								<input type="hidden" name="province" value="<?= $user->province_id; ?>" >
								<div class="menu"><?php if ( ! empty($provinces)): foreach ($provinces as $province): ?>
									<div class="item" data-value="<?= $province->id ?>" style="font-size: 14px;"><?= $province->province_th ?></div><?php endforeach; endif; ?>
								</div>
							</div>
						</div>
						<div class="field">
							<label>ประเภทผู้ใช้</label>
							<div class="ui large buttons" style="display: inline-block;">
									<div class="ui button <?= $user->user_type == 1 ? 'active' : 'disabled' ?>" data-value="1"><i class="headphones icon"></i>ผู้ฟัง</div>
									<input type="hidden" id="user-type" name="user-type" value="<?= $user->user_type ?>"/>
									<div class="ui button <?= $user->user_type == 2 ? 'active' : '' ?>" data-value="2"><i class="unmute icon"></i>นักดนตรี</div>
							</div>
							<div>* เมื่อเปลี่ยนประเภทผู้ใช้เป็นนักดนตรีแล้วจะไม่สามารถกลับมาเป็นผู้ฟังได้</div>
						</div>
						<div class="line"></div>
						<p/>
						<div class="field">
							<label>รูปโปรไฟล์</label><?php if($user->photo_url): ?>
							<img src="<?= base_url('uploads/images/profile/thumb/'.$user->photo_url) ?>" alt="" id="img-preview"/><?php else: ?>
							<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" id="img-preview"/><?php endif; ?>
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
							<img src="<?= base_url('uploads/images/cover/thumb/'.$user->cover_url) ?>" alt="" id="img-preview">
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
						<div class="field" >
							<label>ประวัติ</label>
							<textarea name="biography"><?php echo $user->biography; ?></textarea>
						</div>
						<div class="line"></div>
						<p/>
						<div class="field">
							<label>Facebook</label>
							<div class="ui left labeled icon input">
								<input type="text" placeholder="Facebook URL" name="fburl" value="<?php echo $user->fb_url; ?>">  
								<i class="facebook icon"></i>
							</div>
						</div>
						<div class="field">
							<label>Twitter</label>
							<div class="ui left labeled icon input">
								<input type="text" placeholder="Twitter URL" name="twurl" value="<?php echo $user->tw_url; ?>">
								<i class="twitter icon"></i>
							</div>
						</div>
						<div class="field">
							<label>Youtube</label>
							<div class="ui left labeled icon input">
								<input type="text" placeholder="Youtube URL" name="yturl" value="<?php echo $user->yt_url; ?>">
								<i class="youtube icon"></i>
							</div>
						</div>
						<?php if ($this->session->userdata('user_type') == 2): ?>
								<h4>ข้อมูลด้านดนตรี<div class="line"></div></h4>
								<div class="field">
									<label>สไตล์ *</label>
									<input type="hidden" data-validate="style"/>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="1" <?= ! empty($styles[1]) ? 'checked' : '' ?> />
												<label>บลูส์</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="2" <?= ! empty($styles[2]) ? 'checked' : '' ?> /> 
												<label>คันทรี</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="3" <?= ! empty($styles[3]) ? 'checked' : '' ?> />
												<label>ฮิปฮอป</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="4" <?= ! empty($styles[4]) ? 'checked' : '' ?> />
												<label>แจ๊ส</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="5" <?= ! empty($styles[5]) ? 'checked' : '' ?> />
												<label>ลาติน</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="6" <?= ! empty($styles[6]) ? 'checked' : '' ?> />
												<label>ป็อป</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="7" <?= ! empty($styles[7]) ? 'checked' : '' ?> />
												<label>เร้กเก้</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="8" <?= ! empty($styles[8]) ? 'checked' : '' ?> />
												<label>อาร์แอนด์บี</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="9" <?= ! empty($styles[9]) ? 'checked' : '' ?> />
												<label>ร็อก</label>
											</div>
										</div>
									</div>
								</div>

								<div class="field groupped inline">
									<label>ความสามารถ *</label>
									<input type="hidden" data-validate="skill"/>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="1" <?= ! empty($skills[1]) ? 'checked' : '' ?> />
												<label>ร้องเพลง</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="2" <?= ! empty($skills[2]) ? 'checked' : '' ?> />
												<label>กีตาร์</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="3" <?= ! empty($skills[3]) ? 'checked' : '' ?> />
												<label>เบส</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="4" <?= ! empty($skills[4]) ? 'checked' : '' ?> />
												<label>กลองชุด</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="5" <?= ! empty($skills[5]) ? 'checked' : '' ?> />
												<label>เปียโน</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="6" <?= ! empty($skills[6]) ? 'checked' : '' ?> />
												<label>คีย์บอร์ด</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="7" <?= ! empty($skills[7]) ? 'checked' : '' ?> />
												<label>แซกโซโฟน</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="8" <?= ! empty($skills[8]) ? 'checked' : '' ?> />
												<label>ทรัมเป็ต</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="9" <?= ! empty($skills[9]) ? 'checked' : '' ?> />
												<label>ไวโอลิน</label>
											</div>
										</div>
									</div>
								</div><?php endif; ?>
						<div class="line"></div>

						<br/>
						<input class="ui red submit button" type="submit" value="บันทึก">
					</div> 
				</form>
			</div>
			<div class="col-xs-2"></div>
		</div>
	</div>

	<?php $this->load->view('footer'); ?>

	</body>
	</html>
