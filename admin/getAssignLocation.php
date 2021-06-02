<?php
include "./dataTableCSS.php";
?>
<div class="table-responsive table-striped table-hoverable" style="padding-bottom: 20px;">
  <!---table-responsive--->
  <!--table -->
  <table id="myTable" class=" table table-bordered">
    <thead>
      <th>Emp_ID</th>
      <th>Emp_Name</th>
      <th>Emp_Position</th>
      <th>image</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Address</th>
      <th>Distance Limit</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      include "./db.php";
      $sql = "SELECT *,assign_location.id as assign_locationId FROM assign_location left join employee on assign_location.emp_id=employee.emp_id INNER JOIN master on assign_location.location_id=master.id  WHERE assign_location.status='Active'       ";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td><?php echo $row["emp_id"]; ?></td>
          <td><?php echo $row["emp_name"]; ?></td>
          <td><?php echo $row["emp_position"]; ?></td>
          <td><img src="./employee/<?php echo $row["image"]; ?>" class="img-fluid" style="max-width:60px;" /></td>
          <td><?php echo $row["lat"]; ?></td>
          <td><?php echo $row["longi"]; ?></td>
          <td><?php echo $row["address"]; ?></td>
          <td><?php echo $row["distance_limit"] . " Meter"; ?></td>
          <td>
            <form action="" method="post">
              <div class="dropdown">
                <!---dropdown--->
                <span class="btn"><i class="fa fa-bars"></i> Action</span>
                <div class="dropdown-content">
                  <a href="./editAssignLocation.php?assignLocation_id=<?php echo $row['assign_locationId'] ?>"><i class="fa fa-edit"></i> Edit</a>
                  <a href="javascript:void(0)" onclick="alertify.confirm('<h4>Alert</h4>','<h1>Are You Sure?</h1>',function(){deleteAssignLocation(<?php echo $row['assign_locationId'] ?>)},function(){ alertify.warning('Cancel')});">
                    <i class="fa fa-trash-o"></i> Delete</a>
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