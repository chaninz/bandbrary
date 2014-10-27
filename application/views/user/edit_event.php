<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>แก้ไขตารางงาน | Bandbrary</title>
	<?php $this->load->view('header'); ?>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'; ?>">
	
	<style>
	.ui.accordion, .ui.accordion .accordion {
		font-size: 1em;
	}
	.center {
		background-color: #F7F6F6;
		padding: 20px;
		margin-top: 15px;
		-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
		box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
	}
	#event-add-btn {
		margin-left: 544px;
		margin-bottom: 15px;
		font-size: 0.8rem;
	}
	</style>
</head>
<body>
	<?php $this->load->view('navigation'); ?>
	<?php $this->load->view('user/cover'); ?>
	<section>
		<article>
			<div class="container">
				<div class="row">
					<?php $this->load->view('user/sidebar_left'); ?>
					<div class="col-xs-9">
						<div class="ui form segment">
							<form id="event-form" action="<?= base_url('event/user/edit/'.$event->id) ?>" method="post">
								<h3>แก้ไขตารางงาน</h3>
								<br/><p/>
								<div class="line"></div>
								<p/>
								<div class="field">
									<label>ชื่องาน</label>
									<input type="text" placeholder="" name="event" value="<?= $event->event ?>">
								</div>
								<div class="field">
									<label>สถานที่</label>
									<input type="text" name="venue" value="<?= $event->venue ?>"/>
								</div>
								<div class="field">
									<label>จังหวัด</label>
									<div class="ui labeled icon input">
										<div class="ui fluid selection dropdown">
											<div class="text">เลือก</div>
											<i class="dropdown icon"></i>
											<input type="hidden" name="province" value="<?= $event->province_id ?>">
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
									<textarea name="description"><?= $event->description ?></textarea>
								</div>
								<div class="two fields">
									<div class="date field">
										<label>วันที่</label>
										<div class="ui left labeled icon input">
											<i class="icon calendar"></i>
											<input type="text" placeholder="ปปปป-ดด-วว" name="date" id="date" value="<?= $event->date ?>"/>
										</div>
									</div>
									<div class="field">
										<label>เวลา</label>
										<div class="ui left labeled icon input">
											<input type="text" placeholder="ชม.นท" name="time" value="<?= mdate("%H:%i", strtotime($event->time)) ?>"/>
											<i class="time icon"></i>
										</div>
									</div>
								</div>
								<div class="line"></div>
								<p/>
								<div class="actions">
									<input id="add-event-button" class="ui ok small red submit button" type="submit" value="แก้ไข"/>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>



<?php $this->load->view('footer'); ?>
<script>
	$(function() {
		$( "#date" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd",
			// minDate: "Date()"
		});
	});
</script>
</body>
</html>