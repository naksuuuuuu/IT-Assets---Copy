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
    <!-- <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="../../vendor/fontawesome-free/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

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
                <div class="container-fluid">
                    <div class="card-header" style="background-color: #4e73df;">
                        <h2 class="m-0 font-weight-bold" style="color: white; text-align: center">Dashboard</h2>
                    </div>
                    <br>
                    <div class="card" style="border: 1px solid #e6e6e6">
                    <br>
                        <div class="container-fluid">
                            <!-- Content Row -->
                            <div class="row">

                                <!-- Total Assets Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Total Assets</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php 
                                                            $sql = "SELECT COUNT(UNIT_PRICE) FROM IT_ASSET_DETAILS1 WHERE UNIT_PRICE >= 5000";
                                                            $stmt = oci_parse(connection(), $sql);
                                                            oci_execute($stmt);
                                                            $result = oci_fetch_row($stmt);
                                                            // echo "<option value='".htmlspecialchars($result[0],ENT_IGNORE)."'>".htmlspecialchars($result[0],ENT_IGNORE)."</option>";
                                                            echo "<p>".number_format($result[0])."</p>";
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TOTAL EXPENSE -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                        Total Expense</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php 
                                                            $sql = "SELECT COUNT(UNIT_PRICE) FROM IT_ASSET_DETAILS1 WHERE UNIT_PRICE <= 5000";
                                                            $stmt = oci_parse(connection(), $sql);
                                                            oci_execute($stmt);
                                                            $result = oci_fetch_row($stmt);
                                                            echo "<p>".number_format($result[0])."</p>";
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-thumbs-up fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Active Assets Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Active Assets</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php 
                                                            $sql = "SELECT COUNT(DOCUMENT_NO) FROM IT_ASSET_HEADER1 WHERE CANCEL_ASSET_FLAG is null";
                                                            $stmt = oci_parse(connection(), $sql);
                                                            oci_execute($stmt);
                                                            $result = oci_fetch_row($stmt);
                                                            echo "<p>".number_format($result[0])."</p>";
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-thumbs-up fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cancelled Assets Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cancelled Assets
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            <?php 
                                                                $sql = "SELECT COUNT(CANCEL_ASSET_FLAG) FROM IT_ASSET_HEADER1";
                                                                $stmt = oci_parse(connection(), $sql);
                                                                oci_execute($stmt);
                                                                $result = oci_fetch_row($stmt);
                                                                echo "<p>".number_format($result[0])."</p>";
                                                            ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-ban fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total asset cost Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Total Asset Costs</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php 
                                                            $sql = "SELECT SUM(UNIT_PRICE) FROM IT_ASSET_DETAILS1 WHERE UNIT_PRICE >= 5000";
                                                            $stmt = oci_parse(connection(), $sql);
                                                            oci_execute($stmt);
                                                            $result = oci_fetch_row($stmt);
                                                            echo "<p>".number_format($result[0], 2, '.', ',')."</p>";
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-peso-sign fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total asset cost Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-secondary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                    Total Expense Costs</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php 
                                                            $sql = "SELECT SUM(UNIT_PRICE) FROM IT_ASSET_DETAILS1 WHERE UNIT_PRICE <= 5000";
                                                            $stmt = oci_parse(connection(), $sql);
                                                            oci_execute($stmt);
                                                            $result = oci_fetch_row($stmt);
                                                            echo "<p>".number_format($result[0], 2, '.', ',')."</p>";
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-peso-sign fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <!-- Content Row -->
                        <!-- <div class="row g-3"> -->
                            <!-- Area Chart -->
                        <div class="container-fluid">
                            <div class="card" style="border: 1px solid red">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div id="chartContainer" style="height: 400px;"></div>
                                        <?php 
                                            $sql = "SELECT sum(UNIT_PRICE) as y, extract(YEAR from labelss) as x FROM (
                                                SELECT a.UNIT_PRICE, to_date(b.PO_DOCUMENT_DATE, 'DD/MM/YY') as labelss 
                                                FROM IT_ASSET_DETAILS1 a, IT_ASSET_HEADER1 b
                                                WHERE a.unit_price >= 5000
                                                AND a.PO_NUMBER = b.PO_NUMBER
                                            )
                                            GROUP BY extract(YEAR from labelss)
                                            ORDER BY extract(YEAR from labelss) ASC";
                                
                                            $result = oci_parse(connection(), $sql);
                                            oci_execute($result);
                                        
                                            $data = array();
                                            while($details = oci_fetch_assoc($result)) {
                                                $empId = "EMPL_ID";
                                        
                                                $dept_code = "SELECT DISTINCT B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, JOBCUR_EE C 
                                                            WHERE B.DEPTID = C.DEPTID
                                                            AND A.EMPLID = C.EMPLID
                                                            AND A.EMPLID = :empl";
                                                $stmt = oci_parse(connection1(), $dept_code);
                                                oci_bind_by_name($stmt, ':empl', $empId);
                                                oci_execute($stmt);
                                        
                                                $data[] = array("label"=>$details["X"], "y"=>$details["Y"]);
                                            }
                                        ?>
                                    </div>

                                    <div class="col-md-6">
                                        <div id="chartContainer2" style="height: 400px;"></div>
                                        <?php 
                                            $sql2 = "SELECT sum(UNIT_PRICE) as y, extract(YEAR from labelss) as x FROM (
                                                SELECT a.UNIT_PRICE, to_date(b.PO_DOCUMENT_DATE, 'DD/MM/YY') as labelss 
                                                FROM IT_ASSET_DETAILS1 a, IT_ASSET_HEADER1 b
                                                WHERE a.unit_price < 5000
                                                AND a.PO_NUMBER = b.PO_NUMBER
                                            )
                                            GROUP BY extract(YEAR from labelss)
                                            ORDER BY extract(YEAR from labelss) ASC";
                                
                                            $result = oci_parse(connection(), $sql2);
                                            oci_execute($result);
                                        
                                            $data2 = array();
                                            while($details = oci_fetch_assoc($result)) {
                                                $empId = "EMPL_ID";
                                        
                                                $dept_code = "SELECT DISTINCT B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, JOBCUR_EE C 
                                                    WHERE B.DEPTID = C.DEPTID
                                                    AND A.EMPLID = C.EMPLID
                                                    AND A.EMPLID = :empl";
                                                $stmt = oci_parse(connection1(), $dept_code);
                                                oci_bind_by_name($stmt, ':empl', $empId);
                                                oci_execute($stmt);
                                        
                                                $data2[] = array("label"=>$details["X"], "y"=>$details["Y"]);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <br>
                        <br>

                            <!-- Pie Chart -->
                            <!-- <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4"> -->
                                    <!-- Card Header - Dropdown -->
                                    <!-- <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- Card Body -->
                                    <!-- <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-primary"></i> Direct
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success"></i> Social
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-info"></i> Referral
                                            </span>
                                        </div>
                                    </div> -->
                                <!-- </div>
                            </div> -->
                        <!-- </div> -->
                        <br>
                    </div>

                </div>
                <!-- /.container-fluid -->

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
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="../../js/demo/chart-area-demo.js"></script>
    <script src="../../js/demo/chart-pie-demo.js"></script> -->

    <script src='../../assets/canvasjs/canvasjs.min.js'></script>

</body>

<script>
window.onload = function () {
    // chart 1
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Total Assets Cost per Year"
        },
        axisX: {
		    intervalType: "year"
        },
        data: [{        
            type: "column",
            dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();

    // chart 2
    var chart2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Total Expense Cost per Year"
        },
        axisX: {
		    intervalType: "year"
        },
        data: [{        
            type: "column",
            dataPoints: <?php echo json_encode($data2, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart2.render();
}

</script>
</html>