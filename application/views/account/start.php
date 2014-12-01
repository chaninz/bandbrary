<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ข้อมูลสมาชิก | Bandbrary</title>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/arimo.css'; ?>">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.cus.css'; ?>">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/semantic.css'; ?>">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/bandbrary.css'; ?>">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'; ?>">
	<script src="<?php echo base_url().'assets/js/jquery.min.js'; ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.min.js') ?>"></script>
	<script src="<?php echo base_url().'assets/js/jquery.address.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/semantic.js'; ?>"></script>
	<script>
	$(function() {
		$( "#dob" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd",
			minDate: "-100Y",
			maxDate: "-12Y"
		});
	});
	</script>

	<style>
	html, body {
		font-size: 15px;
	}
	body {
		width: 100%;
		display: table;
	}
	header {
		background-color: #E72A30;
		width: 100%;
		height: 40px;
		z-index: 1000;
		position: fixed;
		-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
		box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
	}
	.ui.label {
		text-transform: none;
	}
	.text-bold {
		font-weight: bold;
	}
	.col-centered {
		display: inline-block;
		float: none;
		/* reset the text-align */
		text-align: left;
		/* inline-block space fix */
		margin-right: -4px;
	}
	.content-wrapper {
		background-color: #FFFFFF;
		padding-top: 80px;
		text-align: center;
		border-left: 1px solid rgba(0,0,0,0.1);
		border-right: 1px solid rgba(0,0,0,0.1);
	}
	.content {

	}
	.bb-logo {
		text-align: center;
		margin-left: 0px;
	}
	#biography {
		height: initial;
	}
	</style>

</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<div class="bb-logo col-centered">
						<img src="<?php echo base_url().'images/bandbrary_logo_16-9.png'; ?>">
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row text-center">
			<div class="content-wrapper col-xs-10 col-centered">
				<div class="col-xs-8 col-centered">
					<div class="content col-xs-10">
						<h2>ข้อมูลสมาชิก</h2>
						<h4>ข้อมูลทั่วไป<div class="line"></div></h4>
						<form class="initial-form" action="start" method="post">
							<div class="ui form">
								<div class="two fields">
									<div class="field">
										<label>ชื่อ</label>
										<div class="ui labeled icon input">
											<input type="text" name="name"/>
											<div class="ui corner label">
												<i class="icon asterisk"></i>
											</div>
										</div>
									</div>
									<div class="field">
										<label>นามสกุล</label>
										<div class="ui labeled icon input">
											<input type="text" name="surname"/>
											<div class="ui corner label">
												<i class="icon asterisk"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="date field">
									<label>วันเกิด</label>
									<div class="ui left labeled icon input">
										<i class="icon calendar"></i>
										<input type="text" placeholder="ปปปป-ดด-วว" name="dob" id="dob"/>
										<div class="ui corner label">
											<i class="icon asterisk"></i>
										</div>
									</div>
								</div>
								<div class="field">
									<label>จังหวัด</label>
									<div class="ui labeled icon input">
										<div class="ui fluid selection dropdown">
											<div class="text">เลือก</div>
											<i class="dropdown icon"></i>
											<input type="hidden" name="province">
											<div class="menu"><?php if (! empty($provinces)): foreach ($provinces as $province): ?>
												<div class="item" data-value="<?= $province->id ?>" style="font-size: 14px;"><?= $province->province ?></div><?php endforeach; endif; ?>
											</div>
										</div>
										<div class="ui corner label" style="top: 0px; right: 0px;">
											<i class="icon asterisk"></i>
										</div>
									</div>
								</div>
								<div class="field">
									<label>ประวัติ</label>
									<textarea id="biography" name="biography"></textarea>
								</div>
								<div class="field">
									<label>Facebook</label>
									<div class="ui left labeled icon input">
										<input type="text" placeholder="facebook.com/bandbrary" name="fburl">
										<i class="facebook icon"></i>
									</div>
								</div>
								<div class="field">
									<label>Twitter</label>
									<div class="ui left labeled icon input">
										<input type="text" placeholder="twitter.com/bandbrary" name="twurl">
										<i class="twitter icon"></i>
									</div>
								</div>
								<div class="field">
									<label>Youtube</label>
									<div class="ui left labeled icon input">
										<input type="text" placeholder="youtube.com/user/bandbrary" name="yturl">
										<i class="youtube icon"></i>
									</div>
								</div><?php if ($this->session->userdata('user_type') == 2): ?>
								<h4>ข้อมูลด้านดนตรี<div class="line"></div></h4>
								<div class="field">
									<label>สไตล์ *</label>
									<input type="hidden" data-validate="style"/>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="1">
												<label>บลูส์</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" alue="2"> 
												<label>คันทรี</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="3">
												<label>ฮิปฮอป</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="4">
												<label>แจ๊ส</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="5">
												<label>ลาติน</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="6">
												<label>ป็อป</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="7">
												<label>เร้กเก้</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="8">
												<label>อาร์แอนด์บี</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="style[]" data-validate="style" value="9">
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
												<input type="checkbox" name="skill[]" data-validate="skill" value="1">
												<label>ร้องเพลง</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="2">
												<label>กีตาร์</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="3">
												<label>เบส</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="4">
												<label>กลองชุด</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="5">
												<label>เปียโน</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="6">
												<label>คีย์บอร์ด</label>
											</div>
										</div>
									</div>
									<div class="ui three fields">
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="7">
												<label>แซกโซโฟน</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="8">
												<label>ทรัมเป็ต</label>
											</div>
										</div>
										<div class="field">
											<div class="ui checkbox">
												<input type="checkbox" name="skill[]" data-validate="skill" value="9">
												<label>ไวโอลิน</label>
											</div>
										</div>
									</div>
								</div><?php endif; ?>
								<div class="field text-center">
									<div id="initial-button" class="ui red submit button">บันทึก</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('footer'); ?>

</body>
</html>
