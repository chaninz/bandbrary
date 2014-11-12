<footer></footer>

<!--Create modal-->
<div class="ui basic transition selection list createall modal">
	<div class="header">
		การสร้าง
	</div>
	<div class="content">
		<div class="ui inverted segment" style="padding: 0px;">
			<div class="ui inverted relaxed divided list" style="padding: 0px;">
				<div class="item" style="padding: 0.9em;">
					<a href="<?= base_url().'job/add' ?>" ><div class="content">
						<div class="header">สร้างงาน</div> 
					</div></a>
				</div>
				<div class="item" style="padding: 0.9em;">
					<div class="content">
						<div class="header">สร้างอัลบั้มเพลง</div>
					</div>
				</div>
				<div class="item" style="padding: 0.9em;">
					<a href="<?= base_url().'band/create' ?>" > <div class="content">
						<div class="header">สร้างวงดนตรี</div>
					</div> </a>
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
	/* Report Modal */
	$('.pm.modal')
	.modal('attach events', '.mbtn.pm', 'show');

	$('.reportuser.modal')
	.modal('attach events', '.mbtn.reportuser', 'show');

	$('.reportband.modal')
	.modal('attach events', '.mbtn.reportband', 'show');

	$('.createpost.modal')
	.modal('attach events', '.mbtn.createpost', 'show');

	$('.reportpost.modal')
	.modal('attach events', '.mbtn.reportpost', 'show');

	$('.createall.modal')
	.modal('attach events', '.mbtn.createall', 'show');

	$(".reportband#bandreport").click(function(){
		var id = $(this).attr("post-id");
		$('.bandid').val(id);
	});
	/* END-Report Modal */

	/* User update Status */
	$("#edit-status-button").click(function() {
		$("#status-msg").css("display", "none");
		$("#status-msg-field").css("display", "").val("").focus();
	});

	$("#status-msg-field").blur(function() {
		$("#status-msg").css("display", "");
		$("#status-msg-field").css("display", "none");
		var status = $("#status-msg-field").val();

		var statusAdd = $.ajax({
			type: "POST",
			async: false,
			url: "<?= base_url('status/user/add') ?>",
			data: {status: status},
			dataType: "text"
		});

		statusAdd.done(function(msg) {
			if (msg == 1) {
				$("#status-msg").text(status);
			}
		});
	});
	/* END-User update Status */

	/* Band update Status */
	$("#band-edit-status-button").click(function() {
		$("#status-msg").css("display", "none");
		$("#band-status-msg-field").css("display", "").val("").focus();
	});

	$("#band-status-msg-field").blur(function() {
		$("#status-msg").css("display", "");
		$("#band-status-msg-field").css("display", "none");
		var status = $("#band-status-msg-field").val();

		var statusAdd = $.ajax({
	        type: "POST",
	        async: false,
	        url: "<?= base_url('status/band/add') ?>",
	        data: {status: status},
	        dataType: "text"
	    });

		statusAdd.done(function(msg) {
			if (msg == 1) {
				$("#status-msg").text(status);
			}
		});
	});
	/* END-Band update Status */


	/* Member transition */
	$('.member.image')
	.transition('scale');
	$('.member.image')
	.transition('scale');
	/* End Member transition */

	/* Feed popup */
	$('.greedd.popup')
	.popup('hide','toggle');
	$('.rebox.popup')
	.popup('hide','toggle');
	$('.share.popup')
	.popup('hide','toggle');
	/* End Feed popup */

	/* Feed transition */
	$('.feed-user.box')
	.transition('fade');
	$('.feed-user.box')
	.transition('fade up');
	$('.feed-box.box')
	.transition('fade');
	$('.feed-box.box')
	.transition('fade up');
	$('.advt.box')
	.transition('fade');
	$('.advt.box')
	.transition('fade up');
	/* End Feed transition */
</script>