<?php
include('./components/header.php');
?>
         <!-- MAIN -->
         <main>
             <div class="head-title">
                 <div class="left">
                     <h1>Price Table</h1>
                     <ul class="breadcrumb">
                         <li>
                             <a href="#">Dashboard</a>
                         </li>
                         <li><i class='bx bx-chevron-right' ></i></li>
                         <li>
                             <a class="active" href="#">Price Table</a>
                         </li>
                     </ul>
                 </div>
                 <div class="col-lg-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PriceModal"> Add
                        New</button>
                </div>
                 <!-- <a href="#" class="btn-download">
                     <i class='bx bxs-cloud-download' ></i>
                     <span class="text">Download PDF</span>
                 </a> -->
             </div>
 
         </main>
         <!-- MAIN -->

         <div >
            <section >
                <div class="tabular--wrapper">
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Start Area</th>
                                    <th>End Area</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th></th>
    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getall = getAllPrice();
    
                                while ($row = mysqli_fetch_assoc($getall)) {
    
                                    $price_id = $row['price_id']; ?>
    
    
                                    <tr>
                                        <td><select onchange="updateData(this, '<?php echo $price_id; ?>', 'start_area', 'price_table', 'price_id');" id="start_area <?php echo $price_id; ?>" class='form-control norad tx12' name="start_area" type='text'>
                                                <?php
                                                $getallCat = getAllArea();
                                                while ($row2 = mysqli_fetch_assoc($getallCat)) { ?>
    
                                                    <option value="<?php echo $row2['area_id']; ?>" <?php if ($row['start_area'] == $row2['area_id']) echo "selected"; ?>>
                                                        <?php echo $row2['area_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
    
                                        <td><select onchange="updateData(this, '<?php echo $price_id; ?>', 'end_area', 'price_table', 'price_id');" id="end_area <?php echo $price_id; ?>" class='form-control norad tx12' name="end_area" type='text'>
                                                <?php
                                                $getallCat = getAllArea();
                                                while ($row2 = mysqli_fetch_assoc($getallCat)) { ?>
    
                                                    <option value="<?php echo $row2['area_id']; ?>" <?php if ($row['end_area'] == $row2['area_id']) echo "selected"; ?>>
                                                        <?php echo $row2['area_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
    
                                        <td>
                                            <input type="number" id="price" name="price" required="required" onchange="updateData(this, '<?php echo $price_id; ?>', 'price', 'price_table', 'price_id');" value="<?php echo $row['price']; ?>" class="form-control col-md-7 col-xs-12">
                                        </td>
                                        <td><?php echo $row['date_updated']; ?></td>
                                        <td>
    
                                            <button type="button" onclick="deleteData(<?php echo $row['price_id']; ?>, 'price_table', 'price_id')" class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
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

     <div class="modal fade" id="PriceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Price List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    <div class="modal-body bg-white">
                        <form action="" method="post" id="basicform" data-parsley-validate="">

                            <div class="col-md-12 mt-2">
                                <label for="start_area" class="form-label">Start Area</label>
                                <select id="start_area" class='form-control norad tx12' name="start_area" type='text'>
                                    <?php $getall = getAllArea();
                                    while ($row = mysqli_fetch_assoc($getall)) { ?>
                                        <option value="<?php echo $row['area_id'] ?>">
                                            <?php echo $row['area_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="end_area" class="form-label">End Area</label>
                                <select id="end_area" class='form-control norad tx12' name="end_area" type='text'>
                                    <?php $getall = getAllArea();
                                    while ($row = mysqli_fetch_assoc($getall)) { ?>
                                        <option value="<?php echo $row['area_id'] ?>">
                                            <?php echo $row['area_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="addPrice(this.form)" name="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

 
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 
     <script src="next.js"></script>
 </body>
 </html>    