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
	.ui.modal {
		height: 470px;
	}
	.ui.modal > .header {
		font-size: 32px;
	}
	.ui.modal > .content {
		font-size: 22px;
	}
	.ui.modal .actions {
		padding: 1rem 0em;
	}
	.ui.textarea, .ui.form textarea {
		min-height: 0em;
	}
	.ui.form textarea, .ui.textarea {
		height: 11.4em;
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
					<div class="col-md-7">
						<div class="center"><?php if($this->session->userdata("band_id") == $band_profile->id): ?> 
							<div class="create-post test nin">
								<div id="create-post-button" class="ui icon button">
									<i class="add sign icon" style="font-size: 3.7rem; color: #D6D6D6;"></i>
								</div>
								<h4 style="color: #D6D6D6; margin-left: 40px; margin-top: 10px;">Create a post</h4>
							</div><?php endif; ?><?php foreach($posts as $post): ?>
							<div class="preview-post">
								<div class="post-date">
									<div class="post-day"><?= mdate("%d", strtotime($post->timestamp)) ?></div>
									<div class="post-month"><?= mdate("%M", strtotime($post->timestamp)) ?></div>
									<div class="post-white-line"></div>
								<!--	<div class="post-white-line"><?= mdate("%Y", strtotime($post->timestamp)) ?></div> -->
								</div>
								<div class="post-heading"><?= $post->topic ?></div>
								<div class="post-body"><?= $post->post ?></div>
								<div class="icon-comment">
									<i class="comment icon" style=" color: #E72A30; font-size: 1em; float:left; margin-top: 3px;"></i>
									<!-- <div class="amount-comment">$post->count</div> -->
								</div>
							</div><?php endforeach; ?>
						</div>
					</div>
					<div class="col-md-2">
						<div class="advt"></div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<!--Modal semantic-->

	<!--Create post modal-->
	<div class="ui form segment create modal">
		<i class="close icon"></i>
		<form action="<?= base_url('band/post/add?ref='.uri_string()) ?>" method="post">
			<h3>Create a Post</h3>
			<div class="line"></div>
			<p/>
			<div class="field">
				<label>Title</label>
				<input type="text" placeholder="" name="topic" required>
			</div>
			<div class="line"></div>
			<p/>
			<div class="field">
				<label>Description</label>
				<textarea name="post"></textarea>
			</div>
			<div class="field">
				<label>Profile Photo</label>
				<input type="file" name="image_url">
			</div>
			<div class="line"></div>
			<p/>
			<div class="actions">
				<div class="ui button">cancel</div>
				<input type="submit" class="ui red submit button" value="Create Post">
			</div>
		</form>
	</div>

	<?php $this->load->view('footer'); ?>
	<script>
	$('.create.modal')
	.modal('attach events', '.test.nin', 'show');
	</script>
</body>
</html>