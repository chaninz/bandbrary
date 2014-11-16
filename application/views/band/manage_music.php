<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>จัดการเพลง | Bandbrary</title>
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
	<div id="bb-container" class="container" style="height: 650px;">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<h2 class="ui header">
					จัดการเพลงของวง
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
				<div class="ui form segment" style="text-align: center; padding-top: 40px; padding-bottom: 40px">
					<div class="field">
						<a href="<?php echo base_url('album/band/add'); ?>" ><input class="ui small black submit button" style="margin-bottom: 10px;" type="submit" value="สร้างอัลบั้มใหม่"> </a>
						<p>คุณสามารถสร้างอัลบั้มก่อน แล้วจึงเพิ่มเพลงทีหลัง</p>
					</div>
					<div class="ui horizontal icon divider" style="margin-top: 30px; margin-bottom: 30px;">
						<i class="music icon"></i>
					</div>
					<div class="field">
						<a href="<?php echo base_url('music/band/add'); ?>" ><input class="ui small red submit button" style="margin-bottom: 10px;" type="submit" value="อัพโหลดเพลง"></a>
						<p>
							ขนาดสูงสุดไม่เกิน 25MB / ไฟล์<br/>
							สกุลไฟล์ที่รองรับ : MP3<br/>
						</p>
					</div>
				</div>
				<div class="col-xs-3"></div>
			</div>
		</div>
	</div>

		<?php $this->load->view('footer'); ?>
	</body>
	</html>