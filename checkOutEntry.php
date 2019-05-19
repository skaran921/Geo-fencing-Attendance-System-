<?php 
   include "db.php";
   $userId=$_POST["userId"];
   $userLat=$_POST["userLat"];
   $userLng=$_POST["userLng"];
   $address=$_POST["address"];
   $lastInsertCheckInId=$_POST["lastInsertCheckInId"];
   $distance=$_POST["distance"];
   $sql="INSERT INTO checkout(userId,lat,longi,address,check_in_id,distance)VALUES('$userId','$userLat','$userLng','$address','$lastInsertCheckInId','$distance')";
   $result=$conn->query($sql);
   if($result==TRUE){
            echo "Success Checkout";
   }else{
         echo "error Check out";
   }
?>