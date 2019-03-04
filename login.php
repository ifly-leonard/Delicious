<?php include ('server.php'); ?>


				<section id="about" class="section-padding">
					<div class="container">
						<form class="form-horizontal" method="GET" action="login.php">
						<div class="row">
							<div class="col-md-12 text-center marb-35">
								<?php include ('errors.php'); ?>
			          <h1 class="header-h">Delicious Journey</h1>
			          <p class="header-p">
									Welcome to our website, please Login to continue. Or Register for free!
								</p>
			        </div>
								<div class="col-md-3 field-label-responsive">
										<label for="name">E-Mail ID</label>
								</div>
								<div class="col-md-9 text-center marb-35">
										<div class="form-group">
												<div class="input-group mb-2 mr-sm-2 mb-sm-0">
													<input type="text" name="username" class="form-control" id="name"
																 placeholder="Username" required autofocus>
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
																 placeholder="password" required>
												</div>
										</div>
								</div>
						</div>
						<div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-6">
										<input type="hidden" name="action" value="login" />
										<button type="submit" class="btn btn-info">Login</button>
										</form>
										<a href="register.php" class="btn btn-warning">Register</a>
								</div>
						</div>
					</form>
					</div>
				</section>

<?php include ('footer.php'); ?>
