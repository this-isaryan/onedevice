<?php

//fetch_data.php

include('connection.inc.php');

if (isset($_POST["action"])) {
	$query = "select product.*, brands.brand from product, brands where product.status = 1 and product.categories_id = 3 and product.brand_id=brands.id";

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
	if (isset($_POST["lprocessCSpeed"])) {
		$lprocessCSpeed_filter = implode("','", $_POST["lprocessCSpeed"]);
		$query .= "
		 AND product.lprocessCSpeed >= " . $lprocessCSpeed_filter . "
		";
	}
	if (isset($_POST["lprocessortype"])) {
		$lprocessortype_filter = implode("','", $_POST["lprocessortype"]);
		$query .= "
		 AND product.lprocessortype IN('" . $lprocessortype_filter . "')
		";
	}
	if (isset($_POST["lprocessorGen"])) {
		$lprocessorGen_filter = implode("','", $_POST["lprocessorGen"]);
		$query .= "
		 AND product.lprocessorGen IN('" . $lprocessorGen_filter . "')
		";
	}
	if (isset($_POST["lscreensize_below_12"])) {
		$query .= "
		AND product.lactualdisSize <= 12
		";
	}
	if (isset($_POST["lscreensize_12_13"])) {
		$query .= "
		AND product.lactualdisSize BETWEEN 12 AND 13
		";
	}
	if (isset($_POST["lscreensize_13_14"])) {
		$query .= "
		AND product.lactualdisSize BETWEEN 13 AND 14
		";
	}
	if (isset($_POST["lscreensize_14_15"])) {
		$query .= "
		AND product.lactualdisSize BETWEEN 14 AND 15
		";
	}
	if (isset($_POST["lscreensize_15_above"])) {
		$query .= "
		AND product.lactualdisSize >= 15
		";
	}
	if (isset($_POST["ldisType"])) {
		$ldisType_filter = implode("','", $_POST["ldisType"]);
		$query .= "
		AND product.ldisType IN('" . $ldisType_filter . "')
		";
	}
	if (isset($_POST["ltouchsreen"])) {
		$query .= "
		AND product.ldisTouch LIKE '%Yes%'
		";
	}
	if (isset($_POST["lHD"])) {
		$query .= "
		AND product.ldisFea LIKE '%HD%'
		";
	}
	if (isset($_POST["lHDplus"])) {
		$query .= "
		AND product.ldisFea LIKE '%HD+%'
		";
	}
	if (isset($_POST["lFHD"])) {
		$query .= "
		AND product.ldisFea LIKE '%FHD%'
		";
	}
	if (isset($_POST["lQHD"])) {
		$query .= "
		AND product.ldisFea LIKE '%Quad%'
		";
	}
	if (isset($_POST["lUHD"])) {
		$query .= "
		AND product.ldisFea LIKE '%Ultra HD%'
		";
	}
	if (isset($_POST["lcapacity"])) {
		$lcapacity_filter = implode("','", $_POST["lcapacity"]);
		$query .= "
		AND product.lcapacity IN('" . $lcapacity_filter . "')
		";
	}
	if (isset($_POST["lmemoryexpand"])) {
		$lmemoryexpand_filter = implode("','", $_POST["lmemoryexpand"]);
		$query .= "
		AND product.lmemoryexpand IN('" . $lmemoryexpand_filter . "')
		";
	}
	if (isset($_POST["lstoreageCHDD"])) {
		$lstoreageCHDD_filter = implode("','", $_POST["lstoreageCHDD"]);
		$query .= "
		AND product.lstoragetype = 'HDD' AND product.lstoreageC IN('" . $lstoreageCHDD_filter . "')
		";
	}
	if (isset($_POST["lstoreageCSSD"])) {
		$lstoreageCSSD_filter = implode("','", $_POST["lstoreageCSSD"]);
		$query .= "
		AND product.lstoragetype = 'SSD' AND product.lstoreageC IN('" . $lstoreageCSSD_filter . "')
		";
	}
	if (isset($_POST["lgraphActMem"])) {
		$lgraphActMem_filter = implode("','", $_POST["lgraphActMem"]);
		$query .= "
		AND product.lgraphActMem >= " . $lgraphActMem_filter . "
		";
	}
	if (isset($_POST["lgraphintel"])) {
		$query .= "
		AND product.lgraphProcess LIKE '%intel%'
		";
	}
	if (isset($_POST["lgraphNVIDIA"])) {
		$query .= "
		AND product.lgraphProcess LIKE '%NVIDIA%'
		";
	}
	if (isset($_POST["lgraphAMD"])) {
		$query .= "
		AND product.lgraphProcess LIKE '%AMD%'
		";
	}
	if (isset($_POST["lwin10"])) {
		$query .= "
		AND product.osv LIKE '%Windows 10%'
		";
	}
	if (isset($_POST["lwin11"])) {
		$query .= "
		AND product.osv LIKE '%Windows 11%'
		";
	}
	if (isset($_POST["llinux"])) {
		$query .= "
		AND product.osv LIKE '%Linux%'
		";
	}
	if (isset($_POST["lubuntu"])) {
		$query .= "
		AND product.osv LIKE '%Ubuntu%'
		";
	}
	if (isset($_POST["lmacOS"])) {
		$query .= "
		AND product.osv LIKE '%macOS%'
		";
	}
	if (isset($_POST["ldos"])) {
		$query .= "
		AND product.osv LIKE '%DOS%'
		";
	}
	if (isset($_POST["lusb3"])) {
		$query .= "
		AND product.lusb3 >= 1
		";
	}
	if (isset($_POST["lhdmi"])) {
		$query .= "
		AND product.lHDMI LIKE '%Yes%'
		";
	}
	if (isset($_POST["ldvdw"])) {
		$query .= "
		AND product.loptD LIKE '%Yes%'
		";
	}
	if (isset($_POST["lbaklitKey"])) {
		$query .= "
		AND product.lbacklit LIKE '%Yes%'
		";
	}
	if (isset($_POST["llockport"])) {
		$query .= "
		AND product.llockPort LIKE '%Yes%'
		";
	}
	if (isset($_POST["lfingerprintRead"])) {
		$query .= "
		AND product.lfinger LIKE '%Yes%'
		";
	}
	if (isset($_POST["lfaceunlock"])) {
		$query .= "
		AND product.lfaceunlock LIKE '%Yes%'
		";
	}
	if (isset($_POST["lusbtypc"])) {
		$query .= "
		AND product.lusbtypeC >= 1
		";
	}
	if (isset($_POST["lstereoSpeaker"])) {
		$query .= "
		AND product.lsoundTech LIKE '%Stereo%'
		";
	}
	if (isset($_POST["ltouchbar"])) {
		$query .= "
		AND product.lotherControl LIKE '%Touchbar%'
		";
	}
	if (isset($_POST["lbattlife"])) {
		$lbattlife_filter = implode("','", $_POST["lbattlife"]);
		$query .= "
		 AND product.lbatLife >= " . $lbattlife_filter . "
		";
	}
	if (isset($_POST["lultrabook"])) {
		$query .= "
		 AND product.lultrabook = 'checkmark'
		";
	}
	if (isset($_POST["lconvertible"])) {
		$query .= "
		 AND product.lconvertible = 'checkmark'
		";
	}
	if (isset($_POST["ldetachable"])) {
		$query .= "
		 AND product.ldetachable = 'checkmark'
		";
	}
	if (isset($_POST["lweight"])) {
		$lweight_filter = implode("','", $_POST["lweight"]);
		$query .= "
		 AND product.lweight <= " . $lweight_filter . "
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
			<h2 style="font-size: 20px; color: #666;"><?php echo $total_row . ' '; if ($total_row > 1) {echo 'Laptops';} else {echo 'Laptop';} ?></h2>
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