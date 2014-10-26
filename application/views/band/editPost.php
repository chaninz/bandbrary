<div>
	<form action="<?php echo base_url().'band/post/edit'; ?>" method="post">
		<input type="text" placeholder="topic" name="topic" readonly> <br>
		<input type="text" placeholder="post" name="post"> <br
		<input type="file" placeholder="file" name="imageurl"> <br>
		<input type="submit" class="btn" value="Share">

	</form>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

	<?php $this->load->view('header'); ?>

	<style>
	.ui.header {
		font-size: 2.4em;
		margin-left: 60px;
		font-weight: bold;
	}
	.col-xs-8 {
		padding-top: 70px;
	}
	.col-xs-6 {
		padding-bottom: 70px;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
			<form action="<?php echo base_url().'band/post/edit'; ?>" method="post">	
				<div class="ui header">
					Edit Post
				</div>
				<p/>
				<div class="line"></div>
				<p/><br/>
			</div>
			<div class="col-xs-2"></div>
		</div>
		<div class="row">
			<div class="col-xs-3"></div>
			<div class="col-xs-6">
				<div class="ui form segment">
					<div class="field">
						<label>Title</label>
						<input type="text" placeholder="" name="topic" value="<?php echo $topic; ?>"readonly>
					</div>
					<div class="field">
						<label>Description</label>
						<textarea name="post"><?php echo $post; ?></textarea>
					</div>
					<div class="field">
						<label>Profile Photo</label>
						<input type="file" name="image_url" value="<?php echo $image_url; ?>">
					</div>
					<input class="ui red submit button" type="submit" value="บันทึก">
				</form>
				</div>
			</div>
			<div class="col-xs-3"></div>
		</div>
	</div>
</body>
</html>