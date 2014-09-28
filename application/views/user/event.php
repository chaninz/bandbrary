<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>
	
	<style>
	a.list-group-item.active > .badge, .nav-pills > .active > a > .badge {
		color: #E72A30;
	}
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
					<div class="col-xs-7">
						<div class="center">
							<div class="ui fluid accordion">
								<div class="event-hea">
									<table>
										<tbody>
											<td class="eh1">DATE</td>
											<td class="eh2">TIME</td>
											<td class="eh3">EVENT</td>
										</tbody>
									</table>
								</div><?php foreach ($events as $event): ?>
								<div class="title">
									<i class="dropdown icon" style="float: left"></i>
									<table>
										<tbody>
											<td class="eh4"><?= mdate("%d %M %Y", strtotime($event->start_time)) ?></td>
											<td class="eh5"><?= mdate("%H:%i", strtotime($event->start_time)) ?></td>
											<td class="eh6"><?= $event->event ?></td>
										</tbody>
									</table>
								</div>
								<div class="content">
								</div><?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="col-xs-2">
						<div class="advt"></div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<?php $this->load->view('footer'); ?>
	<script>
	$('.ui.accordion')
	.accordion()
	;
	</script>
</body>
</html>