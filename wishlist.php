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

$res = mysqli_query($con, "select product.name, product.image, wishlist.id, product.mrp, brands.brand, product.id as pid from product, wishlist, brands where wishlist.product_id=product.id and wishlist.user_id='$uid' and product.brand_id=brands.id");
?>

<main class="saved-main">
    <div class="savedItems-section">
        <div class="product-list">
            <p class="section-heading">your saved items</p>
            <?php if (mysqli_num_rows($res) > 0) { ?>
                <div class="savedItems">
                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                        $mrp = $row['mrp'];
                        $mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $mrp);
                    ?>
                        <div class="sm-product">
                            <div>
                                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" class="sm-product-img">
                                <a class="sm-delete-btn" href="wishlist.php?wishlist_id=<?php echo $row['id'] ?>">
                                    <ion-icon name="close"></ion-icon>
                                </a>
                            </div>
                            <div class="sm-text">
                                <a href='product.php?id=<?php echo $row['pid'] ?>'>
                                    <p class="sm-product-brand"><?php echo $row['brand'] ?></p>
                                    <p class="sm-product-name"><?php echo $row['name'] ?></p>
                                </a>
                            </div>
                            <a href='product.php?id=<?php echo $row['pid'] ?>'>
                                <div class="sm-price">
                                    <p class="sm-product-price">₹ <?php echo $mrp ?></p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="savedItems">
                    <img src="images/empty-cart.svg" class="empty-img">
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php require('footer.php') ?>