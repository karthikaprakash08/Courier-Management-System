<?php
include('./components/header.php');
?>
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Employee</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Employee</a>
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

		<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') : ?>
                    <div class="col-lg-2 mb-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EmployeeModal"> Add
                            New</button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>NIC</th>
                                        <th>Address</th>
                                        <th>Branch</th>
                                        <th>Gender</th>
                                        <th>action</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>NIC</th>
                                        <th>Address</th>
                                        <th>Branch</th>
                                        <th>Gender</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if ($_SESSION['admin'] != 'admin') {
                                        $getall = getemployeeByEmail($_SESSION['admin']);
                                    } else {
                                        $getall = getAllemployee();
                                    }

                                    while ($row = mysqli_fetch_assoc($getall)) {
                                        $emp_id = $row['emp_id'];
                                    ?>


                                        <tr>

                                            <td>
                                                <?php echo $row['name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['phone']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nic']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['address']; ?>
                                            </td>
                                            <td>
                                                <?php $getCat =  getBranchByID($row['branch_id']);
                                                if ($row4 = mysqli_fetch_assoc($getCat)) {
                                                    echo $row4['branch_name'];
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($row['gender'] == "1") {
                                                    echo "Male";
                                                } else {
                                                    echo "Female";
                                                } ?>
                                            </td>
                                            <td> <a href="empolyee_edit.php?emp_id=<?php echo $emp_id; ?>" class="btn btn-darkblue"> <i class="fa-solid fa-edit"></i>
                                                </a>
                                                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') : ?>
                                                    <button type="button" onclick="deleteData(<?php echo $row['emp_id']; ?>,'employee', 'emp_id')" class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                <?php endif; ?>

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

    <div class="modal fade" id="EmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    <div class="modal-body bg-white">
                        <form action="" method="post" id="basicform" data-parsley-validate="">
                            <div class="form-group mt-2">
                                <label for="inputName">Name</label>
                                <input id="inputName" type="text" name="name" data-parsley-trigger="change" required="" placeholder="Enter Full Name" autocomplete="off" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label for="inputEmail">Email address</label>
                                <input id="inputEmail" type="email" name="email" data-parsley-trigger="change" required="" placeholder="Enter email" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputPhone">Phone Number</label>
                                <input id="inputPhone" type="text" name="phone" data-parsley-trigger="change" required="" placeholder="Enter Phone Number" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputNIC">NIC</label>
                                <input id="inputNIC" type="text" name="nic" data-parsley-trigger="change" required="" placeholder="Enter NIC Number" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputNIC">Branch</label>
                                <select id="branch_id" class='form-control norad tx12' name="branch_id" type='text'>
                                    <?php $getall = getAllBranch();
                                    while ($row = mysqli_fetch_assoc($getall)) { ?>
                                        <option value="<?php echo $row['branch_id'] ?>">
                                            <?php echo $row['branch_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputAddress">Address</label>
                                <input id="inputAddress" type="text" name="address" data-parsley-trigger="change" required="" placeholder="Enter Address" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputGender">Gender</label>
                                <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                                    <option value="1" selected>Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputPassword">Password</label>
                                <input id="inputPassword" type="password" name="password" placeholder="Password" required="" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="inputRepeatPassword">Repeat Password</label>
                                <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="password" required="" name="conf_password" placeholder="Password" class="form-control">
                            </div>

                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="addEmployee(this.form)" name="submit" class="btn btn-primary">Save
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