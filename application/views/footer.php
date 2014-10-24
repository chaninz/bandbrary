<!-- <footer>
	<div class="footleft"></div>
	<div class="footright"></div>
</footer> -->
<script src="<?php echo base_url().'assets/js/bandbrary.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/jquery-ui.min.js'; ?>"></script>
<script>
$('.createall.modal')
.modal('attach events', '.test.createall', 'show');
$('.createpost.modal')
.modal('attach events', '.test.createpost', 'show');
$('.reportpost.modal')
.modal('attach events', '.test.reportpost', 'show');
$('.reportuser.modal')
.modal('attach events', '.test.reportuser', 'show');
$('.reportband.modal')
.modal('attach events', '.test.reportband', 'show');
</script>