<div class="col-xs-3" style="padding-right: 0px">
	<?php if ($this->session->userdata('id') == $user_profile->id): ?>
		<div id="status-button" class="ui left pointing dropdown icon button">
			<i class="edit icon"></i>
			<div class="menu">
				<a class="item" id="edit-status-button">แก้ไข</a>
				<a class="item" href="<?= base_url('user/'.$user_profile->username.'/status/all') ?>">สเตตัสทั้งหมด</a>
			</div>
		</div>
	<?php endif; ?>
	<div class="ui stacked segment" id="status-user">
		<div id="status-msg">
			<?php if ( ! empty($status)): ?>
				<?= $status->status ?>
			<?php endif; ?>
		</div>
		<textarea id="status-msg-field" style="background-color: #FFFFFF; width: 100%; height: 124px; display: none;" maxlength="140"></textarea>
	</div>

	<div class="about">
		<div class="title-box-user">เกี่ยวกับ</div>
		<div class="ui list">
			<div class="list">
				<?php if( ! empty($user_profile->biography)): ?>
					<div class="item">
						<i class="book icon"></i>
						<div class="content">
							<div class="header">ประวัติ</div>
							<div class="description"><?= $user_profile->biography; ?></div>
						</div>
					</div>
				<?php endif; ?>
				<?php if( ! empty($user_profile->fb_url)): ?>
					<div class="item">
						<i class="map marker icon"></i>
						<div class="content">
							<div class="header">ที่อยู่</div>
							<div class="description"><?= $user_profile->province ?></div>
						</div>
					</div>
				<?php endif; ?>
				<?php if( ! empty($user_profile->fb_url)): ?>
					<div class="item">
						<i class="facebook sign icon"></i>
						<div class="content">
							<div class="header">เฟสบุ๊ค</div>
							<div class="description"><a href="<?= 'https://' . $user_profile->fb_url ?>"><?= $user_profile->fb_url ?></a></div>
						</div>
					</div>
				<?php endif; ?>
				<?php if( ! empty($user_profile->tw_url)): ?>
					<div class="item">
						<i class="twitter icon"></i>
						<div class="content">
							<div class="header">ทวิตเตอร์</div>
							<div class="description"><a href="<?= 'https://' . $user_profile->tw_url ?>"><?= $user_profile->tw_url ?></a></div>
						</div>
					</div>
				<?php endif; ?>
				<?php if( ! empty($user_profile->yt_url)): ?>
					<div class="item">
						<i class="youtube play icon"></i>
						<div class="content">
							<div class="header">ยูทูป</div>
							<div class="description"><a href="<?= 'https://' . $user_profile->yt_url ?>"><?= $user_profile->yt_url ?></a></div>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty($skills)): ?>
					<div class="item">
						<i class="music icon"></i>
						<div class="content">
							<div class="header">ความสามารถ</div>
							<div class="description">
								<?php $count = 1 ?>
								<?php foreach ($skills as $skill): ?>
									<?= $count == 1 ? "" : "/" ?><?= $skill->skill ?>
									<?php $count++ ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty($styles)): ?>
					<div class="item">
						<i class="headphones icon"></i>
						<div class="content">
							<div class="header">สไตล์</div>
							<div class="description">
								<?php $count = 1 ?>
								<?php foreach ($styles as $style): ?>
									<?= $count == 1 ? "" : "/" ?><?= $style->style ?>
									<?php $count++ ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty($join_band_history)): ?>
					<div class="item">
						<i class="info icon"></i>
						<div class="content">
							<div class="header">วงดนตรีที่เคยเข้าร่วม</div>
							<?php foreach ($join_band_history as $history): ?>
								<div class="description"><?= mdate("%m/%Y", strtotime($history->leave_date)) ?> - <a href="<?= base_url('band/' . $history->id) ?>"><?= $history->name ?></a></div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>