<section>
	<article>
		<div class="top-bg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="profile-cover">
							<img src="<?php echo base_url().'upload/cover/'.$user->cover_url; ?>" alt="">
						</div>
					</div>	
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="punpun">
						<img src="<?php echo base_url().'uploads/profile/'.$user->photo_url; ?>" alt="" id="profile-pic2" class="img-thumbnail">
						<div class="profile-name">
							<div id="pn1"><?php echo $user->name." ".$user->surname; ?></div>
							<div id="pn2"><?php echo $band_profile_user->name; ?></div>
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
								<a href="<? echo base_url().'user/followUser/view/'.$user_id ?>"><span class="badge pull-right">0</span>Follower</a>
							</li>
							<li>
								<a href="following.html"><span class="badge pull-right">0</span>Following</a>
							</li>
							<li>
								<a href="<? echo base_url().'user/event/viewAll/'.$user_id ?>"><span class="badge pull-right">0</span>Event</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>

<script type="text/javascript">
	$(function(){
		$("#greedd").click(function(){
			location.href = '<?php echo base_url()."user/followUser/follow/".$user_id; ?>';
		});
	});
</script>