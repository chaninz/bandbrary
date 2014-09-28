<section>
	<article>
		<div class="top-bg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="profile-cover">
							<img src="<?= base_url().'upload/cover/'.$user_profile->cover_url ?>" alt="">
						</div>
					</div>	
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="punpun"><?php if($user_profile->photo_url): ?>
						<img src="<?= base_url().'uploads/profile/'.$user_profile->photo_url ?>" alt="" id="profile-pic2" class="img-thumbnail"/><?php else: ?>
						<img src="<?= base_url().'images/no_profile.jpg' ?>" alt="" id="profile-pic2" class="img-thumbnail"/><?php endif; ?>
						<div class="profile-name">
							<div id="pn1"><?php echo $user_profile->name." ".$user_profile->surname; ?></div>
							<div id="pn2"><?php echo $band_profile->name; ?></div>
						</div><?php if(empty($is_follow_user)): ?>
						<div id="user-follow" class="ui button"><a href="<?= base_url('following/user/follow/'.$user_profile->id.'?ref='.uri_string()) ?>"><i class="add icon"></i>Follow</div></a><?php else: ?>
						<div id="user-follow" class="ui button"><a href="<?= base_url('following/user/unfollow/'.$user_profile->id.'?ref='.uri_string()) ?>"><i class="minus icon"></i>Unfollow</div></a><?php endif; ?>
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
								<a href="<?= base_url().'user/'.$user_profile->username.'/timeline' ?>">Timeline</a>
							</li>
							<li>
								<a href="<?= base_url().'user/'.$user_profile->username.'/music' ?>">Music</a>
							</li>
							<li>
								<a href="<?= base_url().'user/'.$user_profile->username.'/follower' ?>">Follower</a>
							</li>
							<li>
								<a href="<?= base_url().'user/'.$user_profile->username.'/following' ?>">Following</a>
							</li>
							<li>
								<a href="<?= base_url().'user/'.$user_profile->username.'/event' ?>">Event</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>