<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>

	<style>
	.ui.piled.segment:after, .ui.piled.segment:before {
		background-color: #F7F6F6;
	}
	i.circular.icon {
		box-shadow: 0em 0em 0em 0.1em #FFFFFF inset;
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
						<div class="ui piled feed segment" style="margin-top: 20px; z-index: 1;">
							<div class="event">
								<div class="label">
									<i class="circular music icon"></i>
								</div>
								<div class="content">
									<div class="date">
										3 days ago
									</div>
									<div class="summary">
										Chanin Nualprasong ได้เพิ่มเพลงใหม่
									</div>
									<div class="extra text">
										<a>เพลง รักเธอทั้งหมดของหัวใจ</a>
									</div>
								</div>
							</div>
							<div class="event">
								<div class="label">
									<i class="circular pencil icon"></i>
								</div>
								<div class="content">
									<div class="date">
										3 days ago
									</div>
									<div class="summary">
										Chanin Nualprasong ได้เขียนโพสต์ใหม่
									</div>
									<div class="extra text">
										<a> เนื้อเพลง รักเธอทั้งหมดของหัวใจ </a>
									</div>
								</div>
							</div>
							<div class="event">
								<div class="label">
									<i class="circular text file icon"></i>
								</div>
								<div class="content">
									<div class="date">
										3 days ago
									</div>
									<div class="summary">
										Chanin Nualprasong ได้อัพเดตสถานะใหม่
									</div>
									<div class="extra text">
										<a> เบื่อ เซง อยากมีแฟน </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>

	<?php $this->load->view('footer'); ?>
</body>
</html>