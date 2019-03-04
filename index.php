
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
<section id="banner">
	<div class="bg-color">
		<header id="header">
			<div class="container">
				<div id="mySidenav" class="sidenav">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<a href="#about">About</a>
					<a href="#event">Event</a>
					<a href="#menu-list">Menu</a>
					<a href="#contact">Book a table</a>
				</div>
				<!-- Use any element to open the sidenav -->

			</div>
		</header>
		<div class="container">
			<div class="row">
				<div class="inner text-center">
					<h1 class="logo-name">Delicious</h1>
					<h2>Food To fit your lifestyle & health.</h2>
					<p>Specialized in Indian Cuisine!!</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!--about-->
<section id="about" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center marb-35">
				<h1 class="header-h">Delicious Journey <span onclick="openNav()" class="pull-right menu-icon">☰</span></h1>
				<p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
					<br>nibh euismod tincidunt ut laoreet dolore magna aliquam. </p>
			</div>

			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="col-md-6 col-sm-6">
					<div class="about-info">
						<h2 class="heading">vel illum qui dolorem eum</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero impedit inventore culpa vero accusamus in nostrum dignissimos modi, molestiae. Autem iusto esse necessitatibus ex corporis earum quaerat voluptates quibusdam dicta!</p>
						<div class="details-list">
							<ul>
								<li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
								<li><i class="fa fa-check"></i>Quisque finibus eu lorem quis elementum</li>
								<li><i class="fa fa-check"></i>Vivamus accumsan porttitor justo sed </li>
								<li><i class="fa fa-check"></i>Curabitur at massa id tortor fermentum luctus</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<img src="img/res01.jpg" alt="" class="img-responsive">
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</section>
<!--/about-->
<!-- event -->
<section id="event">
	<div class="bg-color" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center" style="padding:60px;">
					<h1 class="header-h">Up Coming events</h1>
					<p class="header-p">Decorations 100% complete here</p>
				</div>
				<div class="col-md-12" style="padding-bottom:60px;">
					<div class="item active left">
						<div class="col-md-6 col-sm-6 left-images">
							<img src="img/res02.jpg" class="img-responsive">
						</div>
						<div class="col-md-6 col-sm-6 details-text">
							<div class="content-holder">
								<h2>Joyful party</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore eos suscipit earum voluptas aliquam recusandae, quae iure adipisci, inventore quia, quos delectus quaerat praesentium id expedita nihil illo accusantium, tempora.</p>
								<address>
														<strong>Place: </strong>
														1612 Collins Str, Victoria 8007
														<br>
														<strong>Time: </strong>
														07:30pm
													</address>
								<a class="btn btn-imfo btn-read-more" href="events-details.html">Read more</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ event -->
<!-- menu -->

<!--/ menu -->
<!-- contact -->

<!-- / contact -->

<?php include ('footer.php'); ?>
