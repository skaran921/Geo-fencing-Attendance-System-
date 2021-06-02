 <!-- if employee id set -->
 <?php
    if (isset($_GET["emp_id"])) {
        $emp_id = $_GET["emp_id"];
        $sql1 = "SELECT * FROM employee WHERE emp_id='$emp_id'";
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
                     <!---col--->
                     <div class="row">
                         <!---inside sub row--->
                         <div class="col-md-12">
                             <!--col1 inside row---->
                             <div class="form-group">
                                 <!--location id -->
                                 <input type="hidden" name="emp_id" value="<?php echo $row['emp_id'] ?>">
                                 <label>Full Name:</label>
                                 <input type="text" name="emp_name" id="emp_name" value="<?php echo $row['emp_name'] ?>" class="form-control" placeholder="Admin Name" required>
                             </div>
                         </div>
                         <!--col1 inside row---->

                         <div class="col-md-12">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <label>Gender:</label>
                                 <select name="emp_gender" id="emp_gender" class="form-control" style="cursor:pointer" required>
                                     <option><?php echo $row["emp_gender"]; ?></option>
                                     <option value="">Select Gender</option>
                                     <option>Male</option>
                                     <option>Female</option>
                                 </select>
                             </div>
                         </div>
                         <!--col3 inside row---->

                         <div class="col-md-12">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <label>DOB:</label>
                                 <input type="date" name="emp_dob" id="emp_dob" value="<?php echo $row['emp_dob'] ?>" class="form-control" required>
                             </div>
                         </div>
                         <!--col3 inside row---->

                         <div class="col-md-12">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <label>Designation:</label>
                                 <input type="text" name="emp_position" id="emp_position" value="<?php echo $row['emp_position'] ?>" class="form-control" placeholder="Designation" required>
                             </div>
                         </div>
                         <!--col3 inside row---->

                         <div class="col-md-12">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <label>Mobile:</label>
                                 <input type="tel" name="emp_mobile" id="emp_mobile" value="<?php echo $row['emp_mobile'] ?>" class="form-control" placeholder="Mobile Number" required>
                             </div>
                         </div>
                         <!--col3 inside row---->

                         <div class="col-md-12" style="margin:2px;">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <img src="./admin/employee/<?php echo $row["image"]; ?>" alt="<?php echo $row["emp_name"]; ?>" class="img-fluid" style="width:60px;height:50px;border-radius:50%">
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

         <!-- modal start-->
         <div class="modal fade" id="myModal" role="modal">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header bg-primary" style="border-radius:0;">
                         <button type="button" class="close" style="color:#f00;border-radius:50%;background:#fff;width:20px;" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title" style="color:#fff;"><i class="fa fa-edit"></i> Update Profile Picture</h4>
                     </div>
                     <!---header--->

                     <div class="modal-body">
                         <form action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                 <label>Select New Image:</label>
                                 <input type="hidden" name="emp_id" value='<?php echo $row["emp_id"] ?>'>
                                 <input type="hidden" name="emp_email" value="<?php echo $row["emp_email"] ?>">
                                 <input type="file" name="newImage" id="newImage" class="form-control" required>
                             </div>

                             <center>
                                 <button type="submit" name="updateImage" style="color:#fff;background:#E71C23;border:0;padding:7px;border-radius:3px;font-size:14px;">
                                     <i class="fa fa-image"></i> Update Profile Picture
                                 </button>
                             </center>
                         </form>
                     </div>
                     <!---body--->
                 </div>
             </div>
         </div>
         <!-- modal end-->

 <?php
        } else {
            echo "<center><h1>Sorry No Record Found!!!</h1></center>";
        }
    }
    ?>