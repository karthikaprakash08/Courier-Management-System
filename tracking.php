<?php
include('components/header.php');
include 'auth.php';
?>



<div class="page-content" style="display:flex; flex-direction: column; padding: 100px 10%;">
			<?php
			$getall = getAllTracking();

			while ($row = mysqli_fetch_assoc($getall)) {
                if($row['customer_id']==$_SESSION['customer']){
				$request_id = $row['request_id'];
			?>
				<article class="card mt-5" style="border: 2px solid #2c3e50 margin: top 48px; padding:50px">
					<header class="card-header text-white" style="background-color: #2c3e50; border-radius: 0px; color:white;">
						Orders /
						Tracking </header>
					<div class="card-body mt-3" style=" margin-top: 30px;">
						<h6>Traking ID: #<?php echo $row['request_id']; ?> </h6>
						<article class="card">
							<div class="card-body rows" style="display:flex; width:100%; justify-content: space-evenly; margin: 30px 0;">

								<div class="col"> <strong>Shipping Address:</strong>
									<br><?php echo $row['name']; ?>
									<br><?php echo $row['phone']; ?>
									<br><?php echo $row['red_address']; ?>
								</div>
								<div class="col"> <strong>Recever Mobile:</strong>
									<br><?php echo $row['res_phone']; ?>
								</div>
								<div class="col"> <strong>Current Status:</strong>
									<br>
									<?php if ($row['tracking_status'] == 1) {
										echo 'Order Received';
									} else if ($row['tracking_status'] == 2) {
										echo 'Order Reached Hub 1';
									} else if ($row['tracking_status'] == 3) {
										echo 'Order Reached Hub 2';
									} else if ($row['tracking_status'] == 4) {
										echo 'Order Delivered';
									} else if ($row['tracking_status'] == 5) {
										echo 'Canceled';
									} ?>
								</div>
								<div class="col"> <strong>Requested Date:</strong>
									<br><?php echo $row['date_updated']; ?>
								</div>
							</div>
							<div class="card-body rows" style="display:flex; width:100%; justify-content: space-evenly;  margin: 30px 0;">

								<div class="col"> <strong>Weight:</strong>
									<br><?php echo $row['weight']; ?>
								</div>
								<div class="col"> <strong>Sender Mobile:</strong>
									<br><?php echo $row['sender_phone']; ?>
								</div>
								<div class="col"> <strong>Send Location</strong>
									<br>
									<?php
									$getLocation = getAllAreabyID($row['send_location']);
									$row2 = mysqli_fetch_assoc($getLocation);
									echo $row2['area_name'];
									?>
								</div>
								<div class="col"> <strong>End Location</strong>
									<br>
									<?php
									$getLocation = getAllAreabyID($row['end_location']);
									$row2 = mysqli_fetch_assoc($getLocation);
									echo $row2['area_name'];
									?>
								</div>
							</div>
						</article>
						<?php if ($row['tracking_status'] != 5) { ?>
							<div class="track">

                            <div class="step <?php if ($row['tracking_status'] == 1 || $row['tracking_status'] == 2 || $row['tracking_status'] == 3 || $row['tracking_status'] == 4) {
														echo 'active';
													} ?>">
									<span class="icon"> <i class="fa fa-check"></i> </span>
									<span class="text">Order Received</span>
								</div>
								<div class="step <?php if ($row['tracking_status'] == 2 || $row['tracking_status'] == 3 || $row['tracking_status'] == 4) {
														echo 'active';
													} ?>">
									<span class="icon"> <i class="fa fa-truck"></i> </span>
									<span class="text">Order Reached Hub 1</span>
								</div>
								<div class="step <?php if ($row['tracking_status'] == 3 || $row['tracking_status'] == 4) {
														echo 'active';
													} ?>">
									<span class="icon"> <i class="fa fa-truck"></i> </span>
									<span class="text">Order Reached Hub 2</span>
								</div>
								<div class="step <?php if ($row['tracking_status'] == 4) {
														echo 'active';
													} ?>">
									<span class="icon"> <i class="fa fa-box"></i> </span>
									<span class="text">Order Delivered</span>
								</div>
							</div>
						<?php } ?>
						<hr>
						<div class="rows" style="display:flex; width:100%; justify-content: space-evenly; margin: 30px 0; font-weight:bolder;">


							<div class="col-md-5">
								<label for="tracking_status" class="form-label">Order Status</label>
								<select onchange='updateDataFromHome(this, "<?php echo $request_id; ?>","tracking_status", "request", "request_id")' id="tracking_status <?php echo $request_id; ?>" class='form-control norad tx12' name="tracking_status" type='text' style="margin:5px 10px; font-size: 17px; font-weight:bold; border-radius:5px; border-color: grey;  " > 
                                <option value="1">Please Select</option>
                                                <option value="5" <?php if ($row['tracking_status'] == "5") echo "selected"; ?>>
                                                    Canceled
                                                </option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="tracking_status" class="form-label">Order Delete : </label>
								<button type="button" onclick="deleteData(<?php echo $row['request_id']; ?>,'request', 'request_id')" class="btn btn-darkblue"> <i class="fa-solid fa-trash" style="font-size:15px; position:relative; line-height=0;"></i>
								</button>
							</div>

                            <div class="col-md-4">
								<label for="tracking_status" class="form-label">Order Current Location : </label>
								<button style="background:#435ebe; color:white;" onclick="show_hide_location(<?php echo $row['request_id'];  ?>)" type="button" name="view_location" class="btn btn-darkblue">
									<?php if ($row['tracking_status'] == 1) {
										echo 'Order Received';
									} else if ($row['tracking_status'] == 2) {
										echo 'Order Reached Hub 1';
									} else if ($row['tracking_status'] == 3) {
										echo 'Order Reached Hub 2';
									} else if ($row['tracking_status'] == 4) {
										echo 'Order Delivered';
									} else if ($row['tracking_status'] == 5) {
										echo 'Canceled';
									} ?> 
								</button>
							</div>

						</div>
					</div>
                    <div class="location" id="<?php echo $row['request_id'];  ?>" style="display:none; justify-content:center;padding:10px;">
					<?php
								include 'server/inc/connection.php';
								$start_location = $row['send_location'];
								$end_location = $row['end_location'];
								$sql_route = "SELECT * FROM route WHERE start_id = '$start_location' AND end_id = '$end_location'";
								$result_route = $con->query($sql_route);
								if($result_route->num_rows>0){
									while($row_route = $result_route->fetch_assoc()){
										if ($row['tracking_status'] == 1) {
											echo $row_route['1'];
										} else if ($row['tracking_status'] == 2) {
											echo $row_route['2'];
										} else if ($row['tracking_status'] == 3) {
											echo $row_route['3'];
										} else if ($row['tracking_status'] == 4) {
											echo $row_route['4'];
										} else if ($row['tracking_status'] == 5) {
											echo $row_route['5'];
									}
								}
							}
								?>
								</div>
				</article>
			<?php } }?>
		</div>
	<!-- CONTENT -->
	
	<!-- ionicons -->

	<script>
		function show_hide_location(id) {
  var x = document.getElementById(id);
  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}
	</script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	<script src="next.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    button{
        padding:10px;
        border: none;
        border-radius: 5px;;
    }
    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #2c3e50
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #2c3e50;
        color: #fff
    }

    .track .step.active .icon i{
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.rows,
    ul. s-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    .btn-warning {
        color: #ffffff;
        background-color: #2c3e50;
        border-color: #2c3e50;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px
    }
</style>

    <?php
include('./components/footer.php');
?>