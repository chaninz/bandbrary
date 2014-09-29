<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

	<?php $this->load->view('header'); ?>

</head>
<style>
	.col-xs-2 {
		height: 1280px;
		background-color: #FFFFFF;
	}
	.col-xs-3 {
		height: 1280px;
		float: left;
		background-color: #f7f7f7;
		border-left: 1px solid #C0C0C0;
		border-right: 1px solid #C0C0C0;
		-webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
		-moz-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
		box-shadow: 0 1px 0px rgba(0,0,0,0.05);
		background-color: #F7F6F6 ;
		padding-left: 0px;
		padding-right: 0px;
	}
	.col-xs-7 {
		height: 1280px;
		padding-left: 0px;
		padding-right: 0px;
		border: 0px solid #FFFFFF;
		background-color: #FFFFFF;
		padding: 100px 1em 1em 1em;
	}
	.ui.form.segment {
		height: 1280px;
		padding-top: 100px;
	}
	.ui.vertical.menu {
		width: 29rem;
		border-radius: 0px;
		padding-top: 80px;
	}
	.ui.vertical.menu > .active.item {
		box-shadow: 0em 0 0 inset;
	}
	.ui.vertical.pointing.menu > .active.item:after {
		border-top: 0px;
		border-right: 0px;
		border-left: 1px solid #C0C0C0;;
		margin-top: -.4em;
		left: 28.9rem;
	}
	.ui.pointing.menu > .active.item:after {
		background-color: #FFFFFF;
		width: .8em;
		height: .8em;
	}
	.ui.menu {
		background-color: #F7F6F6;
	}
	.ui.menu .item {
		font-size: 1.5rem;
		padding: 1em 1em;
	}
	.ui.form.segment{
		-webkit-box-shadow: none;
		box-shadow: none;
	}
	.line {
		width: 750px;
	}
	.footmix {
		margin-top: 0px;
	}
</style>
<body>
		<?php $this->load->view('navigation'); ?>

	<div class="container">
		<div class="row">
			<?php $this->load->view('account/sidebar_left'); ?>
			<div class="col-xs-7">
				<table class="ui table segment">
					<p>
						<h1>Band Roles</h1>
						<div class="line"></div><br><p>
						<thead>
							<tr><th>Name</th>
								<th>Band Master</th>
							</tr></thead>
							<tbody>
								<?php foreach ($band_members as $band_member): ?>
								<tr>
									<td><?= $band_member->name.' '.$band_member->surname ?></td>
									<td><?php if ($this->session->userdata('is_master') == 1): ?>
											<?php if ($band_member->is_master == 1): ?>
											<a class="ui green submit button" href="<?= base_url('band/role/unmaster/'.$band_member->id) ?>">Yes</a>
											<?php else: ?>
											<a class="ui submit button" href="<?= base_url('band/role/master/'.$band_member->id) ?>">No</a>
											<?php endif; ?>
										<?php else: ?>
											<?php if ($band_member->is_master == 1): ?>
											<a class="ui submit button">Yes</a>
											<?php else: ?>
											<a class="ui submit button">No</a>
											<?php endif; ?>
										<?php endif; ?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
							<?php if ($this->session->userdata('is_master') == 1): ?>
							<tfoot>
								<tr><th colspan="3">
									<div class="ui form">
										<div class="field">
											<input type="text" placeholder="Invite more member">
										</div>
									</div>
								</th>
							</tr></tfoot>
							<?php endif; ?>
						</table>
						<br><p><div class="line"></div><p>
						<!-- <div class="ui red submit button">Save Change</div> -->
					</form>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>

			<?php $this->load->view('footer'); ?>
			<script>
			</script>
		</body>
		</html>