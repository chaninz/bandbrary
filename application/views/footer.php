<footer></footer>

<!--Create modal-->
<div class="ui basic transition selection list createall modal">
	<div class="header">
		การสร้าง
	</div>
	<div class="content">
		<div class="ui inverted segment" style="padding: 0px;">
			<div class="ui inverted relaxed divided list" style="padding: 0px;">
				<a class="item" style="padding: 0.9em;" href="<?= base_url().'job/add' ?>">
					<div class="content">
						<div class="header">สร้างงาน</div> 
					</div>
				</a>
				<a class="item" style="padding: 0.9em;" href="<?= base_url('music/user') ?>">
					<div class="content">
						<div class="header">จัดการเพลงของคุณ</div>
					</div>
				</a>
				<?php if ($this->session->userdata('is_master') != NULL && $this->session->userdata('band_id') != NULL): ?>
					<a class="item" style="padding: 0.9em;" href="<?= base_url('music/band') ?>">
						<div class="content">
							<div class="header">จัดการเพลงของวง</div>
						</div>
					</a>
				<?php endif; ?>
				<?php if ($this->session->userdata('band_id') == NULL): ?>
					<a class="item" style="padding: 0.9em;" a href="<?= base_url().'band/create' ?>" > 
						<div class="content">
							<div class="header">สร้างวงดนตรี</div>
						</div>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="actions" style="padding: 0px">
		<div class="two fluid ui buttons" style="margin-left: 420px; width: 30%;">
			<a class="ui red button">ยกเลิก</a>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/js/bandbrary.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.uploadifive.js') ?>"></script>
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

	$(".reportband#bandreport").click(function(event){
		var id = $(this).attr("post-id");
		$('.bandid').val(id);
	});
	/* END-Report Modal */

	/* User update Status */
	$("#edit-status-button").click(function(event) {
		$("#status-msg").css("display", "none");
		$("#status-msg-field").css("display", "").val("").focus();
	});

	$("#status-msg-field").blur(function(event) {
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
	$("#band-edit-status-button").click(function(event) {
		$("#status-msg").css("display", "none");
		$("#band-status-msg-field").css("display", "").val("").focus();
	});

	$("#band-status-msg-field").blur(function(event) {
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

	/* Follow user button */
	$("#follow-user-button").click(function(event) {
		var userId = $(this).data("value");
		if ($("#follow-user-button").hasClass("following")) {
			var followUser = $.ajax({
				type: "GET",
				//async: false,
				url: "<?= base_url('following/user/unfollow').'/' ?>" + userId,
				dataType: "text"
			});

			followUser.done(function(msg) {
				$("#follow-user-button").html('<i class="add icon"></i>ติดตาม');
				$("#follow-user-button").removeClass("following");
			});
		} else {
			var followUser = $.ajax({
				type: "GET",
				//async: false,
				url: "<?= base_url('following/user/follow').'/' ?>" + userId,
				dataType: "text"
			});

			followUser.done(function(msg) {
				$("#follow-user-button").html('<i class="checkmark icon"></i>กำลังติดตาม');
				$("#follow-user-button").addClass("following");
			});
		}
	});
	/* END-Follow user button */

	/* Follow band button */
	$("#follow-band-button").click(function(event) {
		var bandId = $(this).data("value");
		if ($("#follow-band-button").hasClass("following")) {
			var followBand = $.ajax({
				type: "GET",
				//async: false,
				url: "<?= base_url('following/band/unfollow').'/' ?>" + bandId,
				dataType: "text"
			});

			followBand.done(function(msg) {
				$("#follow-band-button").html('<i class="add icon"></i>ติดตาม');
				$("#follow-band-button").removeClass("following");
			});
		} else {
			var followBand = $.ajax({
				type: "GET",
				//async: false,
				url: "<?= base_url('following/band/follow').'/' ?>" + bandId,
				dataType: "text"
			});

			followBand.done(function(msg) {
				$("#follow-band-button").html('<i class="checkmark icon"></i>กำลังติดตาม');
				$("#follow-band-button").addClass("following");
			});
		}
	});
	/* END-Follow band button */

	/* Greedd user music button */
	$("#greedd-user-music-button").click(function() {
		var musicId = $(this).data("value");
		if ($("#greedd-user-music-button").hasClass("active")) {
			var greeddMusic = $.ajax({
				type: "GET",
				//async: false,
				url: "<?= base_url('music/user/ungreedd').'/' ?>" + musicId,
				dataType: "text"
			});

			greeddMusic.done(function(msg) {
				$("#greedd-user-music-button").html('<i class="heart icon"></i> กรี๊ด');
				$("#greedd-user-music-button").removeClass("active");
				var countGreedd = parseInt($("#count-greedd").text());
				countGreedd--;
				$("#count-greedd").text(countGreedd);
			});
		} else {
			var greeddMusic = $.ajax({
				type: "GET",
				//async: false,
				url: "<?= base_url('music/user/greedd').'/' ?>" + musicId,
				dataType: "text"
			});

			greeddMusic.done(function(msg) {
				$("#greedd-user-music-button").html('<i class="heart icon"></i> เลิกกรี๊ด');
				$("#greedd-user-music-button").addClass("active");
				var countGreedd = parseInt($("#count-greedd").text());
				countGreedd++;
				$("#count-greedd").text(countGreedd);
			});
		}
	});
	/* END-Greedd user music button */

	/* Greedd band music button */
	$("#greedd-band-music-button").click(function(event) {
		var musicId = $(this).data("value");
		if ($("#greedd-band-music-button").hasClass("active")) {
			var greeddMusic = $.ajax({
				type: "GET",
				//async: false,
				url: "<?= base_url('music/band/ungreedd').'/' ?>" + musicId,
				dataType: "text"
			});

			greeddMusic.done(function(msg) {
				$("#greedd-band-music-button").html('<i class="heart icon"></i> กรี๊ด');
				$("#greedd-band-music-button").removeClass("active");
				var countGreedd = parseInt($("#count-greedd").text());
				countGreedd--;
				$("#count-greedd").text(countGreedd);
			});
		} else {
			var greeddMusic = $.ajax({
				type: "GET",
				//async: false,
				url: "<?= base_url('music/band/greedd').'/' ?>" + musicId,
				dataType: "text"
			});

			greeddMusic.done(function(msg) {
				$("#greedd-band-music-button").html('<i class="heart icon"></i> เลิกกรี๊ด');
				$("#greedd-band-music-button").addClass("active");
				var countGreedd = parseInt($("#count-greedd").text());
				countGreedd++;
				$("#count-greedd").text(countGreedd);
			});
		}
	});
	/* END-Greedd band music button */

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