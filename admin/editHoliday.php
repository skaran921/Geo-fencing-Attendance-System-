<?php include "./checkSession.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Edit Holiday - Admin Panel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="./logo.jpg" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/<?php getTheme(); ?>" />
    <?php
    include "./dataTableCSS.php";
    ?>


    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

    <!-- EOF CSS INCLUDE -->
    <style>
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
</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <?php include "./header.php"; ?>

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="./holidays.php">Holiday's</a></li>
            <li class="active">Edit Holiday</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap container">
            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                <i class="fa fa-edit"></i> Edit Holiday
            </span>
            <div class="row">
                <!---row--->
                <div class="col-md-12">
                    <!---col--->

                    <?php
                    if (isset($_GET["holiday_id"])) {
                        include "./db.php";
                        $holiday_id = $_GET["holiday_id"];
                        $sql = "SELECT id,holiday_date,holiday_event FROM holiday WHERE id='$holiday_id'";
                        $result = $conn->query($sql);
                        if ($row = $result->fetch_assoc()) {
                    ?>
                            <form action="" method="post">
                                <div class="form-inline">
                                    <label><b>Select Holiday Date:</b></label>
                                    <input type="date" class="form-control" value="<?php echo $row["holiday_date"]; ?>" name="holiday_date" id="holiday_date" required>
                                    <label><b>Holiday Name:</b></label>
                                    <input type="text" class="form-control" value="<?php echo $row["holiday_event"]; ?>" placeholder="Holiday Name" name="holiday_name" id="holiday_name" required>
                                </div>
                                <!---form-inline --->
                                <br>
                                <div class="form-group" style="width:500px">
                                    <center>
                                        <div class="btns">
                                            <button type="submit" name="edit" style="background:#000066">
                                                <span class="fa fa-save"></span> Save
                                            </button>
                                            <button type="reset" style="background:#45CE30">
                                                <span class="fa fa-refresh"></span> Reset
                                            </button>
                                        </div>
                                    </center>
                                </div>
                                <!---form-group--->
                            </form>
                            <!---form end---->
                    <?php
                        } else {
                            echo "<center><h4>Sorry Record Not Found!!!</h4></center>";
                        } #else-part of fetch_assoc()                                    
                    } #if-isset
                    ?>
                    <!-- php start here -->
                    <?php
                    if (isset($_POST["edit"])) {
                        include "./db.php";
                        $holiday_date = $_POST["holiday_date"];
                        $holiday_name = $_POST["holiday_name"];
                        $holiday_id = $_GET["holiday_id"];
                        $sql = "UPDATE holiday SET holiday_date='$holiday_date',holiday_event='$holiday_name' WHERE id='$holiday_id'";
                        $result = $conn->query($sql);
                        if ($result === TRUE) {
                    ?>
                            <script>
                                alertify.success("<span style='color:#fff;font-size:16px;'><i class='fa fa-check-circle'></i>Holiday Updated!!!</span>");
                                window.opener.location.reload();
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                alertify.error("<span style='color:#fff;font-size:16px;'><i class='fa fa-warning'></i>error Holiday Detail's Not Updated!!!</span>");
                            </script>
                        <?php
                        } #if holiday not added
                        ?>
                        <script>
                            window.location.href = "editHoliday.php?holiday_id=<?php echo $holiday_id; ?>";
                        </script>
                    <?php
                    } #isset 
                    ?>
                    <!-- php end here -->
                </div>
                <!---col--->
            </div>
            <!---row end--->
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
    <?php include "./preload.php"; ?>
    <?php include "./mainScripts.php"; ?>
</body>

</html>