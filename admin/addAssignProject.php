<?php include "./checkSession.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Assign Project- Admin Panel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="./logo.jpg" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/<?php getTheme(); ?>" />
    <style>
        .form-control {
            background: #fff !important;
            height: 38px;
            font-size: 13px;
        }


        .form-control:focus {
            border: 1px solid #000066;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            color: #111;
            margin-top: 2px;
            font-size: 13px;
            font-weight: 650;
        }

        .btns {
            margin-top: 20px;
            word-spacing: 7px;
        }

        .btns button {
            padding: 10px;
            width: 100px;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 15px;
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.12);
        }

        .btns button:hover {
            transition: 0.6s ease-in;
            background: #E71C23 !important;
        }

        .col-md-6 button {
            width: 100%;
            margin-top: 20px;
            border: none;
            color: #fff;
            background: #E71C23;
            padding: 7px;
            border-radius: 4px;
            font-weight: 600;
        }

        .col-md-6 button:hover {
            background: #0ABDE3 !important;
        }

        button.updateImage:hover {
            background-color: #2ecc72 !important;
        }
    </style>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
    <!-- EOF CSS INCLUDE -->
</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <?php include "./header.php"; ?>

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="./dashboard.php">Dashboard</a></li>
            <li>Projects</li>
            <li class="active">Assign Project</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap container">
            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                <i class="fa fa-plus"></i> Assign Project
            </span>

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
                                <div class="form-group">
                                    <!--location id -->
                                    <label>Select Project:</label>
                                    <select name="project_id" id="project_id" class="form-control" placeholder="Project Name" style="cursor:pointer;-webkit-appearance:menulist;" required autofocus>
                                        <option value="">Select Project</option>
                                        <?php
                                        include "./db.php";
                                        $sql = "SELECT project_id,project_name FROM projects WHERE status='Active'";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $row['project_id']; ?>"><?php echo $row['project_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!--col2 inside row---->

                            <div class="col-md-12">
                                <!--col1 inside row---->
                                <div class="form-group">
                                    <!--location id -->
                                    <label>Select Employee:</label>
                                    <select name="emp_id" id="emp_id" class="form-control" placeholder="Project Name" style="cursor:pointer;-webkit-appearance:menulist;" required autofocus>
                                        <option value="">Select Employee</option>
                                        <?php
                                        include "./db.php";
                                        $sql = "SELECT emp_id,emp_name FROM employee WHERE status='Active'";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $row['emp_id']; ?>"><?php echo $row['emp_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!--col2 inside row---->

                            <div class="col-md-12">
                                <!--col3 inside row---->
                                <div class="form-group">
                                    <label>Start Date:</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Project Start Date" required>
                                </div>
                            </div>
                            <!--col3 inside row---->

                            <div class="col-md-12">
                                <!--col3 inside row---->
                                <div class="form-group">
                                    <label>End Date:</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Location Address" required>
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
                        <button type="submit" name="add" style="background:#000066"> <span class="fa fa-plus"></span> Add</button>
                        <button type="reset" style="background:#45CE30"><span class="fa fa-refresh"></span> Reset</button>
                    </div>
                </center>
            </form>
            <!---form end here---------->

        </div>
        <!-- END PAGE CONTAINER -->
        <!-- php start here -->

        <!---PHP End herer -->
        <!--- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press N o if you want to continue work. Press Yes to logout current user.</p>
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
        <?php include "./preload.php"; ?>
        <?php include "./mainScripts.php"; ?>

        <?php
        //    addd
        if (isset($_POST["add"])) {
            include "./db.php";
            $project_id = $_POST["project_id"];
            $emp_id = $_POST["emp_id"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $sql1 = "SELECT id FROM emp_project_matrix WHERE emp_id='$emp_id' AND project_id='$project_id'";
            $result1 = $conn->query($sql1);
            if ($row = $result1->fetch_assoc()) {
        ?>
                <script>
                    alertify.error("<span style='color:#fff;font-size:15px;'><i class='fa fa-warning'></i> Project Already Assigned To This Employee!!!</span>");
                </script>
                <?php
            } else {
                $sql = "INSERT INTO emp_project_matrix(emp_id,project_id,start_date,end_date)VALUES('$emp_id','$project_id','$start_date','$end_date')";
                $result = $conn->query($sql);
                if ($result == TRUE) {
                ?>
                    <script>
                        alertify.success("<span style='color:#fff;font-size:15px;'><i class='fa fa-success'></i> Project Assigned!!!</span>");
                        window.opener.location.reload();
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alertify.error("<span style='color:#fff;font-size:15px;'><i class='fa fa-warning'></i>Error... Project Not Assigned!!!</span>");
                    </script>
        <?php
                }
            }
        }
        ?>



        <script>
            // location
            function getMyCurrentLocation() {
                navigator.geolocation.getCurrentPosition(success, error, options);
            } //getCurrentLocation
            success = (pos) => {
                $("#lat").val("wait...");
                $("#lng").val("wait...");
                $("#lat").val(pos.coords.latitude);
                $("#lng").val(pos.coords.longitude);
            }

            var options = {
                enableHighAccuracy: true,
            };

            error = (err) => {
                console.warn(`ERROR(${err.code}): ${err.message}`);
            }
        </script>
</body>

</html>