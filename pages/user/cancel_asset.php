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

    <title>ITAMS - Cancel Asset</title>

    <!-- Custom fonts for this template -->
    <!-- <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    
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
    <link rel="stylesheet" href="../../assets/file_input/css/fileinput.css">
    <link rel="stylesheet" href="../../assets/selectize/dist/css/selectize.bootstrap5.css">
    <link rel="stylesheet" href="../../assets/dist/imageuploadify.min.css">

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

                <style>
                    @media only screen and (min-width: 768px) {
                    .form {
                        width: 50%;
                    }
                    }
                    .form-select, .form-control, .selectize {
                        border-radius: 0;
                        /* border: 2px solid #d9d9d9; */
                        /* background-color: #DCDCDC; */
                    }
                    .form-select:focus, .form-control:focus, .selectize:focus {
                        box-shadow: none;
                    }
                    .form-select, .form-label, .form-control{
                        color: #666666;
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
                <form method='POST' enctype='multipart/form-data' id='srch_Form'> 
                    <div class="container-fluid">
                        <div class="card-header" style="background-color: #4e73df;">
                            <h2 class="m-0 font-weight-bold" style="color: white; text-align: center">Cancel Asset</h2>
                        </div>
                        <br>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3" style="background: #87CEFA">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <div class="label" style="color: #000">PO Number</div>
                                        <select class="form-select po_no" name="po_no" id="po_no" style="margin-bottom: 8px;">
                                            <option value=""></option>
                                            <?php 
                                                $sql = "SELECT A.PO_NO FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B
                                                    WHERE B.CANCEL_ASSET_FLAG is null
                                                    AND A.DOC_NO = B.DOC_NO";
                                                $res = oci_parse(connection(), $sql);
                                                oci_execute($res);

                                                while($row = oci_fetch_row($res)){
                                                    echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="label" style="color: #000">Document Date:</div>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="from_date" placeholder="From">
                                                <span class="input-group-text">-</span>
                                                <input type="date" class="form-control" id="to_date" placeholder="To">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="label" style="color: #000000">Employee Name:</div>
                                        <select type="text" name="emp_name" id='emp_name' class='form-select' required style="margin-bottom: 8px;"> 
                                        <option value=""></option>
                                            <?php
                                                $sql = "SELECT DISTINCT A.DOC_NO, B.EMPL_ID FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B
                                                        WHERE A.DOC_NO = B.DOC_NO
                                                        AND B.CANCEL_ASSET_FLAG is null";

                                                $result = oci_parse(connection(), $sql);
                                                oci_execute($result);                                                    

                                                while($row = oci_fetch_assoc($result)){
                                                    $empId = $row["EMPL_ID"];

                                                    $dept_code = "SELECT DISTINCT NAMEENG FROM PERSON_TBL
                                                                where EMPLID = :empl";
                                                    $stmt = oci_parse(connection1(), $dept_code);
                                                    oci_bind_by_name($stmt, ':empl', $empId);
                                                    oci_execute($stmt);

                                                    $row1 = oci_fetch_row($stmt);

                                                    echo "<option value='".htmlspecialchars($row["EMPL_ID"],ENT_IGNORE)."'>".htmlspecialchars($row1[0],ENT_IGNORE)."</option>";
                                                }
                                            ?>
                                        </select> 
                                    </div>

                                    <div class="col-md-3">
                                        <div class="label" style="color: #000">Serial Number</div>
                                        <select class="form-select" name="ser_no" id="ser_no" style="margin-bottom: 8px;">
                                            <option value=""></option>
                                            <?php 
                                                $sql = "SELECT DISTINCT SERIAL_NO1 FROM IT_ASSET_DETAILS WHERE CANCEL_ASSET_FLAG is null";
                                                $res = oci_parse(connection(), $sql);
                                                oci_execute($res);

                                                while($row = oci_fetch_row($res)){
                                                    echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-md-12">
                                        <div class="" style='justify-content: end; display: flex; height:40px; margin-top: 10px'>
                                            <button class="btn btn-warning" id="clr" type="button" style="margin-right: 10px;"><i class="fa-solid fa-arrows-rotate"></i> Reset</button>
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
                                                <th style="width: 200px">Doc No</th>
                                                <th style="width: 200px">PO Item</th>
                                                <th style="width: 200px">Doc Date</th>
                                                <th style="width: 200px">PO No</th>
                                                <th style="width: 200px">PO Doc Date</th>
                                                <th style="width: 200px">Department</th>
                                                <th style='width: 200px'>Supplier</th>
                                                <th hidden>Req Group Code</th>
                                                <th hidden>Req Group Name</th>
                                                <th hidden>Req Type Code</th>
                                                <th hidden>Req Type Name</th>
                                                <th hidden>Asset Group Code</th>
                                                <th hidden>Asset Group Name</th>
                                                <th hidden>Asset Sub Group Code</th>
                                                <th hidden>Asset Sub Group Name</th>
                                                <th hidden>Brand Code</th>
                                                <th hidden>Brand Name</th>
                                                <th hidden>Model Code</th>
                                                <th hidden>Model Name</th>
                                                <th hidden>po_item</th>
                                                <th hidden>DOC NO</th>
                                                <!-- <th>Status</th> -->
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>PPP
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
                                                $sql = "SELECT DISTINCT A.DOC_NO, A.DOC_DATE, A.PO_NO, A.PO_DOC_DATE, B.EMPL_ID, B.MTRL_SHORT, 
                                                    C.VENDOR_NAME, A.PO_NO, B.REQ_GRP_ID, E.REQ_GRP_NAME, B.REQ_TYPE_ID, D.REQ_TYPE_NAME, 
                                                    B.ASSET_GRP_CODE, F.ASSET_GRP_NAME, B.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME, B.BRAND_CODE, H.BRAND_NAME, 
                                                    B.MODEL_CODE, I.MODEL_NAME, A.PO_NO, B.PO_ITEM
                                                    FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_VENDORS C, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
                                                    IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
                                                    WHERE A.DOC_DATE >= TRUNC(SYSDATE, 'MM')
                                                    AND A.DOC_DATE < ADD_MONTHS(TRUNC(SYSDATE, 'MM'), 1)
                                                    AND A.DOC_NO = B.DOC_NO
                                                    AND B.REQ_TYPE_ID = D.REQ_TYPE_ID
                                                    AND B.REQ_GRP_ID = E.REQ_GRP_ID
                                                    AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
                                                    AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
                                                    AND B.BRAND_CODE = H.BRAND_CODE
                                                    AND B.MODEL_CODE = I.MODEL_CODE
                                                    AND A.VENDOR_CODE = C.VENDOR_CODE
                                                    AND B.CANCEL_ASSET_FLAG is null
                                                    ORDER BY A.DOC_NO DESC";
                                        
                                                $result = oci_parse(connection(), $sql);
                                                oci_execute($result);                                                    
                                                
                                                while($row = oci_fetch_assoc($result)){
                                                    $empId = $row["EMPL_ID"];
                                                        
                                                    $dept_code = "SELECT B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
                                                    JOBCUR_EE C WHERE B.DEPTID = C.DEPTID
                                                    AND A.EMPLID = C.EMPLID
                                                    AND A.EMPLID = :empl";
                                                    $stmt = oci_parse(connection1(), $dept_code);
                                                    oci_bind_by_name($stmt, ':empl', $empId);
                                                    oci_execute($stmt);
                                                
                                                    $row1 = oci_fetch_assoc($stmt);
                                                
                                                    echo"<tr>
                                                        <td><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></td>
                                                        <td>".$row["DOC_NO"]."</td>
                                                        <td>".$row["PO_ITEM"]."</td>
                                                        <td>".$row["DOC_DATE"]."</td>
                                                        <td>".$row["PO_NO"]."</td>
                                                        <td>".$row["PO_DOC_DATE"]."</td>
                                                        <td>".$row1["DESCR"]."</td>
                                                        <td>".$row["VENDOR_NAME"]."</td>
                                                        <td hidden><input class='req_grp_code' value='".$row["REQ_GRP_ID"]."'></td>
                                                        <td hidden><input class='req_grp_name' value='".$row["REQ_GRP_NAME"]."'></td>
                                                        <td hidden><input class='req_type_code' value='".$row["REQ_TYPE_ID"]."'></td>
                                                        <td hidden><input class='req_type_name' value='".$row["REQ_TYPE_NAME"]."'></td>
                                                        <td hidden><input class='ass_grp_code' value='".$row["ASSET_GRP_CODE"]."'></td>
                                                        <td hidden><input class='ass_grp_name' value='".$row["ASSET_GRP_NAME"]."'></td>
                                                        <td hidden><input class='ass_sub_grp_code' value='".$row["ASSET_SUB_GRP_CODE"]."'></td>
                                                        <td hidden><input class='ass_sub_grp_name' value='".$row["ASSET_SUB_GRP_NAME"]."'></td>
                                                        <td hidden><input class='brand_code' value='".$row["BRAND_CODE"]."'></td>
                                                        <td hidden><input class='brand_name' value='".$row["BRAND_NAME"]."'></td>
                                                        <td hidden><input class='model_code' value='".$row["MODEL_CODE"]."'></td>
                                                        <td hidden><input class='model_name' value='".$row["MODEL_NAME"]."'></td>
                                                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                                                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                                                        </tr>";
                                                }
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
    <div class="modal fade" id="po_dtls" data-backdrop="static" data-keyboard="false" data-bs-focus="false" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="grpmodal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method='POST' enctype='multipart/form-data' id='user-form'>
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <br>

                    <div class="container-fluid">
                        <div class="body-message">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="card" style="border: 2px solid #e6e6e6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h3 class="panel-title font-weight-bold" style="color: #000">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Receiver Information
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="col-md-4">
                                                    <label class="form-label">Employee Name <small style="color: red">*</small></label>
                                                    <select type="text" class="form-select" id="empl_name" placeholder=" " readonly style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
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
                                                        <label class="form-label">Offcie Phone</label>
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

                                                    <!-- <div class="col-md-4">
                                                        <label class="form-label">Reference Person</label>
                                                        <input type="text" class="form-control" id="ref_person" placeholder=" " style="background-color: #e6e6e6;">
                                                    </div> -->
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="card" style="border: 2px solid #e6e6e6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading_Two">
                                            <h3 class="panel-title font-weight-bold" style="color: #000">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_Two" aria-expanded="false" aria-controls="collapse_Two">
                                                    Item Information
                                                </a>
                                            </h3>
                                        </div>
                                        
                                        <div id="collapse_Two" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_Two">
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
                                                        <select list="supp_list" id="supplier" name='supplier[]' type="text" class="form-select" placeholder=" " readonly style="background-color: #e6e6e6;">
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
                                                        <label class="form-label">Request Group <small style="color: red">*</small></label>
                                                        <select class="form-select" id="req_grp" name='req_grp[]' type="text" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                            <!-- <option selected=" ">Select Request Group...</option> -->
                                                            <?php 
                                                                $sql = "SELECT REQ_GRP_ID, REQ_GRP_NAME FROM IT_ASSET_REQ_GROUP ORDER BY REQ_GRP_ID";
                                                                $res = oci_parse(connection(), $sql);
                                                                oci_execute($res);

                                                                while($row = oci_fetch_row($res)){
                                                                    echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Request Type <small style="color: red">*</small></label>
                                                        <select id="type" name='type[]' type="text" class="form-select" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                <!-- <option selected=" ">Select Request Type...</option> -->
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Asset Group <small style="color: red">*</small></label>
                                                        <select id="asset_group" name='asset_group' type="text" autocomplete="off" class="form-select" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                            <!-- <option selected=" ">Select Asset...</option> -->
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Asset Sub Group <small style="color: red">*</small></label>
                                                        <select id="asset_sub_group" name='asset_sub_group' type="text" autocomplete="off" class="form-select" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                            <!-- <option selected=" ">Select Asset Sub Group...</option> -->
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Brand <small style="color: red">*</small></label>
                                                        <select id="brand" name='brand[]' type="text" autocomplete="off" class="form-select" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                <!-- <option selected=" ">Select Brand...</option> -->
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Model <small style="color: red">*</small></label>
                                                        <select id="model" name='model[]' type="text" autocomplete="off" class="form-select" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                            <!-- <option selected=" ">Select Model...</option> -->
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Series</label>
                                                        <input id="series" name='series[]' type="text" autocomplete="off" class="form-control" readonly placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Price</label>
                                                        <input id="price" name='price[]' type="text" autocomplete="off" class="form-control" readonly placeholder=" " readonly style="background-color: #e6e6e6;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Serial Number 1 <small style="color: red">*</small></label>
                                                        <input id="ser_no1" name='ser_no[]' type="text" autocomplete="off" class="form-control ser_no1" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Serial Number 2</label>
                                                        <input id="ser_no2" name='ser_no2[]' type="text" autocomplete="off" class="form-control" readonly placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Serial Number 3</label>
                                                        <input id="ser_no3" name='ser_no3[]' type="text" autocomplete="off" class="form-control" readonly placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Serial Number 4</label>
                                                        <input id="ser_no4" name='ser_no4[]' type="text" autocomplete="off" class="form-control" readonly placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Asset Code <small style="color: red">*</small></label>
                                                        <input id="ass_code" name='ass_code[]' type="text" autocomplete="off" class="form-control ass_code" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Delivery Note <small style="color: red">*</small></label>
                                                        <input id="del_note" name='del_note[]' type="text" autocomplete="off" class="form-control del_note" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Delivery Date</label>
                                                        <input id="del_date" name='del_date[]' type="date" autocomplete="off" class="form-control" readonly placeholder=" " readonly style="background-color: #e6e6e6;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Material Short</label>
                                                        <input id="malt_shrt" name='malt_shrt[]' type="text" autocomplete="off" class="form-control" readonly placeholder=" " readonly style="background-color: #e6e6e6;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">License Month Start</label>
                                                        <input id="license_start" name='license_start[]' type="date" autocomplete="off" class="form-control" placeholder=" " readonly style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">License Month</label>
                                                        <input id="license_month" name='license_month[]' type="text" autocomplete="off" class="form-control" placeholder=" " readonly style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">License Expiry Date</label>
                                                        <input id="license_exp" name='license_exp[]' type="date" autocomplete="off" class="form-control" placeholder=" " readonly style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Warranty Month Start <small style="color: red">*</small></label>
                                                        <input id="war_start" name='war_start[]' type="date" autocomplete="off" class="form-control war_start" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Warranty Month <small style="color: red">*</small></label>
                                                        <input id="war_month" name='war_month[]' type="text" autocomplete="off" class="form-control war_month" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Warranty Expiry Date</label>
                                                        <input id="war_exp" name='war_exp[]' type="date" autocomplete="off" class="form-control war_exp" readonly placeholder=" " style="background-color: #e6e6e6;">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Asset Flag <small style="color: red">*</small></label>
                                                        <select id="ass_flag" name='ass_flag[]' type="text" autocomplete="off" class="form-select" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                                <!-- <option selected=" ">Select ass_flag...</option> -->
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label">Remarks <small style="color: red">*</small></label>
                                                        <textarea id="remarks" name='remarks[]' type="text" autocomplete="off" class="form-control remarks" readonly placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                        </textarea>
                                                    </div>

                                                    <!-- <div class="col-md-4">
                                                        <label class="form-label">Attachment *</label>
                                                        <input id="attch" name='attch[]' type="file" type="text" autocomplete="off" class="form-control attch" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                    </div> -->
                                                    <div class="col-md-4" hidden>
                                                        <label class="form-label">PO NUMBER</label>
                                                        <input id="po_number" name='po_number' type="text" type="text" autocomplete="off" class="form-control attch" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                    </div>
                                                    <div class="col-md-4" hidden>
                                                        <label class="form-label">Po Item</label>
                                                        <input id="po_item" name='po_item' type="text" type="text" autocomplete="off" class="form-control attch" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card" style="border: 2px solid #e6e6e6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h3 class="panel-title font-weight-bold" style="color: #000">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    Attachment
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">   
                                                <div class="container">
                                                    <form>
                                                        <input id="attch1" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                    </form>  
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <button id="cancel_btn" class="btn btn-danger" type="button">
                                        <i class="fa-solid fa-ban"></i> Cancel</button>
                                    <button id="close_btn1" class="btn btn-warning" type="button">
                                        <i class="fa-solid fa-xmark"></i> Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
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
    <script src="../../assets/file_input/js/fileinput.js"></script>

    <script src="../../assets/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../assets/selectize/dist/js/selectize.js"></script>
    <script src="../../assets/dist/imageuploadify.min.js"></script>
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

    $('input[type="file"]').imageuploadify();

    $("#po_dtls").on('shown.bs.modal', function(){
        $(document).off('focusin.modal');
    })

    $('#dataTable1').DataTable({
    searching: false, 
    paging: true,
    scrollX: false, 
    info: false,
    ordering: false,
    fixedColumns: {leftColumns: 1}
    });

     // selectize
    $("#po_no").selectize({})
    $("#ser_no").selectize({})
    $("#emp_name").selectize({})
    // $("#empl_name").change(function(){
    //     var empl_name1 = $(this).val()
    //     $.ajax({
    //         url:"../../logic/empl_details.php",
    //         method:"POST",
    //         data:{empl_name1: empl_name1},
    //         success:function(res){
    //             $("#dept").val(res.DEPT)
    //             $("#emp_id").val(res.EMPLID)
    //             $("#emp_add").val(res.ADDRESS)
    //             $("#work_loc").val(res.LOCATION)
    //             $("#off_phone").val(res.OFFICEPHONE)
    //             $("#mob_phone").val(res.MOBILEPHONE)
    //             $("#hired_date").val(res.HIREDDATE)
    //             $("#per_email").val(res.PERSONAL_EMAIL)
    //             $("#bus_email").val(res.BUSINESS_EMAIL)
    //         }
    //     })
    // })

    $("#dataTable1").on("click", '.view_dtl', function(){
        var doc_no1 = $(this).closest('tr').find('.doc_no1').val()
        var po_item = $(this).closest('tr').find('.po_item').val()
        var req_grp_code = $(this).closest('tr').find('.req_grp_code').val()
        var req_grp_name = $(this).closest('tr').find('.req_grp_name').val()
        var req_type_code = $(this).closest('tr').find('.req_type_code').val()
        var req_type_name = $(this).closest('tr').find('.req_type_name').val()
        var ass_grp_code = $(this).closest('tr').find('.ass_grp_code').val()
        var ass_grp_name = $(this).closest('tr').find('.ass_grp_name').val()
        var ass_sub_grp_code = $(this).closest('tr').find('.ass_sub_grp_code').val()
        var ass_sub_grp_name = $(this).closest('tr').find('.ass_sub_grp_name').val()
        var brand_code = $(this).closest('tr').find('.brand_code').val()
        var brand_name = $(this).closest('tr').find('.brand_name').val()
        var model_code = $(this).closest('tr').find('.model_code').val()
        var model_name = $(this).closest('tr').find('.model_name').val()
        $.ajax({
            type: "POST",
            url: "../../logic/mod_json.php",
            data: {doc_no1: doc_no1, po_item:po_item, req_grp_code:req_grp_code, req_grp_name:req_grp_name, req_type_code:req_type_code, 
                req_type_name:req_type_name, ass_grp_code:ass_grp_code, ass_grp_name:ass_grp_name, ass_sub_grp_code:ass_sub_grp_code,
                ass_sub_grp_name:ass_sub_grp_name, brand_name:brand_name, 
                brand_code:brand_code, model_code:model_code, model_name:model_name},
            success: function(res1){
                $('#po_dtls').modal('show');
                $('#po_dtls').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $("#empl_name").val(res1.EMP_ID)
                $("#dept").val(res1.DEPT)
                $("#emp_id").val(res1.EMP_ID)
                $("#emp_add").val(res1.EMP_ADD)
                $("#work_loc").val(res1.WORK_LOC)
                $("#off_phone").val(res1.OFF_PHONE)
                $("#mob_phone").val(res1.MOB_PHONE)
                $("#hired_date").val(res1.HIRED_DATE)
                $("#per_email").val(res1.PER_EMAIL)
                $("#bus_email").val(res1.BUS_EMAIL)
                $("#ref_person").val(res1.REF_PERSON)
                $("#supplier").val(res1.SUPPLIER)
                $("#req_grp").append(res1.REQ_GRP)
                $("#type").append(res1.REQ_TYPE)
                $("#asset_group").append(res1.ASS_GRP)
                $("#asset_sub_group").append(res1.ASS_SUB_GRP)
                $("#brand").append(res1.BRAND)
                $("#model").append(res1.MODEL_CODE)
                $("#series").val(res1.SERIES)
                $("#price").val(res1.PRICE)
                $("#ser_no1").val(res1.SER_NO1)
                $("#ser_no2").val(res1.SER_NO2)
                $("#ser_no3").val(res1.SER_NO3)
                $("#ser_no4").val(res1.SER_NO4)
                $("#ass_code").val(res1.ASS_CODE)
                $("#del_note").val(res1.DEL_NOTE)
                $("#del_date").val(res1.DEL_DATE)
                $("#malt_shrt").val(res1.MTRL_SHORT)
                $("#license_start").val(res1.LICENSE_START)
                $("#license_month").val(res1.LICENSE_MONTH)
                $("#license_exp").val(res1.LICENSE_EXP)
                $("#war_start").val(res1.WAR_START)
                $("#war_month").val(res1.WAR_MONTH)
                $("#war_exp").val(res1.WAR_EXP)
                $("#ass_flag").append("<option>"+ res1.ASS_FLAG +"</option>")
                $("#remarks").val(res1.REMARKS)
                $("#po_number").val(res1.PO_NUMBER)
                $("#po_item").val(res1.PO_ITEM)
                // $("#attch").val(res1.ATTCH)
            }
        })
    })

    $("#clr").click(function(){
        location.reload()
        // var po_no = $('#po_no')[0].selectize;
        // var emp_name = $('#emp_name')[0].selectize;
        // var ser_no = $('#ser_no')[0].selectize;
        // po_no.clear();
        // emp_name.clear();
        // ser_no.clear();
    })

    $("#srch").click(function(){
        var data = 1
        var po_no = $("#po_no").find(':selected').val()
        var ser_no = $("#ser_no").find(':selected').val()
        var from_date = $("#from_date").val()
        var to_date = $("#to_date").val()
        var emp_name = $("#emp_name").find(':selected').val()

        if(po_no !== "" && ser_no == "" && from_date == "" && to_date == "" && emp_name == ""){
            Swal.fire({
                title: 'Loading',
                text: 'Please wait while the data is being loaded...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            })
            $.ajax({
                type:"POST",
                url: "../../logic/cancel_php.php",
                data:{data:data, po_no:po_no, },
                success: function(res){   
                    Swal.hideLoading()
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data loaded successfully!',
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-right',
                        timer: 2000,
                        timerProgressBar: true
                    })           
                    $('#doc_tbody').html(res) 
                },
                error: function(){
                    // Hide the loading spinner
                    Swal.hideLoading()
                    // Show an error message
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        }

        else if(ser_no !== "" && po_no == "" && from_date == "" && to_date == "" && emp_name == ""){
            Swal.fire({
                title: 'Loading',
                text: 'Please wait while the data is being loaded...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            })
            $.ajax({
                type:"POST",
                url: "../../logic/cancel_php.php",
                data:{data:data, ser_no:ser_no},
                success: function(res){   
                    Swal.hideLoading()
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data loaded successfully!',
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-right',
                        timer: 2000,
                        timerProgressBar: true
                    })            
                    $('#doc_tbody').html(res) 
                },
                error: function(){
                    // Hide the loading spinner
                    Swal.hideLoading()
                    // Show an error message
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        }

        // po_doc_date
        else if(from_date && to_date !== "" && po_no == "" && ser_no == "" && emp_name == ""){
            Swal.fire({
                title: 'Loading',
                text: 'Please wait while the data is being loaded...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            })
            $.ajax({
                type:"POST",
                url: "../../logic/cancel_php.php",
                data:{data:data, from_date:from_date, to_date:to_date},
                success: function(res){   
                    Swal.hideLoading()
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data loaded successfully!',
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-right',
                        timer: 2000,
                        timerProgressBar: true
                    })             
                    $('#doc_tbody').html(res) 
                },
                error: function(){
                    // Hide the loading spinner
                    Swal.hideLoading()
                    // Show an error message
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        }

        // emp_name
        else if(emp_name !== "" && po_no == "" && ser_no == "" && from_date == "" && to_date == ""){
            Swal.fire({
                title: 'Loading',
                text: 'Please wait while the data is being loaded...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            })
            $.ajax({
                type:"POST",
                url: "../../logic/cancel_php.php",
                data:{data:data, emp_name:emp_name},
                success: function(res){   
                    Swal.hideLoading()
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data loaded successfully!',
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-right',
                        timer: 2000,
                        timerProgressBar: true
                    })            
                    $('#doc_tbody').html(res) 
                },
                error: function(){
                    // Hide the loading spinner
                    Swal.hideLoading()
                    // Show an error message
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        }

        else {
            Swal.fire({
                title: "Error",
                text: "Please Select in the input field",
                icon: "error",
            });
        }
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
        }).then(confirm => {
            if (confirm.isConfirmed) {
                $("#po_dtls").modal('hide')
            }
        })
    })

    $("#cancel_btn").click(function() {
        var po_no = $("#po_number").val();
        var po_item = $("#po_item").val()
        Swal.fire({
            title: 'Please enter a reason',
            input: 'textarea',
            icon: 'warning',
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonText: 'Submit',
            confirmButtonColor: 'green',
            cancelButtonText: 'Cancel',
            cancelButtonColor: 'red',
            preConfirm: () => {
                var id = document.getElementsByClassName("swal2-textarea");
                var value = id[0].value;
                if(value.length != 0){

                }
                else{
                    Swal.showValidationMessage('Please Input REASON')
                }
            },
        }).then((result) => {
            if (result.isConfirmed) {
                var reason = result.value;
                Swal.fire({
                    title: 'Are you sure you?',
                    text: 'This asset will be CANCELLED',
                    icon: 'question',
                    showCancelButton: true,
                    reverseButtons: true,
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes',
                    confirmButtonColor: 'green',
                    cancelButtonColor: 'red'
                }).then(confirm =>{
                    $.ajax({
                        type: 'POST',
                        url: '../../logic/cancel_flag.php',
                        data: {po_no: po_no, po_item:po_item, name: name, reason: reason},
                        success: function(res) {
                            if (res.success == 1) {
                                notify(res.icon, res.message)

                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
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
                    });
                })
            }
        });
    });
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