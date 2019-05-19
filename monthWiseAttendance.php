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
                    <li class="active">Month Wise Attendance Report</li>          
                </ul>
                <!-- END BREADCRUMB -->                       
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                      <form action="viewMonthWiseAttendanceRecord.php" method="post">
                            <div class="row"><!--row-->
                                <div class="col-md-3"><!--col-->
                                    <div class="form-group">
                                          <label>Select Month:</label>
                                          <select name="month_id" id="month_id" class="form-control" style="cursor:pointer;-webkit-appearance: menulist;" required>
                                              <option value="">Select A Month</option>
                                              <option value="1">Jan</option>
                                              <option value="2">Feb</option>
                                              <option value="3">Mar</option>
                                              <option value="4">Apr</option>
                                              <option value="5">May</option>
                                              <option value="6">Jun</option>
                                              <option value="7">Jul</option>
                                              <option value="8">Aug</option>
                                              <option value="9">Sep</option>
                                              <option value="10">Oct</option>
                                              <option value="11">Nov</option>
                                              <option value="12">Dec</option>
                                          </select>

                                          <button type="submit" name="go" style="margin-top:4px;padding:6px;border:none;color:#fff;background:#000099;border-radius:4px;">
                                                    <i class="fa fa-search"></i> Get Attendance
                                          </button>
                                    </div><!---form-group--->
                                </div><!--col--->
                            </div> <!--row-->
                      </form>
                </div>

        <?php include "./preload.php";?>
        <?php include "./mainScripts.php";?>
     </body>
</html>






    