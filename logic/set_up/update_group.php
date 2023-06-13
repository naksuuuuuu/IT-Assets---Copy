<?php 
    header('Content-Type: application/json');
    require "../../config/connection.php";

    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if(isset($_POST['edit_name'])){
        $edit_name = $_POST['edit_name'];
        $grp_id = $_POST['grp_id'];
        $name = $_POST['name'];

        $sql = "UPDATE IT_ASSET_REQ_GROUP SET REQ_GRP_NAME = :edit_grp, LAST_USER_UPDATE = :username, 
        LAST_USER_UPDATE_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am') WHERE REQ_GRP_ID = :req_id";
        $res = oci_parse(connection(), $sql);
        oci_bind_by_name($res, ':edit_grp', $edit_name);
        oci_bind_by_name($res, ':username', $name);
        oci_bind_by_name($res, ':update_date', $date);
        oci_bind_by_name($res, ':req_id', $grp_id);
    
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