<?php
if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] == 'yes') {
?>
   <script>
      window.location.href = '/';
   </script>
<?php
}

?>
<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>One Device: Admin Log In</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/form.css">
   <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>
   <div class="alert-box">
      <img src="images/error.png" alt="error" class="alert-img">
      <p class="alert-msg">Error message</p>
   </div>
   <div class="alert-box-done">
      <img src="images/done.png" alt="done" class="alert-img">
      <p class="alert-mesg">Error Message</p>
   </div>
   <div class="sign-box">
      <img src="images/login.svg" alt="login-svg">
      <div class="container">
         <img src="images/Logo.png" alt="Logo" title="logo" class="logo">
         <div>
            <form method="post">
               <input type="text" name="username" class="form-control" placeholder="Username" id="email" autocomplete="off">
               <div class="show-hide">
                  <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                  <button type="button" class="show-btn" onclick="showBtnFn()">
                     <ion-icon name="eye-outline"></ion-icon>
                  </button>
               </div>
               <button type="button" onclick="email_sent_otp()" class="submit-btn email_sent_otp">Send OTP</button>
               <button type="button" onclick="admin_login()" class="submit-btn log_in_admin">Log in</button>
            </form>
         </div>
      </div>
   </div>
   <div class="verify-box">
      <div class="verify">
         <h1 style="text-align: center;"> Email verification</h1>
         <h3>Enter the code you received on your email id to verify your account.</h3>
         <input type="text" id="email_otp" placeholder="one time password" class="email_verify_otp">
         <button class="submit-btn verify-btn email_verify_otp" onclick="email_verify_otp()">Verify OTP</button>
      </div>
   </div>
   <script>
      function email_sent_otp() {
         var email = jQuery('#email').val();
         if (email == '') {
            showAlert('Please enter username');
         } else {
            jQuery('.email_sent_otp').html('Please wait..');
            jQuery('.email_sent_otp').attr('disabled', true);
            jQuery.ajax({
               url: 'send_otp.php',
               type: 'post',
               success: function(result) {
                  if (result == 'done') {
                     showDone('OTP Sent on your Email ID');
                     jQuery('#email').attr('disabled', true);
                     jQuery('.verify-box').css('display', 'flex');
                     jQuery('.email_sent_otp').hide();
                  } else {
                     jQuery('.email_sent_otp').html('Send OTP on Email');
                     jQuery('.email_sent_otp').attr('disabled', false);
                     showAlert('Please try after sometime');
                  }
               }
            });
         }
      }

      function email_verify_otp() {
         var email_otp = jQuery('#email_otp').val();
         if (email_otp == '') {
            showAlert('Please enter OTP');
         } else {
            jQuery.ajax({
               url: 'check_otp.php',
               type: 'post',
               data: 'OTP=' + email_otp,
               success: function(result) {
                  if (result == 'done') {
                     jQuery('.verify-box').hide();
                     showDone('OTP verified');
                     jQuery('.log_in_admin').attr('disabled', false);
                     jQuery('.log_in_admin').show();
                  } else {
                     showAlert('Please enter valid OTP');
                  }
               }

            });
         }
      }

      const password = document.querySelector("#password");
      const submitBtn = document.querySelector(".submit-btn");
      password.addEventListener("keyup", function(event) {
         event.preventDefault();
         if (event.keyCode === 13) {
            submitBtn.click();
         }
      });
   </script>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
   <script src="assets/js/popper.min.js" type="text/javascript"></script>
   <script src="assets/js/plugins.js" type="text/javascript"></script>
   <script src="assets/js/main.js" type="text/javascript"></script>
   <script src="assets/js/custom.js" type="text/javascript"></script>
</body>

</html>