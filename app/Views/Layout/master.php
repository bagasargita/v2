<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="SoengSouy Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="SoengSouy Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Dashboard</title>


	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/assets/images/logo.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/font-awesome.min.css">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/line-awesome.min.css">
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/DataTables/Buttons/css/buttons.dataTables.min.css">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/select2.min.css">
	<!-- Datetimepicker CSS -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap-datetimepicker.min.css"> -->
	<!-- Chart CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/morris/morris.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/jquery.tagsinput.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/sweetalert2/dist/sweetalert2.min.css" type="text/css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />




	<script src="<?= base_url() ?>/assets/js/jquery-3.5.1.min.js"></script>

	<script src="<?= base_url() ?>/assets/js/jquery.tagsinput.js"></script>
	<script src="<?= base_url() ?>/assets/js/webcam.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/moment.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/datatables.min.js"></script>
	<!-- <script src="<?= base_url() ?>/assets/js/bootstrap-datetimepicker.min.js"></script> -->
	<script src="<?= base_url() ?>/assets/DataTables/Buttons/js/buttons.print.min.js"></script>
	<script src="<?= base_url() ?>/assets/DataTables/Buttons/js/buttons.dataTables.min.js"></script>
	<script src="<?= base_url() ?>/assets/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url() ?>/assets/DataTables/Buttons/js/buttons.html5.min.js"></script>




	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>






</head>

<body>
	<style>
		.invalid-feedback {
			font-size: 14px;
		}
	</style>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->

		<div class="header">
			<!-- Logo -->
			<div class="header-left">
				<a href="/dashboard" class="logo"> <img src="<?= base_url() ?>/assets/images/logo.png" width="40" height="40" alt=""> </a>
			</div>
			<!-- /Logo -->
			<a id="toggle_btn" href="javascript:void(0);">
				<span class="bar-icon"><span></span><span></span><span></span></span>
			</a>
			<!-- Header Title -->
			<div class="page-title-box">
				<h3></h3>
			</div>
			<!-- /Header Title -->
			<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
			<!-- Header Menu -->
			<ul class="nav user-menu">
				<!-- Search -->
				<li class="nav-item">
					<div class="top-nav-search">
						<a href="javascript:void(0);" class="responsive-search"> <i class="fa fa-search"></i> </a>
						<form action="search.html">
							<input class="form-control" type="text" placeholder="Search here">
							<button class="btn" type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</li>

				<li class="nav-item dropdown has-arrow main-drop">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img">
							<img src="<?= base_url() ?>/assets/images/1625903419.png" alt="{{ Auth::user()->name }}">
							<span class="status online"></span></span>
						<span><?php session()->get() ?></span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('profile_user">My Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
						<a class="dropdown-item" href="change.html">Change Password</a>
						<a class="dropdown-item" href="<?= site_url('/AuthController/logout') ?>">Logout</a>
					</div>
				</li>
			</ul>
			<!-- /Header Menu -->
			<!-- Mobile Menu -->
			<div class="dropdown mobile-user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-ellipsis-v"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="profile.html">My Profile</a> 
					<a class="dropdown-item" href="<?= site_url('/AuthController/logout') ?>">Logout</a>
				</div>
			</div>
			<!-- /Mobile Menu -->
		</div>
		<!-- /Header -->
		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<?= $this->include('Layout/menu'); ?>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
		<!-- Page Wrapper -->
		
		<?= $this->renderSection('pages'); ?>
		<!-- /Page Wrapper -->
	</div>
	<script src="<?= base_url() ?>/assets/alert.js"></script>
	
	<script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>/assets/plugins/morris/morris.min.js"></script>
	<script src="<?= base_url() ?>/assets/plugins/raphael/raphael.min.js"></script>
	<!-- <script src="<?= base_url() ?>/assets/js/chart.js"></script> -->
	<script src="<?= base_url() ?>/assets/js/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>
	<script src="<?= base_url() ?>/assets/login.js"></script>
	<script src="<?= base_url() ?>/assets/js/app.js"></script>
	
	
	<?= $this->renderSection('js'); ?>

</body>
</html>