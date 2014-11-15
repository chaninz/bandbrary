<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

	<?php $this->load->view('header'); ?>


	<style> 
	.ui.avatar.image {
		width: 5em;
		height: 5em;
	}
	</style>

	<body>
		<div class="container" style="margin-top: 120px">
			<div class="row">
				<div class="col-xs-3">
					<div class="ui fluid vertical pointing menu">
						<a class="active item" id="searchusers">
							<i class="user icon"></i> ผู้ใช้
						</a>
						<a class="item" id="searchbands">
							<i class="circle blank icon"></i> วงดนตรี
						</a>
						<a class="item" id="searchmusics">
							<i class="music icon"></i> เพลง
						</a>
						<a class="item" id="searchalbums">
							<i class="folder outline icon"></i> อัลบั้ม
						</a>
					</div>
				</div>
				<div class="col-xs-9">
					<div class="ui segment" style="padding: 0px">
						<h3 class="ui header" style="padding-top: 20px; margin-left: 20px;">
							<i class="search icon"></i>
							<div class="content">
								ผลการค้นหาสำหรับ <  <?= $words ?> >
							</div>
						</h3>
						<div class="ui celled list">
							<?php foreach($users as $user): ?>
							<div class="searchuser" style="padding: 20px;">
								<?php if($user->photo_url): ?>
								<img class="ui avatar image" style="border-radius: 0px;" src="<?= base_url().'uploads/profile/user/'.$user->photo_url ?>"><?php else: ?>
								<img class="ui avatar image" style="border-radius: 0px;" src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
								<div class="content">
								<h5 class="ui header"><?= $user->name ?> <?= $user->surname ?></h5>
								</div>
							</div>
							<?php endforeach; ?>
							<?php foreach($bands as $band): ?>											
							<div class="searchband" style="padding: 20px;">
								<?php if($band->photo_url): ?>
								<img class="ui avatar image" style="border-radius: 0px;" src="<?= base_url().'uploads/profile/band/'.$band->photo_url ?>"><?php else: ?>
								<img class="ui avatar image" style="border-radius: 0px;" src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
								<div class="content">
									<h5 class="ui header"><?= $band->name ?></h5>
									Rock
								</div>
							</div>
							<?php endforeach; ?>
							<?php foreach($musics as $music): ?>
							<div class="searchmusic" style="padding: 20px;" >
								<?php if($music->image_url): ?>
								<img class="ui avatar image" style="border-radius: 0px;" src="<?= base_url().'uploads/album/'.$music->image_url ?>"><?php else: ?>
								<img class="ui avatar image" style="border-radius: 0px;" src="<?= base_url().'images/no_album_cover.jpg' ?>"><?php endif; ?>
								<div class="content">
									<h5 class="ui header">เพลง <?= $music->musicname ?></h5>
									ศิลปิน กบ ทรงสิทธิ์
								</div>
							</div>
							<?php endforeach; ?>
							<?php foreach($albums as $album): ?>
							<div class="searchalbum" style="padding: 20px;">
							<?php if($album->image_url): ?>
								<img class="ui avatar image" style="border-radius: 0px;" src="<?= base_url().'uploads/album/'.$album->image_url ?>"><?php else: ?>
								<img class="ui avatar image" style="border-radius: 0px;" src="<?= base_url().'images/no_album_cover.jpg' ?>"><?php endif; ?>								
								<div class="content">
									<h5 class="ui header">อัลบั้ม <?= $album->albumname ?></h5>
									ศิลปิน Bodyslam
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
      <script>
      $(function(){
		 $("#searchalbums").click(function(){
			  $(".searchmusic").hide(); 
			  $(".searchband").hide();
			  $(".searchuser").hide();
  			  $(".searchalbum").show();
			});
		 $("#searchusers").click(function(){
			  $(".searchmusic").hide(); 
			  $(".searchband").hide();
			  $(".searchalbum").hide();
  			  $(".searchuser").show();
			});
		 $("#searchbands").click(function(){
			  $(".searchmusic").hide(); 
			  $(".searchalbum").hide();
			  $(".searchuser").hide();
  			  $(".searchband").show();
			});
		  $("#searchusers").click(function(){
			  $(".searchmusic").hide(); 
			  $(".searchalbum").hide();
			  $(".searchband").hide();
  			  $(".searchuser").show();
			});
  	});
      </script>

	</body>
	</html>