<section>
	<article>
		<div class="profile-cover">
			<?php if($user_profile->cover_url): ?>
			<img src="<?= base_url('uploads/images/cover/'.$user_profile->cover_url) ?>" alt="" /><?php else: ?>
			<img src="<?= base_url('images/cover.jpg') ?>" alt="" /><?php endif; ?>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="punpun">
						<?php if($user_profile->photo_url): ?>
						<img src="<?= base_url('uploads/images/profile/'.$user_profile->photo_url) ?>" alt="" id="profile-pic2" class="img-thumbnail"/><?php else: ?>
						<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" id="profile-pic2" class="img-thumbnail"/><?php endif; ?>
						<div class="profile-name">
							<div id="pn1"><?= $user_profile->name." ".$user_profile->surname; ?></div><?php if( ! empty($band_profile)): ?>
							<div id="pn2"><?= $band_profile->name ?></div><?php endif; ?>
						</div>
						<?php if ($user_profile->id == $this->session->userdata('id')): ?><?php elseif(empty($is_follow_user)): ?>
						<div id="user-follow" class="ui black buttons">
							<a class="ui button" href="<?= base_url('following/user/follow/'.$user_profile->id.'?ref='.uri_string()) ?>"><i class="add icon"></i>ติดตาม</a>
							<div class="ui button"></i>ข้อความ</div>
							<div class="ui labeled top right pointing dropdown black button"></i>...
								<div class="menu">
									<div class="item"><i class="edit icon"></i>test1</div>
									<div class="item"><i class="delete icon"></i>test2</div>
									<div class="item"><i class="hide icon"></i>test3</div>
								</div>
							</div>
						</div>
					<?php else: ?>
					<div id="user-follow" class="ui black buttons">
						<a class="ui button" href="<?= base_url('following/user/unfollow/'.$user_profile->id.'?ref='.uri_string()) ?>"><i class="checkmark icon"></i>กำลังติดตาม</a>
						<div class="ui button">ข้อความ</div>
						<div class="ui labeled top right pointing dropdown black button">...
							<div class="menu">
								<div class="item"><i class="edit icon"></i>test1</div>
								<div class="item"><i class="delete icon"></i>test2</div>
								<div class="item"><i class="hide icon"></i>test3</div>
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
						ไทม์ไลน์ <span class="bb-count">22</span>
					</a>
					<a class="item" id="menu-items" href="<?= base_url().'user/'.$user_profile->username.'/music' ?>">
						เพลง <span class="bb-count">22</span>
					</a>
					<a class="item" id="menu-items" href="<?= base_url().'user/'.$user_profile->username.'/follower' ?>">
						ผู้ติดตาม <span class="bb-count">22</span>
					</a>
					<a class="item" id="menu-items" href="<?= base_url().'user/'.$user_profile->username.'/following' ?>">
						กำลังติดตาม <span class="bb-count">22</span>
					</a>
					<a class="item" id="menu-items" href="<?= base_url().'user/'.$user_profile->username.'/event' ?>">
						ตารางงาน <span class="bb-count">22</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
</article>
</section>