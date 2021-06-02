<?php
include "./dataTableCSS.php";
?>
<div class="table-responsive table-striped table-hoverable" style="padding-bottom: 20px;">
  <!---table-responsive--->
  <!--table -->
  <table id="myTable" class=" table table-bordered">
    <thead>
      <th>Emp_ID</th>
      <th>Name</th>
      <th>Gender</th>
      <th>DOB</th>
      <th>Position</th>
      <th>Mobile</th>
      <th>Email</th>
      <th>Address</th>
      <th>Joining Date</th>
      <th>Image</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      include "./db.php";
      $sql = "SELECT * FROM employee WHERE status='Inactive'";
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
                  <!-- <a href="./editEmployee.php?emp_id=<?php #echo $row['emp_id']
                                                          ?>"><i class="fa fa-edit"></i> Edit</a> -->
                  <a href="javascript:void(0)" onclick="alertify.confirm('<h4>Alert</h4>','<h1>Are You Sure?</h1>',function(){removeDeleteEmp(<?php echo $row['emp_id'] ?>)},function(){ alertify.warning('Cancel')});">
                    <i class="fa fa-recycle"></i> Remove</a>
                </div>
              </div>
              <!---dropdown---->
            </form>
          </td>
        </tr>
      <?php
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