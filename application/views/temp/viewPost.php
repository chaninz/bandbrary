<?php session_start(); ?>
<div>
	<form action="<?php echo base_url().'band/post/add'; ?>" method="post">

		<?php echo $_SESSION['id'];?>
		<? echo $_SESSION['name'];?>
		<input type="submit" class="btn" value="Share">

	</form>
</div>