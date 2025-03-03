<?php

//fetch_data.php

include('connection.inc.php');

if (isset($_POST["action"])) {
	$query = "select product.*, brands.brand from product, brands where product.status = 1 and product.categories_id = 6 and product.brand_id=brands.id";

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
	if (isset($_POST["tvdistype"])) {
		$tvdistype_filter = implode("','", $_POST["tvdistype"]);
		$query .= "
		 AND product.tvdistype IN('" . $tvdistype_filter . "')
		";
	}
	if (isset($_POST["tvsize"])) {
		$tvsize_filter = implode("','", $_POST["tvsize"]);
		$query .= "
		 AND product.tvsize IN('" . $tvsize_filter . "')
		";
	}
	if (isset($_POST["tvresoFilter"])) {
		$tvresoFilter_filter = implode("','", $_POST["tvresoFilter"]);
		$query .= "
		 AND product.tvresoFilter IN('" . $tvresoFilter_filter . "')
		";
	}
	if (isset($_POST["tvRefRate"])) {
		$tvRefRate_filter = implode("','", $_POST["tvRefRate"]);
		$query .= "
		 AND product.tvRefRate IN('" . $tvRefRate_filter . "')
		";
	}
	if (isset($_POST["tv3d"])) {
		$query .= "
		 AND product.tv3D = 'checkmark'
		";
	}
	if (isset($_POST["tvsmart"])) {
		$query .= "
		 AND product.tvsmartv = 'checkmark'
		";
	}
	if (isset($_POST["tvcurved"])) {
		$query .= "
		 AND product.tvcurved = 'checkmark'
		";
	}
	if (isset($_POST["tvandroid"])) {
		$query .= "
		 AND product.tvandroid = 'checkmark'
		";
	}
	if (isset($_POST["tvhdmi"])) {
		$tvhdmi_filter = implode("','", $_POST["tvhdmi"]);
		$query .= "
		 AND product.tvhdmi >= " . $tvhdmi_filter . "
		";
	}
	if (isset($_POST["tvusb"])) {
		$tvusb_filter = implode("','", $_POST["tvusb"]);
		$query .= "
		 AND product.tvusbP >= " . $tvusb_filter . "
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
			<h2 style="font-size: 20px; color: #666;"><?php echo $total_row . ' '; if ($total_row > 1) {echo 'Televisions';} else {echo 'Television';} ?></h2>
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