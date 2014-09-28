<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
	a.list-group-item.active > .badge, .nav-pills > .active > a > .badge {
		color: #E72A30;
	}
	.center {
		background-color: #F7F6F6; 
		margin-top: 14px;
		margin-left: 4px;
		-webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
		box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
		word-wrap: break-word;
		padding: 25px;
	}
	h2.ui.header {
		font-size: 2.5rem;
	}
	.ui.header .sub.header {
		font-size: 1.4rem;
	}
	</style>

</head>
<body>
	<?php $this->load->view('navigation'); ?>
	<?php $this->load->view('band/cover'); ?>
	<section>
		<article>
			<div class="container">
				<div class="row">
				</div>
					<?php $this->load->view('band/sidebar_left'); ?>
					<div class="col-xs-7">
						<div class="center">
							<div class="album-group">
								<img src="../../images/bodyslam.jpg" alt="" class="album-cover1">
								<img src="../../images/drive.jpg" alt="" class="album-cover1">
								<img src="../../images/believe.jpg" alt="" class="album-cover1">
								<img src="../../images/kramm.jpg" alt="" class="album-cover1">
								<img src="../../images/dharmajati.jpg" alt="" class="album-cover1">
							</div>
							<table class="ui table segment">
								<thead>
									<tr><th>#</th>
										<th>Name</th>
										<th>Artist</th>
										<th>Genre</th>
										<th>Rating</th>
										<th>...</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											<img src="../../images/dharmajati.jpg" alt class="album-cover2">
											เตรียมตัวตาย
										</td>
										<td>Bodyslam</td>
										<td>Rock</td>
										<td>
											<div class="ui large rating">
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
											</div>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>2</td>
										<td>
											<img src="../../images/dharmajati.jpg" alt class="album-cover2">
											เรือเล็กควรออกจากฝั่ง
										</td>
										<td>Bodyslam</td>
										<td>Rock</td>
										<td>
											<div class="ui large rating">
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
											</div>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>3</td>
										<td>
											<img src="../../images/dharmajati.jpg" alt class="album-cover2">
											ชีวิตยังคงสวยงาม
										</td>
										<td>Bodyslam</td>
										<td>Rock</td>
										<td>
											<div class="ui large rating">
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
											</div>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>4</td>
										<td>
											<img src="../../images/dharmajati.jpg" alt class="album-cover2">
											ปลิดปลิว (feat. เมธี Labanoon)
										</td>
										<td>Bodyslam</td>
										<td>Rock</td>
										<td>
											<div class="ui large rating">
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
											</div>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>5</td>
										<td>
											<img src="../../images/dharmajati.jpg" alt class="album-cover2">
											dharmajāti (ดัม-มะ-ชา-ติ)
										</td>
										<td>Bodyslam</td>
										<td>Rock</td>
										<td>
											<div class="ui large rating">
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
											</div>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>6</td>
										<td><img src="../../images/dharmajati.jpg" alt class="album-cover2">
											ครึ่งหลับครึ่งตื่น
										</td>
										<td>Bodyslam</td>
										<td>Rock</td>
										<td>
											<div class="ui large rating">
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
											</div>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>7</td>
										<td>
											<img src="../../images/dharmajati.jpg" alt class="album-cover2">คิดถึง
										</td>
										<td>Bodyslam</td>
										<td>Rock</td>
										<td>
											<div class="ui large rating">
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
											</div>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>8</td>
										<td>
											<img src="../../images/dharmajati.jpg" alt class="album-cover2">
											รักอยู่ข้างเธอ (feat. อัญชลี จงคดีกิจ)
										</td>
										<td>Bodyslam</td>
										<td>Rock</td>
										<td>
											<div class="ui large rating">
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
											</div>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>9</td>
										<td>
											<img src="../../images/dharmajati.jpg" alt class="album-cover2">
											ความฝันกับจักรวาล
										</td>
										<td>Bodyslam</td>
										<td>Rock</td>
										<td>
											<div class="ui large rating">
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
											</div>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>10</td>
										<td>
											<img src="../../images/dharmajati.jpg" alt class="album-cover2">
											ช่างมันเถอะเหงา
										</td>
										<td>Bodyslam</td>
										<td>Rock</td>
										<td>
											<div class="ui large rating">
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
												<i class="icon"></i>
											</div>
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-xs-2">
						<div class="advt"></div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<?php $this->load->view('footer'); ?>
</body>
</html>