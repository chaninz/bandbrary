<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $user_profile->name . " " . $user_profile->surname ?> - ตารางงาน | Bandbrary</title>
	<?php $this->load->view('header'); ?>
	
	<style>
	.ui.accordion, .ui.accordion .accordion {
		font-size: 1em;
	}
	.center {
		background-color: #F7F6F6;
		padding: 20px;
		-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
		box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
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
								<a id="event-add-btn" class="ui red button mbtn event" href="<?= base_url('event/user/add') ?>">
									<i class="add icon"></i>
									เพิ่มกิจกรรม
								</a>
							<?php endif; ?>

							<div class="ui fluid accordion">
								<?php if ( ! empty($events)): ?>
									<div class="event-hea">
										<table>
											<tbody>
												<td class="eh1">วัน</td>
												<td class="eh2">เวลา</td>
												<td class="eh3">ชื่องาน</td>
											</tbody>
										</table>
									</div>
									<?php foreach ($events as $event): ?>
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
										<div class="content">
											รายละเอียด
											<?= $event->description ?>
											<p>
											<div><b>สถานที่:</b> <?= $event->venue ?></div>
											<div><b>จังหวัด:</b> <?= $event->province ?></div>
											<?php if ($this->session->userdata('id') == $user_profile->id && $event->event_id != 0): ?>
												<div style="margin-top: 20px">
													<a class="ui icon tiny button" href="<?= base_url('event/user/edit/'.$event->event_id) ?>">
														<i class="edit icon"></i>
														แก้ไข
													</a>
													<a class="ui icon tiny button" style="margin-left: 10px" href="<?= base_url('event/user/delete/'.$event->event_id) ?>" onclick="return window.confirm('คุณต้องการลบงานนี้ ?')">
														<i class="trash icon"></i>
														ลบ
													</a>
												</div>
												<!-- <a href="<?= base_url('event/user/edit/'.$event->event_id) ?>">แก้ไข</a>
												<a href="<?= base_url('event/user/delete/'.$event->event_id) ?>" onclick="return window.confirm('คุณต้องการลบงานนี้ ?')">ลบ</a> -->
											<?php endif; ?>
										</div>
									<?php endforeach; ?>
								<?php else: ?>
									<div class="text-center">ไม่มีข้อมูล</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<?php $this->load->view('footer'); ?>
	<script>
		// $(".create.modal").modal("setting", {
		// 	onApprove : function() {
		// 		return $("#event-form").form("validate form");
		// 	}
		// }).modal("attach events", ".mbtn.event", "show");

		$(function() {
			$( "#date" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
		});
	</script>
</body>
</html>