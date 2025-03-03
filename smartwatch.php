<?php
require('top.php');
$get_product = get_product($con, '', '5');
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
				<?php if ($get_product['0']['categories_id'] == '5') { ?>
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
											<input type="hidden" id="hidden_maximum_price" value="75000" />
											<p id="price_show">1000 - 75000</p>
											<div id="price_range_watch"></div>
										</div>

										<div class="list-group">
											<h2>Brand</h2>
											<div style="max-height: 180px; overflow-y: auto; overflow-x: hidden;">
												<?php
												$query = "SELECT brand FROM brands WHERE categories_id = 5 AND status = 1 order by brand";
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
											<h2>Display</h2>
											<h3>Screen Size</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_wscreensize" class="common_selector wscreenSize_less_15">Less than 1.5 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_wscreensize" class="common_selector wscreenSize_more_15">More than 1.5 Inch<span class="check"></span></label>
											</div>
											<br>
											<h3>Screen Type</h3>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wtouchScreen">
													<p class="label-r">Touch Screen</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Compatible OS</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wandroid" value="Android">
													<p class="label-r">Android</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wios" value="iOS">
													<p class="label-r">iOS</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Battery</h2>
											<h3>Battery Capacity</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector wcap" value="240">240 mAh & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector wcap" value="400">400 mAh & above<span class="check"></span></label>
											</div>
											<br>
											<h3>Battery Life</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector wusageH" value="2">More than 2 Days<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_battery" class="common_selector wusageH" value="4">More than 4 Days<span class="check"></span></label>
											</div>
											<br>
											<h3>Charging Mode</h3>
											<?php
											$query = "SELECT DISTINCT(wchargeM) FROM product WHERE status = '1' AND wchargeM IS NOT NULL ORDER BY wchargeM";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wchargeM" value="<?php echo $row['wchargeM']; ?>">
														<p class="label-r"><?php echo $row['wchargeM'] ?></p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Connectivity</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wlte">
													<p class="label-r">LTE</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wwifi">
													<p class="label-r">Wifi</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wbluetooth">
													<p class="label-r">Buetooth</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wusb">
													<p class="label-r">USB</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wnfc">
													<p class="label-r">NFC</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Internal Memory</h2>
											<?php
											$query = "SELECT DISTINCT(wintMem) FROM product WHERE status = '1' AND wintMem IS NOT NULL ORDER BY wintMem";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wintMem" value="<?php echo $row['wintMem']; ?>">
														<p class="label-r"><?php echo $row['wintMem'] ?> GB</p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Design</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wchangeStrap">
													<p class="label-r">Changeable Strap</p>
												</label>
											</div>
											<br>
											<h3>Strap Material</h3>
											<?php
											$query = "SELECT DISTINCT(wstrapM) FROM product WHERE status = '1' AND wstrapM IS NOT NULL ORDER BY wstrapM";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wstrapM" value="<?php echo $row['wstrapM']; ?>">
														<p class="label-r"><?php echo $row['wstrapM'] ?></p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>Body Material</h3>
											<?php
											$query = "SELECT DISTINCT(wbodyM) FROM product WHERE status = '1' AND wbodyM IS NOT NULL ORDER BY wbodyM";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wbodyM" value="<?php echo $row['wbodyM']; ?>">
														<p class="label-r"><?php echo $row['wbodyM'] ?></p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Water Resistant</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wwaterRes">
													<p class="label-r">Water Resistant</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Voice Control</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wvoiceC">
													<p class="label-r">Voice Control</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Fitness Tracking</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wcal">
													<p class="label-r">Calories Intake/burned</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wstep">
													<p class="label-r">Steps</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wheartRate">
													<p class="label-r">Heart Rate</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wsleep">
													<p class="label-r">Hours Slept</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wdistance">
													<p class="label-r">Distance</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio wsleep">
													<p class="label-r">Sleep quality</p>
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
						<div class="filter_watch_data"></div>
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

		filter_watch_data();

		function filter_watch_data() {
			$('.filter_watch_data').html('<div id="loading" style=""></div>');
			var action = 'fetch_laptop_data';
			var minimum_price = $('#hidden_minimum_price').val();
			var maximum_price = $('#hidden_maximum_price').val();
			var brand = get_filter('brand');
			var wscreenSize_less_15 = get_filter('wscreenSize_less_15');
			var wscreenSize_more_15 = get_filter('wscreenSize_more_15');
			var wtouchScreen = get_filter('wtouchScreen');
			var wandroid = get_filter('wandroid');
			var wios = get_filter('wios');
			var wcap = get_filter('wcap');
			var wusageH = get_filter('wusageH');
			var wchargeM = get_filter('wchargeM');
			var wlte = get_filter('wlte');
			var wwifi = get_filter('wwifi');
			var wbluetooth = get_filter('wbluetooth');
			var wusb = get_filter('wusb');
			var wnfc = get_filter('wnfc');
			var wintMem = get_filter('wintMem');
			var wstrapM = get_filter('wstrapM');
			var wbodyM = get_filter('wbodyM');
			var wcal = get_filter('wcal');
			var wstep = get_filter('wstep');
			var wheartRate = get_filter('wheartRate');
			var wsleep = get_filter('wsleep');
			var wdistance = get_filter('wdistance');
			var wsleep = get_filter('wsleep');
			var wwaterRes = get_filter('wwaterRes');
			var wvoiceC = get_filter('wvoiceC');
			var wchangeStrap = get_filter('wchangeStrap');
			var sort = get_filter('sort');
			$.ajax({
				url: "fetch_watch_data.php",
				method: "POST",
				data: {
					action: action,
					minimum_price: minimum_price,
					maximum_price: maximum_price,
					brand: brand,
					wscreenSize_less_15: wscreenSize_less_15,
					wscreenSize_more_15: wscreenSize_more_15,
					wtouchScreen: wtouchScreen,
					wandroid: wandroid,
					wios: wios,
					wcap: wcap,
					wusageH: wusageH,
					wchargeM: wchargeM,
					wlte: wlte,
					wwifi: wwifi,
					wbluetooth: wbluetooth,
					wusb: wusb,
					wnfc: wnfc,
					wintMem: wintMem,
					wstrapM: wstrapM,
					wbodyM: wbodyM,
					wcal: wcal,
					wstep: wstep,
					wheartRate: wheartRate,
					wsleep: wsleep,
					wdistance: wdistance,
					wsleep: wsleep,
					wwaterRes: wwaterRes,
					wvoiceC: wvoiceC,
					wchangeStrap: wchangeStrap,
					sort: sort
				},
				success: function(data) {
					$('.filter_watch_data').html(data);
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
			filter_watch_data();
		});

		$('#price_range_watch').slider({
			range: true,
			min: 1000,
			max: 75000,
			values: [1000, 75000],
			step: 500,
			stop: function(event, ui) {
				$('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
				$('#hidden_minimum_price').val(ui.values[0]);
				$('#hidden_maximum_price').val(ui.values[1]);
				filter_watch_data();
			}
		});
	});
</script>
<?php require('footer.php') ?>