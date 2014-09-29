<section>
	<article>
		<div class="top-bg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="profile-cover">
							<img src="<?= base_url('upload/cover/'.$band_profile->cover_url) ?>" alt="">
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
						<img src="<?= base_url('uploads/profile/'.$band_profile->photo_url) ?>" alt="" id="profile-pic2" class="img-thumbnail"/><?php else: ?>
						<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" id="profile-pic2" class="img-thumbnail"/><?php endif; ?>
						<div class="profile-name">
							<div id="pn1"><?= $band_profile->name ?></div>
							<div id="pn2"><?= $band_profile->style ?></div>
						</div>
						<?php if ($band_profile->id == $this->session->userdata('band_id')): ?><?php elseif(empty($is_follow_band)): ?>
						<div id="follow" class="ui button"><a href="<?= base_url('following/band/follow/'.$band_profile->id.'?ref='.uri_string()) ?>"><i class="add icon"></i>Follow</div></a><?php else: ?>
						<div id="follow" class="ui button"><a href="<?= base_url('following/band/unfollow/'.$band_profile->id.'?ref='.uri_string()) ?>"><i class="minus icon"></i>Unfollow</div></a><?php endif; ?>
						<div id="joinBand" class="ui red buttons">
							<div class="ui button" 
							style="border-top-left-radius: 0em; 
							border-bottom-left-radius: 0em; ">
							<?php if($user_status == 1): ?>
							<i class="circle blank icon"></i>REQUESTED</div>
							<div class="ui red floating dropdown icon button">
								<i class="dropdown icon" style="font-size: 1.1em;"></i>
								<div class="menu">
									<a class="item" href="<?= base_url('band/join/cancel/'.$band_profile->id.'?pos=1&ref='.uri_string()) ?>"><i class="hide icon"></i>Cancel</a>
								</div>
							</div>
							<?php elseif($user_status == 2): ?>
							<i class="circle blank icon"></i>JOINED</div>
							<div class="ui red floating dropdown icon button">
								<i class="dropdown icon" style="font-size: 1.1em;"></i>
								<div class="menu">
									<a class="item" href="<?= base_url('band/join/leave/'.$band_profile->id.'?pos=1&ref='.uri_string()) ?>"><i class="hide icon"></i>Leave from band</a>
								</div>
							</div>
							<?php else: ?>
							<i class="circle blank icon"></i>JOIN</div>
							<div class="ui red floating dropdown icon button">
								<i class="dropdown icon" style="font-size: 1.1em;"></i>
								<div class="menu">
									<a class="item" href="<?= base_url('band/join/'.$band_profile->id.'?pos=1&ref='.uri_string()) ?>"><i class="hide icon"></i>Vocal</a>
									<a class="item" href="<?= base_url('band/join/'.$band_profile->id.'?pos=2&ref='.uri_string()) ?>"><i class="hide icon"></i>Guitar</a>
									<a class="item" href="<?= base_url('band/join/'.$band_profile->id.'?pos=3&ref='.uri_string()) ?>"><i class="hide icon"></i>Bass</a>
									<a class="item" href="<?= base_url('band/join/'.$band_profile->id.'?pos=4&ref='.uri_string()) ?>"><i class="hide icon"></i>Drum</a>
									<a class="item" href="<?= base_url('band/join/'.$band_profile->id.'?pos=5&ref='.uri_string()) ?>"><i class="hide icon"></i>Piano</a>
									<a class="item" href="<?= base_url('band/join/'.$band_profile->id.'?pos=6&ref='.uri_string()) ?>"><i class="hide icon"></i>Keybroad</a>
									<a class="item" href="<?= base_url('band/join/'.$band_profile->id.'?pos=7&ref='.uri_string()) ?>"><i class="hide icon"></i>Saxophone</a>
									<a class="item" href="<?= base_url('band/join/'.$band_profile->id.'?pos=8&ref='.uri_string()) ?>"><i class="hide icon"></i>Trumpets</a>
									<a class="item" href="<?= base_url('band/join/'.$band_profile->id.'?pos=9&ref='.uri_string()) ?>"><i class="hide icon"></i>Violin</a>
								</div>
							</div>
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
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li>
								<a href="<?= base_url('band/'.$band_profile->id.'/timeline') ?>">Timeline</a>
							</li>
							<li>
								<a href="<?= base_url('band/'.$band_profile->id.'/music') ?>">Music</a>
							</li>
							<li>
								<a href="<?= base_url('band/'.$band_profile->id.'/post') ?>">Post</a>
							</li>
							<li>
								<a href="<?= base_url('band/'.$band_profile->id.'/follower') ?>">Follower</a>
							</li>
							<li>
								<a href="<?= base_url('band/'.$band_profile->id.'/event') ?>">Event</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>