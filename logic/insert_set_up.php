<?php 
 require "../config/connection.php";

 header("Content-Type:application/json");

 date_default_timezone_set('Asia/Manila');
 $date = date('d/m/Y h:i:s a');

 if(isset($_POST['req_grp'])){
        $name = $_POST['name'];
        $req_grp=$_POST['req_grp'];
        
        $sql2 = "SELECT MAX(REQ_GROUP_ID) FROM IT_ASSET_REQ_GROUP";
        $stmt = oci_parse(connection(), $sql2);
        oci_execute($stmt);
        $row = oci_fetch_row($stmt);
        $row[0]++;

        $sql = "INSERT INTO IT_ASSET_REQ_GROUP (REQ_GROUP_ID, REQ_GROUP_NAME, USER_CREATED, USER_CREATED_DATE,  STATUS) 
        VALUES (:req_id, :req_grp, :user_created, to_date(:user_created_date, 'DD/MM/YY HH:MI:SSam'), 'A')";
        $res = oci_parse(connection(), $sql);

        oci_bind_by_name($res, ':req_id', $row[0]);
        oci_bind_by_name($res, ':req_grp', $req_grp);
        oci_bind_by_name($res, ':user_created',$name);
        oci_bind_by_name($res, ':user_created_date', $date);
        
        if(oci_execute($res)){
            echo json_encode(array("statusCode"=>200));
        }
        else{
            echo json_encode(array("statusCode"=>201));
        }
        oci_free_statement($stmt);
        oci_free_statement($res);
        oci_close(connection());
}

else if (isset($_POST['type'])){
    $name = $_POST ['name'];
    $type = $_POST['type'];
    $req_group = $_POST['req_group'];

    $sql2 = "SELECT MAX (REQ_TYPE_ID) FROM IT_ASSET_REQ_TYPE";
    $stmt = oci_parse(connection(), $sql2);
    oci_execute($stmt);
    $row = oci_fetch_row($stmt);
    $row[0]++;

    $sql = "INSERT INTO IT_ASSET_REQ_TYPE (REQ_TYPE_ID, REQ_GROUP_ID, REQ_TYPE_NAME, USER_CREATED, USER_CREATED_DATE, STATUS) 
    VALUES (:req_type_id, :req_group_id, :req_type_name, :user_created, to_date(:user_created_date, 'DD/MM/YY HH:MI:SSam'), 'A')";

    $res= oci_parse(connection(), $sql);

    oci_bind_by_name($res, ':req_type_id', $row[0]);
    oci_bind_by_name($res, ':req_group_id', $req_group);
    oci_bind_by_name($res, ':req_type_name', $type);
    oci_bind_by_name($res, ':user_created', $name);
    oci_bind_by_name($res, ':user_created_date', $date);

    if(oci_execute($res)){
        echo json_encode(array("statusCode"=>200));
    }
    else{
        echo json_encode(array("statusCode"=>201));
    }
    oci_free_statement($stmt);
    oci_free_statement($res);
    oci_close(connection());
}

else if (isset($_POST['ass_grp'])){
    $name = $_POST ['name'];
    $type1 = $_POST['type1'];
    $ass_grp = $_POST['ass_grp'];

    $sql2 = "SELECT  MAX (ASSET_GROUP_CODE) FROM IT_ASSET_GROUP";
    $stmt = oci_parse(connection(), $sql2);
    oci_execute($stmt);
    $row = oci_fetch_row($stmt);
    $row[0]++;

    $sql = "INSERT INTO IT_ASSET_GROUP (ASSET_GROUP_CODE, REQ_TYPE_ID, ASSET_GROUP_NAME, USER_CREATED, USER_CREATED_DATE, ACTIVE_FLAG) 
    VALUES (:ass_grp_code, :req_type_id, :ass_grp_name, :user_created, to_date(:user_created_date, 'DD/MM/YY HH:MI:SSam'), 'A')";

    $res= oci_parse(connection(), $sql);

    oci_bind_by_name($res, ':ass_grp_code', $row[0]);
    oci_bind_by_name($res, ':req_type_id', $type1);
    oci_bind_by_name($res, ':ass_grp_name', $ass_grp);
    oci_bind_by_name($res, ':user_created', $name);
    oci_bind_by_name($res, ':user_created_date', $date);

    if(oci_execute($res)){
        echo json_encode(array("statusCode"=>200));
    }
    else{
        echo json_encode(array("statusCode"=>201));
    }
    oci_free_statement($stmt);
    oci_free_statement($res);
    oci_close(connection());
}

