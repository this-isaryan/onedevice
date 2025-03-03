<?php
require('top.php');
$get_product = get_product($con, '', '1', '', '', '4');
?>

<link rel="stylesheet" href="css/filter_panel.css">

<?php if (count($get_product) > 0) { ?>
	<main class="search-main">
		<div class="filter_sort">
			<div class="filbtn">
				<button class="filterbtn">
					<ion-icon name="funnel-outline"></ion-icon> Filters
				</button>
			</div>
			<select class="ht__select common_selector">
				<option class="sort common_selector" value="id desc">Default</option>
				<option class="sort common_selector" value="mrp desc">Price: High to Low</option>
				<option class="sort common_selector" value="mrp">Price: Low to High</option>
				<option class="sort common_selector" value="id desc">Newest</option>
				<option class="sort common_selector" value="id">Oldest</option>
			</select>
		</div>
		<section class="serach-results">
			<section class="card-container">
				<?php if ($get_product['0']['categories_id'] == '1') { ?>
					<div class="mobile_box">
						<div class="filterbox1">
							<div class="filterbox2">
								<div class="filhead">
									<h2 class="h2fil">Filters</h2>
									<button class="closebtn">
										<ion-icon name="close"></ion-icon>
									</button>
								</div>
								<div class="filterboxpanel">
									<div class="filter_panel">

										<div class="list-group">
											<h2>Price</h2>
											<input type="hidden" id="hidden_minimum_price" value="0" />
											<input type="hidden" id="hidden_maximum_price" value="200000" />
											<p id="price_show">1,000 - 2,00,000</p>
											<div id="price_range"></div>
										</div>

										<div class="list-group">
											<h2>RAM</h2>
											<?php

											$query = "SELECT DISTINCT(ramemory) FROM product WHERE status = '1' AND brand_id = '4' AND ramemory IS NOT NULL ORDER BY ramemory";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio ramemory" value="<?php echo $row['ramemory']; ?>">
														<p class="label-r"><?php echo $row['ramemory']; ?> GB</p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Storage</h2>
											<h3>Internal Storage</h3>
											<?php
											$query = "SELECT DISTINCT(intmem) FROM product WHERE status = '1' AND brand_id = '4' AND intmem IS NOT NULL ORDER BY intmem";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio intmem" value="<?php echo $row['intmem']; ?>">
														<p class="label-r"><?php if ($row['intmem'] == '1024') {
																				echo '1 TB';
																			} else {
																				echo $row['intmem'] . ' GB';
																			} ?></p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>External Storage</h3>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio usbotg" value="usbotg">
													<p class="label-r">USB OTG</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio expmem" value="expmem">
													<p class="label-r">SD Card Slot</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Camera</h2>
											<h3>Rear Camera Setup</h3>
											<?php
											$query = "SELECT DISTINCT(camset) FROM product WHERE status = '1' AND brand_id = '4' AND camset IS NOT NULL ORDER BY camset";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio camset" value="<?php echo $row['camset']; ?>">
														<p class="label-r"><?php echo $row['camset']; ?> Camera</p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>Rear Camera Resolution</h3>
											<?php
											$query = "SELECT DISTINCT(mcamera) FROM product WHERE status = '1' AND brand_id = '4' AND mcamera IS NOT NULL ORDER BY mcamera";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio mcamera" value="<?php echo $row['mcamera']; ?>">
														<p class="label-r"><?php echo $row['mcamera']; ?> MP</p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>Main Camera Features</h3>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio maf">
													<p class="label-r">Auto Focus</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio mois">
													<p class="label-r">OIS</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio mflas">
													<p class="label-r">Flash</p>
												</label>
											</div>
											<br>
											<h3>Front Camera Setup</h3>
											<?php
											$query = "SELECT DISTINCT(fcamset) FROM product WHERE status = '1' AND brand_id = '4' AND fcamset IS NOT NULL ORDER BY fcamset";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio fcamset" value="<?php echo $row['fcamset']; ?>">
														<p class="label-r"><?php echo $row['fcamset']; ?> Camera</p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>Front Camera Resolution</h3>
											<?php
											$query = "SELECT DISTINCT(fcam) FROM product WHERE status = '1' AND brand_id = '4' AND fcam IS NOT NULL ORDER BY fcam";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio fcam" value="<?php echo $row['fcam']; ?>">
														<p class="label-r"><?php echo $row['fcam']; ?> MP</p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Battery</h2>
											<h3>Battery Capacity</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector cap" value="2000">2000 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector cap" value="2500">2500 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector cap" value="3000">3000 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector cap" value="3500">3500 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector cap" value="4000">4000 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector cap" value="4500">4500 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector cap" value="5000">5000 mAh & above<span class="check"></span></label>
											</div>
											<br>
											<h3>Other</h3>
											<div class="list-group-item checkbox">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio usbc" value="usbc">
													<p class="label-r">USB Type C</p>
												</label>
											</div>
											<div class="list-group-item checkbox">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio qcharge" value="qcharge">
													<p class="label-r">Quick Charging</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wcharge" value="wcharge">
													<p class="label-r">Wireless Charging</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Display</h2>
											<h3>Screen Size</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_mscreensize" class="common_selector mscreensize_below_52">Below 5.2 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_mscreensize" class="common_selector mscreensize_52_55">5.2 Inch - 5.5 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_mscreensize" class="common_selector mscreensize_55_6">5.5 Inch - 6 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_mscreensize" class="common_selector mscreensize_6_65">6 Inch - 6.5 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_mscreensize" class="common_selector mscreensize_65_7">6.5 Inch - 7 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_mscreensize" class="common_selector mscreensize_7_above">7 Inch & above<span class="check"></span></label>
											</div>
											<br>
											<h3>Pixel Density(Sharpness)</h3>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_pixden" class="common_selector pixden" value="300">300 ppi & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_pixden" class="common_selector pixden" value="400">400 ppi & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_pixden" class="common_selector pixden" value="500">500 ppi & above<span class="check"></span></label>
											</div>
											<br>
											<h3>Display Type</h3>
											<?php
											$query = "SELECT DISTINCT(distype) FROM product WHERE status = '1' AND brand_id = '4' AND distype IS NOT NULL ORDER BY distype";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio distype" value="<?php echo $row['distype']; ?>">
														<p class="label-r"><?php echo $row['distype']; ?></p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>Refresh Rate</h3>
											<?php
											$query = "SELECT DISTINCT(refrate) FROM product WHERE status = '1' AND brand_id = '4' AND refrate IS NOT NULL ORDER BY refrate";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio refrate" value="<?php echo $row['refrate']; ?>">
														<p class="label-r"><?php echo $row['refrate']; ?></p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Processor</h2>
											<h3>Processor Speed</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_pSpeed" class="common_selector mprocessspeed" value="1.4">1.4 GHz & above<span class="check"></span>
												</label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_pSpeed" class="common_selector mprocessspeed" value="2">2 GHz & above<span class="check"></span>
												</label>
											</div>
											<div class="list-group-item checkbox list_border_bottom">
												<label class="Container"><input type="radio" name="filter_pSpeed" class="common_selector mprocessspeed" value="2.3">2.3 GHz & above<span class="check"></span>
												</label>
											</div>
											<br>
											<h3>System on Chip</h3>
											<?php
											$query = "SELECT DISTINCT(mchip) FROM product WHERE status = '1' AND brand_id = '4' AND mchip IS NOT NULL";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio mchip" value="<?php echo $row['mchip'] ?>">
														<p class="label-r"><?php echo $row['mchip'] ?></p>
													</label>
												</div>
											<?php } ?>
											<br>
											<h3>Processor Cores</h3>
											<?php
											$query = "SELECT DISTINCT(mPCores) FROM product WHERE status = '1' AND brand_id = '4' AND mPCores IS NOT NULL";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio mPCores" value="<?php echo $row['mPCores'] ?>">
														<p class="label-r"><?php echo $row['mPCores'] ?> Core</p>
													</label>
												</div>
											<?php } ?>
										</div>

										<div class="list-group">
											<h2>Network Technology</h2>
											<h3>Network Type</h3>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio G5" value="5G">
													<p class="label-r">5G</p>
												</label>
											</div>
											<div class="list-group-item checkbox">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio G4" value="4G">
													<p class="label-r">4G</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border_bottom">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio VoLTE" value="VoLTE">
													<p class="label-r">VoLTE</p>
												</label>
											</div>
											<br>
											<h3>SIM Support</h3>
											<div class="list-group-item checkbox list_border list_border_top">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio dualsim">
													<p class="label-r">Dual Sim</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Connecivity & More</h2>
											<div style="max-height: 180px; overflow-y: auto; overflow-x: hidden;">
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio blue">
														<p class="label-r">Bluetooth</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio faceunlock">
														<p class="label-r">Face Unlock</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio finger">
														<p class="label-r">Fingerprint SCanner</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio fmr">
														<p class="label-r">FM</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio fingerPosOn">
														<p class="label-r">In-display fingerprint scanner</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio nfc">
														<p class="label-r">NFC</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio fingerPosSide">
														<p class="label-r">Side-mounted fingerprint scanner</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wifi">
														<p class="label-r">Wi-Fi</p>
													</label>
												</div>
											</div>
										</div>
										<div class="list-group">
											<h2>Android Version</h2>
											<?php
											$query = "SELECT DISTINCT(osv) FROM product WHERE status = '1' AND brand_id = '4' ORDER BY osv";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio osv" value="<?php echo $row['osv'] ?>">
														<p class="label-r"><?php echo $row['osv'] ?></p>
												</div>
											<?php } ?>
										</div>

										<div class="list-group">
											<h2>Design</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio water">
													<p class="label-r">Waterproof</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio bezdisp">
													<p class="label-r">Punch Hole</p>
												</label>
											</div>
										</div>
									</div>
									<div class="clearbtn">
										<button type="button" onclick="location.reload()" class="submit-btn">Clear Filters</button>
									</div>
								</div>
							</div>
						</div>
						<div class="filter_data"></div>
					</div>
				<?php } ?>
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
<style>
	#loading {
		text-align: center;
		background: url('loader.gif') no-repeat center;
		height: 1294px;
	}
