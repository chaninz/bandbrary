<div class="col-xs-3" style="padding-right: 0px">
	<div id="status-button"class="ui icon button">
		<i class="edit icon" style="font-size: 1.5rem"></i>
	</div>

	<div class="ui stacked segment" id="status">
		<textarea id="status-msg"></textarea>
	</div>

	<div class="about">
		<div class="title-box">ABOUT</div>
		<div class="ui list">
			<div class="list"><?php if( ! empty($user_profile->biography)): ?>
				<div class="item">
					<i class="book icon"></i>
					<div class="content">
						<div class="header">Biography</div>
						<div class="description"><?= $user_profile->biography; ?></div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($user_profile->fb_url)): ?>
				<div class="item">
					<i class="map marker icon"></i>
					<div class="content">
						<div class="header">Location</div>
						<div class="description"><?= $user_profile->province ?></div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($user_profile->fb_url)): ?>
				<div class="item">
					<i class="facebook sign icon"></i>
					<div class="content">
						<div class="header">Facebook</div>
						<div class="description"><?= $user_profile->fb_url ?></div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($user_profile->tw_url)): ?>
				<div class="item">
					<i class="twitter icon"></i>
					<div class="content">
						<div class="header">Twitter</div>
						<div class="description"><?= $user_profile->tw_url; ?> </div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($user_profile->yt_url)): ?>
				<div class="item">
					<i class="youtube play icon"></i>
					<div class="content">
						<div class="header">Youtube</div>
						<div class="description"><?= $user_profile->yt_url ?></div>
					</div>
				</div><?php endif; ?>
			</div>
		</div>
	</div>
</div>