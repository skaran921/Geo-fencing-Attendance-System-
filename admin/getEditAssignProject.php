 <!-- if employee id set -->
 <?php
    if (isset($_GET["emp_project_matrix_id"])) {
        $emp_project_matrix_id = $_GET["emp_project_matrix_id"];
        $sql1 = "SELECT *, emp_project_matrix.id As emp_project_matrix_id
                 FROM emp_project_matrix
                 left join employee on emp_project_matrix.emp_id=employee.emp_id
                 left JOIN projects on emp_project_matrix.project_id=projects.project_id  WHERE emp_project_matrix.id='$emp_project_matrix_id'";
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
                                 <input type="hidden" name="emp_project_matrix_id" id="emp_project_matrix_id" value="<?php echo $row['id']; ?>" required>
                                 <label>Select Project:</label>
                                 <select name="project_id" id="project_id" class="form-control" placeholder="Project Name" style="cursor:pointer;-webkit-appearance:menulist;" required autofocus>

                                     <option value="">Select Project</option>
                                     <?php
                                        include "./db.php";
                                        $sql1 = "SELECT project_id,project_name FROM projects WHERE status='Active'";
                                        $result1 = $conn->query($sql1);
                                        while ($row1 = $result1->fetch_assoc()) {
                                        ?>
                                         <option value="<?php echo $row1['project_id']; ?>"><?php echo $row1['project_name']; ?></option>
                                     <?php
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
                                 <label>Select Employee:</label>
                                 <select name="emp_id" id="emp_id" class="form-control" placeholder="Project Name" style="cursor:pointer;-webkit-appearance:menulist;" required autofocus>
                                     <option value="">Select Employee</option>
                                     <?php
                                        include "./db.php";
                                        $sql2 = "SELECT emp_id,emp_name FROM employee WHERE status='Active'";
                                        $result2 = $conn->query($sql2);
                                        while ($row2 = $result2->fetch_assoc()) {
                                        ?>
                                         <option value="<?php echo $row2['emp_id']; ?>"><?php echo $row2['emp_name']; ?></option>
                                     <?php
                                        }
                                        ?>
                                 </select>
                             </div>
                         </div>
                         <!--col2 inside row---->

                         <div class="col-md-12">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <label>Start Date:</label>
                                 <input type="date" name="start_date" value="<?php echo $row['start_date']; ?>" id="start_date" class="form-control" placeholder="Project Start Date" required>
                             </div>
                         </div>
                         <!--col3 inside row---->

                         <div class="col-md-12">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <label>End Date:</label>
                                 <input type="date" name="end_date" value="<?php echo $row['end_date']; ?>" id="end_date" class="form-control" placeholder="Location Address" required>
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