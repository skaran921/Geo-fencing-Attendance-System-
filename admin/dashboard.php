<?php include "./checkSession.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Dashboard - Admin Panel</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />        
        <link rel="icon" href="./logo.jpg" type="image/x-icon" />
        <!-- END META SECTION -->
                
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/<?php getTheme();?>"/>
        <!-- EOF CSS INCLUDE -->                                    
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
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
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
                        
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='./messages.php';">
                                <div class="widget-item-left">
                                    <span class="fa fa-envelope"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo getTotalMessage($_SESSION["admin_id"]);?></div>
                                    <div class="widget-title">New messages</div>
                                    <div class="widget-subtitle">In your mailbox</div>
                                </div>      
                               
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='./employee.php';">
                                <div class="widget-item-left">
                                    <span class="fa fa-users"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo getTotalEmployee($_SESSION["admin_id"]); ?></div>
                                    <div class="widget-title">Registred Employee</div>
                                    <!-- <div class="widget-subtitle">On your website</div> -->
                                </div>                                                          
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>

                        <!-- getNextHolidayDetails -->
                           <?php getNextHolidayDetail();?>
                        <!-- getNextHolidayDetails -->

                         <!-- getNextBirthdayDetail -->
                         <?php getNextBirthdayDetail();?>
                        <!-- getNextBirthdayDetail -->

                        <div class="col-md-3">
                            
                            <!-- START WIDGET TotalLocation -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='./locations.php';">
                                <div class="widget-item-left">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo getTotalLocation(); ?></div>
                                    <div class="widget-title">Total Location's</div>
                                    <!-- <div class="widget-subtitle">On your website</div> -->
                                </div>
                                       
                            </div>                            
                            <!-- END WIDGET TotalLocation -->
                            
                        </div>

                        <div class="col-md-3">
                            
                            <!-- START WIDGET TotalLocation -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='./locations.php';">
                                <div class="widget-item-left">
                                    <span class="fa fa-users"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo getTotlalPresentEmployee(); ?></div>
                                    <div class="widget-title">Present Employee</div>
                                    <!-- <div class="widget-subtitle">On your website</div> -->
                                </div>
                                       
                            </div>                            
                            <!-- END WIDGET TotalLocation -->
                            
                        </div>

                        <div class="col-md-3">
                            
                            <!-- START WIDGET TotalLocation -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-users"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo getTotalEmployee($_SESSION["admin_id"])-getTotlalPresentEmployee(); ?></div>
                                    <div class="widget-title">Absent Employee</div>
                                    <!-- <div class="widget-subtitle">On your website</div> -->
                                </div>
                                       
                            </div>                            
                            <!-- END WIDGET TotalLocation -->
                            
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






