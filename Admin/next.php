<?php
include('./components/header.php');
include('admin.php');
?>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-layer' ></i>				
					<span class="text">
						<h3><?php echo dataCount('branch'); ?></h3>
						<p>Branches</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">
						<h3><?php echo dataCount('customer'); ?></h3>
						<p>Customers</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo dataCount('employee'); ?></h3>
						<p>Employee</p>
					</span>
				</li>

				<li>
					<i class='bx bxs-registered'></i>
					<span class="text">
						<h3><?php echo dataCount('request'); ?></h3>
						<p>Request</p>
					</span>
				</li>

				<li>
					<i class='bx bxl-product-hunt' ></i>
					<span class="text">
						<h3><?php echo dataCountWhere('request', ' tracking_status = 1 '); ?></h3>
						<p>Pending</p>
					</span>
				</li>

				<li>
					<i class='bx bxs-hand'></i>
					<span class="text">
						<h3><?php echo dataCountWhere('request', ' tracking_status = 2 '); ?></h3>
						<p>Accepted</p>
					</span>
				</li>

				<li>
					<i class='bx bxs-notification-off'></i>
					<span class="text">
						<h3><?php echo dataCountWhere('request', ' tracking_status = 5 '); ?></h3>
						<p>Cancelled</p>
					</span>
				</li>

				<li>
					<i class='bx bx-package'></i>
					<span class="text">
						<h3><?php echo dataCountWhere('request', ' tracking_status = 3 '); ?></h3>
						<p>Delivered</p>
					</span>
				</li>
			</ul>


			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<!-- ionicons -->

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<script src="next.js"></script>
	<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>