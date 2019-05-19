<?php 
// getUserName
    function getUserName($userId){        
        include "db.php";
        $sql="SELECT emp_name FROM employee WHERE emp_id='$userId'";
        $result=$conn->query($sql);
        if($row=$result->fetch_assoc()){
            return $row["emp_name"];
        }else{
            echo "error";
        }
    }

    // getlat 
    function getAssignedLocationLat($emp_id){
        include "db.php";
        $sql="SELECT master.lat FROM assign_location LEFT JOIN master ON assign_location.location_id=master.id WHERE assign_location.emp_id='$emp_id'";
        $result=$conn->query($sql);
        if($row=$result->fetch_assoc()){
            return $row["lat"];
        }else{
            echo "error in get Location";
        }
    }


    // getlng
    function getAssignedLocationLng($emp_id){
        include "db.php";
        $sql="SELECT master.longi FROM assign_location LEFT JOIN master ON assign_location.location_id=master.id WHERE assign_location.emp_id='$emp_id'";
        $result=$conn->query($sql);
        if($row=$result->fetch_assoc()){
            return $row["longi"];
        }else{
            echo "error in get Location";
        }
    }

    /// getLastCheckInTime
    function getLastCheckInTime($userId){        
        include "db.php";
        $todayDate=date("Y-m-d");
        $sql="SELECT time FROM checkin WHERE userId='$userId' ORDER BY time DESC LIMIT 0,1";
        $result=$conn->query($sql);
        if($row=$result->fetch_assoc()){
            $lastCheckInDate=date("Y-m-d",strtotime($row["time"]));
            if($todayDate===$lastCheckInDate){
                return date("h:i:s A",strtotime($row["time"]));
            }           
        }else{
            echo "error";
        }
    }


    /// getLastCheckInTime
    function getLastCheckInData($userId){        
        include "db.php";
        $todayDate=date("Y-m-d");
            $sql="SELECT checkin.address As checkin_address,checkin.distance As checkin_distance,checkout.address As
                    checkout_address,checkout.distance As checkout_distance,checkin.time As checkin_time,checkout.time as 
                    checkout_time FROM checkin left join checkout on checkin.id=checkout.check_in_id 
                    WHERE checkin.userId='$userId' ORDER BY checkin.time DESC,checkout.time DESC";
         $result=$conn->query($sql);
         while($row=$result->fetch_assoc()){
            $lastCheckInDate=date("Y-m-d",strtotime($row["checkin_time"]));
            if($todayDate===$lastCheckInDate){
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
                            }
                     ?>
                </td>
               </tr> 
                <?php 
            }           
        }
    }

     /// getLastCheckInTime
     function getLastCheckOutTime($userId){        
        include "db.php";
        $todayDate=date("Y-m-d");
        $sql="SELECT time FROM checkout WHERE userId='$userId' ORDER BY time DESC";
        $result=$conn->query($sql);
        if($row=$result->fetch_assoc()){
            $lastCheckInDate=date("Y-m-d",strtotime($row["time"]));
            if($todayDate===$lastCheckInDate){
                return date("h:i:s A",strtotime($row["time"]));
            }           
        }else{
            echo "error";
        }
    }


    function checkStatus($userId){
        include "db.php";
        $sql="SELECT checkin.time AS checkInTime,checkout.time AS checkOutTime FROM checkin LEFT JOIN checkout ON checkin.userId=checkout.userId WHERE checkin.userId='$userId' ORDER BY checkin.time DESC, checkout.time DESC LIMIT 0,1";
        $result=$conn->query($sql);
        if($row=$result->fetch_assoc()){
                // if data in table
                $lastCheckInTime=$row["checkInTime"];                
                $lastCheckOutTime=$row["checkOutTime"];
                $todayDate=date("d-m-Y");
                $compareTime=$lastCheckInTime<$lastCheckOutTime;
                if($compareTime){
                    // no problem then only check In option show                    
                    return 0;
                }else{
                    ///problem
                    return 1;
                }#compare time                

        }else{
            //if data not found
            return 0;
        }# else part of fetch_assoc()
    }

    // getLastInsertCheckInId
    function getLastInsertCheckInId($userId){
        include "db.php";
        $sql="SELECT id from checkin WHERE userid='$userId' ORDER BY id DESC LIMIT 0,1";
        $result=$conn->query($sql);
        if($row=$result->fetch_assoc()){
               return $row['id']; 
        }else{
            return 0;
        }
    }
	
	//getTotlalEmployee
function getTotalMessage($empId){    
    include "../db.php";
    $sql="SELECT count(*) as totalMsg FROM messages WHERE viewStatus='NotSeen' AND messages.status='Active'  AND messages.messageStatus='Sent' AND emp_id='$empId'";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
         return $row["totalMsg"];
    }else{
          return "error";
    }
 }

 //getEmpImage
function getEmpImage($empId){    
    include "../db.php";
    $sql="SELECT image FROM employee WHERE emp_id='$empId'";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
         return $row["image"];
    }else{
          return "error";
    }
 }

 //getEmpName
function getEmpName($empId){    
    include "../db.php";
    $sql="SELECT emp_name FROM employee WHERE emp_id='$empId'";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
         return $row["emp_name"];
    }else{
          return "error in name";
    }
 } 

