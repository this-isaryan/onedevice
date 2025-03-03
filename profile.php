<?php
require('top.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
	<script>
		window.location.href = 'login.php';
	</script>
<?php
}

$uid = $_SESSION['USER_ID'];
$users_dob = mysqli_fetch_assoc(mysqli_query($con, "Select dob from users where id='$uid'"));
?>
<div class="alert-box">
	<img src="images/error.png" alt="error" class="alert-img">
	<p class="alert-msg">Error Message</p>
</div>
<div class="alert-box-done">
	<img src="images/done.png" alt="done" class="alert-img">
	<p class="alert-mesg">Error Message</p>
</div>
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="contact-form-wrap mt--60">
					<div class="col-xs-12">
						<div class="contact-title">
							<h2 class="title__line--6">Profile</h2>
						</div>
					</div>
					<div class="col-xs-12">
						<form id="login-form" method="post">
							<div class="single-contact-form">
								<label class="password_label" for="name">Name</label>
								<div class="contact-box name">
									<input type="text" name="name" id="name" style="width:100%" value="<?php echo $_SESSION['USER_NAME'] ?>">
								</div>
							</div>

							<div class="contact-btn">
								<button type="button" class="submit-btn" onclick="update_profile()" id="btn_submit">Update</button>
							</div>
						</form>
					</div>

					<div class="col-xs-12">
						<form id="login-form" method="post">
							<div class="single-contact-form">
								<label class="password_label" for="dob">Date of Birth</label>
								<div class="contact-box name">
									<input type="date" name="dob" id="dob" style="width:100%" placeholder="Birthday" value="<?php echo $users_dob['dob'] ?>">
								</div>
							</div>

							<div class="contact-btn">
								<button type="button" class="submit-btn" onclick="update_dob()" id="btn_dob">Update</button>
							</div>
						</form>
					</div>
					<div class="col-xs-12">
						<form id="login-form" method="post">
							<div class="single-contact-form">
								<label class="password_label" for="email">Email</label>
								<div class="contact-box name">
									<input type="text" name="email" id="email" style="width:100%" value="<?php echo $_SESSION['USER_EMAIL'] ?>">
								</div>
							</div>

							<div class="contact-btn">
								<button type="button" class="submit-btn" onclick="update_email()" id="btn_email">Send OTP</button>

							</div>
						</form>
					</div>
					<div class="col-xs-12">
						<form id="login-form" method="post">
							<div class="single-contact-form">
								<label class="password_label" for="mobile">Mobile</label>
								<div class="contact-box name">
									<input type="text" name="mobile" id="mobile" style="width:100%" value="<?php echo $_SESSION['USER_MOBILE'] ?>">
								</div>
							</div>

							<div class="contact-btn">
								<button type="button" class="submit-btn" onclick="update_mobile()" id="btn_mobile">Send OTP</button>

							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="contact-form-wrap mt--60">
					<div class="col-xs-12">
						<div class="contact-title">
							<h2 class="title__line--6">Change Password</h2>
						</div>
					</div>
					<div class="col-xs-12">
						<form method="post" id="frmPassword">
							<div class="single-contact-form">
								<label class="password_label" for="current_password">Current Password</label>
								<div class="contact-box name">
									<div class="show-hide">
										<input type="password" name="current_password" id="current_password" style="width:100%">
										<button class="show-btn current" type="button" onclick="show_current()">
											<ion-icon name="eye-outline"></ion-icon>
										</button>
									</div>
								</div>
							</div>
							<div class="single-contact-form">
								<label class="password_label" for="new_password">New Password</label>
								<div class="contact-box name">
									<div class="show-hide">
										<input type="password" name="new_password" id="new_password" style="width:100%">
										<button class="show-btn new" type="button" onclick="show_new()">
											<ion-icon name="eye-outline"></ion-icon>
										</button>
									</div>
								</div>
							</div>
							<div class="single-contact-form">
								<label class="password_label" for="confirm_new_password">Confirm New Password</label>
								<div class="contact-box name">
									<div class="show-hide">
										<input type="password" name="confirm_new_password" id="confirm_new_password" style="width:100%">
										<button class="show-btn confirm" type="button" onclick="show_confirm()">
											<ion-icon name="eye-outline"></ion-icon>
										</button>
									</div>
								</div>
							</div>

							<div class="contact-btn">
								<button type="button" class="submit-btn" onclick="update_password()" id="btn_update_password">Update</button>
							</div>

							<div style="margin: 20% 0 0 0; text-align: center;">
								<label class="password_label" for="confirm_new_password">Do you want to delete your Account?</label>
								<button type="button" class="submit-btn del_btn" id="delete_acc" onclick="delete_popup()">Delete Your Account</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="verify-box">
	<div class="verify">
		<h1 style="text-align: center;">Email verification</h1>
		<h3>Enter the code you received on your email id to verify your account.</h3>
		<input type="text" id="email_otp" placeholder="one time password" class="email_verify_otp">
		<button class="submit-btn verify-btn email_verify_otp" onclick="email_verify_otp()">Verify OTP</button>
	</div>
