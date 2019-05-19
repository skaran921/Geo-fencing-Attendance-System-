<?php include "./checkSession.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Dashboard - Employee Panel</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />        
        <link rel="icon" href="./logo.jpg" type="image/x-icon" />
        <!-- END META SECTION -->
                
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="./admin/css/<?php getTheme();?>"/>
        <!-- EOF CSS INCLUDE -->    

        <!-- alertify plugin -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
</head>
<body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
             <?php include "./header.php";?>    

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a></li>          
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->                    
                    <div class="row">
                    <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-info widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                                        
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                       
                        <div class="col-md-3" >
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='./messages.php';" style="color:#fff;background:#9C27B0;">
                                <div class="widget-item-left">
                                    <span class="fa fa-envelope"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo getTotalMessage($_SESSION["emp_id"]);?></div>
                                    <div class="widget-title">New messages</div>
                                    <div class="widget-subtitle" style="color:#fff;background:#9C27B0;">In your mailbox</div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                       

                        <!-- getNextHolidayDetails -->
                           <?php getNextHolidayDetail();?>
                        <!-- getNextHolidayDetails -->

                         <!-- getNextBirthdayDetail -->
                         <?php getNextBirthdayDetail();?>
                        <!-- getNextBirthdayDetail -->

                        <div class="col-md-3">
                            
                            <!-- START WIDGET checkintime -->
                            <div class="widget widget-default widget-item-icon" style="background:#2ecc71;color:#fff;" onclick="location.href='#';">
                                <div class="widget-item-left">
                                    <span class="fa fa-clock-o" style="color:#fff;"></span>
                                </div>                             
                                <div class="widget-data" style="color:#fff;">
                                    <div class="widget-int num-count"><?php echo getLastCheckInTime ($_SESSION["emp_id"]);?></div>
                                    <div class="widget-title">Check-In Time</div>                                   
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET checkintime -->
                            
                        </div>

                        <div class="col-md-3">
                            
                            <!-- START WIDGET checkOuttime -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='#';" style="background:#FF3E4D;color:#fff;">
                                <div class="widget-item-left">
                                    <span class="fa fa-clock-o"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo getLastCheckOutTime ($_SESSION["emp_id"]);?></div>
                                    <div class="widget-title">Check-Out Time</div>                                   
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET checkOuttime -->
                            
                        </div>

                        <div class="col-md-3">
                            
                            <!-- START WIDGET  Assigned Location-->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='#';" style="background:#C4E538;color:#fff;">
                                <div class="widget-item-left">
                                    <span class="fa fa-map-marker"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"></div>
                                    <div class="widget-title" style="color:#fff">Assigned Location</div>
                                   <div class="widget-subtitle" style="font-weight:600px;color:#fff"><?php echo getAssignedLocation($_SESSION["emp_id"]);?></div>
                                   
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET Assigned Location -->
                            
                        </div>


                        <div class="col-md-3">
                            
                            <!-- START WIDGET Distance Limit -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='#';" style="background:#4834DF;color:#fff;">
                                <div class="widget-item-left">
                                    <span class="fa fa-road"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo getDistanceLimit($_SESSION["emp_id"])." Meter";?></div>
                                    <div class="widget-title">Distance Limit</div>                                   
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET cDistanceLimit -->
                            
                        </div>

                        <div class="col-md-3">
                            
                            <!-- START WIDGET Account created on Limit -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='#';" style="background:#30336B;color:#fff;">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">Join on</div>                                   
                                    <div class="widget-title"><?php echo getAccountCreatedOn($_SESSION["emp_id"]);?></div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET Account created on -->
                            
                        </div>

                        <div class="col-md-3">
                            
                            <!-- START WIDGET Account created on Limit -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='#';" style="background:#00303F;color:#fff;">
                                <div class="widget-item-left">
                                    <span class="fa fa-edit"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">Edit on</div>                                   
                                    <div class="widget-title"><?php echo getAccountUpdatedOn($_SESSION["emp_id"]);?></div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET Account created on -->
                            
                        </div>


                        <div class="col-md-3">
                            
                            <!-- START WIDGET theme Limit -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='#';" style="background:#FFC312;color:#fff;">
                                <div class="widget-item-left">
                                    <span class="fa fa-dashboard"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">Themes</div>                                   
                                    <div class="widget-title" style="font-size:30px">5</div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET theme -->
                        </div>

                        <div class="col-md-3">
                            
                            <!-- START WIDGET theme Limit -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='#';" style="background:#252523;color:#fff;">
                                <div class="widget-item-left">
                                    <span class="fa fa-info-circle"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">About</div>                                   
                                    <div class="widget-title">Designed and Develope By Karan Soni</div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET theme -->
                        </div>


                    </div>
                    <!-- END WIDGETS -->                    
                    
                   
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






    