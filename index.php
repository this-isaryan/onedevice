<?php
ob_start();
require('top.php');
$resBanner = mysqli_query($con, "select * from banner where status='1' order by order_no asc");

?>
<div class="body__overlay"></div>
<?php if (mysqli_num_rows($resBanner) > 0) { ?>

    <!-- Start Slider Area -->
    <div class="slider__container slider--one bg__cat--3 home-height">
        <div class="slide__container slider__activation__wrap owl-carousel">
            <?php while ($rowBanner = mysqli_fetch_assoc($resBanner)) { ?>
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2><?php echo $rowBanner['heading1'] ?></h2>
                                        <h1><?php echo $rowBanner['heading2'] ?></h1>

                                        <?php
                                        if ($rowBanner['btn_txt'] != '') { ?>
                                            <div class="cr__btn">
                                                <button type="button" id="top-cat" onclick="topCat()"><?php echo $rowBanner['btn_txt'] ?></button>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="<?php echo BANNER_SITE_PATH . $rowBanner['image'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Start Slider Area -->
<?php } ?>
<?php
// unset($_COOKIE['recently_viewed']);
if (isset($_COOKIE['recently_viewed'])) {
    $arrRecentView = unserialize($_COOKIE['recently_viewed']);
    $countRecentView = count($arrRecentView);
    $countStartRecentView = $countRecentView - 4;
    if ($countStartRecentView > 4) {
        $arrRecentView = array_slice($arrRecentView, $countStartRecentView, 4);
    }
    $recentViewId = implode(",", $arrRecentView);
    $res = mysqli_query($con, "select product.*, brands.brand from product, brands where product.id IN ($recentViewId) and product.brand_id=brands.id and product.status=1 order by id desc");

?>
    <section id="best-selling">
        <h2 class="product-category">Recently Viewed</h2>
        <div class="reveal">
            <div class="product-container">
                <?php while ($list = mysqli_fetch_assoc($res)) {
                    $mrp = $list['mrp'];
                    $mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $mrp); ?>
                    <div class="buy-container">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" class="product-thumb" alt="">
                            </div>
                            <div class="product-info">
                                <h2 class="product-brand"><?php echo $list['brand'] ?></h2>
                                <p class="product-name"><?php echo $list['name'] ?></p>
                                <span id="mrp" class="home-price">₹ <?php echo $mrp ?></span>
                            </div>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')">
                                        <ion-icon class="icon-position" name="heart-outline"></ion-icon>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="details-card-btn">
                            <a href="product.php?id=<?php echo $list['id'] ?>" class="details-btn">view details</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php
}
ob_flush(); ?>
<section id="top-categories">
    <h2 class="product-category">top categories</h2>
    <div class="big-box">
        <a href="mobiles.php">
            <div class="box box1 reveal2">
                <img src="images/Mobile.png" alt="mobile-section" title="Mobile" class="gicons">
                <div class="gnames">mobiles</div>
            </div>
        </a>
        <a href="tablets.php">
            <div class="box box2 reveal2">
                <img src="images/Tablet.png" alt="tablet-section" title="Tablet" class="gicons">
                <div class="gnames">tablets</div>
            </div>
        </a>
        <a href="laptops.php">
            <div class="box box3 reveal2">
                <img src="images/laptop.png" alt="laptop-section" title="Laptop" class="gicons">
                <div class="gnames">laptops</div>
            </div>
        </a>
        <a href="audios.php">
            <div class="box box4 reveal2">
                <img src="images/headphone.png" alt="audio-section" title="Audio Device" class="gicons">
                <div class="gnames">audio</div>
            </div>
        </a>
        <a href="smartwatch.php">
            <div class="box box5 reveal2">
                <img src="images/watch.png" alt="watch-section" title="Watch" class="gicons">
                <div class="gnames">smartwatches</div>
            </div>
        </a>
        <a href="television.php">
            <div class="box box6 reveal2">
                <img src="images/TV.png" alt="television-section" title="Television" class="gicons">
                <div class="gnames">televisions</div>
            </div>
        </a>
    </div>
</section>
<!-- Start Category Area -->
<section id="best-selling">
    <h2 class="product-category">popular mobile brands</h2>
    <div class="slider-btns">
        <button aria-label="Previous" class="glider-prev">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </button>
        <button aria-label="Next" class="glider-next">
            <ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
        </button>
    </div>
    <div class="reveal">
        <div class="product-container">
            <div class="glider-contain">
                <div class="glider">
                    <div class="buy-container">
                        <div class="brand-card">
                            <div class="brand-image">
                                <img src="images/brand logo/Apple.png" alt="" class="brand-thumb">
                            </div>
                        </div>
                        <div class="details-card-btn">
                            <a href="apple_mobiles.php" class="details-btn">view all</a>
                        </div>
                    </div>
                    <div class="buy-container">
                        <div class="brand-card">
                            <div class="brand-image">
                                <img src="images/brand logo/Samsung.png" alt="" class="brand-thumb">
                            </div>
                        </div>
                        <div class="details-card-btn">
                            <a href="samsung_mobiles.php" class="details-btn">view all</a>
                        </div>
                    </div>
                    <div class="buy-container">
                        <div class="brand-card">
                            <div class="brand-image">
                                <img src="images/brand logo/Oneplus.png" alt="" class="brand-thumb">
                            </div>
                        </div>
                        <div class="details-card-btn">
                            <a href="oneplus_mobiles.php" class="details-btn">view all</a>
                        </div>
                    </div>
                    <div class="buy-container">
                        <div class="brand-card">
                            <div class="brand-image">
                                <img src="images/brand logo/Xiaomi.png" alt="" class="brand-thumb">
                            </div>
                        </div>
                        <div class="details-card-btn">
                            <a href="xiaomi_mobiles.php" class="details-btn">view all</a>
                        </div>
                    </div>
                    <div class="buy-container">
                        <div class="brand-card">
                            <div class="brand-image">
                                <img src="images/brand logo/Oppo.png" alt="" class="brand-thumb">
                            </div>
                        </div>
                        <div class="details-card-btn">
                            <a href="oppo_mobiles.php" class="details-btn">view all</a>
                        </div>
                    </div>
                    <div class="buy-container">
                        <div class="brand-card">
                            <div class="brand-image">
                                <img src="images/brand logo/Realme.png" alt="" class="brand-thumb">
                            </div>
                        </div>
                        <div class="details-card-btn">
                            <a href="realme_mobiles.php" class="details-btn">view all</a>
                        </div>
                    </div>
                    <div class="buy-container">
                        <div class="brand-card">
                            <div class="brand-image">
                                <img src="images/brand logo/Vivo.png" alt="" class="brand-thumb">
                            </div>
                        </div>
                        <div class="details-card-btn">
                            <a href="vivo_mobiles.php" class="details-btn">view all</a>
                        </div>
                    </div>
                </div>
                <div role="tablist" class="dots"></div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->
<section id="black_bg">
    <h2 class="product-category">Latest and Popular Mobiles</h2>
    <div class="reveal3">
        <div class="product-container">
            <?php
            $get_product = get_product($con, 4, 1);
            foreach ($get_product as $list) {
                $mrp = $list['mrp'];
                $mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $mrp);
            ?>
                <div class="buy-container">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" class="product-thumb" alt="">
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand"><?php echo $list['brand'] ?></h2>
                            <p class="product-name"><?php echo $list['name'] ?></p>
                            <span id="mrp" class="home-price">₹ <?php echo $mrp ?></span>
                        </div>
                    </div>
                    <div class="fr__hover__info">
                        <ul class="product__action">
                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')">
                                    <ion-icon class="icon-position" name="heart-outline"></ion-icon>
                                </a></li>
                        </ul>
                    </div>
                    <div class="details-card-btn">
                        <a href="product.php?id=<?php echo $list['id'] ?>" class="details-btn">view details</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Start Product Area -->
<section id="best-selling">
    <h2 class="product-category">Latest and Popular Laptops</h2>
    <div class="reveal">
        <div class="product-container">
            <?php
            $get_product = get_product($con, 4, 3);
            foreach ($get_product as $list) {
                $mrp = $list['mrp'];
                $mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $mrp);
            ?>
                <div class="buy-container">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" class="product-thumb" alt="">
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand"><?php echo $list['brand'] ?></h2>
                            <p class="product-name"><?php echo $list['name'] ?></p>
                            <span class="home-price">₹ <?php echo $mrp ?></span>
                        </div>
                    </div>
                    <div class="fr__hover__info">
                        <ul class="product__action">
                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')">
                                    <ion-icon class="icon-position" name="heart-outline"></ion-icon>
                                </a></li>
                        </ul>
                    </div>
                    <div class="details-card-btn">
                        <a href="product.php?id=<?php echo $list['id'] ?>" class="details-btn">view details</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section id="black_bg">
    <h2 class="product-category">Latest and Popular Tablets</h2>
    <div class="reveal3">
        <div class="product-container">
            <?php
            $get_product = get_product($con, 4, 2);
            foreach ($get_product as $list) {
                $mrp = $list['mrp'];
                $mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $mrp);
            ?>
                <div class="buy-container">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" class="product-thumb" alt="">
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand"><?php echo $list['brand'] ?></h2>
                            <p class="product-name"><?php echo $list['name'] ?></p>
                            <span class="home-price">₹ <?php echo $mrp ?></span>
                        </div>
                    </div>
                    <div class="fr__hover__info">
                        <ul class="product__action">
                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')">
                                    <ion-icon class="icon-position" name="heart-outline"></ion-icon>
                                </a></li>
                        </ul>
                    </div>
                    <div class="details-card-btn">
                        <a href="product.php?id=<?php echo $list['id'] ?>" class="details-btn">view details</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section id="best-selling">
    <h2 class="product-category">Latest and Popular Televisions</h2>
    <div class="reveal">
        <div class="product-container">
            <?php
            $get_product = get_product($con, 4, 6);
            foreach ($get_product as $list) {
                $mrp = $list['mrp'];
                $mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $mrp);
            ?>
                <div class="buy-container">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" class="product-thumb" alt="">
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand"><?php echo $list['brand'] ?></h2>
                            <p class="product-name"><?php echo $list['name'] ?></p>
                            <span class="home-price">₹ <?php echo $mrp ?></span>
                        </div>
                    </div>
                    <div class="fr__hover__info">
                        <ul class="product__action">
                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')">
                                    <ion-icon class="icon-position" name="heart-outline"></ion-icon>
                                </a></li>
                        </ul>
                    </div>
                    <div class="details-card-btn">
                        <a href="product.php?id=<?php echo $list['id'] ?>" class="details-btn">view details</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section id="black_bg">
    <h2 class="product-category">Latest and Popular Smart Watches</h2>
    <div class="reveal3">
        <div class="product-container">
            <?php
            $get_product = get_product($con, 4, 5);
            foreach ($get_product as $list) {
                $mrp = $list['mrp'];
                $mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $mrp);
            ?>
                <div class="buy-container">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" class="product-thumb" alt="">
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand"><?php echo $list['brand'] ?></h2>
                            <p class="product-name"><?php echo $list['name'] ?></p>
                            <span class="home-price">₹ <?php echo $mrp ?></span>
                        </div>
                    </div>
                    <div class="fr__hover__info">
                        <ul class="product__action">
                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')">
                                    <ion-icon class="icon-position" name="heart-outline"></ion-icon>
                                </a></li>
                        </ul>
                    </div>
                    <div class="details-card-btn">
                        <a href="product.php?id=<?php echo $list['id'] ?>" class="details-btn">view details</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section id="best-selling">
    <h2 class="product-category">Latest and Popular Audio Devices</h2>
    <div class="reveal">
        <div class="product-container">
            <?php
            $get_product = get_product($con, 4, 4);
            foreach ($get_product as $list) {
                $mrp = $list['mrp'];
                $mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $mrp);
            ?>
                <div class="buy-container">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" class="product-thumb" alt="">
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand"><?php echo $list['brand'] ?></h2>
                            <p class="product-name"><?php echo $list['name'] ?></p>
                            <span class="home-price">₹ <?php echo $mrp ?></span>
                        </div>
                    </div>
                    <div class="fr__hover__info">
                        <ul class="product__action">
                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')">
                                    <ion-icon class="icon-position" name="heart-outline"></ion-icon>
                                </a></li>
                        </ul>
                    </div>
                    <div class="details-card-btn">
                        <a href="product.php?id=<?php echo $list['id'] ?>" class="details-btn">view details</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Product Area -->
<input type="hidden" id="qty" value="1" />
<script>
    const topCate = document.querySelector('#top-categories');
    const topCat = () => {
        topCate.scrollIntoView({
            behavior: "smooth"
        })
    }
</script>
<?php require('footer.php') ?>