<?php

//fetch_data.php

include('connection.inc.php');

if (isset($_POST["action"])) {
	$query = "select product.*, brands.brand from product, brands where product.status = 1 and product.categories_id = 5 and product.brand_id=brands.id";

	if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
		$query .= "
		 AND product.mrp BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'
		";
	}
	if (isset($_POST["brand"])) {
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND brands.brand IN('" . $brand_filter . "')
		";
	}
	if (isset($_POST["wscreenSize_less_15"])) {
		$query .= "
		 AND product.wscreenSize <= 1.5
		";
	}
	if (isset($_POST["wscreenSize_more_15"])) {
		$query .= "
		 AND product.wscreenSize >= 1.5
		";
	}
	if (isset($_POST["wtouchScreen"])) {
		$query .= "
		 AND product.wtouchScreen LIKE '%Yes%'
		";
	}
	if (isset($_POST["wandroid"])) {
		$query .= "
		 AND product.wcompOS LIKE '%Android%'
		";
	}
	if (isset($_POST["wios"])) {
		$query .= "
		 AND product.wcompOS LIKE '%iOS%'
		";
	}
	if (isset($_POST["wcap"])) {
		$wcap_filter = implode("','", $_POST["wcap"]);
		$query .= "
		 AND product.wbattCap >= " . $wcap_filter . "
		";
	}
	if (isset($_POST["wusageH"])) {
		$query .= "
		 AND product.wusageH >= " . $wusageH_filter . " AND product.wusagetype = 'Days'
		";
	}
	if (isset($_POST["wchargeM"])) {
		$wchargeM_filter = implode("','", $_POST["wchargeM"]);
		$query .= "
		 AND product.wchargeM IN('" . $wchargeM_filter . "')
		";
	}
	if (isset($_POST["wlte"])) {
		$query .= "
		AND product.wsimI = 'checkmark'
		";
	}
	if (isset($_POST["wwifi"])) {
		$query .= "
		AND product.wwirePI = 'checkmark'
		";
	}
	if (isset($_POST["wbluetooth"])) {
		$query .= "
		AND product.wblueI = 'checkmark'
		";
	}
	if (isset($_POST["wusb"])) {
		$query .= "
		AND product.wusbCI = 'checkmark'
		";
	}
	if (isset($_POST["wnfc"])) {
		$query .= "
		AND product.wnfcI = 'checkmark'
		";
	}
	if (isset($_POST["wintMem"])) {
		$wintMem_filter = implode("','", $_POST["wintMem"]);
		$query .= "
		 AND product.wintMem IN('" . $wintMem_filter . "')
		";
	}
	if (isset($_POST["wintMem"])) {
		$wintMem_filter = implode("','", $_POST["wintMem"]);
		$query .= "
		 AND product.wintMem IN('" . $wintMem_filter . "')
		";
	}
	if (isset($_POST["wstrapM"])) {
		$wstrapM_filter = implode("','", $_POST["wstrapM"]);
		$query .= "
		 AND product.wstrapM IN('" . $wstrapM_filter . "')
		";
	}
	if (isset($_POST["wbodyM"])) {
		$wbodyM_filter = implode("','", $_POST["wbodyM"]);
		$query .= "
		 AND product.wbodyM IN('" . $wbodyM_filter . "')
		";
	}
	if (isset($_POST["wcal"])) {
		$query .= "
		AND product.wcal = 'checkmark'
		";
	}
	if (isset($_POST["wstep"])) {
		$query .= "
		AND product.wstep = 'checkmark'
		";
	}
	if (isset($_POST["wheartRate"])) {
		$query .= "
		AND product.wwheart = 'checkmark'
		";
	}
	if (isset($_POST["wsleep"])) {
		$query .= "
		AND product.whours = 'checkmark'
		";
	}
	if (isset($_POST["wdistance"])) {
		$query .= "
		AND product.wdistance = 'checkmark'
		";
	}
	if (isset($_POST["wsleep"])) {
		$query .= "
		AND product.wsleep = 'checkmark'
		";
	}
	if (isset($_POST["wwaterRes"])) {
		$query .= "
		AND product.wwaterResI = 'checkmark'
		";
	}
	if (isset($_POST["wvoiceC"])) {
		$query .= "
		AND product.wvoiceCI = 'checkmark'
		";
	}
	if (isset($_POST["wchangeStrap"])) {
		$query .= "
		AND product.wchangeStrap = 'checkmark'
		";
	}
	if (isset($_POST["sort"])) {
		$sort = implode("','", $_POST["sort"]);
		$query .= "
		ORDER BY product.".$sort.";
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	if ($total_row > 0) { ?>
		<div class="data_top">
			<h2 style="font-size: 20px; color: #666;"><?php echo $total_row . ' '; if ($total_row > 1) {echo 'Watches';} else {echo 'Watch';} ?></h2>
		</div>
		<div>
			<div class="grid">
				<?php foreach ($result as $row) {
					$mrp = $row['mrp'];
					$mrp = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $mrp); ?>
					<div class="buy-container">
						<div class="product-card">
							<div class="product-image">
								<img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" class="product-thumb" alt="">
							</div>
							<div class="product-info">
								<h2 class="product-brand"><?php echo $row['brand'] ?></h2>
								<p class="product-name"><?php echo $row['name'] ?></p>
								<span class="home-price">₹ <?php echo $mrp ?></span>
							</div>
						</div>
						<div class="fr__hover__info">
							<ul class="product__action">
								<li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $row['id'] ?>','add')">
										<ion-icon class="icon-position" name="heart-outline"></ion-icon>
									</a></li>
							</ul>
						</div>
						<div class="details-card-btn">
							<a href="product.php?id=<?php echo $row['id'] ?>" class="details-btn">view details</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
<?php
	} else {
		echo '<img src="images/noresults.jpg" alt="no results" title="Sorry! no results found" class="no-results">';
	}
} ?>