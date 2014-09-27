
<section>
	
	<article>
		<div class="top-bg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="profile-cover">
							<img src="<?php echo base_url().'uploads/cover/'.$band->cover_url; ?>" alt="">
						</div>
					</div>	
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="punpun">

						<? echo true == false;?>
						<img src="<?php echo base_url().'uploads/profile/'.$band->photo_url; ?>" alt="" id="profile-pic2" class="img-thumbnail">
						<div class="profile-name">
							<div id="pn1"><?php echo $band->name; ?></div>
							<div id="pn2">Rock/Blues/Jazz</div>
						</div>
						<?php if($isFollow){?>
						<div id="ungreedd" class="ui button"><i class="add icon"></i>UnFollow</div>
						<?php 
						}else { ?>
						<div id="greedd"class="ui button"><i class="add icon"></i>Follow</div>
						<? } ?>
						<div id="joinBand" class="ui red buttons">
							<div id="greedd"class="ui button"><i class="add icon"></i>Follow</div>
						
							<div class="ui button" 
							style="border-top-left-radius: 0em; 
							border-bottom-left-radius: 0em; ">
							<i class="circle blank icon"></i>JOIN</div>
							<div class="ui red floating dropdown icon button">
								<i class="dropdown icon" style="font-size: 1.1em;"></i>
								<div class="menu">
									<div class="item"><i class="hide icon"></i>Vocal</div>
									<div class="item"><i class="hide icon"></i>Guitar</div>
									<div class="item"><i class="hide icon"></i>Bass</div>
									<div class="item"><i class="hide icon"></i>Drum</div>
									<div class="item"><i class="hide icon"></i>Piano</div>
									<div class="item"><i class="hide icon"></i>Keybroad</div>
									<div class="item"><i class="hide icon"></i>Saxophone</div>
									<div class="item"><i class="hide icon"></i>Trumpets</div>
									<div class="item"><i class="hide icon"></i>Violin</div>
								</div>
							</div>
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
								<a href="">Timeline</a>
							</li>
							<li>
								<a href="">Music</a>
							</li>
							<li class="active">
								<a href="<? echo base_url().'band/post/viewAll/'.$band_id ?>">Post</a>
							</li>
							<li>
								<a href="<? echo base_url().'band/followBand/view/'.$band_id ?>">Follower</a>
							</li>
							<li>
								<a href="event.html">Event</a>
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
			location.href = '<?php echo base_url()."following/band/follow/".$band_id; ?>';
		});
		$("#ungreedd").click(function(){
			location.href = '<?php echo base_url()."user/followBand/unfollow/".$band_id; ?>';
		});
	});
</script>