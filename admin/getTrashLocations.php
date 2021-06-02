<?php
include "./dataTableCSS.php";
?>
<div class="table-responsive table-striped table-hoverable" style="padding-bottom: 20px;">
  <!---table-responsive--->
  <!--table -->
  <table id="myTable" class=" table table-bordered">
    <thead>
      <th>Location_ID</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Address</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      include "./db.php";
      $sql = "SELECT * FROM master WHERE status='Inactive'";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo $row["lat"]; ?></td>
          <td><?php echo $row["longi"]; ?></td>
          <td><?php echo $row["address"]; ?></td>
          <td>
            <form action="" method="post">
              <div class="dropdown">
                <!---dropdown--->
                <span class="btn"><i class="fa fa-bars"></i> Action</span>
                <div class="dropdown-content">
                  <!-- <a href="./editLocation.php?location_id=<?php #echo $row['id']
                                                                ?>"><i class="fa fa-edit"></i> Edit</a> -->
                  <a href="javascript:void(0)" onclick="alertify.confirm('<h4>Alert</h4>','<h1>Are You Sure?</h1>',function(){removeDeleteLocation(<?php echo $row['id'] ?>)},function(){ alertify.warning('Cancel')});">
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