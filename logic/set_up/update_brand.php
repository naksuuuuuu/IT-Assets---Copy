<?php 
    require "../../config/connection.php";

    header("Content-Type:application/json");
   
    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if(isset($_POST['edit_sub_grp_id'])){
        $edit_sub_grp_id = $_POST['edit_sub_grp_id'];
        $edit_brand_name = $_POST['edit_brand_name'];
        $brand_code = $_POST['brand_code'];
        $name = $_POST['name'];

        $sql = "UPDATE IT_ASSET_BRAND SET BRAND_NAME = :brand_name, ASSET_SUB_GRP_CODE = :ass_sub_code, LAST_USER_UPDATE = :username, 
        LAST_USER_UPDATE_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am') WHERE BRAND_CODE = :brand_code";
        $res = oci_parse(connection(), $sql);
        oci_bind_by_name($res, ':ass_sub_code', $edit_sub_grp_id);
        oci_bind_by_name($res, ':brand_name', $edit_brand_name);
        oci_bind_by_name($res, ':brand_code', $brand_code);
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