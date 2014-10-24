<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
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
		margin-top: 0px;
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
						<div class="center"><?php if($this->session->userdata("band_id") == $band_profile->id): ?> 
							<div class="create-post test nin">
								<div id="create-post-button" class="ui icon button">
									<i class="add sign icon" style="font-size: 3.1rem; color: #D6D6D6;"></i>
								</div>
								<div class="create-post-text">สร้างโพสต์</div>
							</div><?php endif; ?><?php foreach($posts as $post): ?>
							<div class="preview-post">
								<div class="post-date">
									<div class="post-day"><?= mdate("%d", strtotime($post->timestamp)) ?></div>
									<div class="post-month"><?= mdate("%M", strtotime($post->timestamp)) ?></div>
									<div class="post-white-line"></div>
									<!--	<div class="post-white-line"><?= mdate("%Y", strtotime($post->timestamp)) ?></div> -->
								</div>
								<div class="post-heading"><?= $post->topic ?></div>
								<div id="angle-bth" class="ui labeled icon top right pointing dropdown">
									<i class="angle down icon" style="margin: 0px;"></i>
									<div class="menu" style="margin-top: 0.4em; margin-right: -0.79em;">
										<div class="item">แก้ไขโพสต์</div>
										<div class="item">ลบ</div>
										<div class="item userreport post" id="postreport" post-id="<?= $post->id; ?>"> รายงานปัญหาโพสต์นี้</div>
									</div>
								</div>
								<div class="post-body"><?= $post->post ?></div>
								<div class="icon-comment">
									<i class="comment icon" style=" color: #E72A30; font-size: 1em; float:left; margin-top: 3px;"></i>
									<!-- <div class="amount-comment">$post->count</div> -->
								</div>
							</div><?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<!--Modal semantic-->

	<!--Create post modal-->
	<div class="ui form segment create modal">
		<form action="<?= base_url('band/post/add?ref='.uri_string()) ?>" method="post">
			<h3>สร้างโพสต์</h3>
			<br/><p/>
			<div class="line"></div>
			<p/>
			<div class="field">
				<label>ชื่อเรื่อง</label>
				<input type="text" placeholder="" name="topic" required>
			</div>
			<div class="line"></div>
			<p/>
			<div class="field">
				<label>คำอธิบาย</label>
				<textarea name="post" class="ckeditor"></textarea>
			</div>
			<div class="field">
				<label>รูปภาพประกอบ</label>
				<input type="file" name="image_url">
			</div>
			<div class="line"></div>
			<p/>
			<div class="actions">
				<div class="ui black small button">ยกเลิก</div>
				<input type="submit" class="ui red submit small button" value="โพสต์">
			</div>
		</form>
	</div>

	<!--Report post modal-->
	<div class="ui transition visible scrolling userreport modal">
		<div class="header">
			ช่วยให้เราเข้าใจปัญหานี้
		</div>
		<div class="content">
			<div class="left">
			</div>
			<div class="right">
				<div class="ui header">ทำไมคุณจึงไม่ต้องการเห็นโพสต์นี้ ?</div>
				<div class="ui form">
					<form action="<?= base_url().'report/post' ?>" method="post">
						<input type="hidden" name="postid" value="" class="postid">
						<div class="grouped inline fields">
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" name="type" value="1">
									<label>พบการใช้ถ้อยคำรุนแรงหรือไม่เหมาะคม</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" name="type" value="2">
									<label>โพสต์นี้น่ารำคาญหรือไม่น่าสนใจ</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" name="type" value="3">
									<label>ฉันคิดว่าโพสต์นี้ไม่ควรอยู่บน Bandbrary</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" name="type" value="4">
									<label>โพสต์นี้เป็นแสปม</label>
								</div>
							</div>
						</div>
						<div class="actions">
							<div class="ui black small button cancel">
								ยกเลิก
							</div>
							<input type="submit" class="ui red submit small button" value="โพสต์">
							ส่งรายงาน
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('footer'); ?>
	<script>
	$('.create.modal').modal('attach events', '.test.nin', 'show');
	$(".userreport#postreport").click(function(){
		$('.userreport.modal').modal('show');
		var id = $(this).attr("post-id");
		$('.postid').val(id);
	});
	$(".actions .cancel").click(function(){
		$('.userreport.modal').modal('hide');
	});
    </script>
</body>
</html>