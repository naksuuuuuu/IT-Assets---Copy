<?php 
    require "../../config/connection.php";

    header("Content-Type:application/json");
   
    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if(isset($_POST['edit_brand_code'])){
        $edit_brand_code = $_POST['edit_brand_code'];
        $edit_model_name = $_POST['edit_model_name'];
        $model_code = $_POST['model_code'];
        $name = $_POST['name'];

        $sql = "UPDATE IT_ASSET_MODEL SET MODEL_NAME = :model_name, BRAND_CODE = :brand_code, LAST_USER_UPDATE = :username, 
        LAST_USER_UPDATE_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am') WHERE MODEL_CODE = :model_code";
        $res = oci_parse(connection(), $sql);
        oci_bind_by_name($res, ':brand_code', $edit_brand_code);
        oci_bind_by_name($res, ':model_name', $edit_model_name);
        oci_bind_by_name($res, ':model_code', $model_code);
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