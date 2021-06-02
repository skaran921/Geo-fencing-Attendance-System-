<?php 
include "./db.php";
$emp_id=$_GET["emp_id"];
$sql=" UPDATE messages SET status='Inactive' WHERE id='$message_id' AND emp_id='$emp_id'";
$result=$conn->query($sql);
if($result==TRUE){
     echo "Success";
}else{
    echo "Error";
}
