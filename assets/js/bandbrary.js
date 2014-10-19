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
		$("#confirm-pass,#password").change(function() {
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

		/*********/
		/* Home */
		/*********/

		/* Submit sign in form */
		$( "#signin-button" ).click(function() {
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
		$( "#initial-button" ).click(function() {
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
			$('.navbar-item4').click(function() {
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

	});

	function follow(url) {
		location.href = url;
	}
