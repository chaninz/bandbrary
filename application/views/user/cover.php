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
					<div class="punpun">
						<img src="<?= base_url().'uploads/profile/'.$user_profile->photo_url ?>" alt="" id="profile-pic2" class="img-thumbnail">
						<div class="profile-name">
							<div id="pn1"><?php echo $user_profile->name." ".$user_profile->surname; ?></div>
							<div id="pn2"><?php echo $band_profile->name; ?></div>
						</div>
							<div id="greedd" class="ui button"><i class="add icon"></i>Follow</div>
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
								<a href=""><span class="badge pull-right">0</span>Timeline</a>
							</li>
							<li>
								<a href=""><span class="badge pull-right">0</span>Music</a>
							</li>
							<li>
								<a href="<?= base_url().'user/'.$user_profile->username.'/follower' ?>"><span class="badge pull-right">0</span>Follower</a>
							</li>
							<li>
								<a href="<?= base_url().'user/'.$user_profile->username.'/following' ?>"><span class="badge pull-right">0</span>Following</a>
							</li>
							<li>
								<a href="<?= base_url().'user/'.$user_profile->username.'/event' ?>"><span class="badge pull-right">0</span>Event</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>