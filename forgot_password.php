<?php
require('connection.inc.php');
require('functions.inc.php');
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == 'yes') {
?>
	<script>
		window.location.href = 'index.php';
	</script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>One Device : Forgot Password</title>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="alert-box">
        <img src="images/error.png" alt="error" class="alert-img">
        <p class="alert-msg">Error Message</p>
    </div>
    <div class="alert-box-done">
        <img src="images/done.png" alt="done" class="alert-img">
        <p class="alert-mesg">Error Message</p>
    </div>
	<div class="sign-box">
		<img src="images/login.svg" alt="login-svg">
		<div class="container">
			<a href="/ecom"><img src="images/Logo.png" alt="Logo" title="logo" class="logo"></a>
			<h2 class="title__line--6">Forgot Password</h2>
			<div>
				<form id="forgot-password" method="post">
					<input type="email" name="email" autocomplete="on" id="email" placeholder="email">
					<button type="button" class="submit-btn" onclick="forgot_password()" id="forgot_button">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<input type="hidden" id="is_email_verified" />
	<input type="hidden" id="is_mobile_verified" />
	<script>
		function forgot_password() {
			var email = jQuery('#email').val();
			if (email == '') {
				showAlert('Please enter your email ID')
			} else {
				jQuery('#forgot_button').html('Plese wait..');
				jQuery('#forgot_button').attr('disabled', true);
				jQuery.ajax({
					url: 'forgot_password_submit.php',
					type: 'post',
					data: 'email=' + email,
					success: function(result) {
						if (result == 'no') {
							showAlert("Email id not registered with us");
							jQuery('#forgot_button').html('Submit');
							jQuery('#forgot_button').attr('disabled', false);
						} else {
							showDone("Please check your email id for password");
							document.getElementById('forgot-password').reset();
							jQuery('#forgot_button').html('Submit');
							jQuery('#forgot_button').attr('disabled', false);
							setTimeout(function() {
								window.location.href = 'login.php';
							}, 5000);
						}
					}
				})
			}
		}
		document.getElementById('email').addEventListener("keyup", function(event) {
			event.preventDefault();
			if (event.keyCode === 13) {
				document.querySelector('.submit-btn').click();
			}
		});
	</script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>