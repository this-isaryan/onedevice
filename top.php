<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$wishlist_count = 0;
$cat_res = mysqli_query($con, "select * from categories where status=1 order by id asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row;
}

$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();

if (isset($_SESSION['USER_LOGIN'])) {
    $uid = $_SESSION['USER_ID'];

    if (isset($_GET['wishlist_id'])) {
        $wid = get_safe_value($con, $_GET['wishlist_id']);
        mysqli_query($con, "delete from wishlist where id='$wid' and user_id='$uid'");
    }

    $wishlist_count = mysqli_num_rows(mysqli_query($con, "select product.name,product.image,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}

$script_name = $_SERVER['SCRIPT_NAME'];
$script_name_arr = explode('/', $script_name);
$mypage = $script_name_arr[count($script_name_arr) - 1];

$meta_title = "Device Finder - Find the best Device for you - OneDevice.in";
$meta_keyword = "Device Finder - Find the best Device for you - OneDevice.in";
$meta_url = SITE_PATH;
$meta_image = "";
if ($mypage == 'product.php') {
    $product_id = get_safe_value($con, $_GET['id']);
    $product_meta = mysqli_fetch_assoc(mysqli_query($con, "select product.*, brands.brand from product, brands where product.id='$product_id' and product.brand_id=brands.id"));
    $meta_title = $product_meta['brand'] . ' ' . $product_meta['name'] . ' | OneDevice.in';
    $meta_keyword = $product_meta['meta_keyword'];
    $meta_url = SITE_PATH . "product.php?id=" . $product_id;
    $meta_image = PRODUCT_IMAGE_SITE_PATH . $product_meta['image'];
}
if ($mypage == 'contact.php') {
    $meta_title = 'Contact Us';
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $meta_title ?></title>
    <meta name="keywords" content="<?php echo $meta_keyword ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="<?php echo $meta_title ?>" />
    <meta property="og:image" content="<?php echo $meta_image ?>" />
    <meta property="og:url" content="<?php echo $meta_url ?>" />
    <meta property="og:site_name" content="<?php echo SITE_PATH ?>" />

    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/shortcode/footer.css">
    <link rel="stylesheet" href="css/saved items.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/plugins/glider.min.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <header>
        <nav>
            <div class="menu">
                <ul class="nav-menu">
                    <div class="search-form2">
                        <div>
                            <form action="search.php" method="get">
                                <input id="search2" type="search" placeholder="search brands, products..." class="search-box" name="str" autocomplete="off">
                                <button id="searchbtn2" type="submit">
                                    <ion-icon class="searchbtn2" name="search"></ion-icon>
                                </button>
                            </form>
                        </div>
                    </div>
                    <li>
                        <a href="/" class="opacity">
                            <img src="images/Logo.png" class="brand-logo lsize">
                        </a>
                    </li>
                    <li class="nav-link"><a href="mobiles.php" class="menu-item under">Mobiles</a></li>
                    <li class="nav-link"><a href="tablets.php" class="menu-item under">Tablets</a></li>
                    <li class="nav-link"><a href="laptops.php" class="menu-item under">Laptops</a></li>
                    <li class="nav-link"><a href="audios.php" class="menu-item under">Audios</a></li>
                    <li class="nav-link"><a href="smartwatch.php" class="menu-item under">Smart Watch</a></li>
                    <li class="nav-link"><a href="television.php" class="menu-item under">Television</a></li>
                    <li class="nav-link">
                        <button type="button" id="search" class="lsize">
                            <ion-icon name="search"></ion-icon>
                        </button>
                    </li>
                    <li class="nav-link">
                        <button type="button" class="lsize">
                            <ion-icon class="person1" id="user-img" name="person-circle-outline"></ion-icon>
                        </button>
                    </li>
                </ul>
                <div class="search-form">
                    <div>
                        <form action="search.php" method="get">
                            <input type="search" placeholder="search brands, products..." class="search-boxs" name="str">
                            <button type="submit" class="search-butn">
                                <ion-icon name="search"></ion-icon>
                            </button>
                        </form>
                    </div>
                </div>
                <button type="button" class="close-search lsize">
                    <ion-icon name="close"></ion-icon>
                </button>
                <div class="nav2">
                    <div class="hamburger">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                    <div>
                        <a href="/">
                            <img src="images/Logo2.png" class="brand-logo2 lsize">
                        </a>
                    </div>
                    <div>
                        <a>
                            <ion-icon class="person lsize" id="user-img-2" name="person-circle-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <aside class="bg hide">
            <div class="login-logout-popup">
                <ion-icon name="close" id="close"></ion-icon>
                <?php if (isset($_SESSION['USER_LOGIN'])) { ?>
                    <p class="account-info">Hi, <?php echo $_SESSION['USER_NAME'] ?></p>
                    <p class="account-email"><?php echo $_SESSION['USER_EMAIL'] ?></p>
                    <a href="wishlist.php" class="btn mt20 bottom">
                        <ion-icon name="bookmark-outline" id="log-icon"></ion-icon><span id="log-text">saved items<span class="sicount"><?php echo $wishlist_count ?></span></span>
                    </a>
                    <a href="profile.php" class="btn">
                        <ion-icon name="person-circle-outline" id="log-icon"></ion-icon><span id="log-text">Manage Account</span>
                    </a>
                    <div class="log-btns">
                        <button class="btn" id="user-btn" onclick="location.href='logout.php'">Log out</button>
                    </div>
                <?php } else { ?>
                    <p class="account-info">log in to your account</p>
                    <a href="wishlist.php" class="btn mt20 bottom">
                        <ion-icon name="bookmark-outline" id="log-icon"></ion-icon><span id="log-text">saved items</span>
                    </a>
                    <a href="profile.php" class="btn">
                        <ion-icon name="person-circle-outline" id="log-icon"></ion-icon><span id="log-text">Manage Account</span>
                    </a>
                    <div class="log-btns">
                        <button class="btn" id="sign-btn" onclick="location.href='signup.php'">Sign Up</button>
                        <button class="btn" id="user-btn" onclick="location.href='login.php'">Log in</button>
                    </div>
                <?php } ?>
            </div>
        </aside>
        <div id="overlay" class="overlay">&nbsp;</div>
    </header>