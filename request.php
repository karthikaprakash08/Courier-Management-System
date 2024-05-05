<?php
include('components/header.php');
include 'auth.php';
?>
<div class="courier-request">
<h1 class="request-heading">Courier Request Form</h1>
    <!-- <form method="post"  id="courier-request-form">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="sender_phone" required>

        <label for="package-weight">Package Weight (kg):</label>
        <input type="number" id="weight" name="weight" step="0.01" required>

        <label class="text-black" for="fname">Sending Location</label>
                                        <select id="send_location" class='form-control norad tx12' name="send_location" type='text'>
                                            <option>Please Select</option>
                                            <?php $getall = getAllArea();
                                            while ($row = mysqli_fetch_assoc($getall)) { ?>
                                                <option value="<?php echo $row['area_id'] ?>">
                                                    <?php echo $row['area_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>

        <label class="text-black" for="fname">Pick Up Location</label>
                                        <select id="end_location" onchange="calculation(this)" class='form-control norad tx12' name="end_location" type='text'>
                                            <option>Please Select</option>
                                            <?php $getall = getAllArea();
                                            while ($row = mysqli_fetch_assoc($getall)) { ?>
                                                <option value="<?php echo $row['area_id'] ?>">
                                                    <?php echo $row['area_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>

        <div>
                                        <label class="text-black" for="email">Shipping details</label>

                                        <div>
                                            <div class="col-md-6">
                                                Price :
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" disabled name="total" id="total" class="form-control">
                                                <input type="hidden" name="total_fee" id="total_fee" class="form-control">
                                                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $_SESSION['customer']; ?>" class="form-control">
                                            </div>
                                        </div>

                                    </div>
        
                                    <h4 class="mt-5">Receiver Details</h4>
                        <div class="mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="res_name">Receiver Name</label>
                                        <input type="text" name="res_name" id="res_name" class="form-control">
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="res_phone">Phone Number</label>
                                        <input type="text" name="res_phone" id="res_phone" class="form-control">
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="red_address">Receiver Address</label>
                                <textarea name="red_address" id="red_address" cols="30" rows="7" class="form-control"></textarea>
                            </div>
                        </div>

                    
        <button onclick="addRequest(this.form)" type="request_submit">Submit</button>
    </form> -->
    <style>
        form{
            padding: 10px 30%;
        }
        input, select{
            padding: 10px;
            margin: 10px 0;
        }
        .btn{
            background-color:#0000ff;
            border: none;
            border-radius: 5px;
            padding: 20px;
            color: white;
            font-size: 20px ;
            font-weight: bolder ;
        }

        </style>
    <form action="#" class="courier-request-form" method="post" style="display:flex; flex-direction: column; width: 100%;">


                        <h4>Sending Details</h4>
                                        <label class="text-black" for="send_phone">Phone Number</label>
                                        <input type="text" name="sender_phone" id="sender_phone" class="form-control">

                            
                                        <label class="text-black" for="weight">Weight</label>
                                        <input type="number" name="weight" id="weight" class="form-control">
                             
                                        <label class="text-black" for="fname">Sending Location</label>
                                        <select id="send_location" class='form-control norad tx12' name="send_location" type='text'>
                                            <option>Please Select</option>
                                            <?php $getall = getAllArea();
                                            while ($row = mysqli_fetch_assoc($getall)) { ?>
                                                <option value="<?php echo $row['area_id'] ?>">
                                                    <?php echo $row['area_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                             
                                        <label class="text-black" for="fname">Pick Up Location</label>
                                        <select id="end_location" onchange="calculation(this)" class='form-control norad tx12' name="end_location" type='text'>
                                            <option>Please Select</option>
                                            <?php $getall = getAllArea();
                                            while ($row = mysqli_fetch_assoc($getall)) { ?>
                                                <option value="<?php echo $row['area_id'] ?>">
                                                    <?php echo $row['area_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                             
                                        <label class="text-black" for="email">Shipping details</label>

                                            <div class="col-md-6">
                                                Price :
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" disabled name="total" id="total" class="form-control">
                                                <input type="hidden" name="total_fee" id="total_fee" class="form-control">
                                                <input type="hidden" name="customer_id" id="customer_id" value=" <?php echo $_SESSION['customer']; ?>" class="form-control">
                                            </div>

                        <h4 class="mt-5">Receiver Details</h4>
                        
                                        <label class="text-black" for="res_name">Receiver Name</label>
                                        <input type="text" name="res_name" id="res_name" class="form-control">
                        
                                        <label class="text-black" for="res_phone">Phone Number</label>
                                        <input type="text" name="res_phone" id="res_phone" class="form-control">
                        


                                <label class="text-black" for="red_address">Receiver Address</label>
                                <textarea name="red_address" id="red_address" cols="30" rows="7" class="form-control"></textarea>

                                <input type="button" onclick="addRequest(this.form)" value="Send Request" class="btn btn-primary py-2 px-4 text-white">
                    </form>
</div>
 
    <?php
include('./components/footer.php');
?>