<?php 
    require "../../config/connection.php";

    header("Content-Type:application/json");
   
    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if(isset($_POST['edit_req_grp'])){
        $edit_req_grp = $_POST['edit_req_grp'];
        $edit_type = $_POST['edit_type'];
        $type_id = $_POST['type_id'];
        $name = $_POST['name'];

        $sql = "UPDATE IT_ASSET_REQ_TYPE SET REQ_TYPE_NAME = :req_type, REQ_GRP_ID = :edit_grp, LAST_USER_UPDATE = :username, 
        LAST_USER_UPDATE_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am') WHERE REQ_TYPE_ID = :type_id";
        $res = oci_parse(connection(), $sql);
        oci_bind_by_name($res, ':req_type', $edit_type);
        oci_bind_by_name($res, ':edit_grp', $edit_req_grp);
        oci_bind_by_name($res, ':type_id', $type_id);
        oci_bind_by_name($res, ':username', $name);
        oci_bind_by_name($res, ':update_date', $date);
    
        if (oci_execute($res, OCI_NO_AUTO_COMMIT)) {
            oci_commit(connection());
            echo json_encode(array('success' => 1, 'message' => "MODIFY Success", 'icon' => "success"));
        }
        else {
            oci_rollback(connection());
            echo json_encode(array('success' => 0, 'message' => "ERROR  to MODIFIED", 'icon' => "error"));
        }
    }



?>