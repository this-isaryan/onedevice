<?php
require('top.inc.php');
$banner = mysqli_num_rows(mysqli_query($con, "select * from banner where status=1"));
$categories = mysqli_num_rows(mysqli_query($con, "select * from categories where status=1"));
$brands = mysqli_num_rows(mysqli_query($con, "select * from brands where status=1"));
$product = mysqli_num_rows(mysqli_query($con, "select * from product where status=1"));
$product_review = mysqli_num_rows(mysqli_query($con, "select * from product_review where status=1"));
$variant_master = mysqli_num_rows(mysqli_query($con, "select * from variant_master"));
$users = mysqli_num_rows(mysqli_query($con, "select * from users"));
$contact_us = mysqli_num_rows(mysqli_query($con, "select * from contact_us"));
?>
<div class="content pb-0">
	<div class="orders">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="box-title">Dashboard </h4>
					</div>
					<div class="card-body--">
						<div class="container">
							<div class="big-box">
								<a href="banner.php">
									<div class="box1 box">
										<div class="child1"><span style="color: black;"><?php echo $banner ?></span> Banner</div>
									</div>
								</a>
								<a href="categories.php">
									<div class="box2 box">
										<div class="child2"><?php echo $categories ?> Categories Master</div>
									</div>
								</a>
								<a href="brand.php">
									<div class="box3 box">
										<div class="child3"><?php echo $brands ?> Brand</div>
									</div>
								</a>
								<a href="product.php">
									<div class="box4 box">
										<div class="child4"><?php echo $product ?> Products</div>
									</div>
								</a>
								<a href="product_review.php">
									<div class="box5 box">
										<div class="child5"><?php echo $product_review ?> Product Review</div>
									</div>
								</a>
								<a href="variant.php">
									<div class="box6 box">
										<div class="child6"><?php echo $variant_master ?> Variant Master</div>
									</div>
								</a>
								<a href="banner.php">
									<div class="box7 box">
										<div class="child7"><?php echo $users ?> User Master</div>
									</div>
								</a>
								<a href="contact_us.php">
									<div class="box8 box">
										<div class="child8"><?php echo $contact_us ?> Contact Us</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.container {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
		grid-template-rows: 1fr 1fr 1fr;
		gap: 0px 0px;
		grid-auto-flow: row;
		grid-template-areas:
			"big-box big-box big-box"
			"big-box big-box big-box"
			"big-box big-box big-box";
	}

	.big-box {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
		grid-template-rows: 1fr 1fr 1fr;
		gap: 0px 0px;
		grid-auto-flow: row;
		grid-template-areas:
			"box1 box2 box3"
			"box4 box5 box6"
			"box7 box8";
		grid-area: big-box;
		grid-gap: 10px;
	}

	.box1 {
		grid-area: box1;
		overflow: hidden;
	}

	.child1 {
		width: 100%;
		height: 100%;
		background-image: url("images/banner_bg.jpg");
		background-position: center;
		background-size: cover;
		transition: all ease-in-out .4s;
	}


	.box2 {
		grid-area: box2;
		overflow: hidden;
	}

	.child2 {
		width: 100%;
		height: 100%;
		background-image: url("images/categories_bg.jpg");
		background-position: center;
		background-size: cover;
		transition: all ease-in-out .4s;
		color: black;
	}

	.box3 {
		grid-area: box3;
		overflow: hidden;
	}



	.child3 {
		width: 100%;
		height: 100%;
		background-image: url("images/brands_bg.jpg");
		background-position: center;
		background-size: cover;
		transition: all ease-in-out .4s;
		color: black;
	}


	.box4 {
		grid-area: box4;
		overflow: hidden;
	}

	.child4 {
		width: 100%;
		height: 100%;
		background-image: url("images/products_bg.jpg");
		background-position: center;
		background-size: cover;
		transition: all ease-in-out .4s;
	}


	.box5 {
		grid-area: box5;
		overflow: hidden;
	}

	.child5 {
		width: 100%;
		height: 100%;
		background-image: url("images/review_bg.jpg");
		background-position: center;
		background-size: cover;
		transition: all ease-in-out .4s;
		color: black;
	}

	.box6 {
		grid-area: box6;
		overflow: hidden;
	}

	.child6 {
		width: 100%;
		height: 100%;
		background-image: url("images/storage_bg.jpg");
		background-position: center;
		background-size: cover;
		transition: all ease-in-out .4s;
	}

	.box7 {
		grid-area: box7;
		overflow: hidden;
	}

	.child7 {
		width: 100%;
		height: 100%;
		background-image: url("images/users_bg.jpg");
		background-position: center;
		background-size: cover;
		transition: all ease-in-out .4s;
	}

	.box8 {
		grid-area: box8;
		overflow: hidden;
	}

	.child8 {
		width: 100%;
		height: 100%;
		background-image: url("images/contact_bg.jpg");
		background-position: center;
		background-size: cover;
		transition: all ease-in-out .4s;
		color: greenyellow;
	}

	.box {
		color: white;
		font-size: 30px;
		font-weight: bold;
		height: 200px;
		border-radius: 30px;
		text-align: center;
		line-height: 200px;
	}

	.box:hover .child1,
	.box:focus .child1,
	.box:hover .child2,
	.box:focus .child2,
	.box:hover .child3,
	.box:focus .child3,
	.box:hover .child4,
	.box:focus .child4,
	.box:hover .child5,
	.box:focus .child5,
	.box:hover .child6,
	.box:focus .child6,
	.box:hover .child7,
	.box:focus .child7,
	.box:hover .child8,
	.box:focus .child8 {
		transform: scale(1.2) rotate(5deg);
	}
</style>
<?php
require('footer.inc.php');
?>