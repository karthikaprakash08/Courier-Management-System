<?php
include('./components/header.php');
?>
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Area</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Area</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AreaModal"> Add
                        New</button>
                </div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

        </main>

		<div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Area Name</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getall = getAllArea();

                                    while ($row = mysqli_fetch_assoc($getall)) {

                                        $area_id = $row['area_id']; ?>


                                        <tr>
                                            <td><?php echo $row['area_name']; ?></td>
                                            <td>

                                                <button type="button" onclick="deleteData(<?php echo $row['area_id']; ?>, 'area', 'area_id')" class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
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

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="AreaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    <div class="modal-body bg-white">
                        <form action="" method="post" id="basicform" data-parsley-validate="">
                            <div class="col-md-12">
                                <label for="area_name" class="form-label">Area Name</label>
                                <input type="text" class="form-control" name="area_name" id="area_name" placeholder="Area Name" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="addArea(this.form)" name="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<!-- ionicons -->

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	<script src="next.js"></script>
</body>
</html>    