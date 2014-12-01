<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ส่วนผู้ดูแลระบบ | Bandbrary</title>

	<?php $this->load->view('header'); ?>

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>

	<style> 
	.ui.avatar.image {
		width: 5em;
		height: 5em;
	}

	th {
		text-align: center;
	}

	</style>
	<body>
		<?php $this->load->view('navigation'); ?>

		<div class="container" style="padding-top: 120px">
			<div class="row">
				<div class="col-xs-3">
					<?php $this->load->view('sidebar_left'); ?>
				</div>
				<div class="col-xs-9">
					<div class="ui segment">
						<h3 class="ui header"><?= $header ?></h3>
						<hr style="margin-top: 0px" />
						<table class="ui table" id="report-table" style="border: 1px solid #d0d0d0">
							<thead>
								<tr>
									<th style="width: 15%">ชื่อเพลง</th>
									<th style="width: 15%">ศิลปิน</th>
									<th style="width: 25%">เหตุผล</th>
									<th style="width: 12%">ผู้รายงาน</th>
									<th style="width: 15%">สถานะ</th>
									<th style="width: 10%">...</th>
								</tr>
							</thead>
							<tbody>
								<?php if ( ! empty($reports)): ?>
									<?php foreach ($reports as $report): ?>
										<tr>
											<td>
												<?php if ($report->music_id != NULL): ?>
													<a href="<?= base_url('music/' . ($type == 1 ? 'user' : 'band') . '/view/' . $report->music_id) ?>" target="_blank"><?= $report->music_name ?></a>
												<?php else: ?>
													<?= $report->music_name ?>
												<?php endif; ?>
											</td>
											<td><?= $report->artist ?></td>
											<td><?= $report->reason ?></td>
											<td><a href="<?= base_url('user/' . $report->reporter_username) ?>" target="_blank"><?= $report->reporter ?></a></td>
											<td>
												<?php if ($report->music_id == NULL): ?>
													<a class="ui small red label">ลบแล้ว</a>
												<?php elseif ($report->status == 1): ?>
													<a class="ui small label">รอ</a>
												<?php elseif ($report->status == 2): ?>
													<a class="ui small green label">ผ่าน</a>
												<?php elseif ($report->status == 3): ?>
													<a class="ui small red label">ลบแล้ว</a>
												<?php endif; ?>
											</td>
											<td>
												<?php if ($report->status == 1 && $report->music_id != NULL): ?>
													<a href="<?= base_url('webadmin/music/' . ($type == 1 ? 'user' : 'band') . '/accept/' . $report->id) ?>"><i class="checkmark icon"></i></a>
													<a href="<?= base_url('webadmin/music/' . ($type == 1 ? 'user' : 'band') . '/delete/' . $report->id) ?>"><i class="remove icon"></i></a>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function(event){
				$('#report-table').DataTable();
			});
		</script>

		<?php $this->load->view('footer'); ?>
	</body>
	</html>