</style>
<script>
	$(document).ready(function() {

		filter_data();

		function filter_data() {
			$('.filter_data').html('<div id="loading" style="" ></div>');
			var action = 'fetch_data';
			var minimum_price = $('#hidden_minimum_price').val();
			var maximum_price = $('#hidden_maximum_price').val();
			var ram = get_filter('ramemory');
			var storage = get_filter('intmem');
			var camset = get_filter('camset');
			var camera = get_filter('mcamera');
			var maf = get_filter('maf');
			var mois = get_filter('mois');
			var mflas = get_filter('mflas');
			var fcamset = get_filter('fcamset');
			var fcam = get_filter('fcam');
			var battery = get_filter('cap');
			var usbotg = get_filter('usbotg');
			var expmem = get_filter('expmem');
			var usbc = get_filter('usbc');
			var qcharge = get_filter('qcharge');
			var wcharge = get_filter('wcharge');
			var mscreensize_below_52 = get_filter('mscreensize_below_52');
			var mscreensize_52_55 = get_filter('mscreensize_52_55');
			var mscreensize_55_6 = get_filter('mscreensize_55_6');
			var mscreensize_6_65 = get_filter('mscreensize_6_65');
			var mscreensize_65_7 = get_filter('mscreensize_65_7');
			var mscreensize_7_above = get_filter('mscreensize_7_above');
			var distype = get_filter('distype');
			var pixden = get_filter('pixden');
			var refrate = get_filter('refrate');
			var mprocessspeed = get_filter('mprocessspeed');
			var mchip = get_filter('mchip');
			var mPCores = get_filter('mPCores');
			var G5 = get_filter('G5');
			var G4 = get_filter('G4');
			var VoLTE = get_filter('VoLTE');
			var dualsim = get_filter('dualsim');
			var blue = get_filter('blue');
			var faceunlock = get_filter('faceunlock');
			var finger = get_filter('finger');
			var fmr = get_filter('fmr');
			var fingerPosOn = get_filter('fingerPosOn');
			var nfc = get_filter('nfc');
			var fingerPosSide = get_filter('fingerPosSide');
			var wifi = get_filter('wifi');
			var osv = get_filter('osv');
			var water = get_filter('water');
			var bezdisp = get_filter('bezdisp');
			var sort = get_filter('sort');
			$.ajax({
				url: "fetch_xiaomi_mobile.php",
				method: "POST",
				data: {
					action: action,
					minimum_price: minimum_price,
					maximum_price: maximum_price,
					ramemory: ram,
					intmem: storage,
					camset: camset,
					mcamera: camera,
					maf: maf,
					mois: mois,
					mflas: mflas,
					fcamset: fcamset,
					fcam: fcam,
					battery: battery,
					usbotg: usbotg,
					expmem: expmem,
					usbc: usbc,
					qcharge: qcharge,
					wcharge: wcharge,
					mscreensize_below_52: mscreensize_below_52,
					mscreensize_52_55: mscreensize_52_55,
					mscreensize_55_6: mscreensize_55_6,
					mscreensize_6_65: mscreensize_6_65,
					mscreensize_65_7: mscreensize_65_7,
					mscreensize_7_above: mscreensize_7_above,
					distype: distype,
					pixden: pixden,
					refrate: refrate,
					mprocessspeed: mprocessspeed,
					mchip: mchip,
					mPCores: mPCores,
					G5: G5,
					G4: G4,
					VoLTE: VoLTE,
					dualsim: dualsim,
					blue: blue,
					faceunlock: faceunlock,
					finger: finger,
					fmr: fmr,
					fingerPosOn: fingerPosOn,
					nfc: nfc,
					fingerPosSide: fingerPosSide,
					wifi: wifi,
					osv: osv,
					water: water,
					bezdisp: bezdisp,
					sort: sort
				},
				success: function(data) {
					$('.filter_data').html(data);
				}
			});
		}


		function get_filter(class_name) {
			var filter = [];
			$('.' + class_name + ':checked').each(function() {
				filter.push($(this).val());
			});
			return filter;
		}

		$('.common_selector').click(function() {
			filter_data();
		});

		$('#price_range').slider({
			range: true,
			min: 1000,
			max: 200000,
			values: [1000, 200000],
			step: 500,
			stop: function(event, ui) {
				$('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
				$('#hidden_minimum_price').val(ui.values[0]);
				$('#hidden_maximum_price').val(ui.values[1]);
				filter_data();
			}
		});
	});
</script>
<?php require('footer.php') ?>