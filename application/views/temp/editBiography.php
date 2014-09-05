<div>
	<form action="<?php echo base_url().'user/updateBiography'; ?>" method="post">
        <textarea name="biography" maxlength="255" style="width:100%;height:60px" required> <?php print_r($id); ?> </textarea>
        <input type="submit" class="btn" value="Share">
    </form>
</div>