<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
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
						<div class="center">
							<?php if ($this->session->userdata('id') == $user_profile->id): ?>
								<a id="event-add-btn" class="ui red button mbtn event">
									<i class="edit icon"></i>
									เพิ่มกิจกรรม
								</a>
							<?php endif; ?>
						<div class="ui fluid accordion">
							<div class="event-hea">
								<table>
									<tbody>
										<td class="eh1">วัน</td>
										<td class="eh2">เวลา</td>
										<td class="eh3">ชื่องาน</td>
									</tbody>
								</table>
							</div>
							<?php if ( ! empty($events)): foreach ($events as $event): ?>
								<div class="title">
									<i class="dropdown icon" style="float: left"></i>
									<table>
										<tbody>
											<td class="eh4"><?= mdate("%d/%n/%Y", strtotime($event->date)) ?></td>
											<td class="eh5"><?= mdate("%H:%i", strtotime($event->time)) ?></td>
											<td class="eh6"><?= $event->event ?></td>
										</tbody>
									</table>
								</div>
								<div class="content">รายละเอียด
									<?= $event->description ?>
									<div>สถานที่: <?= $event->venue ?></div>
									<div>จังหวัด: <?= $event->province ?></div>
									<?php if ($this->session->userdata('id') == $user_profile->id && $event->event_id != 0): ?>
										<a href="<?= base_url('event/user/edit/'.$event->event_id) ?>">แก้ไข</a>
										<a href="<?= base_url('event/user/delete/'.$event->event_id) ?>">ลบ</a>
									<?php endif; ?>
								</div>
								<?php endforeach; ?>
								<?php else: ?>
									<table>
										<tbody>
											<td class="eh5" colspan="3">ไม่มีข้อมูล</td>
										</tbody>
									</table>
							<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>

<!--Add event modal-->
<div class="ui form segment create modal">
	<form id="event-form" action="<?= base_url('event/user/add') ?>" method="post">
		<h3>เพิ่มกิจกรรม</h3>
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
					<input type="text" placeholder="ปปปป-ดด-วว" name="date" id="date"/>
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
		<div class="line"></div>
		<p/>
		<div class="actions">
			<div id="add-event-button" class="ui ok small red submit button">เพิ่มกิจกรรม</div>
			<div class="ui cancel small button">ยกเลิก</div>
		</div>
	</form>
</div>

<?php $this->load->view('footer'); ?>
<script>
	$(".create.modal").modal("setting", {
		onApprove : function() {
			return $("#event-form").form("validate form");
		}
	}).modal("attach events", ".mbtn.event", "show");

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