<?php 
    require "../../config/connection.php";

    header("Content-Type:application/json");
   
    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if(isset($_POST['edit_ass_name'])){
        $edit_ass_name = $_POST['edit_ass_name'];
        $edit_sub_ass_name = $_POST['edit_sub_ass_name'];
        $sub_ass_id = $_POST['sub_ass_id'];
        $name = $_POST['name'];

        $sql = "UPDATE IT_ASSET_SUB_GROUP SET ASSET_SUB_GRP_NAME = :ass_sub_grp, ASSET_GRP_CODE = :ass_code, LAST_USER_UPDATE = :username, 
        LAST_USER_UPDATE_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am') WHERE ASSET_SUB_GRP_CODE = :ass_sub_code";
        $res = oci_parse(connection(), $sql);
        oci_bind_by_name($res, ':ass_code', $edit_ass_name);
        oci_bind_by_name($res, ':ass_sub_grp', $edit_sub_ass_name);
        oci_bind_by_name($res, ':ass_sub_code', $sub_ass_id);
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