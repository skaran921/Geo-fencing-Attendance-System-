<?php include "./checkSession.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Locations - Admin Panel</title>            
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
    <body onload="getLocationData()">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
             <?php include "./header.php";?>    

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a></li>                    
                    <li class="active">Locations</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap container">
                            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                                        <i class="fa fa-road"></i>
                                        Shortcut's
                            <span style="float:right;margin-right:10px;">
                              <a href="javascript:void(0)" onclick="window.open('./addLocation.php','_blank')" class="text-decoration:none;" title="Add New Employee" data-toggle="tooltip" data-placement="bottom">
                                <i class="fa fa-plus" style="color:#fff;font-size:20px;"></i>                                  
                              </a>
                            </span>

                            </span>
                  <div class="row"><!---row--->                         
                        <div class="col-md-12"><!---col--->                            
                                <div id="locationsData">   
                                  
                                <div class="table-responsive table-striped table-hoverable" style="padding-bottom: 60px;"><!---table-responsive--->  
  <!--table -->
  <table id="myTable" class=" table table-bordered">
    <thead>
              <th></th>
              <th>Google Chrome</th>
              <th>Firefox</th>
              <th>Internet Explorer</th>              
              <th>Opera</th>              
              <th>Safari</th>              
                                 
    </thead>
    <tbody>

        <tr>
           <th>Dashboard</th>
           <td> <kbd>Alt</kbd> + <kbd>1</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>1</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>1</kbd> </td>
        </tr>

        <tr>
           <th>Employee</th>
           <td> <kbd>Alt</kbd> + <kbd>2</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>2</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>2</kbd> </td>
        </tr>

        <tr>
           <th>Holiday's</th>
           <td> <kbd>Alt</kbd> + <kbd>H</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>H</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>H</kbd> </td>
        </tr>

        <tr>
           <th>Location's</th>
           <td> <kbd>Alt</kbd> + <kbd>L</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>L</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>L</kbd> </td>
        </tr>
       
        <tr>
           <th>Geofencing</th>
           <td> <kbd>Alt</kbd> + <kbd>G</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>G</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>G</kbd></td>
        </tr>

        <tr>
           <th>Today Attendance Detail's</th>
           <td> <kbd>Alt</kbd> + <kbd>A</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>A</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>A</kbd></td>
        </tr>

        <tr>
           <th>Messages</th>
           <td> <kbd>Alt</kbd> + <kbd>M</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>M</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>M</kbd></td>
        </tr>

        <tr>
           <th>Change Themes</th>
           <td> <kbd>Alt</kbd> + <kbd>T</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>T</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>T</kbd></td>
        </tr>

        <tr>
           <th>Edit Profile</th>
           <td> <kbd>Alt</kbd> + <kbd>P</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>P</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>P</kbd></td>
        </tr>

        <tr>
           <th>Change Password</th>
           <td> <kbd>Alt</kbd> + <kbd>C</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>C</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>C</kbd></td>
        </tr>

        <tr>
           <th>Shortcut's</th>
           <td> <kbd>Alt</kbd> + <kbd>S</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>S</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>S</kbd></td>
        </tr>

        <tr>
           <th>Back</th>
           <td> <kbd>Alt</kbd> + <kbd>B</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>B</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>B</kbd></td>
        </tr>

        <tr>
           <th>Forward</th>
           <td> <kbd>Alt</kbd> + <kbd>N</kbd> </td>
           <td><kbd>Shift</kbd> + <kbd>Alt</kbd> + <kbd>N</kbd></td>
           <td colspan="3"> <kbd>Alt</kbd> + <kbd>N</kbd></td>
        </tr>
        
    </tbody>
  </table><!---table end--->  
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
       
     </body>
</html>







