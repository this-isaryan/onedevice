<?php
session_start();
$connect = new PDO("mysql:host=localhost;dbname=u977860208_onedevice", "u977860208_onedevice", "N@yr@1122onedevice");
$con=mysqli_connect("localhost","u977860208_onedevice","N@yr@1122onedevice","u977860208_onedevice");
define('SERVER_PATH',$_SERVER["DOCUMENT_ROOT"].'//');
define('SITE_PATH','https://onedevice.in/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

define('PRODUCT_MULTIPLE_IMAGE_SERVER_PATH',SERVER_PATH.'media/product_images/');
define('PRODUCT_MULTIPLE_IMAGE_SITE_PATH',SITE_PATH.'media/product_images/');

define('BANNER_SERVER_PATH',SERVER_PATH.'media/banner/');
define('BANNER_SITE_PATH',SITE_PATH.'media/banner/');
?>