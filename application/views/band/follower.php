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
		height: 11.5em;
		border-radius: 0px;
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

					<div class="col-xs-7">
						<div class="center">
							<div class="ui five connected items"><?php foreach($followers as $follower): ?>
								<div class="item">
									<div class="image">
										<?php if($follower->photo_url): ?>
										<img src="<?= base_url().'uploads/profile/'.$follower->photo_url ?>"><?php else: ?>
										<img src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
										<a class="star ui corner label">
											<i class="star icon"></i>
										</a>
									</div>
									<div class="content">
										<div class="name"><a href="<?= base_url('user/'.$follower->username) ?>"><?= $follower->name.' '.$follower->surname ?></a></div>
										<p class="description"></p>
									</div>
								</div><?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<?php $this->load->view('footer'); ?>
</body>
</html>