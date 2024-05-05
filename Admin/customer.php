<?php
include('./components/header.php');
?>
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Customer</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Customer</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

        </main>
		<!-- MAIN -->

		<div>
			<section>
				<div class="tabular--wrapper">
					<div class="table-container">
						<table>
							<thead>
								<tr>
	
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>NIC</th>
									<th>Address</th>
									<th>Gender</th>
	
								</tr>
							</thead>
							<tbody>
								<?php
								$getall = getAllcustomers();
	
								while ($row = mysqli_fetch_assoc($getall)) {
									$customer_id = $row['customer_id'];
								?>
	
	
									<tr>
	
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['phone']; ?></td>
										<td><?php echo $row['nic']; ?></td>
										<td><?php echo $row['address']; ?></td>
										<td><?php if ($row['gender'] == "1") {
												echo "Male";
											} else {
												echo "Female";
											} ?>
										</td>
										<td> <button type="button" onclick="deleteData(<?php echo $row['customer_id']; ?>,'customer', 'customer_id')" class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
											</button>
	
										</td>
									</tr>
	
								<?php } ?>
	
							</tbody>
						</table>
	
					</div>
				</div>
			</section>
		</div>
	</section>
	<!-- CONTENT -->

	
	
	<!-- ionicons -->

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	<script src="next.js"></script>
</body>
</html>    