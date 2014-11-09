<!-- Sidebar Job -->
	<div class="ui red vertical demo sidebar menu">
		<a class="item" href="<?= base_url('job/all') ?>">
			<i class="home icon"></i>
			งานทั้งหมด
		</a>
		<a class="item" href="<?= base_url('job/near') ?>">
			<i class="heart icon"></i>
			งานที่จัดใกล้เคียง
		</a><?php if ($this->session->userdata('user_type') == 2): ?>
		<a class="item" href="<?= base_url('job/interest') ?>">
			<i class="heart icon"></i>
			งานที่ฉันสนใจ
		</a><?php endif; ?>
		<a class="item" href="<?= base_url('job/my') ?>">
			<i class="tasks icon"></i>
			ประกาศของฉัน
		</a>
		<?php if($this->session->userdata('band_id') != NULL && $this->session->userdata('is_master') == 1): ?>
			<!-- Band jobs -->
			<div class="item">
				<b>วงดนตรี</b>
				<p></p>
			</div>
			<a class="item" href="<?= base_url('job/band/near') ?>">
				<i class="tasks icon"></i>
				งานที่จัดใกล้เคียงวงของฉัน
			</a>
			<a class="item" href="<?= base_url('job/band/interest') ?>">
				<i class="tasks icon"></i>
				งานที่วงของฉันสนใจ
			</a>
			<!--END Band jobs -->
		<?php endif; ?>
		<div class="item">
			<b>ค้นหางาน</b>
			<p></p>
			<form id="sidebar-search" action="<?= base_url('job/search') ?>" method="post">
				<div class="ui icon input">
					<input type="text" placeholder="ใส่คำค้นหา" name="keyword"/>
					<i class="inverted search icon"></i>
				</div>
			</form>
		</div>
		<div class="item">
		<b>สไตล์</b>
		<p><p/>
			<div class="ui red labels">
				<a class="ui label" href="<?= base_url('job/search/style/1') ?>">บลูส์</a>
				<a class="ui label" href="<?= base_url('job/search/style/2') ?>">คันทรี</a>
				<a class="ui label" href="<?= base_url('job/search/style/3') ?>">ฮิปฮอป</a>
				<a class="ui label" href="<?= base_url('job/search/style/4') ?>">แจ๊ส</a>
				<a class="ui label" href="<?= base_url('job/search/style/5') ?>">ลาติน</a>
				<a class="ui label" href="<?= base_url('job/search/style/6') ?>">ป็อป</a>
				<a class="ui label" href="<?= base_url('job/search/style/7') ?>">เรกเก้</a>
				<a class="ui label" href="<?= base_url('job/search/style/8') ?>">อาร์แอนด์บี</a>
				<a class="ui label" href="<?= base_url('job/search/style/9') ?>">ร็อค</a>
			</div>
		</div>
	</div>