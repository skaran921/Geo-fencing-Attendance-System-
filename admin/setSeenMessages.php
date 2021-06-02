<?php 
include "./db.php";
$admin_id=$_GET["admin_id"];
$sql=" UPDATE messages SET viewStatus='Seen' WHERE viewStatus='NotSeen' AND admin_id='$admin_id'";
$result=$conn->query($sql);
if($result==TRUE){
     echo "Success";
}else{
    echo "Error";
}
