<?php
require('top.php');
$get_product = get_product($con, '', '2');
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
				<?php if ($get_product['0']['categories_id'] == '2') { ?>
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
											<p id="price_show">1000 - 200000</p>
											<div id="price_range"></div>
										</div>
										<div class="list-group">
											<h2>Brand</h2>
											<div style="max-height: 180px; overflow-y: auto; overflow-x: hidden;">
												<?php
												$query = "SELECT brand FROM brands WHERE categories_id = 2 AND status = 1 order by brand";
												$statement = $connect->prepare($query);
												$statement->execute();
												$result = $statement->fetchAll();
												foreach ($result as $row) {
												?>
													<div class="list-group-item checkbox list_border">
														<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio brand" value="<?php echo $row['brand']; ?>">
															<p class="label-r"><?php echo $row['brand']; ?></p>
														</label>
													</div>
												<?php
												}

												?>
											</div>
										</div>

										<div class="list-group">
											<h2>Operating System</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio android" value="android">
													<p class="label-r">Android</p>
												</label>
											</div>
											<div class="list-group-item checkbox android-versions" style="display: none;">
												<?php
												$query = "SELECT DISTINCT(osv) FROM product WHERE status = '1' AND categories_id = 2 AND osicon = 'android' ORDER BY osv";
												$statement = $connect->prepare($query);
												$statement->execute();
												$result = $statement->fetchAll();
												foreach ($result as $row) {
												?>
													<div class="list-group-item checkbox list_border">
														<label class="Container"><input type="radio" name="osv_android" class="common_selector osv" value="<?php echo $row['osv'] ?>" disabled><?php echo $row['osv'] ?><span class="check"></span></label>
													</div>
												<?php } ?>
											</div>
											<div class="list-group-item checkbox">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio iPadOS" value="iPadOS">
													<p class="label-r">iPadOS</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio windows" value="windows">
													<p class="label-r">Windows</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Display</h2>
											<h3>Screen Size</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_tscreensize" class="common_selector tscreensize_7_8">7 Inch - 8 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_tscreensize" class="common_selector tscreensize_8_9">8 Inch - 9 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_tscreensize" class="common_selector tscreensize_9_10">9 Inch - 10 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_tscreensize" class="common_selector tscreensize_10_11">10 Inch - 11 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_tscreensize" class="common_selector tscreensize_11_above">11 Inch & above<span class="check"></span></label>
											</div>
											<br>
											<h3>Display Type</h3>
											<?php
											$query = "SELECT DISTINCT(tdistype) FROM product WHERE status = '1' AND tdistype IS NOT NULL ORDER BY tdistype";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tdistype" value="<?php echo $row['tdistype']; ?>">
														<p class="label-r"><?php echo $row['tdistype']; ?></p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Connecivity & More</h2>
											<div style="max-height: 180px; overflow-y: auto; overflow-x: hidden;">
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio g4">
														<p class="label-r">4G/LTE</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio g3">
														<p class="label-r">3G</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tblue">
														<p class="label-r">Bluetooth</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio twifi">
														<p class="label-r">Wi-Fi</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio gps">
														<p class="label-r">GPS</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tfmr">
														<p class="label-r">FM</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tnfc">
														<p class="label-r">NFC</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tvoice_calling">
														<p class="label-r">Voice Calling</p>
													</label>
												</div>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio thdmi">
														<p class="label-r">HDMI</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tusbotg">
														<p class="label-r">USB OTG</p>
													</label>
												</div>
											</div>
										</div>

										<div class="list-group">
											<h2>Storage</h2>
											<h3>Internal Storage</h3>
											<?php
											$query = "SELECT DISTINCT(tintmem) FROM product WHERE status = '1' AND tintmem IS NOT NULL ORDER BY tintmem";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tintmem" value="<?php echo $row['tintmem']; ?>">
														<p class="label-r"><?php echo $row['tintmem']; ?> GB</p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>RAM</h2>
											<?php

											$query = "SELECT DISTINCT(tram) FROM product WHERE status = '1' AND tram IS NOT NULL ORDER BY tram";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tram" value="<?php echo $row['tram']; ?>">
														<p class="label-r"><?php echo $row['tram']; ?> GB</p>
													</label>
												</div>
											<?php
											}

											?>
										</div>

										<div class="list-group">
											<h2>Camera</h2>
											<h3>Rear Camera Resolution</h3>
											<?php
											$query = "SELECT DISTINCT(tmaincam) FROM product WHERE status = '1' AND tmaincam IS NOT NULL ORDER BY tmaincam";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tmaincam" value="<?php echo $row['tmaincam']; ?>">
														<p class="label-r"><?php echo $row['tmaincam']; ?> MP</p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>Front Camera Resolution</h3>
											<?php
											$query = "SELECT DISTINCT(tfcam) FROM product WHERE status = '1' AND tfcam IS NOT NULL ORDER BY tfcam";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tfcam" value="<?php echo $row['tfcam']; ?>">
														<p class="label-r"><?php echo $row['tfcam']; ?> MP</p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>Main Camera Features</h3>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tfrflash">
													<p class="label-r">Flash</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tfaf">
													<p class="label-r">Auto Focus</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Battery</h2>
											<h3>Battery Capacity</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector tcap" value="2000">2000 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector tcap" value="3000">3000 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector tcap" value="4000">4000 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector tcap" value="5000">5000 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector tcap" value="6000">6000 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector tcap" value="7000">7000 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector tcap" value="8000">8000 mAh & above<span class="check"></span></label>
											</div>
											<br>
											<h3>Other</h3>
											<div class="list-group-item checkbox">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tusbc" value="usbc">
													<p class="label-r">USB Type C</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tqcharge" value="qcharge">
													<p class="label-r">Quick Charging</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Processor</h2>
											<h3>System on Chip</h3>
											<?php
											$query = "SELECT DISTINCT(tchipName) FROM product WHERE status = '1' AND tchipName IS NOT NULL";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tchipName" value="<?php echo $row['tchipName'] ?>">
														<p class="label-r"><?php echo $row['tchipName'] ?></p>
													</label>
												</div>
											<?php } ?>
											<br>
											<h3>Processor Cores</h3>
											<?php
											$query = "SELECT DISTINCT(tPcore) FROM product WHERE status = '1' AND tPcore IS NOT NULL";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tPcore" value="<?php echo $row['tPcore'] ?>">
														<p class="label-r"><?php echo $row['tPcore'] ?> Core</p>
													</label>
												</div>
											<?php } ?>
										</div>
									</div>
									<div class="clearbtn">
										<button type="button" onclick="location.reload()" class="submit-btn">Clear Filters</button>
									</div>
								</div>
							</div>
						</div>
						<div class="filter_tablet_data"></div>
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

		filter_tablet_data();

		function filter_tablet_data() {
			$('.filter_tablet_data').html('<div id="loading" style="" ></div>');
			var action = 'fetch_tablet_data';
			var minimum_price = $('#hidden_minimum_price').val();
			var maximum_price = $('#hidden_maximum_price').val();
			var brand = get_filter('brand');
			var android = get_filter('android');
			var iPadOS = get_filter('iPadOS');
			var windows = get_filter('windows');
			var osv = get_filter('osv');
			var tscreensize_7_8 = get_filter('tscreensize_7_8');
			var tscreensize_8_9 = get_filter('tscreensize_8_9');
			var tscreensize_9_10 = get_filter('tscreensize_9_10');
			var tscreensize_10_11 = get_filter('tscreensize_10_11');
			var tscreensize_11_above = get_filter('tscreensize_11_above');
			var tdistype = get_filter('tdistype');
			var g4 = get_filter('g4');
			var g3 = get_filter('g3');
			var tblue = get_filter('tblue');
			var twifi = get_filter('twifi');
			var tfmr = get_filter('tfmr');
			var tnfc = get_filter('tnfc');
			var tvoice_calling = get_filter('tvoice_calling');
			var thdmi = get_filter('thdmi');
			var tusbotg = get_filter('tusbotg');
			var tintmem = get_filter('tintmem');
			var tram = get_filter('tram');
			var tmaincam = get_filter('tmaincam');
			var tfcam = get_filter('tfcam');
			var tfrflash = get_filter('tfrflash');
			var tfaf = get_filter('tfaf');
			var tcap = get_filter('tcap');
			var tusbc = get_filter('tusbc');
			var tqcharge = get_filter('tqcharge');
			var tchipName = get_filter('tchipName');
			var tPcore = get_filter('tPcore');
			var sort = get_filter('sort');
			$.ajax({
				url: "fetch_tablet_data.php",
				method: "POST",
				data: {
					action: action,
					minimum_price: minimum_price,
					maximum_price: maximum_price,
					brand: brand,
					android: android,
					iPadOS: iPadOS,
					windows: windows,
					osv: osv,
					tscreensize_7_8: tscreensize_7_8,
					tscreensize_8_9: tscreensize_8_9,
					tscreensize_9_10: tscreensize_9_10,
					tscreensize_10_11: tscreensize_10_11,
					tscreensize_11_above: tscreensize_11_above,
					tdistype: tdistype,
					g4: g4,
					g3: g3,
					tblue: tblue,
					twifi: twifi,
					tfmr: tfmr,
					tnfc: tnfc,
					tvoice_calling: tvoice_calling,
					thdmi: thdmi,
					tusbotg: tusbotg,
					tintmem: tintmem,
					tram: tram,
					tmaincam: tmaincam,
					tfcam: tfcam,
					tfrflash: tfrflash,
					tfaf: tfaf,
					tcap: tcap,
					tusbc: tusbc,
					tqcharge: tqcharge,
					tchipName: tchipName,
					tPcore: tPcore,
					sort: sort
				},
				success: function(data) {
					$('.filter_tablet_data').html(data);
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
			filter_tablet_data();
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
				filter_tablet_data();
			}
		});
	});
</script>
<?php require('footer.php') ?>