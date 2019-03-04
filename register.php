<?php include ('server.php'); ?>
				<section id="about" class="section-padding">
					<div class="container">
						<div class="col-md-12 text-center marb-35">
							<h1 class="header-h">Registration Form</h1>
							<p class="header-p">
								Thank you for choosing to Sign up for our FREE membership! Enjoy special discounts and free delivery on every dining meal.
							</p>
						</div>
						<form class="form-horizontal" method="GET" action="register.php">
								<?php include ('errors.php'); ?>
								<div class="row">
										<div class="col-md-3 field-label-responsive">
												<label for="name">Username</label>
										</div>
										<div class="col-md-6">
												<div class="form-group">
														<div class="input-group mb-2 mr-sm-2 mb-sm-0">
															<input type="text" name="username" class="form-control" id="name"
																		 placeholder="treesa_11" required autofocus>
														</div>
												</div>
										</div>
								</div>
								<div class="row">
										<div class="col-md-3 field-label-responsive">
												<label for="email">E-Mail Address</label>
										</div>
										<div class="col-md-6">
												<div class="form-group">
														<div class="input-group mb-2 mr-sm-2 mb-sm-0">
															<input type="text" name="email" class="form-control" id="email"
																		 placeholder="foodie@example.com" required autofocus>
														</div>
												</div>
										</div>
								</div>
								<div class="row">
										<div class="col-md-3 field-label-responsive">
												<label for="password">Password</label>
										</div>
										<div class="col-md-6">
												<div class="form-group has-danger">
														<div class="input-group mb-2 mr-sm-2 mb-sm-0">
															<input type="password" name="password" class="form-control" id="password"
																		 placeholder="Password" required>
														</div>
												</div>
										</div>
								</div>
								<div class="row">
										<div class="col-md-3"></div>
										<div class="col-md-6">
												<input type="hidden" name="action" value="register" />
												<button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Register</button>
												<a href="login.php" class="btn btn-info">Login</a>

										</div>
								</div>
						</form>
					</div>
				</section>

<?php include ('footer.php'); ?>
