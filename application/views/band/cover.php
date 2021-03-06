<section>
	<article>
		<div class="profile-cover">
			<?php if($band_profile->cover_url): ?>
				<img src="<?= base_url('uploads/cover/band/'.$band_profile->cover_url) ?>" alt="" />
			<?php else: ?>
				<img src="<?= base_url('images/cover.jpg') ?>" alt="" />
			<?php endif; ?>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="punpun">
						<?php if($band_profile->photo_url): ?>
							<img src="<?= base_url('uploads/profile/band/'.$band_profile->photo_url) ?>" alt="" id="profile-pic2" class="img-thumbnail" style="border: 4px solid #E72A30;"/>
						<?php else: ?>
							<img src="<?= base_url('images/no_profile.jpg') ?>" alt="" id="profile-pic2" class="img-thumbnail" style="border: 4px solid #E72A30;"/>
						<?php endif; ?>
						<div class="profile-name">
							<div id="pn1">วง <?= $band_profile->name ?><a class="ui red label" style="margin-left: 10px;"><?= $total_follower ?> Greedd</a></div>
							<div id="pn2"><?= $band_profile->style ?></div>
						</div>
						<div id="band-follow" class="ui small black buttons">
							<?php if(empty($is_follow_band)): ?>
								<a class="ui button" id="follow-band-button" data-value="<?= $band_profile->id ?>"><i class="add icon"></i>ติดตาม</a>
							<?php else: ?>
								<a class="ui button following" id="follow-band-button" data-value="<?= $band_profile->id ?>"><i class="checkmark icon"></i>กำลังติดตาม</a>
							<?php endif; ?>
							<div class="ui mbtn pm button">ข้อความ</div>
							<div class="ui labeled top right pointing dropdown black button">
								<i class="ellipsis horizontal icon" style="margin: 0px"></i>
								<div class="menu">
									<div class="item mbtn reportband" id="bandreport" post-id="<?= $band_profile->id ?> ">รายงานปัญหาวงดนตรี</div>
									<?php if ( ! empty($user_status) && $user_status->status == 2): ?>
										<a class="item" href="<?= base_url('band/join/leave/'.$band_profile->id) ?>">ออกจากวง</a>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="menu-profile">
							<div class="ui compact menu" style="border-radius: 0px">
								<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/timeline') ?>">
									ไทม์ไลน์ <span class="bb-count"><?= $total_timeline ?></span>
								</a>
								<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/music') ?>">
									เพลง <span class="bb-count"><?= $total_music ?></span>
								</a>
								<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/post') ?>">
									โพสต์ <span class="bb-count"><?= $total_post ?></span>
								</a>
								<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/follower') ?>">
									คนตามกรี๊ด <span class="bb-count"><?= $total_follower ?></span>
								</a>
								<a class="item" id="menu-items" href="<?= base_url('band/'.$band_profile->id.'/event') ?>">
									ตารางงาน <span class="bb-count"><?= $total_event ?></span>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Start band members -->
				<div class="row">
					<div class="col-xs-12">
						<div id="band-member" class="ui animated list">
							<?php foreach ($band_members as $band_member): ?>
								<div id="member-size" class="item">
									<a href="<?= base_url('user/' . $band_member->username) ?>">
										<?php if($band_member->photo_url): ?>
											<p/><img id="member-img" class="ui avatar image member" src="<?= base_url('uploads/profile/user/'.$band_member->photo_url) ?>">
										<?php else: ?>
											<p/><img id="member-img" class="ui avatar image member" src="<?= base_url('images/no_profile.jpg') ?>">
										<?php endif; ?>
									</a>
									<div class="content">
										<div class="header"><a href="<?= base_url('user/' . $band_member->username) ?>"><?= $band_member->name.' '.$band_member->surname ?></a></div>
										<?= $band_member->position ?>
									</div>
								</div>
							<?php endforeach; ?>
							<?php if ($band_profile->status == 0): ?>

							<?php elseif ( ! empty($user_status) && $user_status->status == 1): ?>
								<div id="member-size" class="item">
									<?php if ($this->session->userdata('photo_url')): ?>
										<p/><img id="join-img" class="ui avatar image member" src="<?= base_url('uploads/profile/user/'.$this->session->userdata('photo_url')) ?>">
									<?php else: ?>
										<p/><img id="join-img" class="ui avatar image member" src="<?= base_url('images/no_profile.jpg') ?>">
									<?php endif; ?>
									<div class="content">
										<div class="header">
											<a class="tiny ui button" href="<?= base_url('band/join/cancel/'.$band_profile->id) ?>">ยกเลิกสมัครตำแหน่ง<?= $user_status->position ?></a>
										</div>
									</div>
								</div>
							<?php elseif ($this->session->userdata('band_id') == NULL && $band_profile->id != $this->session->userdata('band_id')): ?>
								<?php foreach ($current_user_skills as $current_user_skill): ?>
									<div id="member-size" class="item">
										<?php if ($this->session->userdata('photo_url')): ?>
											<p/><img id="join-img" class="ui avatar image member" src="<?= base_url('uploads/profile/user/'.$this->session->userdata('photo_url')) ?>">
										<?php else: ?>
											<p/><img id="join-img" class="ui avatar image member" src="<?= base_url('images/no_profile.jpg') ?>">
										<?php endif; ?>
										<div class="content">
											<div class="header">
												<a class="tiny ui button" href="<?= base_url('band/join/'.$band_profile->id.'?pos='.$current_user_skill->skill_id) ?>">สมัครตำแหน่ง<?= $current_user_skill->skill ?></a>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<!-- End band members -->
			</div>
		</div>
	</article>
</section>

<!--Report band modal-->
<div class="ui transition scrolling reportband modal">
	<div class="header">
		ช่วยให้เราเข้าใจปัญหานี้
	</div>
	<div class="content">
		<div class="left"></div>
		<div class="right">
			<div class="ui header">วงดนตรีนี้ผิดปกติอย่างไร ?</div>
			<div class="ui form">
				<form action="<?= base_url().'report/band' ?>" method="post">
					<input type="hidden" name="bandid" value="" class="bandid"/>
					<div class="grouped inline fields">
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="type" value="1">
								<label>ฉันแค่ไม่ชอบวงดนตรีนี้</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="type" value="2">
								<label>วงดนตรีนี้ก่อกวนฉัน</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="type" value="3">
								<label>ฉันคิดว่าบุคคลนี้ไม่ควรอยู่บน Bandbrary</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" name="type" value="4">
								<label>วงดนตรีนี้เป็นสแปม</label>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
		<div class="actions">
			<div class="ui black small button">
				ยกเลิก
			</div>
			<input type="submit" class="ui red submit small button" value="ส่งรายงาน">
		</div>
	</form>
</div>

<!--pm modal-->
<div class="ui transition scrolling pm modal" style="max-width: 700px; left: 64%;">
	<div class="header">
		ส่งข้อความถึง <?= $band_profile->name ?>
	</div>
	<div class="content">
		<form action="<?php echo base_url().'pm/message/'.$band_profile->id; ?>" method="post">
	<input type="hidden" name="message_type" value="band">
			<div class="ui form">
				<div class="field">
					<textarea name="text"></textarea>
				</div>
			</div>		
	</div>
	<div class="actions">
		<div class="ui black small button">
			ยกเลิก
		</div>
		<input type="submit" class="ui red submit small button" value="ส่ง">
	</form>
	</div>
</div>
