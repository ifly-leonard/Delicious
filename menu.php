
<?php
	include ('server.php');

	if (!isset($_SESSION['username'])) {
		$_SESSION['error'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<section id="menu" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center marb-35">
				<h1 class="header-h">Menu List</h1>
				<p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
					<br>nibh euismod tincidunt ut laoreet dolore magna aliquam. </p>
			</div>

			<div class="col-md-12  text-center" id="menu-flters">
				<ul>
					<li><a class="filter active" data-filter=".menu-restaurant">Show All</a></li>
					<li><a class="filter" data-filter=".veg">Veg</a></li>
					<li><a class="filter" data-filter=".nonveg">Non Veg</a></li>
				</ul>
			</div>

			<div id="menu-wrapper">

				<?php
				$sql = "SELECT * FROM `menu` WHERE `available` = 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($menu = $result->fetch_assoc()) {
							$nonveg = $menu['non_veg'];
							if($nonveg == 1) {
								$filter = 'nonveg';
							} else {
								$filter = 'veg';
							}
							?>
							<div class="<?php echo $filter; ?> menu-restaurant">
								<span class="clearfix">
									<a class="menu-title" href="javascript::void(0);" data-meal-img="assets/img/restaurant/rib.jpg"><?php echo $menu['name']; ?></a>
									<span style="left: 166px; right: 44px;" class="menu-line"></span>
									<span class="menu-price">&#8377;<?php echo $menu['price']; ?></span>
								</span>
								<span class="menu-subtitle"><?php echo $menu['description']; ?></span>
							</div>
							<?php
				    }
				} else {
				    echo "0 results";
				}
				$conn->close();

					foreach ($menus as $menu) {

						// Seeing if the food is Veg or Nonveg

					?>

					<?php
					}
				?>
			</div>

		</div>
	</div>
</section>

<?php include ('footer.php'); ?>
