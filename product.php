<?php
ob_start();
require('top.php');
if (isset($_GET['id'])) {
	$product_id = mysqli_real_escape_string($con, $_GET['id']);
	if ($product_id > 0) {
		$get_product = get_product($con, '', '', $product_id);
	} else {
?>
		<script>
			window.location.href = '/';
		</script>
	<?php
	}
} else {
	?>
	<script>
		window.location.href = '/';
	</script>
	<?php
}
if (isset($_GET['id'])) {
	$product_id = mysqli_real_escape_string($con, $_GET['id']);
	if (
	$product_id > 0) {
		$get_product = get_product($con, '', '', $product_id);
		$mrp = $get_product['0']['mrp'];
		$mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $mrp);
		if (!$get_product['0']['amazon_mrp'] == '') {
			$amazon_mrp = $get_product['0']['amazon_mrp'];
			$amazon_mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amazon_mrp);
		}
		if (!$get_product['0']['flipkart_mrp'] == '') {
			$flipkart_mrp = $get_product['0']['flipkart_mrp'];
			$flipkart_mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $flipkart_mrp);
		}
		if (!$get_product['0']['croma_mrp'] == '') {
			$croma_mrp = $get_product['0']['croma_mrp'];
			$croma_mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $croma_mrp);
		}
	} else {
	?>
		<script>
			window.location.href = '/';
		</script>
	<?php
	}

	$resMultipleImages = mysqli_query($con, "select product_images from product_images where product_id='$product_id'");
	$multipleImages = [];
	if (mysqli_num_rows($resMultipleImages) > 0) {
		while ($rowMultipleImages = mysqli_fetch_assoc($resMultipleImages)) {
			$multipleImages[] = $rowMultipleImages['product_images'];
		}
	}

	$resAttr = mysqli_query($con, "select product_attributes.*,variant_master.variant from product_attributes left join variant_master on product_attributes.variant_id=variant_master.id and variant_master.status=1 where product_attributes.product_id='$product_id'");
	$productAttr = [];
	$variantArr = [];
	$pidArr = [];
	if (mysqli_num_rows($resAttr) > 0) {
		while ($rowAttr = mysqli_fetch_assoc($resAttr)) {
			$productAttr[] = $rowAttr;
			$variantArr[] = $rowAttr['variant'];
			$pidArr[] = $rowAttr['pid'];
		}
	}
	$is_variant = count(array_filter($variantArr));
	$variantArr = array_unique($variantArr);
	$pidArr = array_unique($pidArr);
	$varpid = array_combine($variantArr, $pidArr);
} else {
	?>
	<script>
		window.location.href = '/';
	</script>
<?php
}

if (isset($_POST['review_submit'])) {
	$rating = get_safe_value($con, $_POST['rating']);
	$review = get_safe_value($con, $_POST['review']);

	$added_on = date('Y-m-d h:i:s');
	mysqli_query($con, "insert into product_review(product_id,user_id,user_name,rating,review,status,added_on) values('$product_id','" . $_SESSION['USER_ID'] . "','" . $_SESSION['USER_NAME'] . "','$rating','$review','1','$added_on')");
	header('location:product.php?id=' . $product_id);
	die();
}


$product_review_res = mysqli_query($con, "select user_name, id, rating, review, added_on from product_review where status=1 and product_id='$product_id' order by  added_on desc");

?>
<link rel="stylesheet" href="css/product.css">

