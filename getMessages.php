<?php 
  include "./dataTableCSS.php";
?>
<div class="table-responsive table-striped table-hoverable" style="padding-bottom: 20px;"><!---table-responsive--->  
  <!--table -->
  <table id="myTable" class="disableOrdering table table-bordered">
    <thead>
	    <th>Time</th>
        <th>Admin_name</th>
        <th>Message</th>
        <th>Action</th>
    </thead>
    <tbody>
    <?php 
         $emp_id=$_GET["emp_id"];
        include "./db.php";
        $sql="SELECT *,admin.name AS admin_name,admin.image As admin_image,employee.emp_name,employee.image As emp_image FROM messages
         		left join admin ON messages.admin_id=admin.id 
                left join employee ON messages.emp_id=employee.emp_id
                WHERE messages.emp_id='$emp_id' AND messages.status='Active' ORDER BY messages.u_id DESC";
        $result=$conn->query($sql); 
  while($row=$result->fetch_assoc()){ 
      ?>
        <tr>    
			 <td><?php echo $row["u_id"];?></td>
            <td>
			   <?php 
			       if($row["messageStatus"]==="Received"){
			   ?>
                  <img src="./admin/employee/<?php echo $row['emp_image'];?>" class="img-fluid" style="width:60px;height:50px;border-radius:50%" alt="img">	
			   <?php 
			      echo $row["emp_name"];
			     }else{
			   ?>
                  <img src="./admin/images/<?php echo $row['admin_image'];?>" class="img-fluid" style="width:60px;height:50px;border-radius:50%" alt="img">
			   <?php
			      echo $row["admin_name"];
			   }
			   ?>  
          
            </td> 
            <td><?php echo $row["message"];?></td> 
           <td>
                <form action="" method="post">
                 <div class="dropdown"><!---dropdown--->
                       <span class="btn"><i class="fa fa-bars"></i> Action</span>
                       <div class="dropdown-content">
                             <a href="javascript:void(0)" onclick="alertify.confirm('<h4>Alert</h4>','<h1>Are You Sure?</h1>',function(){deleteMessage(<?php echo $row['id']?>)},function(){ alertify.warning('Cancel')});">
                             <i class="fa fa-trash-o"></i> Delete</a>
                       </div>
                 </div><!---dropdown----> 
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

 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script> 
    
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
			"order": [[ 0, "desc" ]],
            fixedColumns: true,
            dom: 'lBfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });

        $("input[type='search'],select").addClass('form-control');
        $(".buttons-copy").prepend("<i class='fa fa-copy'></i>&nbsp;");
        $(".buttons-csv").prepend("<i class='fa fa-file-o text-info'></i>&nbsp;");
        $(".buttons-excel").prepend("<i class='fa fa-file-excel-o text-success'></i>&nbsp;");
        $(".buttons-pdf").prepend("<i class='fa fa-file-pdf-o text-danger'></i>&nbsp;");
        $(".buttons-print").prepend("<i class='fa fa-print text-primary'></i>&nbsp;");
        $('[data-toggle="tooltip"]').tooltip(); 
    } );
</script> 	   


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