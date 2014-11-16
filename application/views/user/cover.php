<section>
	<article>
		<div class="profile-cover">
			<?php if($user_profile->cover_url): ?>
				<img src="<?= base_url('uploads/cover/user/'.$user_profile->cover_url) ?>" alt="" />
			<?php else: ?>
				<img src="<?= base_url('images/cover.jpg') ?>" alt="" />
			<?php endif; ?>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="punpun">
						<?php if($user_profile->photo_url): ?>
							<img src="<?= base_url('uploads/profile/user/'.$user_profile->photo_url) ?>" alt="" id="profile-pic2" class="img-thumbnail"/>
						<?php else: ?>
							<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" id="profile-pic2" class="img-thumbnail"/>
						<?php endif; ?>
						<div class="profile-name">
							<div id="pn1"><?= $user_profile->name." ".$user_profile->surname; ?><a class="ui red label" style="margin-left: 10px;"><?= $total_follower ?> Greedd</a></div>
							<?php if( ! empty($band_profile)): ?>
								<div id="pn2">สมาชิกวง <a style="color: white;" href="<?= base_url('band/' . $band_profile->id) ?>"><?= $band_profile->name ?></a></div>
							<?php endif; ?>
						</div>
						<?php if ($user_profile->id != $this->session->userdata('id')): ?>
							<div id="user-follow" class="ui small black buttons">
								<?php if(empty($is_follow_user)): ?>
									<!-- <a class="ui button" id="follow-button" href="<?= base_url('following/user/follow/'.$user_profile->id.'?ref='.uri_string()) ?>"><i class="add icon"></i>ติดตาม</a> -->
									<a class="ui button" id="follow-user-button" data-value="<?= $user_profile->id ?>"><i class="add icon"></i>ติดตาม</a>
								<?php else: ?>
									<!-- <a class="ui button" id="" href="<?= base_url('following/user/unfollow/'.$user_profile->id.'?ref='.uri_string()) ?>"><i class="checkmark icon"></i>กำลังติดตาม</a> -->
									<a class="ui button following" id="follow-user-button" data-value="<?= $user_profile->id ?>"><i class="checkmark icon"></i> กำลังติดตาม</a>
								<?php endif; ?>
								<div class="ui button mbtn pm">ข้อความ</div>
								<div class="ui labeled top right pointing dropdown black button"><i class="ellipsis horizontal icon" style="margin: 0px"></i>
									<div class="menu">
										<div class="item mbtn reportuser" id="userreport" post-id="<?= $user_profile->id; ?>">รายงานปัญหาบุคคล</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>		
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="menu-profile">
						<div class="ui compact menu" style="border-radius: 0px">
							<a class="item" id="menu-items" href="<?= base_url().'user/'.$user_profile->username.'/timeline' ?>">
								ไทม์ไลน์ <span class="bb-count"><?= $total_timeline ?></span>
							</a>
							<a class="item" id="menu-items" href="<?= base_url().'user/'.$user_profile->username.'/music' ?>">
								เพลง <span class="bb-count"><?= $total_music ?></span>
							</a>
							<a class="item" id="menu-items" href="<?= base_url().'user/'.$user_profile->username.'/follower' ?>">
								คนตามกรี๊ด <span class="bb-count"><?= $total_follower ?></span>
							</a>
							<a class="item" id="menu-items" href="<?= base_url().'user/'.$user_profile->username.'/following' ?>">
								กำลังกรี๊ด <span class="bb-count"><?= $total_following ?></span>
							</a>
							<a class="item" id="menu-items" href="<?= base_url().'user/'.$user_profile->username.'/event' ?>">
								ตารางงาน <span class="bb-count"><?= $total_event ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>

<!--Report user modal-->
<div class="ui transition scrolling reportuser modal">
	<div class="header">

		ช่วยให้เราเข้าใจปัญหานี้
	</div>
	<div class="content">
		<div class="left"></div>
		<div class="right">
			<div class="ui header">บุคคลนี้ผิดปกติอย่างไร ?</div>
			<div class="ui form">
				<form action="<?= base_url().'report/user' ?>" method="post">
					<input type="hidden" name="userid" value="" class="userid">
					<div class="grouped inline fields">
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="type" value="1">
								<label>ฉันแค่ไม่ชอบบุคลลนี้</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="type" value="2">
								<label>บุคคลนี้ก่อกวนฉัน</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="type" value="3">
								<label>ฉันคิดว่าบุคคลนี้ไม่ควรอยู่บน Bandbrary</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="type" value="4">
								<label>บุคคลนี้เป็นสแปม</label>
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

<!--pm modal-->
<div class="ui transition scrolling pm modal" style="max-width: 700px; left: 64%;">
	<div class="header">
		ส่งข้อความถึง <?= $user_profile->name ?>
	</div>
	<div class="content">
		<form action="<?php echo base_url().'pm/message/'.$user_profile->id; ?>" method="post">
	<input type="hidden" name="message_type" value="user">
	<input type="hidden" name="username" value="<?= $user_profile->username ?>">
			<div class="ui form">
				<div class="field">
					<textarea name="text"></textarea>
				</div>
			</div>		
	</div>
	<div class="actions">
		<div class="ui black small button">
			ยกเลิก
		</div>
		<input type="submit" class="ui red submit small button" value="ส่ง">
	</form>
	</div>
</div>

<script>
	
		$(".reportuser#userreport").click(function(){
			var id = $(this).attr("post-id");
			$('.userid').val(id);
		});
	</script>