</div>
<div class="verify-mobile-box">
	<div class="verify">
		<h1 style="text-align: center;">Mobile verification</h1>
		<h3>Enter the code you received on your mobile to verify your account.</h3>
		<input type="text" id="mobile_otp" placeholder="one time password" class="mobile_verify_otp">
		<button class="submit-btn verify-btn mobile_verify_otp" onclick="mobile_verify_otp()">Verify OTP</button>
	</div>
</div>
<div class="delete-alert">
	<div class="alert">
		<button class="close-btn" onclick="close_delete()">
			<ion-icon name="close"></ion-icon>
		</button>
		<img src="images/delete.svg" alt="delete" class="delete-svg">
		<p class="text">are you sure ? you want to delete your account</p>
		<p class="text">enter your password first</p>
		<div class="show-hide">
			<input type="password" name="check_password" id="check_password" style="width:100%; background-color: #e3e3e3;">
			<button class="show-btn delete_p" type="button" onclick="show_delete_pass()">
				<ion-icon name="eye-outline"></ion-icon>
			</button>
		</div>
		<button class="delete-btn del_btn" type="button" onclick="check_password()">Confirm</button>
	</div>
</div>
<div class="delete-otp-box">
	<div class="verify">
		<h1 style="text-align: center;">Email verification</h1>
		<h3>Enter the code you received on your email id to delete your account.</h3>
		<input type="text" id="delete_email_otp" placeholder="one time password" class="email_delete_otp">
		<button class="submit-btn verify-btn email_delete_otp" onclick="email_delete_otp()">Delete</button>
	</div>
</div>
<style>
	input {
		display: block;
		height: 40px !important;
		width: 100%;
		padding: 0 20px !important;
		border: none;
		outline: none;
		margin: 0 !important;
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.01);
		font-family: 'Baloo Bhaijaan 2', cursive;
		color: #495057 !important;
		background-clip: padding-box !important;
		border-radius: 20px;
		transition: all 0.15s ease-in-out;
		font-weight: 500;
	}

	input:focus,
	input:focus-within {
		box-shadow: 0px 0.2em 0.75em #c4c4c4;
	}

	::placeholder {
		color: #495057 !important;
		text-transform: capitalize;
	}
