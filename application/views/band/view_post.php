<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $post->topic ?> - <?= $band_profile->name ?> | Bandbrary</title>
	<?php $this->load->view('header'); ?>
	<style>
	#angle-bth {
		font-size: 1.3em;
		margin-top: 5px;
		margin-left: 2px;
		float: left;
		color: #929292;
	}
	.center {
		background-color: #FFFFFF;
		padding: 20px;
		-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
		box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
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
					<div class="col-md-9">
						<div class="center">
							<div class="ui vertical segment">
								<h2 class="ui black block header"><?= $post->topic ?></h2>
								<?php if ($post->image_url != NULL): ?>
									<img class="ui medium image" src="<?= base_url().'uploads/post/band/'.$post->image_url ?>" style="margin-left: 170px;"><br/>
								<?php endif; ?>
								<p><?= $post->post ?></p>
							</div>
							<div class="ui comments" style="margin-top: 20px;">
								<?php foreach($comments as $comment): ?>
									<div class="comment">
										<a class="avatar">
											<?php if($comment->photo_url): ?>
											<img src="<?= base_url().'uploads/profile/user/'.$comment->photo_url ?>"><?php else: ?>
											<img src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
										</a>
										<div class="content">
											<a class="author" href="<?= base_url('user/'.$comment->username) ?>"><b><?= $comment->name.' '.$comment->surname ?></b></a>
											<div class="metadata">
												<div class="date">
													<?= mdate("%d %M %Y", strtotime($comment->timestamp)) ?> 
												</div>
											</div>
											<div class="text">
												<?= $comment->comment ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								<form class="ui reply form" id="comment-form" method="post" action="<?= base_url().'band/postcomment/add/'.$post->id ?>">
									<div class="field">
										<textarea name="comment" id="comment-box" style="margin-left: 50px;"></textarea>
									</div>
									<input type="submit" class="ui small button submit" style="margin-left: 537px;" value="โพสต์" >
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	
	<?php $this->load->view('footer'); ?>
	
</body>
</html>