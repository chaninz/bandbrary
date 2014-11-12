<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
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
	<?php $this->load->view('band/cover'); ?>
	<section>
		<article>
			<div class="container">
				<div class="row">
					<?php $this->load->view('band/sidebar_left'); ?>
					<div class="col-xs-9">
						<div class="center">
							<?php if ($this->session->userdata('band_id') == $band_profile->id): ?>
							<a id="event-add-btn" class="ui red button test event">
								<i class="add icon"></i>
								เพื่มกิจกรรม
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
									<?php if ($this->session->userdata('id') == $band_profile->id && $event->event_id != 0): ?>
										<a href="<?= base_url('event/band/edit/'.$event->event_id) ?>">แก้ไข</a>
										<a href="<?= base_url('event/band/delete/'.$event->event_id) ?>">ลบ</a>
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
		</div>
	</article>
</section>

<!--Add event modal-->
<div class="ui form segment create modal">
	<form action="<?= base_url('event/band/add?ref='.uri_string()) ?>" method="post">
		<h3>เพิ่มกิจกรรม</h3>
		<br/><p/>
		<div class="line"></div>
		<p/>
		<div class="field">
			<label>ชื่องาน</label>
			<input type="text" placeholder="" name="event">
		</div>
		<div class="field">
			<label>จังหวัด</label>
			<div class="ui fluid selection dropdown">
				<div class="text">ตัวเลือก</div>
				<i class="dropdown icon"></i>
				<input type="hidden" name="venue">
				<div class="menu">
					<div class="item" data-value="Bangkok" style="font-size: 14px;">กรุงเทพมหานคร</div>
					<div class="item" data-value="Changmai" style="font-size: 14px;">เชียงใหม่</div>
				</div>
			</div>
		</div>
		<div class="line"></div>
		<p/>
		<div class="field">
			<label>คำอธิบาย</label>
			<textarea name="description" class="ckeditor"></textarea>
		</div>
		<div class="two fields">
			<div class="field">
				<label>วัน/เดือน/ปี</label>
				<div class="ui left labeled icon input">
					<input type="date" placeholder="" style="padding: .2em 1em;" name="start_date">
					<i class="calendar icon"></i>
				</div>
			</div>
			<div class="field">
				<label>เวลา</label>
				<input type="time" placeholder="" style="padding: .2em 1em;" name="start_time">
			</div>
		</div>
		<div class="line"></div>
		<p/>
		<div class="actions">
			<div class="ui small button">ยกเลิก</div>
			<input type="submit" class="ui small red submit button" value="เพิ่มกิจกรรม">
		</div>
	</form>
</div>

<?php $this->load->view('footer'); ?>
<script>
	$('.create.modal')
	.modal('attach events', '.test.event', 'show');
</script>
</body>
</html>