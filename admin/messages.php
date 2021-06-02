<?php include "./checkSession.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Messages - Admin Panel</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />        
        <link rel="icon" href="./logo.jpg" type="image/x-icon" />
        <!-- END META SECTION -->
                
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/<?php getTheme();?>"/>
        <?php 
           include "./dataTableCSS.php";
        ?>

        <!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body onload="getMessageData()">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
             <?php include "./header.php";?>    

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a></li>                    
                    <li class="active">Messages</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap container">
                            <span style="padding:10px;background:#000066;color:#fff;text-align:left;font-weight:600;font-size:17px;width:100%;margin-bottom:10px;display:block;">
                                        <i class="fa fa-envelope"></i>  Messages Detail's
                            <span style="float:right;margin-right:10px;">
                              <a href="javascript:void(0)" onclick="window.open('./sendNewMessage.php','_blank')" class="text-decoration:none;"
                               title="Send New Messages" data-toggle="tooltip" data-placement="bottom">
                                <i class="fa fa-plus" style="color:#fff;font-size:20px;"></i>                                  
                              </a>
                            </span>

                            </span>
                  <div class="row"><!---row--->                         
                        <div class="col-md-12"><!---col--->                            
                                <div id="messagesData">   
                               </div><!---table-responsive--->
                        </div><!---col--->
                  </div><!---row end--->    
                 </div>                             
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="./logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
        <?php include "./preload.php";?>
        <?php include "./mainScripts.php";?>
        <script>
   function getMessageData(){
        let admin_id='<?php echo $_SESSION["admin_id"];?>';
        $.ajax({
                url:"getMessages.php?admin_id="+admin_id,
                success:function(data){
                    $("#messagesData").html(data);
                }
        });  
   }    
  
        // delete employee
           function deleteMessage(message_id){
                $.ajax({
                    url:"./deleteMessages.php?message_id="+message_id,
                    success:function(data){
                          if(data==="Success"){                                   
                             alertify.success("<span style='color:#fff;font-size:15px;'><i class='fa fa-check-circle'></i> Deleted!!!</span>");
                             getMessageData();
                          }else if(data==="Error"){
                            alertify.error("<span style='color:#fff;font-size:15px;'><i class='fa fa-warning'></i> Oops Error!!!</span>"); 
                          }
                    }
                });
           }
        </script>
     </body>
</html>

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



