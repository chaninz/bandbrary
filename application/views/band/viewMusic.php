<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>
	<style>
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
								<img class="ui medium image" src="<?= base_url().'uploads/images/post/'.$post->image_url ?>" style="margin-left: 170px;"><br/>
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
										<a class="author" href="<?= base_url('user/'.$comment->username) ?>"><?= $comment->name.' '.$comment->surname ?></a>
										<div class="metadata">
											<div class="date">
												<?= mdate("%d", strtotime($comment->timestamp)) ?> 
												<?= mdate("%M", strtotime($comment->timestamp)) ?> 
												<?= mdate("%Y", strtotime($comment->timestamp)) ?> 
											</div>
										</div>
										<div class="text">
											<?= $comment->comment ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							<form class="ui reply form" method="post" action="<?= base_url().'band/postcomment/add/'.$post->id ?>">
								<div class="field">
									<textarea name="comment" style="margin-left: 50px;"></textarea>
								</div>
								<input type="submit" class="ui small button submit" style="margin-left: 495px;" value="Comment" >
							</form>
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