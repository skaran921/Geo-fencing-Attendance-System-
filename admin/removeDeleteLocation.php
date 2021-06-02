<?php 
include "./db.php";
$location_id=$_GET["location_id"];
$sql=" UPDATE master SET status='Active' WHERE id='$location_id'";
$result=$conn->query($sql);
if($result==TRUE){
     echo "Success";
}else{
    echo "Error";
}
