<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $user_profile->name . " " . $user_profile->surname ?> - เพลง | Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
	.ui.segment {
		padding: 2em;
		-webkit-box-shadow: none; 
		box-shadow: none; 
		border-radius: 0px;
	}
	h2.ui.header {
		font-size: 2.5rem;
	}
	.ui.header .sub.header {
		font-size: 1.4rem;
	}
	.ui.table thead {
		border-bottom: 1px solid rgba(0, 0, 0, 0.03);
	}
	.ui.table thead th:first-child {
		border-radius: 0px;
	}
	.ui.table thead th:last-child {
		border-radius: 0px;
	}
	.ui.table th {
		background-color: rgba(0, 0, 50, 0.02);
		padding: 0.7em 0.7em;
	}
	.ui.table td {
		padding: 0.1em 0.7em;
	}
	.center {
		word-wrap: break-word;
	}
	</style>

</head>
<body>
	<?php $this->load->view('navigation'); ?>
	<?php $this->load->view('user/cover'); ?>
	<section>
		<article>
			<div class="container">
				<div class="row">
				<?php $this->load->view('user/sidebar_left'); ?>
				<div class="col-xs-9">
					<div class="center">
						<div class="album-group" style="margin-bottom: 15px;">
							<?php if ( ! empty($albums)): ?>
								<?php foreach($albums as $e_album): ?>
									<?php if ( ! empty($e_album->image_url)): ?>
										<a href="<?= base_url('album/user/view/' . $e_album->id) ?>"><img src="<?= base_url('uploads/album/' . $e_album->image_url) ?>" class="album-cover1"></a>
									<?php else: ?>
										<a href="<?= base_url('album/user/view/' . $e_album->id) ?>"><img src="<?= base_url('images/no_album_cover.jpg') ?>" class="album-cover1"></a>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						 <h3 class="ui header" style="float: left; margin: 0px;">
						อัลบั้ม <?= $album->name ?>
						</h3>
						<?php if ($this->session->userdata('id') == $user_profile->id && ! empty($albums)): ?>
							<a class="ui icon tiny button" style="float: right; margin-left: 10px" href="<?= base_url('album/user/delete/' . $album->id) ?>" onclick="return window.confirm('คุณต้องการลบอัลบั้ม <?= $album->name ?> ?')">
							  <i class="trash icon"></i>
							  ลบอัลบั้ม
							</a>
							<a class="ui icon tiny button" style="float: right;" href="<?= base_url('album/user/edit/' . $album->id) ?>">
							  <i class="edit icon"></i>
							  แก้ไขอัลบั้ม
							</a>
						<?php endif; ?>
						<div style="height: 30px"></div>
						<table class="ui table segment">
							<thead>
								<tr><th>#</th>
									<th>ชื่อเพลง</th>
									<th>อัลบั้ม</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php if ( ! empty($album_music)): ?>
									<?php $count = 1 ?>
									<?php foreach($album_music as $music): ?>
										<tr>
											<td><?= $count ?></td>
											<td>
												<?php if ( ! empty($music->image_url)): ?>
													<img src="<?= base_url('uploads/album/' . $music->image_url) ?>" alt class="album-cover2">
												<?php else: ?>
													<img src="<?= base_url('images/no_album_cover.jpg') ?>" alt class="album-cover2">
												<?php endif; ?>
												<a href="<?= base_url('music/user/view/' . $music->id) ?>" target="_blank"><?= $music->name ?></a>
											</td>
											<td><?= $music->album_name ?></td>
											<td>
												<?php if ($this->session->userdata('id') == $user_profile->id): ?>
													<a class="ui icon" style="font-size: 1.2em;" href="<?= base_url('music/user/edit/' . $music->id) ?>">
													  <i class="edit icon"></i>
													</a>
													<a class="ui icon" style="font-size: 1.2em;" href="<?= base_url('music/user/delete/' . $music->id) ?>" onclick="return window.confirm('คุณต้องการลบเพลงนี้ ?')">
													  <i class="trash icon"></i>
													</a>
												<?php endif; ?>
											</td>
										</tr>
										<?php $count++ ?>
									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>

<?php $this->load->view('footer'); ?>
</body>
</html>