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
    <script src="https://use.fontawesome.com/4c38b3bc58.js"></script>
</head>
<body>
    <div id="overlay">
         <div class="spinner"></div>
    </div>
      <center>
         <div id="main" class="main"><!---main form div--->
                <h1 style="color:#262626"><i class="fa fa-map-marker"></i> Geo Attendance System </h1>
                <span class="title" style="color:#fff;border-radius:60px;background:rgba(0,0,0,0.6);padding:10px 20px;"><i class="fa fa-sign-in"></i> Employee Login</span>
            <div class="myForm">
             <form action="" method="post" align="left"><!---form--->
                    <label style="color:#111"><i class="fa fa-user-circle"></i> Employee ID:</label>
                    <input type="email" name="emp_email" id="emp_email" class="form-control" placeholder="Employee ID" autofocus required>
                    <label style="color:#111"><i class="fa fa-lock"></i> Password:</label>
                    <input type="password" name="emp_password" id="emp_password" class="form-control" placeholder="Password" required>
                    <button type="submit" name="go" class="btn"><i class="fa fa-sign-in"></i> Log in</button>
             </form><!---form--->
            </div> 
         </div><!---main form div--->
      </center>
</body>
<script>
    var overlay = document.getElementById("overlay");
    window.addEventListener('load',function(){
        overlay.style.display='none';
        document.getElementById("main").style.display='block';
    });
</script>
</html>
<?php
if(isset($_POST["go"])){
   include "db.php";
   $emp_email=$_POST["emp_email"];
   $emp_password=$_POST["emp_password"];
   $sql=$conn->prepare("SELECT emp_id FROM employee WHERE emp_email=? AND emp_password=?");
   $sql->bind_param("ss",$emp_email,$emp_password);
   $sql->execute();
   $result=$sql->get_result();
   if($row=$result->fetch_assoc()){
        $_SESSION["emp_id"]=$row["emp_id"];
         header("Location: ./dashboard.php");
   }else{
        ?>
            <center>
                <div class="errMsg" style="margin-top:16px; width:34%;border-radius:7px;background:#f00;box-sizing:border-box;color:#fff;font-weight:600;padding:10px;">
                <span>
                        <i class="fa fa-warning"></i>
                        Sorry!!!... Username And Password Not Matched!!!
                </span>
            </div>
            </center>
        <?php 
   }
}
?>