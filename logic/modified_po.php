<?php
    header('Content-Type: application/json');

    require "../config/connection.php";

    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');

    if(isset($_POST['po_no'])){
        $po_no = $_POST['po_no'];
        $po_item = $_POST['po_item'];
        $name = $_POST['name'];
        $ser_no1  = $_POST['ser_no1'];
        $ass_code = $_POST['ass_code'];
        $del_note = $_POST['del_note'];
        $war_start = date_format(date_create($_POST['war_start']), 'd/m/Y');
        $war_month = $_POST['war_month'];
        $war_exp = date_format(date_create($_POST['war_exp']), 'd/m/Y');
        $remarks = $_POST['remarks'];
        
            $sql = "UPDATE IT_ASSET_DETAILS1 SET SERIAL_NO1 = :ser_no1, ASS_CODE = :ass_code, DEL_NOTE = :del_note, 
            WARRANTY_START_DATE = to_date(:war_start, 'DD/MM/YY'), WARRANTY_MONTH = :war_month, 
            WARRANTY_EXPIRE_DATE = to_date(:war_exp, 'DD/MM/YY'), REMARKS = :remarks, LAST_USER_UPDATE = :username, 
            LAST_USER_UPDATE_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am') 
            WHERE PO_NUMBER = :po_no AND PO_ITEM = :po_item";
            $res = oci_parse(connection(), $sql);
            oci_bind_by_name($res, ':username', $name);
            oci_bind_by_name($res, ':update_date', $date);
            oci_bind_by_name($res, ':po_no', $po_no);
            oci_bind_by_name($res, ':po_item', $po_item);
            oci_bind_by_name($res, ':ser_no1', $ser_no1);
            oci_bind_by_name($res, ':ass_code', $ass_code);
            oci_bind_by_name($res, ':del_note', $del_note);
            oci_bind_by_name($res, ':war_start', $war_start);
            oci_bind_by_name($res, ':war_month', $war_month);
            oci_bind_by_name($res, ':war_exp', $war_exp);
            oci_bind_by_name($res, ':remarks', $remarks);

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
