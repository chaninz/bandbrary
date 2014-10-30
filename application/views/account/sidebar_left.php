<div class="col-xs-3">
	<div class="ui vertical menu">
		<div class="header item">
			<i class="user icon"></i>
			บัญชีผู้ใช้
		</div>
		<div class="menu">
			<a href="<?= base_url('account/edit') ?>" class="item">ทั่วไป</a>
			<a href="<?= base_url('account/password') ?>" class="item">รหัสผ่าน</a>
		</div>
		<div class="header item">
			<i class="circle blank icon"></i>
			วงดนตรี
		</div>
		<div class="menu">
			<?php if ($this->session->userdata('user_type') == 2 && $this->session->userdata('band_id') != NULL): ?>
				<?php if ($this->session->userdata('is_master') == 1): ?>
					<a href="<?= base_url('band/edit') ?>" class="item">ข้อมูล</a>
				<?php endif; ?>
				<a href="<?= base_url('band/request') ?>" class="item">คำร้องขอเข้าร่วมวง</a>
				<a href="<?= base_url('band/role') ?>" class="item">สิทธิการใช้งาน</a>
			<?php elseif ($this->session->userdata('user_type') == 2 && $this->session->userdata('is_master') == NULL): ?>
				<a href="<?= base_url('band/create') ?>" class="item">สร้างวงดนตรี</a>
			<?php endif; ?>
		</div>
	</div>
</div>