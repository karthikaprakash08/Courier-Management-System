<!DOCTYPE html>
<html lang="en">
<?php include 'components/head.php'; ?>
<?php include 'auth.php'; ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">

    <!-- <div class="site-wrap"> -->

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-3 js-site-navbar site-navbar-target" role="banner" id="site-navbar">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2 site-logo">
                    <h1 class="mb-0"><a href="index.php" class="text-white h5 mb-0">Royal Express</a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                            <li><a href="index.php#section-home" class="nav-link">Home</a></li>
                            <li>
                                <a href="index.php#section-about" class="nav-link">About Us</a>
                            </li>
                            <li><a href="index.php#section-gallery" class="nav-link">Gallery</a></li>
                            <li><a href="index.php#section-contact" class="nav-link">Contact</a></li>
                            <?php if(isset($_SESSION['customer'])) :?>
                            <li><a href="profile.php" class="nav-link active">Profile</a></li>
                            <li><a href="tracking.php" class="nav-link">Tracking</a></li>
                            <li><a href="admin/logout.php" class="nav-link">Logout</a></li>
                            <?php else :?>
                            <li><a href="admin/login.php" class="nav-link">Login</a></li>
                            <?php endif;?>
                            <li><a href="request.php" class="nav-link ">Request</a></li>
                        </ul>
                    </nav>
                </div>


                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                        href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

            </div>

        </div>
        </div>

    </header>



    <div class="site-blocks-cover overlay" style=" height: 100px; background-image: url(<?php echo $subheader_src; ?>);"
        data-aos="fade" data-stellar-background-ratio="0.5" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">


                    <h1 class="text-white font-weight-light text-uppercase font-weight-bold" data-aos="fade-up">Profile
                    </h1>

                </div>
            </div>
        </div>
    </div>



    <div class="site-section bg-light" id="section-contact">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary">Edit Profile</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-5">
                    <?php 
$getall = getAllcustomerById($_SESSION['customer']);
$row=mysqli_fetch_assoc($getall);
$customer_id = $row['customer_id']; ?>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="d-flex flex-column justify-content-center bg-primary h-100 p-5">
                                <div class="d-inline-flex border border-secondary p-2 mb-4">
                                    <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <div class="d-flex flex-column">
                                        <h4 class="text-info">Full Name</h4>
                                        <p class="m-0 text-white"><?php echo $row['name']; ?></p>
                                    </div>
                                </div>
                                <div class="d-inline-flex border border-secondary p-2 mb-4">
                                    <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <div class="d-flex flex-column">
                                        <h4 class="text-info">Email</h4>
                                        <p class="m-0 text-white"><?php echo $row['email']; ?></p>
                                    </div>
                                </div>
                                <div class="d-inline-flex border border-secondary p-2 mb-4">
                                    <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <div class="d-flex flex-column">
                                        <h4 class="text-info">Phone Number</h4>
                                        <p class="m-0 text-white"><?php echo $row['phone']; ?></p>
                                    </div>
                                </div>
                                <div class="d-inline-flex border border-secondary p-2 mb-4">
                                    <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <div class="d-flex flex-column">
                                        <h4 class="text-info">Address</h4>
                                        <p class="m-0 text-white"><?php echo $row['address']; ?></p>
                                    </div>
                                </div>
                                <div class="d-inline-flex border border-secondary p-2 mb-4">
                                    <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <div class="d-flex flex-column">
                                        <h4 class="text-info">NIC</h4>
                                        <p class="m-0 text-white"><?php echo $row['nic']; ?></p>
                                    </div>
                                </div>
                                <div class="d-inline-flex border border-secondary p-2 mb-4">
                                    <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <div class="d-flex flex-column">
                                        <h4 class="text-info">Gender</h4>
                                        <p class="m-0 text-white">
                                            <?php if ($row['gender']=="1") echo "Male"; else echo "Female"; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-7 mb-5 my-lg-5 py-5 pl-lg-5">
                            <div class="contact-form">
                                <div id="success"></div>
                                <div class="col-md-12 border-right">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Profile Settings</h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center experience">
                                            <a class="border px-3 p-1 add-experience" id="change"
                                                href="change_email.php"><i class="fa fa-lock"></i>&nbsp;Change Email</a>
                                            <a href="change_password.php" class="border px-3 p-1 add-experience"><i
                                                    class="fa fa-lock"></i>&nbsp;Change Password</a>
                                            <button class="border px-3 p-1 add-experience"
                                                onclick="deleteDataFromHome(<?php echo $row['customer_id']; ?>, 'customer', 'customer_id')"><i
                                                    class="fa fa-trash"></i>&nbsp;Delete</button>
                                        </div><br>
                                        <div class="row mt-2">
                                            <div class="col-md-12"><label class="labels">Name</label>
                                                <input type="text"
                                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","name", "customer", "customer_id")'
                                                    class="form-control" id="name" placeholder="Your name"
                                                    value="<?php echo $row['name']; ?>">
                                            </div>

                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12"><label class="labels">Mobile Number</label>
                                                <input type="text"
                                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","phone", "customer", "customer_id")'
                                                    class="form-control" id="phone" placeholder="enter phone number"
                                                    value="<?php echo $row['phone']; ?>">
                                            </div>


                                            <div class="col-md-12"><label class="labels">Address </label><input
                                                    type="text"
                                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","address", "customer", "customer_id")'
                                                    class="form-control" id="address" placeholder="enter address"
                                                    value="<?php echo $row['address']; ?>"></div>

                                            <div class="col-md-12"><label class="labels">NIC</label>
                                                <input type="text" 
                                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","nic", "customer", "customer_id")'
                                                    id="nic" class="form-control" placeholder="Enter NIC"
                                                    value="<?php echo $row['nic']; ?>">
                                            </div>

                                            <div class="col-md-12">
                                                <label class="labels">Email ID</label>
                                                <input type="email"
                                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","email", "customer", "customer_id")'
                                                    id="email" class="form-control" placeholder="Enter Email Address"
                                                    value="<?php echo $row['email']; ?>">
                                            </div>

                                        </div>
                                        <div class="row mt-12">
                                            <div class="col-md-12"><label class="labels">Gender</label>
                                                <select
                                                    onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","gender", "customer", "customer_id")'
                                                    id="gender <?php echo $customer_id; ?>"
                                                    class='form-control norad tx12' name="gender" type='text'>
                                                    <option value="1"
                                                        <?php if ($row['gender']=="1") echo "selected"; ?>>
                                                        Male</option>
                                                    <option value="0"
                                                        <?php if ($row['gender']=="0") echo "selected"; ?>>
                                                        Female</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include 'pages/footer.php'; ?>
    <!-- </div> -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>