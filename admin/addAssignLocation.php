<?php include "./checkSession.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Add Assign Location - Admin Panel</title>
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
            <li><a href="./geofencing.php">Geofencing</a></li>
            <li class="active">Add Geofencing Detail</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap container">
            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                <i class="fa fa-plus"></i> Add Geofencing Detail
            </span>

            <form action="" method="post">
                <!-----------form start here------------->
                <div class="row bg-light">
                    <!---row--->

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <!--col1 inside row---->
                                <div class="form-group">
                                    <!--location id -->
                                    <label>Emp_ID:</label>
                                    <select name="emp_id" id="emp_id" class="form-control" required style="-webkit-appearance: menulist;cursor:pointer;">
                                        <option value="">Select Employee id</option>
                                        <?php
                                        include "./db.php";
                                        $sql1 = "SELECT emp_id,emp_name FROM employee WHERE status='Active' ORDER BY emp_name";
                                        $result1 = $conn->query($sql1);
                                        while ($row1 = $result1->fetch_assoc()) {
                                            echo "<option value='" . $row1["emp_id"] . "'>" . $row1["emp_name"] . " (" . $row1["emp_id"] . ")" . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!--col1 inside row---->

                            <div class="col-md-12">
                                <!--col2 inside row---->
                                <div class="form-group">
                                    <label>Location:</label>
                                    <select name="location_id" id="location_id" class="form-control" required style="-webkit-appearance: menulist;cursor:pointer;">
                                        <?php
                                        include "./db.php";
                                        $sql1 = "SELECT id,address FROM master WHERE status='Active' ORDER BY address";
                                        $result1 = $conn->query($sql1);
                                        while ($row1 = $result1->fetch_assoc()) {
                                            echo "<option value='" . $row1["id"] . "'>" . $row1["address"] . "</option>";
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
                                    <label>Distance Limt (Meter):</label>
                                    <input type="number" name="distance_limit" id="distance_limit" class="form-control" placeholder="Distance Limit" required>
                                </div>
                            </div>
                            <!--col1 inside row---->

                        </div>
                        <!---row--->
                    </div>

                </div>
                <!---row end--->
                <center>
                    <div class="btns">
                        <button type="submit" name="add" style="background:#000066"> <span class="fa fa-save"></span> Save</button>
                        <button type="reset" style="background:#45CE30"><span class="fa fa-refresh"></span> Reset</button>
                    </div>
                </center>
            </form>
            <!---form end here---------->


            <!-- employee detail  -->
        </div>

    </div>
    <!-- END PAGE CONTAINER -->
    <!-- php start here -->
    <?php

    //    update
    if (isset($_POST["add"])) {
        $emp_id = $_POST["emp_id"];
        $location_id = $_POST["location_id"];
        $distance_limit = $_POST["distance_limit"];
        include "./db.php";
        $sql = "SELECT id FROM assign_location WHERE emp_id='$emp_id'";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
    ?>
            <script>
                alertify.error("<span style='color:#fff;font-size:15px;'><i class='fa fa-warning'></i> Location Already Assigned!!!</span>");
            </script>
            <?php
        } else {
            $sql1 = "insert into assign_location(emp_id,location_id,distance_limit)VALUES('$emp_id','$location_id','$distance_limit')";
            $result1 = $conn->query($sql1);
            if ($result1 == TRUE) {
            ?>
                <script>
                    alertify.success("<span style='color:#fff;font-size:15px;'><i class='fa fa-check-circle'></i> Geofencing Detail's Added!!!</span>");
                    window.opener.location.reload();
                </script>
            <?php
            } else {
            ?>
                <script>
                    alertify.error("<span style='color:#fff;font-size:15px;'><i class='fa fa-warning'></i> Error Detail's Not Added!!!</span>");
                </script>
    <?php
            }
        } #else of fetch   
    } #isset  
    ?>
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
</body>

</html>