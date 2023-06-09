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

    <title>ITAMS - Asset Sub Group</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
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
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
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
                        </li>

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
                        <h2 class="m-0 font-weight-bold" style="color: white; text-align: center">Add Asset Sub Group</h2>
                    </div>
                    <br>

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Sub Asset Group</h1> -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h2 class="m-0 font-weight-bold text-primary">Sub Asset Group</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-md-4">
                            <div class="" style='justify-content: start; display: flex; height:40px; margin-top: 10px'>
                                <button class="btn btn-success" id="add_grp" type="button"><i class="fa-solid fa-plus"></i> Add</button>
                            </div>
                        </div>  
                        <br>
                        <div class="table-responsive">
                            <table class="display nowrap" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sub Asset Group Code</th>
                                        <th>Sub Asset Group</th>
                                        <th hidden>Sub Asset Group Code</th>
                                        <th hidden>Asset Group ID</th>
                                        <th>Modify</th>
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
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM IT_ASSET_SUB_GROUP ORDER BY ASSET_SUB_GRP_CODE ASC";
                                        $query = oci_parse(connection(), $sql);
                                        oci_execute($query);
                                            while ($row = oci_fetch_assoc($query)) {
                                                echo "<tr>
                                                        <td>".$row["ASSET_SUB_GRP_CODE"]."</td>
                                                        <td class='sub_ass_name'>".$row["ASSET_SUB_GRP_NAME"]."</td>
                                                        <td hidden ><input class='sub_ass_id' value='".$row["ASSET_SUB_GRP_CODE"]."'></td>
                                                        <td hidden><input class='ass_id' value='".$row["ASSET_GRP_CODE"]."'></td>
                                                        <td><button class='btn btn-primary edit_btn' id='edit_btn'><i class='fa-solid fa-pen-to-square'></i> Edit</button></td>
                                                    </tr>";
                                            }
                                        oci_close(connection());
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                </div>
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

    <!-- Add Sub Asset Group -->
    <div class="modal fade" id="add_sub_ass_grp" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="subModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="user-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="subModal">Add Sub Asset Group</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">                  
                        <div class="form-group">
                            <label>Select Asset</label>
                            <select type="text" id="ass_group" name="ass_group" class="form-select" required>
                                <option value=""></option>
                                <?php 
                                    $sql = "SELECT ASSET_GRP_CODE, ASSET_GRP_NAME FROM IT_ASSET_GROUP ORDER BY ASSET_GRP_CODE";
                                    $res = oci_parse(connection(), $sql);
                                    oci_execute($res);

                                    while($row = oci_fetch_row($res)){
                                        echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label>Asset Flag</label>
                            <select type="text" id="ass_flg" name="ass_flg" class="form-control" required>
                                <option value=""></option>
                                <option value="asset">Asset</option>
                                <option value="expense">Expense</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label>Input Sub Asset Group</label>
                            <input type="text" id="sub_ass_grp" name="sub_ass_grp" class="form-control" required>
                        </div>           
                    </div>
                    <div class="col-md-12">
                        <button id="close_btn" class="btn btn-warning" type="button"><i class="fa-solid fa-xmark"></i> Close</button>
                        <button id="btn_add" type="button" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Sub Asset Group -->
    <div class="modal fade" id="edit_sub_ass_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="subModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="user-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="subModal">Add Sub Asset Group</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">                  
                        <div class="form-group">
                            <label>Select Asset</label>
                            <select type="text" id="edit_ass_name" name="edit_ass_group" class="form-select" required>
                                <option value=""></option>
                                <?php 
                                    $sql = "SELECT ASSET_GRP_CODE, ASSET_GRP_NAME FROM IT_ASSET_GROUP ORDER BY ASSET_GRP_CODE";
                                    $res = oci_parse(connection(), $sql);
                                    oci_execute($res);

                                    while($row = oci_fetch_row($res)){
                                        echo "<option value='".htmlspecialchars($row[0],ENT_IGNORE)."'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label>Asset Flag</label>
                            <select type="text" id="ass_flg" name="ass_flg" class="form-control" required>
                                <option value=""></option>
                                <option value="asset">Asset</option>
                                <option value="expense">Expense</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label>Input Sub Asset Group</label>
                            <input type="text" id="edit_sub_ass_name" name="edit_sub_ass_grp" class="form-control" required>
                        </div>    
                        <div class="form-group" hidden>
                            <label>Hidden Sub Asset Group</label>
                            <input type="text" id="edit_sub_ass_id" name="edit_sub_ass_id" class="form-control" required>
                        </div>       
                    </div>
                    <div class="col-md-12">
                        <button id="close_btn1" class="btn btn-warning" type="button"><i class="fa-solid fa-xmark"></i> Close</button>
                        <button id="btn_edit" type="button" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Save</button>
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

        $('#dataTable').DataTable({
            searching: false, 
            paging: true,
            scrollX: false, 
            info: false,
            ordering: false,
            fixedColumns: {leftColumns: 1}
        });

        $("#add_grp").click(function(){
            $("#add_sub_ass_grp").modal('show')
        })

        $("#btn_add").click(function(){
            var ass_group = $("#ass_group").val()
            var sub_ass_grp = $("#sub_ass_grp").val()
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
                        type: "POST",
                        url: "../../logic/set_up/insert_sub_asset.php",
                        data: {ass_group:ass_group, sub_ass_grp:sub_ass_grp, name:name},
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
                }
            })
        })

        $(document).on('click', ".edit_btn", function(){
            var sub_ass_name = $(this).closest('tr').find('td.sub_ass_name').text()
            var sub_ass_id = $(this).closest('tr').find('input.sub_ass_id').val()
            var ass_id = $(this).closest('tr').find('input.ass_id').val()

            $("#edit_ass_name").val(ass_id)
            $("#edit_sub_ass_name").val(sub_ass_name)
            $("#edit_sub_ass_id").val(sub_ass_id)

            $("#edit_sub_ass_modal").modal('show')

            $("#btn_edit").click(function(){
                var edit_sub_ass_name = $("#edit_sub_ass_name").val()
                var edit_ass_name = $("#edit_ass_name").val()
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
                }).then(confirm => {
                    if(confirm.isConfirmed){
                        $.ajax({
                            type: "POST",
                            url: "../../logic/set_up/update_sub_asset.php",
                            data: {edit_sub_ass_name:edit_sub_ass_name, edit_ass_name:edit_ass_name, sub_ass_id:sub_ass_id, name:name},
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

        // add_sub_asset close btn
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
            }).then(confirm => {
                if(confirm.isConfirmed){
                    $("#add_sub_ass_grp").modal('hide')
                }
            })
        })

        // edit_sub_asset close btn
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
                if(confirm.isConfirmed){
                    $("#edit_sub_ass_modal").modal('hide')
                }
            })
        })

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
</script>

</html>