<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
	.col-xs-3 {
		height: 1280px;
		background-color: #FFFFFF;
		padding-top: 100px;
	}
	.col-xs-9 {
		height: 1280px;
		background-color: #FFFFFF;
		padding-top: 100px;
	}
	.ui.menu .item {
		font-size: 1.8rem;
	}
	.ui.vertical.menu .item > .menu > .item {
		padding: 1rem 1.5rem;
		font-size: 0.9em;
	}
	.audio-player {
		width: 840px;
		margin-top: 30px;
		margin-bottom: 20px;
	}
	.ui.header {
		font-size: 1.7em;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-3">
				<div class="ui fluid vertical menu">
					<a class="item" href="<?= base_url().'discover/disPopArtist' ?> ">
						Popular Artist
					</a>
					<a class="item" href="<?= base_url().'discover/disTopMusic' ?> ">
						20 Top Music Chart
					</a>
					<div class="item">
						<div class="menu">
							<a class="item" href="<?= base_url().'discover/disBlues' ?> ">Blue</a>
							<a class="item">Country</a>
							<a class="item">Hiphop</a>
							<a class="item">Jazz</a>
							<a class="item">Pop</a>
							<a class="item">Reggae</a>
							<a class="item">R&B</a>
							<a class="item">Rock</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-9">
				<div class="ui header">20 Top Music Chart on Bandbrary</div>
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
										<img src="<?= base_url('images/t1.jpg') ?>" alt class="album-cover2">
										มีคนคิดถึง
									</td>
									<td>Slot Machine</td>
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
										<img src="<?= base_url('images/t2.jpg') ?>" alt class="album-cover2">
										ให้ตายสิพับผ่า
									</td>
									<td>แสตมป์ อภิวัชร์</td>
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
										<img src="<?= base_url('images/t3.jpg') ?>" alt class="album-cover2">
										เธอ
									</td>
									<td>Cocktail</td>
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
										<img src="<?= base_url('images/t4.jpg') ?>" alt class="album-cover2">
										ที่ว่างข้างๆตัว
									</td>
									<td>หนึ่ง ETC</td>
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
										<img src="<?= base_url('images/t5.jpg') ?>" alt class="album-cover2">
										ไม่เอาไหน
									</td>
									<td>Muzu</td>
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
									<td><img src="<?= base_url('images/t6.jpg') ?>" alt class="album-cover2">
										เจ็บลืม
									</td>
									<td>Gene Kasidit</td>
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
										<img src="<?= base_url('images/t7.jpg') ?>" alt class="album-cover2">
										ลองคุย
									</td>
									<td>Lipta feat. Southside</td>
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
										<img src="<?= base_url('images/t8.jpg') ?>" alt class="album-cover2">
										อาบน้ำร้อน
									</td>
									<td>Big Ass</td>
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
										<img src="<?= base_url('images/t9.jpg') ?>" alt class="album-cover2">
										Happy
									</td>
									<td>Helmetheads</td>
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
										<img src="<?= base_url('images/t10.jpg') ?>" alt class="album-cover2">
										เดือด
									</td>
									<td>Buddha Bless feat. โป่ง หินเหล็กไฟ</td>
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
									<td>11</td>
									<td>
										<img src="<?= base_url('images/t11.jpg') ?>" alt class="album-cover2">
										ทบทวน
									</td>
									<td>Moderndog</td>
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
									<td>12</td>
									<td>
										<img src="<?= base_url('images/t12.jpg') ?>" alt class="album-cover2">
										คนตายที่หายใจ
									</td>
									<td>Rock Rider</td>
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
									<td>13</td>
									<td>
										<img src="<?= base_url('images/t13.jpg') ?>" alt class="album-cover2">
										ยิ่งรักยิ่งห่าง
									</td>
									<td>สิงโต นำโชค</td>
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
									<td>14</td>
									<td>
										<img src="<?= base_url('images/t14.jpg') ?>" alt class="album-cover2">
										จัดไปอย่าให้เสีย
									</td>
									<td>Mild</td>
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
									<td>15</td>
									<td>
										<img src="<?= base_url('images/t15.jpg') ?>" alt class="album-cover2">
										ช่างมัน
									</td>
									<td>สมเกียรติ</td>
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
									<td>16</td>
									<td><img src="<?= base_url('images/t16.jpg') ?>" alt class="album-cover2">
										นักเลงคีบอร์ด
									</td>
									<td>สแตมป์ อภิวัชร์</td>
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
									<td>17</td>
									<td>
										<img src="<?= base_url('images/t17.jpg') ?>" alt class="album-cover2">
										เจ็บแล้วไม่จำ
									</td>
									<td>Tattoo Colour</td>
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
									<td>18</td>
									<td>
										<img src="<?= base_url('images/t18.jpg') ?>" alt class="album-cover2">
										ของฟรีไม่มีในโลก
									</td>
									<td>G-Twenty</td>
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
									<td>19</td>
									<td>
										<img src="<?= base_url('images/t19.jpg') ?>" alt class="album-cover2">
										คิด
									</td>
									<td>ละอองฟอง</td>
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
									<td>20</td>
									<td>
										<img src="<?= base_url('images/t20.jpg') ?>" alt class="album-cover2">
										ไม่เป็นไร
									</td>
									<td>Nap A Lean</td>
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
	</div>
	<?php $this->load->view('footer'); ?>
	<script></script>
</body>
</html>