<?php 
require '../../config/connection.php';
//  date_default_timezone_set('Asia/Manila');
session_start();
$username = $_SESSION['username'];
//echo date('d/m/Y');
// echo date('d/m/Y h:i:s a')
?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ITAMS - Assets</title>

    <!-- Custom fonts for this template -->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <!-- <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets//fontawesome_1/css/all.min.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="../../datatable/datatables.css">
    <link rel="stylesheet" href="../../assets/file_input/css/fileinput.css">
    <link rel="stylesheet" href="../../assets/selectize/dist/css/selectize.bootstrap5.css">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="icon" href="../../assets/itcenter.png">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../user/dash.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">IT Assets</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../user/dash.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../user/asset.php">
                    <i class="fas fa-plus-circle"></i>
                    <span>Add Asset</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../user/cancel_asset.php">
                    <i class="fas fa-ban"></i>
                    <span>Cancel Asset</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../user/modify_asset.php">
                <i class="fa-solid fa-pen-to-square"></i>
                    <span>Modify Asset</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../user/transfer_asset.php">
                    <i class="fa-solid fa-right-left"></i>
                    <span>Transfer Asset</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Set-Up Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add Master:</h6>
                        <a class="collapse-item" href="../user/create_grp.php">Create Group</a>
                        <a class="collapse-item" href="../user/create_type.php">Create Type</a>
                        <a class="collapse-item" href="../user/create_ass_grp.php">Create Assets Group</a>
                        <a class="collapse-item" href="../user/create_sub_ass_grp.php">Create Sub Asset Type</a>
                        <a class="collapse-item" href="../user/create_brand.php">Create Brand</a>
                        <a class="collapse-item" href="../user/create_model.php">Create Model</a>
                        <a class="collapse-item" href="../user/master.php">Brand & Model</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Report
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span>History</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">History:</h6>
                        <a class="collapse-item" href="../user/added_asset.php">Added Asset</a>
                        <a class="collapse-item" href="../user/cancelled_asset.php">Cancelled Asset</a>
                        <a class="collapse-item" href="../user/modified_asset.php">Modified Asset</a>
                        <a class="collapse-item" href="../user/transferred_asset.php">Transferred Asset</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../user/chart.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> -->
                            <!-- Dropdown - Messages -->
                            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <style>
                    @media only screen and (min-width: 768px) {
                    .form {
                        width: 50%;
                    }
                    }
                    .form-select, .form-control, .selectize {
                        border-radius: 0;
                        border: 2px solid #d9d9d9;
                        background-color: #DCDCDC;
                    }
                    .form-select:focus, .form-control:focus, .selectize:focus {
                        box-shadow: none;
                    }
                    .form-select, .form-label, .form-control{
                        color: #666666;
                    }

                    .main-section{
                        margin:0 auto;
                        padding: 20px;
                        margin-top: 20px;
                        height: auto;
                        width: auto;
                        background-color: #fff;
                        box-shadow: 0px 0px 10px #c1c1c1;
                    }
                    .fileinput-remove,
                    .fileinput-upload{
                        display: none;
                    }

                    .panel-default>.panel-heading {
                        color: #333;
                        text-decoration: none;
                        background-color: #e6e6e6;
                        border-color: #e4e5e7;
                        padding: 0;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        }

                    .panel-default>.panel-heading a {
                        color: black;
                        display: block;
                        padding: 10px 15px;
                        text-decoration: none;
                    }

                    .panel-default>.panel-heading a:after {
                        content: "";
                        position: relative;
                        top: 1px;
                        display: inline-block;
                        font-family: 'Arial';
                        font-style: normal;
                        font-weight: 400;
                        line-height: 1;
                        -webkit-font-smoothing: antialiased;
                        -moz-osx-font-smoothing: grayscale;
                        float: right;
                        transition: transform .25s linear;
                        -webkit-transition: -webkit-transform .25s linear;
                    }

                    .panel-default>.panel-heading a[aria-expanded="true"] {
                        background-color: #e6e6e6;
                    }

                    .panel-default>.panel-heading a[aria-expanded="true"]:after {
                        content: "\2212";
                        -webkit-transform: rotate(180deg);
                        transform: rotate(180deg);
                        font-weight: 900;
                    }

                    .panel-default>.panel-heading a[aria-expanded="false"]:after {
                        content: "\002b";
                        -webkit-transform: rotate(90deg);
                        transform: rotate(90deg);
                        font-weight: 900;
                    }
                    h1 { font-size: 28px; }
                    h4, modal-title { font-size: 18px; font-weight: bold; }
                </style>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card-header" style="background-color: #4e73df;">
                        <h2 class="m-0 font-weight-bold" style="color: white; text-align: center">Add Asset</h2>
                    </div>
                    <br>
                    <div class="card" style="border: 1px solid #e6e6e6">
                    <br>
                    <form method='POST' enctype='multipart/form-data' id='info_Form'>
                        <div class="container-fluid">
                            <div class="body-message">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="card needs-validation" novalidate style="border: 2px solid #e6e6e6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h3 class="panel-title font-weight-bold" style="color: #000">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Details Information
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <div class="row mb-3" style="margin-left: 7px;">
                                                        <div class="col-md-4">
                                                            <label style="margin-right: -20px; color: black">PO Number:</label>
                                                            <select type="text" class="form-select" id="po_no" name="po_no[]">
                                                            <option value=""></option>
                                                                <?php 
                                                                    $sql = "SELECT DISTINCT PO_NO FROM IT_ASSET_PO";
                                                                    $res = oci_parse(connection(), $sql);
                                                                    oci_execute($res);

                                                                    while($row = oci_fetch_row($res)){
                                                                        echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                        <button class="btn btn-secondary" id="set_po" type="button" style="height:35px; margin-top:33px">
                                                            <i class="fa-solid fa-check"></i> Select</button>

                                                            <button class="btn btn-warning" id="reset_po" type="button" style="height:35px; margin-top:33px">
                                                            <i class="fa-solid fa-arrows-rotate"></i> Reset</button>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3" style="margin-left: 7px;">
                                                        <div class="col-sm-8">
                                                            <button class="btn" id="add_btn" type="button" style="background-color: #26d991; color: white">
                                                            <i class="fa-solid fa-plus"></i> Add</button>
                                                            <button class="btn btn-primary" id="edit_btn" type="button">
                                                            <i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                                            <button class="btn" id="remove_btn" type="button" style="background-color: #ff0000; color: white">
                                                            <i class="fa-solid fa-trash-can"></i> Remove</button>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="table-responsive">
                                                        <table class="display nowrap" id="dtl_dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th style="max-width: 200px;">Employee Name</th>
                                                                    <th style="width: 200px;">Department</th>
                                                                    <th style="width: 200px;">Employee ID</th>
                                                                    <th style="width: 200px;">Employee Address</th>
                                                                    <th style="width: 200px;">Working Location</th>
                                                                    <th style="width: 200px;">Office Phone</th>
                                                                    <th style="width: 200px;">Mobile Phone</th>
                                                                    <th style="width: 200px;">Hired Date</th>
                                                                    <th style="width: 200px;">Personal Email</th>
                                                                    <th style="width: 200px;">Business Email</th>
                                                                    <th style="width: 200px;" hidden>Reference Person</th>
                                                                    <th style="width: 200px;">PO Number</th>
                                                                    <th style="max-width: 200px;">Supplier</th>
                                                                    <th style="width: 200px;">Request Group</th>
                                                                    <th style="width: 200px;">Request Type</th>
                                                                    <th style="width: 200px;">Asset Group</th>
                                                                    <th style="width: 200px;">Asset Sub Group</th>
                                                                    <th style="width: 200px;">Brand</th>
                                                                    <th style="width: 200px;">Model</th>
                                                                    <th style="width: 200px;">Series</th>
                                                                    <th style="width: 200px;">Unit Price</th>
                                                                    <th style="width: 200px;">Serial Number 1</th>
                                                                    <th style="width: 200px;">Serial Number 2</th>
                                                                    <th style="width: 200px;">Serial Number 3</th>
                                                                    <th style="width: 200px;">Serial Number 4</th>
                                                                    <th style="width: 200px;">Asset Code</th>
                                                                    <th style="width: 200px;">Delivery Note</th>
                                                                    <th style="width: 200px;">Delivery Date</th>
                                                                    <th style="width: 200px;">Material Short</th>
                                                                    <th style="width: 200px;">License Month Start</th>
                                                                    <th style="width: 200px;">License Month</th>
                                                                    <th style="width: 200px;">License Expiry Date</th>
                                                                    <th style="width: 200px;">Warranty Month Start</th>
                                                                    <th style="width: 200px;">Warranty Month</th>
                                                                    <th style="width: 200px;">Warranty Expiry Date</th>
                                                                    <th style="width: 200px;">Asset Flag</th>
                                                                    <th style="width: 200px;">Remarks</th>
                                                                    <th style="width: 200px;">PO Doc Date</th>
                                                                    <th style="width: 200px;">Plant</th>
                                                                    <th style="width: 200px;">Status</th>
                                                                    <th style="width: 200px;">Quantity</th>
                                                                    <th style="width: 200px;">Unit</th>
                                                                    <th style="width: 200px;">PO ITEM</th>
                                                                    <th style="width: 200px;" hidden>Supp</th>
                                                                    <th style="width: 200px;" hidden>Req Group</th>
                                                                    <th style="width: 200px;" hidden>Req Type</th>
                                                                    <th style="width: 200px;" hidden>Asset</th>
                                                                    <th style="width: 200px;" hidden>Sub Asset</th>
                                                                    <th style="width: 200px;" hidden>Brand</th>
                                                                    <th style="width: 200px;" hidden>Model</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="dtl_body">
                                                                <!-- <tr>
                                                                    <td style='text-align: center'><i name='icon[]' class='fa-solid fa-trash-can' onclick='SomeDeleteRowFunction(this)' style='cursor: pointer; color:red'></i></td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="po_numb" name='po_numb[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('po_numb').value = "<?php echo ($_POST['po_numb']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="plant" name='plant[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('plant').value = "<?php echo ($_POST['plant']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="supp_name" name='supp_name[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('supp_name').value = "<?php echo ($_POST['supp_name']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="short_text" name='short_text[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('short_text').value = "<?php echo ($_POST['short_text']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="po_itm_txt" name='po_itm_txt[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('po_itm_txt').value = "<?php echo ($_POST['po_itm_txt']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="po_qty" name='po_qty[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('po_qty').value = "<?php echo ($_POST['po_qty']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="order_unt" name='order_unt[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('order_unt').value = "<?php echo ($_POST['order_unt']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="po_itm_price" name='po_itm_price[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('po_itm_price').value = "<?php echo ($_POST['po_itm_price']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="po_doc_date" name='po_doc_date[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('po_doc_date').value = "<?php echo ($_POST['po_doc_date']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="po_stat" name='po_stat[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('po_stat').value = "<?php echo ($_POST['po_stat']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="po_item" name='po_item[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('po_item').value = "<?php echo ($_POST['po_item']);?>";
                                                                        </script>
                                                                    </td>
                                                                </tr> -->
                                                                <!--<tr>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="empName" name='empName[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('empName').value = "<?php echo ($_POST['empName']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="depart" name='depart[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('depart').value = "<?php echo ($_POST['depart']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="empID" name='empID[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('empID').value = "<?php echo ($_POST['empID']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="empAdd" name='empAdd[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('empAdd').value = "<?php echo ($_POST['empAdd']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="workLoc" name='workLoc[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('workLoc').value = "<?php echo ($_POST['workLoc']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="offPhone" name='offPhone[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('offPhone').value = "<?php echo ($_POST['offPhone']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="mobPhone" name='mobPhone[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('mobPhone').value = "<?php echo ($_POST['mobPhone']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="hireDate" name='hireDate[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('hireDate').value = "<?php echo ($_POST['hireDate']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="perEmail" name='perEmail[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('perEmail').value = "<?php echo ($_POST['perEmail']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="busEmail" name='busEmail[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('busEmail').value = "<?php echo ($_POST['busEmail']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="refPer" name='refPer[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('refPer').value = "<?php echo ($_POST['refPer']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="poNum" name='poNum[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('poNum').value = "<?php echo ($_POST['poNum']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="splr" name='splr[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('splr').value = "<?php echo ($_POST['splr']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="reqGrp" name='reqGrp[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('reqGrp').value = "<?php echo ($_POST['reqGrp']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="reqType" name='reqType[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('reqType').value = "<?php echo ($_POST['reqType']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="assGrp" name='assGrp[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('assGrp').value = "<?php echo ($_POST['assGrp']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="subGrp" name='subGrp[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('subGrp').value = "<?php echo ($_POST['subGrp']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="brandInfo" name='brandInfo[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('brandInfo').value = "<?php echo ($_POST['brandInfo']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="modelInfo" name='modelInfo[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('modelInfo').value = "<?php echo ($_POST['modelInfo']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="priceInfo" name='priceInfo[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('priceInfo').value = "<?php echo ($_POST['priceInfo']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="serNo1" name='serNo1[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('serNo1').value = "<?php echo ($_POST['serNo1']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="serNo2" name='serNo2[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('serNo2').value = "<?php echo ($_POST['serNo2']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="serNo3" name='serNo3[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('serNo3').value = "<?php echo ($_POST['serNo3']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="serNo4" name='serNo4[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('serNo4').value = "<?php echo ($_POST['serNo4']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="assCode" name='assCode[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('assCode').value = "<?php echo ($_POST['assCode']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="delNote" name='delNote[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('delNote').value = "<?php echo ($_POST['delNote']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="delDate" name='delDate[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('delDate').value = "<?php echo ($_POST['delDate']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="mtrlShrt" name='mtrlShrt[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('mtrlShrt').value = "<?php echo ($_POST['mtrlShrt']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="licStrt" name='licStrt[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('licStrt').value = "<?php echo ($_POST['licStrt']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="licMonth" name='licMonth[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('licMonth').value = "<?php echo ($_POST['licMonth']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="licExp" name='licExp[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('licExp').value = "<?php echo ($_POST['licExp']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="warStrt" name='warStrt[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('warStrt').value = "<?php echo ($_POST['warStrt']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="warMonth" name='warMonth[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('warMonth').value = "<?php echo ($_POST['warMonth']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="warExp" name='warExp[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('warExp').value = "<?php echo ($_POST['warExp']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="remInfo" name='remInfo[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('remInfo').value = "<?php echo ($_POST['remInfo']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="attInfo" name='attInfo[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('attInfo').value = "<?php echo ($_POST['attInfo']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="podocDate" name='podocDate[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('podocDate').value = "<?php echo ($_POST['podocDate']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="plantInfo" name='plantInfo[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('plantInfo').value = "<?php echo ($_POST['plantInfo']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="statusInfo" name='statusInfo[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('statusInfo').value = "<?php echo ($_POST['statusInfo']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="poName" name='poName[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('poName').value = "<?php echo ($_POST['poName']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="qtyInfo" name='qtyInfo[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('qtyInfo').value = "<?php echo ($_POST['qtyInfo']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="unitInfo" name='unitInfo[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('unitInfo').value = "<?php echo ($_POST['unitInfo']);?>";
                                                                        </script>
                                                                    </td>
                                                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                                                        <input id="poItem" name='poItem[]' type="text" autocomplete="off" 
                                                                        style=" background-color: transparent">                                           
                                                                        
                                                                        <script>
                                                                            document.getElementById('poItem').value = "<?php echo ($_POST['poItem']);?>";
                                                                        </script>
                                                                    </td>
                                                                </tr> -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                              
                                    </div>
                                    <br>
                                    <div class="card" style="border: 2px solid #e6e6e6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h3 class="panel-title font-weight-bold" style="color: #000">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_Three" aria-expanded="false" aria-controls="collapse_Three">
                                                        Attachment
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="collapse_Three" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">   
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-sm-12 col-11 main-section">
                                                                <form enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <div class="file-loading">
                                                                            <input id="attch1" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                                                                        </div>
                                                                    </div>
                                                                </form>            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <button id="save_btn1" class="btn btn-success" type="button">
                                            <i class="fa-solid fa-floppy-disk"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                        <!-- Page Heading -->
                        <!-- <h1 class="h3 mb-2 text-gray-800">Add New Asset</h1> -->
                    <!-- <form method='POST' enctype='multipart/form-data' id='requestForm' target='_blank'> -->

                    <!-- RECEIVER AND INFORMATION MODAL -->
                    <div class="modal fade" id="info" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="infomodal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form id="info-form">
                                    <div class="modal-header">
                                        <!-- <h5 class="modal-title" id="infomodal">Information</h5> -->
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <br>

                                    <form class="needs-validation" novalidate method='POST' enctype='multipart/form-data' id='info_Form1'>
                                        <div class="container-fluid">
                                            <div class="body-message">
                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <div class="card" style="border: 2px solid #e6e6e6">
                                                        <!-- <div class="cardHeader">
                                                            <h2 class='h2-unstyled' style="margin-left:20px">Receiver Information</h2>
                                                        </div> -->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="headingOne">
                                                                <h3 class="panel-title font-weight-bold" style="color: #000">
                                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_One" aria-expanded="true" aria-controls="collapse_One">
                                                                        Receiver Information
                                                                    </a>
                                                                </h3>
                                                            </div>                                                            
                                                            <!-- <div class="row mb-3" style="margin-left: 40px;">
                                                                <label class="col-sm-2" style="margin-right: -20px; color: black">Department:</label>
                                                                <div class="col-sm-3">
                                                                <select type="text" class="form-control" list="dept_list" id="department" 
                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px;">
                                                                    <option value=""></option>
                                                                    <?php 
                                                                        // $sql= "SELECT DEPTID, DESCR FROM DEPARTMENT_TBL WHERE DEPTID LIKE 'PHL%'";
                                                                        // $result = oci_parse(connection1(), $sql);
                                                                        // oci_execute($result);
                                                                        // while ($row = oci_fetch_row($result)){
                                                                        // echo "<option value='$row[0]'>".htmlspecialchars($row[1], ENT_IGNORE)."</option>";
                                                                        // }
                                                                    ?>
                                                                </select>
                                                                </div> -->

                                                                <!-- <label class="col-sm-2" style="margin-right: -20px; color: black">Employee Name:</label>
                                                                <div class="col-sm-3">
                                                                <select type="text" class="form-select" id="empl_name" readonly 
                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;"> 
                                                                    <option value=""></option>

                                                                </select>
                                                                </div>
                                                            </div> -->

                                                            <!-- <div class="row mb-3" style="margin-left: 40px;">
                                                                <label class="col-sm-2" style="margin-right: -50px; color: black">Department:</label>
                                                                <div class="col-sm-8">
                                                                <select type="text" class="form-select" list="dept_list" id="department" 
                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px;">
                                                                    <option value=""></option>
                                                                    <?php 
                                                                        // $sql= "SELECT DEPTID, DESCR FROM DEPARTMENT_TBL WHERE DEPTID LIKE 'PHL%'";
                                                                        // $result = oci_parse(connection1(), $sql);
                                                                        // oci_execute($result);
                                                                        // while ($row = oci_fetch_row($result)){
                                                                        // echo "<option value='$row[0]'>".htmlspecialchars($row[1], ENT_IGNORE)."</option>";
                                                                        // }
                                                                    ?>
                                                                </select>
                                                                </div>
                                                            </div> -->
                                                            <div id="collapse_One" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                                <div class="panel-body">
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Employee Name *</label>
                                                                        <select type="text" class="form-select" id="empl_name" placeholder=" " required readonly style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                            <option value="">Select Name....</option>
                                                                            <?php 
                                                                                $sql = "SELECT A.NAMEENG, A.EMPLID FROM PERSON_TBL A, JOBCUR_EE B 
                                                                                WHERE B.EMPLID = A.EMPLID
                                                                                and B.EMPL_STATUS = 'A'
                                                                                ORDER BY A.NAMEENG ASC";
                                                                                $result = oci_parse(connection1(), $sql);
                                                                                oci_execute($result);
                                                                                while ($row = oci_fetch_row($result)){
                                                                                    echo "<option value='$row[1]'>".htmlspecialchars($row[0], ENT_IGNORE)."</option>";
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="row g-3" style="margin: auto">
                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Department</label>
                                                                            <input type="text" class="form-control" id="dept" readonly style="background-color: #e6e6e6;">
                                                                            <!-- <select type="text" class="form-select" list="dept_list" id="department">
                                                                                <option value=""></option>
                                                                                <?php 
                                                                                    // $sql= "SELECT DEPTID, DESCR FROM DEPARTMENT_TBL WHERE DEPTID LIKE 'PHL%'";
                                                                                    // $result = oci_parse(connection1(), $sql);
                                                                                    // oci_execute($result);
                                                                                    // while ($row = oci_fetch_row($result)){
                                                                                    // echo "<option value='$row[0]'>".htmlspecialchars($row[1], ENT_IGNORE)."</option>";
                                                                                    // }
                                                                                ?>
                                                                            </select> -->
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Employee ID</label>
                                                                            <input type="text" class="form-control" id="emp_id" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Employee Address</label>
                                                                            <input type="text" class="form-control" id="emp_add" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Working Location</label>
                                                                            <input type="text" class="form-control" id="work_loc" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Office Phone</label>
                                                                            <input type="text" class="form-control" id="off_phone" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Mobile Phone</label>
                                                                            <input type="text" class="form-control" id="mob_phone" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Hired Date</label>
                                                                            <input type="text" class="form-control" id="hired_date" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Personal Email</label>
                                                                            <input type="text" class="form-control" id="per_email" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Business Email</label>
                                                                            <input type="text" class="form-control" id="bus_email" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4" hidden>
                                                                            <label class="form-label">Reference Person</label>
                                                                            <input type="text" class="form-control" id="ref_person" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>
                                                                    </div>

                                                                    <!-- <div class="row g-2" style="margin-left: 40px;">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                                <select type="text" class="form-select" id="empl_name" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                                <option selected=" ">Select Name....</option>
                                                                                </select>
                                                                                <label>Employee Name:</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="emp_id" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Employee ID:</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                                <input type="text" class="form-control" id="emp_add" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                                <label>Employee Address:</label>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->

                                                                    <!-- <div class="row g-2" style="margin-left: 40px;">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="work_loc" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Working Location:</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                                <input type="text" class="form-control" id="off_phone" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                                <label>Offcie Phone:</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="mob_phone" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Mobile Phone:</label>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->

                                                                    <!-- <div class="row g-2" style="margin-left: 40px;">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="hired_date" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Hired Date:</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="per_email" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Personal Email:</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="bus_email" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Business Email:</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row g-2" style="margin-left: 40px;">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="ref_person" placeholder=" " style="background-color: #FFFFFF;">
                                                                            <label>Reference Person:</label>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
                                                                    <!-- <div class="col-md-4" style='justify-content: end; display: flex; height:35px; margin-top: 40px'>
                                                                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i>&nbspAdd</button>
                                                                    </div> -->
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <!-- <div id="filter" class='card container' style="width: calc(100% - 40px);"> -->
                                                    <div class="card" style="border: 2px solid #e6e6e6">
                                                        <div class="panel panel-default">
                                                            <!-- <div class="cardHeader">
                                                                <h2 class='h2-unstyled' style="margin-left:20px">Item Information</h2>
                                                            </div> -->
                                                            <div class="panel-heading" role="tab" id="heading_Two">
                                                                <h3 class="panel-title font-weight-bold" style="color: #000">
                                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_2" aria-expanded="false" aria-controls="collapse_2">
                                                                        Item Information
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <!-- <div class="row mb-3" style="margin-left: 40px;">
                                                                <label class="col-sm-2"  style="margin-right: -20px; color: black">PO Number:</label>
                                                                <div class="col-sm-3">
                                                                    <select type="text" class="form-select" id="po_no" name="po_no[]">
                                                                    <option value=""></option>
                                                                    <?php 
                                                                            // $sql = "SELECT DISTINCT PO_NO FROM IT_ASSET_PO";
                                                                            // $res = oci_parse(connection(), $sql);
                                                                            // oci_execute($res);

                                                                            // while($row = oci_fetch_row($res)){
                                                                            //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                                            // }
                                                                        ?>
                                                                    </select>
                                                                    
                                                                </div>

                                                                <button class="btn btn-info" id="po_btn" type="button" style="width: 150px; height:35px">
                                                                <i class="fa fa-magnifying-glass"></i> Search</button>   
                                                            </div> -->
                                                            <div id="collapse_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_Two">
                                                                 <div class="panel-body">
                                                                    <!-- hidden input -->
                                                                    <div class="row mb-3" style="margin-left: 40px;" hidden>
                                                                        <div class="col-sm-3" style="margin-left: 40px;">
                                                                            <label for="">Po Doc Date</label>
                                                                            <input type="date" class="form-control" id="po_doc_date" name="po_doc_date[]" required>
                                                                        </div>

                                                                        <div class="col-sm-3" style="margin-left: 40px;" >
                                                                            <label for="">Plant</label>
                                                                            <input type="text" class="form-control" id="plant" name="plant[]" required>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row mb-3" style="margin-left: 40px;" hidden>
                                                                        <div class="col-sm-3" style="margin-left: 40px;">
                                                                            <label for="">Status</label>
                                                                            <input type="text" class="form-control" id="status" name="status[]" required>
                                                                        </div>

                                                                        <div class="col-sm-3" style="margin-left: 40px;">
                                                                            <label for="">Po Name</label>
                                                                            <input type="text" class="form-control" id="po_name" name="po_name[]" required>
                                                                            
                                                                        </div>

                                                                        <!-- <div class="col-sm-3" style="margin-left: 40px;">
                                                                            <label for="">Document Number</label>
                                                                            <input type="text" class="form-control" id="doc_no" name="doc_no[]">
                                                                            
                                                                        </div> -->
                                                                    </div>

                                                                    <div class="row mb-3" style="margin-left: 40px;" hidden>
                                                                        <div class="col-sm-2" style="margin-left: 40px;">
                                                                            <label for="">QUANTITY</label>
                                                                            <input type="text" class="form-control" id="qty" name="qty[]" required>
                                                                        </div>

                                                                        <div class="col-sm-2" style="margin-left: 40px;">
                                                                            <label for="">UNIT</label>
                                                                            <input type="text" class="form-control" id="unit" name="unit[]" required>
                                                                        </div>

                                                                        <div class="col-sm-2" style="margin-left: 40px;">
                                                                            <label for="">PO ITEM</label>
                                                                            <input type="text" class="form-control" id="item" name="item[]" required>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end of hidden input -->

                                                                    <div class="row g-3" style="margin: auto">
                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Supplier</label>
                                                                            <select list="supp_list" id="supplier" name='supplier[]' type="text" class="form-select" placeholder=" " required>
                                                                                <!-- <option selected=" ">Select Suppliers...</option> -->
                                                                                    <?php 
                                                                                        $sql = "SELECT DISTINCT VENDOR_CODE, VENDOR_NAME FROM IT_ASSET_VENDORS";
                                                                                        $res = oci_parse(connection(), $sql);
                                                                                        oci_execute($res);

                                                                                        while($row = oci_fetch_row($res)){
                                                                                            echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                        }
                                                                                    ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Request Group *</label>
                                                                            <select class="form-select" id="req_grp" name='req_grp[]' type="text" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                <option selected=" ">Select Request Group...</option>
                                                                                <?php 
                                                                                    $sql = "SELECT REQ_GROUP_ID, REQ_GROUP_NAME FROM IT_ASSET_REQ_GROUP ORDER BY REQ_GROUP_ID";
                                                                                    $res = oci_parse(connection(), $sql);
                                                                                    oci_execute($res);

                                                                                    while($row = oci_fetch_row($res)){
                                                                                        echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Request Type *</label>
                                                                            <select id="type" name='type[]' type="text" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                    <option selected=" ">Select Request Type...</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Asset Group *</label>
                                                                            <select id="asset_group" name='asset_group' type="text" autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                <option selected=" ">Select Asset...</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Asset Sub Group *</label>
                                                                            <select id="asset_sub_group" name='asset_sub_group' type="text" autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                <option selected=" ">Select Asset Sub Group...</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Brand *</label>
                                                                            <select id="brand" name='brand[]' type="text" autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                    <option selected=" ">Select Brand...</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Model *</label>
                                                                            <select id="model" name='model[]' type="text" autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                <option selected=" ">Select Model...</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Series *</label>
                                                                            <input id="series" name='series[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Price</label>
                                                                            <input id="price" name='price[]' type="text" autocomplete="off" class="form-control" required placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Serial Number 1 *</label>
                                                                            <input id="ser_no" name='ser_no[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Serial Number 2</label>
                                                                            <input id="ser_no2" name='ser_no2[]' type="text" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Serial Number 3</label>
                                                                            <input id="ser_no3" name='ser_no3[]' type="text" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Serial Number 4</label>
                                                                            <input id="ser_no4" name='ser_no4[]' type="text" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Asset Code *</label>
                                                                            <input id="ass_code" name='ass_code[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Delivery Note *</label>
                                                                            <input id="del_note" name='del_note[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Delivery Date</label>
                                                                            <input id="del_date" name='del_date[]' type="date" autocomplete="off" class="form-control" required placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Material Short</label>
                                                                            <input id="malt_shrt" name='malt_shrt[]' type="text" autocomplete="off" class="form-control" required placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">License Month Start</label>
                                                                            <input id="license_start" name='license_start[]' type="date" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">License Month</label>
                                                                            <input id="license_month" name='license_month[]' type="text" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">License Expiry Date</label>
                                                                            <input id="license_exp" name='license_exp[]' type="date" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Warranty Month Start *</label>
                                                                            <input id="war_start" name='war_start[]' type="date" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Warranty Month *</label>
                                                                            <input id="war_month" name='war_month[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Warranty Expiry Date</label>
                                                                            <input id="war_exp" name='war_exp[]' type="date" autocomplete="off" class="form-control" required placeholder=" " style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Asset Flag *</label>
                                                                            <select id="ass_flagR" name='ass_flagR' type="text" autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                <option selected=" ">Select Asset Flag...</option>
                                                                                <option value="asset">Asset</option>
                                                                                <option value="expense">Expense</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label class="form-label">Remarks *</label>
                                                                            <textarea id="remarks" name='remarks[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                            </textarea>
                                                                        </div>

                                                                        <!-- <div class="col-md-4">
                                                                            <label class="form-label">Attachment *</label>
                                                                            <input id="attch" name='attch[]' type="file" type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div> -->
                                                                    </div>

                                                                    <!--  <div>
                                                                        <input type="date" id="po_date" class="form-control" style="width: 200px; margin-top: 20px; margin-left: 10px">
                                                                        <input type="text" id="plant" class="form-control" style="width: 200px; margin-top: 20px; margin-left: 10px">
                                                                                <input type="text" id="amt">
                                                                        <input type="text" id="po_stat" class="form-control" style="width: 200px; margin-top: 20px; margin-left: 10px">
                                                                        <input type="text" id="po_num" hidden>
                                                                        <input type="text" id="supp_hide" hidden>
                                                                    </div> -->

                                                                    <!-- <div class="row mb-3" style="margin-left: 40px;">
                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">PO Number:</label>
                                                                        <div class="col-sm-3">
                                                                            <select type="text" class="form-control" id="po_no" name="po_no[]" style="border: none; border-bottom: 1px solid blue; border-radius:0px;">
                                                                            <option value=""></option>
                                                                                <?php 
                                                                                    // $sql = "SELECT DISTINCT PO_NO FROM IT_ASSET_PO";
                                                                                    // $res = oci_parse(connection(), $sql);
                                                                                    // oci_execute($res);

                                                                                    // while($row = oci_fetch_row($res)){
                                                                                    //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                                                    // }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Supplier:</label>
                                                                        <div class="col-sm-3">
                                                                            <select list="supp_list" id="supplier" name='supplier[]' type="text" class="form-select" autocomplete="off" 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">                                           
                                                                                        
                                                                                <option value=""></option>
                                                                                    <?php 
                                                                                        // $sql = "SELECT DISTINCT VENDOR_CODE, VENDOR_NAME FROM IT_ASSET_VENDORS";
                                                                                        // $res = oci_parse(connection(), $sql);
                                                                                        // oci_execute($res);

                                                                                        // while($row = oci_fetch_row($res)){
                                                                                        //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                        // }
                                                                                    ?>
                                                                            </select>
                                                                        </div>

                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Request Group:</label>
                                                                        <div class="col-sm-3">
                                                                            <select id="req_grp" name='req_grp[]' type="text" autocomplete="off" class="form-select" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">  
                                                                                    
                                                                            <option value=" "></option>
                                                                            <?php 
                                                                                // $sql = "SELECT REQ_GROUP_ID, REQ_GROUP_NAME FROM IT_ASSET_REQ_GROUP ORDER BY REQ_GROUP_ID";
                                                                                // $res = oci_parse(connection(), $sql);
                                                                                // oci_execute($res);

                                                                                // while($row = oci_fetch_row($res)){
                                                                                //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                // }
                                                                            ?>
                                                                            </select>
                                                                        </div>
                                                                    </div> -->

                                                                    <!-- <div class="row mb-3" style="margin-left:40px;">
                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Request Type:</label>
                                                                        <div class="col-sm-3">
                                                                            <select id="type" name='type[]' type="text" autocomplete="off" class="form-select" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">  
                                                                                    
                                                                            <option value=" "></option>
                                                                            </select>
                                                                        </div> 
                                                                        
                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Asset Group:</label>
                                                                        <div class="col-sm-3">
                                                                            <select id="asset_group" name='asset_group' type="text" autocomplete="off" class="form-select" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">  
                                                                                    
                                                                            <option value=" "></option>
                                                                            </select>
                                                                        </div>
                                                                    </div> -->

                                                                    <!-- <div class="row mb-3" style="margin-left:40px; ">
                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Asset Sub Group:</label>
                                                                        <div class="col-sm-3">
                                                                            <select id="asset_sub_group" name='asset_sub_group' type="text" autocomplete="off" class="form-select" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">  
                                                                                    
                                                                            <option value=" "></option>
                                                                            </select>
                                                                        </div>

                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Brand:</label>
                                                                        <div class="col-sm-3">
                                                                            <select id="brand" name='brand[]' type="text" autocomplete="off" class="form-select" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">

                                                                            <option value=""></option>
                                                                            </select>
                                                                        </div>
                                                                    </div> -->

                                                                    <!-- <div class="row mb-3" style="margin-left:40px;">
                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Model:</label>
                                                                        <div class="col-sm-3">
                                                                            <select id="model" name='model[]' type="text" autocomplete="off" class="form-select" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">

                                                                            <option value=""></option>
                                                                            </select>
                                                                        </div>

                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Price:</label>
                                                                        <div class="col-sm-3">
                                                                            <input id="price" name='price[]' type="text" autocomplete="off" class="form-control" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                                                        </div>
                                                                    </div> -->

                                                                    <!-- <div class="row mb-3" style="margin-left:40px;">
                                                                        <label class="col-sm-2" style=" margin-right: -20px; color: black">Serial Number:</label>
                                                                        <div class="col-sm-3">
                                                                            <input id="ser_no" name='ser_no[]' type="text" autocomplete="off" class="form-control" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                                                        </div>

                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Asset Code:</label>
                                                                        <div class="col-sm-3">
                                                                            <input id="ass_code" name='ass_code[]' type="text" autocomplete="off" class="form-control" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3" style="margin-left:40px;">
                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Delivery Note:</label>
                                                                        <div class="col-sm-3">
                                                                            <input id="del_note" name='del_note[]' type="text" autocomplete="off" class="form-control" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                                                        </div>

                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Delivery Date:</label>
                                                                        <div class="col-sm-3">
                                                                            <input id="del_date" name='del_date[]' type="date" autocomplete="off" class="form-control" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;;">
                                                                        </div>
                                                                    </div> -->

                                                                    <!-- <div class="row mb-3" style="margin-left:40px;">
                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Material Short</label>
                                                                        <div class="col-sm-3">
                                                                            <input id="malt_shrt" name='malt_shrt[]' type="text" autocomplete="off" class="form-control" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;;">
                                                                        </div>

                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Remarks:</label>
                                                                        <div class="col-sm-3">
                                                                            <input id="remarks" name='remarks[]' type="text" autocomplete="off" class="form-control" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3" style="margin-left:40px;">
                                                                        <label class="col-sm-2" style="margin-right: -20px; color: black">Attachment:</label>
                                                                        <div class="col-sm-3">
                                                                            <input id="attch" name='attch[]' type="file" autocomplete="off" class="form-control" required 
                                                                                style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;;">
                                                                        </div>

                                                                        <button id="upload" name="upload">Upload File</button> 
                                                                    </div> -->

                                                                    <!-- <div class="table-responsive">
                                                                        <table class="display nowrap" id="dataTable" width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style='text-align: start; width: 35px;'></th>
                                                                                    <th hidden style="width: 200px; background-color: transparent"> PO Number</th>
                                                                                    <th hidden>PO DATE</th> 
                                                                                    <th hidden>Supplier Code</th>
                                                                                    <th style="width: 200px">Supplier</th>
                                                                                    <th hidden style="width: 200px"> Type Code </th>
                                                                                    <th style="width: 200px">Type</th>
                                                                                    <th hidden style="width: 200px">Brand Code</th>
                                                                                    <th style="width: 200px">Brand</th>
                                                                                    <th style="width: 200px">Price</th>
                                                                                    <th style="width: 200px">Serial No.</th>
                                                                                    <th style="width: 200px">Asset Code</th>
                                                                                    <th style="width: 200px">Delivery Note</th>
                                                                                    <th style="width: 200px">Delivery Date</th>
                                                                                    <th style="width: 200px">Material Short</th>
                                                                                    <th style="width: 200px">Remarks</th>
                                                                                    <th style="width: 200px">Attachment</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th>Request Group Name</th>
                                                                                    <th>User Created</th>
                                                                                    <th>User Created Date</th>
                                                                                    <th>Last User Update</th>
                                                                                    <th>Last User Update Date</th>
                                                                                </tr>
                                                                            </tfoot>
                                                                            <tbody id="td_body">
                                                                                <tr style="background-color: white;">
                                                                                    <td style='text-align: center'><img id='plusImg' src='../../assets/add-free-icon-font.png'></td>  
                                                                                    <td hidden style='text-align: start; background-color: #FFFFFF	'>
                                                                                        <input id="po_no" name='po_no[]' type="text" autocomplete="off" 
                                                                                        style=" background-color: transparent">                                           
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('po_no').value = "<?php echo ($_POST['po_no']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td hidden style='text-align: start; background-color: #FFFFFF	'>
                                                                                        <input id="po_date" name='po_date[]' type="text" autocomplete="off" 
                                                                                        style=" background-color: transparent">                                           
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('po_date').value = "<?php echo ($_POST['po_date']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td hidden>
                                                                                        <input hidden id="supp_code" name='supp_code[]' type="text" autocomplete="off" 
                                                                                        style="background-color: transparent">                                           
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('supp_code').value = "<?php echo ($_POST['supp_code']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <select list="supp_list" id="supplier" name='supplier[]' type="text" class="form-select" autocomplete="off" 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">                                           
                                                                                        
                                                                                        <option value=""></option>
                                                                                        <?php 
                                                                                            // $sql = "SELECT DISTINCT VENDOR_CODE, VENDOR_NAME FROM IT_ASSET_VENDORS";
                                                                                            // $res = oci_parse(connection(), $sql);
                                                                                            // oci_execute($res);

                                                                                            // while($row = oci_fetch_row($res)){
                                                                                            //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                            // }
                                                                                        ?>
                                                                                        </select>
                                                                                        <script>
                                                                                            document.getElementById('supplier').value = "<?php echo ($_POST['supplier']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td hidden>
                                                                                        <input id="type_code" name='type_code[]' type="text" autocomplete="off" 
                                                                                        style="background-color: transparent">                                           
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('type_code').value = "<?php echo ($_POST['type_code']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <select id="type" name='type[]' type="text" autocomplete="off" class="form-select" required 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">  
                                                                                    
                                                                                        <option value=" "></option>
                                                                                        <?php 
                                                                                            // $sql = "SELECT REQ_TYPE_ID, REQ_TYPE_NAME FROM IT_ASSET_REQ_TYPE ORDER BY REQ_TYPE_ID";
                                                                                            // $res = oci_parse(connection(), $sql);
                                                                                            // oci_execute($res);

                                                                                            // while($row = oci_fetch_row($res)){
                                                                                            //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                            // }
                                                                                        ?>
                                                                                        </select>
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('type').value = "<?php echo ($_POST['type']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td hidden>
                                                                                        <input id="brand_code" name='brand_code[]' type="text" autocomplete="off" hiddens
                                                                                        style="background-color: transparent">                                           
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('brand_code').value = "<?php echo ($_POST['brand_code']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <select id="brand" name='brand[]' type="text" autocomplete="off" class="form-select" required 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">

                                                                                        <option value=""></option>
                                                                                        <?php 
                                                                                            // $sql = "SELECT BRAND_CODE, BRAND_NAME FROM IT_ASSET_BRAND ORDER BY BRAND_CODE";
                                                                                            // $res = oci_parse(connection(), $sql);
                                                                                            // oci_execute($res);

                                                                                            // while($row = oci_fetch_row($res)){
                                                                                            //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                            // }
                                                                                        ?>
                                                                                        </select>
                                                                                        <script>
                                                                                            document.getElementById('brand').value = "<?php echo ($_POST['brand']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <input id="price" name='price[]' type="text" autocomplete="off" class="form-control" required 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">

                                                                                        <script>
                                                                                            document.getElementById('price').value = "<?php echo ($_POST['price']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <input id="ser_no" name='ser_no[]' type="text" autocomplete="off" class="form-control" required 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('ser_no').value = "<?php echo ($_POST['ser_no']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <input id="ass_code" name='ass_code[]' type="text" autocomplete="off" class="form-control" required 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('ass_code').value = "<?php echo ($_POST['ass_code']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <input id="del_note" name='del_note[]' type="text" autocomplete="off" class="form-control" required 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('del_note').value = "<?php echo ($_POST['del_note']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <input id="del_date" name='del_date[]' type="date" autocomplete="off" class="form-control" required 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;">
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('del_date').value = "<?php echo ($_POST['del_date']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <input id="malt_shrt" name='malt_shrt[]' type="text" autocomplete="off" class="form-control" required 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;">
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('malt_shrt').value = "<?php echo ($_POST['malt_shrt']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <input id="remarks" name='remarks[]' type="text" autocomplete="off" class="form-control" required 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('remarks').value = "<?php echo ($_POST['remarks']);?>";
                                                                                        </script>
                                                                                    </td>

                                                                                    <td>
                                                                                        <input id="attch" name='attch[]' type="file" autocomplete="off" class="form-control" required 
                                                                                        style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;">
                                                                                        
                                                                                        <script>
                                                                                            document.getElementById('attch').value = "<?php echo ($_POST['attch']);?>";
                                                                                        </script>
                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                        <div class="col-md-12" style='justify-content: end; display: flex; height:35px; margin-top: 20px'>
                                                                            <button class="btn btn-success" type="button" id="save_btn"><i class="fa fa-plus-circle"></i> Save</button>
                                                                        </div> -->
                                                                <!-- </div> -->
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <button id="add_btn1" class="btn btn-success" type="submit">
                                                        <i class="fa-solid fa-plus"></i> Add</button>
                                                    <button id="close_btn" class="btn btn-warning" type="button">
                                                        <i class="fa-solid fa-xmark"></i> Close</button>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <br>
                                    </form>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- edit info MODAL -->
                    <div class="modal fade" id="edit_info" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="infomodal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form id="info-form">
                                    <div class="modal-header">
                                        <!-- <h5 class="modal-title" id="infomodal">Information</h5> -->
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <br>

                                    <form class="needs-validation" novalidate method='POST' enctype='multipart/form-data' id='edit_Form'>
                                        <div class="container-fluid">
                                            <div class="body-message">
                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <div class="card" style="border: 2px solid #e6e6e6">
                                                        <div class="panel panel-default">
                                                            <!-- <div class="cardHeader">
                                                                <h2 class='h2-unstyled' style="margin-left:20px">Receiver Information</h2>
                                                            </div> -->
                                                            <div class="panel-heading" role="tab" id="headingOne">
                                                                <h3 class="panel-title font-weight-bold" style="color: #000">
                                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_1" aria-expanded="true" aria-controls="collapse_1">
                                                                        Receiver Information
                                                                    </a>
                                                                </h3>
                                                            </div>

                                                            <div id="collapse_1" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                                <div class="panel-body">
                                                                    <div class="col-md-4">
                                                                        <label class="form-label">Employee Name *</label>
                                                                        <select type="text" class="form-select" id="empl_name1" placeholder=" " required readonly style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                            <option value="">Select Name....</option>
                                                                            <?php 
                                                                                $sql = "SELECT A.NAMEENG, A.EMPLID FROM PERSON_TBL A, JOBCUR_EE B 
                                                                                WHERE B.EMPLID = A.EMPLID
                                                                                and B.EMPL_STATUS = 'A'
                                                                                ORDER BY A.NAMEENG ASC";
                                                                                $result = oci_parse(connection1(), $sql);
                                                                                oci_execute($result);
                                                                                while ($row = oci_fetch_row($result)){
                                                                                    echo "<option value='$row[1]'>".htmlspecialchars($row[0], ENT_IGNORE)."</option>";
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="row g-3" style="margin: auto">
                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Department</label>
                                                                            <input type="text" class="form-control" id="dept1" readonly style="background-color: #e6e6e6;">
                                                                            <!-- <select type="text" class="form-select" list="dept_list" id="department">
                                                                                <option value=""></option>
                                                                                <?php 
                                                                                    // $sql= "SELECT DEPTID, DESCR FROM DEPARTMENT_TBL WHERE DEPTID LIKE 'PHL%'";
                                                                                    // $result = oci_parse(connection1(), $sql);
                                                                                    // oci_execute($result);
                                                                                    // while ($row = oci_fetch_row($result)){
                                                                                    // echo "<option value='$row[0]'>".htmlspecialchars($row[1], ENT_IGNORE)."</option>";
                                                                                    // }
                                                                                ?>
                                                                            </select> -->
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Employee ID</label>
                                                                            <input type="text" class="form-control" id="emp_id1" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Employee Address</label>
                                                                            <input type="text" class="form-control" id="emp_add1" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Working Location</label>
                                                                            <input type="text" class="form-control" id="work_loc1" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Office Phone</label>
                                                                            <input type="text" class="form-control" id="off_phone1" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Mobile Phone</label>
                                                                            <input type="text" class="form-control" id="mob_phone1" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Hired Date</label>
                                                                            <input type="text" class="form-control" id="hired_date1" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Personal Email</label>
                                                                            <input type="text" class="form-control" id="per_email1" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Business Email</label>
                                                                            <input type="text" class="form-control" id="bus_email1" placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4" hidden>
                                                                            <label class="form-label">Reference Person</label>
                                                                            <input type="text" class="form-control" id="ref_person1" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>
                                                                    </div>

                                                                    <!-- <div class="row g-2" style="margin-left: 40px;">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                                <select type="text" class="form-select" id="empl_name" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                                <option selected=" ">Select Name....</option>
                                                                                </select>
                                                                                <label>Employee Name:</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="emp_id" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Employee ID:</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                                <input type="text" class="form-control" id="emp_add" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                                <label>Employee Address:</label>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->

                                                                    <!-- <div class="row g-2" style="margin-left: 40px;">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="work_loc" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Working Location:</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                                <input type="text" class="form-control" id="off_phone" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                                <label>Offcie Phone:</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="mob_phone" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Mobile Phone:</label>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->

                                                                    <!-- <div class="row g-2" style="margin-left: 40px;">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="hired_date" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Hired Date:</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="per_email" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Personal Email:</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="bus_email" placeholder=" " readonly style="background-color: #FFFFFF;">
                                                                            <label>Business Email:</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row g-2" style="margin-left: 40px;">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-floating mb-3" style="margin-right: 40px;">
                                                                            <input type="text" class="form-control" id="ref_person" placeholder=" " style="background-color: #FFFFFF;">
                                                                            <label>Reference Person:</label>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
                                                                    <!-- <div class="col-md-4" style='justify-content: end; display: flex; height:35px; margin-top: 40px'>
                                                                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i>&nbspAdd</button>
                                                                    </div> -->
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- </div> -->
                                                    <br>

                                                    <!-- <div id="filter" class='card container' style="width: calc(100% - 40px);"> -->
                                                    <div class="card" style="border: 2px solid #e6e6e6">
                                                        <div class="panel panel-default">
                                                            <!-- <div class="cardHeader">
                                                                <h2 class='h2-unstyled' style="margin-left:20px">Item Information</h2>
                                                            </div> -->
                                                            <div class="panel-heading" role="tab" id="heading_Two">
                                                                <h3 class="panel-title font-weight-bold" style="color: #000">
                                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                                        Item Information
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <!-- <div class="row mb-3" style="margin-left: 40px;">
                                                                <label class="col-sm-2"  style="margin-right: -20px; color: black">PO Number:</label>
                                                                <div class="col-sm-3">
                                                                    <select type="text" class="form-select" id="po_no" name="po_no[]">
                                                                    <option value=""></option>
                                                                    <?php 
                                                                            // $sql = "SELECT DISTINCT PO_NO FROM IT_ASSET_PO";
                                                                            // $res = oci_parse(connection(), $sql);
                                                                            // oci_execute($res);

                                                                            // while($row = oci_fetch_row($res)){
                                                                            //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                                            // }
                                                                        ?>
                                                                    </select>
                                                                    
                                                                </div>

                                                                <button class="btn btn-info" id="po_btn" type="button" style="width: 150px; height:35px">
                                                                <i class="fa fa-magnifying-glass"></i> Search</button>   
                                                            </div> -->
                                                            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_Two">
                                                                <div class="panel-body">
                                                                    <!-- hidden input -->
                                                                    <div class="row mb-3" style="margin-left: 40px;" hidden>
                                                                        <div class="col-sm-3" style="margin-left: 40px;">
                                                                            <label for="">Po Doc Date</label>
                                                                            <input type="date" class="form-control" id="po_doc_date1" name="po_doc_date[]" required>
                                                                        </div>

                                                                        <div class="col-sm-3" style="margin-left: 40px;" >
                                                                            <label for="">Plant</label>
                                                                            <input type="text" class="form-control" id="plant2" name="plant[]" required>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row mb-3" style="margin-left: 40px;" hidden>
                                                                        <div class="col-sm-3" style="margin-left: 40px;">
                                                                            <label for="">Status</label>
                                                                            <input type="text" class="form-control" id="status1" name="status[]" required>
                                                                        </div>

                                                                        <div class="col-sm-3" style="margin-left: 40px;">
                                                                            <label for="">Po Name</label>
                                                                            <input type="text" class="form-control" id="po_name1" name="po_name[]" required>
                                                                            
                                                                        </div>

                                                                        <!-- <div class="col-sm-3" style="margin-left: 40px;">
                                                                            <label for="">Document Number</label>
                                                                            <input type="text" class="form-control" id="doc_no" name="doc_no[]">
                                                                            
                                                                        </div> -->
                                                                    </div>

                                                                    <div class="row mb-3" style="margin-left: 40px;" hidden>
                                                                        <div class="col-sm-2" style="margin-left: 40px;">
                                                                            <label for="">QUANTITY</label>
                                                                            <input type="text" class="form-control" id="qty1" name="qty[]" required>
                                                                        </div>

                                                                        <div class="col-sm-2" style="margin-left: 40px;">
                                                                            <label for="">UNIT</label>
                                                                            <input type="text" class="form-control" id="unit1" name="unit[]" required>
                                                                        </div>

                                                                        <div class="col-sm-2" style="margin-left: 40px;">
                                                                            <label for="">PO ITEM</label>
                                                                            <input type="text" class="form-control" id="item1" name="item[]" required>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end of hidden input -->

                                                                    <div class="row g-3" style="margin: auto">
                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Supplier</label>
                                                                            <select list="supp_list" id="supplier1" name='supplier[]' type="text" class="form-select" placeholder=" " required>
                                                                                <option selected=" ">Select Suppliers...</option>
                                                                                    <?php 
                                                                                        $sql = "SELECT DISTINCT VENDOR_CODE, VENDOR_NAME FROM IT_ASSET_VENDORS";
                                                                                        $res = oci_parse(connection(), $sql);
                                                                                        oci_execute($res);

                                                                                        while($row = oci_fetch_row($res)){
                                                                                            echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                        }
                                                                                    ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Request Group *</label>
                                                                            <select class="form-select" id="req_grp1" name='req_grp[]' type="text" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                <option selected=" ">Select Request Group...</option>
                                                                                <?php 
                                                                                    $sql = "SELECT REQ_GROUP_ID, REQ_GROUP_NAME FROM IT_ASSET_REQ_GROUP ORDER BY REQ_GROUP_ID";
                                                                                    $res = oci_parse(connection(), $sql);
                                                                                    oci_execute($res);

                                                                                    while($row = oci_fetch_row($res)){
                                                                                        echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Request Type *</label>
                                                                            <select id="req_type1" name='type[]' type="text" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                    <option selected=" ">Select Request Type...</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Asset Group *</label>
                                                                            <select id="asset_group1" name='asset_group' type="text" autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                <option selected=" ">Select Asset...</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Asset Sub Group *</label>
                                                                            <select id="asset_sub_group1" name='asset_sub_group' type="text" autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                <option selected=" ">Select Asset Sub Group...</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Brand *</label>
                                                                            <select id="brand1" name='brand[]' type="text" autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                    <option selected=" ">Select Brand...</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Model *</label>
                                                                            <select id="model1" name='model[]' type="text" autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                <option selected=" ">Select Model...</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Series *</label>
                                                                            <input id="series1" name='series1[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Price</label>
                                                                            <input id="price1" name='price[]' type="text" autocomplete="off" class="form-control" required placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Serial Number 1 *</label>
                                                                            <input id="ser_no11" name='ser_no[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Serial Number 2</label>
                                                                            <input id="ser_no21" name='ser_no2[]' type="text" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Serial Number 3</label>
                                                                            <input id="ser_no31" name='ser_no3[]' type="text" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Serial Number 4</label>
                                                                            <input id="ser_no41" name='ser_no4[]' type="text" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Asset Code *</label>
                                                                            <input id="ass_code1" name='ass_code[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Delivery Note *</label>
                                                                            <input id="del_note1" name='del_note[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Delivery Date</label>
                                                                            <input id="del_date1" name='del_date[]' type="date" autocomplete="off" class="form-control" required placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Material Short</label>
                                                                            <input id="malt_shrt1" name='malt_shrt[]' type="text" autocomplete="off" class="form-control" required placeholder=" " readonly style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">License Month Start</label>
                                                                            <input id="license_start1" name='license_start[]' type="date" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">License Month</label>
                                                                            <input id="license_month1" name='license_month[]' type="text" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">License Expiry Date</label>
                                                                            <input id="license_exp1" name='license_exp[]' type="date" autocomplete="off" class="form-control" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Warranty Month Start*</label>
                                                                            <input id="war_start1" name='war_start[]' type="date" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Warranty Month *</label>
                                                                            <input id="war_month1" name='war_month[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Warranty Expiry Date</label>
                                                                            <input id="war_exp1" name='war_exp[]' type="date" autocomplete="off" class="form-control" required placeholder=" " style="background-color: #e6e6e6;">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label class="form-label">Asset Flag *</label>
                                                                            <select id="ass_flagE" name='ass_flagE' type="text" autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                                <option selected=" ">Select Asset Flag...</option>
                                                                                <option value="asset">Asset</option>
                                                                                <option value="expense">Expense</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label class="form-label">Remarks *</label>
                                                                            <textarea id="remarks1" name='remarks[]' type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                            </textarea>
                                                                        </div>

                                                                        <!-- <div class="col-md-4">
                                                                            <label class="form-label">Attachment *</label>
                                                                            <input id="attch1" name='attch[]' type="file" type="text" autocomplete="off" class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                        </div> -->
                                                                    </div>
                                                                    <br>

                                                                <!--  <div>
                                                                    <input type="date" id="po_date" class="form-control" style="width: 200px; margin-top: 20px; margin-left: 10px">
                                                                    <input type="text" id="plant" class="form-control" style="width: 200px; margin-top: 20px; margin-left: 10px">
                                                                            <input type="text" id="amt">
                                                                    <input type="text" id="po_stat" class="form-control" style="width: 200px; margin-top: 20px; margin-left: 10px">
                                                                    <input type="text" id="po_num" hidden>
                                                                    <input type="text" id="supp_hide" hidden>
                                                                </div> -->

                                                                <!-- <div class="row mb-3" style="margin-left: 40px;">
                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">PO Number:</label>
                                                                    <div class="col-sm-3">
                                                                        <select type="text" class="form-control" id="po_no" name="po_no[]" style="border: none; border-bottom: 1px solid blue; border-radius:0px;">
                                                                        <option value=""></option>
                                                                            <?php 
                                                                                // $sql = "SELECT DISTINCT PO_NO FROM IT_ASSET_PO";
                                                                                // $res = oci_parse(connection(), $sql);
                                                                                // oci_execute($res);

                                                                                // while($row = oci_fetch_row($res)){
                                                                                //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                                                // }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Supplier:</label>
                                                                    <div class="col-sm-3">
                                                                        <select list="supp_list" id="supplier" name='supplier[]' type="text" class="form-select" autocomplete="off" 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">                                           
                                                                                    
                                                                            <option value=""></option>
                                                                                <?php 
                                                                                    // $sql = "SELECT DISTINCT VENDOR_CODE, VENDOR_NAME FROM IT_ASSET_VENDORS";
                                                                                    // $res = oci_parse(connection(), $sql);
                                                                                    // oci_execute($res);

                                                                                    // while($row = oci_fetch_row($res)){
                                                                                    //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                    // }
                                                                                ?>
                                                                        </select>
                                                                    </div>

                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Request Group:</label>
                                                                    <div class="col-sm-3">
                                                                        <select id="req_grp" name='req_grp[]' type="text" autocomplete="off" class="form-select" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">  
                                                                                
                                                                        <option value=" "></option>
                                                                        <?php 
                                                                            // $sql = "SELECT REQ_GROUP_ID, REQ_GROUP_NAME FROM IT_ASSET_REQ_GROUP ORDER BY REQ_GROUP_ID";
                                                                            // $res = oci_parse(connection(), $sql);
                                                                            // oci_execute($res);

                                                                            // while($row = oci_fetch_row($res)){
                                                                            //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                            // }
                                                                        ?>
                                                                        </select>
                                                                    </div>
                                                                </div> -->

                                                                <!-- <div class="row mb-3" style="margin-left:40px;">
                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Request Type:</label>
                                                                    <div class="col-sm-3">
                                                                        <select id="type" name='type[]' type="text" autocomplete="off" class="form-select" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">  
                                                                                
                                                                        <option value=" "></option>
                                                                        </select>
                                                                    </div> 
                                                                    
                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Asset Group:</label>
                                                                    <div class="col-sm-3">
                                                                        <select id="asset_group" name='asset_group' type="text" autocomplete="off" class="form-select" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">  
                                                                                
                                                                        <option value=" "></option>
                                                                        </select>
                                                                    </div>
                                                                </div> -->

                                                                <!-- <div class="row mb-3" style="margin-left:40px; ">
                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Asset Sub Group:</label>
                                                                    <div class="col-sm-3">
                                                                        <select id="asset_sub_group" name='asset_sub_group' type="text" autocomplete="off" class="form-select" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">  
                                                                                
                                                                        <option value=" "></option>
                                                                        </select>
                                                                    </div>

                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Brand:</label>
                                                                    <div class="col-sm-3">
                                                                        <select id="brand" name='brand[]' type="text" autocomplete="off" class="form-select" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">

                                                                        <option value=""></option>
                                                                        </select>
                                                                    </div>
                                                                </div> -->

                                                                <!-- <div class="row mb-3" style="margin-left:40px;">
                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Model:</label>
                                                                    <div class="col-sm-3">
                                                                        <select id="model" name='model[]' type="text" autocomplete="off" class="form-select" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">

                                                                        <option value=""></option>
                                                                        </select>
                                                                    </div>

                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Price:</label>
                                                                    <div class="col-sm-3">
                                                                        <input id="price" name='price[]' type="text" autocomplete="off" class="form-control" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                                                    </div>
                                                                </div> -->

                                                                <!-- <div class="row mb-3" style="margin-left:40px;">
                                                                    <label class="col-sm-2" style=" margin-right: -20px; color: black">Serial Number:</label>
                                                                    <div class="col-sm-3">
                                                                        <input id="ser_no" name='ser_no[]' type="text" autocomplete="off" class="form-control" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                                                    </div>

                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Asset Code:</label>
                                                                    <div class="col-sm-3">
                                                                        <input id="ass_code" name='ass_code[]' type="text" autocomplete="off" class="form-control" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3" style="margin-left:40px;">
                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Delivery Note:</label>
                                                                    <div class="col-sm-3">
                                                                        <input id="del_note" name='del_note[]' type="text" autocomplete="off" class="form-control" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                                                    </div>

                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Delivery Date:</label>
                                                                    <div class="col-sm-3">
                                                                        <input id="del_date" name='del_date[]' type="date" autocomplete="off" class="form-control" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;;">
                                                                    </div>
                                                                </div> -->

                                                                <!-- <div class="row mb-3" style="margin-left:40px;">
                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Material Short</label>
                                                                    <div class="col-sm-3">
                                                                        <input id="malt_shrt" name='malt_shrt[]' type="text" autocomplete="off" class="form-control" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;;">
                                                                    </div>

                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Remarks:</label>
                                                                    <div class="col-sm-3">
                                                                        <input id="remarks" name='remarks[]' type="text" autocomplete="off" class="form-control" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3" style="margin-left:40px;">
                                                                    <label class="col-sm-2" style="margin-right: -20px; color: black">Attachment:</label>
                                                                    <div class="col-sm-3">
                                                                        <input id="attch" name='attch[]' type="file" autocomplete="off" class="form-control" required 
                                                                            style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;;">
                                                                    </div>

                                                                    <button id="upload" name="upload">Upload File</button> 
                                                                </div> -->

                                                                <!-- <div class="table-responsive">
                                                                    <table class="display nowrap" id="dataTable" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style='text-align: start; width: 35px;'></th>
                                                                                <th hidden style="width: 200px; background-color: transparent"> PO Number</th>
                                                                                <th hidden>PO DATE</th> 
                                                                                <th hidden>Supplier Code</th>
                                                                                <th style="width: 200px">Supplier</th>
                                                                                <th hidden style="width: 200px"> Type Code </th>
                                                                                <th style="width: 200px">Type</th>
                                                                                <th hidden style="width: 200px">Brand Code</th>
                                                                                <th style="width: 200px">Brand</th>
                                                                                <th style="width: 200px">Price</th>
                                                                                <th style="width: 200px">Serial No.</th>
                                                                                <th style="width: 200px">Asset Code</th>
                                                                                <th style="width: 200px">Delivery Note</th>
                                                                                <th style="width: 200px">Delivery Date</th>
                                                                                <th style="width: 200px">Material Short</th>
                                                                                <th style="width: 200px">Remarks</th>
                                                                                <th style="width: 200px">Attachment</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>Request Group Name</th>
                                                                                <th>User Created</th>
                                                                                <th>User Created Date</th>
                                                                                <th>Last User Update</th>
                                                                                <th>Last User Update Date</th>
                                                                            </tr>
                                                                        </tfoot>
                                                                        <tbody id="td_body">
                                                                            <tr style="background-color: white;">
                                                                                <td style='text-align: center'><img id='plusImg' src='../../assets/add-free-icon-font.png'></td>  
                                                                                <td hidden style='text-align: start; background-color: #FFFFFF	'>
                                                                                    <input id="po_no" name='po_no[]' type="text" autocomplete="off" 
                                                                                    style=" background-color: transparent">                                           
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('po_no').value = "<?php echo ($_POST['po_no']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td hidden style='text-align: start; background-color: #FFFFFF	'>
                                                                                    <input id="po_date" name='po_date[]' type="text" autocomplete="off" 
                                                                                    style=" background-color: transparent">                                           
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('po_date').value = "<?php echo ($_POST['po_date']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td hidden>
                                                                                    <input hidden id="supp_code" name='supp_code[]' type="text" autocomplete="off" 
                                                                                    style="background-color: transparent">                                           
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('supp_code').value = "<?php echo ($_POST['supp_code']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <select list="supp_list" id="supplier" name='supplier[]' type="text" class="form-select" autocomplete="off" 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">                                           
                                                                                    
                                                                                    <option value=""></option>
                                                                                    <?php 
                                                                                        // $sql = "SELECT DISTINCT VENDOR_CODE, VENDOR_NAME FROM IT_ASSET_VENDORS";
                                                                                        // $res = oci_parse(connection(), $sql);
                                                                                        // oci_execute($res);

                                                                                        // while($row = oci_fetch_row($res)){
                                                                                        //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                        // }
                                                                                    ?>
                                                                                    </select>
                                                                                    <script>
                                                                                        document.getElementById('supplier').value = "<?php echo ($_POST['supplier']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td hidden>
                                                                                    <input id="type_code" name='type_code[]' type="text" autocomplete="off" 
                                                                                    style="background-color: transparent">                                           
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('type_code').value = "<?php echo ($_POST['type_code']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <select id="type" name='type[]' type="text" autocomplete="off" class="form-select" required 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">  
                                                                                
                                                                                    <option value=" "></option>
                                                                                    <?php 
                                                                                        // $sql = "SELECT REQ_TYPE_ID, REQ_TYPE_NAME FROM IT_ASSET_REQ_TYPE ORDER BY REQ_TYPE_ID";
                                                                                        // $res = oci_parse(connection(), $sql);
                                                                                        // oci_execute($res);

                                                                                        // while($row = oci_fetch_row($res)){
                                                                                        //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                        // }
                                                                                    ?>
                                                                                    </select>
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('type').value = "<?php echo ($_POST['type']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td hidden>
                                                                                    <input id="brand_code" name='brand_code[]' type="text" autocomplete="off" hiddens
                                                                                    style="background-color: transparent">                                           
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('brand_code').value = "<?php echo ($_POST['brand_code']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <select id="brand" name='brand[]' type="text" autocomplete="off" class="form-select" required 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">

                                                                                    <option value=""></option>
                                                                                    <?php 
                                                                                        // $sql = "SELECT BRAND_CODE, BRAND_NAME FROM IT_ASSET_BRAND ORDER BY BRAND_CODE";
                                                                                        // $res = oci_parse(connection(), $sql);
                                                                                        // oci_execute($res);

                                                                                        // while($row = oci_fetch_row($res)){
                                                                                        //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                                        // }
                                                                                    ?>
                                                                                    </select>
                                                                                    <script>
                                                                                        document.getElementById('brand').value = "<?php echo ($_POST['brand']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <input id="price" name='price[]' type="text" autocomplete="off" class="form-control" required 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">

                                                                                    <script>
                                                                                        document.getElementById('price').value = "<?php echo ($_POST['price']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <input id="ser_no" name='ser_no[]' type="text" autocomplete="off" class="form-control" required 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('ser_no').value = "<?php echo ($_POST['ser_no']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <input id="ass_code" name='ass_code[]' type="text" autocomplete="off" class="form-control" required 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('ass_code').value = "<?php echo ($_POST['ass_code']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <input id="del_note" name='del_note[]' type="text" autocomplete="off" class="form-control" required 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('del_note').value = "<?php echo ($_POST['del_note']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <input id="del_date" name='del_date[]' type="date" autocomplete="off" class="form-control" required 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;">
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('del_date').value = "<?php echo ($_POST['del_date']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <input id="malt_shrt" name='malt_shrt[]' type="text" autocomplete="off" class="form-control" required 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;">
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('malt_shrt').value = "<?php echo ($_POST['malt_shrt']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <input id="remarks" name='remarks[]' type="text" autocomplete="off" class="form-control" required 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px">
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('remarks').value = "<?php echo ($_POST['remarks']);?>";
                                                                                    </script>
                                                                                </td>

                                                                                <td>
                                                                                    <input id="attch" name='attch[]' type="file" autocomplete="off" class="form-control" required 
                                                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;">
                                                                                    
                                                                                    <script>
                                                                                        document.getElementById('attch').value = "<?php echo ($_POST['attch']);?>";
                                                                                    </script>
                                                                                </td>
                                                                            </tr>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                    <div class="col-md-12" style='justify-content: end; display: flex; height:35px; margin-top: 20px'>
                                                                        <button class="btn btn-success" type="button" id="save_btn"><i class="fa fa-plus-circle"></i> Save</button>
                                                                    </div> -->
                                                            <!-- </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-12">
                                                        <button id="update_btn" class="btn btn-primary" type="button">
                                                            <i class="fa-solid fa-pen-to-square"></i> Update</button>
                                                        <button id="close_btn1" class="btn btn-warning" type="button">
                                                            <i class="fa-solid fa-xmark"></i> Close</button>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </form>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- PO MODAL -->
                    <div class="modal fade" id="srch_po" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="pomodal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form id="user-form">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pomodal">PO</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                                    
                                        <div class="table-responsive">
                                            <table class="display nowrap" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Po No</th>
                                                        <th>PO ITEM</th>
                                                        <th>Plant</th>
                                                        <th>Vendor Name</th>
                                                        <th>Short Text</th>
                                                        <th>Po Item Text</th>
                                                        <th>Po Qty</th>
                                                        <th>Order Unit</th>
                                                        <th>Po Item Price</th>
                                                        <th>Po Doc Date</th>
                                                        <th>Po Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="td_body">
                                                    <tr>
                                                        <td style='text-align: center'><img id='plusImg' class="add_po" src='../../assets/add-button.png'></td>  
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="po_no" name='po_no[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('po_no').value = "<?php echo ($_POST['po_no']);?>";
                                                            </script>
                                                        </td>
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="po_item" name='po_item[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('po_item').value = "<?php echo ($_POST['po_item']);?>";
                                                            </script>
                                                        </td>
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="plant" name='plant[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('plant').value = "<?php echo ($_POST['plant']);?>";
                                                            </script>
                                                        </td>
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="supp_name" name='supp_name[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('supp_name').value = "<?php echo ($_POST['supp_name']);?>";
                                                            </script>
                                                        </td>
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="short_text" name='short_text[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('short_text').value = "<?php echo ($_POST['short_text']);?>";
                                                            </script>
                                                        </td>
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="po_itm_txt" name='po_itm_txt[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('po_itm_txt').value = "<?php echo ($_POST['po_itm_txt']);?>";
                                                            </script>
                                                        </td>
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="po_qty" name='po_qty[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('po_qty').value = "<?php echo ($_POST['po_qty']);?>";
                                                            </script>
                                                        </td>
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="order_unt" name='order_unt[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('order_unt').value = "<?php echo ($_POST['order_unt']);?>";
                                                            </script>
                                                        </td>
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="po_itm_price" name='po_itm_price[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('po_itm_price').value = "<?php echo ($_POST['po_itm_price']);?>";
                                                            </script>
                                                        </td>
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="po_doc_date" name='po_doc_date[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('po_doc_date').value = "<?php echo ($_POST['po_doc_date']);?>";
                                                            </script>
                                                        </td>
                                                        <td style='text-align: start; background-color: #FFFFFF	'>
                                                            <input id="po_stat" name='po_stat[]' type="text" autocomplete="off" 
                                                            style=" background-color: transparent">                                           
                                                            
                                                            <script>
                                                                document.getElementById('po_stat').value = "<?php echo ($_POST['po_stat']);?>";
                                                            </script>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    
                                    <!-- <div class="modal-footer">
                                        <input type="hidden" value="1" name="type">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <button type="button" class="btn btn-success" id="btn-add">Add</button>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>

                        <!-- <datalist id="supp_list">
                            <option value=""></option>
                            <?php 
                                // $sql = "SELECT DISTINCT VENDOR_CODE, VENDOR_NAME FROM IT_ASSET_VENDORS";
                                // $res = oci_parse(connection(), $sql);
                                // oci_execute($res);

                                // while($row = oci_fetch_row($res)){
                                //     echo "<option value='".htmlspecialchars($row[1],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                // }
                            ?>
                        </datalist> -->
                        
                        <br>

                    </div>
                </div>
                <br>
                <!-- /.container-fluid -->
            
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModal">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login/index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
    <script src="../../datatable/datatables.js"></script>
    <script src="../../assets/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../assets/file_input/js/fileinput.js"></script>
    <!-- Page level custom scripts -->
    <!-- <script src="../../js/demo/datatables-demo.js"></script> -->
    <script src="../../assets/selectize/dist/js/selectize.js"></script>
    <script src="../../assets/lodash.js"></script>

</body>
<script>
    $(document).ready(function(){
        const name = '<?php echo $username ?>';
        // datatable 
        const myModalEl = document.getElementById("srch_po")
        myModalEl.addEventListener('shown.bs.modal', function(){
            table.columns.adjust().draw()

        })

        var dtl_table = $("#dtl_dataTable").DataTable({
            searching: false, 
            paging: false, 
            info: false,
            ordering: false,
            fixedColumns: {leftColums: 1},
            "oLanguage": {"sZeroRecords": "", "sEmptyTable": ""},

            "rowCallback": function(row, data) {
               $(row).find('td:nth-child(2)').attr('class', 'emp_name')
               $(row).find('td:nth-child(3)').attr('class', 'dept')
               $(row).find('td:nth-child(4)').attr('class', 'emp_id')
               $(row).find('td:nth-child(5)').attr('class', 'emp_add')
               $(row).find('td:nth-child(6)').attr('class', 'work_loc')
               $(row).find('td:nth-child(7)').attr('class', 'off_phone')
               $(row).find('td:nth-child(8)').attr('class', 'mob_phone')
               $(row).find('td:nth-child(9)').attr('class', 'hired_date')
               $(row).find('td:nth-child(10)').attr('class', 'per_email')
               $(row).find('td:nth-child(11)').attr('class', 'bus_email')
               $(row).find('td:nth-child(12)').addClass('ref_per').attr('hidden', true);
               $(row).find('td:nth-child(13)').attr('class', 'po_num')
               $(row).find('td:nth-child(14)').attr('class', 'supp')
               $(row).find('td:nth-child(15)').attr('class', 'req_grp')
               $(row).find('td:nth-child(16)').attr('class', 'req_type')
               $(row).find('td:nth-child(17)').attr('class', 'ass_grp')
               $(row).find('td:nth-child(18)').attr('class', 'ass_sub_grp')
               $(row).find('td:nth-child(19)').attr('class', 'brand')
               $(row).find('td:nth-child(20)').attr('class', 'model')
               $(row).find('td:nth-child(21)').attr('class', 'series')
               $(row).find('td:nth-child(22)').attr('class', 'unit_price')
               $(row).find('td:nth-child(23)').attr('class', 'ser_no1')
               $(row).find('td:nth-child(24)').attr('class', 'ser_no2')
               $(row).find('td:nth-child(25)').attr('class', 'ser_no3')
               $(row).find('td:nth-child(26)').attr('class', 'ser_no4')
               $(row).find('td:nth-child(27)').attr('class', 'ass_code')
               $(row).find('td:nth-child(28)').attr('class', 'del_note')
               $(row).find('td:nth-child(29)').attr('class', 'del_date')
               $(row).find('td:nth-child(30)').attr('class', 'mtrl_short')
               $(row).find('td:nth-child(31)').attr('class', 'lic_start')
               $(row).find('td:nth-child(32)').attr('class', 'lic_month')
               $(row).find('td:nth-child(33)').attr('class', 'lic_exp')
               $(row).find('td:nth-child(34)').attr('class', 'war_start')
               $(row).find('td:nth-child(35)').attr('class', 'war_month')
               $(row).find('td:nth-child(36)').attr('class', 'war_exp')
               $(row).find('td:nth-child(37)').attr('Class', 'ass_flagT')
               $(row).find('td:nth-child(38)').attr('class', 'rem')
            //    $(row).find('td:nth-child(38)').attr('class', 'attch')
               $(row).find('td:nth-child(39)').attr('class', 'po_doc_date1')
               $(row).find('td:nth-child(40)').attr('class', 'plant1')
               $(row).find('td:nth-child(41)').attr('class', 'status')
               $(row).find('td:nth-child(42)').attr('class', 'qty')
               $(row).find('td:nth-child(43)').attr('class', 'unit')
               $(row).find('td:nth-child(44)').attr('class', 'po_item1')
               $(row).find('td:nth-child(45)').addClass('supp1').attr('hidden', true);
               $(row).find('td:nth-child(46)').addClass('req_grp1').attr('hidden', true);
               $(row).find('td:nth-child(47)').addClass('req_type1').attr('hidden', true);
               $(row).find('td:nth-child(48)').addClass('ass_grp1').attr('hidden', true);
               $(row).find('td:nth-child(49)').addClass('ass_sub_grp1').attr('hidden', true);
               $(row).find('td:nth-child(50)').addClass('brand1').attr('hidden', true);
               $(row).find('td:nth-child(51)').addClass('model1').attr('hidden', true);

            //    $(row).find('td:nth-child(50)').attr('class', 'model1' hidden)
            }
        })

        $('#dtl_dataTable tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                dtl_table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        var table = $("#dataTable").DataTable({
            searching: false, 
            paging: false, 
            info: false,
            ordering: false,
            fixedColumns: {leftColums: 1},
            destroy: true,
            "bDestroy": true
        });
        
        // $('#dataTable').DataTable({
        //     fixedColumns: {
        //       leftColumns: 1,
            
        //     }
        //   });

        //department 
        // $("#department").selectize()
        // $("#department").change(function(){
        //     var department = $(this).val()
        //     $.ajax({
        //     url:"../../logic/assets.php",
        //     method:"POST",
        //     data:{department: department},
        //     success:function(department){
        //         $("#empl_name").empty()
        //         $("#empl_name").append(department)
        //     }
        //     })
        // })

        // $("#add_btn").click(function(){
        //     $('#info').modal('show')
        // })

        // empl_name
        $("#empl_name").selectize()
        $("#empl_name").change(function(){
            var empl_name = $(this).val()
            $.ajax({
                url:"../../logic/empl_details.php",
                method:"POST",
                data:{empl_name: empl_name},
                success:function(res){
                    $("#dept").val(res.DEPT)
                    $("#emp_id").val(res.EMPLID)
                    $("#emp_add").val(res.ADDRESS)
                    $("#work_loc").val(res.LOCATION)
                    $("#off_phone").val(res.OFFICEPHONE)
                    $("#mob_phone").val(res.MOBILEPHONE)
                    $("#hired_date").val(res.HIREDDATE)
                    $("#per_email").val(res.PERSONAL_EMAIL)
                    $("#bus_email").val(res.BUSINESS_EMAIL)
                }
            })
        })

        // empl_name1 edit info modal
        $("#empl_name1").selectize()
        $("#empl_name1").change(function(){
            var empl_name1 = $(this).val()
            $.ajax({
                url:"../../logic/empl_details.php",
                method:"POST",
                data:{empl_name1: empl_name1},
                success:function(res){
                    $("#dept1").val(res.DEPT)
                    $("#emp_id1").val(res.EMPLID)
                    $("#emp_add1").val(res.ADDRESS)
                    $("#work_loc1").val(res.LOCATION)
                    $("#off_phone1").val(res.OFFICEPHONE)
                    $("#mob_phone1").val(res.MOBILEPHONE)
                    $("#hired_date1").val(res.HIREDDATE)
                    $("#per_email1").val(res.PERSONAL_EMAIL)
                    $("#bus_email1").val(res.BUSINESS_EMAIL)
                }
            })
        })

        $("#set_po").click(function(){
            var po_num = $('#po_no').val()
            if(po_num > 0){
                var get = 1
                // var po_dtls = 1
                // console.log (po_num)
                // $("#po_num").val(po_num)
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'PO NUMBER Selected!',
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-right',
                    timer: 2000,
                    timerProgressBar: true
                })
                $.ajax({
                    type: "POST",
                    url: "../../logic/po_search.php",
                    data: {po_num: po_num},
                    success: function(res){
                        $("#po_no")[0].selectize.disable()
                        // $('#srch_po').modal('show')
                        $('#dataTable').DataTable().clear().draw()               
                        $('#td_body').html(res) 
                    }
                })
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please SELECT PO NUMBER!',
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-right',
                    timer: 2000,
                    timerProgressBar: true
                });
            }
        })

        $("#reset_po").click(function(){
            $("#po_no")[0].selectize.enable()
        })

        // PO Number
       $("#po_no").selectize({
            create: true,
            maxOptions: 100,
        })
        $("#add_btn").click(function(){
            $('#srch_po').modal('show')

            var po_item1 = []
            var po_item = []

            // po_item1 datatable in ui
            $(".po_item1").each(function(){
                po_item1.push(this.innerText)
            })
                
            $(po_item1).each(function(e){
                $('#dataTable tbody tr td input.po_item').each(function(){
                    var po_items = $(this).val()
                    if (po_items == po_item1[e]){
                        $(this).closest('tr').find('td').eq(0).html("<i class='fa-solid fa-check' style='color: blue'></i>")
                    }
                })
            })    

            // var po_num = $('#po_no').val()
            // var po_item1 = []
            // if(po_num > 0){
            //     var get = 1
            //     // var po_dtls = 1
            //     // console.log (po_num)
            //     // $("#po_num").val(po_num)
            //     $(".po_item1").each(function(){
            //         po_item1.push(this.innerText)
            //     })

            //     $.ajax({
            //         type: "POST",
            //         url: "../../logic/po_search.php",
            //         data: {po_num: po_num, po_item1: po_item1},
            //         success: function(res){ 
                        
            //             $('#dataTable').DataTable().clear().draw()               
            //             $('#td_body').html(res) 
            //         }
            //     })
            // }
            // else{
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Error',
            //         text: 'Please SELECT PO NUMBER!',
            //         showConfirmButton: false,
            //         toast: true,
            //         position: 'top-right',
            //         timer: 2000,
            //         timerProgressBar: true
            //     });
            // }
            
            $(document).on("click", ".add_po", function(){
                var po_no = $(this).closest("tr").find(".po_num").val()
                var po_item = $(this).closest("tr").find(".po_item").val()
                $.ajax({
                    type: "POST",
                    url: "../../logic/empl_details.php",
                    data:{po_no: po_no, po_item: po_item},
                    success: function(res1){
                        $("#srch_po").modal("hide")
                        $('#info').modal('show')
                        $("#po_name").val(res1.PO_NO)
                        $("#po_doc_date").val(res1.PO_DOC_DATE)
                        $("#plant").val(res1.PLANT)
                        $("#status").val(res1.PO_STATUS)
                        $("#supplier").val(res1.VENDOR_CODE)
                        $("#price").val(res1.PO_UNT_PRICE)
                        $("#del_date").val(res1.PO_DEL_DATE)
                        $("#malt_shrt").val(res1.MATERIAL_SHORT)
                        $("#qty"). val(res1.QUANTITY)
                        $("#unit").val(res1.UNIT)
                        $("#item").val(res1.ITEM)
                    }
                })
            })  
        })

        $("#req_grp").change(function(){
            var req_grp = $(this).val()
            $.ajax({
            url:"../../logic/type.php",
            method:"POST",
            data:{req_grp:req_grp},
            success:function(req_grp){
                $("#type").empty()
                $("#type").append(req_grp)
            }
            })
        })
        $("#type").change(function(){
            var type = $(this).val()
            $.ajax({
            url:"../../logic/type.php",
            method:"POST",
            data:{type:type},
            success:function(type){
                $("#asset_group").empty()
                $("#asset_group").append(type)
            }
            })
        })
        $("#asset_group").change(function(){
            var asset_group = $(this).val()
            $.ajax({
            url:"../../logic/type.php",
            method:"POST",
            data:{asset_group:asset_group},
            success:function(asset_group){
                $("#asset_sub_group").empty()
                $("#asset_sub_group").append(asset_group)
            }
            })
        })
        $("#asset_sub_group").change(function(){
            var asset_sub_group = $(this).val()
            $.ajax({
            url:"../../logic/type.php",
            method:"POST",
            data:{asset_sub_group:asset_sub_group},
            success:function(asset_sub_group){
                $("#brand").empty()
                $("#brand").append(asset_sub_group)
            }
            })
        })
        $("#brand").change(function(){
            var brand = $(this).val()
            $.ajax({
            url:"../../logic/type.php",
            method:"POST",
            data:{brand:brand},
            success:function(brand){
                $("#model").empty()
                $("#model").append(brand)
            }
            })
        })

        // edit info 
        $("#req_grp1").change(function(){
            var req_grp1 = $(this).val()
            $.ajax({
            url:"../../logic/edit_info_assets.php",
            method:"POST",
            data:{req_grp1:req_grp1},
            success:function(req_grp1){
                $("#req_type1").empty()
                $("#req_type1").append(req_grp1)
            }
            })
        })
        $("#req_type1").change(function(){
            var req_type1 = $(this).val()
            $.ajax({
            url:"../../logic/edit_info_assets.php",
            method:"POST",
            data:{req_type1:req_type1},
            success:function(req_type1){
                $("#asset_group1").empty()
                $("#asset_group1").append(req_type1)
            }
            })
        })
        $("#asset_group1").change(function(){
            var asset_group1 = $(this).val()
            $.ajax({
            url:"../../logic/edit_info_assets.php",
            method:"POST",
            data:{asset_group1:asset_group1},
            success:function(asset_group1){
                $("#asset_sub_group1").empty()
                $("#asset_sub_group1").append(asset_group1)
            }
            })
        })
        $("#asset_sub_group1").change(function(){
            var asset_sub_group1 = $(this).val()
            $.ajax({
            url:"../../logic/edit_info_assets.php",
            method:"POST",
            data:{asset_sub_group1:asset_sub_group1},
            success:function(asset_sub_group1){
                $("#brand1").empty()
                $("#brand1").append(asset_sub_group1)
            }
            })
        })
        $("#brand1").change(function(){
            var brand1 = $(this).val()
            $.ajax({
            url:"../../logic/edit_info_assets.php",
            method:"POST",
            data:{brand1:brand1},
            success:function(brand1){
                $("#model1").empty()
                $("#model1").append(brand1)
            }
            })
        })
        
    //supplier 
    //   $("#supplier").selectize({
    //     create: true,
        
    //   })
        // $("#supplier").selectize({
        //     create: true,
        //     maxOptions: 100,
        // })
        $("#supplier").on("change", function(){
            var supp_hide = $(this).val()
            $("#supp_hide").val(supp_hide)
        })

        $("#supplier1").on("change", function(){
            var supp_hide1 = $(this).val()
            $("#supp_hide1").val(supp_hide1)
        })

        // license
        $("#license_month").change(function(){
            var duration = $(this).val()
            var license_start = $("#license_start").val()
            $.ajax({
                method: 'POST',
                url: "../../logic/expired.php",
                data :{duration:duration, license_start:license_start},
                success:function(res){
                    $("#license_exp").val(res)
                }
            })
        })

        // warranty
        $("#war_month").change(function(){
            var war_duration = $(this).val()
            var war_start = $("#war_start").val()
            $.ajax({
                method: 'POST',
                url: "../../logic/war_expired.php",
                data :{war_duration:war_duration, war_start:war_start},
                success:function(res){
                    $("#war_exp").val(res)
                }
            })
        })

        // close modal btn
        $("#close_btn").click(function(){
            Swal.fire({
                title: 'Are you sure?',
                text: 'This will be closed',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                confirmButtonColor: 'green',
                cancelButtonColor: 'red'
            }).then( confirm => {
                if(confirm.isConfirmed){
                    $("#info").modal('hide')
                }
            })
        })

        $("#close_btn1").click(function(){
            Swal.fire({
                title: 'Are you sure?',
                text: 'This will be closed',
                icon: 'question',
                showCancelButton: true,
                reverseButtons: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                confirmButtonColor: 'green',
                cancelButtonColor: 'red'
            }).then( confirm => {
                if(confirm.isConfirmed){
                    $("#edit_info").modal('hide')
                }
            })
        })

        // add button in modal receiver and information
        var count_item = 0
        // var imagebase64 = []
        // var uploadedFilename = [];
        $("#add_btn1").click(function(){
            // imagebase64.length = 0
            // uploadedFilename.length = 0
            // var filesname= $('#attch').prop('files');
            // var file = $('#attch').prop('files')[0];
            // var reader = new FileReader();
            // reader.onload = function(event) {
            //     var base64String = event.target.result.split(',')[1];
            //     imagebase64.push('data:image/jpeg;base64,' + base64String);
            // };
            // $.each(filesname, function(index, file) {
            //     uploadedFilename.push(file.name);
            // });
            // reader.readAsDataURL(file);

            var table = $("#dtl_dataTable").DataTable();
            count_item ++
            var empl_name = $("#empl_name").find(":selected").text()
            var dept = $("#dept").val()
            var emp_id = $("#emp_id").val()
            var emp_add = $("#emp_add").val()
            var work_loc = $("#work_loc").val()
            var off_phone = $("#off_phone").val()
            var mob_phone = $("#mob_phone").val()
            var hired_date = $("#hired_date").val()
            var per_email = $("#per_email").val()
            var bus_email = $("#bus_email").val()
            var ref_person = $("#ref_person").val()
            var po_no = $("#po_name").val()
            var plant = $("#plant").val()
            var po_doc_date = $("#po_doc_date").val()
            var status = $("#status").val()
            var supplier = $("#supplier").find(":selected").text()
            var req_grp = $("#req_grp").find(":selected").text()
            var type = $("#type").find(":selected").text()
            var asset_group = $("#asset_group").find(":selected").text()
            var asset_sub_group = $("#asset_sub_group").find(":selected").text()
            var brand = $("#brand").find(":selected").text()
            var model = $("#model").find(":selected").text()
            var series = $("#series").val()
            var price = $("#price").val()
            var ser_no = $("#ser_no").val()
            var ser_no2 = $("#ser_no2").val()
            var ser_no3 = $("#ser_no3").val()
            var ser_no4 = $("#ser_no4").val()
            var ass_code = $("#ass_code").val()
            var del_note = $("#del_note").val()
            var del_date = $("#del_date").val()
            var malt_shrt = $("#malt_shrt").val()
            var license_start = $("#license_start").val()
            var license_month = $("#license_month").val()
            var license_exp = $("#license_exp").val()
            var war_start = $("#war_start").val()
            var war_month = $("#war_month").val()
            var war_exp = $("#war_exp").val()
            var ass_flagR = $("#ass_flagR").val()
            var remarks = $("#remarks").val()
            var qty = $("#qty").val()
            var unit = $("#unit").val()
            var item = $("#item").val()
            var supp1 = $("#supplier").val()
            var req_grp1 = $("#req_grp").val()
            var type1 = $("#type").val()
            var asset_group1 = $("#asset_group").val()
            var asset_sub_group1 = $("#asset_sub_group").val()
            var brand1 = $("#brand").val()
            var model1 = $("#model").val()
            // var attch = $("#attch").val()

           var rowdata = [count_item, empl_name, dept, emp_id, emp_add, work_loc, off_phone, mob_phone, hired_date,
           per_email, bus_email, ref_person, po_no, supplier, req_grp, type, asset_group, asset_sub_group, brand, model, series,
           price, ser_no, ser_no2, ser_no3, ser_no4, ass_code, del_note, del_date, malt_shrt, license_start, license_month,
           license_exp, war_start, war_month, war_exp, ass_flagR, remarks, po_doc_date, plant, status, qty, unit, item,
           supp1, req_grp1, type1, asset_group1, asset_sub_group1, brand1, model1]

        //    uploadedFilename[0],

           table.row.add(rowdata).draw();
           $("#info").modal("hide")
           $("#empl_name")[0].selectize.clear();
           $("#info-form")[0].reset()

        //    $("Form").each(function() {
        //     this.reset();
        //     });
        })

        // edit btn in the UI
        $("#edit_btn").click(function(){
            var tr_parent = $("#dtl_dataTable tbody tr.selected")
            if(tr_parent.length > 0){
                // var emp_name = $(tr_parent).find("td").eq(1).text()
                var dept = $(tr_parent).find("td").eq(2).text()
                var emp_id = $(tr_parent).find("td").eq(3).text()
                var emp_add = $(tr_parent).find("td").eq(4).text()
                var work_loc = $(tr_parent).find("td").eq(5).text()
                var off_phone = $(tr_parent).find("td").eq(6).text()
                var mob_phone = $(tr_parent).find("td").eq(7).text()
                var hired_date = $(tr_parent).find("td").eq(8).text()
                var per_email = $(tr_parent).find("td").eq(9).text()
                var bus_email = $(tr_parent).find("td").eq(10).text()
                var ref_person1 = $(tr_parent).find("td").eq(11).text()
                var po_number = $(tr_parent).find("td").eq(12).text()
                var supp = $(tr_parent).find("td").eq(13).text()
                var req_grp = $(tr_parent).find("td").eq(14).text()
                var req_type = $(tr_parent).find("td").eq(15).text()
                var ass_grp = $(tr_parent).find("td").eq(16).text()
                var ass_sub_grp = $(tr_parent).find("td").eq(17).text()
                var brand = $(tr_parent).find("td").eq(18).text()
                var model = $(tr_parent).find("td").eq(19).text()
                var series1 = $(tr_parent).find("td").eq(20).text()
                var price = $(tr_parent).find("td").eq(21).text()
                var ser_no1 = $(tr_parent).find("td").eq(22).text()
                var ser_no2 = $(tr_parent).find("td").eq(23).text()
                var ser_no3 = $(tr_parent).find("td").eq(24).text()
                var ser_no4 = $(tr_parent).find("td").eq(25).text()
                var ass_code = $(tr_parent).find("td").eq(26).text()
                var del_note = $(tr_parent).find("td").eq(27).text()
                var del_date = $(tr_parent).find("td").eq(28).text()
                var mtrl = $(tr_parent).find("td").eq(29).text()
                var lic_start = $(tr_parent).find("td").eq(30).text()
                var lic_month = $(tr_parent).find("td").eq(31).text()
                var lic_exp = $(tr_parent).find("td").eq(32).text()
                var war_start = $(tr_parent).find("td").eq(33).text()
                var war_month = $(tr_parent).find("td").eq(34).text()
                var war_exp = $(tr_parent).find("td").eq(35).text()
                var ass_flagR = $(tr_parent).find("td").eq(36).text()
                var rem = $(tr_parent).find("td").eq(37).text()
                // var attch = $(tr_parent).find('td:eq(36) input[type=file]').prop('files')[0];
                // var attch = $(tr_parent).find('td:eq(37) img').attr('src');
                var po_doc_date = $(tr_parent).find("td").eq(38).text()
                var plant = $(tr_parent).find("td").eq(39).text()
                var status = $(tr_parent).find("td").eq(40).text()
                var quantity = $(tr_parent).find("td").eq(41).text()
                var unit = $(tr_parent).find("td").eq(42).text()
                var po_item = $(tr_parent).find("td").eq(43).text()

                // $("#empl_name1").val(emp_id);
                var selectize = $('#empl_name1').selectize()
                var select = selectize[0].selectize
                select.setValue(emp_id, false);

                $("#dept1").val(dept);
                $("#emp_id1").val(emp_id);
                $("#emp_add1").val(emp_add);
                $("#work_loc1").val(work_loc);
                $("#off_phone1").val(off_phone);
                $("#mob_phone1").val(mob_phone);
                $("#hired_date1").val(hired_date);
                $("#per_email1").val(per_email);
                $("#bus_email1").val(bus_email);
                $("#ref_person1").val(ref_person1);
                $("#supplier1").find(":selected").text(supp);
                $("#req_grp1").find(":selected").text(req_grp);
                $("#req_type1").find(":selected").text(req_type)
                $("#asset_group1").find(":selected").text(ass_grp);
                $("#asset_sub_group1").find(":selected").text(ass_sub_grp);
                $("#brand1").find(":selected").text(brand);
                $("#model1").find(":selected").text(model);
                $("#series1").val(series1);
                $("#price1").val(price);
                $("#ser_no11").val(ser_no1);
                $("#ser_no21").val(ser_no2);
                $("#ser_no31").val(ser_no3);
                $("#ser_no41").val(ser_no4);
                $("#ass_code1").val(ass_code);
                $("#del_note1").val(del_note);
                $("#del_date1").val(del_date);
                $("#malt_shrt1").val(mtrl);
                $("#license_start1").val(lic_start);
                $("#license_month1").val(lic_month);
                $("#license_exp1").val(lic_exp);
                $("#war_start1").val(war_start);
                $("#war_month1").val(war_month);
                $("#war_exp1").val(war_exp);
                $("#ass_flagE").val(ass_flagR);
                $("#remarks1").val(rem);
                // $("#attch1").val(attch);
                $("#po_doc_date1").val(po_doc_date);
                $("#plant2").val(plant);
                $("#status1").val(status);
                $("#po_name1").val(po_number);
                $("#qty1").val(quantity);
                $("#unit1").val(unit);
                $("#item1").val(po_item);

                // var attch_input = $("#attch1");
                // attch_input.val(null); 
                // if (attch) {
                //     var blob = dataURItoBlob(attch);
                //     var jpegFile = new File([blob], 'image.jpg', { type: 'image/jpeg' });
                //     var pngFile = new File([blob], 'image.png', { type: 'image/png' });
                //     attch_input[0].files[0] = jpegFile; // or pngFile, depending on the file type
                // }
                
                $("#edit_info").modal("show");  
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Plese select ROW you want to EDIT',
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-right',
                    timer: 2000,
                    timerProgressBar: true
                });
            }
        });

        // update btn after clicking the edit btn
        $("#update_btn").click(function(){
            event.preventDefault();
            var emp_name = $("#empl_name1").find(":selected").text();
            var dept = $("#dept1").val();
            var emp_id = $("#emp_id1").val();
            var emp_add = $("#emp_add1").val()
            var work_loc = $("#work_loc1").val()
            var off_phone = $("#off_phone1").val()
            var mob_phone = $("#mob_phone1").val()
            var hired_date = $("#hired_date1").val()
            var per_email = $("#per_email1").val()
            var bus_email = $("#bus_email1").val()
            var ref_person1 = $("#ref_person1").val()
            var po_no = $("#po_name1").val()
            var supplier = $("#supplier1").find(":selected").text()
            var req_grp = $("#req_grp1").find(":selected").text()
            var type = $("#req_type1").find(":selected").text()
            var asset_group = $("#asset_group1").find(":selected").text()
            var asset_sub_group = $("#asset_sub_group1").find(":selected").text()
            var brand = $("#brand1").find(":selected").text()
            var model = $("#model1").find(":selected").text()
            var series1 = $("#series1").val()
            var price = $("#price1").val()
            var ser_no1 = $("#ser_no11").val()
            var ser_no2 = $("#ser_no21").val()
            var ser_no3 = $("#ser_no31").val()
            var ser_no4 = $("#ser_no41").val()
            var ass_code = $("#ass_code1").val()
            var del_note = $("#del_note1").val()
            var del_date = $("#del_date1").val()
            var malt_shrt = $("#malt_shrt1").val()
            var license_start = $("#license_start1").val()
            var license_month = $("#license_month1").val()
            var license_exp = $("#license_exp1").val()
            var war_start = $("#war_start1").val()
            var war_month = $("#war_month1").val()
            var war_exp = $("#war_exp1").val()
            var ass_flagE = $("#ass_flagE").val()
            var remarks = $("#remarks1").val()
            // var attch = $("#attch1").prop('files')[0];
            var po_doc_date = $("#po_doc_date1").val()
            var plant = $("#plant2").val()
            var status = $("#status1").val()
            var qty = $("#qty1").val()
            var unit = $("#unit1").val()
            var item = $("#item1").val()

            var tr_parent = $("#dtl_dataTable tbody tr.selected");
            tr_parent.find("td").eq(1).text(emp_name)
            tr_parent.find("td").eq(2).text(dept)
            tr_parent.find("td").eq(3).text(emp_id)
            tr_parent.find("td").eq(4).text(emp_add)
            tr_parent.find("td").eq(5).text(work_loc)
            tr_parent.find("td").eq(6).text(off_phone)
            tr_parent.find("td").eq(7).text(mob_phone)
            tr_parent.find("td").eq(8).text(hired_date)
            tr_parent.find("td").eq(9).text(per_email)
            tr_parent.find("td").eq(10).text(bus_email)
            tr_parent.find("td").eq(11).text(ref_person1)
            tr_parent.find("td").eq(12).text(po_no)
            tr_parent.find("td").eq(13).text(supplier)
            tr_parent.find("td").eq(14).text(req_grp)
            tr_parent.find("td").eq(15).text(type)
            tr_parent.find("td").eq(16).text(asset_group)
            tr_parent.find("td").eq(17).text(asset_sub_group)
            tr_parent.find("td").eq(18).text(brand)
            tr_parent.find("td").eq(19).text(model)
            tr_parent.find("td").eq(20).text(series1)
            tr_parent.find("td").eq(21).text(price)
            tr_parent.find("td").eq(22).text(ser_no1)
            tr_parent.find("td").eq(23).text(ser_no2)
            tr_parent.find("td").eq(24).text(ser_no3)
            tr_parent.find("td").eq(25).text(ser_no4)
            tr_parent.find("td").eq(26).text(ass_code)
            tr_parent.find("td").eq(27).text(del_note)
            tr_parent.find("td").eq(28).text(del_date)
            tr_parent.find("td").eq(29).text(malt_shrt)
            tr_parent.find("td").eq(30).text(license_start)
            tr_parent.find("td").eq(31).text(license_month)
            tr_parent.find("td").eq(32).text(license_exp)
            tr_parent.find("td").eq(33).text(war_start)
            tr_parent.find("td").eq(34).text(war_month)
            tr_parent.find("td").eq(35).text(war_exp)
            tr_parent.find("td").eq(36).text(ass_flagE)
            tr_parent.find("td").eq(37).text(remarks)
            // attchtr_parent).find('td:eq(36) input[type=file]').prop('files')[0];
            // attchtr_parent).find('td:eq(36) img').attr('src');
            tr_parent.find("td").eq(38).text(po_doc_date)
            tr_parent.find("td").eq(39).text(plant)
            tr_parent.find("td").eq(40).text(status)
            tr_parent.find("td").eq(41).text(qty)
            tr_parent.find("td").eq(42).text(unit)
            tr_parent.find("td").eq(43).text(item)

            // if (attch) {
            //     var reader = new FileReader();
            //     reader.onload = function(event){
            //         tr_parent.find('td:eq(37) img').attr('src', event.target.result);
            //     }
            //     reader.onerror = function(event) {
            //         console.error("FileReader error:", event.target.error);
            //     }
            //     reader.readAsDataURL(attch);
            // }

            $("#edit_info").modal("hide");
            // show a success message to the user
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Row updated successfully',
                showConfirmButton: false,
                toast: true,
                position: 'top-right',
                timer: 2000,
                timerProgressBar: true
            });
        });

        // remove selected row in the data table
        $("#remove_btn").click(function(){
            var table = $('#dtl_dataTable').DataTable();
            var selectedRow = table.rows('.selected').indexes();
            if (selectedRow.length > 0) {
                var selectedRowIndex = selectedRow[0];
                table.row(selectedRowIndex).remove().draw();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Plese select ROW you want to REMOVE',
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-right',
                    timer: 2000,
                    timerProgressBar: true
                });
            }
        });

        // $('#remove_btn').click(function () {
        //     dtl_table.row('.selected').remove().draw(false);
        // });

        // save btn in UI
        $("#save_btn1").click(function(){
            // var table_parent = $(this).closest('.card').find(".dataTable").attr("id")
            // var count =  $('#dtl_dataTable').DataTable().data().rows().count()

            // table.rows().eq(0).each( function ( index ) {
            //     var row = table.row( index );
            // })
            
            // var file = $("#attch")[0].files[0];            
            // if (file){
            //     var reader = new FileReader();
            //     reader.onload = function(e) {
            //         var base64 = e.target.result;
                    var data = 1
                    var po_no = $("#po_no").val()
                    var emp_id = []
                    var ref_per = []
                    var supp1 = []
                    var req_grp1 = []
                    var req_type1 = []
                    var ass_grp1 = []
                    var ass_sub_grp1 = []
                    var brand1 = []
                    var model1 = []
                    var series = []
                    var unit_price = []
                    var ser_no1 = []
                    var ser_no2 = []
                    var ser_no2 = []
                    var ser_no3 = []
                    var ser_no4 = []
                    var ass_code = []
                    var del_note = []
                    var del_date = []
                    var mtrl_short = []
                    var lic_start = []
                    var lic_month = []
                    var lic_exp = []
                    var war_start = []
                    var war_month = []
                    var war_exp = []
                    var ass_flagT = []
                    var rem = []
                    var attch = []
                    var po_doc_date1 = []
                    var plant1 = []
                    var status = []
                    var qty = []
                    var unit = []
                    var po_item1 = []
                    // var control = document.getElementById("attch")
                    // var file = control.files[0];
                    // var filetype = file.type;
                    // let validfiles = ["image/jpeg", "image/jpg", "image/png"];
                    // if(validfiles.includes(filetype)){
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'This will be saved in database',
                            icon: 'question',
                            showCancelButton: true,
                            reverseButtons: true,
                            cancelButtonText: 'No',
                            confirmButtonText: 'Yes',
                            confirmButtonColor: 'green',
                            cancelButtonColor: 'red'
                        }).then(confirm =>{
                            if(confirm.isConfirmed){
                                // var ajaxData = new FormData();
                                // ajaxData.append("name", name)
                                // ajaxData.append("po_no", po_no)
                                // ajaxData.append("data", data)

                                $(".emp_id").each(function(){
                                    emp_id.push(this.innerText)
                                })
                                // ajaxData.append("emp_id", emp_id)

                                $(".ref_per").each(function(){
                                    ref_per.push(this.innerText)
                                })
                                // ajaxData.append("ref_per", ref_per)

                                $(".supp1").each(function(){
                                    supp1.push(this.innerText)
                                })
                                // ajaxData.append("supp1", supp1)

                                $(".req_grp1").each(function(){
                                    req_grp1.push(this.innerText)
                                })
                                // ajaxData.append("req_grp1", req_grp1)

                                $(".req_type1").each(function(){
                                    req_type1.push(this.innerText)
                                })
                                // ajaxData.append("req_type1", req_type1)

                                $(".ass_grp1").each(function(){
                                    ass_grp1.push(this.innerText)
                                })
                                // ajaxData.append("ass_grp1", ass_grp1)

                                $(".ass_sub_grp1").each(function(){
                                    ass_sub_grp1.push(this.innerText)
                                })
                                // ajaxData.append("ass_sub_grp1", ass_sub_grp1)

                                $(".brand1").each(function(){
                                    brand1.push(this.innerText)
                                })
                                // ajaxData.append("brand1", brand1)

                                $(".model1").each(function(){
                                    model1.push(this.innerText)
                                })
                                // ajaxData.append("model1", model1)

                                $(".series").each(function(){
                                    series.push(this.innerText)
                                })
                                // ajaxData.append("series", series)

                                $(".unit_price").each(function(){
                                    unit_price.push(this.innerText)
                                })
                                // ajaxData.append("unit_price", unit_price)

                                $(".ser_no1").each(function(){
                                    ser_no1.push(this.innerText)
                                })
                                // ajaxData.append("ser_no1", ser_no1)

                                $(".ser_no2").each(function(){
                                    ser_no2.push(this.innerText)
                                })
                                // ajaxData.append("ser_no2", ser_no2)

                                $(".ser_no3").each(function(){
                                    ser_no3.push(this.innerText)
                                })
                                // ajaxData.append("ser_no3", ser_no3)

                                $(".ser_no4").each(function(){
                                    ser_no4.push(this.innerText)
                                })
                                // ajaxData.append("ser_no4", ser_no4)

                                $(".ass_code").each(function(){
                                    ass_code.push(this.innerText)
                                })
                                // ajaxData.append("ass_code", ass_code)

                                $(".del_note").each(function(){
                                    del_note.push(this.innerText)
                                })
                                // ajaxData.append("del_note", del_note)

                                $(".del_date").each(function(){
                                    del_date.push(this.innerText)
                                })
                                // ajaxData.append("del_date", del_date)

                                $(".mtrl_short").each(function(){
                                    mtrl_short.push(this.innerText)
                                })
                                // ajaxData.append("mtrl_short", mtrl_short)

                                $(".lic_start").each(function(){
                                    lic_start.push(this.innerText)
                                })
                                // ajaxData.append("lic_start", lic_start)

                                $(".lic_month").each(function(){
                                    lic_month.push(this.innerText)
                                })
                                // ajaxData.append("lic_month", lic_month)

                                $(".lic_exp").each(function(){
                                    lic_exp.push(this.innerText)
                                })
                                // ajaxData.append("lic_exp", lic_exp)

                                $(".war_start").each(function(){
                                    war_start.push(this.innerText)
                                })
                                // ajaxData.append("war_start", war_start)

                                $(".war_month").each(function(){
                                    war_month.push(this.innerText)
                                })
                                // ajaxData.append("war_month", war_month)

                                $(".war_exp").each(function(){
                                    war_exp.push(this.innerText)
                                })
                                // ajaxData.append("war_exp", war_exp)

                                $(".ass_flagT").each(function(){
                                    ass_flagT.push(this.innerText)
                                })

                                $(".rem").each(function(){
                                    rem.push(this.innerText)
                                })
                                // ajaxData.append("rem", rem)

                                // $(".attch").each(function(){
                                //     attch.push(this.innerText)
                                // })
                                $(".po_doc_date1").each(function(){
                                    po_doc_date1.push(this.innerText)
                                })
                                // ajaxData.append("po_doc_date1", po_doc_date1)

                                $(".plant1").each(function(){
                                    plant1.push(this.innerText)
                                })
                                // ajaxData.append("plant1", plant1)

                                $(".status").each(function(){
                                    status.push(this.innerText)
                                })
                                // ajaxData.append("status", status)

                                $(".qty").each(function(){
                                    qty.push(this.innerText)
                                })
                                // ajaxData.append("qty", qty)

                                $(".unit").each(function(){
                                    unit.push(this.innerText)
                                })
                                // ajaxData.append("unit", unit)

                                $(".po_item1").each(function(){
                                    po_item1.push(this.innerText)
                                })
                                // ajaxData.append("po_item1", po_item1)

                                // console.log(emp_id + ' ' + ref_per + ' ' + supp1 + ' ' + req_grp1 + ' ' + req_type1 + ' ' + ass_grp1 + ' ' +
                                //  ass_sub_grp1 + ' ' + brand1 + ' ' + model1  + ' ' + unit_price + ' ' + ser_no1 + ' ' + ser_no2 + ' ' +
                                //  ser_no3 + ' ' + ser_no4 + ' ' + ass_code + ' ' + del_note + ' ' + del_date + ' ' + mtrl_short 
                                //  + ' ' + lic_start + ' ' + lic_month + ' ' + lic_exp + ' ' + war_start + ' ' + war_month + ' ' + war_exp + ' ' + 
                                //  rem + ' ' + attch + ' ' + po_doc_date + ' ' + plant + ' ' + status + ' ' + qty + ' ' + unit )
                                $.ajax({
                                    type: 'POST',
                                    url: "../../logic/insert_new_po.php",
                                    data: {name:name, po_no:po_no, data:data, emp_id:emp_id, ref_per:ref_per, supp1:supp1, req_grp1:req_grp1,
                                        req_type1:req_type1, ass_grp1:ass_grp1, ass_sub_grp1:ass_sub_grp1, brand1:brand1, model1:model1, series:series, 
                                        unit_price:unit_price, ser_no1:ser_no1, ser_no2:ser_no2, ser_no3:ser_no3, ser_no4:ser_no4, ass_code:ass_code, 
                                        del_note:del_note, del_date:del_date, mtrl_short:mtrl_short, lic_start:lic_start, lic_month:lic_month, lic_exp:lic_exp, 
                                        war_start:war_start, war_month:war_month, war_exp, ass_flagT:ass_flagT, rem:rem, po_doc_date1:po_doc_date1, plant1:plant1, status:status, 
                                        qty:qty, unit:unit, po_item1:po_item1},
                                    success: function(res){
                                        // console.log(res)
                                        if(res.success == 1){
                                            notify(res.icon, res.message)
                                            window.setInterval(function(){
                                                location.reload();	
                                            },2000)
                                        }
                                        else{
                                            // alert("Error ");
                                            notify(res.icon, res.message)
                                        }                    
                                    },
                                    failure: function(response){
                                        alert("ERROR");
                                    },
                                    error: function(req, textStatus, errorThrown){
                                        console.log("ERROR ",textStatus);
                                        console.log("ERROR ",errorThrown);
                                        console.log("ERROR", req)
                                    }
                                })
                            }
                        })
            //         }
            //         else{
            //             alert("Invalid IMAGE Type")
            //         }  
            //     };
            //     reader.readAsDataURL(file); 
            // }    
        })
        
        // $("#save_btn").click(function(){
        //     var file = $("#attch")[0].files[0];
        //     if (file){
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             var base64 = e.target.result; 
        //             var data = 1
        //             var department = $("#department").val()
        //             var empl_name = $("#empl_name").val()
        //             var emp_id = $("#emp_id").val()
        //             var emp_add = $("#emp_add").val()
        //             var work_loc = $("#work_loc").val()
        //             var off_phone = $("#off_phone").val()
        //             var mob_phone = $("#mob_phone").val()
        //             var hired_date = $("#hired_date").val()
        //             var per_email = $("#per_email").val()
        //             var bus_email = $("#bus_email").val()
        //             var ref_person = $("#ref_person").val()
        //             var po_no = $("#po_no").val()
        //             // var po_name = $("#po_name").val()
        //             var po_doc_date = $("#po_doc_date").val()
        //             var plant = $("#plant").val()
        //             var status = $("#status").val()
        //             var supplier = $("#supplier").val()
        //             var req_grp = $("#req_grp").val()
        //             var type = $("#type").val()
        //             var asset_group = $("#asset_group").val()
        //             var asset_sub_group = $("#asset_sub_group").val()
        //             var brand = $("#brand").val()
        //             var model = $("#model").val()
        //             var price = $("#price").val()
        //             var ser_no = $("#ser_no").val()
        //             var ass_code = $("#ass_code").val()
        //             var del_note = $("#del_note").val()
        //             var del_date = $("#del_date").val()
        //             var malt_shrt = $("#malt_shrt").val()
        //             var remarks = $("#remarks").val()
        //             var qty = $("#qty").val()
        //             var unit = $("#unit").val()
        //             var item = $("#item").val()
        //             // var attch = $("#attch").val()
        //             var control = document.getElementById("attch")
        //             var file = control.files[0];
        //             var filetype = file.type;
        //             let validfiles = ["image/jpeg", "image/jpg", "image/png"];
        //             if(validfiles.includes(filetype)){
        //                 // alert("Valid File Type")
        //                 Swal.fire({
        //                     title: 'Are you sure to Save?',
        //                     text: 'This will be saved to database',
        //                     icon: 'question',
        //                     showCancelButton: true,
        //                     reverseButtons: true,
        //                     cancelButtonText: 'No',
        //                     confirmButtonText: 'Yes',
        //                     confirmButtonColor: 'green',
        //                     cancelButtonColor: 'red'
        //                 }).then(confirm =>{
        //                     if(confirm.isConfirmed){
        //                         var ajaxData = new FormData();
        //                         ajaxData.append("name", name)
        //                         ajaxData.append("data", data)
        //                         ajaxData.append("department", department)
        //                         ajaxData.append("empl_name", empl_name)
        //                         ajaxData.append("emp_id", emp_id)
        //                         ajaxData.append("emp_add", emp_add)
        //                         ajaxData.append("work_loc", work_loc)
        //                         ajaxData.append("off_phone", off_phone)
        //                         ajaxData.append("mob_phone", mob_phone)
        //                         ajaxData.append("hired_date", hired_date)
        //                         ajaxData.append("per_email", per_email)
        //                         ajaxData.append("bus_email", bus_email)
        //                         ajaxData.append("ref_person", ref_person)
        //                         ajaxData.append("po_no", po_no)
        //                         // ajaxData.append("po_name", po_name)
        //                         ajaxData.append("po_doc_date", po_doc_date)
        //                         ajaxData.append("plant", plant)
        //                         ajaxData.append("status", status)
        //                         ajaxData.append("supplier", supplier)
        //                         ajaxData.append("req_grp", req_grp)
        //                         ajaxData.append("type", type)
        //                         ajaxData.append("asset_group", asset_group)
        //                         ajaxData.append("asset_sub_group", asset_sub_group)
        //                         ajaxData.append("brand", brand)
        //                         ajaxData.append("model", model)
        //                         ajaxData.append("price", price)
        //                         ajaxData.append("ser_no", ser_no)
        //                         ajaxData.append("ass_code", ass_code)
        //                         ajaxData.append("del_note", del_note)
        //                         ajaxData.append("del_date", del_date)
        //                         ajaxData.append("malt_shrt", malt_shrt)
        //                         ajaxData.append("remarks", remarks)
        //                         ajaxData.append("qty", qty)
        //                         ajaxData.append("unit", unit)
        //                         ajaxData.append("item", item)
        //                         ajaxData.append("image", base64)
        //                         $.ajax({
        //                             type: 'POST',
        //                             // dataType: 'json',
        //                             url: "../../logic/insert_po.php",
        //                             processData: false,
        //                             cache: false,
        //                             contentType: false,
        //                             data: ajaxData,
        //                             success: function(res){
        //                                 if(res.success == 1){
        //                                     // console.log(res.docno)
        //                                     notify(res.icon, res.message)
        //                                     window.setInterval(function(){
        //                                         location.reload();	
        //                                     },2000)
                                            
        //                                 }
        //                                 else{
        //                                     // alert("Error ");
        //                                     notify(res.icon, res.message)
        //                                 }
        //                                 // console.log (res)
        //                             },
        //                             failure: function(response){
        //                                 alert("ERROR");
        //                             },
        //                             error: function(req, textStatus, errorThrown){
        //                                 console.log("ERROR ",textStatus);
        //                                 console.log("ERROR ",errorThrown);
        //                                 console.log("ERROR", req)
        //                             }
        //                         });
        //                     }
        //                 })
        //             }
        //             else{
        //                 alert("Invalid IMAGE Type")
        //             }  
        //         };
        //         reader.readAsDataURL(file); 
        //     }
        // })
    });

        function notify(icon, message){
            Swal.fire({
                icon: icon,
                title: message,
                showConfirmButton: false,
                toast: true,
                position: 'top',
                timer: 2000,
                timerProgressBar: true
            })
        }

        


    // table plusimage
    // $('#plusImg').click(function(){
    //     var po_no = document.getElementById('po_num').value;
    //     // var po_date_hide = document.getElementById('po_date_hide').value;
    //     var supplier_code = document.getElementById('supplier').value;
    //     var supplier_name = $("#supplier").find(':selected').text()
    //     var type_code = document.getElementById('type').value;
    //     var type = $("#type").find(':selected').text()
    //     var brand_code = document.getElementById('brand').value;
    //     var brand = $("#brand").find(':selected').text()
    //     var price = document.getElementById('price').value;
    //     var ser_no = document.getElementById('ser_no').value;
    //     var ass_code = document.getElementById('ass_code').value;
    //     var del_note = document.getElementById('del_note').value;
    //     var del_date = document.getElementById('del_date').value;
    //     var malt_shrt = document.getElementById('malt_shrt').value;
    //     var remarks = document.getElementById('remarks').value;
    //     var attch = document.getElementById('attch').value;
    //     var table = document.getElementById('dataTable');
    //     var array = [];

    //     if (po_no == '' || supplier == '' || type == '' || brand == '' || price == '' || ser_no == '' || 
    //     ass_code ==''|| del_note == '' || del_date == '' || malt_shrt == '' || remarks == '' || attch == '' ) {
    //         swal({
    //         text: 'Please fill the fields first',
    //         icon: 'error',
    //         showCancelButton: false,
    //         });
    //     }
    //     else {
    //         $('#dataTable tbody').append(
    //             "<tr style='background-color: transparent; width: 200px'>"
    //                 +"<td style='text-align: center'><i name='icon[]' class='fa-solid fa-trash-can' onclick='SomeDeleteRowFunction(this)' style='cursor: pointer; color:red'></i></td>"
    //                 +"<td hidden><input name='po_no_1[]' class='po_num form-control' hidden style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+po_no+"'></td>"
    //                 // +"<td hidden><input name='po_date_hide_1[]' class='po_date_hide form-control' hidden style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+po_date_hide+"'></td>"
    //                 +"<td hidden><input name='supplier_code[]' class='supp_code form-control' hidden style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+supplier_code+"'></td>"
    //                 +"<td><input name='supplier_1[]' class='supp form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+supplier_name+"'></td>"
    //                 +"<td hidden><input name='type_code[]' class='type_code form-control' hidden style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+type_code+"'></td>"
    //                 +"<td><input name='type_1[]' class='type_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+type+"'></td>"
    //                 +"<td hidden><input name='brand_code[]' class='brand_code form-control' hidden style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+brand_code+"'></td>"
    //                 +"<td><input name='brand_1[]' class='brand_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+brand+"'></td>"
    //                 +"<td><input name='price_1[]' class='price_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+price+"'></td>"
    //                 +"<td><input name='ser_no_1[]' class='ser_no_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+ser_no+"'></td>"
    //                 +"<td><input name='ass_code_1[]' class='ass_code_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+ass_code+"'></td>"
    //                 +"<td><input name='del_note_1[]' class='del_note_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+del_note+"'></td>"
    //                 +"<td><input name='del_date_1[]' class='del_date_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+del_date+"'></td>"
    //                 +"<td><input name='malt_shrt_1[]' class='malt_shrt_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+malt_shrt+"'></td>"
    //                 +"<td><input name='remarks_1[]' class='rem_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+remarks+"'></td>"
    //                 +"<td><input name='attch_1[]' multiple class='attch_td form-control' type='file' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='"+attch+"'></td>"
    //             +"</tr>");
        
    //         document.getElementById('po_no').value = '';
    //         document.getElementById('supplier').value = '';
    //         document.getElementById('type').value = '';
    //         document.getElementById('brand').value = '';
    //         document.getElementById('price').value = '';
    //         document.getElementById('ser_no').value = '';
    //         document.getElementById('ass_code').value = '';
    //         document.getElementById('del_note').value = '';
    //         document.getElementById('del_date').value = '';
    //         document.getElementById('malt_shrt').value = '';
    //         document.getElementById('remarks').value = '';
    //         document.getElementById('attch').value = '';
    //     }
    // })
    // window.SomeDeleteRowFunction = function SomeDeleteRowFunction(o) {
    // var p=o.parentNode.parentNode;
    //     p.parentNode.removeChild(p);
    //     var array = [];
    // }
    
    // $("#save_btn").click(function(){
    //     var data = 1
    //     var department = $("#department").val()
    //     var emp_name = $("#emp_name").val()
    //     var emp_id = $("#emp_id").val()
    //     var emp_add = $("#emp_add").val()
    //     var work_loc = $("#work_loc").val()
    //     var off_phone = $("#off_phone").val()
    //     var mob_phone = $("#mob_phone").val()
    //     var hired_date = $("#hired_date").val()
    //     var per_email = $("#per_email").val()
    //     var bus_email = $("#bus_email").val()
    //     var ref_person = $("#ref_person").val()
    //     var po_no = $("#po_num").val()
    //     var po_date = $("#po_date").val()
    //     var plant = $("#plant").val()
    //     var po_stat = $("#po_stat").val()
    //     var supp_code = []
    //     var supp = []            
    //     var type_code = []
    //     var type_td = []
    //     var brand_code = []
    //     var brand_td = []
    //     var price_td = [] 
    //     var ser_no_td = []
    //     var ass_code_td = []
    //     var del_note_td = []
    //     var del_date_td = []
    //     var malt_shrt_td = []
    //     var rem_td = []
    //     var attch_td = []

    //     var ajaxData = new FormData();
    //         $.each($("tr").find("input[type=file]"), function(i, obj) {
    //             $.each(obj.files,function(j, file){
    //                 console.log (j + " " + JSON.stringify(file));
    //                 ajaxData.append('files['+j+']', file);
    //             })
    //         })

    //         ajaxData.append("name", name)
    //         ajaxData.append("data", data)
    //         ajaxData.append("department", department)
    //         ajaxData.append("emp_name", emp_name)
    //         ajaxData.append("emp_id", emp_id)
    //         ajaxData.append("emp_add", emp_add)
    //         ajaxData.append("work_loc", work_loc)
    //         ajaxData.append("off_phone", off_phone)
    //         ajaxData.append("mob_phone", mob_phone)
    //         ajaxData.append("hired_date", hired_date)
    //         ajaxData.append("per_email", per_email)
    //         ajaxData.append("bus_email", bus_email)
    //         ajaxData.append("ref_person", ref_person)
    //         ajaxData.append("po_no", po_no)
    //         ajaxData.append("po_date", po_date)
    //         ajaxData.append("plant", plant)
    //         // ajaxData.append("amt", amt)
    //         ajaxData.append("po_stat", po_stat)
            

    //     $(".supp_code").each(function(){
    //         supp_code.push(this.value)
    //     })
    //         ajaxData.append("supp_code", supp_code)

    //     $(".supp").each(function(){
    //         supp.push(this.value)
    //     })
    //         ajaxData.append("supp", supp)

    //     $(".type_code").each(function(){
    //         type_code.push(this.value)
    //     })
    //         ajaxData.append("type_code", type_code)

    //     $(".type_td").each(function(){
    //         type_td.push(this.value)
    //     })
    //         ajaxData.append("type_td", type_td)

    //     $(".brand_code").each(function(){
    //         brand_code.push(this.value)
    //     })
    //         ajaxData.append("brand_code", brand_code)

    //     $(".brand_td").each(function(){
    //         brand_td.push(this.value)
    //     })
    //     $(".price_td").each(function(){
    //         price_td.push(this.value)
    //     })
    //         ajaxData.append("price_td", price_td)

    //     $(".ser_no_td").each(function(){
    //         ser_no_td.push(this.value)
    //     })
    //         ajaxData.append("ser_no_td", ser_no_td)

    //     $(".ass_code_td").each(function(){
    //         ass_code_td.push(this.value)
    //     })
    //         ajaxData.append("ass_code_td", ass_code_td)

    //     $(".del_note_td").each(function(){
    //         del_note_td.push(this.value)
    //     })
    //         ajaxData.append("del_note_td", del_note_td)

    //     $(".del_date_td").each(function(){
    //         del_date_td.push(this.value)
    //     })
    //         ajaxData.append("del_date_td", del_date_td)

    //     $(".malt_shrt_td").each(function(){
    //         malt_shrt_td.push(this.value)
    //     })
    //         ajaxData.append("malt_shrt_td", malt_shrt_td)

    //     $(".rem_td").each(function(){
    //         rem_td.push(this.value)
    //     })
    //         ajaxData.append("rem_td", rem_td)

    //     $(".attch_td").each(function(){
    //         attch_td.push(this.value)
    //     })
    //     ajaxData.append("attch_td", attch_td)

    //     // console.log(supp + ' ' + supp_code + ' ' + type_code + ' ' + type_td + ' '  + brand_code + ' '  + brand_td + ' ' + 
    //     // price_td + ' ' + rem_td + ' ' +  ser_no_td + ' ' + ass_code_td + ' ' + del_note_td + ' ' + del_date_td + ' ' + attch_td) 

    // $.ajax({
    //     type: 'POST',
    //     dataType: 'json',
    //     url: "../../logic/insert_asset.php",
    //     processData: false,
    //     cache: false,
    //     contentType: false,
    //     data: ajaxData,
    //     success: function(res){
    //         // alert(res.success ? 'ok' : 'error');
    //         if(res.Code === 200){
    //             alert('Data added successfully !'); 
    //             location.reload();						
    //         }
    //         else if(res.Code === 201){
    //             alert("Error ");
    //         }
    //         // console.log (res)
    //      },
    //     failure: function(response){
    //         alert("Sasasa");
    //     },
    //     error: function(req, textStatus, errorThrown){
    //             console.log("error ",textStatus);
    //             console.log("error ",errorThrown);

    //     }
    // });

    // })

// });

</script>
</html>