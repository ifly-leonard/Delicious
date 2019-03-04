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


<section id="about" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center marb-35">
				<h1 class="header-h">Admin access </h1>
				<p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
					<br>nibh euismod tincidunt ut laoreet dolore magna aliquam. </p>
			</div>

			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="about-info">
            <h2 class=""><span class="heading">Add new menu items </span><a data-toggle="modal" data-target="#addNew" class="btn btn-success btn-sm">Add </a></h2>
            <div id="addNew" class="modal fade">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="heading">Add new menu item - <?php echo $menu['name']; ?></h4>
                  </div>
                  <div class="modal-body">
                    <form action="add_new_menu.php" method="GET">
                      Name <input class="form-control" type="text" name="name" value="<?php echo $menu['name']; ?>" /> <br>
                      Description <input class="form-control" type="text" name="description" value="<?php echo $menu['description']; ?>" /> <br>
                      Price <input class="form-control" type="text" name="price" value="<?php echo $menu['price']; ?>" /> <br>
                      Non Veg? (1 = Yes, 0 = No) <input class="form-control" type="text" name="non_veg" value="<?php echo $menu['non_veg']; ?>" /> <br>
                      Available in restaurant? (1 = Yes, 0 = No) <input class="form-control" type="text" name="available" value="<?php echo $menu['available']; ?>" /> <br>

                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-success" name="Submit" value="Submit">
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>

              </div>
            </div>


						<h2 class="heading">Available menu items (click to edit)</h2>

            			<div class="col-md-12  text-center" id="menu-flters">
            				<ul>
            					<li><a class="filter active" data-filter=".menu-restaurant">Show All</a></li>
            					<li><a class="filter" data-filter=".veg">Veg</a></li>
            					<li><a class="filter" data-filter=".nonveg">Non Veg</a></li>
            				</ul>
            			</div>

            			<div id="menu-wrapper">

            				<?php
            				$sql = "SELECT * FROM `menu`";
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
                              <?php
                                $modalName = str_replace(' ', '', $menu['name']);
                              ?>
            									<a class="menu-title" data-toggle="modal" data-target="#<?php echo $modalName; ?>" data-meal-img="assets/img/restaurant/rib.jpg"><?php echo $menu['name']; ?></a>
            									<span style="left: 166px; right: 44px;" class="menu-line"></span>
            									<span class="menu-price">&#8377;<?php echo $menu['price']; ?></span>
            								</span>
            								<span class="menu-subtitle"><?php echo $menu['description']; ?></span>
            							</div>


                          <div id="<?php echo $modalName; ?>" class="modal fade">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="heading">Edit menu item - <?php echo $menu['name']; ?></h4>
                                </div>
                                <div class="modal-body">
                                  <form action="update_menu.php" method="GET">
                                    Name <input class="form-control" type="text" name="name" value="<?php echo $menu['name']; ?>" /> <br>
                                    Description <input class="form-control" type="text" name="description" value="<?php echo $menu['description']; ?>" /> <br>
                                    Price <input class="form-control" type="text" name="price" value="<?php echo $menu['price']; ?>" /> <br>
                                    Non Veg? (1 = Yes, 0 = No) <input class="form-control" type="text" name="non_veg" value="<?php echo $menu['non_veg']; ?>" /> <br>
                                    Available in restaurant? (1 = Yes, 0 = No) <input class="form-control" type="text" name="available" value="<?php echo $menu['available']; ?>" /> <br>

                                    <input type="hidden" name="id" value="<?php echo $menu['id']; ?>" >
                                </div>
                                <div class="modal-footer">
                          				<input type="submit" class="btn btn-success" name="Submit" value="Submit">
                                  <a onclick="return confirm('Are you sure you want to delete this item?');" href="delete_menu_item.php?id=<?php echo $menu['id']; ?>" class="btn btn-danger"> Delete item </a>
                                  </form>
                          				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>

                            </div>
                          </div>
            							<?php
            				    }
            				} else {
            				    echo "0 results";
            				}
            				$conn->close();
            				?>
            			</div>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</section>

<?php include ('footer.php'); ?>
