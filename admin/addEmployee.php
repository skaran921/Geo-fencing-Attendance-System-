<?php include "./checkSession.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Add Employee - Admin Panel</title>
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
            word-spacing: 40px;
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
            <li><a href="./employee.php">Employee</a></li>
            <li class="active">Add New Employee</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap container">
            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                <i class="fa fa-plus"></i> Add New Employee
            </span>

            <form action="" method="post" enctype="multipart/form-data">
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
                                    <label>Employee Name:</label>
                                    <input type="text" name="emp_name" id="emp_name" class="form-control" placeholder="Employee Full Name" required autofocus>
                                </div>
                            </div>
                            <!--col1 inside row---->

                            <div class="col-md-12">
                                <!--col2 inside row---->
                                <div class="form-group">
                                    <label>Employee Gender:</label>
                                    <select name="emp_gender" id="emp_gender" class="form-control" style="-webkit-appearance:menulist;cursor:pointer;" required>
                                        <option value="">Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <!--col2 inside row---->

                            <div class="col-md-12">
                                <!--col3 inside row---->
                                <div class="form-group">
                                    <label>Employee DOB:</label>
                                    <input type="date" name="emp_dob" id="emp_dob" class="form-control" style="cursor:pointer;" required>
                                </div>
                            </div>
                            <!--col3 inside row---->

                            <div class="col-md-12">
                                <!--col4 inside row---->
                                <div class="form-group">
                                    <label>Employee Position:</label>
                                    <select name="emp_position" id="emp_position" class="form-control" style="-webkit-appearance:menulist;cursor:pointer;" required>
                                        <option value="">Select Employee Position</option>
                                        <option>Manager</option>
                                        <option>Application Developer</option>
                                        <option>Application Developer - Trainee</option>
                                        <option>Mean Stack Developer</option>
                                        <option>Project Manager</option>
                                        <option>Software Analyst</option>
                                        <option>Senior Developer</option>
                                        <option>Senior Designer</option>
                                        <option>Junior Designer</option>
                                        <option>Junior Developer</option>
                                        <option>Trainee</option>

                                    </select>
                                </div>
                            </div>
                            <!--col4 inside row---->

                            <div class="col-md-12">
                                <!--col3 inside row---->
                                <div class="form-group">
                                    <label>Employee Address:</label>
                                    <textarea name="emp_address" id="emp_address" class="form-control" placeholder="Employee Permanent Address" style="cursor:pointer;" required></textarea>
                                </div>
                            </div>
                            <!--col3 inside row---->

                        </div>
                        <!---inside sub row--->

                    </div>
                    <!---main col1--->


                    <div class="col-md-6">
                        <!---main col2--->

                        <div class="row">
                            <!---inside sub row--->
                            <div class="col-md-12">
                                <!--col6 inside row---->
                                <div class="form-group">
                                    <label>Employee Mobile:</label>
                                    <input type="tel" name="emp_mobile" id="emp_mobile" class="form-control" placeholder="Employee Mobile No." required>
                                </div>
                            </div>
                            <!--col6 inside row---->

                            <div class="col-md-12">
                                <!--col7 inside row---->
                                <div class="form-group">
                                    <label>Employee Email:</label>
                                    <input type="email" name="emp_email" id="emp_email" class="form-control" placeholder="Employee Email Address" required>
                                </div>
                            </div>
                            <!--col7 inside row---->

                            <div class="col-md-12">
                                <!--col8 inside row---->
                                <div class="form-group">
                                    <label>Employee Password:</label>
                                    <input type="password" name="emp_password" id="emp_password" class="form-control" placeholder="Employee Password" required>
                                </div>
                            </div>
                            <!--col8 inside row---->

                            <div class="col-md-12">
                                <!--col9 inside row---->
                                <div class="form-group">
                                    <label>Employee Joining Date:</label>
                                    <input type="date" name="emp_joining_date" id="emp_joining_date" class="form-control" required>
                                </div>
                            </div>
                            <!--col9 inside row---->


                            <div class="col-md-12">
                                <!--col10 inside row---->
                                <div class="form-group">
                                    <label>Employee Image:</label>
                                    <input type="file" accept="image/*" name="emp_image" id="emp_image" class="form-control" placeholder="Employee Image" required>
                                </div>
                            </div>
                            <!--col10 inside row---->
                        </div>
                        <!---inside sub row--->
                    </div>
                    <!---main col2--->
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
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!-- PHP start herer -->
    <?php
    if (isset($_POST["add"])) {
        $emp_name = $_POST["emp_name"];
        $emp_gender = $_POST["emp_gender"];
        $emp_dob = $_POST["emp_dob"];
        $emp_position = $_POST["emp_position"];
        $emp_address = $_POST["emp_address"];
        $emp_mobile = $_POST["emp_mobile"];
        $emp_email = $_POST["emp_email"];
        $emp_password = $_POST["emp_password"];
        $emp_joining_date = $_POST["emp_joining_date"];
        $emp_image = $_FILES["emp_image"]["name"];
        $imageName = $emp_email . ".jpg";
        include "./db.php";
        $sql1 = "SELECT * FROM employee WHERE emp_email='$emp_email'";
        $result1 = $conn->query($sql1);
        if ($row = $result1->fetch_assoc()) {
    ?>
            <script>
                alertify.error("<span style='color:#fff;font-size:14px;'><i class='fa fa-warning'></i> Employee Detail Already Exist!!!</span>");
            </script>
            <?php
        } else {
            if (move_uploaded_file($_FILES["emp_image"]["tmp_name"], "./employee/" . $imageName)) {
                $sql = "INSERT INTO employee(emp_name,emp_gender,emp_dob,emp_position,emp_address,emp_mobile,emp_email,emp_password,emp_joining_date,image)
                      VALUES('$emp_name','$emp_gender','$emp_dob','$emp_position','$emp_address','$emp_mobile','$emp_email','$emp_password','$emp_joining_date','$imageName')";
                $result = $conn->query($sql);
                if ($result == TRUE) {
            ?>
                    <script>
                        alertify.success("<span style='color:#fff;font-size:16px;'><i class='fa fa-check-circle'></i> Employee Detail's Saved!!!</span>");
                        window.opener.location.reload();
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alertify.error("<span style='color:#fff;font-size:16px;'><i class='fa fa-warning'></i> Employee Detail's Not Saved!!!</span>");
                    </script>
                <?php
                } #else of result
            } else {
                ?>
                <script>
                    alertify.error("<span style='color:#fff;font-size:15px;'><i class='fa fa-warning'></i> Employee Detail's Not Saved!!!</span>");
                </script>
    <?php
            } #move upload file
        } #if data not exist;   
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
                    <p>Press No if you want to continue work. Press Yes to logout current user.</p>
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