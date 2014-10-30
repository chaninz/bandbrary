<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
	#status-item {
		min-height: 150px;
		width: 311px;
		margin: 5px 5px 0px 0px;
	}
	</style>
</head>
<body>
	<?php $this->load->view('navigation'); ?>
	<?php $this->load->view('user/cover'); ?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12" style="padding-top: 20px">
				<div class="ui items">
					<?php foreach($statuss as $status): ?>
					<div id="status-item" class="item">
						<div class="content">
							<div class="meta"><?= $status->timestamp ?></div>
							<!-- <div class="name">Cute Dog</div> -->
							<p class="description" style="margin-top: 20px"><?= $status->status ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>

</body>
</html>