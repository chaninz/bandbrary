<div class="col-xs-3" style="padding-right: 0px">
	<?php if ($this->session->userdata('id') == $user_profile->id): ?>
	<div id="status-button" class="ui left pointing dropdown icon button">
		<i class="edit icon"></i>
		<div class="menu">
			<div class="item">แก้ไข</div>
			<div class="item">สเตตัสทั้งหมด</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="ui stacked segment" id="status-user">
		<div id="status-msg" style="background-color: #FFFFFF; display: table;"><?php if ( ! empty($status)): ?><?= $status->status ?><?php endif; ?></div>
		<textarea id="status-msg-field" style="background-color: #FFFFFF; width: 100%; height: 124px; display: none;"></textarea>
	</div>

	<div class="about">
		<div class="title-box-user">เกี่ยวกับ</div>
		<div class="ui list">
			<div class="list"><?php if( ! empty($user_profile->biography)): ?>
				<div class="item">
					<i class="book icon"></i>
					<div class="content">
						<div class="header">ประวัติ</div>
						<div class="description"><?= $user_profile->biography; ?></div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($user_profile->fb_url)): ?>
				<div class="item">
					<i class="map marker icon"></i>
					<div class="content">
						<div class="header">ที่อยู่</div>
						<div class="description"><?= $user_profile->province ?></div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($user_profile->fb_url)): ?>
				<div class="item">
					<i class="facebook sign icon"></i>
					<div class="content">
						<div class="header">เฟสบุ๊ค</div>
						<div class="description"><?= $user_profile->fb_url ?></div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($user_profile->tw_url)): ?>
				<div class="item">
					<i class="twitter icon"></i>
					<div class="content">
						<div class="header">ทวิตเตอร์</div>
						<div class="description"><?= $user_profile->tw_url; ?> </div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($user_profile->yt_url)): ?>
				<div class="item">
					<i class="youtube play icon"></i>
					<div class="content">
						<div class="header">ยูทูป</div>
						<div class="description"><?= $user_profile->yt_url ?></div>
					</div>
				</div><?php endif; ?>
				<div class="item">
					<i class="certificate icon"></i>
					<div class="content">
						<div class="header">รางวัลที่ได้รับ</div>
						<div class="description">MTV Award 2014</div>
					</div>
				</div>
				<div class="item">
					<i class="info icon"></i>
					<div class="content">
						<div class="header">วงดนตรีที่เคยเข้าร่วม</div>
						<div class="description">Bodyslam - ปี 2013</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>