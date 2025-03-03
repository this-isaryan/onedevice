<?php
require('top.inc.php');
$categories = '';
$msg = '';
$brand = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
	$id = get_safe_value($con, $_GET['id']);
	$res = mysqli_query($con, "select * from brands where id='$id'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		$row = mysqli_fetch_assoc($res);
		$categories = $row['categories_id'];
		$brand = $row['brand'];
	} else {
		redirect('brand.php');
		die();
	}
}

if (isset($_POST['submit'])) {
	$categories = get_safe_value($con, $_POST['categories_id']);
	$brand = get_safe_value($con, $_POST['brand']);
	$res = mysqli_query($con, "select * from brands where categories_id='$categories' and brand='$brand'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			$getData = mysqli_fetch_assoc($res);
			if ($id == $getData['id']) {
			} else {
				$msg = "Brand already exist";
			}
		} else {
			$msg = "Brand already exist";
		}
	}

	if ($msg == '') {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			mysqli_query($con, "update brands set categories_id='$categories', brand='$brand' where id='$id'");
		} else {
			mysqli_query($con, "insert into brands(categories_id,brand,status) values('$categories','$brand','1')");
		}
		redirect('brand.php');
		die();
	}
}

?>
<div class="content pb-0">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><strong>Brands</strong><small> Form</small></div>
					<form method="post">
						<div class="card-body card-block">
							<div class="form-group">
								<label for="categories" class=" form-control-label">Categories</label>
								<select name="categories_id" id="categories" class="form-control">
									<option value="">Select Categories</option>
									<?php
									$res = mysqli_query($con, "select * from categories where status=1");
									while ($row = mysqli_fetch_assoc($res)) {
										if($row['id']==$categories) {
											echo "<option value='" . $row['id'] . "' selected>" . $row['categories'] . "</option>";
										} else {
											echo "<option value='" . $row['id'] . "'>" . $row['categories'] . "</option>";
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<label for="brand" class=" form-control-label">Brand</label>
										<input type="text" name="brand" placeholder="Enter Brand " class="form-control" required value="<?php echo $brand ?>">
									</div>
								</div>
							</div>
							<div class="btn-flex">
								<button id="cancel-button" name="cancel" type="button" class="btn btn-lg btn-info btn-block" onclick="location.href='brand.php'">Cancel</button>
								<button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
									<span id="payment-button-amount">Submit</span>
								</button>
							</div>
							<div class="field_error"><?php echo $msg ?></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require('footer.inc.php');
?>