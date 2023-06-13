<?php 
    require "../../config/connection.php";

    header("Content-Type:application/json");
   
    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if (isset($_POST['add_type']) and !isset($_POST['req_grp']) and !isset($_POST['add_ass_name'])){
        $name = $_POST ['name'];
        $add_type = $_POST['add_type'];
        $add_req_grp = $_POST['add_req_grp'];
    
        $sql2 = "SELECT MAX (REQ_TYPE_ID) FROM IT_ASSET_REQ_TYPE";
        $stmt = oci_parse(connection(), $sql2);
        oci_execute($stmt);
        $row = oci_fetch_row($stmt);
        $row[0]++;
    
        $sql = "INSERT INTO IT_ASSET_REQ_TYPE (REQ_TYPE_ID, REQ_GRP_ID, REQ_TYPE_NAME, USER_CREATE, USER_CREATED_DATE) 
        VALUES (:req_type_id, :req_group_id, :req_type_name, :user_created, to_date(:user_created_date, 'DD/MM/YY HH:MI:SSam'))";
    
        $res= oci_parse(connection(), $sql);
    
        oci_bind_by_name($res, ':req_type_id', $row[0]);
        oci_bind_by_name($res, ':req_group_id', $add_req_grp);
        oci_bind_by_name($res, ':req_type_name', $add_type);
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