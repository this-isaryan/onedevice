<?php
require('connection.inc.php');
require('functions.inc.php');
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == 'yes') {
?>
    <script>
        window.location.href = '/';
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
    <title>One Device : Log In</title>
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
            <h2 class="title__line--6">Login</h2>
            <div>
                <form id="login-form" method="post">
                    <input type="email" name="login_email" autocomplete="off" id="login_email" placeholder="email">
                    <div class="show-hide">
                        <input type="password" name="login_password" autocomplete="off" id="login_password" placeholder="password">
                        <button class="show-btn" type="button" onclick="showBtnFn()">
                            <ion-icon name="eye-outline"></ion-icon>
                        </button>
                    </div>
                    <a href="forgot_password.php" class="forgot_password link underline">Forgot Password</a>
                    <button type="button" class="submit-btn" onclick="user_login()">log in</button>
                    <br>
                </form>
            </div>
            <a href="signup.php" class="link underline">don't have an account? Create one</a>
        </div>
    </div>
    <script>
        const password = document.querySelector("#login_password");
        const submitBtn = document.querySelector(".submit-btn");
        password.addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                submitBtn.click();
            }
            if (event.getModifierState("CapsLock")) {
                showDone("caps lock on")
            }
        });
        const showBtnFn = () => {
            const showBtn = document.querySelector('.show-btn');
            if (password.type === 'password') {
                showBtn.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
                password.type = "text";
            } else {
                showBtn.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
                password.type = "password";
            }
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>