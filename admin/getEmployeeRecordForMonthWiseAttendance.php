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
            <th>Mobile</th>
            <th>Image</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            include "./db.php";
            $sql = "SELECT DISTINCT * FROM employee  WHERE employee.status='Active'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>

                <tr>
                    <td><?php echo $row["emp_id"]; ?></td>
                    <td><?php echo $row["emp_name"]; ?></td>
                    <td><?php echo $row["emp_email"]; ?></td>
                    <td> <img src="employee/<?php echo $row["image"]; ?>" class="img-fluid img-rounded" width="40" alt="<?php echo $row["emp_name"]; ?>"></td>
                    <td>
                        <form action="" method="post">
                            <div class="dropdown">
                                <!---dropdown--->
                                <?php
                                $year = 1;
                                while ($year <= 12) {
                                ?>
                                    <a href="viewMonthWiseAttendanceRecord.php?emp_id=<?php echo $row["emp_id"]; ?>&month_id=<?php echo $year; ?>" class="btn" style="margin-bottom:4px;">
                                        <i class="fa fa-calendar"></i>
                                        <?php
                                        if ($year === 1) {
                                            echo "Jan";
                                        } else if ($year === 2) {
                                            echo "Feb";
                                        } else if ($year === 3) {
                                            echo "Mar";
                                        } else if ($year === 4) {
                                            echo "Apr";
                                        } else if ($year === 5) {
                                            echo "May";
                                        } else if ($year === 6) {
                                            echo "Jun";
                                        } else if ($year === 7) {
                                            echo "Jul";
                                        } else if ($year === 8) {
                                            echo "Aug";
                                        } else if ($year === 9) {
                                            echo "Sep";
                                        } else if ($year === 10) {
                                            echo "Oct";
                                        } else if ($year === 11) {
                                            echo "Nov";
                                        } else if ($year === 12) {
                                            echo "Dec";
                                        }
                                        ?>
                                    </a>
                                <?php
                                    $year++;
                                }
                                ?>

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