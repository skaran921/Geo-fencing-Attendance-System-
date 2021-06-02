<?php include "./checkSession.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Themes - Admin Panel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="./logo.jpg" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/<?php getTheme(); ?>" />

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
    <!-- EOF CSS INCLUDE -->

    <style>
        #btn:hover,
        #btn:focus {
            background-color: #7CEC9F !important;
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
            <li><a href="#">Settings</a></li>
            <li class="active">Themes</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap container">
            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                <i class="fa fa-dashboard"></i> Dashboard Theme
            </span>
            <div class="row">
                <!---row--->
                <div class="col-md-4">
                    <!---col--->
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Theme: </label>
                            <select name="theme" id="theme" class="form-control" required style="-webkit-appearance: menulist;cursor:pointer">
                                <option value="">Select Theme</option>
                                <option value="theme-black">Black</option>
                                <option value="theme-white">White</option>
                                <option value="theme-brown">Brown</option>
                                <option value="theme-blue">Blue</option>
                                <option value="theme-default">Default</option>
                            </select>

                            <center>
                                <button type="submit" name="change" id="btn" style="padding:7px;margin-top:4px;color:#fff;background-color:#26ae60;border:none;border-radius:4px;font-size:18px;">
                                    <i class="fa fa-check-circle"></i>
                                    Change
                                </button>
                            </center>
                        </div>
                    </form>
                    <!-----form----->

                    <?php
                    if (isset($_POST["change"])) {
                        $theme = $_POST["theme"];
                        include "./db.php";
                        $sql = "UPDATE theme SET theme='$theme' WHERE id='1'";
                        $result = $conn->query($sql);
                        if ($result == TRUE) {
                    ?>
                            <script>
                                alertify.success("<div style='color:#fff;'><i class='fa fa-check-circle'></i> Theme Changed!!!</div>");
                                window.open("./theme.php", "_self");
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                alertify.error("<div style='color:#fff;'><i class='fa fa-warning'></i> Error Theme Not Changed!!!</div>");
                            </script>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!---col--->
            </div>
            <!---row end--->
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
    <?php include "./preload.php"; ?>
    <?php include "./mainScripts.php"; ?>
</body>

</html>