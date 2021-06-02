<?php 
include "./db.php";
$project_id=$_GET["project_id"];
$sql=" UPDATE projects SET status='Inactive' WHERE project_id='$project_id'";
$result=$conn->query($sql);
if($result==TRUE){
     echo "Success";
}else{
    echo "Error";
}
