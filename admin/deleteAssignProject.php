<?php 
include "./db.php";
$assign_project_id=$_GET["assign_project_id"];
$sql=" UPDATE emp_project_matrix SET status='Inactive' WHERE id='$assign_project_id'";
$result=$conn->query($sql);
if($result==TRUE){
     echo "Success";
}else{
    echo "Error";
}
