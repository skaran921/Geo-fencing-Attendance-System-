<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Geofencing</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/4c38b3bc58.js"></script>
    
    
</head>

<body>
    <div id="overlay">
        <div class="spinner"></div>
    </div>
    <center>
        <div id="main" class="main container">
            <!---main form div--->
            <div class="row">
                <div class="col-md-6" id="form__block">
                    <form action="" method="post" align="left">
                        <!---form--->
                        <div class="form-group">
                            <label style="color:#fafafa"><i class="fa fa-user-circle"></i> Email </label>
                            <input type="email" name="emp_email" id="emp_email" class="form-control" placeholder="Employee ID" autocomplete="off" autofocus required>

                        </div>

                        <div class="form-group">
                            <label style="color:#fafafa"><i class="fa fa-lock"></i> Password</label>
                            <input type="password" name="emp_password" id="emp_password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="go" class="btn btn-block mt-4"><i class="fa fa-sign-in font-weight-bold"></i> Log in</button>
                        </div>
                        <h1 style="color:#fafafa"><i class="fa fa-map-marker"></i> Geo Attendance System </h1>
                        <br />
                        <span class="form__title"><i class="fa fa-sign-in"></i> Employee Login</span>
                    </form>
                </div>


                <!---form--->
            </div>
        </div>
        <!---main form div--->
    </center>
    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" style="padding-top:0;">
      <div class="row" style="background-color:#d9534f;padding:20px;">
      <center><img src="images/cross.png" width="100px" height="100px" alt=""></center>
      </div>
      <div class="message">
          <center><h2>Oh snap!</h2></center>
      </div>
      <div class="message">
          <center><h4 style="color:#ccc;">Your username or password wrong</h4></center>
      </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" style="border-radius:40px;width:250px;" class="btn-danger" data-dismiss="modal">OK</button></center>
      </div>
    </div>
    
  </div>
</div>
  

</body>
<script>
    var overlay = document.getElementById("overlay");
    window.addEventListener('load', function() {
        overlay.style.display = 'none';
        document.getElementById("main").style.display = 'block';
    });
</script>

</html>
<?php
if (isset($_POST["go"])) {
    include "db.php";
    $emp_email = $_POST["emp_email"];
    $emp_password = $_POST["emp_password"];
    $sql = $conn->prepare("SELECT emp_id FROM employee WHERE emp_email=? AND emp_password=?");
    $sql->bind_param("ss", $emp_email, $emp_password);
    $sql->execute();
    $result = $sql->get_result();
    if ($row = $result->fetch_assoc()) {
        $_SESSION["emp_id"] = $row["emp_id"];
        header("Location: ./dashboard.php");
    } else {
?>


        <script>
            $('#myModal').modal('show');
        </script>

<?php
    }
}
?>