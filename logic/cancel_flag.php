<?php
header('Content-Type: application/json');

require "../config/connection.php";

date_default_timezone_set('Asia/Manila');
$date = date('d/m/Y h:i:s a');

if(isset($_POST['po_no'])){
    $po_no = $_POST['po_no'];
    $po_item = $_POST['po_item'];
    $name = $_POST['name'];
    $reason = $_POST['reason'];
    
    // $update_query = "UPDATE IT_ASSET_HEADER1 SET CANCEL_ASSET_FLAG = 'Y', CANCEL_REASON = :reason, USER_CANCEL = :username, 
    //     CANCEL_DATE = to_date(:cancel_date, 'DD/MM/YY HH:MI:SS am') WHERE PO_NUMBER = :po_no";
    //     $update_result = oci_parse(connection(), $update_query);
    //     oci_bind_by_name($update_result, ':reason', $reason);
    //     oci_bind_by_name($update_result, ':username', $name);
    //     oci_bind_by_name($update_result, ':cancel_date', $date);
    //     oci_bind_by_name($update_result, ':po_no', $po_no);

    // if (oci_execute($update_result, OCI_NO_AUTO_COMMIT)) {
        $sql = "UPDATE IT_ASSET_DETAILS SET CANCEL_ASSET_FLAG = 'Y', CANCEL_REASON = :reason, USER_CANCEL = :username, 
        CANCEL_DATE = to_date(:cancel_date, 'DD/MM/YY HH:MI:SS am') WHERE PO_NO = :po_no AND PO_ITEM = : po_item";
        $res = oci_parse(connection(), $sql);
        oci_bind_by_name($res, ':reason', $reason);
        oci_bind_by_name($res, ':username', $name);
        oci_bind_by_name($res, ':cancel_date', $date);
        oci_bind_by_name($res, ':po_no', $po_no);
        oci_bind_by_name($res, ':po_item', $po_item);

        if (oci_execute($res, OCI_NO_AUTO_COMMIT)) {
            oci_commit(connection());
            echo json_encode(array('success' => 1, 'message' => "CANCEL FLAG set", 'icon' => "success"));
        }
        else {
            oci_rollback(connection());
            echo json_encode(array('success' => 0, 'message' => "ERROR updating CANCEL FLAG", 'icon' => "error"));
        }
    // } 
    // else {
    //     oci_rollback(connection());
    //     echo json_encode(array('success' => 0, 'message' => "ERROR updating CANCEL FLAG", 'icon' => "error"));
    // }
}

?>
