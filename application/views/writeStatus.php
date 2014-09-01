<div>
	<form action="<?php echo base_url().'user/updateStatus'; ?>" method="post">
        <textarea name="content" maxlength="255" style="width:100%;height:60px" required> <?php print_r($username); ?> </textarea>
        <input type="submit" class="btn" value="Share">
    </form>
</div>