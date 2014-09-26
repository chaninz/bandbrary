<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

	<?php $this->load->view('header'); ?>

	<style>
	body {
		background: #FFFFFF url('../../images/noise-2.png');
	}
	.ui.menu .item {
		font-size: 1.5rem;
	}
	.ui.buttons .button, .ui.button {
		font-size: 1.3rem;
	}
	.ui.items .item > .image > img {
		height: 120px;
	}
	.ui.items:first-child {
		margin-top: 2em;
	}
	
	.ui.items > .row > .item, .ui.items > .item {
		padding: 0px;
	}
	.ui.segment {
		padding-top: 10px;
		padding-bottom: 2px;
		padding-left: 0px;
		padding-right: 0px;
	}
	.ui.items {
		margin: 0px;
	}
	i.inverted.icon {
		background-color: #E72A30;
	}
	.ui.label {
		font-size: 1.1rem;
	}
	.ui.red.labels .label, .ui.red.label {
		margin-top: 4px;
		margin-left: 2px;
	}
	.ui.items .item > .content > .description {
		height: 130px;
	}
	</style>
</head>
<body>

	<?php $this->load->view('headerBar'); ?>

	<div class="job-top">

		<div class="job-hea1">
			All Jobs
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<div class="job-hea2">Explore <span class="job-total"><?php  echo $countJob ?></span> Jobs</div>
			</div>
			<div class="col-xs-2"></div>
		</div>
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
				<div class="ui four items">
					<?php 
							foreach ($jobs as $job) {
						echo '
					<div id="preview-job" class="item view job">
						<div class="image">
							<img src="../../../images/bass.jpg">
							<a class="star ui corner label">
								<i class="star icon"></i>
							</a>
						</div>
						
						<div class="content">
							<div class="name">'.$job->name.'</div>
							<p class="description">'.$job->description.'</p>
						</div>
						<i id="job-icon" class="map marker icon"></i>
						<span class="job-location">Bangkok, Thailand</span>
						<div class="job-red-line"></div>
					</div>
					';
							} ?>
				<!-- 	<div id="preview-job" class="item view job">
						<div class="image">
							<img src="../../../images/drum.jpg">
							<a class="star ui corner label">
								<i class="star icon"></i>
							</a>
						</div>
						<div class="content">
							<div class="name">Faithful Dog</div>
							<p class="description">Sometimes its more important to have a dog you know you can trust. But not every dog is trustworthy, you can tell by looking at its smile.</p>
						</div>
						<i id="job-icon" class="map marker icon"></i>
						<span class="job-location">Bangkok, Thailand</span>
						<div class="job-red-line"></div>
					</div>
					<div id="preview-job" class="item view job">
						<div class="image">
							<img src="../../../images/micro.jpg">
							<a class="star ui corner label">
								<i class="star icon"></i>
							</a>
						</div>
						<div class="content">
							<div class="name">Silly Dog</div>
							<p class="description">Silly dogs can be quite fun to have as companions. You never know what kind of ridiculous thing they will do.</p>
						</div>
						<i id="job-icon" class="map marker icon"></i>
						<span class="job-location">Bangkok, Thailand</span>
						<div class="job-red-line"></div>
					</div>
					<div id="preview-job" class="item view job">
						<div class="image">
							<img src="../../../images/piano.jpg">
							<a class="star ui corner label">
								<i class="star icon"></i>
							</a>
						</div>
						<div class="content">
							<div class="name">Happy Dog</div>
							<p class="description">Happy dogs are pretty interesting if you are an unhappy person.</p>
						</div>
						<i id="job-icon" class="map marker icon"></i>
						<span class="job-location">Bangkok, Thailand</span>
						<div class="job-red-line"></div>
					</div> -->
				</div>
			</div>
			<div class="col-xs-2">
				<a id="job-btn-add" class="circular ui red icon add button" href="createJob.php">
					<i class="icon add"></i>
				</a>
				<div id="job-btn-menu" class="circular ui red icon toggle button">
					<i class="icon reorder"></i>
				</div>
			</div>
		</div>
	</div>


	<!-- Sidebar Job -->
	<div class="ui red vertical demo sidebar menu">
		<a class="item">
			<i class="home icon"></i>
			All Jobs
		</a>
		<a class="active item">
			<i class="heart icon"></i>
			Pin Jobs
		</a>
		<a class="item">
			<i class="tasks icon"></i>
			Get Jobs
		</a>
		<div class="item">
			<b>Search</b>
			<p/>
			<div class="ui icon input">
				<input type="text" placeholder="Search...">
				<i class="inverted search icon"></i>
			</div>
		</div>
		<div class="item">
			<b>Tag</b>
			<p/>
			<div class="ui red labels">
				<a class="ui label">
					Blues
				</a>
				<a class="ui label">
					Country
				</a>
				<a class="ui label">
					Hip Hop
				</a>
				<a class="ui label">
					Jazz
				</a>
				<a class="ui label">
					Latin
				</a>
				<a class="ui label">
					Pop
				</a>
				<a class="ui label">
					Reggae
				</a>
				<a class="ui label">
					R&B
				</a>
				<a class="ui label">
					Rock
				</a>
				<a class="ui label">
					Wedding
				</a>
				<a class="ui label">
					Restuarant
				</a>
				<a class="ui label">
					Hotel
				</a>
			</div>
		</div>
	</div>

	<!-- View job modal -->
	<div class="ui form segment create modal">
		<i class="close icon"></i>
		<div class="header">
			<?php echo $job->name; ?>
		</div>
		<div class="content">
			<div class="left" style="width: 60px">
				<img src="" alt="" class="job-img">
				<div class="ui divided list">
					<div class="item">
						<div class="content">
							<div class="header">Start Time</div>
							He's also a dog
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">End Time</div>
							He's also a dog
						</div>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="ui divided list">
					<div class="item">
						<div class="content">
							<div class="header">Type</div>
							An excellent companion
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Style</div>
							A poodle, its pretty basic
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Venue</div>
							He's also a dog
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Province</div>
							He's also a dog
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Budget</div>
							He's also a dog
						</div>
					</div>
					<div class="item">
						<div class="content">
							<div class="header">Description</div>
							Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.
							Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="actions">
			<div class="ui button">Pin Job</div>
			<input type="submit" class="ui red submit button" value="Get job">
		</div>
	</div>

	<script src="../../../assets/js/bandbrary.js"></script>
	<script>
	$('.demo.sidebar').first()
	.sidebar('attach events', '.toggle.button');
	$('.create.modal')
	.modal('attach events', '.view.job', 'show');
	</script>
</body>
</html>