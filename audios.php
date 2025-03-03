<?php
require('top.php');
$get_product = get_product($con, '', '4');
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
				<?php if ($get_product['0']['categories_id'] == '4') { ?>
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
											<input type="hidden" id="hidden_maximum_price" value="300000" />
											<p id="price_show">0 - 30000</p>
											<div id="price_range_audio"></div>
										</div>

										<div class="list-group">
											<h2>Brand</h2>
											<div style="max-height: 180px; overflow-y: auto; overflow-x: hidden;">
												<?php
												$query = "SELECT brand FROM brands WHERE categories_id = 4 AND status = 1 order by brand";
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
											<h2>Type</h2>
											<?php
											$query = "SELECT DISTINCT(atype) FROM product WHERE status = '1' AND atype IS NOT NULL ORDER BY atype";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio atype" value="<?php echo $row['atype']; ?>">
														<p class="label-r"><?php echo $row['atype'] ?></p>
													</label>
												</div>
											<?php
											}
											?>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio awithMic">
													<p class="label-r">With Mic</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Design</h2>
											<?php
											$query = "SELECT DISTINCT(adesign) FROM product WHERE status = '1' AND adesign IS NOT NULL ORDER BY adesign";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio adesign" value="<?php echo $row['adesign']; ?>">
														<p class="label-r"><?php echo $row['adesign'] ?></p>
													</label>
												</div>
											<?php
											}
											?>
											<?php
											$query = "SELECT DISTINCT(aopenCloseB) FROM product WHERE status = '1' AND aopenCloseB IS NOT NULL ORDER BY aopenCloseB";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio aopenCloseB" value="<?php echo $row['aopenCloseB']; ?>">
														<p class="label-r"><?php echo $row['aopenCloseB'] ?></p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Features</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio anoiseC">
													<p class="label-r">Noise Cancellation</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio acallC">
													<p class="label-r">Call Control</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio amusicC">
													<p class="label-r">Music Control</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio aambientS">
													<p class="label-r">Ambient Sound</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Connectivity</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio aconn" value="3.5 mm Jack">
													<p class="label-r">3.5 mm Jack</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio aconn" value="USB Type-C">
													<p class="label-r">USB Type C</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio aconn" value="NFC">
													<p class="label-r">NFC</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio aconn" value="Bluetooth">
													<p class="label-r">Bluetooth</p>
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
						<div class="filter_audio_data"></div>
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

		filter_audio_data();

		function filter_audio_data() {
			$('.filter_audio_data').html('<div id="loading" style="" ></div>');
			var action = 'fetch_laptop_data';
			var minimum_price = $('#hidden_minimum_price').val();
			var maximum_price = $('#hidden_maximum_price').val();
			var brand = get_filter('brand');
			var atype = get_filter('atype');
			var awithMic = get_filter('awithMic');
			var adesign = get_filter('adesign');
			var aopenCloseB = get_filter('aopenCloseB');
			var anoiseC = get_filter('anoiseC');
			var acallC = get_filter('acallC');
			var amusicC = get_filter('amusicC');
			var aambientS = get_filter('aambientS');
			var aconn = get_filter('aconn');
			var sort = get_filter('sort');
			$.ajax({
				url: "fetch_audio_data.php",
				method: "POST",
				data: {
					action: action,
					minimum_price: minimum_price,
					maximum_price: maximum_price,
					brand: brand,
					atype: atype,
					awithMic: awithMic,
					adesign: adesign,
					aopenCloseB: aopenCloseB,
					anoiseC: anoiseC,
					acallC: acallC,
					amusicC: amusicC,
					aambientS: aambientS,
					aconn: aconn,
					sort: sort
				},
				success: function(data) {
					$('.filter_audio_data').html(data);
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
			filter_audio_data();
		});


		$('#price_range_audio').slider({
			range: true,
			min: 0,
			max: 30000,
			values: [0, 30000],
			step: 500,
			stop: function(event, ui) {
				$('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
				$('#hidden_minimum_price').val(ui.values[0]);
				$('#hidden_maximum_price').val(ui.values[1]);
				filter_audio_data();
				filter_watch_data();
			}
		});
	});
</script>
<?php require('footer.php') ?>