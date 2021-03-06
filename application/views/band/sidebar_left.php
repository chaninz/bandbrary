<div class="col-xs-3" style="padding-right: 0px">
	<?php if ($this->session->userdata('band_id') == $band_profile->id && $this->session->userdata('is_master') == 1): ?>
		<div id="status-button" class="ui left pointing dropdown icon button">
			<i class="edit icon"></i>
			<div class="menu">
				<a class="item" id="band-edit-status-button">แก้ไข</a>
				<a class="item" href="<?= base_url('user/'.$band_profile->name.'/status/all') ?>">สเตตัสทั้งหมด</a>
			</div>
		</div>
	<?php endif; ?>
	<div class="ui stacked segment" id="status-band">
		<div id="status-msg">
			<?php if ( ! empty($status)): ?>
				<?= $status->status ?>
			<?php endif; ?>
		</div>
		<textarea id="band-status-msg-field" style="background-color: #FFFFFF; width: 100%; height: 124px; display: none;" maxlength="140"></textarea>
	</div>

	<div class="about">
		<div class="title-box-band">เกี่ยวกับ</div>
		<div class="ui list">
			<div class="list"><?php if( ! empty($band_profile->biography)): ?>
				<div class="item">
					<i class="book icon"></i>
					<div class="content">
						<div class="header">ประวัติ</div>
						<div class="description"><?= $band_profile->biography; ?></div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($band_profile->fb_url)): ?>
				<div class="item">
					<i class="map marker icon"></i>
					<div class="content">
						<div class="header">สถานที่</div>
						<div class="description"><?= $band_profile->province ?></div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($band_profile->fb_url)): ?>
				<div class="item">
					<i class="facebook sign icon"></i>
					<div class="content">
						<div class="header">เฟสบุ๊ค</div>
						<div class="description"><?= $band_profile->fb_url ?></div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($band_profile->tw_url)): ?>
				<div class="item">
					<i class="twitter icon"></i>
					<div class="content">
						<div class="header">ทวิตเตอร์</div>
						<div class="description"><?= $band_profile->tw_url; ?> </div>
					</div>
				</div><?php endif; ?> <?php if( ! empty($band_profile->yt_url)): ?>
				<div class="item">
					<i class="youtube play icon"></i>
					<div class="content">
						<div class="header">ยูทูป</div>
						<div class="description"><?= $band_profile->yt_url ?></div>
					</div>
				</div><?php endif; ?>
			</div>
		</div>
	</div>
	<!-- <div class="member">
		<div class="title-box">MEMBERS</div>
		<div class="ui list">
			<div class="list"><?php foreach ($band_members as $band_member): ?>
				<div class="item"><?php if($band_member->photo_url): ?>
					<img id="member-pic" class="ui avatar image" src="<?= base_url('uploads/profile/'.$band_member->photo_url) ?>"/><?php else: ?>
					<img id="member-pic" class="ui avatar image" src="<?= base_url('images/no_profile.jpg') ?>"/><?php endif; ?>
					<div id="member-nam" class="content">
						<div class="header"><?= $band_member->name.' '.$band_member->surname ?></div>
						<?= $band_member->position ?>
					</div>
				</div><?php endforeach; ?>
			</div>
		</div>
	</div> -->
</div>