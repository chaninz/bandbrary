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
		padding-left: 0px;
		padding-right: 0px;
		border: 0px solid #FFFFFF;
	}
	.ui.form.segment {
		height: 1280px;
		padding-top: 100px;
	}
	.ui.vertical.menu {
		width: 17.33rem;
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
		font-size: 1rem;
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
				<form action="<?= base_url('band/edit') ?>" method="post">
				<div class="ui form segment"><p>
					<h1>Edit Band Information</h1>
					<div class="line"></div><br><p>
					<div class="field">
						<label>Band Name</label>
						<input type="text" placeholder="" name="name" style="background-color: #EBEBEB;" value="<?= $name ?>" readonly> 
					</div>
					<div class="field">
						<label>Biography</label>
						<textarea name="biography" <?= $this->session->userdata('is_master') == 1 ? '' : 'readonly' ?>><?= $biography ?></textarea>
					</div>
					<div class="field">
						<label>Style</label>
						<div class="grouped inline fields">
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="1" name="style" <?= $style_id == 1 ? 'checked' : '' ?>>
									<label>Blues</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="2" name="style" <?= $style_id == 2 ? 'checked' : '' ?>>
									<label>Country</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="3" name="style" <?= $style_id == 3 ? 'checked' : '' ?>>
									<label>Electronic</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="4" name="style" <?= $style_id == 4 ? 'checked' : '' ?>>
									<label>Hip Hop</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="5" name="style" <?= $style_id == 5 ? 'checked' : '' ?>>
									<label>Jazz</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="6" name="style" <?= $style_id == 6 ? 'checked' : '' ?>>
									<label>Latin</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="7" name="style" <?= $style_id == 7 ? 'checked' : '' ?>>
									<label>Pop</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="8" name="style" <?= $style_id == 8 ? 'checked' : '' ?>>
									<label>Reggae</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="9" name="style" <?= $style_id == 9 ? 'checked' : '' ?>>
									<label>R&B</label>
								</div>
							</div>
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" value="10" name="style" <?= $style_id == 10 ? 'checked' : '' ?>>
									<label>Rock</label>
								</div>
							</div>
						</div>
					</div>
					<div class="field">
						<label>Facebook URL</label>
						<div class="ui left labeled icon input">
							<input type="text" placeholder="Facebook URL" name="fburl" value="<?= $fb_url ?>" <?= $this->session->userdata('is_master') == 1 ? '' : 'readonly' ?>>
							<i class="facebook icon"></i>
						</div>
					</div>
					<div class="field">
						<label>Twitter URL</label>
						<div class="ui left labeled icon input">
							<input type="text" placeholder="Twitter URL" name="twurl" value="<?= $tw_url ?>" <?= $this->session->userdata('is_master') == 1 ? '' : 'readonly' ?>>
							<i class="twitter icon"></i>
						</div>
					</div>
					<div class="field">
						<label>Youtube URL</label>
						<div class="ui left labeled icon input">
							<input type="text" placeholder="Youtube URL" name="yturl" value="<?= $yt_url ?>" <?= $this->session->userdata('is_master') == 1 ? '' : 'readonly' ?>>
							<i class="youtube icon"></i>
						</div>
					</div>
					<br><p><div class="line"></div><p>
					<?php if ($this->session->userdata('is_master') == 1): ?>
					<input type="submit" class="ui small red submit button" value="Save Change"/>
					<?php endif; ?>
				</div>
			</form>
			</div>
			<div class="col-xs-2"></div>
		</div>
	</div>

	<?php $this->load->view('footer'); ?>
</body>
</html>