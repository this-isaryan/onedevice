<?php
require('top.inc.php');
$variant = '';
$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
	$id = get_safe_value($con, $_GET['id']);
	$res = mysqli_query($con, "select * from variant_master where id='$id'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		$row = mysqli_fetch_assoc($res);
		$variant = $row['variant'];
	} else {
		redirect('variant.php');
		die();
	}
}

if (isset($_POST['submit'])) {
	$variant = get_safe_value($con, $_POST['variant']);
	$res = mysqli_query($con, "select * from variant_master where variant='$variant'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			$getData = mysqli_fetch_assoc($res);
			if ($id == $getData['id']) {
			} else {
				$msg = "variant already exist";
			}
		} else {
			$msg = "variant already exist";
		}
	}

	if ($msg == '') {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			mysqli_query($con, "update variant_master set variant='$variant' where id='$id'");
		} else {
			mysqli_query($con, "insert into variant_master(variant,status) values('$variant','1')");
		}
		redirect('variant.php');
		die();
	}
}

?>
<div class="content pb-0">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><strong>variant</strong><small> Form</small></div>
					<form method="post">
						<div class="card-body card-block">
							<div class="form-group">
								<label for="variant" class=" form-control-label">Variant</label>
								<input id="variant" type="text" name="variant" placeholder="Enter variant" class="form-control" required value="<?php echo $variant ?>">
							</div>
							<div class="btn-flex">
								<button id="cancel-button" name="cancel" type="button" class="btn btn-lg btn-info btn-block" onclick="location.href='variant.php'">Cancel</button>
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