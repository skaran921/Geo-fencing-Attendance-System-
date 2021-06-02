<?php 
include "./db.php";
$holiday_id=$_GET["holiday_id"];
$sql=" UPDATE holiday SET status='Inactive' WHERE id='$holiday_id'";
$result=$conn->query($sql);
if($result==TRUE){
     echo "Success";
}else{
    echo "Error";
}
