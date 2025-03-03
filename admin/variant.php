<?php
require('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
	$type = get_safe_value($con, $_GET['type']);
	if ($type == 'status') {
		$operation = get_safe_value($con, $_GET['operation']);
		$id = get_safe_value($con, $_GET['id']);
		if ($operation == 'active') {
			$status = '1';
		} else {
			$status = '0';
		}
		$update_status_sql = "update variant_master set status='$status' where id='$id'";
		mysqli_query($con, $update_status_sql);
	}

	if ($type == 'delete') {
		$id = get_safe_value($con, $_GET['id']);
		$delete_sql = "delete from variant_master where id='$id'";
		mysqli_query($con, $delete_sql);
	}
}

$sql = "select * from variant_master order by id desc";
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
	<div class="orders">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body top-head">
						<h4 class="box-title">variant </h4>
						<h4 class="box-link"><a href="manage_variant.php" class="btn">Add Variant</a></h4>
					</div>
					<div class="card-body--">
						<div class="table-stats order-table ov-h">
							<table class="table ">
								<thead>
									<tr>
										<th class="serial">#</th>
										<th>ID</th>
										<th>Variant</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									while ($row = mysqli_fetch_assoc($res)) { ?>
										<tr>
											<td class="serial"><?php echo $i ?></td>
											<td><?php echo $row['id'] ?></td>
											<td><?php echo $row['variant'] ?></td>
											<td>
												<?php
												if ($row['status'] == 1) {
													echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=" . $row['id'] . "'><ion-icon name='checkmark-circle-outline'></ion-icon></a></span>";
												} else {
													echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=" . $row['id'] . "'><ion-icon name='remove-circle-outline'></ion-icon></a></span>";
												}
												echo "<span class='badge badge-edit'><a href='manage_variant.php?id=" . $row['id'] . "'><ion-icon name='create-outline'></ion-icon></a></span>";
												
												echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'><ion-icon name='trash-outline'></ion-icon></a></span>";

												?>
											</td>
										</tr>
									<?php $i++; } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
require('footer.inc.php');
?>