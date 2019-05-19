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