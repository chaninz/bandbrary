<section>
	<article>
		<div class="top-bg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="profile-cover">
							<?php if($band_profile->cover_url): ?>
						<img src="<?= base_url('uploads/cover/'.$band_profile->cover_url) ?>" alt="" /><?php else: ?>
						<img src="<?= base_url('images/cover.jpg') ?>" alt="" /><?php endif; ?>
						</div>
					</div>	
				</div>
			</div>
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
						<div id="band-follow" class="ui button"><a href="<?= base_url('following/band/follow/'.$band_profile->id.'?ref='.uri_string()) ?>"><i class="add icon"></i>ติดตาม</div></a><?php else: ?>
						<div id="band-follow" class="ui button"><a href="<?= base_url('following/band/unfollow/'.$band_profile->id.'?ref='.uri_string()) ?>"><i class="minus icon"></i>เลิกติดตาม</div></a><?php endif; ?><?php endif; ?>
						<div id="joinBand" class="ui red buttons">
							<div class="ui button" style="border-top-left-radius: 0em; border-bottom-left-radius: 0em; font-size: 0.85em!important; padding: 0.8em 1em;">
								<?php if($this->session->userdata('user_type') == 2): ?>
								<?php if($user_status == 1): ?>
								<i class="circle blank icon"></i>รอการตอบรับ</div>
								<div class="ui red floating dropdown icon button" style="font-size: 0.86em!important;">
									<i class="dropdown icon" style="font-size: 1em;"></i>
									<div class="menu">
										<a class="item" style="font-size: 1.2em;" href="<?= base_url('band/join/cancel/'.$band_profile->id.'?pos=1&ref='.uri_string()) ?>"><i class="hide icon"></i>ยกเลิกคำร้อง</a>
									</div>
								</div>
							<?php elseif($user_status == 2): ?>
							<i class="circle blank icon"></i>เข้ารว่มวงแล้ว</div>
							<div class="ui red floating dropdown icon button" style="font-size: 0.86em!important;">
								<i class="dropdown icon" style="font-size: 1em;"></i>
								<div class="menu">
									<a class="item" style="font-size: 0.85em;" href="<?= base_url('band/join/leave/'.$band_profile->id.'?pos=1&ref='.uri_string()) ?>"><i class="hide icon"></i>ออกจากวง</a>
								</div>
							</div>
						<?php else: ?>
						<i class="circle blank icon"></i>ขอเข้าร่วมวง</div>
						<div class="ui red floating dropdown icon button" style="font-size: 0.86em!important;">
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
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="menu-profile">
				<div class="ui compact menu" style="border-radius: 0px">
					<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/timeline') ?>">
						ไทม์ไลน์
						<div class="floating ui red label">22</div>
					</a>
					<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/music') ?>">
						เพลง
						<div class="floating ui red label">22</div>
					</a>
					<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/post') ?>">
						โพสต์
						<div class="floating ui red label">22</div>
					</a>
					<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/follower') ?>">
						ผู้ติดตาม
						<div class="floating ui red label">22</div>
					</a>
					<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/event') ?>">
						ตารางงาน
						<div class="floating ui red label">22</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="ui animated list" style="margin-top: 10px; padding: 18px">
				<div class="item" style="float: left; text-align: center; margin-left: 25px;">
					<p/>
					<img class="ui avatar image" src="/images/demo/avatar.jpg" style="width: 80px; height: 80px;">
					<div class="content">
						<div class="header">Title</div>
						Vocal
					</div>
				</div>
				<div class="item" style="float: left; text-align: center; margin-left: 25px;">
					<p/>
					<img class="ui avatar image" src="/images/demo/avatar2.jpg" style="width: 80px; height: 80px;">
					<div class="content">
						<div class="header">Punpun</div>
						Piano
					</div>
				</div>
				<div class="item" style="float: left; text-align: center; margin-left: 25px;">
					<p/>
					<img class="ui avatar image" src="/images/demo/avatar3.jpg" style="width: 80px; height: 80px;">
					<div class="content">
						<div class="header">Nin</div>
						Guitar
					</div>
				</div>
				<div class="item" style="float: left; text-align: center; margin-left: 25px;">
					<p/>
					<img class="ui avatar image" src="/images/demo/avatar3.jpg" style="width: 80px; height: 80px;">
					<div class="content">
						<div class="header">Sam</div>
						Bass
					</div>
				</div>
				<div class="item" style="float: left; text-align: center; margin-left: 25px;">
					<p/>
					<img class="ui avatar image" src="/images/demo/avatar3.jpg" style="width: 80px; height: 80px;">
					<div class="content">
						<div class="header">Zoom</div>
						Drum
					</div>
				</div>
				<div class="item" style="float: left; text-align: center; margin-left: 25px;">
					<p/>
					<img class="ui avatar image" src="/images/demo/avatar3.jpg" style="width: 80px; height: 80px;">
					<div class="content">
						<div class="header">Cap</div>
						Violin
					</div>
				</div>
				<div class="item" style="float: left; text-align: center; margin-left: 25px;">
					<p/>
					<img class="ui avatar image" src="/images/demo/avatar3.jpg" style="width: 80px; height: 80px;">
					<div class="content">
						<div class="header">Pream</div>
						Trumpets
					</div>
				</div>
				<div class="item" style="float: left; text-align: center; margin-left: 25px;">
					<p/>
					<img class="ui avatar image" src="/images/demo/avatar3.jpg" style="width: 80px; height: 80px;">
					<div class="content">
						<div class="header">Bright</div>
						Saxophone
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</article>
</section>