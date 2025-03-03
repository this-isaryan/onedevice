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

$mobile = get_safe_value($con, $_POST['mobile']);
$uid = $_SESSION['USER_ID'];

$check_user = mysqli_num_rows(mysqli_query($con, "select * from users where mobile='$mobile'"));
if ($check_user > 0) {
    echo "mobile Already Exists";
} else {
    mysqli_query($con, "update users set mobile='$mobile' where id='$uid'");
    $_SESSION['USER_MOBILE'] = $mobile;
    echo "Your Mobile updated";
}

?>