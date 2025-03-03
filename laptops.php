<?php
require('top.php');
$get_product = get_product($con, '', '3');
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
				<?php if ($get_product['0']['categories_id'] == '3') { ?>
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
											<input type="hidden" id="hidden_maximum_price" value="400000" />
											<p id="price_show">1000 - 400000</p>
											<div id="price_range_laptop"></div>
										</div>

										<div class="list-group">
											<h2>Brand</h2>
											<div style="max-height: 180px; overflow-y: auto; overflow-x: hidden;">
												<?php
												$query = "SELECT brand FROM brands WHERE categories_id = 3 AND status = 1 order by brand";
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
											<h2>Processor</h2>
											<h3>Processor Speed</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_pSpeed" class="common_selector lprocessCSpeed" value="1.5">1.5 GHz & above<span class="check"></span>
												</label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_pSpeed" class="common_selector lprocessCSpeed" value="2">2 GHz & above<span class="check"></span>
												</label>
											</div>
											<div class="list-group-item checkbox list_border_bottom">
												<label class="Container"><input type="radio" name="filter_pSpeed" class="common_selector lprocessCSpeed" value="3">3 GHz & above<span class="check"></span>
												</label>
											</div>
											<br>
											<h3>Intel Processors</h3>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lprocessortype" value="Apple M1">
													<p class="label-r">Apple M1</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio intel9i lprocessortype" value="Intel i9">
													<p class="label-r">Intel i9</p>
												</label>
											</div>
											<div class="list-group-item checkbox intel9i-versions" style="display: none;">
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="filter_inteli9" class="common_selector input-radio radio lprocessorGen" value="12gen">
														<p class="label-r">Intel i9 12th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="filter_inteli9" class="common_selector input-radio radio lprocessorGen" value="10gen">
														<p class="label-r">Intel i9 10th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="filter_inteli9" class="common_selector input-radio radio lprocessorGen" value="9gen">
														<p class="label-r">Intel i9 9th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="filter_inteli9" class="common_selector input-radio radio lprocessorGen" value="8gen">
														<p class="label-r">Intel i9 8th Gen</p>
													</label>
												</div>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio intel7i lprocessortype" value="Intel i7">
													<p class="label-r">Intel i7</p>
												</label>
											</div>
											<div class="list-group-item checkbox intel7i-versions" style="display: none;">
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="filter_inteli7" class="common_selector input-radio radio lprocessorGen" value="12gen">
														<p class="label-r">Intel i7 12th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="filter_inteli7" class="common_selector input-radio radio lprocessorGen" value="11gen">
														<p class="label-r">Intel i7 11th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="filter_inteli7" class="common_selector input-radio radio lprocessorGen" value="10gen">
														<p class="label-r">Intel i7 10th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="filter_inteli7" class="common_selector input-radio radio lprocessorGen" value="8gen">
														<p class="label-r">Intel i7 8th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="filter_inteli7" class="common_selector input-radio radio lprocessorGen" value="7gen">
														<p class="label-r">Intel i7 7th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="filter_inteli7" class="common_selector input-radio radio lprocessorGen" value="6gen">
														<p class="label-r">Intel i7 6th Gen</p>
													</label>
												</div>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio intel5i lprocessortype" value="Intel i5">
													<p class="label-r">Intel i5</p>
												</label>
											</div>
											<div class="list-group-item checkbox intel5i-versions" style="display: none;">
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="12gen">
														<p class="label-r">Intel i5 12th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="11gen">
														<p class="label-r">Intel i5 11th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="10gen">
														<p class="label-r">Intel i5 10th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="8gen">
														<p class="label-r">Intel i5 8th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="7gen">
														<p class="label-r">Intel i5 7th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="6gen">
														<p class="label-r">Intel i5 6th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="5gen">
														<p class="label-r">Intel i5 5th Gen</p>
													</label>
												</div>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio intel3i lprocessortype" value="Intel i3">
													<p class="label-r">Intel i3</p>
												</label>
											</div>
											<div class="list-group-item checkbox intel3i-versions" style="display: none;">
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="12gen">
														<p class="label-r">Intel i3 12th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="11gen">
														<p class="label-r">Intel i3 11th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="10gen">
														<p class="label-r">Intel i3 10th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="8gen">
														<p class="label-r">Intel i3 8th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="7gen">
														<p class="label-r">Intel i3 7th Gen</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="6gen">
														<p class="label-r">Intel i3 6th Gen</p>
													</label>
												</div>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lprocessortype" value="Intel Atom">
													<p class="label-r">Intel Atom</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lprocessortype" value="Intel Celeron Dual Core">
													<p class="label-r">Intel Celeron Dual Core</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lprocessortype" value="Intel Pentium Dual Core">
													<p class="label-r">Intel Pentium Dual Core</p>
												</label>
											</div>
											<br>
											<h3>AMD Processors</h3>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio amdqc lprocessortype" value="AMD Quad Core">
													<p class="label-r">AMD Quad Core</p>
												</label>
											</div>
											<div class="list-group-item checkbox amdqc-versions" style="display: none;">
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="AMDA12">
														<p class="label-r">AMD Quad Core A12</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="AMDR5">
														<p class="label-r">AMD Ryzen 5 Quad Core</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="AMDA10">
														<p class="label-r">AMD Quad Core A10</p>
													</label>
												</div>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio amddc lprocessortype" value="AMD Dual Core">
													<p class="label-r">AMD Dual Core</p>
												</label>
											</div>
											<div class="list-group-item checkbox amddc-versions" style="display: none;">
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="AMDE1">
														<p class="label-r">AMD Dual Core E1 APU</p>
													</label>
												</div>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" name="osv_android" class="common_selector input-radio radio lprocessorGen" value="AMDR3">
														<p class="label-r">AMD Ryzen 3 Dual Core</p>
													</label>
												</div>
											</div>
										</div>

										<div class="list-group">
											<h2>Display</h2>
											<h3>Screen Size</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_lscreensize" class="common_selector lscreensize_below_12">12 Inch & Below<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_lscreensize" class="common_selector lscreensize_12_13">12 Inch - 13 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_lscreensize" class="common_selector lscreensize_13_14">13 Inch - 14 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_lscreensize" class="common_selector lscreensize_14_15">14 Inch - 15 Inch<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_lscreensize" class="common_selector lscreensize_15_above">15 Inch & above<span class="check"></span></label>
											</div>
											<br>
											<h3>Display Type</h3>
											<?php
											$query = "SELECT DISTINCT(ldisType) FROM product WHERE status = '1'AND categories_id = 3 AND ldisType IS NOT NULL ORDER BY ldisType";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio ldisType" value="<?php echo $row['ldisType']; ?>">
														<p class="label-r"><?php echo $row['ldisType']; ?></p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>Screen Features</h3>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio ltouchsreen">
													<p class="label-r">Touch Screen</p>
												</label>
											</div>
											<br>
											<h3>Screen Resolution</h3>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lHD">
													<p class="label-r">HD</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lHDplus">
													<p class="label-r">HD+</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lFHD">
													<p class="label-r">Full HD</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lQHD">
													<p class="label-r">Quad HD</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lUHD">
													<p class="label-r">4K Ultra HD</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>RAM</h2>
											<?php
											$query = "SELECT DISTINCT(lcapacity) FROM product WHERE status = '1' AND lcapacity IS NOT NULL ORDER BY lcapacity";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lcapacity" value="<?php echo $row['lcapacity']; ?>">
														<p class="label-r"><?php echo $row['lcapacity']; ?> GB</p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>Expandable Up to</h3>
											<?php
											$query = "SELECT DISTINCT(lmemoryexpand) FROM product WHERE status = '1' AND lmemoryexpand IS NOT NULL ORDER BY lmemoryexpand";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lmemoryexpand" value="<?php echo $row['lmemoryexpand']; ?>">
														<p class="label-r"><?php echo $row['lmemoryexpand']; ?> GB</p>
													</label>
												</div>
											<?php
											}
											?>

										</div>

										<div class="list-group">
											<h2>Storage</h2>
											<h3>HDD Storage</h3>
											<?php
											$query = "SELECT DISTINCT(lstoreageC) FROM product WHERE status = '1' AND lstoragetype = 'HDD' AND lstoreageC IS NOT NULL ORDER BY lstoreageC";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lstoreageCHDD" value="<?php echo $row['lstoreageC']; ?>">
														<p class="label-r"><?php if ($row['lstoreageC'] == '1024') {
																				echo '1 TB';
																			} else {
																				echo $row['lstoreageC'] . ' GB';
																			} ?></p>
													</label>
												</div>
											<?php
											}
											?>
											<br>
											<h3>SSD Storage</h3>
											<?php
											$query = "SELECT DISTINCT(lstoreageC) FROM product WHERE status = '1' AND lstoragetype = 'SSD' AND lstoreageC IS NOT NULL ORDER BY lstoreageC";
											$statement = $connect->prepare($query);
											$statement->execute();
											$result = $statement->fetchAll();
											foreach ($result as $row) {
											?>
												<div class="list-group-item checkbox list_border">
													<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lstoreageCSSD" value="<?php echo $row['lstoreageC']; ?>">
														<p class="label-r"><?php if ($row['lstoreageC'] == '1024') {
																				echo '1 TB';
																			} else {
																				echo $row['lstoreageC'] . ' GB';
																			} ?></p>
													</label>
												</div>
											<?php
											}
											?>
										</div>

										<div class="list-group">
											<h2>Graphics</h2>
											<h3>Dedicated Graphics</h3>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_graphM" class="common_selector lgraphActMem" value="1">1 GB & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_graphM" class="common_selector lgraphActMem" value="1.5">1.5 GB & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_graphM" class="common_selector lgraphActMem" value="2">2 GB & above<span class="check"></span></label>
											</div>
											<br>
											<h3>Graphics Brand</h3>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lgraphintel">
													<p class="label-r">Intel Integrated</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lgraphNVIDIA">
													<p class="label-r">NVIDIA</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lgraphAMD">
													<p class="label-r">AMD</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Operating System</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lwin10">
													<p class="label-r">Windows 10</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lwin11">
													<p class="label-r">Windows 11</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio llinux">
													<p class="label-r">Linux</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lubuntu">
													<p class="label-r">Ubuntu</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lmacOS">
													<p class="label-r">Mac OS</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio ldos">
													<p class="label-r">DOS</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Features</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lusb3">
													<p class="label-r">USB 3.0</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lhdmi">
													<p class="label-r">HDMI</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio ldvdw">
													<p class="label-r">Dvd Writer</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lbaklitKey">
													<p class="label-r">Backlit Keyboard</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio llockport">
													<p class="label-r">Lock Port</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lfingerprintRead">
													<p class="label-r">Fingerprint Reader</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lfaceunlock">
													<p class="label-r">Face Unlock</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lusbtypc">
													<p class="label-r">USB Type-C</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lstereoSpeaker">
													<p class="label-r">Stereo Speakers</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio ltouchbar">
													<p class="label-r">Touchbar</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Battery</h2>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_lbattery" class="common_selector lbattlife" value="3">3 Hrs & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_lbattery" class="common_selector lbattlife" value="5">5 Hrs & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_lbattery" class="common_selector lbattlife" value="7">7 Hrs & above<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_lbattery" class="common_selector lbattlife" value="9">9 Hrs & above<span class="check"></span></label>
											</div>
										</div>

										<div class="list-group">
											<h2>Style</h2>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lultrabook">
													<p class="label-r">Ultrabook</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio lconvertible">
													<p class="label-r">2-in-1 (Convertible)</p>
												</label>
											</div>
											<div class="list-group-item checkbox list_border">
												<label class="label-radio"><input type="checkbox" class="common_selector input-radio radio ldetachable">
													<p class="label-r">2-in-1 (Detachable)</p>
												</label>
											</div>
										</div>

										<div class="list-group">
											<h2>Weight</h2>
											<div class="list-group-item checkbox list_border">
												<label class="Container"><input type="radio" name="filter_lbattery" class="common_selector lweight" value="1">1 Kg & below<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_lbattery" class="common_selector lweight" value="1.5">1.5 Kg & below<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_lbattery" class="common_selector lweight" value="2">2 Kg & below<span class="check"></span></label>
											</div>
											<div class="list-group-item checkbox">
												<label class="Container"><input type="radio" name="filter_lbattery" class="common_selector lweight" value="3">3 Kg & below<span class="check"></span></label>
											</div>
										</div>
									</div>
									<div class="clearbtn">
										<button type="button" onclick="location.reload()" class="submit-btn">Clear Filters</button>
									</div>
								</div>
							</div>
						</div>
						<div class="filter_laptop_data"></div>
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

		filter_laptop_data();

		function filter_laptop_data() {
			$('.filter_laptop_data').html('<div id="loading" style="" ></div>');
			var action = 'fetch_laptop_data';
			var minimum_price = $('#hidden_minimum_price').val();
			var maximum_price = $('#hidden_maximum_price').val();
			var brand = get_filter('brand');
			var lprocessCSpeed = get_filter('lprocessCSpeed');
			var lprocessortype = get_filter('lprocessortype');
			var lprocessorGen = get_filter('lprocessorGen');
			var lscreensize_below_12 = get_filter('lscreensize_below_12');
			var lscreensize_12_13 = get_filter('lscreensize_12_13');
			var lscreensize_13_14 = get_filter('lscreensize_13_14');
			var lscreensize_14_15 = get_filter('lscreensize_14_15');
			var lscreensize_15_above = get_filter('lscreensize_15_above');
			var ldisType = get_filter('ldisType');
			var ltouchsreen = get_filter('ltouchsreen');
			var lHD = get_filter('lHD');
			var lHDplus = get_filter('lHDplus');
			var lFHD = get_filter('lFHD');
			var lQHD = get_filter('lQHD');
			var lUHD = get_filter('lUHD');
			var lcapacity = get_filter('lcapacity');
			var lmemoryexpand = get_filter('lmemoryexpand');
			var lstoreageCHDD = get_filter('lstoreageCHDD');
			var lstoreageCSSD = get_filter('lstoreageCSSD');
			var lgraphActMem = get_filter('lgraphActMem');
			var lgraphintel = get_filter('lgraphintel');
			var lgraphNVIDIA = get_filter('lgraphNVIDIA');
			var lgraphAMD = get_filter('lgraphAMD');
			var lwin10 = get_filter('lwin10');
			var lwin11 = get_filter('lwin11');
			var llinux = get_filter('llinux');
			var lubuntu = get_filter('lubuntu');
			var lmacOS = get_filter('lmacOS');
			var ldos = get_filter('ldos');
			var lusb3 = get_filter('lusb3');
			var lhdmi = get_filter('lhdmi');
			var ldvdw = get_filter('ldvdw');
			var lbaklitKey = get_filter('lbaklitKey');
			var llockport = get_filter('llockport');
			var lfingerprintRead = get_filter('lfingerprintRead');
			var lfaceunlock = get_filter('lfaceunlock');
			var lusbtypc = get_filter('lusbtypc');
			var lstereoSpeaker = get_filter('lstereoSpeaker');
			var ltouchbar = get_filter('ltouchbar');
			var lbattlife = get_filter('lbattlife');
			var lultrabook = get_filter('lultrabook');
			var lconvertible = get_filter('lconvertible');
			var ldetachable = get_filter('ldetachable');
			var lweight = get_filter('lweight');
			var sort = get_filter('sort');
			$.ajax({
				url: "fetch_laptop_data.php",
				method: "POST",
				data: {
					action: action,
					minimum_price: minimum_price,
					maximum_price: maximum_price,
					brand: brand,
					lprocessCSpeed: lprocessCSpeed,
					lprocessortype: lprocessortype,
					lprocessorGen: lprocessorGen,
					lscreensize_below_12: lscreensize_below_12,
					lscreensize_12_13: lscreensize_12_13,
					lscreensize_13_14: lscreensize_13_14,
					lscreensize_14_15: lscreensize_14_15,
					lscreensize_15_above: lscreensize_15_above,
					ldisType: ldisType,
					ltouchsreen: ltouchsreen,
					lHD: lHD,
					lHDplus: lHDplus,
					lFHD: lFHD,
					lQHD: lQHD,
					lUHD: lUHD,
					lcapacity: lcapacity,
					lmemoryexpand: lmemoryexpand,
					lstoreageCHDD: lstoreageCHDD,
					lstoreageCSSD: lstoreageCSSD,
					lgraphActMem: lgraphActMem,
					lgraphintel: lgraphintel,
					lgraphNVIDIA: lgraphNVIDIA,
					lgraphAMD: lgraphAMD,
					lwin10: lwin10,
					lwin11: lwin11,
					llinux: llinux,
					lubuntu: lubuntu,
					lmacOS: lmacOS,
					ldos: ldos,
					lusb3: lusb3,
					lhdmi: lhdmi,
					ldvdw: ldvdw,
					lbaklitKey: lbaklitKey,
					llockport: llockport,
					lfingerprintRead: lfingerprintRead,
					lfaceunlock: lfaceunlock,
					lusbtypc: lusbtypc,
					lstereoSpeaker: lstereoSpeaker,
					ltouchbar: ltouchbar,
					lbattlife: lbattlife,
					lultrabook: lultrabook,
					lconvertible: lconvertible,
					ldetachable: ldetachable,
					lweight: lweight,
					sort: sort
				},
				success: function(data) {
					$('.filter_laptop_data').html(data);
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
			filter_laptop_data();
		});

		$('.intel9i').change(function() {
			if (this.checked) {
				$('.intel9i-versions').show();
			} else {
				$('.intel9i-versions').hide();
				$('.intel9i-versions .lprocessorGen').prop('checked', false);
			}
		});

		$('.intel7i').change(function() {
			if (this.checked) {
				$('.intel7i-versions').show();
			} else {
				$('.intel7i-versions').hide();
				$('.intel7i-versions .lprocessorGen').prop('checked', false);
			}
		});

		$('.intel5i').change(function() {
			if (this.checked) {
				$('.intel5i-versions').show();
			} else {
				$('.intel5i-versions').hide();
				$('.intel5i-versions .lprocessorGen').prop('checked', false);
			}
		});

		$('.intel3i').change(function() {
			if (this.checked) {
				$('.intel3i-versions').show();
			} else {
				$('.intel3i-versions').hide();
				$('.intel3i-versions .lprocessorGen').prop('checked', false);
			}
		});

		$('.amdqc').change(function() {
			if (this.checked) {
				$('.amdqc-versions').show();
			} else {
				$('.amdqc-versions').hide();
				$('.amdqc-versions .lprocessorGen').prop('checked', false);
			}
		});

		$('.amddc').change(function() {
			if (this.checked) {
				$('.amddc-versions').show();
			} else {
				$('.amddc-versions').hide();
				$('.amddc-versions .lprocessorGen').prop('checked', false);
			}
		});

		$('#price_range_laptop').slider({
			range: true,
			min: 1000,
			max: 400000,
			values: [1000, 400000],
			step: 500,
			stop: function(event, ui) {
				$('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
				$('#hidden_minimum_price').val(ui.values[0]);
				$('#hidden_maximum_price').val(ui.values[1]);
				filter_laptop_data();
			}
		});
	});
</script>
<?php require('footer.php') ?>