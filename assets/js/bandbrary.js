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
		$('#register-form')
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
				},
				]
			},
			confirmPassword: {
				identifier : 'confirm-password',
				rules: [
				{
					type   : 'empty',
					prompt : 'Re-enter your password'
				},
				]
			},
			email: {
				identifier : 'email',
				rules: [
				{
					type   : 'empty',
					prompt : 'What is your email address?'
				},
				]
			},
			userType: {
				identifier : 'user-type',
				rules: [
				{
					type   : 'empty',
					prompt : 'Please enter an email'
				},
				]
			}
		}, {
			inline : true,
			on     : 'blur'
		});
		$( "#tiny-test" ).click(function() {
			$( "#register" ).submit();
		});
	});