</style>
<script>
	function update_profile() {
		var name = jQuery('#name').val();
		if (name == '') {
			showAlert('Please enter your name');
		} else {
			jQuery('#btn_submit').html('Please wait...');
			jQuery('#btn_submit').attr('disabled', true);
			jQuery.ajax({
				url: 'update_profile.php',
				type: 'post',
				data: 'name=' + name,
				success: function(result) {
					showDone(result);
					jQuery('#btn_submit').html('Update');
					jQuery('#btn_submit').attr('disabled', false);
				}
			})
		}
	}

	function update_dob() {
		var dob = jQuery('#dob').val();
		if (dob == '') {
			showAlert('Please enter your Date of Birth');
		} else {
			jQuery('#btn_dob').html('Please wait...');
			jQuery('#btn_dob').attr('disabled', true);
			jQuery.ajax({
				url: 'update_dob.php',
				type: 'post',
				data: 'dob=' + dob,
				success: function(result) {
					showDone(result);
					jQuery('#btn_dob').html('Update');
					jQuery('#btn_dob').attr('disabled', false);
				}
			})
		}
	}

	function update_password() {
		var current_password = jQuery('#current_password').val();
		var new_password = jQuery('#new_password').val();
		var confirm_new_password = jQuery('#confirm_new_password').val();
		var is_error = '';
		if (current_password == '') {
			showAlert('Please enter current password');
			is_error = 'yes';
		} else if (new_password == '') {
			showAlert('Please enter new password');
			is_error = 'yes';
		}else if (confirm_new_password == '') {
			showAlert('Please confirm your password');
			is_error = 'yes';
		}else if (new_password != '' && confirm_new_password != '' && new_password != confirm_new_password) {
			showAlert('Please enter same password');
			is_error = 'yes';
		}

		if (is_error == '') {
			jQuery('#btn_update_password').html('Please wait...');
			jQuery('#btn_update_password').attr('disabled', true);
			jQuery.ajax({
				url: 'update_password.php',
				type: 'post',
				data: 'current_password=' + current_password + '&new_password=' + new_password,
				success: function(result) {
					if (result == 'no') {
						showAlert("Please enter your current valid password");
						jQuery('#btn_update_password').html('Update');
						jQuery('#btn_update_password').attr('disabled', false);
					} else {
						showDone(result);
						jQuery('#btn_update_password').html('Update');
						jQuery('#btn_update_password').attr('disabled', false);
						document.getElementById('frmPassword').reset();
					}
				}
			})
		}

	}

	function update_email() {
		var email = jQuery('#email').val();
		if (email == '') {
			showAlert('Please enter email id');
		} else {
			jQuery('#btn_email').html('Please wait..');
			jQuery('#btn_email').attr('disabled', true);
			jQuery.ajax({
				url: 'send_otp.php',
				type: 'post',
				data: 'name=' + name + '&email=' + email + '&type=email',
				success: function(result) {
					if (result == 'done') {
						showDone('OTP Sent on your Email ID');
						jQuery('.verify-box').css('display', 'flex');
						jQuery('#btn_email').html('Send OTP');
						jQuery('#btn_email').attr('disabled', false);

					} else if (result == 'email_present') {
						jQuery('#btn_email').html('Send OTP');
						jQuery('#btn_email').attr('disabled', false);
						showAlert('Email id already exists');
					} else {
						jQuery('#btn_email').html('Send OTP');
						jQuery('#btn_email').attr('disabled', false);
						showAlert('Please try after sometime');
					}
				}
			});
		}
	}

	function email_verify_otp() {
		var email = jQuery('#email').val();
		var email_otp = jQuery('#email_otp').val();
		if (email_otp == '') {
			showAlert('Please enter OTP');
		} else {
			jQuery.ajax({
				url: 'check_otp.php',
				type: 'post',
				data: 'otp=' + email_otp + '&type=email',
				success: function(result) {
					if (result == 'done') {
						jQuery('.verify-box').hide();
						jQuery.ajax({
							url: 'update_email.php',
							type: 'post',
							data: 'email=' + email,
							success: function(result1) {
								showDone("Email id Updated");
							}
						});
					} else {
						showAlert('Please enter valid OTP');
					}
				}

			});
		}
	}

	function update_mobile() {
		var mobile = jQuery('#mobile').val();
		if (mobile == '') {
			showAlert('Please enter mobile number');
		} else {
			jQuery('#btn_mobile').html('Please wait..');
			jQuery('#btn_mobile').attr('disabled', true);
			jQuery('#btn_mobile');
			jQuery.ajax({
				url: 'send_otp.php',
				type: 'post',
				data: 'mobile=' + mobile + '&type=mobile',
				success: function(result) {
					if (result == 'done') {
						showDone('OTP Sent on your Mobile Number');
						jQuery('.verify-mobile-box').css('display', 'flex');
						jQuery('#btn_mobile').html('Send OTP');
						jQuery('#btn_mobile').attr('disabled', false);
					} else if (result == 'mobile_present') {
						jQuery('#btn_mobile').html('Send OTP');
						jQuery('#btn_mobile').attr('disabled', false);
						showAlert('Mobile number already exists');
					} else {
						jQuery('#btn_mobile').html('Send OTP');
						jQuery('#btn_mobile').attr('disabled', false);
						showAlert('Please try after sometime');
					}
				}
			});
		}
	}

	function mobile_verify_otp() {
		var mobile = jQuery('#mobile').val();
		var mobile_otp = jQuery('#mobile_otp').val();
		if (mobile_otp == '') {
			showAlert('Please enter OTP');
		} else {
			jQuery.ajax({
				url: 'check_otp.php',
				type: 'post',
				data: 'otp=' + mobile_otp + '&type=mobile',
				success: function(result) {
					if (result == 'done') {
						jQuery('.verify-mobile-box').hide();
						jQuery.ajax({
							url: 'update_mobile.php',
							type: 'post',
							data: 'mobile=' + mobile,
							success: function(result1) {
								showDone("Mobile Number Updated");
							}
						});
					} else {
						showAlert('Please enter valid OTP');
					}
				}

			});
		}
	}

	const current_password = document.querySelector("#current_password");
	const new_password = document.querySelector("#new_password");
	const confirm_password = document.querySelector("#confirm_new_password");
	const delete_password = document.querySelector("#check_password");
	const current_p = document.querySelector('.current');
	const new_p = document.querySelector('.new');
	const confirm_p = document.querySelector('.confirm');
	const delete_p = document.querySelector('.delete_p');
	const show_current = () => {
		if (current_password.type === 'password') {
			current_p.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
			current_password.type = "text";
		} else {
			current_p.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
			current_password.type = "password";
		}
	}
	const show_new = () => {
		if (new_password.type === 'password') {
			new_p.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
			new_password.type = "text";
		} else {
			new_p.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
			new_password.type = "password";
		}
	}
	const show_confirm = () => {
		if (confirm_password.type === 'password') {
			confirm_p.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
			confirm_password.type = "text";
		} else {
			confirm_p.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
			confirm_password.type = "password";
		}
	}
	const show_delete_pass = () => {
		if (delete_password.type === 'password') {
			delete_p.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
			delete_password.type = "text";
		} else {
			delete_p.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
			delete_password.type = "password";
		}
	}

	function delete_popup() {
		jQuery('#delete_acc').html('Please wait...');
		jQuery('.delete-alert').css('display', 'flex');
		jQuery('#delete_acc').attr('disabled', true);
		jQuery('#delete_acc').css('cursor', 'not-allowed');
	}


	function check_password() {
		const check_password = jQuery("#check_password").val();
		if (check_password == "") {
			showAlert('Please enter your password');
		} else {
			jQuery.ajax({
				url: 'check_password.php',
				type: 'post',
				data: 'check_password=' + check_password,
				success: function(result) {
					if (result != "Incorrect Password") {
						showDone("Password Matched! An OTP has been sent on your Email id to confirm delete.");
						close_delete();
						setTimeout(function() {
							jQuery('.delete-otp-box').css('display', 'flex');
						}, 3000);
					} else if (result == "Incorrect Password") {
						showAlert(result);
					}
				}
			});
		}
	}


	function email_delete_otp() {
		var delete_email_otp = jQuery('#delete_email_otp').val();
		if (delete_email_otp == '') {
			showAlert('Please enter OTP');
		} else {
			jQuery.ajax({
				url: 'check_otp.php',
				type: 'post',
				data: 'otp=' + delete_email_otp + '&type=email',
				success: function(result) {
					if (result == 'done') {
						jQuery('.delete-otp-box').hide();
						jQuery.ajax({
							url: 'delete_account.php',
							success: function(result) {
								showDone("Account Deleted Successfully")
								setTimeout(function() {
									window.location.href = 'index.php';
								}, 3000);
							}
						})
					} else {
						showAlert('Please enter valid OTP');
					}
				}

			});
		}
	}

	function close_delete() {
		jQuery('.delete-alert').hide();
		jQuery('#delete_acc').html('Delete Your Account');
		jQuery('#delete_acc').attr('disabled', false);
		jQuery('#delete_acc').css('cursor', 'pointer');
	}
</script>
<?php require('footer.php') ?>