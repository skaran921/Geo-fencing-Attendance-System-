
<link rel="stylesheet" href="">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<style>
    .table > thead > tr > th {
        background:#3498DB;
        color:#fff;
        font-size:14px;
        box-sizing:border-box;
        text-align:center;
        width:80px !important;
        padding:10px;
    }

    .table > tbody > tr >td{
        text-align:center;
        font-size:12px;
        color:#111;
        font-weight:600;
    }
    .table > tbody > tr:hover{
          background:rgba(180,180,180,0.6) !important;
          cursor:pointer;
    }

    .table > tbody > tr:nth-child(even){
        background:#Fff;
    }

    .table > tbody > tr:nth-child(odd){
        background:whitesmoke;
    }
     table .btn{
         font-weight:600;
         background:#000066;
         color:#fff;
         border-radius:4px;
     }
    .btn:hover{
          background:rgba(0,0,250,0.8) !important;
          color:#fff;
    }

    .dropdown{
        position:relative;
        display:inline-block;
    }

    .dropdown-content{
        display:none;
        position:absolute;
        z-index:1;
        min-width:100%;
        box-sizing:border-box;
        background-color:#f9f9f9;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }

    .dropdown-content a{
        display:block;
        float:left;
        text-decoration:none;
        border-top:1px solid #ddd;
        width:100%;
        color:#fff;
        text-align:left;
        padding:7px;
        background:#000066;
    }

    .dropdown-content a:hover{
        background-color:#192A56;          
    }

    .dropdown:hover .dropdown-content{
        display:block;
    }
</style>