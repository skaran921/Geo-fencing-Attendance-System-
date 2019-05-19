<?php include "./checkSession.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Info - Admin Panel</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />        
        <link rel="icon" href="./logo.jpg" type="image/x-icon" />
        <!-- END META SECTION -->
                
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="./admin/css/<?php getTheme();?>"/>
        <?php 
           include "./dataTableCSS.php";
        ?>

        <style>
            label{
                font-weight:900;
            }
        </style>

        <!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
             <?php include "./header.php";?>    

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a></li>                    
                    <li class="active">Info</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap container">
                            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                                     <i class="fa fa-info-circle"></i>  User Info                            
                            </span>
                  <div class="row"><!---row--->        
                       <?php
                        include "../db.php";
                        $emp_id=$_SESSION["emp_id"];
                        $sql="SELECT * FROM employee WHERE emp_id='$emp_id'";
                        $result=$conn->query($sql);
                        if($row=$result->fetch_assoc()){
                                ?>

                                <div class="col-md-3"><!---col--->  
                                    <div class="form-group">
                                        <label>Emp_ID:</label>
                                        <input type="text" style="color:#26ae60" class="form-control" value="<?php echo $row["emp_id"];?>" readonly disabled>
                                    </div>                           
                            </div><!---col--->

                            <div class="col-md-3"><!---col--->  
                               <div class="form-group">
                                  <label>Name:</label>
                                  <input type="text" style="color:#26ae60" class="form-control" value="<?php echo $row["emp_name"];?>" readonly disabled>
                               </div>                           
                            </div><!---col--->

                            <div class="col-md-3"><!---col--->  
                               <div class="form-group">
                                  <label>Email:</label>
                                  <input type="text" style="color:#26ae60" class="form-control" value="<?php echo $row["emp_email"];?>" readonly disabled>
                               </div>                           
                            </div><!---col--->

                            <div class="col-md-3"><!---col--->  
                               <div class="form-group">
                                  <label>Designation:</label>
                                  <input type="text" style="color:#26ae60" class="form-control" value="<?php echo $row["emp_position"];?>" readonly disabled>
                               </div>                           
                            </div><!---col--->
                        </div> 


                        <div class="row" style="margin-top:10px">

                             <div class="col-md-3"><!---col--->  
                               <div class="form-group">
                                  <label>DOB:</label>
                                  <input type="text" style="color:#26ae60" class="form-control" value="<?php echo date('d-m-Y',strtotime($row["emp_dob"]));?>" readonly disabled>
                               </div>                           
                            </div><!---col--->

                            <div class="col-md-3"><!---col--->  
                               <div class="form-group">
                                  <label>Joining Date:</label>
                                  <input type="text" style="color:#26ae60" class="form-control" value="<?php echo date('d-m-Y',strtotime($row["emp_joining_date"]));?>" readonly disabled>
                               </div>                           
                            </div><!---col--->

                            <div class="col-md-3"><!---col--->  
                               <div class="form-group">
                                  <label>Profile Created On:</label>
                                  <input type="text" style="color:#26ae60" class="form-control" value="<?php echo date('d-m-Y',strtotime($row["cid"]));?>" readonly disabled>
                               </div>                           
                            </div><!---col--->

                            <div class="col-md-3"><!---col--->  
                               <div class="form-group">
                                  <label>Profile Updated On:</label>
                                  <input type="text" style="color:#26ae60" class="form-control" value="<?php echo date('d-m-Y',strtotime($row["uid"]));?>" readonly disabled>
                               </div>                           
                            </div><!---col--->
                                <?php 
                        }else{
                            ?>
                            <center>
                                <h3>Sorry Data Not Found!!!</h3>
                            </center>
                            <?php 
                        }
                       ?>                         
                  </div><!---row end--->                                
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="./logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
        <?php include "./preload.php";?>
        <?php include "./mainScripts.php";?>
  </body>
</html>

<?php
           include "./dataTableScript.php";
?>






