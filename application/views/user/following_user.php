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
		margin-top: 15px;
	}
	#greedd {
		left: 985px;
	}
	.ui.menu .item {
		font-size: 1.3rem;
		padding: 1em;
	}
	.follow-menu {
		width: 277px;
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
					<div class="col-xs-3">
						<div class="follow-menu">
							<div class="ui fluid vertical pointing menu">
								<a class="active item" href="<?= base_url().'user/'.$user_profile->username.'/following/user' ?>">
									<i class="user icon"></i> Member
								</a>
								<a class="item" href="<?= base_url().'user/'.$user_profile->username.'/following/band' ?>">
									<i class="circle blank icon"></i> Band
								</a>
							</div>
						</div>
					</div>

					<div class="col-xs-7">
						<div class="center">
							<div class="ui five connected items"><?php foreach($following_users as $following_user): ?>
								<div class="item">
									<div class="image">
										<img src="<?= base_url().'uploads/profile/'.$following_user->photo_url ?>">	
										<a class="star ui corner label">
											<i class="star icon"></i>
										</a>
									</div>
									<div class="content">
										<div class="name"><a href="<?= base_url().'user/'.$following_user->username ?>"><?= $following_user->name.' '.$following_user->surname ?></a></div>
										<p class="description"></p>
									</div>
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