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
	.ui.segment {
		padding: 2em;
	}
	.ui.form textarea, .ui.textarea {
		height: 11.4em;
		border-radius: 0px;
	}
	.ui.modal {
		height: 500px;
	}
	.ui.modal > .header {
		font-family: 'TH sarabunPSK';
		font-size: 32px;
	}
	.ui.modal > .content {
		font-family: 'TH sarabunPSK';
		font-size: 22px;
	}
	.ui.comments .comment .actions {
		text-align: left;
	}
	.ui.modal .actions {
		padding: 1rem 0em;
	}
	.ui.comments .reply.form textarea {
		height: 5em;
	}
	.ui.textarea, .ui.form textarea {
		min-height: 0em;
	}
	.ui.comments .comment .reply.form {
		margin:0em;
	}
	.ui.comments .reply.form {
		max-width: 96%;
	}
	.ui.accordion, .ui.accordion .accordion {
		font-size: 1em;
	}
	.center {
		background-color: #F7F6F6;
		padding: 20px;
		margin-top: 15px;
	}
	.event-hea {
		padding: 10px;
		font-size: 16px;
	}
	.eh1 {
		color: #D95C5C;
		font-weight: bold;
		padding-left: 35px;
	}
	.eh2 {
		padding-left: 55px;
		font-weight: 400;
	}
	.eh3 {
		padding-left: 55px;
		font-weight: bold;
	}
	.eh4 {
		color: #D95C5C;
		font-weight: bold;
	}
	.eh5 {
		padding-left: 14px;
		font-weight: 400;
	}
	.eh6 {
		padding-left: 18px;
		font-weight: bold;
	}
	#greedd {
		left: 985px;
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
</body>
</html>