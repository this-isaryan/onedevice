<?php
require('top.inc.php');
$heading1 = '';
$heading2 = '';
$btn_txt = '';
$btn_link = '';
$image = '';
$msg = '';
$order_no='0';
$image_required = 'required';

if (isset($_GET['id']) && $_GET['id'] != '') {
	$image_required = '';
	$id = get_safe_value($con, $_GET['id']);
	$res = mysqli_query($con, "select * from banner where id='$id'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		$row = mysqli_fetch_assoc($res);
		$heading1 = $row['heading1'];
		$heading2 = $row['heading2'];
		$btn_txt = $row['btn_txt'];
		$btn_link = $row['btn_link'];
		$image = $row['image'];
		$order_no = $row['order_no'];
	} else {
		header('location:banner.php');
		die();
	}
}

if (isset($_POST['submit'])) {
	$heading1 = get_safe_value($con, $_POST['heading1']);
	$heading2 = get_safe_value($con, $_POST['heading2']);
	$btn_txt = get_safe_value($con, $_POST['btn_txt']);
	$btn_link = get_safe_value($con, $_POST['btn_link']);
	$order_no = get_safe_value($con, $_POST['order_no']);

	if (isset($_GET['id']) && $_GET['id'] == 0) {
		if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
			$msg = "Please select only png,jpg and jpeg image formate";
		}
	} else {
		if ($_FILES['image']['type'] != '') {
			if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
				$msg = "Please select only png,jpg and jpeg image formate";
			}
		}
	}

	$msg = "";

	if ($msg == '') {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			if ($_FILES['image']['name'] != '') {
				$image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'], BANNER_SERVER_PATH . $image);
				$update_sql = "update banner set heading1='$heading1', heading2='$heading2', btn_txt='$btn_txt', btn_link='$btn_link', image='$image', order_no='$order_no' where id='$id'";
			} else {
				$update_sql = "UPDATE banner set heading1='$heading1', heading2='$heading2', btn_txt='$btn_txt', btn_link='$btn_link', order_no='$order_no' WHERE id='$id';";
			}
			mysqli_query($con, $update_sql);
		} else {
			$image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], BANNER_SERVER_PATH . $image);
			mysqli_query($con, "insert into banner(heading1, heading2,  btn_txt, btn_link, image, order_no, status) values('$heading1', '$heading2', '$btn_txt', '$btn_link', '$image', '$order_no', '1')");
		}
		header('location:banner.php');
		die();
	}
}

?>
<div class="content pb-0">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><strong>Banner</strong><small> Form</small></div>
					<form method="post" enctype="multipart/form-data">
						<div class="card-body card-block">
							<div class="form-group">
								<label for="heading1" class=" form-control-label">Heading1</label>
								<input type="text" name="heading1" placeholder="Enter heading1" class="form-control" required value="<?php echo $heading1 ?>">
							</div>
							<div class="form-group">
								<label for="heading2" class=" form-control-label">Heading2</label>
								<input type="text" name="heading2" placeholder="Enter heading2" class="form-control" required value="<?php echo $heading2 ?>">
							</div>
							<div class="form-group">
								<label for="btn_txt" class=" form-control-label">Btn Txt</label>
								<input type="text" name="btn_txt" placeholder="Enter Btn Txt" class="form-control" value="<?php echo $btn_txt ?>">
							</div>
							<div class="form-group">
								<label for="btn_link" class=" form-control-label">Btn Link</label>
								<input type="text" name="btn_link" placeholder="Enter Btn Link" class="form-control" value="<?php echo $btn_link ?>">
							</div>
							<div class="form-group">
								<label for="image" class=" form-control-label">Image</label>
								<input type="file" name="image" class="form-control" <?php echo  $image_required ?>>
								<?php
										if ($image != '') {
											echo "<a target='_blank' href='" . BANNER_SITE_PATH . $image . "'><img width='150px' src='" . BANNER_SITE_PATH . $image . "'/></a>";
										}
										?>
							</div>
							<div class="form-group">
								<label for="btn_link" class=" form-control-label">Order No</label>
								<input type="text" name="order_no" placeholder="Enter Order No" class="form-control" value="<?php echo $order_no ?>">
							</div>
							<div class="btn-flex">
								<button id="cancel-button" name="cancel" type="button" class="btn btn-lg btn-info btn-block">Cancel</button>
								<button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
									<span id="payment-button-amount">Submit</span>
								</button>
							</div>
							<div class="field_error"><?php echo $msg ?></div>
						</div>
					</form>
					<script>
						const cancel_btn = document.querySelector("#cancel-button");
						cancel_btn.addEventListener('click', () => {
							location.href = "banner.php";
						});
					</script>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require('footer.inc.php');
?>