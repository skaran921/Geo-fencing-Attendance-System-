<?php 
include "./db.php";
$assign_location_id=$_GET["assign_location_id"];
$sql=" UPDATE assign_location SET status='Inactive' WHERE id='$assign_location_id'";
$result=$conn->query($sql);
if($result==TRUE){
     echo "Success";
}else{
    echo "Error";
}
