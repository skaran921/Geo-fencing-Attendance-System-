<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Login</title>
  <link rel="shortcut icon" href="../logo.jpg" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">

  <script src="https://use.fontawesome.com/4c38b3bc58.js"></script>
</head>

<body>


  <div class="container">

    <div id="myForm" class="row">
      <div class="col-md-6" id="form__block">
        <form action="" method="post">
          <div class="form-group">
            <label><b><i class="fa fa-user-circle"></i> Admin ID </b></label>
            <input type="email" name="email" placeholder="Email" class="form-control" required autofocus>
          </div>
          <div class="form-group">
            <label><b><i class="fa fa-lock"></i> Password </b></label>
            <input type="password" name="password" placeholder="Password" class="form-control" required>
          </div>
          <div class="form-group">
            <button type="submit" name="go" class="btn btn-block"><i class="fa fa-sign-in"></i> Login</button>
          </div>

          <h1 style="color:#fafafa"><i class="fa fa-map-marker"></i> Geo Attendance System </h1>
          <br />
          <span class="form__title"><i class="fa fa-user-secret"></i> Admin Login</span>
        </form>

      </div>


    </div>
  </div>
  <!-- Modal content-->
  <div class="modal-content">
      <div class="modal-body">
      <div class="row">
      <center><img src="images/explanation.png" width="100px" height="100px" alt=""></center>
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



  <?php
  if (isset($_POST["go"])) {
    include "./db.php";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = $conn->prepare("SELECT * FROM admin WHERE email=? AND password=?");
    $sql->bind_param("ss", $email, $password);
    $sql->execute();
    $result = $sql->get_result();
    if ($row = $result->fetch_assoc()) {
      // if username and password match; 
      $_SESSION["admin_id"] = $row["id"];
      header("Location: ./dashboard.php");
    } else {
      // if username and password not matched
  ?>
      <script>
        $('#myModal').modal('show');
      </script>
  <?php
    }
    $sql->close();
  }
  ?>

</body>

</html>