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
		background-color: #FFFFFF;
		padding: 20px;
		margin-top: 15px;
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
								<h2 class="ui black block header">First header</h2>
								<img class="ui medium image" src="/images/demo/photo.jpg" style="margin-left: 170px;"><br/>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
							</div>
							<div class="ui comments" style="margin-top: 20px;">
								<div class="comment">
									<a class="avatar">
										<img src="/images/demo/avatar.jpg">
									</a>
									<div class="content">
										<a class="author">Dog Doggington</a>
										<div class="metadata">
											<div class="date">2 days ago</div>
										</div>
										<div class="text">
											I think this is a great idea and i am voting on it
										</div>
										<div class="actions">
											<a class="reply">Reply</a>
											<a class="delete">Delete</a>
										</div>
									</div>
								</div>
								<div class="comment">
									<a class="avatar">
										<img src="/images/demo/avatar2.jpg">
									</a>
									<div class="content">
										<a class="author">Pawfin Dog</a>
										<div class="metadata">
											<div class="date">1 day ago</div>
										</div>
										<div class="text">
											I think this is a great idea and i am voting on it
										</div>
										<div class="actions">
											<a class="reply">Reply</a>
										</div>
									</div>
								</div>
								<form class="ui reply form">
									<div class="field">
										<textarea></textarea>
									</div>
									<div class="ui small button submit labeled icon">
										<i class="icon edit"></i> Add Comment
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<!--Create post modal-->
	<div class="ui form transition segment createpost modal">
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
	<div class="ui transition scrolling reportpost modal">
		<form action="<?= base_url().'report/post' ?>" method="post">
			<div class="header">
				ช่วยให้เราเข้าใจปัญหานี้
			</div>
			<div class="content">
				<div class="left">
				</div>
				<div class="right">
					<div class="ui header">ทำไมคุณจึงไม่ต้องการเห็นโพสต์นี้ ?</div>
					<div class="ui form">
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
					</div>
				</div>
			</div>
			<div class="actions">
				<div class="ui black small button">
					ยกเลิก
				</div>
				<input type="submit" class="ui red submit small button" value="ส่งรายงาน">
			</div>
		</form>
	</div>
	<script>
	
	$(".reportpost#postreport").click(function(){
		var id = $(this).attr("post-id");
		$('.postid').val(id);
	});
	</script>
	<?php $this->load->view('footer'); ?>

	
</body>
</html>