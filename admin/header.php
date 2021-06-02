<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="dashboard.php" style="background:#FF3031">Dashboard</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="images/<?php echo getAdminImage($_SESSION["admin_id"]);?>" alt="<?php echo getAdminName($_SESSION["admin_id"]);?>"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="images/<?php echo getAdminImage($_SESSION["admin_id"]);?>" alt="<?php echo getAdminName($_SESSION["admin_id"]);?>"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo getAdminName($_SESSION["admin_id"]);?></div>
                                <div class="profile-data-title"><?php echo getAdminName($_SESSION["admin_id"]);?></div>
                            </div>
                            <div class="profile-controls">  
                                <a href="./info.php" class="profile-control-left" data-toggle="modal" data-target="#myModal"><span class="fa fa-info"></span></a>
                                <a href="./messages.php" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>


            
                    <li class="active">
                        <a href="./dashboard.php"  accesskey="1"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li> 

                    <li>
                         <a href="./employee.php"  accesskey="2"><span class="fa fa-user"></span> <span class="xn-text">Employee</span></a>
                    </li> 

                    <li>
                         <a href="./Holidays.php" accesskey="H"><span class="fa fa-calendar"></span> <span class="xn-text">Holiday's</span></a>
                    </li> 

                    <li>
                         <a href="./locations.php" accesskey="L"><span class="fa fa-map-marker"></span> <span class="xn-text">Locations</span></a>
                    </li>  
                    <li>
                         <a href="./geofencing.php" accesskey="G"><span class="fa fa-location-arrow"></span> <span class="xn-text">Geofencing</span></a>
                    </li>    

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-o"></span> <span class="xn-text">Project</span></a>
                        <ul>
                            <li><a href="./projects.php"  accesskey="A"><span class="fa fa-file-o"></span> Projects</a></li>
                            <li><a href="./assignProjects.php"  accesskey="A"><span class="fa fa-file-o"></span>Assign Project</a></li>
                            <li><a href="./projectGeofencing.php"  accesskey="A"><span class="fa fa-file-o"></span>Project Geofencing</a></li>
                                                     
                        </ul>     
                    </li>  
                     
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-list-alt"></span> <span class="xn-text">Attendance</span></a>
                        <ul>
                            <li><a href="./todayAttendance.php"  accesskey="A"><span class="fa fa-calendar-o"></span> Today Attendance</a></li>                           
                            <li><a href="./monthlyAttendance.php"><span class="fa fa-calendar-o"></span>Current Month Attendance</a></li>                           
                            <li><a href="./monthWiseAttendance.php"><span class="fa fa-calendar-o"></span>Month Wise Attendance</a></li>                           
                            <li><a href="./attendanceBetweenPeriod.php"><span class="fa fa-trash-o"></span> Attendance Between Period</a></li>                          
                                                     
                        </ul>     
                    </li>  
                    
                    <li>
                         <a href="./messages.php" accesskey="M"><span class="fa fa-envelope"></span> <span class="xn-text"> Messages</span></a>
                    </li>
                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-archive"></span> <span class="xn-text">Archive</span></a>
                        <ul>
                            <li><a href="./employeeTrash.php"><span class="fa fa-archive"></span> Employee Archive</a></li>                           
                            <li><a href="./locationTrash.php"><span class="fa fa-archive"></span> Location Archive</a></li>                           
                            <li><a href="./geofencingTrash.php"><span class="fa fa-archive"></span> Geofencing Archive</a></li>                           
                            <li><a href="messageTrash.php"><span class="fa fa-archive"></span> Messages Archive</a></li>                           
                        </ul>     
                    </li>  


                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Settings</span></a>
                        <ul>
                            <li><a href="./theme.php" accesskey="T"><span class="fa fa-dashboard"></span> Themes</a></li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-user"></span> Profile</a>
                                <ul>
                                    <li><a href="./editProfile.php" accesskey="P"><span class="fa fa-edit"></span> Edit Profile</a></li>
                                    <li><a href="./changePassword.php"  accesskey="C"><span class="fa fa-lock"></span> Change Password</a></li>
                                </ul>
                            </li>
                        </ul>     
                    </li>  

                    <li>
                         <a href="./shortcut.php" accesskey="S"><span class="fa fa-road"></span> <span class="xn-text">Shortcut's</span></a>
                    </li>  

                     <li>
                         <a href="./help.php" accesskey="0"><span class="fa fa-question-circle"></span> <span class="xn-text">Help</span></a>
                    </li>  

                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger"><?php echo getTotalMessage($_SESSION["admin_id"]);?></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger"><?php echo getTotalMessage($_SESSION["admin_id"]);?> New</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                
                                 <?php 
                                    getMessages($_SESSION["admin_id"]);
                                 ?>
                               
                               
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="./messages.php" onclick="setSeenMessage()">Show all messages</a>
                            </div> 
<!-- ------ script ------- -->
<script> 
     function setSeenMessage(){
         $.ajax({
             url:"setSeenMessages.php?admin_id=<?php echo $_SESSION['admin_id'];?>",                
         });
     }
</script>      
<!-- ------ script end------- -->

                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                <a class="list-group-item" href="#">
                                    <strong>Phasellus augue arcu, elementum</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Aenean ac cursus</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                    </div>
                                    <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Lorem ipsum dolor</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Cras suscipit ac quam at tincidunt.</strong>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                                </a>                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->      
                <style>
                    select{
                        -webkit-appearance: menulist;
                    }
                </style>


                <!-- histroy back -->
                   <input type="button" style="display:none;" accesskey="b" onclick="window.history.back();">
                <!-- histroy back -->
                 <!-- histroy forward -->
                 <input type="button" style="display:none;" accesskey="n" onclick="window.history.forward();">
                <!-- histroy forward -->


