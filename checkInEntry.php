<?php 
   include "db.php";
   $userId=$_POST["userId"];
   $userLat=$_POST["userLat"];
   $userLng=$_POST["userLng"];
   $address=addslashes($_POST["address"]);
   $distance=$_POST["distance"];
   $sql="INSERT INTO checkin(userId,lat,longi,address,distance)VALUES('$userId','$userLat','$userLng','$address','$distance')";
   $result=$conn->query($sql);
   if($result==TRUE){
            echo "Success";
   }else{
         echo "error";
   }
?>