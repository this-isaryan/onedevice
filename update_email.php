<?php
require('connection.inc.php');
require('functions.inc.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}

$email = get_safe_value($con, $_POST['email']);
$uid = $_SESSION['USER_ID'];

$check_user = mysqli_num_rows(mysqli_query($con, "select * from users where email='$email'"));
if ($check_user > 0) {
    echo "Email Already Exists";
} else {
    mysqli_query($con, "update users set email='$email' where id='$uid'");
    $_SESSION['USER_EMAIL'] = $email;
    echo "Your email updated";
}

?>