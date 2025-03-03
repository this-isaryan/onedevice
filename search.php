<?php
require('top.php');
$str = mysqli_real_escape_string($con, $_GET['str']);
if ($str != '') {
	$get_product = get_product($con, '', '', '', $str);
} else {
?>
	<script>
		window.location.href = 'index.php';
	</script>
<?php
}
?>
<div class="body__overlay"></div>

<?php if (count($get_product) > 0) { ?>
	<main class="search-main">
		<section class="serach-results">
			<section class="card-container">
				<h2 style="margin: 10px 18%; font-size: 25px;">Search results for <?php echo $str ?></h2>
				<div class="grid">
					<?php
					foreach ($get_product as $list) {
					?>
						<div class="buy-container">
							<div class="product-card">
								<div class="product-image">
									<img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" class="product-thumb" alt="">
								</div>
								<div class="product-info">
									<h2 class="product-brand"><?php echo $list['brand'] ?></h2>
									<p class="product-name"><?php echo $list['name'] ?></p>
									<span class="home-price">₹ <?php echo $list['mrp'] ?></span>
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
			</section>
		</section>
	</main>
<?php } else {
	echo '<main class="search-main">';
	echo '<img src="images/noresults.jpg" alt="no results" title="Sorry! no results found" class="no-results">';
	echo '</main>';
} ?>
<!-- End Product Grid -->
<!-- End Banner Area -->
<input type="hidden" id="qty" value="1" />
<?php require('footer.php') ?>