//getAccountCreatedOn
function getAccountCreatedOn($empId){    
    include "../db.php";
    $sql="SELECT emp_joining_date FROM employee WHERE emp_id='$empId'";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
         return date("d-M-Y",strtotime($row["emp_joining_date"]));
    }else{
          return "error in cid";
    }
 } 
 
 //getAccountUpdatedOn
function getAccountUpdatedOn($empId){    
    include "../db.php";
    $sql="SELECT uid FROM employee WHERE emp_id='$empId'";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
            return date("d-M-Y",strtotime($row["uid"]));
    }else{
          return "error in uid";
    }
 } 

 //getEmpPosition
function getEmpPosition($empId){    
    include "../db.php";
    $sql="SELECT emp_position FROM employee WHERE emp_id='$empId'";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
         return $row["emp_position"];
    }else{
          return "error in emp_position";
    }
 } 

//  getNewMessages
 function getMessages($empId){
    include "../db.php";
    $sql="SELECT *,admin.name AS admin_name,admin.image FROM messages left join admin ON messages.admin_id=admin.id 
    WHERE messages.emp_id='$empId' AND messages.status='Active' AND messages.messageStatus='Sent'
     AND messages.viewStatus='NotSeen'  ORDER BY messages.id DESC";    
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
      ?>
         <a href="#" class="list-group-item">
            <div class="list-group-status status-online"></div>
            <img src="./admin/images/<?php echo $row['image'];?>" class="pull-left" style="width:50px;height:50px;border-radius:50%" alt="<?php echo $row["admin_name"];?>"/>
            <span class="contacts-title"><?php echo $row["admin_name"];?></span>
            <p><?php echo $row["message"];?></p>
        </a>
      <?php
    } 
 }

 //getTheme
function getTheme(){
    include "../db.php";
    $sql="SELECT theme FROM theme WHERE id='2'";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
         echo $row["theme"].".css";
    }else{
          return "error";
    }
 }

 //getTheme
function getDistanceLimit($emp_id){
    include "../db.php";
    $sql="SELECT distance_limit FROM assign_location WHERE emp_id='$emp_id'";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
         echo $row["distance_limit"];
    }else{
          return "error";
    }
 }

  //getHolidayDetail
function getNextHolidayDetail(){    
    include "../db.php";
    $start_date=date("Y-m-d");
    $sql="SELECT holiday_date,holiday_event FROM holiday WHERE status='Active' AND holiday_date >='$start_date' LIMIT 0,1";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
         ?>
         <!--- holiday Detail --->
         <div class="col-md-3" style="cursor:pointer">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='./holidays.php';" style="color:#fff;background:#fa625f;">
                                <div class="widget-item-left">
                                    <span class="fa fa-calendar"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-title num-count"><?php echo $row["holiday_event"];?></div>
                                    <div class="widget-title"><?php echo date("d-m-Y",strtotime($row["holiday_date"]));?></div>
                                    <div class="widget-subtitle" style="color:#fff;background:#fa625f;">Upcoming Holiday</div>
                                </div>      
                               
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
         <!--- holiday Detail end --->
         <?php 
    }else{
       ?>
         <!--- holiday Detail --->
         <div class="col-md-3" style="cursor:pointer">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='./holidays.php';" style="color:#fff;background:#fa625f;">
                                <div class="widget-item-left">
                                    <span class="fa fa-calendar"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count" style="color:#fff;background:#fa625f;">Upcoming Holiday</div>
                                    <div class="widget-title">None</div>
                                    <div class="widget-subtitle"></div>
                                </div>      
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
         <!--- holiday Detail end --->
       <?php         
    }
 }
 //getHolidayDetail end 

  //getNextBirthdayDetail
function getNextBirthdayDetail(){    
    include "../db.php";
    $start_month=date("m");
    $sql="SELECT emp_name,emp_dob,image FROM employee WHERE status='Active' AND MONTH(emp_dob)='$start_month' LIMIT 0,1";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
         ?>
         <!--- holiday Detail --->
         <div class="col-md-3" style="cursor:pointer">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon"  style="background-color:#25CCF7;color:#fff;">
                                <div class="widget-item-left">
                                    <img src="./admin/images/birthday-cake.png" width="60" alt="">
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo $row["emp_name"];?></div>
                                    <div class="widget-title"><?php echo date("d-m-Y",strtotime($row["emp_dob"]));?></div>
                                    <div class="widget-subtitle">Upcoming Birthday</div>
                                </div>      
                            
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
         <!--- holiday Detail end --->
         <?php 
    }else{
       ?>
         <!--- holiday Detail --->
         <div class="col-md-3" style="cursor:pointer">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon"  style="background-color:#25CCF7;color:#fff;">
                                <div class="widget-item-left">
                                    <img src="./admin/images/birthday-cake.png" width="60" alt="">
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">Upcoming Birthday</div>
                                    <div class="widget-title">None</div>
                                    <div class="widget-subtitle"></div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
         <!--- holiday Detail end --->
       <?php         
    }
 }
 //getBirthdayDetail end

 
 //getTheme
function getAssignedLocation($emp_id){
    include "../db.php";
    $sql="SELECT master.address AS assigned_address FROM assign_location LEFT JOIN master ON assign_location.location_id=master.id WHERE assign_location.emp_id='$emp_id'";
    $result=$conn->query($sql);
    if($row=$result->fetch_assoc()){ 
         echo $row["assigned_address"];
    }else{
          return "error";
    }
 }
?>
