<?php 
    require "../../config/connection.php";

    header("Content-Type:application/json");
   
    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if(isset($_POST['edit_type'])){
        $edit_type = $_POST['edit_type'];
        $edit_ass_name = $_POST['edit_ass_name'];
        $edit_ass_id = $_POST['edit_ass_id'];
        $name = $_POST['name'];

        $sql = "UPDATE IT_ASSET_GROUP SET ASSET_GRP_NAME = :ass_grp, REQ_TYPE_ID = :req_type, LAST_USER_UPDATE = :username, 
        LAST_USER_UPDATE_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am') WHERE ASSET_GRP_CODE = :ass_code";
        $res = oci_parse(connection(), $sql);
        oci_bind_by_name($res, ':req_type', $edit_type);
        oci_bind_by_name($res, ':ass_grp', $edit_ass_name);
        oci_bind_by_name($res, ':ass_code', $edit_ass_id);
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