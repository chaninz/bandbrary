<!-- <footer>
	<div class="footleft"></div>
	<div class="footright"></div>
</footer> -->
<!--Create modal-->
<div class="ui basic transition selection list createall modal">
	<div class="header">
		การสร้าง
	</div>
	<div class="content">
		<div class="ui inverted segment" style="padding: 0px;">
			<div class="ui inverted relaxed divided list" style="padding: 0px;">
				<div class="item" style="padding: 0.9em;">
					<div class="content">
						<div class="header">สร้างงาน</div>
						An excellent companion
					</div>
				</div>
				<div class="item" style="padding: 0.9em;">
					<div class="content">
						<div class="header">สร้างอัลบั้มเพลง</div>
						A poodle, its pretty basic
					</div>
				</div>
				<div class="item" style="padding: 0.9em;">
					<div class="content">
						<div class="header">สร้างวงดนตรี</div>
						He's also a dog
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="actions" style="padding: 0px">
		<div class="two fluid ui buttons" style="margin-left: 420px; width: 30%;">
			<a class="ui red button">ยกเลิก</a>
		</div>
	</div>
</div>

<script src="<?php echo base_url().'assets/js/bandbrary.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/jquery-ui.min.js'; ?>"></script>
<script>
	$('.reportband.modal')
	.modal('attach events', '.mbtn.reportband', 'show');

	$('.createpost.modal')
	.modal('attach events', '.mbtn.createpost', 'show');

	$('.reportpost.modal')
	.modal('attach events', '.mbtn.reportpost', 'show');

	$('.createall.modal')
	.modal('attach events', '.mbtn.createall', 'show');
</script>