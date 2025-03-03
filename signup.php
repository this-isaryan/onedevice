<?php
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
    <title>One Device : Create Account</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="style.css">
    <!-- <style>
        .show-hide {
            margin: 20px 0;
        }
    </style> -->
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
        <img src="images/login.svg" alt="login">
        <div class="container">
            <a href="/ecom"><img src="images/Logo.png" alt="Logo" title="logo" class="logo"></a>
            <h2 class="title__line--6">Create Account</h2>
            <div>
                <form id="register-form" method="post">
                    <input type="text" name="name" autocomplete="off" id="name" placeholder="name" spellcheck="false">
                    <input type="email" name="email" autocomplete="off" id="email" placeholder="email" spellcheck="false">
                    <div class="tel-input">
                        <span class="prefix">+91</span>
                        <input type="tel" name="mobile" autocomplete="off" id="mobile" placeholder="number">
                    </div>
                    <div style="margin: 20px 0;">
                        <div class="tooltip">
                            <div class="show-hide">
                                <input type="password" autocomplete="off" name="password" id="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                <button class="show-btn pass" type="button" onclick="showBtnFn()">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </button>
                                <div class="tooltiptext">
                                    <p>8 Character</p>
                                    <p>Contains Upercase</p>
                                    <p>Contains Lowercase</p>
                                    <p>Contains Number</p>
                                </div>
                            </div>
                        </div>
                        <div class="show-hide">
                            <input type="password" autocomplete="off" name="confirm_password" id="confirm_password" placeholder="confirm password">
                            <button class="show-btn confirm" type="button" onclick="showConBtnFn()">
                                <ion-icon name="eye-outline"></ion-icon>
                            </button>
                        </div>
                    </div>
                    <div class="switch">
                        <input type="checkbox" checked id="terms-and-cond" class="checkbox">
                        <div class="slider"></div>
                        <label for="terms-and-cond" class="switch">
                            <p class="label">agree to our <a href="terms and conditions.php" target="_blank">terms and conditions</a><br> & <a href="Privacy policy.php" target="_blank">Privacy Policy</a></p>
                        </label>
                    </div>
                    <br>
                    <div class="switch">
                        <input type="checkbox" id="notifications" class="checkbox">
                        <div class="slider"></div>
                        <label for="notifications" class="switch">
                            <p class="label">receive upcoming offers and events mails</p>
                        </label>
                    </div>
                    <button type="button" class="submit-btn email_sent_otp" onclick="email_sent_otp()">Send OTP on Email</button>

                    <button type="button" class="submit-btn mobile_sent_otp" onclick="mobile_sent_otp()">Send OTP on Mobile</button>

                    <button type="button" class="submit-btn" id="btn_register" onclick="user_register()" disabled>create acccount</button>
                </form>
            </div>
            <a href="login.php" class="link underline">already have an account? Log in here</a>
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
    <div class="verify-mobile-box">
        <div class="verify">
            <h1 style="text-align: center;"> Mobile verification</h1>
            <h3>Enter the code you received on your mobile to verify your account.</h3>
            <input type="text" id="mobile_otp" placeholder="one time password" class="mobile_verify_otp">
            <button class="submit-btn verify-btn mobile_verify_otp" onclick="mobile_verify_otp()">Verify OTP</button>
        </div>
    </div>
    <input type="hidden" id="is_email_verified" />
    <input type="hidden" id="is_mobile_verified" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        function email_sent_otp() {
            var email = jQuery('#email').val();
            var name = jQuery('#name').val();
            if (name == '') {
                showAlert('Please enter name');
            } else if (email == '') {
                showAlert('Please enter email id');
            } else {
                jQuery('.email_sent_otp').html('Please wait..');
                jQuery('.email_sent_otp').attr('disabled', true);
                jQuery.ajax({
                    url: 'send_otp.php',
                    type: 'post',
                    data: 'name=' + name + '&email=' + email + '&type=email',
                    success: function(result) {
                        if (result == 'done') {
                            showDone('OTP Sent on your Email ID');
                            jQuery('#email').attr('disabled', true);
                            jQuery('.verify-box').css('display', 'flex');
                            jQuery('.email_sent_otp').hide();
                        } else if (result == 'email_present') {
                            jQuery('.email_sent_otp').html('Send OTP on Email');
                            jQuery('.email_sent_otp').attr('disabled', false);
                            showAlert('Email id already exists');
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
                    data: 'otp=' + email_otp + '&type=email',
                    success: function(result) {
                        if (result == 'done') {
                            jQuery('.verify-box').hide();
                            showDone('Email id verified');
                            jQuery('.mobile_sent_otp').show();
                            jQuery('#is_email_verified').val('1');
                            if (jQuery('#is_mobile_verified').val() == 1) {
                                jQuery('#btn_register').attr('disabled', false);
                                jQuery('#btn_register').show();
                            }
                        } else {
                            showAlert('Please enter valid OTP');
                        }
                    }

                });
            }
        }

        function mobile_sent_otp() {
            var mobile = jQuery('#mobile').val();
            if (mobile == '') {
                showAlert('Please enter mobile number');
            } else {
                jQuery('.mobile_sent_otp').html('Please wait..');
                jQuery('.mobile_sent_otp').attr('disabled', true);
                jQuery('.mobile_sent_otp');
                jQuery.ajax({
                    url: 'send_otp.php',
                    type: 'post',
                    data: 'mobile=' + mobile + '&type=mobile',
                    success: function(result) {
                        if (result == 'done') {
                            showDone('OTP Sent on your Mobile Number');
                            jQuery('#mobile').attr('disabled', true);
                            jQuery('.verify-mobile-box').css('display', 'flex');
                            jQuery('.mobile_sent_otp').hide();
                        } else if (result == 'mobile_present') {
                            jQuery('.mobile_sent_otp').html('Send OTP on Mobile');
                            jQuery('.mobile_sent_otp').attr('disabled', false);
                            showAlert('Mobile number already exists');
                        } else {
                            jQuery('.mobile_sent_otp').html('Send OTP on Mobile');
                            jQuery('.mobile_sent_otp').attr('disabled', false);
                            showAlert('Please try after sometime');
                        }
                    }
                });
            }
        }

        function mobile_verify_otp() {
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
                            showDone('Mobile number verified');
                            jQuery('#is_mobile_verified').val('1');
                            if (jQuery('#is_email_verified').val() == 1) {
                                jQuery('#btn_register').attr('disabled', false);
                                jQuery('#btn_register').show();
                            }
                        } else {
                            showAlert('Please enter valid OTP');
                        }
                    }

                });
            }
        }

        document.querySelector('#email').addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.querySelector('.email_sent_otp').click();
            }
        });
        document.querySelector('#mobile').addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.querySelector('.mobile_sent_otp').click();
            }
        });
        document.querySelector('#password').addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.querySelector('#btn_register').click();
            }
        });
        /* password & confirm_password in custom.js */
        const showBtn = document.querySelector('.pass');
        const showConBtn = document.querySelector('.confirm');
        const showBtnFn = () => {
            if (password.type === 'password') {
                showBtn.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
                password.type = "text";
            } else {
                showBtn.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
                password.type = "password";
            }
        }
        const showConBtnFn = () => {
            if (confirm_password.type === 'password') {
                showConBtn.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
                confirm_password.type = "text";
            } else {
                showConBtn.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
                confirm_password.type = "password";
            }
        }

        password.addEventListener("keyup", function(event) {
            if (event.getModifierState("CapsLock")) {
                showDone("caps lock on")
            }
        });

        confirm_password.addEventListener("keyup", function(event) {
            if (event.getModifierState("CapsLock")) {
                showDone("caps lock on")
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