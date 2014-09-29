<div class="col-xs-3">
	<div class="ui vertical menu">
		<div class="header item">
			<i class="user icon"></i>
			ACCOUNT
		</div>
		<div class="menu">
			<a href="<?= base_url('account/edit') ?>" class="item">Genaral</a>
			<a href="<?= base_url('account/password') ?>" class="item">Password</a>
		</div>
		<div class="header item">
			<i class="circle blank icon"></i>
			BAND
		</div>
		<div class="menu">
			<?php if ($this->session->userdata('user_type') == 2 && $this->session->userdata('band_id') == NULL): ?>
			<a href="<?= base_url('band/create') ?>" class="item">Create Band</a>
			<?php else: ?>
			<a href="<?= base_url('band/edit') ?>" class="item">Information</a>
			<a href="<?= base_url('band/request') ?>" class="item">Join Request</a>
			<a href="<?= base_url('band/role') ?>" class="item">Roles</a>
			<?php endif; ?>
		</div>
	</div>
</div>