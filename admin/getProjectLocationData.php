<?php
include "./dataTableCSS.php";
?>
<div class="table-responsive table-striped table-hoverable" style="padding-bottom: 20px;">
  <!---table-responsive--->
  <!--table -->
  <table id="myTable" class=" table table-bordered">
    <thead>
      <th>Project Name</th>
      <th>Location</th>
      <th>Distance_Limit</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      include "./db.php";
      $sql = "SELECT *,assign_project_location.id as assign_project_location_id FROM assign_project_location
         left join projects on assign_project_location.project_id=projects.project_id 
         left JOIN master on assign_project_location.location_id=master.id  
         WHERE assign_project_location.status='Active'";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td><?php echo $row["project_name"]; ?></td>
          <td><?php echo $row["address"]; ?></td>
          <td><?php echo $row["distance_limit"]; ?></td>

          <td>
            <form action="" method="post">
              <div class="dropdown">
                <!---dropdown--->
                <span class="btn"><i class="fa fa-bars"></i> Action</span>
                <div class="dropdown-content">
                  <a href="./editAssignProjectLocation.php?project_Location_id=<?php echo $row['assign_project_location_id'] ?>"><i class="fa fa-edit"></i> Edit</a>
                  <a href="javascript:void(0)" onclick="alertify.confirm('<h4>Alert</h4>','<h1>Are You Sure?</h1>',function(){deleteAssignLocation(<?php echo $row['assign_project_location_id'] ?>)},function(){ alertify.warning('Cancel')});">
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