<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
	<head>
		<!-- Required meta tags -->
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Favicon icon-->
		<!-- Core Css -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/main/css/styles.css" />
		<!-- Additional Css -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/main/libs/select2/dist/css/select2.min.css">
		<title>ALIEN Dashboard</title>
		<script src='https://www.google.com/recaptcha/api.js' async defer></script>
		<style>
			.grecaptcha-badge {
				visibility: visible !important;
				opacity: 1 !important;
				display: block !important;
				position: fixed !important;
				bottom: 10px !important;
				right: 10px !important;
				z-index: 9999 !important;
			}
			
			.left-banner-fixed {
				position: fixed;
				top: 0;
				left: -1;
				width: 58%; /* sesuaikan porsi kolom */
				height: 100vh;
				background: #C9C9C9;
				overflow: hidden;
			}
			
			.content-right {
				margin-left: 55.65%; /* offset supaya tidak ketutup gambar */
				background: white;
			}
		</style>
	</head>
	<body>
		<!-- Preloader -->
		<div class="preloader">
			<img src="<?php echo base_url(); ?>assets/general/images/logo.webp" alt="loader" class="lds-ripple img-fluid" />
		</div>
		<div id="main-wrapper" class="auth-customizer-none">
			<div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
				<div class="position-relative z-index-5">
					<div class="row">
						<?php
							if(isMobileDevice())
							{
						?>
								<div class="col-xl-7 col-xxl-8" style="background:#C9C9C9;">
									<div class="d-none d-xl-flex align-items-center justify-content-center h-n80">
										<img src="<?php echo base_url(); ?>assets/general/images/login-banner.webp" alt="modernize-img" class="img-fluid" width="780px">
									</div>
								</div>
								<div class="col-xl-5 col-xxl-4">
									<div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
										<div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
											<h2 class="mb-1 fs-7 fw-bolder">Register to ALIEN Dashboard</h2>
											<form id="login-form" action="<?= site_url("login/lendra_register_insert"); ?>" method="POST" autocomplete="off">
												<div class="mb-3">
													<label class="form-label">Username</label>
													<input type="text" name="username" value="<?= $this->session->userdata('register_username') ?>" class="form-control" required>
												</div>
												<div class="mb-3">
													<label class="form-label">Password</label>
													<input type="password" name="password" class="form-control" required>
												</div>
												<div class="mb-3">
													<label class="form-label">Confirm Password</label>
													<input type="password" name="password_confirm" class="form-control" required>
												</div>
												<button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
												<div class="d-flex align-items-center">
													<p class="fs-4 mb-0 text-dark">Already have an Account?</p>
													<a class="text-primary fw-medium ms-2" href="<?= site_url("login"); ?>">Sign In</a>
												</div>
											</form>
										</div>
									</div>
								</div>
						<?php
							}
							else
							{
						?>
								<div class="left-banner-fixed">
									<img src="<?php echo base_url(); ?>assets/general/images/login-banner.webp" class="img-fluid h-100 w-auto">
								</div>
								<div class="content-right">
									<div class="col-xl-5 col-xxl-4">
										<div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4 position-relative">
											<img src="<?php echo base_url(); ?>assets/general/images/logo.webp" class="position-absolute" style="top:20px; left:20px; width:130px;"/>
											<img src="<?php echo base_url(); ?>assets/general/images/logo-text.webp" class="position-absolute" style="top:35px; left:120px; width:130px;" />
											<div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
												<h2 class="mb-1 fs-7 fw-bolder">Register to ALIEN Dashboard</h2>
												<br/>
												<br/>
												<form id="login-form" action="<?= site_url("login/lendra_register_insert"); ?>" method="POST" autocomplete="off">
													<div class="mb-3">
														<label class="form-label">Username</label>
														<input type="text" name="username" value="<?= $this->session->userdata('register_username') ?>" class="form-control" required>
													</div>
													<div class="mb-3">
														<label class="form-label">Password</label>
														<input type="password" name="password" class="form-control" required>
													</div>
													<div class="mb-3">
														<label class="form-label">Confirm Password</label>
														<input type="password" name="password_confirm" class="form-control" required>
													</div>
													<button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
													<div class="d-flex align-items-center">
														<p class="fs-4 mb-0 text-dark">Already have an Account?</p>
														<a class="text-primary fw-medium ms-2" href="<?= site_url("login"); ?>">Sign In</a>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
						<?php	
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="dark-transparent sidebartoggler"></div>
		<!-- Import Js Files -->
		<script src="<?php echo base_url(); ?>assets/main/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/main/libs/simplebar/dist/simplebar.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/main/js/theme/app.init.js"></script>
		<script src="<?php echo base_url(); ?>assets/main/js/theme/theme.js"></script>
		<script src="<?php echo base_url(); ?>assets/main/js/theme/app.min.js"></script>
		
		<!-- Additional -->
		<script src="<?php echo base_url(); ?>assets/main/js/vendor.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/main/js/theme/sidebarmenu.js"></script>
		<!-- solar icons -->
		<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
		<!-- This Page JS -->
		<script src="<?php echo base_url(); ?>assets/main/libs/select2/dist/js/select2.full.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/main/libs/select2/dist/js/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/main/js/forms/select2.init.js"></script>
		<script>
			function onSubmit(token)
			{
				console.log("reCAPTCHA success, submitting form...");
				document.getElementById("login-form").submit();
			}
		</script>
	</body>
</html>