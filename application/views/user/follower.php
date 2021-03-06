<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $user_profile->name . " " . $user_profile->surname ?> - คนตามกรี๊ด | Bandbrary</title>
	<?php $this->load->view('header'); ?>

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