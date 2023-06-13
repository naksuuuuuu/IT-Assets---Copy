<?php
    header('Content-Type: application/json');

    require "../config/connection.php";

    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if(isset($_POST['po_no'])){
        $po_no = $_POST['po_no'];
        $po_item = $_POST['po_item'];
        $req_grp = $_POST['req_grp'];
        $type = $_POST['type'];
        $asset_group = $_POST['asset_group'];
        $asset_sub_group = $_POST['asset_sub_group'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $series = $_POST['series'];
        $name = $_POST['name'];
        $ser_no1  = $_POST['ser_no1'];
        $ass_code = $_POST['ass_code'];
        $del_note = $_POST['del_note'];
        $license_start = date_format(date_create($_POST['license_start']), 'd/m/Y');
        $license_month = $_POST['license_month'];
        $license_exp = date_format(date_create($_POST['license_exp']), 'd/m/Y');
        $war_start = date_format(date_create($_POST['war_start']), 'd/m/Y');
        $war_month = $_POST['war_month'];
        $war_exp = date_format(date_create($_POST['war_exp']), 'd/m/Y');
        $empl_name = $_POST['empl_name'];
        $remarks = $_POST['remarks'];
        
            $sql = "UPDATE IT_ASSET_DETAILS SET REQ_GRP_ID = :req_grp, REQ_TYPE_ID = :type, ASSET_GRP_CODE = :asset_group, 
            ASSET_SUB_GRP_CODE = :asset_sub_group, BRAND_CODE = :brand, MODEL_CODE = :model,
            SERIAL_NO1 = :ser_no1, ASS_CODE = :ass_code, DEL_NOTE = :del_note,
            LICENSE_START_DATE = to_date(:license_start, 'DD/MM/YY'), LICENSE_MONTH = :license_month, 
            LICENSE_EXPIRE_DATE = to_date(:license_exp, 'DD/MM/YY'),
            WARRANTY_START_DATE = to_date(:war_start, 'DD/MM/YY'), WARRANTY_MONTH = :war_month, 
            WARRANTY_EXPIRE_DATE = to_date(:war_exp, 'DD/MM/YY'), REMARKS = :remarks, LAST_USER_UPDATE = :username, 
            LAST_USER_UPDATE_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am'), SERIES = :series, EMPL_ID = :empl_name
            WHERE PO_NO = :po_no AND PO_ITEM = :po_item";
            $res = oci_parse(connection(), $sql);
            oci_bind_by_name($res, ':username', $name);
            oci_bind_by_name($res, ':update_date', $date);
            oci_bind_by_name($res, ':po_no', $po_no);
            oci_bind_by_name($res, ':po_item', $po_item);
            oci_bind_by_name($res, ':req_grp', $req_grp);
            oci_bind_by_name($res, ':type', $type);
            oci_bind_by_name($res, ':asset_group', $asset_group);
            oci_bind_by_name($res, ':asset_sub_group', $asset_sub_group);
            oci_bind_by_name($res, ':brand', $brand);
            oci_bind_by_name($res, ':model', $model);
            oci_bind_by_name($res, ':series', $series);
            oci_bind_by_name($res, ':ser_no1', $ser_no1);
            oci_bind_by_name($res, ':ass_code', $ass_code);
            oci_bind_by_name($res, ':del_note', $del_note);
            oci_bind_by_name($res, ':license_start', $license_start);
            oci_bind_by_name($res, ':license_month', $license_month);
            oci_bind_by_name($res, ':license_exp', $license_exp);
            oci_bind_by_name($res, ':war_start', $war_start);
            oci_bind_by_name($res, ':war_month', $war_month);
            oci_bind_by_name($res, ':war_exp', $war_exp);
            oci_bind_by_name($res, ':remarks', $remarks);
            oci_bind_by_name($res, ':empl_name', $empl_name);

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
