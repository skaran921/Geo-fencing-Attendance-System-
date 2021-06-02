<?php
include "./dataTableCSS.php";
?>
<div class="table-responsive table-striped table-hoverable" style="padding-bottom: 20px;">
  <!---table-responsive--->
  <!--table -->
  <table id="myTable" class=" table table-bordered">
    <thead>
      <th>Name</th>
      <th>Mobile</th>
      <th>Email</th>
      <th>Image</th>
      <th>Working_Hour</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      include "./db.php";
      $today_date = date("Y-m-d");
      $sql = "SELECT DISTINCT * FROM checkin inner JOIN employee ON checkin.userId=employee.emp_id WHERE employee.status='Active' AND DATE(checkin.time) = CURDATE() ORDER BY checkin.userId";
      $result = $conn->query($sql);
      $prev_user_id = 0;
      while ($row = $result->fetch_assoc()) {
        if ($prev_user_id != $row["emp_id"]) {
      ?>

          <tr>

            <td><?php echo $row["emp_name"]; ?> (<?php echo $row["emp_id"]; ?>)</td>
            <td><?php echo $row["emp_mobile"]; ?></td>
            <td><?php echo $row["emp_email"]; ?></td>
            <td> <img src="employee/<?php echo $row["image"]; ?>" class="img-fluid img-rounded" width="40" alt="<?php echo $row["emp_name"]; ?>"></td>
            <td>
              <!-- get totalHours -->
              <?php
              $emp_id = $row["emp_id"];
              $sql1 = "SELECT SUM(TIMESTAMPDIFF(minute,checkin.time,checkout.time)) AS total_minute FROM checkin 
                  left join checkout on checkin.id=checkout.check_in_id WHERE checkin.userId='$emp_id' AND
                   DATE(checkin.time)='$today_date' AND DATE(checkout.time)='$today_date' ORDER BY checkin.time DESC,
                   checkout.time DESC";
              $result1 = $conn->query($sql1);
              if ($row1 = $result1->fetch_assoc()) {
                echo round($row1["total_minute"] / 60, 2) . " Hour's";
              }
              ?>
              <!-- get totalHours -->
            </td>
            <td>
              <form action="" method="post">
                <div class="dropdown">
                  <!---dropdown--->
                  <a href="viewTodayAttendanceRecord.php?emp_id=<?php echo $row["emp_id"]; ?>" class="btn"><i class="fa fa-eye"></i> View</a>

                </div>
                <!---dropdown---->
              </form>
            </td>
          </tr>
      <?php
        }
        $prev_user_id = $row["emp_id"];
      }
      ?>
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
    background: #E71C23;
  }

  button.ajs-button.ajs-cancel {
    background: #2ecc72;
  }
</style>