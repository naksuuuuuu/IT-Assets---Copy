<?php 
    require "../../config/connection.php";

    header("Content-Type:application/json");
   
    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if (isset($_POST['ass_group'])){
        $name = $_POST ['name'];
        $sub_ass_grp = $_POST['sub_ass_grp'];
        $ass_group = $_POST['ass_group'];
    
        $sql2 = "SELECT  MAX (ASSET_SUB_GRP_CODE) FROM IT_ASSET_SUB_GROUP";
        $stmt = oci_parse(connection(), $sql2);
        oci_execute($stmt);
        $row = oci_fetch_row($stmt);
        $row[0]++;
    
        $sql = "INSERT INTO IT_ASSET_SUB_GROUP (ASSET_SUB_GRP_CODE, ASSET_GRP_CODE, ASSET_SUB_GRP_NAME, USER_CREATE, USER_CREATED_DATE) 
        VALUES (:ass_sub_grp_code, :ass_grp_code, :ass_sub_grp_name, :user_created, to_date(:user_created_date, 'DD/MM/YY HH:MI:SSam'))";
    
        $res= oci_parse(connection(), $sql);
    
        oci_bind_by_name($res, ':ass_sub_grp_code', $row[0]);
        oci_bind_by_name($res, ':ass_sub_grp_name', $sub_ass_grp);
        oci_bind_by_name($res, ':ass_grp_code', $ass_group);
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