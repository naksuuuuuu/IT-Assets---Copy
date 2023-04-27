<?php
header('Content-Type: application/json');

require "../config/connection.php";

date_default_timezone_set('Asia/Manila');
$date = date('d/m/Y h:i:s a');

if(isset($_POST['doc_no'])){
    $doc_no = $_POST['doc_no'];
    $name = $_POST['name'];
    
    $update_query = "UPDATE IT_ASSET_HEADER SET CANCEL_ASSET_FLAG = 'Y', LAST_USER_UPDATE = :username, 
        LAST_USER_UPDATED_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am') WHERE DOCUMENT_NO = :doc_no";

        $update_result = oci_parse(connection(), $update_query);
        oci_bind_by_name($update_result, ':username', $name);
        oci_bind_by_name($update_result, ':update_date', $date);
        oci_bind_by_name($update_result, ':doc_no', $doc_no);

    if (oci_execute($update_result, OCI_NO_AUTO_COMMIT)) {
        $sql = "UPDATE IT_ASSET_DETAILS SET CANCEL_ASSET_FLAG = 'Y', LAST_USER_UPDATE = :username, 
        LAST_USER_UPDATED_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am') WHERE DOCUMENT_NO = :doc_no";
        $res = oci_parse(connection(), $sql);
        oci_bind_by_name($res, ':username', $name);
        oci_bind_by_name($res, ':update_date', $date);
        oci_bind_by_name($res, ':doc_no', $doc_no);

        if (oci_execute($res, OCI_NO_AUTO_COMMIT)) {
            oci_commit(connection());
            echo json_encode(array('success' => 1, 'message' => "CANCEL FLAG set", 'icon' => "success"));
        }
        else {
            oci_rollback(connection());
            echo json_encode(array('success' => 0, 'message' => "ERROR updating CANCEL FLAG", 'icon' => "error"));
        }
    } 
    else {
        oci_rollback(connection());
        echo json_encode(array('success' => 0, 'message' => "ERROR updating CANCEL FLAG", 'icon' => "error"));
    }
}

?>
