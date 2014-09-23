	$(document)
	.ready(function() {
		$('.ui.dropdown')
		.dropdown();
		$('.ui.checkbox')
		.checkbox();
		$('.ui.radio.checkbox')
		.checkbox();
		$("#confirm-pass,#password").change(function() {
			var confirmPass = $("#confirm-pass").val();
			var password = $("#password").val();

			if (confirmPass != password) {
				$("#errorMsg").text("Invalid password");
			} else {
				$("#errorMsg").text("");
			}
		});

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
					prompt : 'Enter your username'
				}
				]
			},
			password: {
				identifier : 'password',
				rules: [
				{
					type   : 'empty',
					prompt : 'Enter your password'
				}
				]
			},
			confirmPassword: {
				identifier : 'confirm-password',
				rules: [
				{
					type   : 'empty',
					prompt : 'Re-enter your password'
				},
				{
					type   : 'match[password]',
					prompt : 'Passwords don\'t match'
				}
				]
			},
			email: {
				identifier : 'email',
				rules: [
				{
					type   : 'empty',
					prompt : 'What is your email address?'
				},
				{
					type   : 'email',
					prompt : 'Invalid email address'
				}
				]
			},
			userType: {
				identifier : 'user-type',
				rules: [
				{
					type   : 'empty',
					prompt : 'Please enter an email'
				}
				]
			}
		}, {
			inline : true,
			on     : 'blur'
		});

		/***********/
		/* Initial */
		/***********/

		/* Submit Register form */
		$( "#initial-button" ).click(function() {
			event.preventDefault();
			$( ".initial-form" ).submit();
		});
	});