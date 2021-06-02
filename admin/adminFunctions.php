<?php
//getAdminName
function getAdminName($adminId)
{
    include "./db.php";
    $sql = "SELECT name FROM admin WHERE id='$adminId'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        return $row["name"];
    } else {
        return "error in name";
    }
}

//getTotlalEmployee
function getTotalEmployee($adminId)
{
    include "./db.php";
    $sql = "SELECT count(*) as totalEmp FROM employee";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        return $row["totalEmp"];
    } else {
        return "error";
    }
}

//getTotlalEmployee
function getTotalMessage($adminId)
{
    include "./db.php";
    $sql = "SELECT count(*) as totalMsg FROM messages  WHERE viewStatus='NotSeen' AND messages.status='Active'  AND messages.messageStatus='Received' AND admin_id='$adminId'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        return $row["totalMsg"];
    } else {
        return "error";
    }
}

//  getNewMessages
function getMessages($adminId)
{
    include "./db.php";
    $sql = "SELECT *,employee.emp_name,employee.image FROM messages left join employee ON messages.emp_id=employee.emp_id 
    WHERE messages.admin_id='$adminId' AND messages.status='Active' AND messages.messageStatus='Received'
     AND messages.viewStatus='NotSeen'  ORDER BY messages.id DESC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
?>
        <a href="#" class="list-group-item">
            <div class="list-group-status status-online"></div>
            <img src="employee/<?php echo $row['image']; ?>" class="pull-left" style="width:50px;height:50px;border-radius:50%" alt="<?php echo $row["emp_name"]; ?>" />
            <span class="contacts-title"><?php echo $row["emp_name"]; ?></span>
            <p><?php echo $row["message"]; ?></p>
        </a>
    <?php
    }
}

//getAdminImage
function getAdminImage($adminId)
{
    include "./db.php";
    $sql = "SELECT image FROM admin WHERE id='$adminId'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        return $row["image"];
    } else {
        return "error";
    }
}

//getTheme
function getTheme()
{
    include "./db.php";
    $sql = "SELECT theme FROM theme WHERE id='1'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        echo $row["theme"] . ".css";
    } else {
        return "error";
    }
}

// getEmplyee
function getEmployee()
{
    include "./db.php";
    $sql = "SELECT * FROM employee WHERE status='Active'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
    ?>
        <tr>

            <td><?php echo $row["emp_id"]; ?></td>
            <td><?php echo $row["emp_name"]; ?></td>
            <td><?php echo $row["emp_gender"]; ?></td>
            <td><?php echo date("d-m-Y", strtotime($row["emp_dob"])); ?></td>
            <td><?php echo $row["emp_position"]; ?></td>
            <td><?php echo $row["emp_mobile"]; ?></td>
            <td><?php echo $row["emp_email"]; ?></td>
            <td><?php echo $row["emp_address"]; ?></td>
            <td><?php echo date("d-m-Y", strtotime($row["emp_joining_date"])); ?></td>
            <td> <img src="employee/<?php echo $row["image"]; ?>" class="img-fluid img-rounded" width="40" alt="<?php echo $row["emp_name"]; ?>"></td>
            <td>
                <form action="" method="post">
                    <div class="dropdown">
                        <!---dropdown--->
                        <span class="btn"><i class="fa fa-bars"></i> Action</span>
                        <div class="dropdown-content">
                            <a href="./editEmployee.php?emp_id=<?php echo $row['emp_id'] ?>"><i class="fa fa-edit"></i> Edit</a>
                            <a href="javascript:void(0)" onclick="deleteEmp(<?php echo $row['emp_id'] ?>)"><i class="fa fa-trash-o"></i> Delete</a>
                        </div>
                    </div>
                    <!---dropdown---->
                </form>
            </td>
        </tr>
    <?php
    }
}
// getAttendanceRecord
function getAttendanceRecord($adminId)
{
    include "./db.php";
    $sql = "SELECT checkIn.lat AS checkInLat,checkin.time as checkinTime,checkout.time as checkoutTime FROM checkin left join checkout on checkin.id=check_in_id 
                                                       ORDER BY checkin.time DESC,checkout.time DESC";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td>
                <?php echo $row["checkInLat"]; ?>
            </td>
        </tr>
    <?php
    }
}


//getHolidayDetail
function getNextHolidayDetail()
{
    include "./db.php";
    $start_date = date("Y-m-d");
    $sql = "SELECT holiday_date,holiday_event FROM holiday WHERE status='Active' AND holiday_date >='$start_date' LIMIT 0,1";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
    ?>
        <!--- holiday Detail --->
        <div class="col-md-3" style="cursor:pointer">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='./holidays.php';">
                <div class="widget-item-left">
                    <span class="fa fa-calendar"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-title num-count"><?php echo $row["holiday_event"]; ?></div>
                    <div class="widget-title"><?php echo date("d-m-Y", strtotime($row["holiday_date"])); ?></div>
                    <div class="widget-subtitle">Upcoming Holiday</div>
                </div>

            </div>
            <!-- END WIDGET MESSAGES -->

        </div>
        <!--- holiday Detail end --->
    <?php
    } else {
    ?>
        <!--- holiday Detail --->
        <div class="col-md-3" style="cursor:pointer">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='./holidays.php';">
                <div class="widget-item-left">
                    <span class="fa fa-calendar"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">Upcoming Holiday</div>
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
//getHolidayDetail end 

//getNextBirthdayDetail
function getNextBirthdayDetail()
{
    include "./db.php";
    $start_month = date("m");
    $sql = "SELECT emp_name,emp_dob,image FROM employee WHERE status='Active' AND MONTH(emp_dob)='$start_month' LIMIT 0,1";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
    ?>
        <!--- holiday Detail --->
        <div class="col-md-3" style="cursor:pointer">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <img src="./images/birthday-cake.png" width="60" alt="">
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count"><?php echo $row["emp_name"]; ?></div>
                    <div class="widget-title"><?php echo date("d-m-Y", strtotime($row["emp_dob"])); ?></div>
                    <div class="widget-subtitle">Upcoming Birthday</div>
                </div>

            </div>
            <!-- END WIDGET MESSAGES -->

        </div>
        <!--- holiday Detail end --->
    <?php
    } else {
    ?>
        <!--- holiday Detail --->
        <div class="col-md-3" style="cursor:pointer">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='./holidays.php';">
                <div class="widget-item-left">
                    <span class="fa fa-user">
                    </span>
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

//getTotlalLocation
function getTotalLocation()
{
    include "./db.php";
    $sql = "SELECT count(*) as totalLocation FROM master WHERE status='Active'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        return $row["totalLocation"];
    } else {
        return "error";
    }
}

//getTotlalPresentEmployee
function getTotlalPresentEmployee()
{
    include "./db.php";
    $date = date("Y-m-d");
    $sql = "SELECT count( DISTINCT userId) as totalPresentEmployee FROM checkin WHERE DATE(time)='$date'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        return $row["totalPresentEmployee"];
    } else {
        return "error";
    }
}

?>