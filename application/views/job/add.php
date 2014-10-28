<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'; ?>">
	<script>
	$(function() {
		$( "#date" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd",
			minDate: "Date()",
		});
	});
	</script>
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
					สร้างงาน
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
				<form id="add-job" action="<?php echo base_url().'job/add'; ?>" method="post"> 
					<div class="ui form segment">
						<div class="field">
							<label>เจ้าของงาน</label>
							<div class="ui fluid selection dropdown">
								<div class="text">เลือก</div>
								<i class="dropdown icon"></i>
								<input type="hidden" name=""/>
								<div class="menu">
									<div class="item" data-value="1">สมาชิก</div>
									<div class="item" data-value="2">วงดนตรี</div>
								</div>
							</div>
						</div>
						<div class="field">
							<label>ชื่องาน</label>
							<input type="text" name="name"/>
						</div>
						<div class="field">
							<label>ประเภท</label>
							<div class="ui fluid selection dropdown">
								<div class="text">เลือก</div>
								<i class="dropdown icon"></i>
								<input type="hidden" name="type"/>
								<div class="menu">
									<div class="item" data-value="1">คอนเสิร์ต</div>
									<div class="item" data-value="2">ร้านอาหาร</div>
									<div class="item" data-value="3">งานแต่งงาน</div>
								</div>
							</div>
						</div>
						<div class="field">
							<label>สไตล์</label>
							<div class="ui fluid selection dropdown">
								<div class="text">เลือก</div>
								<i class="dropdown icon"></i>
								<input type="hidden" name="style"/>
								<div class="menu">
									<div class="item" data-value="1">บลูส์</div>
									<div class="item" data-value="2">คันทรี</div>
									<div class="item" data-value="3">ฮิปฮอป</div>
									<div class="item" data-value="4">แจ๊ส</div>
									<div class="item" data-value="5">ลาติน</div>
									<div class="item" data-value="6">ป็อป</div>
									<div class="item" data-value="7">เร้กเก้</div>
									<div class="item" data-value="8">อาร์แอนด์บี</div>
									<div class="item" data-value="9">ร็อก</div>
								</div>
							</div>
						</div>
						<div class="field">
							<label>รายละเอียด</label>
							<textarea name="description"></textarea>
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
						<div class="field">
							<label>ค่าจ้าง (บาท/งาน)</label>					
							<input type="number" name="budget"/>
						</div>
						<div class="date field">
							<label>วันที่</label>
							<div class="ui left labeled icon input">
								<i class="icon calendar"></i>
								<input type="text" placeholder="ปปปป-ดด-วว" name="date" id="date"/>
							</div>
						</div>
							
							<div class="two fields">
								<div class="field">
									<label>เวลา</label>
									<div class="ui left labeled icon input">
										<input type="text" placeholder="ชม.นท" name="time"/>
										<i class="time icon"></i>
									</div>
								</div>
								<div class="field">
									<label>ระยะเวลา</label>
									<div class="ui fluid selection dropdown">
										<div class="text">เลือก</div>
										<i class="dropdown icon"></i>
										<input type="hidden" name="duration"/>
										<div class="menu">
											<div class="item" data-value="0.5">30 นาที</div>
											<div class="item" data-value="1">1 ชั่วโมง</div>
											<div class="item" data-value="1.5">1 ชั่วโมง 30 นาที</div>
											<div class="item" data-value="2">2 ชั่วโมง</div>
											<div class="item" data-value="2.5">2 ชั่วโมง 30 นาที</div>
											<div class="item" data-value="3">3 ชั่วโมง</div>
											<div class="item" data-value="3.5">3 ชั่วโมง 30 นาที</div>
											<div class="item" data-value="4">4 ชั่วโมง</div>
											<div class="item" data-value="4.5">4 ชั่วโมง 30 นาที</div>
											<div class="item" data-value="5">5 ชั่วโมง</div>
											<div class="item" data-value="5.5">5 ชั่วโมง 30 นาที</div>
											<div class="item" data-value="6">6 ชั่วโมง</div>
											<div class="item" data-value="0">มากกว่า 6 ชั่วโมง</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<input class="ui small red submit button" style="float: right;" type="submit" value="บันทึก">

					</div>
				</form>
			</div>
			<div class="col-xs-3"></div>
		</div>
	</div>
	<?php $this->load->view('footer'); ?>
</body>
</html>