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
					<div class="col-xs-9">
						<div class="center">
							<div class="ui five connected items"><?php foreach($followers as $follower): ?>
								<div class="item">
									<div class="image">
										<?php if($follower->photo_url): ?>
										<img src="<?= base_url().'uploads/profile/user/'.$follower->photo_url ?>"><?php else: ?>
										<img src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
										<a class="star ui corner label">
											<i class="star icon"></i>
										</a>
									</div>
									<div class="content">
										<div class="name"><a href="<?= base_url().'user/'.$follower->username ?>"><?= $follower->name.' '.$follower->surname ?></a></div>
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