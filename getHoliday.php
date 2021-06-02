<?php
include "./dataTableCSS.php";
?>
<div class="table-responsive table-striped table-hoverable" style="padding-bottom: 20px;">
  <!---table-responsive--->
  <!--table -->
  <table id="myTable" class=" table table-bordered">
    <thead>
      <th>Sr. No.</th>
      <th>Date</th>
      <th>Holiday</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      include "./db.php";
      $start_date = date("Y-m-d");
      $sql = "SELECT id,holiday_date,holiday_event FROM holiday WHERE status='Active' AND holiday_date >='$start_date'";
      $result = $conn->query($sql);
      $sr = 1;
      while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td><?php echo $sr; ?></td>
          <td><?php echo date("d-m-Y (D)", strtotime($row["holiday_date"])); ?></td>
          <td><?php echo $row["holiday_event"]; ?></td>
          <td>
            <form action="" method="post">
              <div class="dropdown">
                <!---dropdown--->
                <span class="btn"><i class="fa fa-bars"></i> Action</span>
                <div class="dropdown-content">
                  <a href="./editHoliday.php?holiday_id=<?php echo $row['id'] ?>"><i class="fa fa-edit"></i> Edit</a>
                  <a href="javascript:void(0)" onclick="alertify.confirm('<h4>Alert</h4>','<h1>Are You Sure?</h1>',function(){deleteHoliday(<?php echo $row['id'] ?>)},function(){ alertify.warning('Cancel')});">
                    <i class="fa fa-trash-o"></i> Delete</a>
                </div>
              </div>
              <!---dropdown---->
            </form>
          </td>
        </tr>
      <?php
        $sr++;
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