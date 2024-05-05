<?php
include('./components/header.php');
?>		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Message</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Message</a>
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
									<th>Subject</th>
									<th>Message</th>
									<th>Time</th>
									<th>Action</th>
	
								</tr>
							</thead>
							<tbody>
								<?php
								$getall = getAllMessages();

								while ($row = mysqli_fetch_assoc($getall)) { ?>
									<tr>

										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['subject']; ?></td>
										<td><?php echo $row['message']; ?></td>
										<td><?php echo $row['date_updated']; ?></td>
										<td>

											<button type="button" onclick="permenantdeleteData(<?php echo $row['contact_id']; ?>, 'contact', 'contact_id' )" class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
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