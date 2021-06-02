<?php 
  session_start();
  if(isset($_SESSION["admin_id"])){
      include "./adminFunctions.php";
      ?>
      <?php 
  }else{
      header("Location:index.php");
  }