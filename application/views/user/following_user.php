<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $user_profile->name . " " . $user_profile->surname ?> - คนที่กรี๊ด | Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
	.ui.menu .item {
		padding: 1em;
	}
	.follow-menu {
		width: 100%;
		margin-top: 20px;
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
								<a class="active item" href="<?= base_url().'user/'.$user_profile->username.'/following/user' ?>">
									<i class="user icon"></i> บุคคล
								</a>
								<a class="item" href="<?= base_url().'user/'.$user_profile->username.'/following/band' ?>">
									<i class="circle blank icon"></i> วงดนตรี
								</a>
							</div>
						</div>
					</div>

					<div class="col-xs-9">
						<div class="center">
							<div class="ui five connected items"><?php foreach($following_users as $following_user): ?>
								<div class="item">
									<div class="image">
										<?php if($following_user->photo_url): ?>
										<img src="<?= base_url().'uploads/profile/user/'.$following_user->photo_url ?>"><?php else: ?>
										<img src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
									</div>
									<div class="content">
										<div class="name"><a href="<?= base_url().'user/'.$following_user->username ?>"><?= $following_user->name.' '.$following_user->surname ?></a></div>
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