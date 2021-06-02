<?php include "./checkSession.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Edit Profile - Admin Panel</title>
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

<body onload="getAdminProfileRecord()">
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <?php include "./header.php"; ?>

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="./dashboard.php">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li class="active">Edit Profile</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap container">
            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                <i class="fa fa-edit"></i> Edit Profile

                <span style="float:right;margin-right:10px;cursor:pointer" class="fa fa-image" title="Change Profile Picture" data-toggle="modal" data-target="#myModal" data-placement="bottom">
                </span>
            </span>

            <!-- employee detail  -->
            <div id="editProfile"></div>

        </div>
        <!-- END PAGE CONTAINER -->
        <!-- php start here -->
        <?php

        //   image update

        if (isset($_POST["updateImage"])) {
            include "./db.php";
            $admin_id = $_POST["admin_id"];
            $admin_email = $_POST["admin_email"];
            $admin_image = $_FILES["newImage"]["name"];
            $image_name = $admin_email . ".jpg";
            $sql = "UPDATE admin SET image='$image_name' WHERE id='$admin_id'";
            if (move_uploaded_file($_FILES["newImage"]["tmp_name"], "./images/" . $image_name)) {
                $result = $conn->query($sql);
                if ($result == TRUE) {
        ?>
                    <script>
                        alertify.success("<span style='color:#fff;font-size:15px;'><i class='fa fa-check-circle'></i> Profile Picture Updated!!!</span>");
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alertify.error("<span style='color:#fff;font-size:15px;'><i class='fa fa-warning'></i> Error!!!</span>");
                    </script>
                <?php
                } //if updated
            } else {
                ?>
                <script>
                    alertify.error("<span style='color:#fff;font-size:15px;'><i class='fa fa-warning'></i> Error Image Not Uploaded!!!</span>");
                </script>
            <?php
            }
        } #sset


        //    update
        if (isset($_POST["edit"])) {
            $admin_id = $_POST["admin_id"];
            $admin_name = $_POST["name"];
            $position = $_POST["position"];
            include "./db.php";
            $sql = "UPDATE admin SET name='$admin_name',position='$position' WHERE id='$admin_id'";
            $result = $conn->query($sql);
            if ($result == TRUE) {
            ?>
                <script>
                    alertify.success("<span style='color:#fff;font-size:15px;'><i class='fa fa-check-circle'></i> Profile Detail's Updated!!!</span>");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alertify.error("<span style='color:#fff;font-size:15px;'><i class='fa fa-warning'></i> Profile Detail's Not Updated!!!</span>");
                </script>
        <?php
            }
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


        <script>
            function getAdminProfileRecord() {
                let admin_id = <?php echo $_SESSION["admin_id"]; ?>;
                $.ajax({
                    url: `getEditProfile.php?admin_id=${admin_id}`,
                    success: function(data) {
                        $("#editProfile").html(data);
                    }
                });
            }
        </script>
</body>

</html>