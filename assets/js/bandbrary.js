	$(document)
	.ready(function() {
		$('.ui.dropdown')
		.dropdown();
		$('.ui.checkbox')
		.checkbox();
		$('.ui.radio.checkbox')
		.checkbox();
		$('.ui.accordion')
		.accordion();
		$("#confirm-pass,#password").change(function(event) {
			var confirmPass = $("#confirm-pass").val();
			var password = $("#password").val();

			if (confirmPass != password) {
				$("#errorMsg").text("Invalid password");
			} else {
				$("#errorMsg").text("");
			}
		});

		var
		$buttons = $('.ui.buttons .button'),
		$toggle  = $('.main .ui.toggle.button'),
		$button  = $('.ui.button').not($buttons).not($toggle),
		handler = {
			activate: function() {
				if ( ! $(this).hasClass('disabled')) {
					$(this)
					.addClass('active')
					.siblings()
					.removeClass('active')
					;
					$('#user-type').val($(this).data('value'));
				}
			}
		};

		$buttons
		.on('click', handler.activate)
		;

		/* Navigation logo */
		$(window).scroll (function (event) {
			var sT = $(this).scrollTop();
			isScroll = true;
			if (sT >= 40 && isScroll) {
				$(".bb-logo").css({
					"margin-top": "-45px"
				});
			} else {
				$(".bb-logo").css({
					"margin-top": "22px"
				});
			}
		});
		/* END-Navigation logo */

		/*********/
		/* Home */
		/*********/

		/* Submit sign in form */
		$( "#signin-button" ).click(function(event) {
			event.preventDefault();
			$( ".signin-form" ).submit();
		});
		$(".signin-field").keypress(function(event) {
			if (event.which == 13) {
				event.preventDefault();
				$(".signin-form").submit();
			}
		});

		/* Sign up form validation */

		$('#signup-form')
		.form({
			username: {
				identifier : 'username',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกชื่อผู้ใช้'
				},
				{
					type   : 'isNotExist[account/signup/check_username,username]',
					prompt : 'ชื่อผู้ใช้นี้ถูกใช้แล้ว'
				}
				]
			},
			password: {
				identifier : 'password',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกรหัสผ่าน'
				}
				]
			},
			confirmPassword: {
				identifier : 'confirm-password',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกรหัสผ่านอีกครั้ง'
				},
				{
					type   : 'match[password]',
					prompt : 'รหัสผ่านไม่ตรงกัน'
				}
				]
			},
			email: {
				identifier : 'email',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกอีเมล์ของคุณ'
				},
				{
					type   : 'email',
					prompt : 'อีเมล์ไม่ถูกต้อง'
				},
				{
					type   : 'isNotExist[account/signup/check_email,email]',
					prompt : 'อีเมลนี้ถูกใช้แล้ว'
				}
				]
			},
			userType: {
				identifier : 'user-type',
				rules: [
				{
					type   : 'not[0]',
					prompt : 'กรุณาเลือกประเภทของสมาชิก'
				}
				]
			}
		}, {
			inline : true,
			on     : 'blur'
		});

		/***********/
		/* Sign in */
		/***********/

		$('#signin-form')
		.form({
			username: {
				identifier : 'username',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกชื่อผู้ใช้'
				}
				]
			},
			password: {
				identifier : 'password',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกรหัสผ่าน'
				}
				]
			}
		});

		/***********/
		/* Initial */
		/***********/

		$('.initial-form')
		.form({
			name: {
				identifier : 'name',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			surName: {
				identifier : 'surname',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			dob: {
				identifier : 'dob',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			province: {
				identifier : 'province',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			style: {
				identifier : 'style',
				rules: [
				{
					type   : 'checked'
				}
				]
			},
			skill: {
				identifier : 'skill',
				rules: [
				{
					type   : 'checked'
				}
				]
			}
		});

		/* Submit initial form */
		$( "#initial-button" ).click(function(event) {
			event.preventDefault();
			$( ".initial-form" ).submit();
		});


		/***********/
		/* Cover */
		/***********/

		$("#follow").click(function() {
			follow(url);
		});

		/****************************/
		/* Change fixed to relative */
		/****************************/

		$(document).ready(function() {
			$('.navbar-item1')
			$('.navbar-item2')
			$('.bb-logo')
			$('.navbar-item3')
			$('.navbar-item4').click(function(event) {
				if ($( document ).width() < 1024)
					$('header').css('position', 'relative');
				else
					$('header').css('position', 'fixed');
			});
		});

		/*******************/
		/* Change Password */
		/*******************/

		$('#change-password-form')
		.form({
			currentPassword: {
				identifier : 'current-password',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกรหัสผ่านปัจจุบัน'
				}
				]
			},
			newPassword: {
				identifier : 'new-password',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกรหัสผ่านใหม่'
				}
				]
			},
			confirmPassword: {
				identifier : 'confirm-password',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกรหัสผ่านใหม่อีกครั้ง'
				},
				{
					type   : 'match[new-password]',
					prompt : 'รหัสผ่านใหม่ไม่ตรงกัน'
				}
				]
			}
		});

		/*******************/
		/* Forgot Password */
		/*******************/

		$('#forgot-password-form')
		.form({
			username: {
				identifier : 'username',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกชื่อผู้ใช้'
				}
				]
			}
		});

		/******************/
		/* Reset Password */
		/******************/

		$('#reset-password-form')
		.form({
			newPassword: {
				identifier : 'new-password',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกรหัสผ่านใหม่'
				}
				]
			},
			confirmPassword: {
				identifier : 'confirm-password',
				rules: [
				{
					type   : 'empty',
					prompt : 'กรุณากรอกรหัสผ่านใหม่อีกครั้ง'
				},
				{
					type   : 'match[new-password]',
					prompt : 'รหัสผ่านใหม่ไม่ตรงกัน'
				}
				]
			}
		});

		/****************/
		/* Edit Account */
		/****************/

		$('#edit-account')
		.form({
			name: {
				identifier : 'name',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			surName: {
				identifier : 'surname',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			province: {
				identifier : 'province',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			style: {
				identifier : 'style',
				rules: [
				{
					type   : 'checked'
				}
				]
			},
			skill: {
				identifier : 'skill',
				rules: [
				{
					type   : 'checked'
				}
				]
			}
		});
		$("#edit-account").keypress(function(event) {
			if (event.which == 13) {
				event.preventDefault();
			}
		});

		/***********/
		/* Add Job */
		/***********/

		$('#add-job')
		.form({
			name: {
				identifier : 'name',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			jobType: {
				identifier : 'type',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			style: {
				identifier : 'style',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			description: {
				identifier : 'description',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			venue: {
				identifier : 'venue',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			skill: {
				identifier : 'skill',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			province: {
				identifier : 'province',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			budget: {
				identifier : 'budget',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			date: {
				identifier : 'date',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			startTime: {
				identifier : 'time',
				rules: [
				{
					type   : 'time'
				}
				]
			},
			duration: {
				identifier : 'duration',
				rules: [
				{
					type   : 'empty'
				}
				]
			}
		});

		/***************/
		/* Job Sidebar */
		/***************/

		$("#sidebar-search").keypress(function(event) {
				if (event.which == 13) {
					event.preventDefault();
					$("#sidebar-search").submit();
				}
		});

		/*********๕๕๕๕**/
		/* Add Event */
		/********๕๕๕***/

		$('#event-form')
		.form({
			name: {
				identifier : 'event',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			venue: {
				identifier : 'venue',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			province: {
				identifier : 'province',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			description: {
				identifier : 'description',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			date: {
				identifier : 'date',
				rules: [
				{
					type   : 'empty'
				}
				]
			},
			time: {
				identifier : 'time',
				rules: [
				{
					type   : 'time'
				}
				]
			}
		});

		/*********๕๕๕๕**/
		/* Add Event */
		/********๕๕๕***/

		$('#post-form')
		.form({
			topic: {
				identifier : 'topic',
				rules: [
				{
					type   : 'empty'
				}
				]
			}
		});

		/* Upload album form */
		$("#cover").change(function() {
			var fileName = $("#cover")[0].files[0];
			if (fileName) {
				$("#cover-name").val(fileName.name);
			} else {
				$("#cover-name").val("");
			}
		})
		/* END-Upload album form */

		/**************/
		/* View Music */
		/**************/

		/* Comment box */
		$("#comment-form").submit(function(event) {
			var commentText = $("#comment-box").val();
			if (commentText == "") {
				$("#comment-box").focus();
				return false;
			}
		});
		/* END-Comment box */

		/* Navigation search box */
		$("#nav-search-button").click(function(event) {
			event.preventDefault();
			if ($("#nav-search-box").val() != "") {
				$( "#nav-search-form" ).submit();
			} else {
				$("#nav-search-box").focus();
			}
		});
		$("#nav-search-box").keypress(function(event) {
			if (event.which == 13) {
				event.preventDefault();

				if ($("#nav-search-box").val() != "") {
					$( "#nav-search-form" ).submit();
				}
			}
		});
		/* END-Navigation search box */

	});