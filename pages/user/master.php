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

    <title>ITAMS - Cancel Assets</title>

    <!-- Custom fonts for this template -->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="../../assets/fontawesome_1/css/all.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <!-- <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../datatable/datatables.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/dist/sweetalert2.css">
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
                    <span>Add Assets</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../user/cancel_asset.php">
                    <i class="fas fa-ban"></i>
                    <span>Cancel Assets</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../user/modify_asset.php">
                <i class="fa-solid fa-pen-to-square"></i>
                    <span>Modify Assets</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../user/transfer_asset.php">
                    <i class="fa-solid fa-right-left"></i>
                    <span>Transfer Assets</span></a>
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
                Reports
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

                <!-- Begin Page Content -->
                <form method='POST' enctype='multipart/form-data' id='srch_Form'>
                    <div class="container-fluid">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h2 class="m-0 font-weight-bold text-primary">Cancel Assets</h2>
                            </div>

                            <div class="card-header py-3" style="background: #1E90FF">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="label" style="color: #fff">Document No.</div>
                                        <select class="form-select" name="doc_no" id="doc_no" style="margin-bottom: 8px;">
                                            <option value=""></option>
                                            <?php 
                                                $sql = "SELECT DOCUMENT_NO FROM IT_ASSET_HEADER";
                                                $res = oci_parse(connection(), $sql);
                                                oci_execute($res);

                                                while($row = oci_fetch_row($res)){
                                                    echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="label" style="color: #fff">From</div>
                                        <input type="date" name="from_doc_date" id='from_doc_date' class='form-control' style="margin-bottom: 8px;">
                                        <script type='text/javascript'>
                                        document.getElementById('from_doc_date').value = "<?php echo ($_POST['from_doc_date']); ?>";
                                        </script>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="label" style="color: #fff">To</div>
                                        <input type="date" name="to_doc_date" id='to_doc_date' class='form-control' style="margin-bottom: 8px;">
                                        <script type='text/javascript'>
                                        document.getElementById('to_doc_date').value = "<?php echo ($_POST['to_doc_date']); ?>"
                                        </script>
                                    </div>

                                    <div class="col-md-3" style="margin-top: 25px">
                                        <button class="btn btn-success" id="srch" type="button"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                                    </div>
                                </div>

                                
                            </div>
                        </div>

                        <!-- Page Heading -->
                        <!-- <h1 class="h3 mb-2 text-gray-800">Reports</h1> -->

                        <!-- DataTales -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h2 class="m-0 font-weight-bold text-primary">Assets Information</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display nowrap" id="dataTable1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th style="width: 200px">Document Number</th>
                                                <th style="width: 200px">Document Date</th>
                                                <th style="width: 200px">PO Number</th>
                                                <th style="width: 200px">PO Document Date</th>
                                                <th style="width: 200px">Department</th>
                                                <th style='width: 200px'>Supplier</th>
                                                <th hidden>po number</th>
                                                <!-- <th>Status</th> -->
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody id="doc_tbody">
                                            <?php
                                                // $sql = "SELECT DISTINCT A.DOCUMENT_NO, A.PO_NUMBER, A.DEPARTMENT_CODE, B.MTRL_SHORT, 
                                                //         C.VENDOR_NAME, A.PO_NUMBER
                                                //         FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_VENDORS C 
                                                //         WHERE A.DOCUMENT_NO = B.DOCUMENT_NO
                                                //         AND A.VENDOR_CODE = C.VENDOR_CODE
                                                //         ORDER BY A.DOCUMENT_NO ASC";

                                                // $query = oci_parse(connection(), $sql);
                                                // oci_execute($query);
                                                //     while ($row = oci_fetch_assoc($query)) {
                                                //         echo"<tr>
                                                //             <td><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></td>
                                                //             <td style='width: 200px'>".$row["DOCUMENT_NO"]."</td>
                                                //             <td style='width: 200px'>".$row["PO_NUMBER"]."</td>
                                                //             <td style='width: 200px'>".$row["DEPARTMENT_CODE"]."</td>
                                                //             <td style='width: 200px'>".$row["MTRL_SHORT"]."</td>
                                                //             <td style='width: 200px'>".$row["VENDOR_NAME"]."</td>
                                                //             <td hidden><input hidden class='po_no' value=".$row["PO_NUMBER"]." hidden></td>
                                                //         </tr>";
                                                //     }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
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

    <!-- View Details modal -->
    <div class="modal fade" id="po_dtls" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="grpmodal">
        <div class="modal-dialog modal-xl" role="document" style="width: calc(98% - 250px); margin-left: 250px;">
            <div class="modal-content">
                <form id="user-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="grpmodal"><b>Details</b></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">                 
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="display nowrap" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Document Number</th>
                                        <th>Document Date</th>
                                        <th>PO Number</th>
                                        <th>Employee Name</th>
                                        <th>Delivery Date</th>
                                        <th>Item</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Serial Number</th>
                                        <th>Asset_Code</th>
                                        <th>Unit</th>
                                        <th>Quantity</th>
                                        <th>Unit_Price</th>
                                        <th>Delivery_Note</th>
                                        <th>PO Item Text</th>
                                        <th>Remarks</th>
                                        <th>Attachment</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> -->
                                <tbody id="td_body">
                                <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="doc_no" class="doc_no" name='doc_no' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('doc_no').value = "<?php echo ($_POST['doc_no']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="doc_date" class="doc_date" name='doc_date' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('doc_date').value = "<?php echo ($_POST['doc_date']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="po_number" class="po_num" name='po_number' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('po_number').value = "<?php echo ($_POST['po_number']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="empl_name" class="po_num" name='empl_name' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('empl_name').value = "<?php echo ($_POST['empl_name']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="del_date" name='del_date' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('del_date').value = "<?php echo ($_POST['del_date']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="item" name='item' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('item').value = "<?php echo ($_POST['item']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="brand" name='brand' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('brand').value = "<?php echo ($_POST['brand']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="model" name='model' type="text" autocomplete="off" style=" background-color: transparent; ">                                           
                                        
                                        <script>
                                            document.getElementById('model').value = "<?php echo ($_POST['model']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="ser_no" name='ser_no' type="text" autocomplete="off" style=" background-color: transparent; ">                                           
                                        
                                        <script>
                                            document.getElementById('ser_no').value = "<?php echo ($_POST['ser_no']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="ass_code" name='ass_code' type="text" autocomplete="off" style=" background-color: transparent; ">                                           
                                        
                                        <script>
                                            document.getElementById('ass_code').value = "<?php echo ($_POST['ass_code']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="unit" name='unit' type="text" autocomplete="off" style=" background-color: transparent; ">                                           
                                        
                                        <script>
                                            document.getElementById('unit').value = "<?php echo ($_POST['unit']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="qty" name='qty' type="text" autocomplete="off" style=" background-color: transparent; ">                                           
                                        
                                        <script>
                                            document.getElementById('qty').value = "<?php echo ($_POST['qty']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="unit_price" name='unit_price' type="text" autocomplete="off" style=" background-color: transparent; ">                                           
                                        
                                        <script>
                                            document.getElementById('unit_price').value = "<?php echo ($_POST['unit_price']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="del_note" name='del_note' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('del_note').value = "<?php echo ($_POST['del_note']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF	'>
                                        <input id="po_item" name='po_item' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('po_item').value = "<?php echo ($_POST['po_item']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF; '>
                                        <input id="remarks" name='remarks' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('remarks').value = "<?php echo ($_POST['remarks']);?>";
                                        </script>
                                    </td>
                                    <td style='text-align: start; background-color: #FFFFFF; '>
                                        <input id="attch" name='attch' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('attch').value = "<?php echo ($_POST['attch']);?>";
                                        </script>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>     
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button class="btn btn-warning" id="mod_btn" type="button">Modify Asset</button>
                        </div>

                        <!-- <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-success" data-dismiss="modal" value="Close"> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    <script src="../../datatable/datatables.js"></script>

    <script src="../../assets/sweetalert2/dist/sweetalert2.all.js"></script>
    <!-- <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

</body>
<script>
$(document).ready(function(){
    const name = '<?php echo $username ?>';

    const myModalEl = document.getElementById("po_dtls")
    myModalEl.addEventListener('shown.bs.modal', e=>{
        table.columns.adjust().draw()
    })

    $('#dataTable1').DataTable({
    searching: false, 
    paging: true,
    scrollX: false, 
    info: false,
    ordering: false,
    fixedColumns: {leftColumns: 1}
    });

    $("#brand").change(function(){
        var model = $(this).val()
        $.ajax({
        url:"../../logic/type.php",
        method:"POST",
        data:{model:model},
        success:function(model){
            $("#model").empty()
            $("#model").append(model)
        }
        })
    })

    // $(".view_dtl").on("click", function(){
    //     var po_num = $(this).closest('tr').find('.po_number').val()
    //     $.ajax({
    //         type: "POST",
    //         url: "../../logic/po_report.php",
    //         data: {po_num: po_num},
    //         success: function(res){ 
    //         var table = $('#dataTable').DataTable({
    //                 searching: false, 
    //                 paging: false,
    //                 scrollX: false, 
    //                 info: false,
    //                 ordering: false,
    //             });
    //             $('#po_dtls').modal('show');
    //             $('#td_body').html(res); 
    //         }
    //     });
    // });

    $("#srch").click(function(){
        var doc_no = $("#doc_no").find(":selected").val()
        var from_doc_date = $("#from_doc_date").val()
        var to_doc_date = $("#to_doc_date").val()
        $.ajax({
            type:"POST",
            url: "../../logic/modify.php",
            data:{doc_no:doc_no, from_doc_date:from_doc_date, to_doc_date:to_doc_date},
            success: function(res){               
                $('#doc_tbody').html(res) 
            }
        })
    })

    $("#dataTable1").on("click", '.mod_po', function(){
        var po_number = $(this).closest('tr').find('.po_number').val()
        $.ajax({
            type: "POST",
            url: "../../logic/po_report.php",
            data: {po_number: po_number},
            success: function(res1){ 
            var table = $('#dataTable').DataTable({
                sorting: false,
                scrollX: false,
                destroy: true,
                "bDestroy": true,
                searching: false,
                "bPaginate": false,
                        "dom": 'rtip',
                        "bInfo": false,
                });
                $('#po_dtls').modal('show');
                $('#po_dtls').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#td_body').html(res1); 
            }
        })
    })

    $("#mod_btn").click(function(){
        var doc_no =  $("#doc_no").val()
        var ser_no = $(".ser_no").val()
        var ass_code = $(".ass_code").val()
        var del_note = $(".del_note").val()
        var remarks = $(".remarks").val()
        Swal.fire({
            title: 'Are you sure you want to MODIFY?',
            text: 'This asset will be MODIFIED',
            icon: 'question',
            showCancelButton: true,
            reverseButtons: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
            confirmButtonColor: 'green',
            cancelButtonColor: 'red'
        }).then(confirm =>{
            if(confirm.isConfirmed){
                $.ajax({
                    type: "POST",
                    url: "../../logic/modified_po.php",
                    data:{doc_no:doc_no, name:name, ser_no:ser_no, ass_code:ass_code, del_note:del_note, remarks:remarks},
                    success: function(res){
                        if(res.success == 1){
                            notify(res.icon, res.message)
                            window.setInterval(function(){
                                location.reload();
                            },2000)
                        }
                        else{
                            notify(res.icon, res.message)
                        }
                        // console.log(res)
                    }

                })
            }
        })
    })

})

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
    
</script>
</html>