<main class="main-product">
	<section class="product-details">
		<div class="product-n">
			<h2 class="h2"><?php echo $get_product['0']['brand'] ?> <?php echo $get_product['0']['name'] ?></h2>
			<button class="wishlist-btn" onclick="wishlist_manage('<?php echo $get_product['0']['id'] ?>','add')">
				<ion-icon name="bookmark-outline" id="wish-icon"></ion-icon>
				<span id="wish-text">add to wishlist</span>
			</button>
		</div>
		<div class="p">
			<div class="product-images">
				<div class="dp active imageZoom" id="img-tab-1">
					<img id="myImg" data-origin="<?php echo PRODUCT_IMAGE_SITE_PATH . $get_product['0']['image'] ?>" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $get_product['0']['image'] ?>" alt="Product Image">
				</div>
				<?php if (isset($multipleImages[0])) { ?>
					<div class="row-col">
						<?php
						foreach ($multipleImages as $list) {
							echo "<div class='column '>";
							echo "<img src='" . PRODUCT_MULTIPLE_IMAGE_SITE_PATH . $list . "' onmouseover=showMultipleImage('" . PRODUCT_MULTIPLE_IMAGE_SITE_PATH . $list . "') class='demo cursor' >";
							echo "</div>";
						}
						?>

					</div>
				<?php } ?>
			</div>
			<div class="details">
				<div class="price-box">
					<div class="price">
						<span class="big_prc actual-price">₹ <?php echo $mrp ?></span><span class="onwards">(onwards)</span>
					</div>
					<?php if ($is_variant > 0) { ?>
						<div class="variant_box">
							<label for="variant">Variant</label>
							<select name="variant" id="variant" onchange="window.location=this.value">
								<?php foreach ($varpid as $v => $p) {
									echo "<option value='product.php?id=" . $p . "'" . (($product_id == $p) ? 'selected' : "") . ">$v</option>";
								} ?>
							</select>
						</div>
					<?php } ?>
				</div>
				<div class="product_prices_box">
					<?php if (!$get_product['0']['amazon_mrp'] == '') { ?>
					<a href="<?php echo $get_product['0']['amazon_url'] ?>" target="_blank">
    					<div class="product_prices">
    						<div class="store-logo"><img src="images/Amazon_logo.png" alt=""></div>
    						<div class="store-price">₹ <?php echo $amazon_mrp ?><button>Buy Now</button></div>
    					</div>
					</a>
					<?php }
					if (!$get_product['0']['flipkart_mrp'] == '') { ?>
					<a href="<?php echo $get_product['0']['flipkart_url'] ?>" target="_blank">
    					<div class="product_prices">
    						<div class="store-logo"><img src="images/Flipkart_logo.png" alt=""></div>
    						<div class="store-price">₹ <?php echo $flipkart_mrp ?></div>
    					</div>
					</a>
					<?php }
					if (!$get_product['0']['croma_mrp'] == '') { ?>
					<a href="<?php echo $get_product['0']['croma_url'] ?>" target="_blank">
    					<div class="product_prices">
    						<div class="store-logo"><img src="images/croma_logo.webp" alt=""></div>
    						<div class="store-price">₹ <?php echo $croma_mrp ?></div>
    					</div>
					</a>
					<?php } ?>
				</div>
				<div class="p_official_dtls">
					<span class="removesap"><a target="_blank" href="<?php echo $get_product['0']['url'] ?>" class="sap-under"><h6>Visit Official Website</h6></a></span>
					<?php if ($get_product['0']['added_on'] != '') { 
						$update_date = strtotime($get_product['0']['added_on']);
						?>
						<h6>Updated on: <?php echo date('F d, Y', $update_date) ?></h6>
						<?php
					} ?>
				</div>
				<div class="share">
					<div>Share To: </div>
					<div id="social_share_box">
						<a target="_blank" href="https://facebook.com/share.php?u=<?php echo $meta_url ?>">
							<img src="images/facebook_logo.webp" alt="">
						</a>
						<a target="_blank" href="https://twitter.com/share?text=<?php echo $get_product['0']['name'] ?>&url=<?php echo $meta_url ?>">
							<img src="images/twiiter_logo.png" alt="">
						</a>
						<a target="_blank" href="https://api.whatsapp.com/send?text=<?php echo urlencode($get_product['0']['name']) ?> <?php echo $meta_url ?>">
							<img src="images/whatsapp_logo.webp" alt="">
						</a>
					</div>
				</div>
				<div class="key-specs">
					<span class="sap sap-m"><a class="sap-under" onclick="scrolFullSpecs()">See Full Specs<ion-icon class="rgt-arrow" name="caret-forward"></ion-icon></a></span>
					<h2 class="h2">Key Specs</h2>
					<p class="osv">
						<ion-icon name="logo-<?php echo $get_product['0']['osicon'] ?>" id="os-icon"></ion-icon>
						<span id="os-text"><?php echo $get_product['0']['osv'] ?></span>
					</p>
					<?php
					if ($get_product['0']['osicon'] == 'android') {
					?>
						<script>
							jQuery('#os-icon').css('color', '#3ddc84');
						</script>
					<?php
					}
					if ($get_product['0']['osicon'] == 'windows') {
					?>
						<script>
							jQuery('#os-icon').css('color', '#00a2ed');
						</script>
					<?php
					}
					?>
					<?php if ($get_product['0']['categories_id'] == '1') { ?>
						<div class="mobile">
							<div class="key-specs-inner">
								<div class="key-performance">
									<h3>Performance</h3>
									<ul>
										<li title="<?php echo $get_product['0']['perfks1'] ?>"><?php echo $get_product['0']['perfks1'] ?></li>
										<li title="<?php echo $get_product['0']['perfks2'] ?>"><?php echo $get_product['0']['perfks2'] ?></li>
										<li title="<?php echo $get_product['0']['perfks3'] ?>"><?php echo $get_product['0']['perfks3'] ?></li>
									</ul>
								</div>
								<div class="key-display">
									<h3>Display</h3>
									<ul>
										<li title="<?php echo $get_product['0']['dispks1'] ?>"><?php echo $get_product['0']['dispks1'] ?></li>
										<li title="<?php echo $get_product['0']['dispks2'] ?>"><?php echo $get_product['0']['dispks2'] ?></li>
										<li title="<?php echo $get_product['0']['dispks3'] ?>"><?php echo $get_product['0']['dispks3'] ?></li>
									</ul>
								</div>
								<div class="key-camera">
									<h3 title="Camera">Camera</h3>
									<ul>
										<li title="<?php echo $get_product['0']['cameks1'] ?>"><?php echo $get_product['0']['cameks1'] ?></li>
										<li title="<?php echo $get_product['0']['cameks2'] ?>"><?php echo $get_product['0']['cameks2'] ?></li>
										<li title="<?php echo $get_product['0']['cameks3'] ?>"><?php echo $get_product['0']['cameks3'] ?></li>
									</ul>
								</div>
								<div class="key-battery">
									<h3>Battery</h3>
									<ul>
										<li title="<?php echo $get_product['0']['batks1'] ?>"><?php echo $get_product['0']['batks1'] ?></li>
										<li title="<?php echo $get_product['0']['batks2'] ?>"><?php echo $get_product['0']['batks2'] ?></li>
										<li title="<?php echo $get_product['0']['batks3'] ?>"><?php echo $get_product['0']['batks3'] ?></li>
									</ul>
								</div>
							</div>
						</div>
					<?php } elseif ($get_product['0']['categories_id'] == '2') { ?>
						<div class="tablet">
							<div class="key-specs-inner">
								<div class="key-performance">
									<h3>Performance</h3>
									<ul>
										<li title="<?php echo $get_product['0']['tperfks1'] ?>"><?php echo $get_product['0']['tperfks1'] ?></li>
										<li title="<?php echo $get_product['0']['tperfks2'] ?>"><?php echo $get_product['0']['tperfks2'] ?></li>
										<li title="<?php echo $get_product['0']['tperfks3'] ?>"><?php echo $get_product['0']['tperfks3'] ?></li>
									</ul>
								</div>
								<div class="key-display">
									<h3>Display</h3>
									<ul>
										<li title="<?php echo $get_product['0']['tdispks1'] ?>"><?php echo $get_product['0']['tdispks1'] ?></li>
										<li title="<?php echo $get_product['0']['tdispks2'] ?>"><?php echo $get_product['0']['tdispks2'] ?></li>
										<li title="<?php echo $get_product['0']['tdispks3'] ?>"><?php echo $get_product['0']['tdispks3'] ?></li>
									</ul>
								</div>
								<div class="key-camera">
									<h3>Camera</h3>
									<ul>
										<li title="<?php echo $get_product['0']['tcameks1'] ?>"><?php echo $get_product['0']['tcameks1'] ?></li>
										<li title="<?php echo $get_product['0']['tcameks2'] ?>"><?php echo $get_product['0']['tcameks2'] ?></li>
										<li title="<?php echo $get_product['0']['tcameks3'] ?>"><?php echo $get_product['0']['tcameks3'] ?></li>
									</ul>
								</div>
								<div class="key-battery">
									<h3>Battery</h3>
									<ul>
										<li title="<?php echo $get_product['0']['tbatks1'] ?>"><?php echo $get_product['0']['tbatks1'] ?></li>
										<li title="<?php echo $get_product['0']['tbatks2'] ?>"><?php echo $get_product['0']['tbatks2'] ?></li>
										<li title="<?php echo $get_product['0']['tbatks3'] ?>"><?php echo $get_product['0']['tbatks3'] ?></li>
									</ul>
								</div>
							</div>
						</div>
					<?php } elseif ($get_product['0']['categories_id'] == '3') { ?>
						<div class="laptop">
							<div class="key-specs-inner">
								<div class="key-performance">
									<h3>Performance</h3>
									<ul>
										<li title="<?php echo $get_product['0']['lperfks1'] ?>"><?php echo $get_product['0']['lperfks1'] ?></li>
										<li title="<?php echo $get_product['0']['lperfks2'] ?>"><?php echo $get_product['0']['lperfks2'] ?></li>
										<li title="<?php echo $get_product['0']['lperfks3'] ?>"><?php echo $get_product['0']['lperfks3'] ?></li>
									</ul>
								</div>
								<div class="key-design">
									<h3>Design</h3>
									<ul>
										<li title="<?php echo $get_product['0']['desiks1'] ?>"><?php echo $get_product['0']['desiks1'] ?></li>
										<li title="<?php echo $get_product['0']['desiks2'] ?>"><?php echo $get_product['0']['desiks2'] ?></li>
										<li title="<?php echo $get_product['0']['desiks3'] ?>"><?php echo $get_product['0']['desiks3'] ?></li>
									</ul>
								</div>
								<div class="key-storage">
									<h3>Storage</h3>
									<ul>
										<li title="<?php echo $get_product['0']['storks1'] ?>"><?php echo $get_product['0']['storks1'] ?></li>
										<li title="<?php echo $get_product['0']['storks2'] ?>"><?php echo $get_product['0']['storks2'] ?></li>
										<li title="<?php echo $get_product['0']['storks3'] ?>"><?php echo $get_product['0']['storks3'] ?></li>
									</ul>
								</div>
								<div class="key-battery">
									<h3>Battery</h3>
									<ul>
										<li title="<?php echo $get_product['0']['lbatks1'] ?>"><?php echo $get_product['0']['lbatks1'] ?></li>
										<li title="<?php echo $get_product['0']['lbatks2'] ?>"><?php echo $get_product['0']['lbatks2'] ?></li>
										<li title="<?php echo $get_product['0']['lbatks3'] ?>"><?php echo $get_product['0']['lbatks3'] ?></li>
									</ul>
								</div>
							</div>
						</div>
					<?php } elseif ($get_product['0']['categories_id'] == '4') { ?>
						<div class="audios">
							<div class="key-specs-inner">
								<div class="key-design">
									<h3>Design</h3>
									<ul>
										<li title="<?php echo $get_product['0']['adesiks1'] ?>"><?php echo $get_product['0']['adesiks1'] ?></li>
										<li title="<?php echo $get_product['0']['adesiks2'] ?>"><?php echo $get_product['0']['adesiks2'] ?></li>
										<li title="<?php echo $get_product['0']['adesiks3'] ?>"><?php echo $get_product['0']['adesiks3'] ?></li>
									</ul>
								</div>
								<div class="key-features-li" id="audio_features">
									<h3>Features</h3>
									<ul>
										<li title="<?php echo $get_product['0']['afeaks1'] ?>"><?php echo $get_product['0']['afeaks1'] ?></li>
										<li title="<?php echo $get_product['0']['afeaks2'] ?>"><?php echo $get_product['0']['afeaks2'] ?></li>
										<li title="<?php echo $get_product['0']['afeaks3'] ?>"><?php echo $get_product['0']['afeaks3'] ?></li>
									</ul>
								</div>
								<div class="key-battery" id="audio_battery">
									<h3>Battery</h3>
									<ul>
										<li id="abatks" title="<?php echo $get_product['0']['abatks1'] ?>"><?php echo $get_product['0']['abatks1'] ?></li>
										<li id="abatks" title="<?php echo $get_product['0']['abatks2'] ?>"><?php echo $get_product['0']['abatks2'] ?></li>
										<li id="abatks" title="<?php echo $get_product['0']['abatks3'] ?>"><?php echo $get_product['0']['abatks3'] ?></li>
									</ul>
								</div>
							</div>
						</div>
						<?php
						if ($get_product['0']['abatks1'] == '') {
						?>
							<script>
								jQuery('#audio_battery').hide();
								jQuery('#audio_features').css('border', 'none');
							</script>
						<?php
						}
					} elseif ($get_product['0']['categories_id'] == '5') { ?>
						<div class="watch">
							<div class="key-specs-inner">
								<div class="key-design">
									<h3>Design</h3>
									<ul>
										<li title="<?php echo $get_product['0']['wdesiks1'] ?>"><?php echo $get_product['0']['wdesiks1'] ?></li>
										<li title="<?php echo $get_product['0']['wdesiks2'] ?>"><?php echo $get_product['0']['wdesiks2'] ?></li>
										<li title="<?php echo $get_product['0']['wdesiks3'] ?>"><?php echo $get_product['0']['wdesiks3'] ?></li>
									</ul>
								</div>
								<div class="key-display">
									<h3>Display</h3>
									<ul>
										<li title="<?php echo $get_product['0']['wdisks1'] ?>"><?php echo $get_product['0']['wdisks1'] ?></li>
										<li title="<?php echo $get_product['0']['wdisks2'] ?>"><?php echo $get_product['0']['wdisks2'] ?></li>
										<li title="<?php echo $get_product['0']['wdisks3'] ?>"><?php echo $get_product['0']['wdisks3'] ?></li>
									</ul>
								</div>
								<div class="key-features-li">
									<h3>Features</h3>
									<ul>
										<li title="<?php echo $get_product['0']['wfeaks1'] ?>"><?php echo $get_product['0']['wfeaks1'] ?></li>
										<li title="<?php echo $get_product['0']['wfeaks2'] ?>"><?php echo $get_product['0']['wfeaks2'] ?></li>
										<li title="<?php echo $get_product['0']['wfeaks3'] ?>"><?php echo $get_product['0']['wfeaks3'] ?></li>
									</ul>
								</div>
								<div class="key-battery">
									<h3>Battery</h3>
									<ul>
										<li title="<?php echo $get_product['0']['wbatks1'] ?>"><?php echo $get_product['0']['wbatks1'] ?></li>
										<li title="<?php echo $get_product['0']['wbatks2'] ?>"><?php echo $get_product['0']['wbatks2'] ?></li>
										<li title="<?php echo $get_product['0']['wbatks3'] ?>"><?php echo $get_product['0']['wbatks3'] ?></li>
									</ul>
								</div>
							</div>
						</div>
					<?php } elseif ($get_product['0']['categories_id'] == '6') { ?>
						<div class="tv">
							<div class="key-specs-inner">
								<div class="key-display">
									<h3>Display</h3>
									<ul>
										<li title="<?php echo $get_product['0']['tvdisks1'] ?>"><?php echo $get_product['0']['tvdisks1'] ?></li>
										<li title="<?php echo $get_product['0']['tvdisks2'] ?>"><?php echo $get_product['0']['tvdisks2'] ?></li>
										<li title="<?php echo $get_product['0']['tvdisks3'] ?>"><?php echo $get_product['0']['tvdisks3'] ?></li>
									</ul>
								</div>
								<div class="key-features-li">
									<h3>Features</h3>
									<ul>
										<li title="<?php echo $get_product['0']['tvfeaks1'] ?>"><?php echo $get_product['0']['tvfeaks1'] ?></li>
										<li title="<?php echo $get_product['0']['tvfeaks2'] ?>"><?php echo $get_product['0']['tvfeaks2'] ?></li>
										<li title="<?php echo $get_product['0']['tvfeaks3'] ?>"><?php echo $get_product['0']['tvfeaks3'] ?></li>
									</ul>
								</div>
								<div class="key-connectivity">
									<h3>Connectivity</h3>
									<ul>
										<li title="<?php echo $get_product['0']['tvconks1'] ?>"><?php echo $get_product['0']['tvconks1'] ?></li>
										<li title="<?php echo $get_product['0']['tvconks2'] ?>"><?php echo $get_product['0']['tvconks2'] ?></li>
										<li title="<?php echo $get_product['0']['tvconks3'] ?>"><?php echo $get_product['0']['tvconks3'] ?></li>
									</ul>
								</div>
								<div class="key-smart-features">
									<h3>Smart Features</h3>
									<ul>
										<li title="<?php echo $get_product['0']['tvsmfeaks1'] ?>"><?php echo $get_product['0']['tvsmfeaks1'] ?></li>
										<li title="<?php echo $get_product['0']['tvsmfeaks2'] ?>"><?php echo $get_product['0']['tvsmfeaks2'] ?></li>
										<li title="<?php echo $get_product['0']['tvsmfeaks3'] ?>"><?php echo $get_product['0']['tvsmfeaks3'] ?></li>
									</ul>
								</div>
							</div>
						</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</section>
	<section class="product-specs">
		<div class="product-sn">
			<h2 class="h2">User Reviews</h2>
		</div>
		<div class="pro__tab__content__inner">
			<?php
			if (mysqli_num_rows($product_review_res) > 0) {

				while ($product_review_row = mysqli_fetch_assoc($product_review_res)) {
			?>
					<article class="row">
						<div class="col-md-12 col-sm-12">
							<div class="panel panel-default arrow left review-box">
								<div class="panel-body">
									<header class="text-left">
										<div style="    display: flex; justify-content: space-between; align-items: center;align-content: center; padding: 0px 30px 0px 0px;">
											<span class="comment-rating"> <?php echo $product_review_row['rating'] ?></span>
											<span class="comment-rating">Written By <?php echo $product_review_row['user_name'] ?></span>
										</div>
										<time class="comment-date">
											<?php
											$added_on = strtotime($product_review_row['added_on']);
											echo date('d M Y', $added_on);
											?>
										</time>
									</header>
									<div class="comment-post">
										<p>
											<?php echo $product_review_row['review'] ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</article>
			<?php }
			} else {
				echo "<h3 class='submit_review_hint'>No review added</h3><br/>";
			}
			?>


			<h3 class="review_heading submit_review_hint">Enter your review</h3><br />
			<?php
			if (isset($_SESSION['USER_LOGIN'])) {
			?>
				<div class="row" id="post-review-box" style=>
					<div class="col-md-12">
						<form action="" method="post">
							<select class="rating" name="rating" required>
								<option value="">Select Rating</option>
								<option>Worst</option>
								<option>Bad</option>
								<option>Good</option>
								<option>Very Good</option>
								<option>Fantastic</option>
							</select> <br />
							<textarea cols="50" id="new-review" name="review" placeholder="Enter your review here..." rows="5"></textarea>
							<div class="text-right mt10">
								<button class="submit-btn" type="submit" name="review_submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
			<?php } else {
				echo "<span class='submit_review_hint'>Please <span class='sap sap-m'><a href='/login' class='sap-under' style='color: black;'>login</a></span> to submit your review</span>";
			}
			?>
		</div>
	</section>
	<section class="product-specs" id="product-specs">
		<div class="product-sn">
			<h2 class="h2"><?php echo $get_product['0']['brand'] ?> <?php echo $get_product['0']['name'] ?> Specifications</h2>
		</div>
		<?php if ($get_product['0']['categories_id'] == '1') { ?>
			<!-- -------------------------------------Mobile-----------------------------Mobile--------------------------------------Mobile------------------------------------- -->
			<div class="mobile">
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Key Specs</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">RAM</td>
								<td class="specs-des" id="ram"><?php echo $get_product['0']['ramemory'] ?> GB</td>
							</tr>
							<tr>
								<td class="specs-title">Processor</td>
								<td class="specs-des" id="processor"><?php echo $get_product['0']['process'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Rear Camera</td>
								<td class="specs-des" id="rcam"><?php echo $get_product['0']['rcam'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Front Camera</td>
								<td class="specs-des" id="fcam"><?php echo $get_product['0']['fcam'] ?> MP</td>
							</tr>
							<tr>
								<td class="specs-title">Battery</td>
								<td class="specs-des" id="battery"><?php echo $get_product['0']['cap'] ?> mAh</td>
							</tr>
							<tr>
								<td class="specs-title">Display</td>
								<td class="specs-des" id="display"><?php echo $get_product['0']['disp'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">General</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Launch Date</td>
								<td class="specs-des" id="ldate"><?php echo $get_product['0']['ldate'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Operating System</td>
								<td class="specs-des" id="osvs"><?php echo $get_product['0']['osv'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Custom UI</td>
								<td class="specs-des" id="cui"><?php echo $get_product['0']['cui'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Performance</span>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Chipset</td>
								<td class="specs-des" id="chipset"><?php echo $get_product['0']['chip'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">CPU</td>
								<td class="specs-des" id="cpu"><?php echo $get_product['0']['cpunit'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Architecture</td>
								<td class="specs-des" id="archi"><?php echo $get_product['0']['archi'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Fabrication</td>
								<td class="specs-des" id="fab"><?php echo $get_product['0']['fab'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Graphics</td>
								<td class="specs-des" id="graph"><?php echo $get_product['0']['graph'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">RAM</td>
								<td class="specs-des" id="ramm"><?php echo $get_product['0']['ramemory'] ?> GB</td>
							</tr>
							<tr id="ramtype">
								<td class="specs-title">RAM Type</td>
								<td class="specs-des"><?php echo $get_product['0']['ramtype'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['ramtype'] == '') {
				?>
					<script>
						document.getElementById('ramtype').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Display</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Display Type</td>
								<td class="specs-des" id="distype"><?php echo $get_product['0']['distype'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Screen Size</td>
								<td class="specs-des" id="screesize"><?php echo $get_product['0']['screensize'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Resolution</td>
								<td class="specs-des" id="disres"><?php echo $get_product['0']['disres'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Aspect Ratio</td>
								<td class="specs-des" id="aspratio"><?php echo $get_product['0']['aspratio'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Pixel Density</td>
								<td class="specs-des" id="pixden"><?php echo $get_product['0']['pixden'] ?> ppi</td>
							</tr>
							<tr>
								<td class="specs-title">Screen to Body Ratio (calculated)</td>
								<td class="specs-des" id="screebody"><?php echo $get_product['0']['screenbody'] ?></td>
							</tr>
							<tr id="screeprot">
								<td class="specs-title">Screen Protection</td>
								<td class="specs-des"><?php echo $get_product['0']['screenprot'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Bezel-less display</td>
								<td class="specs-des" id="bezdisp"><?php echo $get_product['0']['bezdisp'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Touch Screen</td>
								<td class="specs-des" id="touchscree"><?php echo $get_product['0']['touchscreen'] ?></td>
							</tr>
							<tr id="bright">
								<td class="specs-title">Brightness</td>
								<td class="specs-des"><?php echo $get_product['0']['bright'] ?></td>
							</tr>
							<tr id="hdr">
								<td class="specs-title">HDR 10 / HDR+ support</td>
								<td class="specs-des"><?php echo $get_product['0']['hd'] ?></td>
							</tr>
							<tr id="refrate">
								<td class="specs-title">Refresh Rate</td>
								<td class="specs-des"><?php echo $get_product['0']['refrate'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['screenprot'] == '') {
				?>
					<script>
						document.getElementById('screeprot').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['hd'] == '') {
				?>
					<script>
						document.getElementById('hdr').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['bright'] == '') {
				?>
					<script>
						document.getElementById('bright').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['refrate'] == '') {
				?>
					<script>
						document.getElementById('refrate').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Camera</span>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td colspan="3" class="main-head ">
									<span class="specs_head">Main Camera</span>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Camera Setup</td>
								<td class="specs-des" id="camset"><?php echo $get_product['0']['camset'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Resolution</td>
								<td class="specs-des">
									<p id="res1"><?php echo $get_product['0']['res1'] ?></p>
									<span class="specs-subtitle" id="resfl1">(<?php echo $get_product['0']['resfl1'] ?>)</span>
									<p id="res2"><?php echo $get_product['0']['res2'] ?></p>
									<span class="specs-subtitle" id="resfl2">(<?php echo $get_product['0']['resfl2'] ?>)</span>
									<p id="res3"><?php echo $get_product['0']['res3'] ?></p>
									<span class="specs-subtitle" id="resfl3">(<?php echo $get_product['0']['resfl3'] ?>)</span>
									<p id="res4"><?php echo $get_product['0']['res4'] ?></p>
									<span class="specs-subtitle" id="resfl4">(<?php echo $get_product['0']['resfl4'] ?>)</span>
								</td>
							</tr>
							<?php
							if ($get_product['0']['res1'] == '') {
							?>
								<script>
									document.getElementById('res1').style.display = 'none';
								</script>
							<?php
							}
							if ($get_product['0']['resfl1'] == '') {
							?>
								<script>
									document.getElementById('resfl1').style.display = 'none';
								</script>
							<?php
							}
							?>
							<?php
							if ($get_product['0']['res2'] == '') {
							?>
								<script>
									document.getElementById('res2').style.display = 'none';
								</script>
							<?php
							}
							if ($get_product['0']['resfl2'] == '') {
							?>
								<script>
									document.getElementById('resfl2').style.display = 'none';
								</script>
							<?php
							}
							?>
							<?php
							if ($get_product['0']['res3'] == '') {
							?>
								<script>
									document.getElementById('res3').style.display = 'none';
								</script>
							<?php
							}
							if ($get_product['0']['resfl3'] == '') {
							?>
								<script>
									document.getElementById('resfl3').style.display = 'none';
								</script>
							<?php
							}
							?>
							<?php
							if ($get_product['0']['res4'] == '') {
							?>
								<script>
									document.getElementById('res4').style.display = 'none';
								</script>
							<?php
							}
							if ($get_product['0']['resfl4'] == '') {
							?>
								<script>
									document.getElementById('resfl4').style.display = 'none';
								</script>
							<?php
							}
							?>
							<tr id="sens">
								<td class="specs-title">Sensor</td>
								<td class="specs-des"><?php echo $get_product['0']['sens'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Autofocus</td>
								<td class="specs-des" id="af"><?php echo $get_product['0']['af'] ?></td>
							</tr>
							<tr id="ois">
								<td class="specs-title">OIS</td>
								<td class="specs-des"><?php echo $get_product['0']['oi'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Flash</td>
								<td class="specs-des" id="flas"><?php echo $get_product['0']['flas'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Image Resolution</td>
								<td class="specs-des" id="imgres"><?php echo $get_product['0']['imgres'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Settings</td>
								<td class="specs-des" id="sett"><?php echo $get_product['0']['sett'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Shooting Modes</td>
								<td class="specs-des" id="shootmode"><?php echo $get_product['0']['shootmode1'] ?><br><?php echo $get_product['0']['shootmode2'] ?><br><?php echo $get_product['0']['shootmode3'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Camera Features</td>
								<td class="specs-des" id="camfea"><?php echo $get_product['0']['camfea1'] ?><br><?php echo $get_product['0']['camfea2'] ?><br><?php echo $get_product['0']['camfea3'] ?><br><?php echo $get_product['0']['camfea4'] ?><br><?php echo $get_product['0']['camfea5'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Video Recording</td>
								<td class="specs-des" id="vidrec"><?php echo $get_product['0']['vidrec1'] ?><br><?php echo $get_product['0']['vidrec2'] ?><br><?php echo $get_product['0']['vidrec3'] ?></td>
							</tr>
							<tr>
								<td colspan="3" class="main-head frontCamera">
									<span class="specs_head">Front Camera</span>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Camera Setup</td>
								<td class="specs-des" id="fcamset"><?php echo $get_product['0']['fcamset'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Resolution</td>
								<td class="specs-des">
									<span id="fres"><?php echo $get_product['0']['fres'] ?></span>
									<span class="specs-subtitle" id="fresfl">(<?php echo $get_product['0']['fresfl'] ?>)</span>
								</td>
							</tr>
							<tr id="fraf">
								<td class="specs-title">Autofocus</td>
								<td class="specs-des"><?php echo $get_product['0']['faf'] ?></td>
							</tr>
							<tr id="frflash">
								<td class="specs-title">Flash</td>
								<td class="specs-des"><?php echo $get_product['0']['frflash'] ?></td>
							</tr>
							<tr id="fvidrec">
								<td class="specs-title">Video Recording</td>
								<td class="specs-des"><?php echo $get_product['0']['fvidrec1'] ?><br><?php echo $get_product['0']['fvidrec2'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['sens'] == '') {
				?>
					<script>
						document.getElementById('sens').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['faf'] == '') {
				?>
					<script>
						document.getElementById('fraf').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['frflash'] == '') {
				?>
					<script>
						document.getElementById('frflash').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['oi'] == '') {
				?>
					<script>
						document.getElementById('ois').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['fresfl'] == '') {
				?>
					<script>
						document.getElementById('fresfl').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['fvidrec1'] == '') {
				?>
					<script>
						document.getElementById('fvidrec').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Design</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Height</td>
								<td class="specs-des" id="hei"><?php echo $get_product['0']['hei'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Width</td>
								<td class="specs-des" id="wid"><?php echo $get_product['0']['wid'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Thickness</td>
								<td class="specs-des" id="thick"><?php echo $get_product['0']['thick'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Weight</td>
								<td class="specs-des" id="weig"><?php echo $get_product['0']['weig'] ?></td>
							</tr>
							<tr id="buildM">
								<td class="specs-title">Build Material</td>
								<td class="specs-des"><?php echo $get_product['0']['buildM'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Colors</td>
								<td class="specs-des" id="col"><?php echo $get_product['0']['col'] ?></td>
							</tr>
							<tr id="water">
								<td class="specs-title">Waterproof</td>
								<td class="specs-des"><?php echo $get_product['0']['water'] ?></td>
							</tr>
							<tr id="rugg">
								<td class="specs-title">Ruggedness</td>
								<td class="specs-des"><?php echo $get_product['0']['rugg'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['buildM'] == '') {
				?>
					<script>
						document.getElementById('buildM').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['water'] == '') {
				?>
					<script>
						document.getElementById('water').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['rugg'] == '') {
				?>
					<script>
						document.getElementById('rugg').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Battery</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Capacity</td>
								<td class="specs-des" id="cap"><?php echo $get_product['0']['cap'] ?> mAh</td>
							</tr>
							<tr>
								<td class="specs-title">Type</td>
								<td class="specs-des" id="typ"><?php echo $get_product['0']['typ'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Removable</td>
								<td class="specs-des" id="remove"><?php echo $get_product['0']['remove'] ?></td>
							</tr>
							<tr id="talktime">
								<td class="specs-title">Talktime</td>
								<td class="specs-des"><?php echo $get_product['0']['talktime'] ?></td>
							</tr>
							<tr id="wcharge">
								<td class="specs-title">Wireless Charging</td>
								<td class="specs-des"><?php echo $get_product['0']['wcharge'] ?></td>
							</tr>
							<tr id="qcharge">
								<td class="specs-title">Quick Charging</td>
								<td class="specs-des"><?php echo $get_product['0']['qcharge'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">USB Type-C</td>
								<td class="specs-des" id="usbc"><?php echo $get_product['0']['usbc'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['talktime'] == '') {
				?>
					<script>
						document.getElementById('talktime').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['wcharge'] == '') {
				?>
					<script>
						document.getElementById('wcharge').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['qcharge'] == '') {
				?>
					<script>
						document.getElementById('qcharge').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Storage</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Internal Memory</td>
								<td class="specs-des" id="intmem"><?php if ($get_product['0']['intmem'] == '1024') {
																		echo '1 TB';
																	} else {
																		echo $get_product['0']['intmem'] . ' GB';
																	} ?></td>
							</tr>
							<tr id="user-storage">
								<td class="specs-title">User Storage Available</td>
								<td class="specs-des"><?php echo $get_product['0']['userstore'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Expandable Memory</td>
								<td class="specs-des" id="expmem"><?php echo $get_product['0']['expmem'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">USB OTG</td>
								<td class="specs-des" id="usb-otg"><?php echo $get_product['0']['usbotg'] ?></td>
							</tr>
							<tr id="stortyp">
								<td class="specs-title">Storage Type</td>
								<td class="specs-des"><?php echo $get_product['0']['storetype'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['userstore'] == '') {
				?>
					<script>
						document.getElementById('user-storage').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['storetype'] == '') {
				?>
					<script>
						document.getElementById('stortyp').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Network &amp; Connectivity</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">SIM Slot(s)</td>
								<td class="specs-des" id="simslo"><?php echo $get_product['0']['simslot'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">SIM Size</td>
								<td class="specs-des" id="simsiz"><?php echo $get_product['0']['simsize'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Network Support</td>
								<td class="specs-des" id="netsupp"><?php echo $get_product['0']['netsupp'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">VoLTE</td>
								<td class="specs-des" id="volt"><?php echo $get_product['0']['volt'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">SIM 1</td>
								<td class="specs-des sim">
									<div class="sim-lft"><strong class="specbold">4G Bands:</strong></div>
									<div class="sim-rft" id="sim4g"><?php echo $get_product['0']['sim4g'] ?></div>
									<div class="sim-lft"><strong class="specbold">3G Bands:</strong></div>
									<div class="sim-rft" id="sim3g"><?php echo $get_product['0']['sim3g'] ?></div>
									<div class="sim-lft"><strong class="specbold">2G Bands:</strong></div>
									<div class="sim-rft" id="sim2g"><?php echo $get_product['0']['sim2g'] ?></div>
									<div class="sim-lft"><strong class="specbold">GPRS:</strong></div>
									<div class="sim-rft" id="gprs1"><?php echo $get_product['0']['gprs'] ?></div>
									<div class="sim-lft"><strong class="specbold">EDGE:</strong></div>
									<div class="sim-rft" id="edge1"><?php echo $get_product['0']['edge'] ?></div>
								</td>
							</tr>
							<tr>
								<td class="specs-title">SIM 2</td>
								<td class="specs-des sim">
									<div class="sim-lft"><strong class="specbold">4G Bands:</strong></div>
									<div class="sim-rft" id="sim24g"><?php echo $get_product['0']['sim24g'] ?></div>
									<div class="sim-lft"><strong class="specbold">3G Bands:</strong></div>
									<div class="sim-rft" id="sim23g"><?php echo $get_product['0']['sim23g'] ?></div>
									<div class="sim-lft"><strong class="specbold">2G Bands:</strong></div>
									<div class="sim-rft" id="sim22g"><?php echo $get_product['0']['sim22g'] ?><br></div>
									<div class="sim-lft"><strong class="specbold">GPRS:</strong></div>
									<div class="sim-rft" id="gprs2"><?php echo $get_product['0']['gprs2'] ?></div>
									<div class="sim-lft"><strong class="specbold">EDGE:</strong></div>
									<div class="sim-rft" id="edge2"><?php echo $get_product['0']['edge2'] ?></div>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Wi-Fi</td>
								<td class="specs-des" id="wfi"><?php echo $get_product['0']['wifi'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Wi-Fi Features</td>
								<td class="specs-des" id="wfifea"><?php echo $get_product['0']['wififea'] ?></td>
							</tr>
							<tr id="wficall">
								<td class="specs-title">Wi-Fi Calling</td>
								<td class="specs-des"><?php echo $get_product['0']['wificall'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Bluetooth</td>
								<td class="specs-des" id="blue"><?php echo $get_product['0']['blue'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">GPS</td>
								<td class="specs-des" id="gp"><?php echo $get_product['0']['gps'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">NFC</td>
								<td class="specs-des" id="nf"><?php echo $get_product['0']['nfc'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">USB Connectivity</td>
								<td class="specs-des" id="usbconn"><?php echo $get_product['0']['usbconn'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wificall'] == '') {
				?>
					<script>
						document.getElementById('wficall').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Multimedia</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">FM Radio</td>
								<td class="specs-des" id="fmr"><?php echo $get_product['0']['fmr'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Loudspeaker</td>
								<td class="specs-des" id="loud"><?php echo $get_product['0']['loud'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Audio Jack</td>
								<td class="specs-des" id="audjack"><?php echo $get_product['0']['audjack'] ?></td>
							</tr>
							<tr id="audfea">
								<td class="specs-title">Audio Features</td>
								<td class="specs-des"><?php echo $get_product['0']['audfea'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['audfea'] == '') {
				?>
					<script>
						document.getElementById('audfea').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Sensors</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Fingerprint Sensor</td>
								<td class="specs-des" id="finger"><?php echo $get_product['0']['finger'] ?></td>
							</tr>
							<tr id="fingerPos">
								<td class="specs-title">Fingerprint Sensor Position</td>
								<td class="specs-des"><?php echo $get_product['0']['fingerPos'] ?></td>
							</tr>
							<tr id="fingerType">
								<td class="specs-title">Fingerprint Sensor Type</td>
								<td class="specs-des"><?php echo $get_product['0']['fingerType'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Other Sensors</td>
								<td class="specs-des" id="othersens"><?php echo $get_product['0']['othersens'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['finger'] == 'No') {
				?>
					<script>
						document.getElementById('fingerPos').style.display = 'none';
						document.getElementById('fingerType').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['fingerType'] == '') {
				?>
					<script>
						document.getElementById('fingerType').style.display = 'none';
					</script>
				<?php
				}
				?>
			</div>
		<?php } elseif ($get_product['0']['categories_id'] == '2') { ?>
			<!-- -------------------------------------Tablet-----------------------------Tablet--------------------------------------Tablet------------------------------------- -->
			<div class="tablet">
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">General</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Launch Date</td>
								<td class="specs-des" id="ldate"><?php echo $get_product['0']['tldate'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Operating System</td>
								<td class="specs-des" id="os"><?php echo $get_product['0']['osv'] ?></td>
							</tr>
							<tr id="tcUI">
								<td class="specs-title">Custom UI</td>
								<td class="specs-des"><?php echo $get_product['0']['tcui'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tcui'] == '') {
				?>
					<script>
						document.getElementById('tcUI').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Design</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Height</td>
								<td class="specs-des" id="hei"><?php echo $get_product['0']['theight'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Width</td>
								<td class="specs-des" id="wid"><?php echo $get_product['0']['twidth'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Thickness</td>
								<td class="specs-des" id="thick"><?php echo $get_product['0']['tthick'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Weight</td>
								<td class="specs-des" id="wei"><?php echo $get_product['0']['tweight'] ?></td>
							</tr>
							<tr id="tbuildM">
								<td class="specs-title">Build Material</td>
								<td class="specs-des"><?php echo $get_product['0']['tbuildM'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Colors</td>
								<td class="specs-des" id="col"><?php echo $get_product['0']['tcolor'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tbuildM'] == '') {
				?>
					<script>
						document.getElementById('tbuildM').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Display</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Screen Size</td>
								<td class="specs-des" id="screenS"><?php echo $get_product['0']['tscreenSize'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Screen Resolution</td>
								<td class="specs-des" id="screenR"><?php echo $get_product['0']['tscreenRes'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Pixel Density</td>
								<td class="specs-des" id="pixD"><?php echo $get_product['0']['tpixDen'] ?> ppi</td>
							</tr>
							<tr>
								<td class="specs-title">Display Type</td>
								<td class="specs-des" id="distyp"><?php echo $get_product['0']['tdisType'] ?></td>
							</tr>
							<tr id="tscreenP">
								<td class="specs-title">Screen Protection</td>
								<td class="specs-des"><?php echo $get_product['0']['tscreenP'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Touch Screen</td>
								<td class="specs-des" id="touchS"><?php echo $get_product['0']['ttouchScreen'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Screen to Body Ratio</td>
								<td class="specs-des" id="screenRat"><?php echo $get_product['0']['tscreenRatio'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tscreenP'] == '') {
				?>
					<script>
						document.getElementById('tscreenP').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Performance</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Chipset</td>
								<td class="specs-des" id="chip"><?php echo $get_product['0']['tchip'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Processor</td>
								<td class="specs-des" id="process"><?php echo $get_product['0']['tprocess'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Architecture</td>
								<td class="specs-des" id="archi"><?php echo $get_product['0']['tarchi'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Graphics</td>
								<td class="specs-des" id="graph"><?php echo $get_product['0']['tgraph'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">RAM</td>
								<td class="specs-des" id="ra"><?php echo $get_product['0']['tram'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Storage</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Internal Memory</td>
								<td class="specs-des" id="intMem"><?php echo $get_product['0']['tintMem'] ?> GB</td>
							</tr>
							<tr>
								<td class="specs-title">Expandable Memory</td>
								<td class="specs-des" id="expMem"><?php echo $get_product['0']['texpMem'] ?></td>
							</tr>
							<tr id="tuserStore">
								<td class="specs-title">User Available Storage</td>
								<td class="specs-des"><?php echo $get_product['0']['tuserStore'] ?></td>
							</tr>
							<tr id="tusbotg">
								<td class="specs-title">User OTG</td>
								<td class="specs-des"><?php echo $get_product['0']['tusbotg'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tuserStore'] == '') {
				?>
					<script>
						document.getElementById('tuserStore').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tusbotg'] == '') {
				?>
					<script>
						document.getElementById('tusbotg').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Camera</span>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td colspan="3" class="main-head ">
									<span class="specs_head">Main Camera</span>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Resolution</td>
								<td class="specs-des">
									<p id="tres1"><?php echo $get_product['0']['tres1'] ?></p>
									<span class="specs-subtitle" id="tresfl1">(<?php echo $get_product['0']['tresfl1'] ?>)</span>
									<p id="tres2"><?php echo $get_product['0']['tres2'] ?></p>
									<span class="specs-subtitle" id="tresfl2">(<?php echo $get_product['0']['tresfl2'] ?>)</span>
									<p id="tres3"><?php echo $get_product['0']['tres3'] ?></p>
									<span class="specs-subtitle" id="tresfl3">(<?php echo $get_product['0']['tresfl3'] ?>)</span>
									<p id="tres4"><?php echo $get_product['0']['tres4'] ?></p>
									<span class="specs-subtitle" id="tresfl4">(<?php echo $get_product['0']['tresfl4'] ?>)</span>
								</td>
							</tr>
							<?php
							if ($get_product['0']['tres1'] == '') {
							?>
								<script>
									document.getElementById('tres1').style.display = 'none';
								</script>
							<?php
							}
							if ($get_product['0']['tresfl1'] == '') {
							?>
								<script>
									document.getElementById('tresfl1').style.display = 'none';
								</script>
							<?php
							}
							?>
							<?php
							if ($get_product['0']['tres2'] == '') {
							?>
								<script>
									document.getElementById('tres2').style.display = 'none';
								</script>
							<?php
							}
							if ($get_product['0']['tresfl2'] == '') {
							?>
								<script>
									document.getElementById('tresfl2').style.display = 'none';
								</script>
							<?php
							}
							?>
							<?php
							if ($get_product['0']['tres3'] == '') {
							?>
								<script>
									document.getElementById('tres3').style.display = 'none';
								</script>
							<?php
							}
							if ($get_product['0']['tresfl3'] == '') {
							?>
								<script>
									document.getElementById('tresfl3').style.display = 'none';
								</script>
							<?php
							}
							?>
							<?php
							if ($get_product['0']['tres4'] == '') {
							?>
								<script>
									document.getElementById('tres4').style.display = 'none';
								</script>
							<?php
							}
							if ($get_product['0']['tresfl4'] == '') {
							?>
								<script>
									document.getElementById('tresfl4').style.display = 'none';
								</script>
							<?php
							}
							?>
							<tr>
								<td class="specs-title">Autofocus</td>
								<td class="specs-des" id="af"><?php echo $get_product['0']['taf'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Flash</td>
								<td class="specs-des" id="flas"><?php echo $get_product['0']['tflash'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Image Resolution</td>
								<td class="specs-des" id="imgres"><?php echo $get_product['0']['timgRes'] ?></td>
							</tr>
							<tr id="tsett">
								<td class="specs-title">Settings</td>
								<td class="specs-des"><?php echo $get_product['0']['tsett'] ?></td>
							</tr>
							<tr id="tshootmode">
								<td class="specs-title">Shooting Modes</td>
								<td class="specs-des" id="shootmode"><?php echo $get_product['0']['tshootmode1'] ?><p id="tshootmode2"><?php echo $get_product['0']['tshootmode2'] ?></p>
									<p id="tshootmode3"><?php echo $get_product['0']['tshootmode3'] ?></p>
								</td>
							</tr>
							<tr id="tcamfea">
								<td class="specs-title">Camera Features</td>
								<td class="specs-des" id="camfea"><?php echo $get_product['0']['tcamFea1'] ?><p id="tcamFea2"><?php echo $get_product['0']['tcamFea2'] ?></p>
									<p id="tcamFea3"><?php echo $get_product['0']['tcamFea3'] ?></p>
									<p id="tcamFea4"><?php echo $get_product['0']['tcamFea4'] ?></p>
									<p id="tcamFea5"><?php echo $get_product['0']['tcamFea5'] ?></p>
								</td>
							</tr>
							<tr id="tvidrec">
								<td class="specs-title">Video Recording</td>
								<td class="specs-des"><?php echo $get_product['0']['tvidRec1'] ?><p id="tvidRec2"><?php echo $get_product['0']['tvidRec2'] ?></p>
									<p id="tvidRec3"><?php echo $get_product['0']['tvidRec3'] ?></p>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="main-head frontCamera">
									<span class="specs_head">Front Camera</span>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Resolution</td>
								<td class="specs-des">
									<p id="fres"><?php echo $get_product['0']['tfres1'] ?></p>
									<span class="specs-subtitle" id="tfresfl1">(<?php echo $get_product['0']['tfresfl1'] ?>)</span>
									<p id="fres"><?php echo $get_product['0']['tfres2'] ?></p>
									<span class="specs-subtitle" id="tfresfl2">(<?php echo $get_product['0']['tfresfl2'] ?>)</span>
								</td>
							</tr>
							<tr id="tfrflas">
								<td class="specs-title">Flash</td>
								<td class="specs-des"><?php echo $get_product['0']['tfflash'] ?></td>
							</tr>
							<tr id="tfvidrec">
								<td class="specs-title">Video Recording</td>
								<td class="specs-des"><?php echo $get_product['0']['tfvidrec1'];
														if ($get_product['0']['tfvidrec2'] != '') { ?><p><?php echo $get_product['0']['tfvidrec2'];
																										} ?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tfresfl1'] == '') {
				?>
					<script>
						document.getElementById('tfresfl1').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tfresfl2'] == '') {
				?>
					<script>
						document.getElementById('tfresfl2').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tsett'] == '') {
				?>
					<script>
						document.getElementById('tsett').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tshootmode1'] == '') {
				?>
					<script>
						document.getElementById('tshootmode').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tshootmode2'] == '') {
				?>
					<script>
						document.getElementById('tshootmode2').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tshootmode3'] == '') {
				?>
					<script>
						document.getElementById('tshootmode3').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tcamFea1'] == '') {
				?>
					<script>
						document.getElementById('tcamfea').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tcamFea2'] == '') {
				?>
					<script>
						document.getElementById('tcamFea2').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tcamFea3'] == '') {
				?>
					<script>
						document.getElementById('tcamFea3').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tcamFea4'] == '') {
				?>
					<script>
						document.getElementById('tcamFea4').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tcamFea5'] == '') {
				?>
					<script>
						document.getElementById('tcamFea5').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvidRec1'] == '') {
				?>
					<script>
						document.getElementById('tvidrec').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvidRec2'] == '') {
				?>
					<script>
						document.getElementById('tvidRec2').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvidRec3'] == '') {
				?>
					<script>
						document.getElementById('tvidRec3').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tfflash'] == '') {
				?>
					<script>
						document.getElementById('tfrflas').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tfvidrec1'] == '') {
				?>
					<script>
						document.getElementById('tfvidrec').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Battery</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Capacity</td>
								<td class="specs-des" id="cap"><?php echo $get_product['0']['tcap'] ?> mAh</td>
							</tr>
							<tr>
								<td class="specs-title">Type</td>
								<td class="specs-des" id="typ"><?php echo $get_product['0']['ttype'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">User Replaceable</td>
								<td class="specs-des" id="userR"><?php echo $get_product['0']['tuserR'] ?></td>
							</tr>
							<tr id="tquickC">
								<td class="specs-title">Quick Charging</td>
								<td class="specs-des"><?php echo $get_product['0']['tquickC'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">USB Type-C</td>
								<td class="specs-des" id="usbC"><?php echo $get_product['0']['tusbC'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tquickC'] == '') {
				?>
					<script>
						document.getElementById('tquickC').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Network &amp; Connectivity</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr id="tsimsize">
								<td class="specs-title">SIM Size</td>
								<td class="specs-des"><?php echo $get_product['0']['tsimsize'] ?></td>
							</tr>
							<tr id="tnetsupp">
								<td class="specs-title">Network Support</td>
								<td class="specs-des"><?php echo $get_product['0']['tnetsupp'] ?></td>
							</tr>
							<tr id="tvolt">
								<td class="specs-title">VoLTE</td>
								<td class="specs-des"><?php echo $get_product['0']['tvolt'] ?></td>
							</tr>
							<tr id="tsim">
								<td class="specs-title">SIM 1</td>
								<td class="specs-des sim">
									<div class="sim-lft"><strong class="specbold">4G Bands:</strong></div>
									<div class="sim-rft" id="tsim4g"><?php echo $get_product['0']['tsim4g'] ?></div>
									<div class="sim-lft"><strong class="specbold">3G Bands:</strong></div>
									<div class="sim-rft" id="tsim3g"><?php echo $get_product['0']['tsim3g'] ?></div>
									<div class="sim-lft"><strong class="specbold">2G Bands:</strong></div>
									<div class="sim-rft" id="tsim2g"><?php echo $get_product['0']['tsim2g'] ?></div>
									<div class="sim-lft"><strong class="specbold">GPRS:</strong></div>
									<div class="sim-rft" id="tgprs1"><?php echo $get_product['0']['tgprs'] ?></div>
									<div class="sim-lft"><strong class="specbold">EDGE:</strong></div>
									<div class="sim-rft" id="tedge1"><?php echo $get_product['0']['tedge'] ?></div>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Voice Calling</td>
								<td class="specs-des" id="voice-calling"><?php echo $get_product['0']['tvoiceCall'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Wi-Fi</td>
								<td class="specs-des" id="wi-fi"><?php echo $get_product['0']['twifi'] ?></td>
							</tr>
							<tr id="twi-fi-features">
								<td class="specs-title">Wi-Fi Features</td>
								<td class="specs-des"><?php echo $get_product['0']['twifiFea'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Bluetooth</td>
								<td class="specs-des" id="bluetooth"><?php echo $get_product['0']['tblue'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">NFC</td>
								<td class="specs-des" id="nfc"><?php echo $get_product['0']['tnfc'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">USB Connectivity</td>
								<td class="specs-des" id="usbConnectivity"><?php echo $get_product['0']['tusbConn'] ?></td>
							</tr>
							<tr id="thdmi">
								<td class="specs-title">HDMI</td>
								<td class="specs-des"><?php echo $get_product['0']['thdmi'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tsimsize'] == '') {
				?>
					<script>
						document.getElementById('tsimsize').style.display = 'none';
						document.getElementById('tnetsupp').style.display = 'none';
						document.getElementById('tvolt').style.display = 'none';
						document.getElementById('tsim').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['twifiFea'] == '') {
				?>
					<script>
						document.getElementById('twi-fi-features').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['thdmi'] == '') {
				?>
					<script>
						document.getElementById('thdmi').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Multimedia</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">FM Radio</td>
								<td class="specs-des" id="fm"><?php echo $get_product['0']['tfmr'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Audio Jack</td>
								<td class="specs-des" id="audio-jack"><?php echo $get_product['0']['taudioJ'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Audio Features</td>
								<td class="specs-des" id="audio-features"><?php echo $get_product['0']['taudioF'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Special Features</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Fingerprint Sensor</td>
								<td class="specs-des" id="fingerprint-sensor"><?php echo $get_product['0']['tfinger'] ?></td>
							</tr>
							<tr id="tfingerprint-position">
								<td class="specs-title">Fingerprint Sensor Position</td>
								<td class="specs-des"><?php echo $get_product['0']['tfingerPos'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Other Sensors</td>
								<td class="specs-des" id="other-sensor"><?php echo $get_product['0']['totherSens'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<?php
			if ($get_product['0']['tfinger'] == 'No') {
			?>
				<script>
					document.getElementById('tfingerprint-position').style.display = 'none';
				</script>
			<?php
			}
			?>
		<?php } elseif ($get_product['0']['categories_id'] == '3') { ?>
			<!-- -------------------------------------Laptop-----------------------------Laptop--------------------------------------Laptop------------------------------------- -->
			<div class="laptop">
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">General Information</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Brand</td>
								<td class="specs-des" id="brand"><?php echo $get_product['0']['brand'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Model</td>
								<td class="specs-des" id="model"><?php echo $get_product['0']['lmodel'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Dimensions(W&times;H&times;D)</td>
								<td class="specs-des" id="dem"><?php echo $get_product['0']['ldimen'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Weight</td>
								<td class="specs-des" id="wei"><?php echo $get_product['0']['lweight'] ?> Kg</td>
							</tr>
							<tr>
								<td class="specs-title">Colors</td>
								<td class="specs-des" id="colors"><?php echo $get_product['0']['lcolor'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Operating System</td>
								<td class="specs-des"><?php echo $get_product['0']['osv'] ?></td>
							</tr>
							<tr id="lostyp">
								<td class="specs-title">Operating System Type</td>
								<td class="specs-des"><?php echo $get_product['0']['lostype'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['lostype'] == '') {
				?>
					<script>
						document.getElementById('lostyp').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Display Details</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Display Size</td>
								<td class="specs-des" id="display-size"><?php echo $get_product['0']['ldisSize'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Display Resolution</td>
								<td class="specs-des" id="display-resolution"><?php echo $get_product['0']['ldisRes'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Pixel Density</td>
								<td class="specs-des" id="pixel-density"><?php echo $get_product['0']['lpixden'] ?> ppi</td>
							</tr>
							<tr id="ldisplay-type">
								<td class="specs-title">Display Type</td>
								<td class="specs-des"><?php echo $get_product['0']['ldisType'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Display Features</td>
								<td class="specs-des" id="displahy-features"><?php echo $get_product['0']['ldisFea'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Display Touchscreen</td>
								<td class="specs-des" id="display-touch"><?php echo $get_product['0']['ldisTouch'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['ldisType'] == '') {
				?>
					<script>
						document.getElementById('ldisplay-type').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Performance</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Processor</td>
								<td class="specs-des" id="processor"><?php echo $get_product['0']['lprocess'] ?></td>
							</tr>
							<tr id="lprocessCSpeed">
								<td class="specs-title">Processor Clock Speed</td>
								<td class="specs-des"><?php echo $get_product['0']['lprocessCSpeed'] ?> GHz</td>
							</tr>
							<tr id="lgraphicP">
								<td class="specs-title">Graphic Processor</td>
								<td class="specs-des"><?php echo $get_product['0']['lgraphProcess'] ?></td>
							</tr>
							<tr id="lgraphicM">
								<td class="specs-title">Graphics Memory</td>
								<td class="specs-des"><?php echo $get_product['0']['lgraphM'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['lprocessCSpeed'] == '') {
				?>
					<script>
						document.getElementById('lprocessCSpeed').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['lgraphProcess'] == '') {
				?>
					<script>
						document.getElementById('lgraphicP').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['lgraphM'] == '') {
				?>
					<script>
						document.getElementById('lgraphicM').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Memory</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Capacity</td>
								<td class="specs-des" id="capacity"><?php echo $get_product['0']['lcapacity'] ?> GB</td>
							</tr>
							<tr>
								<td class="specs-title">RAM type</td>
								<td class="specs-des" id="ramtyp"><?php echo $get_product['0']['lramType'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Memory Slots</td>
								<td class="specs-des" id="memory-slot"><?php echo $get_product['0']['lmemSlot'] ?></td>
							</tr>
							<tr id="lmemory-layout">
								<td class="specs-title">Memory Layout</td>
								<td class="specs-des"><?php echo $get_product['0']['lmemLayout'] ?></td>
							</tr>
							<tr id="lmemoryexpand">
								<td class="specs-title">Memory Layout</td>
								<td class="specs-des"><?php echo $get_product['0']['lmemoryexpand'] ?> GB</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['lmemLayout'] == '') {
				?>
					<script>
						document.getElementById('lmemory-layout').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['lmemoryexpand'] == '') {
				?>
					<script>
						document.getElementById('lmemoryexpand').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Storage</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Storage Capacity</td>
								<td class="specs-des" id="lstorage-capacity"><?php if ($get_product['0']['lstoreageC'] == '1024') {
																					echo '1 TB';
																				} else {
																					echo $get_product['0']['lstoreageC'] . ' GB';
																				}
																				echo ' ' . $get_product['0']['lstoragetype'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Battery</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Battery type</td>
								<td class="specs-des" id="battery-typ"><?php echo $get_product['0']['lbatType'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Power Supply</td>
								<td class="specs-des" id="power-supply"><?php echo $get_product['0']['lpowS'] ?></td>
							</tr>
							<tr id="lbatLife">
								<td class="specs-title">Battery Life</td>
								<td class="specs-des"><?php echo $get_product['0']['lbatLife'] ?> Hrs</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['lbatLife'] == '') {
				?>
					<script>
						document.getElementById('lbatLife').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Networking</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Wireless LAN</td>
								<td class="specs-des" id="wireless-LAN"><?php echo $get_product['0']['lwireLAN'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Bluetooth</td>
								<td class="specs-des" id="bluetooth"><?php echo $get_product['0']['lblue'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Bluetooth Version</td>
								<td class="specs-des" id="bluetooth-version"><?php echo $get_product['0']['lblueV'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Ports</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr id="lusb3s">
								<td class="specs-title">USB 3.0 Slots</td>
								<td class="specs-des"><?php echo $get_product['0']['lusb3'] ?></td>
							</tr>
							<tr id="lusb2s">
								<td class="specs-title">USB 2.0 Slots</td>
								<td class="specs-des"><?php echo $get_product['0']['lusb2'] ?></td>
							</tr>
							<tr id="lHDMI">
								<td class="specs-title">HDMI</td>
								<td class="specs-des"><?php echo $get_product['0']['lHDMI'] ?></td>
							</tr>
							<tr id="llockPort">
								<td class="specs-title">Lock Port</td>
								<td class="specs-des"><?php echo $get_product['0']['llockPort'] ?></td>
							</tr>
							<tr id="lusbtypeC">
								<td class="specs-title">USB Type C</td>
								<td class="specs-des"><?php echo $get_product['0']['lusbtypeC'] ?></td>
							</tr>
							<tr id="lsdcar">
								<td class="specs-title">SD Card Reader</td>
								<td class="specs-des"><?php echo $get_product['0']['lsdCard'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Headphone Jack</td>
								<td class="specs-des" id="headphone-jack"><?php echo $get_product['0']['lheadJ'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Microphone Jack</td>
								<td class="specs-des" id="microphone-jack"><?php echo $get_product['0']['lmicroJ'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['lusb3'] == '') {
				?>
					<script>
						document.getElementById('lusb3s').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['lusb2'] == '') {
				?>
					<script>
						document.getElementById('lusb2s').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['lHDMI'] == '') {
				?>
					<script>
						document.getElementById('lHDMI').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['llockPort'] == '') {
				?>
					<script>
						document.getElementById('llockPort').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['lusbtypeC'] == '') {
				?>
					<script>
						document.getElementById('lusbtypeC').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['lsdCard'] == '') {
				?>
					<script>
						document.getElementById('lsdcar').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Multimedia</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Web-cam</td>
								<td class="specs-des" id="web-cam"><?php echo $get_product['0']['lwebC'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Video Recording</td>
								<td class="specs-des" id="video-recording"><?php echo $get_product['0']['lvidRec'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Secondary cam<br>(Rear-facing)</td>
								<td class="specs-des" id="secondary-cam"><?php echo $get_product['0']['lsecondC'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Speakers</td>
								<td class="specs-des" id="speakers"><?php echo $get_product['0']['lspeaker'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Sound Technologies</td>
								<td class="specs-des" id="sound-technologies"><?php echo $get_product['0']['lsoundTech'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">In-built Microphone</td>
								<td class="specs-des" id="microphone"><?php echo $get_product['0']['lmicro'] ?></td>
							</tr>
							<tr id="lmicrophone-type">
								<td class="specs-title">Microphone Type</td>
								<td class="specs-des"><?php echo $get_product['0']['lmicroType'] ?></td>
							</tr>
							<tr id="lotherControl">
								<td class="specs-title">Microphone Type</td>
								<td class="specs-des"><?php echo $get_product['0']['lotherControl'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['lmicroType'] == '') {
				?>
					<script>
						document.getElementById('lmicrophone-type').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['lotherControl'] == '') {
				?>
					<script>
						document.getElementById('lotherControl').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Peripherals</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Optical Drive</td>
								<td class="specs-des" id="optical-drive"><?php echo $get_product['0']['loptD'] ?></td>
							</tr>
							<tr id="lpoiD">
								<td class="specs-title">Pointing Device</td>
								<td class="specs-des"><?php echo $get_product['0']['lpoiD'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Keyboard</td>
								<td class="specs-des" id="keyboard"><?php echo $get_product['0']['lkey'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Backlit Keyboard</td>
								<td class="specs-des" id="backlit-keyboard"><?php echo $get_product['0']['lbacklit'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Fingerprint Scanner</td>
								<td class="specs-des" id="fingerprint-sensor"><?php echo $get_product['0']['lfinger'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Face Unlock</td>
								<td class="specs-des" id="lfaceunlock"><?php echo $get_product['0']['lfaceunlock'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['lpoiD'] == '') {
				?>
					<script>
						document.getElementById('lpoiD').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Others</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Warranty</td>
								<td class="specs-des" id="warranty"><?php echo $get_product['0']['lwarranty'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Sales Package</td>
								<td class="specs-des" id="sales-package"><?php echo $get_product['0']['lsalesP'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Laptop End -->
		<?php } elseif ($get_product['0']['categories_id'] == '4') { ?>
			<!-- -------------------------------------Audios-----------------------------Audios--------------------------------------Audios------------------------------------- -->
			<div class="audios">
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">General</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Brand</td>
								<td class="specs-des" id="brand"><?php echo $get_product['0']['brand'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Model</td>
								<td class="specs-des" id="model"><?php echo $get_product['0']['name'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Title</td>
								<td class="specs-des" id="tit"><?php echo $get_product['0']['brand'] . ' ' . $get_product['0']['name'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Box Content</td>
								<td class="specs-des" id="boxC"><?php echo $get_product['0']['aboxC'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Design</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Type</td>
								<td class="specs-des" id="typ"><?php echo $get_product['0']['atype'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Design</td>
								<td class="specs-des" id="desi"><?php echo $get_product['0']['adesign'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Open or closed back</td>
								<td class="specs-des" id="openCloseB"><?php echo $get_product['0']['aopenCloseB'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Fit</td>
								<td class="specs-des" id="fi"><?php echo $get_product['0']['afit'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="specs-box" id="aPerformance">
					<div class="specs-heading">
						<span class="specs-head">Performance</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr id="adriver">
								<td class="specs-title">Driver</td>
								<td class="specs-des"><?php echo $get_product['0']['adriver'] ?></td>
							</tr>
							<tr id="aImpedance">
								<td class="specs-title">Impedance</td>
								<td class="specs-des"><?php echo $get_product['0']['aImpedance'] ?> ohms</td>
							</tr>
							<tr id="aSensitivity">
								<td class="specs-title">Sensitivity</td>
								<td class="specs-des"><?php echo $get_product['0']['aSensitivity'] ?> db/mw</td>
							</tr>
							<tr id="afreqRange">
								<td class="specs-title">Frequency Range</td>
								<td class="specs-des"><?php echo $get_product['0']['afreqRange'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['adriver'] == '' && $get_product['0']['aImpedance'] == '' && $get_product['0']['aSensitivity'] == '' && $get_product['0']['afreqRange'] == '') {
				?>
					<script>
						document.getElementById('aPerformance').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['adriver'] == '') {
				?>
					<script>
						document.getElementById('adriver').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['aImpedance'] == '') {
				?>
					<script>
						document.getElementById('aImpedance').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['aSensitivity'] == '') {
				?>
					<script>
						document.getElementById('aSensitivity').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['afreqRange'] == '') {
				?>
					<script>
						document.getElementById('afreqRange').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Physical Design</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr id="aearbudDim">
								<td class="specs-title">Earbud Dimension (HxWxD)</td>
								<td class="specs-des"><?php echo $get_product['0']['aearbudDim'] ?></td>
							</tr>
							<tr id="aearbudWei">
								<td class="specs-title">Earbud Weight</td>
								<td class="specs-des"><?php echo $get_product['0']['aearbudWei'] ?></td>
							</tr>
							<tr id="acaseDim">
								<td class="specs-title">Case Dimension (HxWxD)</td>
								<td class="specs-des"><?php echo $get_product['0']['acaseDim'] ?></td>
							</tr>
							<tr id="acaseWei">
								<td class="specs-title">Case Weight</td>
								<td class="specs-des"><?php echo $get_product['0']['acaseWei'] ?></td>
							</tr>
							<tr id="adura">
								<td class="specs-title">Durability</td>
								<td class="specs-des"><?php echo $get_product['0']['adura'] ?></td>
							</tr>
							<tr id="acableLen">
								<td class="specs-title">Cable Length</td>
								<td class="specs-des"><?php echo $get_product['0']['acableLen'] ?> meter</td>
							</tr>
							<tr>
								<td class="specs-title">Colors</td>
								<td class="specs-des" id="col"><?php echo $get_product['0']['acol'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['aearbudDim'] == '') {
				?>
					<script>
						document.getElementById('aearbudDim').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['aearbudWei'] == '') {
				?>
					<script>
						document.getElementById('aearbudWei').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['acaseDim'] == '') {
				?>
					<script>
						document.getElementById('acaseDim').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['acaseWei'] == '') {
				?>
					<script>
						document.getElementById('acaseWei').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['adura'] == '') {
				?>
					<script>
						document.getElementById('adura').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['acableLen'] == '') {
				?>
					<script>
						document.getElementById('acableLen').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Features</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Noise cancellation</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['anoise'] ?>" id="noiseC" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Call control</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['acall'] ?>" id="callC" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Music control</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['amusic'] ?>" id="musicC" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Ambient Sound</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['aambient'] ?>" id="ambientS" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Other control</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['aother'] ?>" id="otherC" class="yes"></ion-icon>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['anoise'] == 'close') {
				?>
					<script>
						jQuery('#noiseC').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['acall'] == 'close') {
				?>
					<script>
						jQuery('#callC').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['amusic'] == 'close') {
				?>
					<script>
						jQuery('#musicC').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['aambient'] == 'close') {
				?>
					<script>
						jQuery('#ambientS').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['aother'] == 'close') {
				?>
					<script>
						jQuery('#otherC').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Connectivity</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Connectivity</td>
								<td class="specs-des" id="conn"><?php echo $get_product['0']['aconn'] ?></td>
							</tr>
							<tr id="ablueV">
								<td class="specs-title">Blueooth Version</td>
								<td class="specs-des"><?php echo $get_product['0']['ablueV'] ?></td>
							</tr>
							<tr id="ablueRange">
								<td class="specs-title">Bluetooth Range</td>
								<td class="specs-des"><?php echo $get_product['0']['ablueRange'] ?> m Range</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['ablueV'] == '') {
				?>
					<script>
						document.getElementById('ablueV').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['ablueRange'] == '') {
				?>
					<script>
						document.getElementById('ablueRange').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Microphone</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Microphone</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['amicroI'] ?>" id="micro" class="yes"></ion-icon>
								</td>
							</tr>
							<tr id="amicroN">
								<td class="specs-title">Number of MIC</td>
								<td class="specs-des"><?php echo $get_product['0']['amicroN'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['amicroI'] == 'close') {
				?>
					<script>
						jQuery('#micro').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['amicroN'] == '') {
				?>
					<script>
						jQuery('#amicroN').hide();
					</script>
				<?php
				}
				?>
				<div class="specs-box" id="abattery">
					<div class="specs-heading">
						<span class="specs-head">Battery</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr id="aplay">
								<td class="specs-title">Playback time</td>
								<td class="specs-des"><?php echo $get_product['0']['aplay'] ?></td>
							</tr>
							<?php if ($get_product['0']['abattcapE'] != '') { ?>
								<tr id="abattCapE">
									<td class="specs-title">Battery Capacity (Earbud)</td>
									<td class="specs-des"><?php echo $get_product['0']['abattcapE'] ?></td>
								</tr>
							<?php } ?>
							<?php if ($get_product['0']['abattcapC'] != '') { ?>
								<tr id="abattCapC">
									<td class="specs-title">Battery Capacity (Case)</td>
									<td class="specs-des"><?php echo $get_product['0']['abattcapC'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['aplay'] == '' && $get_product['0']['abattcapE'] == '' && $get_product['0']['abattcapC'] == '') {
				?>
					<script>
						document.getElementById('abattery').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Compatibility</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Compatible Models</td>
								<td class="specs-des" id="compatM"><?php echo $get_product['0']['acompatM'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Audios end -->
		<?php } elseif ($get_product['0']['categories_id'] == '5') { ?>
			<!-- -------------------------------------Watch-----------------------------Watch--------------------------------------Watch------------------------------------- -->
			<div class="watch">
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">General</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Brand</td>
								<td class="specs-des" id="brand"><?php echo $get_product['0']['brand'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Model</td>
								<td class="specs-des" id="model"><?php echo $get_product['0']['name'] ?></td>
							</tr>
							<tr id="wops">
								<td class="specs-title">Operating System</td>
								<td class="specs-des"><?php echo $get_product['0']['wops'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Box Contents</td>
								<td class="specs-des" id="boxC"><?php echo $get_product['0']['wboxC'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wops'] == '') {
				?>
					<script>
						document.getElementById('wops').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Design</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Shape & Surface</td>
								<td class="specs-des" id="shapeS"><?php echo $get_product['0']['wshapeS'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Dimensions (HxWxD)</td>
								<td class="specs-des" id="dim"><?php echo $get_product['0']['wdim'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Weight</td>
								<td class="specs-des" id="wei"><?php echo $get_product['0']['wwei'] ?> grams</td>
							</tr>
							<tr id="wbodyM">
								<td class="specs-title">Body Material</td>
								<td class="specs-des"><?php echo $get_product['0']['wbodyM'] ?></td>
							</tr>
							<tr id="wstrapM">
								<td class="specs-title">Strap Material</td>
								<td class="specs-des"><?php echo $get_product['0']['wstrapM'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Colors</td>
								<td class="specs-des" id="col"><?php echo $get_product['0']['wcol'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Changeable Strap</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wchangeStrap'] ?>" id="wchangeStrap" class="yes"></ion-icon>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wbodyM'] == '') {
				?>
					<script>
						document.getElementById('wbodyM').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['wstrapM'] == '') {
				?>
					<script>
						document.getElementById('wstrapM').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['wchangeStrap'] == 'close') {
				?>
					<script>
						jQuery('#wchangeStrap').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Display</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr id="wscreenSize">
								<td class="specs-title">Screen Size</td>
								<td class="specs-des"><?php echo $get_product['0']['wscreenSize'] ?> Inch</td>
							</tr>
							<tr id="wscreenRes">
								<td class="specs-title">Screen Resolution</td>
								<td class="specs-des"><?php echo $get_product['0']['wscreenRes'] ?></td>
							</tr>
							<tr id="wpixD">
								<td class="specs-title">Pixel Density (sharpness)</td>
								<td class="specs-des"><?php echo $get_product['0']['wpixD'] ?> ppi</td>
							</tr>
							<tr>
								<td class="specs-title">Display Technology</td>
								<td class="specs-des" id="disT"><?php echo $get_product['0']['wdisT'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Touch SCreen</td>
								<td class="specs-des" id="touchS"><?php echo $get_product['0']['wtouchScreen'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wscreenSize'] == '') {
				?>
					<script>
						document.getElementById('wscreenSize').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['wscreenRes'] == '') {
				?>
					<script>
						document.getElementById('wscreenRes').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['wpixD'] == '') {
				?>
					<script>
						document.getElementById('wpixD').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Compatibility</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Compatible OS</td>
								<td class="specs-des" id="compOS"><?php echo $get_product['0']['wcompOS'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Battery</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr id="wbattCap">
								<td class="specs-title">Battery Capacity</td>
								<td class="specs-des"><?php echo $get_product['0']['wbattCap'] ?> mAh</td>
							</tr>
							<tr id="wusageH">
								<td class="specs-title">Typical Usage Time</td>
								<td class="specs-des"><?php echo $get_product['0']['wusageH'] ?> <?php echo $get_product['0']['wusagetype'] ?></td>
							</tr>
							<tr id="wchargeM">
								<td class="specs-title">Charging Mode</td>
								<td class="specs-des"><?php echo $get_product['0']['wchargeM'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wbattCap'] == '') {
				?>
					<script>
						document.getElementById('wbattCap').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['wusageH'] == '') {
				?>
					<script>
						document.getElementById('wusageH').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['wchargeM'] == '') {
				?>
					<script>
						document.getElementById('wchargeM').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Connectivity</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Bluetooth</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wblueI'] ?>" id="blueI" class="yes"></ion-icon><span id="blueV"><?php echo $get_product['0']['wblue'] ?></span>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Wireless Protocol</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wwirePI'] ?>" id="wirePI" class="yes"></ion-icon><span id="wireP" class="ml10"><?php echo $get_product['0']['wwireP'] ?></span>
								</td>
							</tr>
							<tr>
								<td class="specs-title">SIM</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wsimI'] ?>" id="wsimI" class="yes"></ion-icon><span id="wsim" class="ml10"><?php echo $get_product['0']['wsim'] ?></span>
								</td>
							</tr>
							<tr>
								<td class="specs-title">USB Connectivity</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wusbCI'] ?>" id="usbConnI" class="yes"></ion-icon><span id="usbConn" class="ml10"><?php echo $get_product['0']['wusbC'] ?></span>
								</td>
							</tr>
							<tr>
								<td class="specs-title">NFC</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wnfcI'] ?>" id="wnfcI" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Navigation</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wnavI'] ?>" id="wnavI" class="yes"></ion-icon><span id="wnav" class="ml10"><?php echo $get_product['0']['wnav'] ?></span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wblueI'] == 'close') {
				?>
					<script>
						jQuery('#blueI').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wwirePI'] == 'close') {
				?>
					<script>
						jQuery('#wirePI').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wsimI'] == 'close') {
				?>
					<script>
						jQuery('#wsimI').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wusbCI'] == 'close') {
				?>
					<script>
						jQuery('#usbConnI').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wnfcI'] == 'close') {
				?>
					<script>
						jQuery('#wnfcI').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wnavI'] == 'close') {
				?>
					<script>
						jQuery('#wnavI').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Sensors</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Accelerometer</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wacc'] ?>" id="acc" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Gyro</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wgyro'] ?>" id="gyr" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Light</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wlight'] ?>" id="lig" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">GPS</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wgpsI'] ?>" id="gpI" class="yes"></ion-icon><span id="wgp" class="ml10"><?php echo $get_product['0']['wgps'] ?></span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wacc'] == 'close') {
				?>
					<script>
						jQuery('#acc').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wgyro'] == 'close') {
				?>
					<script>
						jQuery('#gyr').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wlight'] == 'close') {
				?>
					<script>
						jQuery('#lig').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wgpsI'] == 'close') {
				?>
					<script>
						jQuery('#gpI').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box" id="whardware">
					<div class="specs-heading">
						<span class="specs-head">Hardware</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Processor</td>
								<td class="specs-des" id="process"><?php echo $get_product['0']['wprocess'] ?></td>
							</tr>
							<tr id="wram">
								<td class="specs-title">RAM</td>
								<td class="specs-des"><?php echo $get_product['0']['wram'] ?> GB</td>
							</tr>
							<tr>
								<td class="specs-title">Internal Memory</td>
								<td class="specs-des" id="intM"><?php echo $get_product['0']['wintMem'] ?> GB</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wprocess'] == '' && $get_product['0']['wram'] == '' && $get_product['0']['wintMem'] == '') {
				?>
					<script>
						document.getElementById('whardware').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['wram'] == '') {
				?>
					<script>
						document.getElementById('wram').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Notifications</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Text Message</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wtextM'] ?>" id="textM" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Incoming Call</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wincomeCall'] ?>" id="incomeC" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Alarm</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['walarm'] ?>" id="ala" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Calender Reminder</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wcalR'] ?>" id="calR" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Timer</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wtime'] ?>" id="time" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Weather</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wweather'] ?>" id="weath" class="yes"></ion-icon>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wtextM'] == 'close') {
				?>
					<script>
						jQuery('#textM').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wincomeCall'] == 'close') {
				?>
					<script>
						jQuery('#incomeC').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['walarm'] == 'close') {
				?>
					<script>
						jQuery('#ala').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wcalR'] == 'close') {
				?>
					<script>
						jQuery('#calR').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wtime'] == 'close') {
				?>
					<script>
						jQuery('#time').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wweather'] == 'close') {
				?>
					<script>
						jQuery('#weath').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Smartphone Remote Features</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Make Call</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wmakeCall'] ?>" id="makeC" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Camera Shutter Control</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wcameraS'] ?>" id="cameraS" class="yes"></ion-icon>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wmakeCall'] == 'close') {
				?>
					<script>
						jQuery('#makeC').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wcameraS'] == 'close') {
				?>
					<script>
						jQuery('#cameraS').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Activity Features</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Calories Intake/ burned</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wcal'] ?>" id="cal" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Steps</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wstep'] ?>" id="step" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Sleep Quality</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wsleep'] ?>" id="sleep" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Hours Slept</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['whours'] ?>" id="hours" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Heart Rate</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wwheart'] ?>" id="heart" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Distance</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wdistance'] ?>" id="wdistance" class="yes"></ion-icon>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wcal'] == 'close') {
				?>
					<script>
						jQuery('#cal').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wstep'] == 'close') {
				?>
					<script>
						jQuery('#step').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wsleep'] == 'close') {
				?>
					<script>
						jQuery('#sleep').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['whours'] == 'close') {
				?>
					<script>
						jQuery('#hours').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wwheart'] == 'close') {
				?>
					<script>
						jQuery('#heart').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wdistance'] == 'close') {
				?>
					<script>
						jQuery('#wdistance').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Multimedia</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Speaker</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wspeak'] ?>" id="speak" class="yes"></ion-icon>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wspeak'] == 'close') {
				?>
					<script>
						jQuery('#speak').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Features</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Water Resistant</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wwaterResI'] ?>" id="wwaterResI" class="yes"></ion-icon><span id="wwaterRes" class="ml10"><?php echo $get_product['0']['wwaterRes'] ?>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Voice Control</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wvoiceCI'] ?>" id="wvoiceCI" class="yes"></ion-icon><span id="wvoiceC" class="ml10"><?php echo $get_product['0']['wvoiceC'] ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['wwaterResI'] == 'close') {
				?>
					<script>
						jQuery('#wwaterResI').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wvoiceCI'] == 'close') {
				?>
					<script>
						jQuery('#wvoiceCI').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Additional Features</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Alarm Clock</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['walarmC'] ?>" id="alarmC" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Reminders</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wremind'] ?>" id="remind" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Stopwatch</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['wstopW'] ?>" id="stopW" class="yes"></ion-icon>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['walarmC'] == 'close') {
				?>
					<script>
						jQuery('#alarmC').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wremind'] == 'close') {
				?>
					<script>
						jQuery('#remind').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['wstopW'] == 'close') {
				?>
					<script>
						jQuery('#stopW').addClass('wrong');
					</script>
				<?php
				}
				?>
			</div>
			<!-- Watch end -->
		<?php } elseif ($get_product['0']['categories_id'] == '6') { ?>
			<!-- -------------------------------------Television------------------------Television---------------------------------Television-------------------------------- -->
			<div class="tv">
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">General</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Brand</td>
								<td class="specs-des" id="brand"><?php echo $get_product['0']['brand'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Model</td>
								<td class="specs-des" id="model"><?php echo $get_product['0']['name'] ?></td>
							</tr>
							<tr id="tvseries">
								<td class="specs-title">Series</td>
								<td class="specs-des"><?php echo $get_product['0']['tvseries'] ?></td>
							</tr>
							<tr id="tvwarranty">
								<td class="specs-title">Warranty</td>
								<td class="specs-des"><?php echo $get_product['0']['tvwarranty'] ?></td>
							</tr>
							<tr id="tvboxC">
								<td class="specs-title">Box Contents</td>
								<td class="specs-des"><?php echo $get_product['0']['tvboxC'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tvseries'] == '') {
				?>
					<script>
						document.getElementById('tvseries').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvwarranty'] == '') {
				?>
					<script>
						document.getElementById('tvwarranty').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvboxC'] == '') {
				?>
					<script>
						document.getElementById('tvboxC').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Display</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Type</td>
								<td class="specs-des" id="typ"><?php echo $get_product['0']['tvtype'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Size(Diagonal)</td>
								<td class="specs-des" id="siz"><?php echo $get_product['0']['tvsize'] ?> Inch</td>
							</tr>
							<tr>
								<td class="specs-title">Resolution</td>
								<td class="specs-des" id="reso"><?php echo $get_product['0']['tvreso'] ?></td>
							</tr>
							<tr id="tvRefRate">
								<td class="specs-title">Refresh Rate</td>
								<td class="specs-des"><?php echo $get_product['0']['tvRefRate'] ?>Hz</td>
							</tr>
							<tr>
								<td class="specs-title">Aspect Ratio</td>
								<td class="specs-des" id="aspR"><?php echo $get_product['0']['tvaspRatio'] ?></td>
							</tr>
							<tr id="tvhoriView">
								<td class="specs-title">Horizontal Viewing Angles</td>
								<td class="specs-des"><?php echo $get_product['0']['tvhoriView'] ?> Degrees</td>
							</tr>
							<tr id="tvvertView">
								<td class="specs-title">Vertical Viewing Angles</td>
								<td class="specs-des"><?php echo $get_product['0']['tvvertView'] ?> Degrees</td>
							</tr>
							<tr>
								<td class="specs-title">3D TV</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tv3D'] ?>" id="tv3" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Curved TV</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvcurved'] ?>" id="cur" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Ultra Slim TV</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvultraSlim'] ?>" id="ultraS" class="yes"></ion-icon>
								</td>
							</tr>
							<tr id="tvotherDispFea">
								<td class="specs-title">Other Display Features</td>
								<td class="specs-des"><?php echo $get_product['0']['tvotherDispFea'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tvRefRate'] == '') {
				?>
					<script>
						document.getElementById('tvRefRate').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvhoriView'] == '') {
				?>
					<script>
						document.getElementById('tvhoriView').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvvertView'] == '') {
				?>
					<script>
						document.getElementById('tvvertView').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvotherDispFea'] == '') {
				?>
					<script>
						document.getElementById('tvotherDispFea').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tv3D'] == 'close') {
				?>
					<script>
						jQuery('#tv3').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvcurved'] == 'close') {
				?>
					<script>
						jQuery('#cur').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvultraSlim'] == 'close') {
				?>
					<script>
						jQuery('#ultraS').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Physical Design</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Color</td>
								<td class="specs-des" id="col"><?php echo $get_product['0']['tvcolor'] ?></td>
							</tr>
							<tr id="tvweight">
								<td class="specs-title">Weight Without Stand</td>
								<td class="specs-des"><?php echo $get_product['0']['tvweight'] ?> kg</td>
							</tr>
							<tr id="tvweightStand">
								<td class="specs-title">Weight with Stand</td>
								<td class="specs-des"><?php echo $get_product['0']['tvweightStand'] ?> kg</td>
							</tr>
							<tr id="tvdimStand">
								<td class="specs-title">Dimensions With Stand(W&times;H&times;D)</td>
								<td class="specs-des"><?php echo $get_product['0']['tvdimStand'] ?></td>
							</tr>
							<tr id="tvdim">
								<td class="specs-title">Dimensions Without Stand(W&times;H&times;D)</td>
								<td class="specs-des"><?php echo $get_product['0']['tvdim'] ?></td>
							</tr>
							<tr id="tvstandType">
								<td class="specs-title">Stand Type</td>
								<td class="specs-des"><?php echo $get_product['0']['tvstandType'] ?></td>
							</tr>
							<tr id="tvstandColor">
								<td class="specs-title">Stand Color</td>
								<td class="specs-des"><?php echo $get_product['0']['tvstandColor'] ?></td>
							</tr>
							<tr id="tvstandFea">
								<td class="specs-title">Stand Features</td>
								<td class="specs-des"><?php echo $get_product['0']['tvstandFea'] ?></td>
							</tr>
							<tr id="tvwllMountDim">
								<td class="specs-title">Wall Mount Dimensions(W&times;H)</td>
								<td class="specs-des"><?php echo $get_product['0']['tvwllMountDim'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tvweight'] == '') {
				?>
					<script>
						document.getElementById('tvweight').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvweightStand'] == '') {
				?>
					<script>
						document.getElementById('tvweightStand').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvdimStand'] == '') {
				?>
					<script>
						document.getElementById('tvdimStand').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvdim'] == '') {
				?>
					<script>
						document.getElementById('tvdim').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvstandType'] == '') {
				?>
					<script>
						document.getElementById('tvstandType').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvstandColor'] == '') {
				?>
					<script>
						document.getElementById('tvstandColor').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvstandFea'] == '') {
				?>
					<script>
						document.getElementById('tvstandFea').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvwllMountDim'] == '') {
				?>
					<script>
						document.getElementById('tvwllMountDim').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Video</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr id="tvdigitalRF">
								<td class="specs-title">Digital TV Reception Formats</td>
								<td class="specs-des"><?php echo $get_product['0']['tvdigitalRF'] ?></td>
							</tr>
							<tr id="tvvideoF">
								<td class="specs-title">Video Formats Supported</td>
								<td class="specs-des"><?php echo $get_product['0']['tvvideoF'] ?></td>
							</tr>
							<tr id="tvimageF">
								<td class="specs-title">Image Formats Supported</td>
								<td class="specs-des"><?php echo $get_product['0']['tvimageF'] ?></td>
							</tr>
							<tr id="tvupscale">
								<td class="specs-title">Upscaling</td>
								<td class="specs-des"><?php echo $get_product['0']['tvupscale'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tvdigitalRF'] == '') {
				?>
					<script>
						document.getElementById('tvdigitalRF').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvvideoF'] == '') {
				?>
					<script>
						document.getElementById('tvvideoF').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvimageF'] == '') {
				?>
					<script>
						document.getElementById('tvimageF').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvupscale'] == '') {
				?>
					<script>
						document.getElementById('tvupscale').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Audio</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr id="tvsoundtype">
								<td class="specs-title">Sound Type</td>
								<td class="specs-des"><?php echo $get_product['0']['tvsoundtype'] ?></td>
							</tr>
							<tr id="tvsoundTech">
								<td class="specs-title">Sound Technology</td>
								<td class="specs-des"><?php echo $get_product['0']['tvsoundTech'] ?></td>
							</tr>
							<tr id="tvaudioF">
								<td class="specs-title">Audio Formats Supported</td>
								<td class="specs-des"><?php echo $get_product['0']['tvaudioF'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Total Speaker Output</td>
								<td class="specs-des" id="totalSO"><?php echo $get_product['0']['tvtotalSO'] ?></td>
							</tr>
							<tr id="tvspeakerF">
								<td class="specs-title">Speaker Frequency Range</td>
								<td class="specs-des"><?php echo $get_product['0']['tvspeakerF'] ?></td>
							</tr>
							<tr id="tvotherSA">
								<td class="specs-title">Other Smart Audio Features</td>
								<td class="specs-des"><?php echo $get_product['0']['tvotherSA'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tvsoundTech'] == '') {
				?>
					<script>
						document.getElementById('tvsoundTech').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvsoundtype'] == '') {
				?>
					<script>
						document.getElementById('tvsoundtype').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvaudioF'] == '') {
				?>
					<script>
						document.getElementById('tvaudioF').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvspeakerF'] == '') {
				?>
					<script>
						document.getElementById('tvspeakerF').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvotherSA'] == '') {
				?>
					<script>
						document.getElementById('tvotherSA').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Connectivity<br>/Ports</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">USB Ports</td>
								<td class="specs-des" id="usbP"><?php echo $get_product['0']['tvusbP'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">USB Supports</td>
								<td class="specs-des" id="usbS"><?php echo $get_product['0']['tvusbS'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">HDMI Ports</td>
								<td class="specs-des" id="hdmi"><?php echo $get_product['0']['tvhdmi'] ?></td>
							</tr>
							<tr id="tvdigitalOA">
								<td class="specs-title">Digital/Optical Audio Output Ports</td>
								<td class="specs-des"><?php echo $get_product['0']['tvdigitalOA'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">RF Input(Analog Coaxial) Ports</td>
								<td class="specs-des" id="rfI"><?php echo $get_product['0']['tvrfI'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Ethernet Sockets</td>
								<td class="specs-des" id="ethernetS"><?php echo $get_product['0']['tvethernetS'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tvdigitalOA'] == '') {
				?>
					<script>
						document.getElementById('tvdigitalOA').style.display = 'none';
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Smart TV Features</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Smart TV</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvsmartv'] ?>" id="smartv" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Android TV</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvandroid'] ?>" id="tvandroid" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Wifi Present</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvwifiP'] ?>" id="wfiP" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Wifi-Direct Support</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvwifiD'] ?>" id="wfiD" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Miracast/Screen Mirroring Support</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvmiracast'] ?>" id="mira" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Bluetooth</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvblue'] ?>" id="tvblue" class="yes"></ion-icon><span id="blueV" class="ml10"><?php echo $get_product['0']['tvblueV'] ?></span>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Inbuilt Apps</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvinbuiltI'] ?>" id="inbuiltI" class="yes"></ion-icon><span id="inbuiltA" class="ml10"><?php echo $get_product['0']['tvinbuiltA'] ?></span>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Facebook and Social Media Integration</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvfacebook'] ?>" id="face" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Games</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvgame'] ?>" id="game" class="yes"></ion-icon>
								</td>
							</tr>
							<tr>
								<td class="specs-title">Voice Recognition</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvvoice'] ?>" id="voice" class="yes"></ion-icon>
								</td>
							</tr>
							<tr id="tvotherSF">
								<td class="specs-title">Other Smart Features</td>
								<td class="specs-des"><?php echo $get_product['0']['tvotherSF'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tvsmartv'] == 'close') {
				?>
					<script>
						jQuery('#smartv').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvandroid'] == 'close') {
				?>
					<script>
						jQuery('#tvandroid').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvwifiP'] == 'close') {
				?>
					<script>
						jQuery('#wfiP').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvwifiD'] == 'close') {
				?>
					<script>
						jQuery('#wfiD').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvmiracast'] == 'close') {
				?>
					<script>
						jQuery('#mira').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvblue'] == 'close') {
				?>
					<script>
						jQuery('#tvblue').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvinbuiltI'] == 'close') {
				?>
					<script>
						jQuery('#inbuiltI').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvfacebook'] == 'close') {
				?>
					<script>
						jQuery('#face').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvgame'] == 'close') {
				?>
					<script>
						jQuery('#game').addClass('wrong');
					</script>
				<?php
				}
				if ($get_product['0']['tvvoice'] == 'close') {
				?>
					<script>
						jQuery('#voice').addClass('wrong');
					</script>
				<?Php
				}
				if ($get_product['0']['tvotherSF'] == 'close') {
				?>
					<script>
						document.getElementById('tvotherSF').style.display = 'none';
					</script>
				<?Php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Remote</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Internet Access</td>
								<td class="specs-des">
									<ion-icon name="<?php echo $get_product['0']['tvinternetA'] ?>" id="internetA" class="yes"></ion-icon>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tvinternetA'] == 'close') {
				?>
					<script>
						jQuery('#internetA').addClass('wrong');
					</script>
				<?php
				}
				?>
				<div class="specs-box">
					<div class="specs-heading">
						<span class="specs-head">Power Supply</span>
						<div class="clr"></div>
					</div>
					<table class="specs-table">
						<tbody>
							<tr>
								<td class="specs-title">Voltage Requirement</td>
								<td class="specs-des" id="volt"><?php echo $get_product['0']['tvvolt'] ?></td>
							</tr>
							<tr>
								<td class="specs-title">Frequency Requirement</td>
								<td class="specs-des" id="freq"><?php echo $get_product['0']['tvfreq'] ?></td>
							</tr>
							<tr id="tvpowerCR">
								<td class="specs-title">Power Consmption Running</td>
								<td class="specs-des"><?php echo $get_product['0']['tvpowerCR'] ?></td>
							</tr>
							<tr id="tvpowerCS">
								<td class="specs-title">Power Consmption Standby</td>
								<td class="specs-des"><?php echo $get_product['0']['tvpowerCS'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				if ($get_product['0']['tvpowerCR'] == '') {
				?>
					<script>
						document.getElementById('tvpowerCR').style.display = 'none';
					</script>
				<?php
				}
				if ($get_product['0']['tvpowerCS'] == '') {
				?>
					<script>
						document.getElementById('tvpowerCS').style.display = 'none';
					</script>
				<?php
				}
				?>
			</div>
			<!-- television end -->
		<?php } ?>

		<div class="disclaimer-box">
			<span class="disclamer">Disclaimer: The price &amp; specs shown may be different from actual. Please
				confirm on the retailer site before purchasing.</span>
			<span class="error-rpt"><span>If you find any Error then Please&nbsp;&nbsp;</span><span class="sap"><a class="sap-under repSize" href="/contact">Report to Us<ion-icon class="rgt-arrow" name="caret-forward"></ion-icon></a></span></span>
		</div>

	</section>
</main>
<?php
$get_product = get_product($con, 14, $get_product['0']['categories_id'], '', '', '', $product_id);
if (count($get_product) > 0) { ?>
	<div id="best-selling">
		<h2 class="product-category h2">Similar Products</h2>
		<div class="slider-btns">
			<button aria-label="Previous" class="glider-prev">
				<ion-icon name="chevron-back-outline"></ion-icon>
			</button>
			<button aria-label="Next" class="glider-next">
				<ion-icon class="arrow" name="chevron-forward-outline"></ion-icon>
			</button>
		</div>
		<div class="reveal2">
			<div class="product-container">
				<div class="glider-contain">
					<div class="glider">
						<?php
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
					<div role="tablist" class="dots"></div>
				</div>
			</div>
		</div>
	</div>
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
	$res = mysqli_query($con, "select product.*, brands.brand from product, brands where product.id IN ($recentViewId) and product.brand_id=brands.id and product.status=1 and product.id!=$product_id order by id desc");

?>
	<div id="best-selling">
		<h2 class="product-category h2">Recently Viewed</h2>
		<div class="reveal3">
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
	</div>
<?php
	$arrRec = unserialize($_COOKIE['recently_viewed']);
	if (($key = array_search($product_id, $arrRec)) !== false) {
		unset($arrRec[$key]);
	}
	$arrRec[] = $product_id;
} else {
	$arrRec[] = $product_id;
}
setcookie('recently_viewed', serialize($arrRec), time() + 60 * 60 * 24 * 365);
?>
<script>
	function showMultipleImage(im) {
		jQuery('#img-tab-1').html("<img src='" + im + "' data-origin='" + im + "'/>");
		jQuery('.imageZoom').imgZoom();
	}
	const productSpecs = document.querySelector('#product-specs');
	const scrolFullSpecs = () => {
		productSpecs.scrollIntoView({
			behavior: "smooth"
		})
	}
</script>

<?php require('footer.php');
ob_flush();
?>