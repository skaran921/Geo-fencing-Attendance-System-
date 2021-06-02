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
  <link rel="stylesheet" href="admin.css">
  <script src="https://use.fontawesome.com/4c38b3bc58.js"></script>
</head>

<body>

  <video autoplay muted loop id="myVideo">
    <source src="../bg.mp4" type="video/mp4">
  </video>

  <h1><i class="fa fa-map-marker"></i> Geo Attendance System</h1>

  <div id="myForm" align="left">
    <div id="form-header"><i class="fa fa-user-secret"></i> Admin Login</div>
    <form action="" method="post">
      <label><b><i class="fa fa-user-circle"></i> Admin ID: </b></label>
      <input type="email" name="email" placeholder="Email" required autofocus>
      <br>
      <label><b><i class="fa fa-lock"></i> Password: </b></label>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="go"><i class="fa fa-sign-in"></i> Login</button>
    </form>
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
      $style = "margin:10px;padding:10px;background:teal;color:#fff;font-size:20px;box-shadow:0px 3px 4px #999666;";
      echo "<center style='$style'>Sorry User  name and password Not matched!!!<center>";
    }
    $sql->close();
  }
  ?>

</body>

</html>