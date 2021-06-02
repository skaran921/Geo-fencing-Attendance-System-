 <!-- if employee id set -->
 <?php
    if (isset($_GET["project_id"])) {
        $project_id = $_GET["project_id"];
        $sql1 = "SELECT * FROM projects WHERE project_id='$project_id'";
        include "./db.php";
        $result1 = $conn->query($sql1);
        //  if record exist
        if ($row = $result1->fetch_assoc()) {
    ?>
         <!-- employee detail  -->
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
                             <input type="hidden" name="project_id" id="project_id" value="<?php echo $row["project_id"]; ?>" required>
                             <div class="form-group">
                                 <!--location id -->
                                 <label>Project Name:</label>
                                 <input type="text" name="project_name" value="<?php echo $row["project_name"] ?>" id="project_name" class="form-control" placeholder="Project Name" required autofocus>
                             </div>
                         </div>
                         <!--col1 inside row---->

                         <div class="col-md-12">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <label>Project Start Date:(mm-dd-yyyy)</label>
                                 <input type="date" name="project_start_date" id="project_start_date" value="<?php echo $row["project_start_date"]; ?>" class="form-control" placeholder="Project Start Date" required>
                             </div>
                         </div>
                         <!--col3 inside row---->

                         <div class="col-md-12">
                             <!--col3 inside row---->
                             <div class="form-group">
                                 <label>Project End Date:(mm-dd-yyyy)</label>
                                 <input type="date" name="project_end_date" id="project_end_date" value="<?php echo $row["project_end_date"]; ?>" class="form-control" placeholder="Location Address" required>
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
                     <button type="submit" name="edit" style="background:#000066"> <span class="fa fa-save"></span> Update</button>
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