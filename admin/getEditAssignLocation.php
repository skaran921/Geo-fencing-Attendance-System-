 <!-- if employee id set -->
 <?php
    if (isset($_GET["assignLocation_id"])) {
        $assignLocation_id = $_GET["assignLocation_id"];
        $sql1 = "SELECT *,assign_location.id AS assign_location_id FROM assign_location left join employee on assign_location.emp_id=employee.emp_id INNER JOIN master on assign_location.location_id=master.id  WHERE assign_location.id='$assignLocation_id'";
        include "./db.php";
        $result1 = $conn->query($sql1);
        //  if record exist
        if ($row = $result1->fetch_assoc()) {
    ?>
         <form action="" method="post">
             <!-----------form start here------------->
             <div class="row bg-light">
                 <!---row--->

                 <div class="col-md-6">
                     <div class="row">
                         <div class="col-md-12">
                             <!--col1 inside row---->
                             <div class="form-group">
                                 <!--location id -->
                                 <input type="hidden" name="assignLocation_id" value="<?php echo $row['assign_location_id'] ?>">
                                 <label>Emp_ID:</label>
                                 <select name="emp_id" id="emp_id" class="form-control" required style="-webkit-appearance: menulist;cursor:pointer;">
                                     <option value="<?php echo $row['emp_id']; ?>"><?php echo $row['emp_name']; ?> (<?php echo $row['emp_id']; ?>)</option>
                                     <?php
                                        $sql1 = "SELECT emp_id,emp_name FROM employee WHERE status='Active' ORDER BY emp_name";
                                        $result1 = $conn->query($sql1);
                                        while ($row1 = $result1->fetch_assoc()) {
                                            echo "<option value='" . $row1["emp_id"] . "'>" . $row1["emp_name"] . " (" . $row1["emp_id"] . ")" . "</option>";
                                        }
                                        ?>
                                 </select>
                             </div>
                         </div>
                         <!--col1 inside row---->

                         <div class="col-md-12">
                             <!--col2 inside row---->
                             <div class="form-group">
                                 <label>Location:</label>
                                 <select name="location_id" id="location_id" class="form-control" required style="-webkit-appearance: menulist;cursor:pointer;">
                                     <option value="<?php echo $row['location_id'] ?>"><?php echo $row["address"]; ?></option>
                                     <?php
                                        $sql1 = "SELECT id,address FROM master WHERE status='Active' ORDER BY address";
                                        $result1 = $conn->query($sql1);
                                        while ($row1 = $result1->fetch_assoc()) {
                                            echo "<option value='" . $row1["id"] . "'>" . $row1["address"] . "</option>";
                                        }
                                        ?>
                                 </select>
                             </div>
                         </div>
                         <!--col2 inside row---->

                         <div class="col-md-12">
                             <!--col1 inside row---->
                             <div class="form-group">
                                 <!--location id -->
                                 <label>Distance Limt (Meter):</label>
                                 <input type="number" name="distance_limit" id="distance_limit" class="form-control" value="<?php echo $row['distance_limit']; ?>" required>
                             </div>
                         </div>
                         <!--col1 inside row---->

                     </div>
                     <!---row--->
                 </div>

                 <div class="col-md-6">
                     <!---col--->
                     <div class="row">
                         <!---inside sub row--->

                         <div class="col-md-12">
                             <!--col1 inside row---->
                             <div class="form-group">
                                 <label>Latitude:</label>
                                 <input type="text" value="<?php echo $row['lat'] ?>" class="form-control" placeholder="Location Latitude" required readonly disabled>
                             </div>
                         </div>
                         <!--col1 inside row---->

                         <div class="col-md-12">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <label>Longitude:</label>
                                 <input type="text" value="<?php echo $row['longi'] ?>" class="form-control" placeholder="Location Longitude" required readonly disabled>
                             </div>
                         </div>
                         <!--col3 inside row---->

                         <div class="col-md-12">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <label>Address:</label>
                                 <textarea class="form-control" placeholder="Location Address" required readonly disabled><?php echo $row['address'] ?></textarea>
                             </div>
                         </div>
                         <!--col3 inside row---->

                     </div>
                     <!---inside sub row--->

                 </div>
                 <!---main col1--->

             </div>
             <!---row end--->
             <center>
                 <div class="btns">
                     <button type="submit" name="edit" style="background:#000066"> <span class="fa fa-save"></span> Save</button>
                     <button type="reset" style="background:#45CE30"><span class="fa fa-refresh"></span> Reset</button>
                 </div>
             </center>
         </form>
         <!---form end here---------->
         <!-- END PAGE CONTENT WRAPPER -->

         </div>
         <!-- END PAGE CONTENT -->

 <?php
        } else {
            echo "<center><h1>Sorry No Record Found!!!</h1></center>";
        }
    }
    ?>