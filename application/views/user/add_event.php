<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เพิ่มกิจกรรม | Bandbrary</title>

	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'; ?>">
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
					เพิ่มกิจกรรม
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
				<form id="event-form" action="<?= base_url('event/user/add') ?>" method="post">
				<div class="ui form segment">
						<br/><p/>
						<div class="line"></div>
						<p/>
						<div class="field">
							<label>ชื่องาน</label>
							<input type="text" placeholder="" name="event">
						</div>
						<div class="field">
							<label>สถานที่</label>
							<input type="text" name="venue"/>
						</div>
						<div class="field">
							<label>จังหวัด</label>
							<div class="ui labeled icon input">
								<div class="ui fluid selection dropdown">
									<div class="text">เลือก</div>
									<i class="dropdown icon"></i>
									<input type="hidden" name="province">
									<div class="menu"><?php if (! empty($provinces)): foreach ($provinces as $province): ?>
										<div class="item" data-value="<?= $province->id ?>"><?= $province->province ?></div><?php endforeach; endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="line"></div>
						<p/>
						<div class="field">
							<label>รายละเอียด</label>
							<textarea name="description"></textarea>
						</div>
						<div class="two fields">
							<div class="date field">
								<label>วันที่</label>
								<div class="ui left labeled icon input">
									<i class="icon calendar"></i>
									<input type="text" placeholder="ปปปป-ดด-วว" name="date" id="date" />
								</div>
							</div>
							<div class="field">
								<label>เวลา</label>
								<div class="ui left labeled icon input">
									<input type="text" placeholder="ชม.นท" name="time"/>
									<i class="time icon"></i>
								</div>
							</div>
						</div>
						</div>
						<div class="ui ok small red submit button" style="float: right">เพิ่มกิจกรรม</div>
				</form>
				</div>
				<div class="col-xs-3"></div>
		</div>
	</div>
		<?php $this->load->view('footer'); ?>
	</body>
	</html>