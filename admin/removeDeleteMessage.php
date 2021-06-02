<?php 
include "./db.php";
$message_id=$_GET["message_id"];
$sql=" UPDATE messages SET status='Active' WHERE id='$message_id'";
$result=$conn->query($sql);
if($result==TRUE){
     echo "Success";
}else{
    echo "Error";
}
