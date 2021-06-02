 <!-- if employee id set -->
 <?php
   if (isset($_GET["location_id"])) {
      $location_id = $_GET["location_id"];
      $sql1 = "SELECT * FROM master WHERE id='$location_id'";
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
                         <button type="button" onclick="getMyCurrentLocation()"><i class="fa fa-map-marker"></i> Get My Current Location</button>
                      </div>
                   </div>

                   <div class="col-md-12">
                      <!--col1 inside row---->
                      <div class="form-group">
                         <!--location id -->
                         <input type="hidden" name="location_id" value="<?php echo $row['id'] ?>">
                         <label>Latitude:</label>
                         <input type="text" name="lat" id="lat" value="<?php echo $row['lat'] ?>" class="form-control" placeholder="Location Latitude" required autofocus>
                      </div>
                   </div>
                   <!--col1 inside row---->

                   <div class="col-md-12">
                      <!--col3 inside row---->
                      <div class="form-group">
                         <label>Longitude:</label>
                         <input type="text" name="lng" id="lng" value="<?php echo $row['longi'] ?>" class="form-control" placeholder="Location Longitude" required>
                      </div>
                   </div>
                   <!--col3 inside row---->

                   <div class="col-md-12">
                      <!--col3 inside row---->
                      <div class="form-group">
                         <label>Address:</label>
                         <textarea name="address" id="address" class="form-control" placeholder="Location Address" required><?php echo $row['address'] ?></textarea>
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