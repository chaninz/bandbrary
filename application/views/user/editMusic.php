<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

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
	<?php $this->load->view('navigation'); ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<h2 class="ui header">
					แก้ไขเพลง
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
					<form action="<?php echo base_url().'music/user/edit/'.$music->id ?>"method="post">	
					<div class="field">
						<label>ชื่อเพลง</label>
						<input type="text" placeholder="" name="name" value="<?= $music->name ?>" readonly>
					</div>
					<div class="field">
						<label>เนื้อเพลง</label>
						<textarea name="lyric"><?= $music->lyric ?></textarea>
					</div>
					<div class="field">
						<label>เพลง</label>
						<input type="file" name="" value="" readonly>
					</div>
					<div class="field">
						<label>อัลบั้ม</label>
						<div class="ui fluid selection dropdown">
							<div class="text"><?= $albumMusic->name ?></div>
							<i class="dropdown icon"></i>
							<input type="hidden" name="album" value="<?= $music->album_id ?>" >
							<div class="menu"><?php if (! empty($albums)): foreach ($albums as $album): ?>
								<div class="item" data-value="<?= $album->id ?>" style="font-size: 14px;"><?= $album->name ?></div><?php endforeach; endif; ?>
							</div>
						</div>
					</div>
					<div class="field">
						<label>ลิขสิทธิ์</label>
						<div class="ui fluid selection dropdown">
							<div class="text">เลือก</div>
							<i class="dropdown icon"></i>
							<input type="hidden" name="license" value="<?= $music->license_type ?>">
							<div class="menu">
								<div class="item" style="font-size: 14px;" data-value="1" >ห้ามทำซ้ำ</div>
								<div class="item" style="font-size: 14px;" data-value="2" >ทำซ้ำได้</div>
								<div class="item" style="font-size: 14px;" data-value="3" >ดัดแปลงได้</div>
							</div>
						</div>
					</div>
					<div class="field">
						<label>ความเป็นส่วนตัว</label>
						<div class="grouped inline fields">
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="1" name="visibility" <?= $music->visibility == 1 ? 'checked' : '' ?>>
									<label>ส่วนตัว</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="2" name="visibility" <?= $music->visibility == 2 ? 'checked' : '' ?>>
									<label>สาธารณะ</label>
								</div>
							</div>
						</div>
					</div>
				</form>
				</div>
				<input class="ui small red submit button" style="float: right" type="submit" value="บันทึก">
				<div class="col-xs-3"></div>
			</div>
		</div>

		<?php $this->load->view('footer'); ?>

	</body>
	</html>