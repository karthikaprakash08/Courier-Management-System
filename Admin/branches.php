<?php
include('./components/header.php');
?>
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Branches</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Branches</a>
						</li>
						<li style="float:right;">
						
						</li>
					</ul>
				</div>
                <div class="col-lg-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BranchModal"> Add
                        New</button>
                </div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

        </main>
		<!-- MAIN -->
		
		<div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Branch Name</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getall = getAllBranch();

                                    while ($row = mysqli_fetch_assoc($getall)) {

                                        $branch_id = $row['branch_id']; ?>


                                        <tr>
                                            <td><?php echo $row['branch_name']; ?></td>
                                            <td>

                                                <button type="button" onclick="deleteData(<?php echo $row['branch_id']; ?>, 'branch', 'branch_id')" class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
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
    <div class="modal fade" id="BranchModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    <div class="modal-body bg-white">
                        
                            <div class="col-md-12">
                                <label for="cat_name" class="form-label">Branch Name</label>
                                <input type="text" class="form-control" name="branch_name" id="branch_name" placeholder="Branch Name" required="">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="addBranch(this.form)" name="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="next.js"></script>
</body>
</html>    