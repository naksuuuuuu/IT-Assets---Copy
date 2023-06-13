<?php 
    require "../../config/connection.php";

    header("Content-Type:application/json");
   
    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if (isset($_POST['add_brand'])){
        $name = $_POST ['name'];
        $add_model = $_POST['add_model'];
        $add_brand = $_POST['add_brand'];
    
        $sql2 = "SELECT  MAX (MODEL_CODE) FROM IT_ASSET_MODEL";
        $stmt = oci_parse(connection(), $sql2);
        oci_execute($stmt);
        $row = oci_fetch_row($stmt);
        $row[0]++;
    
        $sql = "INSERT INTO IT_ASSET_MODEL (MODEL_CODE, BRAND_CODE, MODEL_NAME, USER_CREATE, USER_CREATED_DATE) 
        VALUES (:model_code, :brand_code, :model_name, :user_created, to_date(:user_created_date, 'DD/MM/YY HH:MI:SSam'))";
    
        $res= oci_parse(connection(), $sql);
    
        oci_bind_by_name($res, ':model_code', $row[0]);
        oci_bind_by_name($res, ':model_name', $add_model);
        oci_bind_by_name($res, ':brand_code', $add_brand);
        oci_bind_by_name($res, ':user_created', $name);
        oci_bind_by_name($res, ':user_created_date', $date);
    
        if(oci_execute($res)){
            echo json_encode(array('success' => 1, 'message' => "SUCCESS", 'icon' => "success"));
        }
        else{
            echo json_encode(array('success' => 0, 'message' => "ERROR", 'icon' => "error"));
        }
        oci_free_statement($stmt);
        oci_free_statement($res);
        oci_close(connection());
    }


?>