<?php include "./checkSession.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Send New Messages - Admin Panel</title>
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
</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <?php include "./header.php"; ?>

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="./messages.php">Messages</li>
            <li class="active">Send New Message</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap container">
            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                <i class="fa fa-paper-plane"></i> Send New Message
            </span>
            <div class="row">
                <!---row--->
                <div class="col-md-12">
                    <!---col--->
                    <div id="content" style="width:400px;">
                        <form action="" method="post">
                            <select name="emp_id" id="emp_id" class="form-control" required autofocus>
                                <option value="">Select Employee</option>
                                <?php
                                include "./db.php";
                                $sql = "SELECT emp_id,emp_name from employee WHERE status='Active'";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row['emp_id']; ?>"><?php echo $row['emp_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Write Your Message..." required></textarea>
                            <br>
                            <center>
                                <button type="submit" name="send" class="btn btn-info" title="Click to Send Message" data-toggle="tooltip">
                                    <i class="fa fa-paper-plane"></i> Send
                                </button>
                                <button type="reset" class="btn btn-danger" title="Click to Reset" data-toggle="tooltip">
                                    <i class="fa fa-refresh"></i>
                                    Reset
                                </button>
                            </center>
                        </form>

                        <!-- -----------------------------------  php start here  -------------------------------------------- -->
                        <?php
                        if (isset($_POST["send"])) {
                            $emp_id = $_POST["emp_id"];
                            $message = $_POST["message"];
                            $admin_id = $_SESSION["admin_id"];
                            include "./db.php";
                            $sql = "INSERT INTO messages(emp_id,admin_id,message,messageStatus)
                                                    VALUES('$emp_id','$admin_id','$message','Sent')";
                            $result = $conn->query($sql);
                            if ($result === TRUE) {
                        ?>
                                <script>
                                    window.opener.location.reload();
                                    alertify.success("<span style='color:#fff;font-size:16px;'><i class='fa fa-check'></i> Message Send</span>");
                                </script>
                            <?php
                            } else {
                            ?>
                                <script>
                                    alertify.error("<i class='fa fa-check'></i> error not send!!!");
                                </script>
                        <?php
                            }
                        }
                        ?>
                        <!-- -----------------------------------  php end  here  -------------------------------------------- -->
                    </div>
                    <!---Content--->
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

<?php
include "./dataTableScript.php";
?>