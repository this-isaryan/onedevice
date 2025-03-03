<?php

//fetch_data.php

include('connection.inc.php');

if (isset($_POST["action"])) {
	$query = "select product.*, brands.brand from product, brands where product.status = 1 and product.categories_id = 2 and product.brand_id=brands.id";

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
	if (isset($_POST["android"])) {
		$query .= "
		 AND product.osv LIKE 'Android%'
		";
	}
	if (isset($_POST["iPadOS"])) {
		$query .= "
		 AND product.osv LIKE 'iPadOS%'
		";
	}
	if (isset($_POST["windows"])) {
		$query .= "
		 AND product.osv LIKE 'windows%'
		";
	}
	if (isset($_POST["osv"])) {
		$osv_filter = implode("','", $_POST["osv"]);
		$query .= "
		 AND product.osv LIKE '" . $osv_filter . "%'
		";
	}
	if (isset($_POST["tscreensize_7_8"])) {
		$query .= "
		AND product.tactualscreen BETWEEN 7 AND 8
		";
	}
	if (isset($_POST["tscreensize_8_9"])) {
		$query .= "
		AND product.tactualscreen BETWEEN 8 AND 9
		";
	}
	if (isset($_POST["tscreensize_9_10"])) {
		$query .= "
		AND product.tactualscreen BETWEEN 9 AND 10
		";
	}
	if (isset($_POST["tscreensize_10_11"])) {
		$query .= "
		AND product.tactualscreen BETWEEN 10 AND 11
		";
	}
	if (isset($_POST["tscreensize_11_above"])) {
		$query .= "
		AND product.tactualscreen >= 11
		";
	}
	if (isset($_POST["tdistype"])) {
		$tdistype_filter = implode("','", $_POST["tdistype"]);
		$query .= "
		 AND product.tdistype IN('" . $tdistype_filter . "')
		";
	}
	if (isset($_POST["g4"])) {
		$query .= "
		 AND product.tnetsupp LIKE '%4G%'
		";
	}
	if (isset($_POST["g3"])) {
		$query .= "
		 AND product.tnetsupp LIKE '%3G%'
		";
	}
	if (isset($_POST["tblue"])) {
		$query .= "
		 AND product.tblue LIKE '%Yes%'
		";
	}
	if (isset($_POST["twifi"])) {
		$query .= "
		 AND product.twifi LIKE '%Yes%'
		";
	}
	if (isset($_POST["tfmr"])) {
		$query .= "
		 AND product.tfmr LIKE '%Yes%'
		";
	}
	if (isset($_POST["tnfc"])) {
		$query .= "
		 AND product.tnfc LIKE 'Yes%'
		";
	}
	if (isset($_POST["tvoice_calling"])) {
		$query .= "
		 AND product.tvoiceCall LIKE '%Yes%'
		";
	}
	if (isset($_POST["thdmi"])) {
		$query .= "
		 AND product.thdmi LIKE '%Yes%'
		";
	}
	if (isset($_POST["tusbotg"])) {
		$query .= "
		 AND product.tusbotg LIKE '%Yes%'
		";
	}
	if (isset($_POST["tintmem"])) {
		$tintmem_filter = implode("','", $_POST["tintmem"]);
		$query .= "
		 AND product.tintmem IN('" . $tintmem_filter . "')
		";
	}
	if (isset($_POST["tram"])) {
		$tram_filter = implode("','", $_POST["tram"]);
		$query .= "
		 AND product.tram IN('" . $tram_filter . "')
		";
	}
	if (isset($_POST["tmaincam"])) {
		$tmaincam_filter = implode("','", $_POST["tmaincam"]);
		$query .= "
		 AND product.tmaincam IN('" . $tmaincam_filter . "')
		";
	}
	if (isset($_POST["tfcam"])) {
		$tfcam_filter = implode("','", $_POST["tfcam"]);
		$query .= "
		 AND product.tfcam IN('" . $tfcam_filter . "')
		";
	}
	if (isset($_POST["tfrflash"])) {
		$query .= "
		 AND product.tflash LIKE '%Yes%'
		";
	}
	if (isset($_POST["tfaf"])) {
		$query .= "
		 AND product.taf LIKE '%Yes%'
		";
	}
	if (isset($_POST["tcap"])) {
		$tcap_filter = implode("','", $_POST["tcap"]);
		$query .= "
		AND product.tcap >= " . $tcap_filter . "
		";
	}
	if (isset($_POST["tusbc"])) {
		$query .= "
		 AND product.tusbC LIKE '%Yes%'
		";
	}
	if (isset($_POST["tqcharge"])) {
		$query .= "
		 AND product.tquickC LIKE '%Yes%'
		";
	}
	if (isset($_POST["tchipName"])) {
		$tchipName_filter = implode("','", $_POST["tchipName"]);
		$query .= "
		 AND product.tchipName IN('" . $tchipName_filter . "')
		";
	}
	if (isset($_POST["tPcore"])) {
		$tPcore_filter = implode("','", $_POST["tPcore"]);
		$query .= "
		 AND product.tPcore IN('" . $tPcore_filter . "')
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
			<h2 style="font-size: 20px; color: #666;"><?php echo $total_row . ' '; if ($total_row > 1) {echo 'Tablets';} else {echo 'Tablet';} ?></h2>
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