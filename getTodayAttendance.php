<?php 
  include "./dataTableCSS.php";
?>

<div class="table-responsive table-striped table-hoverable" style="padding-bottom: 20px;"><!---table-responsive--->  
  <!--table -->
  <table id="myTable" class=" table table-bordered">
    <thead>
    <th>Check_in_Time</th>
              <th>Check_In_Address</th>
              <th>Check_in_Distance</th>
              <th>Check_Out_Address</th>
              <th>Check_Out_Distance</th>              
              <th>Check_out_Time</th>  
              <th>Diff_Minute</th>  
              <th>Diff_Hour</th>                       
    </thead>
    <tbody>
    <?php 
        include "../db.php";
        $emp_id=$_GET["emp_id"];
        $todayDate=date("Y-m-d");
        $sql="SELECT checkin.address As checkin_address,checkin.distance As checkin_distance,checkout.address As
                checkout_address,checkout.distance As checkout_distance,checkin.time As checkin_time,checkout.time as 
                checkout_time,TIMESTAMPDIFF(Hour,checkin.time,checkout.time) AS diff_hour,
                TIMESTAMPDIFF(minute,checkin.time,checkout.time) AS diff_minute FROM 
                checkin left join checkout on checkin.id=checkout.check_in_id 
                WHERE checkin.userId='$emp_id' AND DATE(checkin.time)='$todayDate'  AND  DATE(checkout.time)='$todayDate'  ORDER BY checkin.time DESC
                ,checkout.time DESC";
         $result=$conn->query($sql);
         $total_not_work_time_minute=0;
         $total_not_work_time_hour=0;
         while($row=$result->fetch_assoc()){
            $lastCheckInDate=date("Y-m-d",strtotime($row["checkin_time"]));
                ?>
                <tr>   
                 <td><?php echo date("h:i:s A",strtotime($row["checkin_time"]));?></td>                                
                 <td><?php echo $row["checkin_address"];?></td>
                 <td><?php echo $row["checkin_distance"];?></td>
                 <td><?php echo $row["checkout_address"];?></td>
                 <td><?php echo $row["checkout_distance"];?></td>                
                 <td>
                     <?php 
                            if(isset($row["checkout_time"])){
                                   echo date("h:i:s A",strtotime($row["checkout_time"]));
                            }else{
                              echo "-";
                          } 
                     ?>
                </td>
                      <!-- diff_Minute -->
                 <td>
                     <?php 
                        if(isset($row["checkout_time"])){
                             echo $row["diff_minute"];
                             $total_not_work_time_minute+=$row["diff_minute"];
                        }else{
                            echo "-";
                        }    
                    ?>
                </td>
                   <!-- diffrance Hour -->
                 <td>
                    <?php 
                        echo $row["diff_hour"];
                        $total_not_work_time_hour+=round($row["diff_minute"]/60,2);
                    ?>
                </td>
                <!-- diffrance -->
                
               </tr> 
                <?php                  
        }     
?>        

       <div class="alert alert-info">
            <p> <b> Working Time In Miute: </b>  <?php  echo $total_not_work_time_minute." Min";?></p>
            <p> <b> Working Time In Hour: </b>  <?php  echo $total_not_work_time_hour." Hour";?></p>
       </div>
    </tbody>                                            
</table>
<!--table end-->
</div>

<?php
           include "./dataTableScript.php";
?>     


        <style>
             .alertify .ajs-footer .ajs-buttons.ajs-primary .ajs-button {
                    margin: 4px;
                    border: none;
                    border-radius: 4px;
                    color: #fff;
                    box-shadow: 0px 1px 3px #666;
                }

            button.ajs-button.ajs-ok {
                background:#E71C23;                    
             } 

            button.ajs-button.ajs-cancel {
                background:#2ecc72;                    
             }   
                 
        </style>    