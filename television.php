<?php
require('top.php');
$get_product = get_product($con, '', '6');
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
				<?php if ($get_product['0']['categories_id'] == '6') { ?>
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
											<input type="hidden" id="hidden_maximum_price" value="8000000" />
											<p id="price_show">1000 - 8000000</p>
											<div id="price_range_tv"></div>
										</div>

										<div class="list-group">
											<h2>Brand</h2>
											<div style="max-height: 180px; overflow-y: auto; overflow-x: hidden;">
												<?php
												$query = "SELECT brand FROM brands WHERE categories_id = 6 AND status = 1 order by brand";
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
											<h2>Display Type</h2>
											<?php
											$query = "SELECT DISTINCT(tvdistype) FROM product WHERE status = '1' AND tvdistype IS NOT NULL ORDER BY tvdistype";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tvdistype" value="<?php echo $row['tvdistype']; ?>">
														<p class="label-r"><?php echo $row['tvdistype']; ?></p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Screen Sizes</h2>
											<?php
											$query = "SELECT DISTINCT(tvsize) FROM product WHERE status = '1' AND tvsize IS NOT NULL ORDER BY tvsize";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tvsize" value="<?php echo $row['tvsize']; ?>">
														<p class="label-r"><?php echo $row['tvsize']; ?> Inch</p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Screen Resolution</h2>
											<?php
											$query = "SELECT DISTINCT(tvresoFilter) FROM product WHERE status = '1' AND tvresoFilter IS NOT NULL ORDER BY tvresoFilter";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tvresoFilter" value="<?php echo $row['tvresoFilter']; ?>">
														<p class="label-r"><?php echo $row['tvresoFilter']; ?> Inch</p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Refresh Rate</h2>
											<?php
											$query = "SELECT DISTINCT(tvRefRate) FROM product WHERE status = '1' AND tvRefRate IS NOT NULL ORDER BY tvRefRate";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tvRefRate" value="<?php echo $row['tvRefRate']; ?>">
														<p class="label-r"><?php echo $row['tvRefRate']; ?> Hz</p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Features</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tv3d">
													<p class="label-r">3D TV</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tvsmart">
													<p class="label-r">Smart TV</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tvcurved">
													<p class="label-r">Curved TV</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio tvandroid">
													<p class="label-r">Adroid TV</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>HDMI Ports</h2>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_tvhdmi" class="common_selector tvhdmi" value="1">1 & More
													<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_tvhdmi" class="common_selector tvhdmi" value="2">2 & More
													<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_tvhdmi" class="common_selector tvhdmi" value="3">3 & More
													<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_tvhdmi" class="common_selector tvhdmi" value="4">4 & More
													<span class="check"></span></label>
											</div>
										</div>

										<div class="list-group">
											<h2>USB Ports</h2>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_tvusb" class="common_selector tvusb" value="1">1 & More
													<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_tvusb" class="common_selector tvusb" value="2">2 & More
													<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_tvusb" class="common_selector tvusb" value="3">3 & More
													<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_tvusb" class="common_selector tvusb" value="4">4 & More
													<span class="check"></span></label>
											</div>
										</div>
									</div>
									<div class="clearbtn">
										<button type="button" onclick="location.reload()" class="submit-btn">Clear Filters</button>
									</div>
								</div>
							</div>
						</div>
						<div class="filter_tv_data"></div>
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

		filter_tv_data();

		function filter_tv_data() {
			$('.filter_tv_data').html('<div id="loading" style=""></div>');
			var action = 'fetch_laptop_data';
			var minimum_price = $('#hidden_minimum_price').val();
			var maximum_price = $('#hidden_maximum_price').val();
			var brand = get_filter('brand');
			var tvdistype = get_filter('tvdistype');
			var tvsize = get_filter('tvsize');
			var tvresoFilter = get_filter('tvresoFilter');
			var tvRefRate = get_filter('tvRefRate');
			var tv3d = get_filter('tv3d');
			var tvsmart = get_filter('tvsmart');
			var tvcurved = get_filter('tvcurved');
			var tvandroid = get_filter('tvandroid');
			var tvhdmi = get_filter('tvhdmi');
			var tvusb = get_filter('tvusb');
			var sort = get_filter('sort');
			$.ajax({
				url: "fetch_tv_data.php",
				method: "POST",
				data: {
					action: action,
					minimum_price: minimum_price,
					maximum_price: maximum_price,
					brand: brand,
					tvdistype: tvdistype,
					tvsize: tvsize,
					tvresoFilter: tvresoFilter,
					tvRefRate: tvRefRate,
					tv3d: tv3d,
					tvsmart: tvsmart,
					tvcurved: tvcurved,
					tvandroid: tvandroid,
					tvhdmi: tvhdmi,
					tvusb: tvusb,
					sort: sort
				},
				success: function(data) {
					$('.filter_tv_data').html(data);
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
			filter_tv_data();
		});
		
		$('#price_range_tv').slider({
			range: true,
			min: 1000,
			max: 8000000,
			values: [1000, 8000000],
			step: 500,
			stop: function(event, ui) {
				$('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
				$('#hidden_minimum_price').val(ui.values[0]);
				$('#hidden_maximum_price').val(ui.values[1]);
				filter_tv_data();
			}
		});
	});
</script>
<?php require('footer.php') ?>