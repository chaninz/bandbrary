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
		margin-top: 15px;
	}
	#greedd {
		left: 985px;
	}
	.ui.menu .item {
		padding: 1em;
	}
	.follow-menu {
		width: 100%;
		margin-top: 14px;
		background-color: #FFFFFF;
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
					<div class="col-xs-3" style="padding-right: 0px">
						<div class="follow-menu">
							<div class="ui fluid vertical pointing menu">
								<a class="item" href="<?= base_url().'user/'.$user_profile->username.'/following/user' ?>">
									<i class="user icon"></i> บุคคล
								</a>
								<a class="active item" href="<?= base_url().'user/'.$user_profile->username.'/following/band' ?>">
									<i class="circle blank icon"></i> วงดนตรี
								</a>
							</div>
						</div>
					</div>

					<div class="col-xs-9">
						<div class="center">
							<div class="ui five connected items"><?php foreach($following_bands as $following_band): ?>
								<div class="item">
									<div class="image">
										<?php if($following_band->photo_url): ?>
										<img src="<?= base_url().'uploads/profile/user/'.$following_band->photo_url ?>"><?php else: ?>
										<img src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
										<a class="star ui corner label">
											<i class="star icon"></i>
										</a>
									</div>
									<div class="content">
										<div class="name"><a href="<?= base_url().'band/'.$following_band->id ?>"><?= $following_band->name ?></a></div>
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