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

    <title>ITAMS - Report</title>

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
    <link rel="stylesheet" href="../../assets/selectize/dist/css/selectize.bootstrap5.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="../../datatable/datatables.css">
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

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
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

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <nav class="nav nav-pills nav-justified">
                                    <a class="flex-sm-fill text-sm-center nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" 
                                    aria-controls="tab1" aria-selected="true" style="font-weight: bold;">Information</a>
                                    <a class="flex-sm-fill text-sm-center nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" 
                                    aria-controls="tab2" aria-selected="false" style="font-weight: bold;">Assets</a>
                                    <a class="flex-sm-fill text-sm-center nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" 
                                    aria-controls="tab3" aria-selected="false" style="font-weight: bold;">Expense</a>
                                </nav>
                            </div>
                        </div>
                        
                        <div class="card shadow mb-4">    
                            <div class="tab-content" id="myTabContent" >
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                    <div class="card-body" style="background-color: #87CEFA;">
                                        <div class="row g-2">
                                            <div class="col-md-3">
                                                <div class="label" style="color: #000000">PO Number:</div>
                                                <select type="text" name="po_num" id='po_num' class='form-select' required style="margin-bottom: 8px;"> 
                                                <option value=""></option>
                                                <?php  
                                                    $sql = "SELECT DISTINCT PO_NUMBER FROM IT_ASSET_HEADER1 CANCEL_ASSET_FLAG is null";
                                                    $res = oci_parse(connection(), $sql);
                                                    oci_execute($res);

                                                    while($row = oci_fetch_row($res)){
                                                        echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                    }
                                                ?>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="label" style="color: #000000">PO Document Date:</div>
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
                                                        $sql = "SELECT DISTINCT A.DOCUMENT_NO, B.EMPL_ID FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B
                                                                WHERE A.DOCUMENT_NO = B.DOCUMENT_NO";

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
                                                <select class="form-select" name="ser_no1" id="ser_no1" style="margin-bottom: 8px;">
                                                    <option value=""></option>
                                                    <?php 
                                                        $sql = "SELECT DISTINCT SERIAL_NO1 FROM IT_ASSET_DETAILS1";
                                                        $res = oci_parse(connection(), $sql);
                                                        oci_execute($res);

                                                        while($row = oci_fetch_row($res)){
                                                            echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="label" style="color: #000">Remarks</div>
                                                <select class="form-select" name="rem" id="rem" style="margin-bottom: 8px;">
                                                    <option value=""></option>
                                                    <?php 
                                                        $sql = "SELECT DISTINCT REMARKS FROM IT_ASSET_DETAILS1";
                                                        $res = oci_parse(connection(), $sql);
                                                        oci_execute($res);

                                                        while($row = oci_fetch_row($res)){
                                                            echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="label" style="color: #000000">Vendor:</div>
                                                <select type="text" name="vendor" id='vendor' class='form-select' required style="margin-bottom: 8px;"> 
                                                    <option value=""></option>
                                                    <?php 
                                                        $sql = "SELECT A.VENDOR_CODE, B.VENDOR_NAME FROM IT_ASSET_HEADER1 A, IT_ASSET_VENDORS B
                                                                WHERE A.VENDOR_CODE = B.VENDOR_CODE";

                                                        $res = oci_parse(connection(), $sql);
                                                        oci_execute($res);
                                                        while($row = oci_fetch_row($res)){
                                                            echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                        }
                                                    ?>
                                                </select> 
                                            </div>

                                            <div class="col-md-3">
                                                <div class="label" style="color: #000000">Department:</div>
                                                <select type="text" name="dept" id='dept' class='form-select' required style="margin-bottom: 8px;"> 
                                                    <option value=""></option>
                                                    <?php
                                                        $sql = "SELECT DISTINCT A.EMPL_ID FROM IT_ASSET_DETAILS1 A, IT_ASSET_HEADER1 B
                                                        WHERE A.DOCUMENT_NO = B.DOCUMENT_NO";

                                                        $result = oci_parse(connection(), $sql);
                                                        oci_execute($result);                                                    

                                                        while($row = oci_fetch_assoc($result)){
                                                            $empId = $row["EMPL_ID"];

                                                            $dept_code = "SELECT DISTINCT B.DEPTID, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
                                                                JOBCUR_EE C WHERE B.DEPTID = C.DEPTID
                                                                AND A.EMPLID = C.EMPLID
                                                                AND A.EMPLID = :empl";
                                                            $stmt = oci_parse(connection1(), $dept_code);
                                                            oci_bind_by_name($stmt, ':empl', $empId);
                                                            oci_execute($stmt);

                                                            $row1 = oci_fetch_row($stmt);

                                                            echo "<option value='".htmlspecialchars($row1[0], ENT_QUOTES)."'>".htmlspecialchars($row1[1], ENT_QUOTES)."</option>";
                                                        }
                                                    ?>
                                                </select> 
                                            </div>

                                            <div class="col-md-3">
                                                <div class="label" style="color: #000000">BRAND:</div>
                                                <select type="text" name="brand" id='brand' class='form-select' required style="margin-bottom: 8px;"> 
                                                    <option value=""></option>
                                                    <?php 
                                                        $sql = "SELECT A.BRAND, B.BRAND_NAME FROM IT_ASSET_DETAILS1 A, IT_ASSET_BRAND B
                                                                WHERE A.BRAND = B.BRAND_CODE";
                                                        
                                                        $res = oci_parse(connection(), $sql);
                                                        oci_execute($res);

                                                        while($row = oci_fetch_row($res)){
                                                            echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1], ENT_IGNORE)."</option>";
                                                        }
                                                    ?>
                                                </select> 
                                            </div>
                                        </div>
                                
                                        <div class="row g-2">
                                            

                                            <div class="col-md-3" style='justify-content: end; display: flex; margin-top: 35px'>
                                                <button class="btn btn-success" id="srch" type="button"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                                            </div>

                                        </div>

                                        <!-- </form> -->
                                            
                                        <!-- <div class="row mb-3">
                                            <label class="col-sm-2" style="margin-right: -20px; margin-right: -110px; color: #fff; font-weight: bold">Search</label>
                                            <div class="col-sm-3">
                                                <input id="search" name='search ' type="text" class="form-control" required 
                                                    style="border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: white;">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="label" style="color: #fff">Document No.</div>
                                            <select class="form-select" name="doc_no" id="doc_no">
                                                <option value=""></option>
                                            </select>
                                        
                                            <div class="label" style="color: #fff">
                                                Department:
                                            </div>
                                            <select type="text" name="dept" id='dept' class='form-select' required> 
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
                                        <!-- </div> -->

                                        
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive" style="background-color: white">
                                        <br>
                                            <table class="display nowrap" id="dataTable1" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Document Number</th>
                                                        <th>PO Number</th>
                                                        <th>Employee Name</th>
                                                        <th>Department</th>
                                                        <th>Item</th>
                                                        <th>Supplier</th>
                                                        <th>User (Email)</th>
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
                                                <!-- <tbody id="tbody">
                                                    <tr>
                                                        <td>
                                                            <img data-toggle="modal" data-target="#plusImgbtn" id='plusImg' 
                                                            src='../../assets/add-free-icon-font.png'>
                                                        </td>
                                                        <td></td>
                                                        <td>4500270648</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        
                                                    </tr>
                                                </tbody> -->
                                                <tbody id="doc_tbody">
                                                    <?php
                                                        $sql = "SELECT DISTINCT A.DOCUMENT_NO, A.PO_NUMBER, C.VENDOR_NAME, 
                                                        B.EMPL_ID, B.MTRL_SHORT
                                                        FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C
                                                        WHERE A.PO_NUMBER = B.PO_NUMBER
                                                        AND A.VENDOR_CODE = C.VENDOR_CODE
                                                        AND A.CANCEL_ASSET_FLAG is null
                                                        ORDER BY A.DOCUMENT_NO DESC";
                                                
                                                        $result = oci_parse(connection(), $sql);
                                                        oci_execute($result);                                                    
                                                        
                                                        while($row = oci_fetch_assoc($result)){
                                                            $empId = $row["EMPL_ID"];
                                                        
                                                            $dept_code = "SELECT A.NAMEENG, A.BUSINESSMAIL, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
                                                            JOBCUR_EE C WHERE B.DEPTID = C.DEPTID
                                                            AND A.EMPLID = C.EMPLID
                                                            AND A.EMPLID = :empl";
                                                            $stmt = oci_parse(connection1(), $dept_code);
                                                            oci_bind_by_name($stmt, ':empl', $empId);
                                                            oci_execute($stmt);
                                                        
                                                            $row1 = oci_fetch_assoc($stmt);
                                                        
                                                            echo"<tr>
                                                                <td><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></td>
                                                                    <td>".$row["DOCUMENT_NO"]."</td>
                                                                    <td>".$row["PO_NUMBER"]."</td>
                                                                    <td>".$row1["NAMEENG"]."</td>
                                                                    <td>".$row1["DESCR"]."</td>
                                                                    <td>".$row["MTRL_SHORT"]."</td>
                                                                    <td>".$row["VENDOR_NAME"]."</td>
                                                                    <td>".$row1["BUSINESSMAIL"]."</td>
                                                                    <td hidden><input class='po_no' value=".$row["PO_NUMBER"]." hidden></td>
                                                                </tr>";
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                                <!-- tab 2 ASSET -->
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3" style="background: #87CEFA">
                                            <!-- <div class="row g-2">
                                                <div class="col-md-3">
                                                    <div class="label" style="color: #000">PO Number:</div>
                                                    <select type="text" name="po_num" id='po_num' class='form-select' required style="margin-bottom: 8px;"> 
                                                    <option value=""></option>
                                                    <?php 
                                                        // $sql = "SELECT DISTINCT PO_NUMBER FROM IT_ASSET_HEADER";
                                                        // $res = oci_parse(connection(), $sql);
                                                        // oci_execute($res);

                                                        // while($row = oci_fetch_row($res)){
                                                        //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[0],ENT_IGNORE)."</option>";
                                                        // }
                                                    ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="label" style="color: #000">Vendor:</div>
                                                    <select type="text" name="vendor" id='vendor' class='form-select' required style="margin-bottom: 8px;"> 
                                                        <option value=""></option>
                                                        <?php 
                                                            // $sql = "SELECT A.VENDOR_CODE, B.VENDOR_NAME FROM IT_ASSET_HEADER A, IT_ASSET_VENDORS B
                                                            //         WHERE A.VENDOR_CODE = B.VENDOR_CODE";

                                                            // $res = oci_parse(connection(), $sql);
                                                            // oci_execute($res);
                                                            // while($row = oci_fetch_row($res)){
                                                            //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                                            // }
                                                        ?>
                                                    </select> 
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="label" style="color: #000">Employee Name:</div>
                                                    <select type="text" name="emp_name" id='emp_name' class='form-select' required style="margin-bottom: 8px;"> 
                                                    <option value=""></option>
                                                        <?php
                                                            // $sql = "SELECT DISTINCT A.DOCUMENT_NO, B.EMPL_ID FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B
                                                            //         WHERE A.DOCUMENT_NO = B.DOCUMENT_NO";

                                                            // $result = oci_parse(connection(), $sql);
                                                            // oci_execute($result);                                                    

                                                            // while($row = oci_fetch_assoc($result)){
                                                            //     $empId = $row["EMPL_ID"];

                                                            //     $dept_code = "SELECT DISTINCT NAMEENG FROM PERSON_TBL
                                                            //                 where EMPLID = :empl";
                                                            //     $stmt = oci_parse(connection1(), $dept_code);
                                                            //     oci_bind_by_name($stmt, ':empl', $empId);
                                                            //     oci_execute($stmt);

                                                            //     $row1 = oci_fetch_row($stmt);

                                                            //     echo "<option value='".htmlspecialchars($row["EMPL_ID"],ENT_IGNORE)."'>".htmlspecialchars($row1[0],ENT_IGNORE)."</option>";
                                                            // }
                                                        ?>
                                                    </select>                                                     
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="label" style="color: #000">BRAND:</div>
                                                    <select type="text" name="brand" id='brand' class='form-select' required style="margin-bottom: 8px;"> 
                                                        <option value=""></option>
                                                        <?php 
                                                            // $sql = "SELECT A.BRAND_CODE, B.BRAND_NAME FROM IT_ASSET_DETAILS A, IT_ASSET_BRAND B
                                                            //         WHERE A.BRAND_CODE = B.BRAND_CODE";
                                                            
                                                            // $res = oci_parse(connection(), $sql);
                                                            // oci_execute($res);

                                                            // while($row = oci_fetch_row($res)){
                                                            //     echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1], ENT_IGNORE)."</option>";
                                                            // }
                                                        ?>
                                                    </select> 
                                                </div>
                                            </div> -->

                                            <div class="row g-2">
                                                <div class="col-md-4" style="margin: auto">
                                                    <div class="label" style="color: #000">Department:</div>
                                                    <select type="text" name="dept1" id='dept1' class='form-select' required> 
                                                        <option value=""></option>
                                                        <?php
                                                            $sql = "SELECT DISTINCT A.EMPL_ID FROM IT_ASSET_DETAILS1 A, IT_ASSET_HEADER1 B
                                                            WHERE A.DOCUMENT_NO = B.DOCUMENT_NO";

                                                            $result = oci_parse(connection(), $sql);
                                                            oci_execute($result);                                                    

                                                            while($row = oci_fetch_assoc($result)){
                                                                $empId = $row["EMPL_ID"];

                                                                $dept_code = "SELECT DISTINCT B.DEPTID, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
                                                                    JOBCUR_EE C WHERE B.DEPTID = C.DEPTID
                                                                    AND A.EMPLID = C.EMPLID
                                                                    AND A.EMPLID = :empl";
                                                                $stmt = oci_parse(connection1(), $dept_code);
                                                                oci_bind_by_name($stmt, ':empl', $empId);
                                                                oci_execute($stmt);

                                                                $row1 = oci_fetch_row($stmt);

                                                                echo "<option value='".htmlspecialchars($row1[0], ENT_QUOTES)."'>".htmlspecialchars($row1[1], ENT_QUOTES)."</option>";
                                                            }
                                                        ?>
                                                    </select> 
                                                </div>

                                                <!-- <div class="col-md-6">
                                                    <div class="label" style="color: #000">PO Document Date:</div>
                                                        <div class="input-group">
                                                            <input type="date" class="form-control" id="from" placeholder="From" aria-label="Username">
                                                            <span class="input-group-text">-</span>
                                                            <input type="date" class="form-control" id="to" placeholder="To" aria-label="Server">
                                                        </div>
                                                </div> -->
                                            </div>

                                                <div class="col-md-12">
                                                    <div class="" style='justify-content: end; display: flex; height:40px; margin-top: 10px'>
                                                        <button class="btn btn-warning" id="clr1" type="button" style="margin-right: 10px;"><i class="fa-solid fa-trash-can"></i> Reset</button>
                                                        <button class="btn btn-success" id="srch1" type="button"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <!-- Area Chart -->
                                    <div class="container-fluid">
                                        <div class="card" style="border: 1px solid red">
                                            <div id="chartContainer" style="height: 400px; width: 50%; margin:auto;"></div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </div>

                                <!-- tab 3 EXPENSE -->
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3" style="background: #87CEFA">
                                            <div class="row g-2">
                                                <div class="col-md-4" style="margin: auto">
                                                    <div class="label" style="color: #000">Department:</div>
                                                    <select type="text" name="dept2" id='dept2' class='form-select' required> 
                                                        <option value=""></option>
                                                        <?php
                                                            $sql = "SELECT DISTINCT A.EMPL_ID FROM IT_ASSET_DETAILS1 A, IT_ASSET_HEADER1 B
                                                            WHERE A.DOCUMENT_NO = B.DOCUMENT_NO";

                                                            $result = oci_parse(connection(), $sql);
                                                            oci_execute($result);                                                    

                                                            while($row = oci_fetch_assoc($result)){
                                                                $empId = $row["EMPL_ID"];

                                                                $dept_code = "SELECT DISTINCT B.DEPTID, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
                                                                    JOBCUR_EE C WHERE B.DEPTID = C.DEPTID
                                                                    AND A.EMPLID = C.EMPLID
                                                                    AND A.EMPLID = :empl";
                                                                $stmt = oci_parse(connection1(), $dept_code);
                                                                oci_bind_by_name($stmt, ':empl', $empId);
                                                                oci_execute($stmt);

                                                                $row1 = oci_fetch_row($stmt);

                                                                echo "<option value='".htmlspecialchars($empId, ENT_QUOTES)."'>".htmlspecialchars($row1[1], ENT_QUOTES)."</option>";
                                                            }
                                                        ?>
                                                    </select> 
                                                </div>
                                            </div>

                                                <div class="col-md-12">
                                                    <div class="" style='justify-content: end; display: flex; height:40px; margin-top: 10px'>
                                                        <button class="btn btn-warning" id="clr2" type="button" style="margin-right: 10px;"><i class="fa-solid fa-trash-can"></i> Reset</button>
                                                        <button class="btn btn-success" id="srch2" type="button"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <!-- Area Chart -->
                                    <div class="card-body">
                                        <div id="chartContainer2" style="height: 400px; width: 50%; margin:auto;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

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
                                        <input id="po_no" class="po_num" name='po_no' type="text" autocomplete="off" style=" background-color: transparent;">                                           
                                        
                                        <script>
                                            document.getElementById('po_no').value = "<?php echo ($_POST['po_no']);?>";
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
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-success" data-dismiss="modal" value="Close">
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

    <!-- <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="../../assets/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../assets/selectize/dist/js/selectize.js"></script>

    <script src='../../assets/canvasjs/canvasjs.min.js'></script>
    
</body>
<script>
    $(document).ready(function(){
        const myModalEl = document.getElementById("po_dtls")
        myModalEl.addEventListener('shown.bs.modal', e=>{
            table.columns.adjust().draw()
        })
       $('#dataTable1').DataTable({
        searching: false, 
        paging: true, 
        info: false,
        ordering: false,
        fixedColumns: {leftColumns: 1}
      });

    //   $('#dataTable').DataTable({
    //     searching: false, 
    //     paging: false, 
    //     info: false,
    //     ordering: false,
    //   });

    // selectize
    $("#po_num").selectize({})
    $("#dept").selectize({})
    $("#emp_name").selectize({})
    $("#vendor").selectize({})
    $("#brand").selectize({})

    $(".view_dtl").on("click", function(){
        var po_num = $(this).closest('tr').find('.po_no').val()
        $.ajax({
            type: "POST",
            url: "../../logic/po_report.php",
            data: {po_num: po_num},
            success: function(res){
                var table = $('#dataTable').DataTable({
                sorting: false,
                scrollX: false,
                destroy: true,
                "bDestroy": true,
                searching: false,
                "bPaginate": false,
                        "dom": 'rtip',
                        "bInfo": false,
                }) 
                $('#po_dtls').modal('show')
                // $('#dataTable').DataTable().clear().draw()               
                $('#td_body').html(res) 
            }
        })
    })

    $("#srch").click(function(){
        var data = 1
        var po_num = $("#po_num").find(':selected').val()
        var emp_name = $("#emp_name").find(':selected').val()
        var brand = $("#brand").find(':selected').val()
        var dept = $("#dept").find(':selected').val()
        var vendor = $("#vendor").find(':selected').val()
        var from_date = $("#from_date").val()
        var to_date = $("#to_date").val()

        // po num
        if (po_num != "" && emp_name == "" && brand == "" && dept == "" && vendor == "" && from_date == "" && to_date == "") {
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
                type: "POST",
                url: "../../logic/reports.php",
                data: {data:data, po_num:po_num},
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
                    Swal.hideLoading()
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        }

        // emp name
        else if (emp_name != "" && po_num == "" && brand == "" && dept == "" && vendor == "" && from_date == "" && to_date == ""){
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
                type: "POST",
                url: "../../logic/reports.php",
                data: {data:data, emp_name:emp_name},
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
                    Swal.hideLoading()
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        }

        // brand
        else if (brand != "" && po_num == "" && emp_name == "" && dept == "" && vendor == "" && from_date == "" && to_date == ""){
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
                type: "POST",
                url: "../../logic/reports.php",
                data: {data:data, brand:brand},
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
                    Swal.hideLoading()
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        }

        // dept
        else if (dept != "" && po_num == "" && emp_name == "" && brand == "" && vendor == "" && from_date == "" && to_date == ""){
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
                type: "POST",
                url: "../../logic/reports.php",
                data: {data:data, dept:dept},
                success: function(res){
                    console.log(res)
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
                    Swal.hideLoading()
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        }

        // vendor
        else if (vendor != "" && po_num == "" && emp_name == "" && brand == "" && dept == "" && from_date == "" && to_date == ""){
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
                type: "POST",
                url: "../../logic/reports.php",
                data: {data:data, vendor:vendor},
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
                    Swal.hideLoading()
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        }

        // po_doc_date
        else if (from_date && to_date != "" && po_num == "" && emp_name == "" && brand == "" && dept == "" && vendor == ""){
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
                type: "POST",
                url: "../../logic/reports.php",
                data: {data:data, from_date:from_date, to_date:to_date},
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
                    Swal.hideLoading()
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


    $("#dataTable1").on("click", '.view_dtl', function(){
        var po_num = $(this).closest('tr').find('.po_no').val()
        $.ajax({
            type: "POST",
            url: "../../logic/po_report.php",
            data: {po_num: po_num},
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

    // reset button
    
    $("#clr").click(function(){
        location.reload()
    })

    window.onload = function () {
        // chart 1
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Assets Cost per Year"
            },
            axisX: {
                intervalType: "year"
            },
            data: [{        
                type: "column",
                dataPoints: [ ]
            }]
        });
        // chart.render();

        $("#dept1").selectize({})
        $("#srch1").click(function(){
            var dept1 = $("#dept1").find(':selected').val()
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
                type: "POST",
                url: "../../logic/chart_report.php",
                data: {dept1:dept1},
                success: function(data) {
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
                    chart.options.data[0].dataPoints.length = 0; // clear existing data points
                    data.forEach(function(item) {
                        chart.options.data[0].dataPoints.push({
                            label: item.label, 
                            y: item.y
                        })
                    });
                    // chart.options.animationEnabled = true;
                    chart.render();
                    chart.options.animationEnabled = true;
                },
                error: function(){
                    Swal.hideLoading()
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        })

        // chart2
        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Expense Cost per Year"
            },
            axisX: {
                intervalType: "year"
            },
            data: [{        
                type: "column",
                dataPoints: [ ]
            }]
        });
        // char2t.render();

        $("#dept2").selectize({})
        $("#srch2").click(function(){
            var dept2 = $("#dept2").find(':selected').val()
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
                type: "POST",
                url: "../../logic/chart_report.php",
                data: {dept2:dept2},
                success: function(data) {
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
                    chart2.options.data[0].dataPoints.length = 0; // clear existing data points
                    data.forEach(function(item) {
                        chart2.options.data[0].dataPoints.push({
                            label: item.label, 
                            y: item.y
                        })
                    });
                    // chart.options.animationEnabled = true;
                    chart2.render();
                    chart2.options.animationEnabled = true;
                },
                error: function(){
                    Swal.hideLoading()
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while loading data',
                        icon: 'error'
                    })
                }
            })
        })
    }

})
</script>
</html>