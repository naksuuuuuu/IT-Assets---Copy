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
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ITAMS - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="../../assets/fontawesome_1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <!-- <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../datatable/datatables.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/dist/sweetalert2.css">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Set-Up</span>
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
                <a class="nav-link" href="../user/report.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Report</span></a>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="card-header">
                        <h2 class="m-0 font-weight-bold text-primary">Transfer Asset</h2>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS)
                        <li class="nav-item dropdown no-arrow d-sm-none">
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
                        </li>-->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                </style>

                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive" style="background-color: white">
                                <table id='myTable' class='display nowrap' width='100%' cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Doc No.</th>
                                            <th>Po Item</th>
                                            <th>Asset Id</th>
                                            <th>Employee Name</th>
                                            <th>Sub Asset Group Name</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th hidden>Sub Asset Group Code</th>
                                            <th hidden>Employee Id</th>
                                            <th hidden>PO Item</th>
                                            <th hidden>po number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT a.DOCUMENT_NO, b.ASSET_ID, b.EMPL_ID, b.sub_ASSET_GROUP, c.MODEL, d.BRAND_NAME, b.PO_item, 
                                                b.PO_NUMBER, e.ASSET_SUB_GROUP_NAME  
                                                FROM IT_ASSET_HEADER1 a, IT_ASSET_DETAILS1 b, IT_ASSET_MODEL c, IT_ASSET_BRAND d, IT_ASSET_SUB_GROUP e
                                                where a.DOCUMENT_NO	= b.DOCUMENT_NO
                                                and b.MODEL = c.MODEL_code
                                                and b.BRAND = d.BRAND_CODE
                                                and b.CANCEL_ASSET_FLAG is null
                                                and b.SUB_ASSET_GROUP = e.ASSET_SUB_GROUP_CODE
                                                order by a.document_no DESC";
                                            $stmt = oci_parse(connection(), $query);
                                            oci_execute($stmt);
                                            while ($row = oci_fetch_assoc($stmt)) {
                                                $emplId = $row['EMPL_ID'];

                                                $query1 = "SELECT NAMEENG FROM PERSON_TBL
                                                            where EMPLID = :emplid";
                                                $stmt1 = oci_parse(connection1(), $query1);
                                                oci_bind_by_name($stmt1, ':emplid', $emplId);
                                                oci_execute($stmt1);
                                                $row1 = oci_fetch_assoc($stmt1);
                                                echo "<tr>
                                                        <td><img id='plusImg' src='../../assets/add-free-icon-font.png' class='plusBtn'></td>
                                                        <td>" . $row['DOCUMENT_NO'] . "</td>
                                                        <td>" . $row['PO_ITEM'] . "</td>
                                                        <td>" . $row['ASSET_ID'] . "</td>
                                                        <td>" . $row1['NAMEENG'] . "</td>
                                                        <td>" . $row['ASSET_SUB_GROUP_NAME'] . "</td>
                                                        <td>" . $row['BRAND_NAME'] . "</td>
                                                        <td>" . $row['MODEL'] . "</td>
                                                        <td hidden>" . $row['SUB_ASSET_GROUP'] . "</td>
                                                        <td hidden>" . $row['EMPL_ID'] . "</td>
                                                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                                                        <td hidden><input class='po_no' value=".$row["PO_NUMBER"]." hidden></td>
                                                    </tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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
    <div class="modal fade" id="empl_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="grpmodal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="needs-validation" novalidate method='POST' enctype='multipart/form-data' id='user-form'>
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <br>
                    <div class="container-fluid">
                        <div class="card" style="border: 2px solid #e6e6e6">
                            <div class="card-header py-2" style="background-color: #e6e6e6">
                                <h2 class="m-0 font-weight-bold" style="color: #000">Item Information</h2>
                            </div>
                            <br>

                            <div class="row g-3" style="margin: auto">
                                <div class="col-md-4">
                                    <label class="form-label">Asset Sub Group *</label>
                                    <select id="asset_sub_group" name='asset_sub_group' type="text" readonly autocomplete="off" class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                        <!-- <option selected=" ">Select Asset Sub Group...</option> -->
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Brand *</label>
                                    <select id="brand" name='brand[]' type="text" autocomplete="off" readonly class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                            <!-- <option selected=" ">Select Brand...</option> -->
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Model *</label>
                                    <select id="model" name='model[]' type="text" autocomplete="off" readonly class="form-select" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                        <!-- <option selected=" ">Select Model...</option> -->
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Series *</label>
                                    <input id="series" name='series[]' type="text" autocomplete="off" readonly class="form-control" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Price</label>
                                    <input id="price" name='price[]' type="text" autocomplete="off" readonly class="form-control" required placeholder=" " readonly style="background-color: #e6e6e6;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Serial Number 1 *</label>
                                    <input id="ser_no1" name='ser_no[]' type="text" autocomplete="off" readonly class="form-control ser_no1" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Serial Number 2</label>
                                    <input id="ser_no2" name='ser_no2[]' type="text" autocomplete="off" readonly class="form-control" required placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Serial Number 3</label>
                                    <input id="ser_no3" name='ser_no3[]' type="text" autocomplete="off" readonly class="form-control" required placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Serial Number 4</label>
                                    <input id="ser_no4" name='ser_no4[]' type="text" autocomplete="off" readonly class="form-control" required placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Remarks *</label>
                                    <textarea id="remarks" name='remarks[]' type="text" autocomplete="off" readonly class="form-control remarks" required placeholder=" " 
                                        style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                    </textarea>
                                </div>

                                <!-- <div class="col-md-4">
                                    <label class="form-label">Attachment *</label>
                                    <input id="attch" name='attch[]' type="file" type="text" autocomplete="off" class="form-control attch" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                </div> -->
                                <div class="col-md-4" hidden>
                                    <label class="form-label">PO NUMBER</label>
                                    <input id="po_number" name='po_number[]' type="text" type="text" autocomplete="off" class="form-control attch" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                </div>
                                <div class="col-md-4" hidden>
                                    <label class="form-label">PO Item</label>
                                    <input id="po_item" name='po_item[]' type="text" type="text" autocomplete="off" class="form-control attch" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Doc No</label>
                                    <input id="ref_doc_no" name='ref_doc_no[]' type="text" type="text" readonly autocomplete="off" class="form-control attch" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Ass ID</label>
                                    <input id="ass_id" name='ass_id[]' type="text" type="text" readonly autocomplete="off" class="form-control attch" required placeholder=" " style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
                                </div>

                            </div>
                            <br>
                        </div>
                        <br>
                    
                        <div class="card" style="border: 2px solid #e6e6e6">
                            <div class="card-header py-2" style="background-color: #e6e6e6">
                                <h2 class="m-0 font-weight-bold" style="color: #000">Current Asset User</h2>
                            </div>
                            <br>
                            <div class="col-md-4">
                                <label class="form-label">Employee Name *</label>
                                <select type="text" class="form-select" id="empl_name" placeholder=" " disabled required readonly style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
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
                                    <label class="form-label">Working Location</label>
                                    <input type="text" class="form-control" id="work_loc" placeholder=" " readonly style="background-color: #e6e6e6;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Business Email</label>
                                    <input type="text" class="form-control" id="bus_email" placeholder=" " readonly style="background-color: #e6e6e6;">
                                </div>
                            </div>
                            <br>
                        </div>
                    <br>

                    <div class="card" style="border: 2px solid #e6e6e6">
                            <div class="card-header py-2" style="background-color: #e6e6e6">
                                <h2 class="m-0 font-weight-bold" style="color: #000">Transfer Asset To</h2>
                            </div>
                            <br>
                            <div class="col-md-4">
                                <label class="form-label">Employee Name *</label>
                                <select type="text" class="form-select" id="empl_name2" placeholder=" " required readonly style="border: 2px solid #ccf2ff; background-color: #e6f9ff;">
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
                                    <input type="text" class="form-control" id="dept2" readonly style="background-color: #e6e6e6;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" id="emp_id2" placeholder=" " readonly style="background-color: #e6e6e6;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Working Location</label>
                                    <input type="text" class="form-control" id="work_loc2" placeholder=" " readonly style="background-color: #e6e6e6;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Business Email</label>
                                    <input type="text" class="form-control" id="bus_email2" placeholder=" " readonly style="background-color: #e6e6e6;">
                                </div>

                                <!-- <div class="col-md-4">
                                    <label class="form-label">Reference Person</label>
                                    <input type="text" class="form-control" id="ref_person" placeholder=" " style="border: 2px solid #b3c6ff; background-color: #ccd9ff;">
                                </div> -->
                            </div>
                            <br>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <button id="trans_btn" class="btn btn-success" type="button">
                                <i class="fa-solid fa-arrow-right-arrow-left"></i> Transfer</button>
                            <button id="close_btn" class="btn btn-warning" type="button">
                                <i class="fa-solid fa-xmark"></i> Close</button>
                        </div>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
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

    <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Transfer</button>
                </div>
            </div>
        </div>
    </div> -->

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
    <script src="../../assets/selectize/dist/js/selectize.js"></script>
    <!-- <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function() {
            const name = '<?php echo $username ?>';
           
            $('#myTable').DataTable({
                searching: false, 
                paging: true, 
                info: false,
                ordering: false,
                fixedColumns: {leftColumns: 1}
            });

            $("#empl_name").selectize({})
            $("#empl_name2").selectize({})

            $("#empl_name2").change(function(){
                var empl_name2 = $(this).val()
                $.ajax({
                    url:"../../logic/empl_details.php",
                    method:"POST",
                    data:{empl_name2: empl_name2},
                    success:function(res){
                        $("#dept2").val(res.DEPT)
                        $("#emp_id2").val(res.EMPLID)
                        $("#work_loc2").val(res.LOCATION)
                        $("#bus_email2").val(res.BUSINESS_EMAIL)
                    }
                })
            })

            $('#close_btn').click(function() {
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
                    if(confirm.isConfirmed){
                        $('#empl_modal').modal('hide');
                    }
                })
            })
            $("#myTable").on("click", ".plusBtn", function(){
                var po_number = $(this).closest('tr').find('.po_no').val()
                var po_item = $(this).closest('tr').find('.po_item').val()
                $.ajax({
                    type: "POST",
                    url: "../../logic/mod_json.php",
                    data: {po_number:po_number, po_item:po_item},
                    success: function(res1){

                        $('#empl_modal').modal('show');
                        var selectize = $('#empl_name').selectize()
                        var select = selectize[0].selectize
                        select.setValue(res1.EMP_ID, false);

                        $("#dept").val(res1.DEPT)
                        $("#emp_id").val(res1.EMP_ID)
                        $("#work_loc").val(res1.WORK_LOC)
                        $("#bus_email").val(res1.BUS_EMAIL)
                        $("#asset_sub_group").append("<option value="+ res1.ASS_SUB_GRP +">"+ res1.ASS_SUB_GRP_NAME +"</option>")
                        $("#brand").append("<option value="+ res1.BRAND +">"+ res1.BRAND_NAME +"</option>")
                        $("#model").append("<option value="+ res1.MODEL_CODE +">"+ res1.MODEL_NAME +"</option>")
                        // $("#asset_sub_group").val(res1.ASS_SUB_GRP_NAME)
                        // $("#brand").val(res1.BRAND_NAME)
                        // $("#model").val(res1.res1.MODEL_NAME)
                        $("#series").val(res1.SERIES)
                        $("#price").val(res1.PRICE)
                        $("#ser_no1").val(res1.SER_NO1)
                        $("#ser_no2").val(res1.SER_NO2)
                        $("#ser_no3").val(res1.SER_NO3)
                        $("#ser_no4").val(res1.SER_NO4)
                        $("#remarks").val(res1.REMARKS)
                        $("#po_number").val(res1.PO_NUMBER)
                        $("#po_item").val(res1.PO_ITEM)
                        $("#ref_doc_no").val(res1.DOC_NO)
                        $("#ass_id").val(res1.ASS_ID)
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
            })

            $("#trans_btn").click(function(){
                var data = 1
                var po_number = $("#po_number").val()
                var po_item = $("#po_item").val()
                var asset_sub_group = $("#asset_sub_group").val()
                var brand = $("#brand").val()
                var model = $("#model").val()
                var ser_no1 = $("#ser_no1").val()
                var ser_no2 = $("#ser_no2").val()
                var ser_no3 = $("#ser_no3").val()
                var ser_no4 = $("#ser_no4").val()
                var remarks = $("#remarks").val()
                var ref_doc_no = $("#ref_doc_no").val()
                var ass_id = $("#ass_id").val()
                var emp_id = $("#emp_id").val()
                var emp_id2 = $("#emp_id2").val()
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
                        $.ajax({
                            type: 'POST',
                            url:'../../logic/insert_transfer.php',
                            data:{data:data, name:name, po_number:po_number, po_item:po_item, asset_sub_group:asset_sub_group, brand:brand,
                                model:model, ser_no1:ser_no1, ser_no2:ser_no2, ser_no3:ser_no3, ser_no4:ser_no4, remarks:remarks,
                                ref_doc_no:ref_doc_no, ass_id:ass_id, emp_id:emp_id, emp_id2:emp_id2},
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
</body>

</html>