else if (isset($_POST['sub_ass_grp'])){
    $name = $_POST ['name'];
    $ass_group = $_POST['ass_group'];
    $ass_flg = $_POST['ass_flg'];
    $sub_ass_grp = $_POST['sub_ass_grp'];

    $sql2 = "SELECT  MAX (ASSET_SUB_GROUP_CODE) FROM IT_ASSET_SUB_GROUP";
    $stmt = oci_parse(connection(), $sql2);
    oci_execute($stmt);
    $row = oci_fetch_row($stmt);
    $row[0]++;

    $sql = "INSERT INTO IT_ASSET_SUB_GROUP (ASSET_SUB_GROUP_CODE, ASSET_GROUP_CODE, ASSET_SUB_GROUP_NAME, ASSET_FLAG, USER_CREATED, USER_CREATED_DATE) 
    VALUES (:ass_sub_grp_code, :ass_grp_code, :ass_sub_grp_name, :asset_flag, :user_created, to_date(:user_created_date, 'DD/MM/YY HH:MI:SSam'))";

    $res= oci_parse(connection(), $sql);

    oci_bind_by_name($res, ':ass_sub_grp_code', $row[0]);
    oci_bind_by_name($res, ':ass_grp_code', $ass_group);
    oci_bind_by_name($res, ':ass_sub_grp_name', $sub_ass_grp);
    oci_bind_by_name($res, ':asset_flag', $ass_flg);
    oci_bind_by_name($res, ':user_created', $name);
    oci_bind_by_name($res, ':user_created_date', $date);

    if(oci_execute($res)){
        echo json_encode(array("statusCode"=>200));
    }
    else{
        echo json_encode(array("statusCode"=>201));
    }
    oci_free_statement($stmt);
    oci_free_statement($res);
    oci_close(connection());
}

else if (isset($_POST['brand'])){
    $name = $_POST ['name'];
    $sub_grp = $_POST['sub_grp'];
    $brand = $_POST['brand'];

    $sql2 = "SELECT  MAX (BRAND_CODE) FROM IT_ASSET_BRAND";
    $stmt = oci_parse(connection(), $sql2);
    oci_execute($stmt);
    $row = oci_fetch_row($stmt);
    $row[0]++;

    $sql = "INSERT INTO IT_ASSET_BRAND (BRAND_CODE, ASSET_SUB_GROUP_CODE, BRAND_NAME, USER_CREATED, USER_CREATED_DATE) 
    VALUES (:brand_code, :ass_sub_grp_code, :brand_name, :user_created, to_date(:user_created_date, 'DD/MM/YY HH:MI:SSam'))";

    $res= oci_parse(connection(), $sql);

    oci_bind_by_name($res, ':brand_code', $row[0]);
    oci_bind_by_name($res, ':ass_sub_grp_code', $sub_grp);
    oci_bind_by_name($res, ':brand_name', $brand);
    oci_bind_by_name($res, ':user_created', $name);
    oci_bind_by_name($res, ':user_created_date', $date);

    if(oci_execute($res)){
        echo json_encode(array("statusCode"=>200));
    }
    else{
        echo json_encode(array("statusCode"=>201));
    }
    oci_free_statement($stmt);
    oci_free_statement($res);
    oci_close(connection());
}

else if (isset($_POST['model'])){
    $name = $_POST ['name'];
    $brand1 = $_POST['brand1'];
    $model = $_POST['model'];

    $sql2 = "SELECT  MAX (MODEL_CODE) FROM IT_ASSET_MODEL";
    $stmt = oci_parse(connection(), $sql2);
    oci_execute($stmt);
    $row = oci_fetch_row($stmt);
    $row[0]++;

    $sql = "INSERT INTO IT_ASSET_MODEL (MODEL_CODE, BRAND_CODE, MODEL, USER_CREATED, USER_CREATED_DATE) 
    VALUES (:model_code, :brand1_code, :model, :user_created, to_date(:user_created_date, 'DD/MM/YY HH:MI:SSam'))";

    $res= oci_parse(connection(), $sql);

    oci_bind_by_name($res, ':model_code', $row[0]);
    oci_bind_by_name($res, ':brand1_code', $brand1);
    oci_bind_by_name($res, ':model', $model);
    oci_bind_by_name($res, ':user_created', $name);
    oci_bind_by_name($res, ':user_created_date', $date);

    if(oci_execute($res)){
        echo json_encode(array("statusCode"=>200));
    }
    else{
        echo json_encode(array("statusCode"=>201));
    }
    oci_free_statement($stmt);
    oci_free_statement($res);
    oci_close(connection());
}

?>