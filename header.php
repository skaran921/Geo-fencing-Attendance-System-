<style>

</style>
<link rel="stylesheet" href="scrollBar.css">
<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation" style="color:#111;height:100vh">
                    <li class="xn-logo">
                        <a href="dashboard.php" style="background:#00c07f">
						  Dashboard
						</a>
			           
	
                        <a href="#" class="x-navigation-control bg-danger"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="./admin/employee/<?php echo getEmpImage($_SESSION["emp_id"]);?>" alt="<?php echo getEmpName($_SESSION["emp_id"]);?>"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="./admin/employee/<?php echo getEmpImage($_SESSION["emp_id"]);?>" alt="<?php echo getEmpName($_SESSION["emp_id"]);?>"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo getEmpName($_SESSION["emp_id"]);?></div>
                                <div class="profile-data-title"><?php echo getEmpPosition($_SESSION["emp_id"]);?></div>
                            </div>
                            <div class="profile-controls">  
                                <a href="./info.php" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="./messages.php" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
            
                    <li class="active">
                        <a href="./dashboard.php" accesskey="1"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li> 

                    <li>
                        <a href="./attendanceMark.php" accesskey="A"><span class="fa fa-check"></span> <span class="xn-text">Attendance Mark</span></a>                        
                    </li> 
                                       
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-list-alt"></span> <span class="xn-text">Attendance</span></a>
                        <ul>
                            <li><a href="./todayAttendance.php"><span class="fa fa-list-alt"></span> Today Attendance Report</a></li>                           
                            <li><a href="./monthlyAttendance.php"><span class="fa fa-list-alt"></span>Current Month Attendance Report</a></li>                           
                            <li><a href="./monthWiseAttendance.php"><span class="fa fa-list-alt"></span>Month Wise Attendance Report</a></li>                           
                            <li><a href="./periodAttendance.php"><span class="fa fa-list-alt"></span> Attendance Report For a Period</a></li>                                             
                        </ul>     
                    </li>  
                    
                    <li>
                         <a href="./messages.php" accesskey="M"><span class="fa fa-envelope"></span> <span class="xn-text"> Messages</span></a>
                    </li>
                                                              
                    
                    <li>
                         <a href="./theme.php" accesskey="0"><span class="fa fa-dashboard"></span> <span class="xn-text">Themes</span></a>
                    </li>
                    
                    <li>
                        <a href="editProfile.php" accesskey="P"><span class="fa fa-edit"></span> <span class="xn-text">Edit Profile</span></a>
                    </li>
                    <li >
                         <a href="changePassword.php" accesskey="C"><span class="fa fa-lock"></span><span class="xn-text"> Change Password</span></a>
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
                        <div class="informer informer-danger"><?php echo getTotalMessage($_SESSION["emp_id"]);?></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger"><?php echo getTotalMessage($_SESSION["emp_id"]);?> New</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                
                                 <?php 
                                    getMessages($_SESSION["emp_id"]);
                                 ?>
                               
                               
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="./messages.php" onclick="setSeenMessage()">Show all messages</a>
                            </div> 
<!-- ------ script ------- -->
<script> 
     function setSeenMessage(){
         $.ajax({
             url:"setSeenMessages.php?emp_id=<?php echo $_SESSION['emp_id'];?>",                
         });
     }
</script>      
<!-- ------ script end------- -->

                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->      

                
                <!-- histroy back -->
                <input type="button" style="display:none;" accesskey="b" onclick="window.history.back();">
                <!-- histroy back -->
                 <!-- histroy forward -->
                 <input type="button" style="display:none;" accesskey="n" onclick="window.history.forward();">
                <!-- histroy forward -->


                <style>
                    select{
                        -webkit-appearance: menulist;
                    }
                </style>