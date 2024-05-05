<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'pages/assets.php'; ?>
    <?php include '../server/api.php'; ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="next.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">

	<title>Admin Dashboard</title>
</head>
<body>

	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Kourier</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="next.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="customer.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Customer</span>
				</a>
			</li>
			<li>
				<a href="pricetabel.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Price Table</span>
				</a>
			</li>
			<li>
				<a href="courier.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Courier</span>
				</a>
			</li>
			<li>
				<a href="msg.php">
					<i class='bx bxs-message-rounded-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>

			<li>
				<a href="branches.php">
					<i class='bx bx-git-branch'></i>
					<span class="text">Branches</span>
				</a>
			</li>

			<li>
				<a href="employee.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Employee</span>
				</a>
			</li>

			<li>
				<a href="area.php">
					<i class='bx bxs-edit-location' ></i>
					<span class="text">Area</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<!-- <li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li> -->
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">0</span>
			</a>
			<a href="#" class="profile">
				<img src="images/people.png">
			</a>
		</nav>