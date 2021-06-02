<?php include "./checkSession.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Geofencing Trash - Admin Panel</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />        
        <link rel="icon" href="./logo.jpg" type="image/x-icon" />
        <!-- END META SECTION -->
                
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/<?php getTheme();?>"/>
        <?php 
           include "./dataTableCSS.php";
        ?>

        <!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body onload="getAssignLocationTrashData()">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
             <?php include "./header.php";?>    

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a></li>                    
                    <li class="active">Geofencing Trash</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap container">
                            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                             <i class="fa fa-trash-o"></i>   Geofencing Trash Detail's
                            </span>
                  <div class="row"><!---row--->                         
                        <div class="col-md-12"><!---col--->                            
                                <div id="assignLocationTrashData">   
                               </div><!---table-responsive--->
                        </div><!---col--->
                  </div><!---row end--->                                
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->   
              <div id="data"></div>

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
        <script>
   function getAssignLocationTrashData(){
        $.ajax({
                url:"getAssignLocationTrash.php",
                success:function(data){
                    $("#assignLocationTrashData").html(data);
                }
        });  
   }    
  
        // delete employee
           function deleteAssignLocationTrash(assign_location_id){
                $.ajax({
                    url:"./deleteAssignLocationTrash.php?assign_location_id="+assign_location_id,
                    success:function(data){
                          if(data==="Success"){                                   
                             alertify.success("<span style='color:#fff;font-size:15px;'><i class='fa fa-check-circle'></i> Removed!!!</span>");
                             getAssignLocationTrashData();
                          }else if(data==="Error"){
                            alertify.error("<span style='color:#fff;font-size:15px;'><i class='fa fa-warning'></i> Oops Error!!!</span>"); 
                          }
                    }
                });
           }
        </script>
     </body>
</html>

<?php
           include "./dataTableScript.php";
?>






