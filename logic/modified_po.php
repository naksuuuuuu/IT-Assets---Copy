<?php
header('Content-Type: application/json');

require "../config/connection.php";

date_default_timezone_set('Asia/Manila');
$date = date('d/m/Y h:i:s a');

if(isset($_POST['doc_no'])){
    $doc_no = $_POST['doc_no'];
    $name = $_POST['name'];
    $ser_no  = $_POST['ser_no'];
    $ass_code = $_POST['ass_code'];
    $del_note = $_POST['del_note'];
    $remarks = $_POST['remarks'];
    
        $sql = "UPDATE IT_ASSET_DETAILS SET SERIAL_NO = :ser_no, ASS_CODE = :ass_code, DEL_NOTE = :del_note,
        REMARKS = :remarks, LAST_USER_UPDATE = :username, LAST_USER_UPDATED_DATE = to_date(:update_date, 'DD/MM/YY HH:MI:SS am') 
        WHERE DOCUMENT_NO = :doc_no";
        $res = oci_parse(connection(), $sql);
        oci_bind_by_name($res, ':username', $name);
        oci_bind_by_name($res, ':update_date', $date);
        oci_bind_by_name($res, ':doc_no', $doc_no);
        oci_bind_by_name($res, ':ser_no', $ser_no);
        oci_bind_by_name($res, ':ass_code', $ass_code);
        oci_bind_by_name($res, ':del_note', $del_note);
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
