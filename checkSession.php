<?php 
  session_start();
  if(isset($_SESSION["emp_id"])){
      include "./functions.php";
      ?>
      <?php 
  }else{
      header("Location:index.php");
  }