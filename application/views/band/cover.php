<section>
	<article>
		<div class="profile-cover">
			<?php if($band_profile->cover_url): ?>
			<img src="<?= base_url('uploads/cover/'.$band_profile->cover_url) ?>" alt="" /><?php else: ?>
			<img src="<?= base_url('images/cover.jpg') ?>" alt="" /><?php endif; ?>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="punpun">
						<?php if($band_profile->photo_url): ?>
						<img src="<?= base_url('uploads/profile/'.$band_profile->photo_url) ?>" alt="" id="profile-pic2" class="img-thumbnail" style="border: 4px solid #E72A30;"/><?php else: ?>
						<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" id="profile-pic2" class="img-thumbnail" style="border: 4px solid #E72A30;"/><?php endif; ?>
						<div class="profile-name">
							<div id="pn1"><?= $band_profile->name ?></div>
							<div id="pn2"><?= $band_profile->style ?></div>
						</div><?php if($this->session->userdata('user_type') == 2): ?>
						<?php if(empty($is_follow_band)): ?>
						<div id="band-follow" class="ui black buttons">
							<a class="ui button" href="<?= base_url('following/band/follow/'.$band_profile->id.'?ref='.uri_string()) ?>"><i class="add icon"></i>ติดตาม</a>
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
					<div id="band-follow" class="ui black buttons">
						<a class="ui button" href="<?= base_url('following/band/unfollow/'.$band_profile->id.'?ref='.uri_string()) ?>"><i class="checkmark icon"></i>กำลังติดตาม</a>
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
			<?php endif; ?>
			<div id="join-band" class="ui red buttons">
				<div class="ui button" style="border-top-left-radius: 0em; border-bottom-left-radius: 0em; font-size: 0.85em!important; padding: 0.8em 1em;">
					<?php if($this->session->userdata('user_type') == 2): ?>
					<?php if($user_status == 1): ?>
					<i class="circle blank icon"></i>รอการตอบรับ
				</div>
				<div class="ui red floating dropdown icon button" style="font-size: 0.85em!important;">
					<i class="dropdown icon" style="font-size: 1em;"></i>
					<div class="menu">
						<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/cancel/'.$band_profile->id.'?pos=1&ref='.uri_string()) ?>"><i class="hide icon"></i>ยกเลิกคำร้อง</a>
					</div>
				</div>
			<?php elseif($user_status == 2): ?>
			<i class="circle blank icon"></i>เข้ารว่มวงแล้ว
		</div>
		<div class="ui red floating dropdown icon button" style="font-size: 0.85em!important;">
			<i class="dropdown icon" style="font-size: 1em;"></i>
			<div class="menu">
				<a class="item" style="font-size: 0.85em;" href="<?= base_url('band/join/leave/'.$band_profile->id.'?pos=1&ref='.uri_string()) ?>"><i class="hide icon"></i>ออกจากวง</a>
			</div>
		</div>
	<?php else: ?>
	<i class="circle blank icon"></i>ขอเข้าร่วมวง
	<div class="ui red floating dropdown icon button" style="font-size: 0.85em!important;">
		<i class="dropdown icon" style="font-size: 1em;"></i>
		<div class="menu">
			<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/'.$band_profile->id.'?pos=1&ref='.uri_string()) ?>"><i class="hide icon"></i>นักร้อง</a>
			<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/'.$band_profile->id.'?pos=2&ref='.uri_string()) ?>"><i class="hide icon"></i>กีต้าร์</a>
			<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/'.$band_profile->id.'?pos=3&ref='.uri_string()) ?>"><i class="hide icon"></i>เบส</a>
			<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/'.$band_profile->id.'?pos=4&ref='.uri_string()) ?>"><i class="hide icon"></i>กลอง</a>
			<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/'.$band_profile->id.'?pos=5&ref='.uri_string()) ?>"><i class="hide icon"></i>เปียโน</a>
			<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/'.$band_profile->id.'?pos=6&ref='.uri_string()) ?>"><i class="hide icon"></i>คีบอร์ด</a>
			<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/'.$band_profile->id.'?pos=7&ref='.uri_string()) ?>"><i class="hide icon"></i>แซกโซโฟน</a>
			<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/'.$band_profile->id.'?pos=8&ref='.uri_string()) ?>"><i class="hide icon"></i>ทรัมเป็ต</a>
			<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/'.$band_profile->id.'?pos=9&ref='.uri_string()) ?>"><i class="hide icon"></i>ไวโอลิน</a>
		</div>
	</div>
</div>
<?php endif; ?>
<?php endif; ?>
</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="menu-profile">
			<div class="ui compact menu" style="border-radius: 0px">
				<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/timeline') ?>">
					ไทม์ไลน์ <span class="bb-count">22</span>
				</a>
				<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/music') ?>">
					เพลง <span class="bb-count">22</span>
				</a>
				<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/post') ?>">
					โพสต์ <span class="bb-count">22</span>
				</a>
				<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/follower') ?>">
					ผู้ติดตาม <span class="bb-count">22</span>
				</a>
				<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/event') ?>">
					ตารางงาน <span class="bb-count">22</span>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div id="band-member" class="ui animated list">
			<?php foreach ($band_members as $band_member): ?>
				<div class="item"><?php if($band_member->photo_url): ?>
					<p/>
					<img class="ui avatar image" src="<?= base_url('uploads/profile/'.$band_member->photo_url) ?>"><?php else: ?>
					<img class="ui avatar image" src="<?= base_url('images/no_profile.jpg') ?>"><?php endif; ?>
					<div class="content">
						<div class="header"><?= $band_member->name.' '.$band_member->surname ?></div>
						<?= $band_member->position ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</div>
</article>
</section>