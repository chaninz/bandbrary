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
						<div class="album-group">
							<?php if ( ! empty($albums)): ?>
								<?php foreach($albums as $album): ?>
									<?php if ( ! empty($album->image_url)): ?>
										<a href="<?= base_url('album/user/view/' . $album->id) ?>"><img src="<?= base_url('uploads/album/' . $album->image_url) ?>" class="album-cover1"></a>
									<?php else: ?>
										<a href="<?= base_url('album/user/view/' . $album->id) ?>"><img src="<?= base_url('images/no_album_cover.jpg') ?>" class="album-cover1"></a>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<table class="ui table segment">
							<thead>
								<tr><th>#</th>
									<th>Name</th>
									<th>Album</th>
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