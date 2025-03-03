<?php

//fetch_data.php

include('connection.inc.php');

if (isset($_POST["action"])) {
	$query = "select product.*, brands.brand from product, brands where product.status = 1 and product.categories_id = 1 and product.brand_id=brands.id";

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
	if (isset($_POST["ramemory"])) {
		$ram_filter = implode("','", $_POST["ramemory"]);
		$query .= "
		 AND product.ramemory IN('" . $ram_filter . "')
		";
	}
	if (isset($_POST["intmem"])) {
		$storage_filter = implode("','", $_POST["intmem"]);
		$query .= "
		 AND product.intmem IN('" . $storage_filter . "')
		";
	}
	if (isset($_POST["camset"])) {
		$camset_filter = implode("','", $_POST["camset"]);
		$query .= "
		 AND product.camset IN('" . $camset_filter . "')
		";
	}
	if (isset($_POST["mcamera"])) {
		$camera_filter = implode("','", $_POST["mcamera"]);
		$query .= "
		 AND product.mcamera IN('" . $camera_filter . "')
		";
	}
	if (isset($_POST["maf"])) {
		$query .= "
		 AND product.af LIKE '%Yes%'
		";
	}
	if (isset($_POST["mois"])) {
		$query .= "
		 AND product.oi LIKE '%Yes%'
		";
	}
	if (isset($_POST["mflas"])) {
		$query .= "
		 AND product.flas LIKE '%Yes%'
		";
	}
	if (isset($_POST["fcamset"])) {
		$fcamset_filter = implode("','", $_POST["fcamset"]);
		$query .= "
		 AND product.fcamset IN('" . $fcamset_filter . "')
		";
	}
	if (isset($_POST["fcam"])) {
		$fcam_filter = implode("','", $_POST["fcam"]);
		$query .= "
		 AND product.fcam IN('" . $fcam_filter . "')
		";
	}
	if (isset($_POST["battery"])) {
		$battery_filter = implode("','", $_POST["battery"]);
		$query .= "
		 AND product.cap >= " . $battery_filter . "
		";
	}
	if (isset($_POST["usbotg"])) {
		$usbotg_filter = implode("','", $_POST["usbotg"]);
		$query .= "
		 AND product.usbotg LIKE 'Yes%'
		";
	}
	if (isset($_POST["expmem"])) {
		$expmem_filter = implode("','", $_POST["expmem"]);
		$query .= "
		 AND product.expmem LIKE 'Yes%'
		";
	}
	if (isset($_POST["usbc"])) {
		$usbc_filter = implode("','", $_POST["usbc"]);
		$query .= "
		 AND product.usbc LIKE 'Yes%'
		";
	}
	if (isset($_POST["qcharge"])) {
		$qcharge_filter = implode("','", $_POST["qcharge"]);
		$query .= "
		 AND product.qcharge LIKE 'Yes%'
		";
	}
	if (isset($_POST["wcharge"])) {
		$wcharge_filter = implode("','", $_POST["wcharge"]);
		$query .= "
		 AND product.wcharge LIKE 'Yes%'
		";
	}
	if (isset($_POST["mscreensize_below_52"])) {
		$query .= "
		AND product.mscreensize <= 5.2
		";
	}
	if (isset($_POST["mscreensize_52_55"])) {
		$query .= "
		AND product.mscreensize BETWEEN 5.2 AND 5.5
		";
	}
	if (isset($_POST["mscreensize_55_6"])) {
		$query .= "
		AND product.mscreensize BETWEEN 5.5 AND 6
		";
	}
	if (isset($_POST["mscreensize_6_65"])) {
		$query .= "
		AND product.mscreensize BETWEEN 6 AND 6.5
		";
	}
	if (isset($_POST["mscreensize_65_7"])) {
		$query .= "
		AND product.mscreensize BETWEEN 6.5 AND 7
		";
	}
	if (isset($_POST["mscreensize_7_above"])) {
		$query .= "
		AND product.mscreensize >= 7
		";
	}
	if (isset($_POST["pixden"])) {
		$pixden_filter = implode("','", $_POST["pixden"]);
		$query .= "
		AND product.pixden >= " . $pixden_filter . "
		";
	}
	if (isset($_POST["distype"])) {
		$distype_filter = implode("','", $_POST["distype"]);
		$query .= "
		 AND product.distype IN('" . $distype_filter . "')
		";
	}
	if (isset($_POST["refrate"])) {
		$refrate_filter = implode("','", $_POST["refrate"]);
		$query .= "
		 AND product.refrate IN('" . $refrate_filter . "')
		";
	}
	if (isset($_POST["mprocessspeed"])) {
		$mprocessspeed_filter = implode("','", $_POST["mprocessspeed"]);
		$query .= "
		 AND product.mprocessspeed >= " . $mprocessspeed_filter . "
		";
	}
	if (isset($_POST["mchip"])) {
		$mchip_filter = implode("','", $_POST["mchip"]);
		$query .= "
		 AND product.mchip IN('" . $mchip_filter . "')
		";
	}
	if (isset($_POST["mPCores"])) {
		$mPCores_filter = implode("','", $_POST["mPCores"]);
		$query .= "
		 AND product.mPCores IN('" . $mPCores_filter . "')
		";
	}
	if (isset($_POST["G5"])) {
		$query .= "
		 AND product.netsupp LIKE '%5G%'
		";
	}
	if (isset($_POST["G4"])) {
		$query .= "
		 AND product.netsupp LIKE '%4G%'
		";
	}
	if (isset($_POST["VoLTE"])) {
		$query .= "
		 AND product.volt LIKE 'Yes%'
		";
	}
	if (isset($_POST["dualsim"])) {
		$query .= "
		 AND product.simslot LIKE 'Dual SIM%'
		";
	}
	if (isset($_POST["blue"])) {
		$query .= "
		 AND product.blue LIKE 'Yes%'
		";
	}
	if (isset($_POST["faceunlock"])) {
		$query .= "
		 AND product.faceunlock LIKE '%Yes%'
		";
	}
	if (isset($_POST["finger"])) {
		$query .= "
		 AND product.finger LIKE 'Yes%'
		";
	}
	if (isset($_POST["fmr"])) {
		$query .= "
		 AND product.fmr LIKE 'Yes%'
		";
	}
	if (isset($_POST["fingerPosOn"])) {
		$query .= "
		 AND product.fingerPos LIKE 'On-screen%'
		";
	}
	if (isset($_POST["nfc"])) {
		$query .= "
		 AND product.nfc LIKE '%Yes%'
		";
	}
	if (isset($_POST["fingerPosSide"])) {
		$query .= "
		 AND product.fingerPos LIKE 'Side%'
		";
	}
	if (isset($_POST["wifi"])) {
		$query .= "
		 AND product.wifi LIKE 'Yes%'
		";
	}
	if (isset($_POST["android"])) {
		$query .= "
		 AND product.osv LIKE 'Android%'
		";
	}
	if (isset($_POST["ios"])) {
		$query .= "
		 AND product.osv LIKE 'iOS%'
		";
	}
	if (isset($_POST["osv"])) {
		$osv_filter = implode("','", $_POST["osv"]);
		$query .= "
		 AND product.osv LIKE '" . $osv_filter . "%'
		";
	}
	if (isset($_POST["water"])) {
		$query .= "
		 AND product.water LIKE 'Yes%'
		";
	}
	if (isset($_POST["bezdisp"])) {
		$query .= "
		 AND product.bezdisp LIKE '%punch-hole%'
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
			<h2 style="font-size: 20px; color: #666;"><?php echo $total_row . ' '; if ($total_row > 1) {echo 'Mobiles';} else {echo 'Mobile';} ?></h2>
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