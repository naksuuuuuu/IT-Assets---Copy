<?php 

// echo var_dump($_POST);

    header('Content-Type: application/json');

    require "../config/connection.php";

    date_default_timezone_set('Asia/Manila');
    $doc_date = date('d/m/Y');
    $date = date('d/m/Y h:i:s a');

    if(isset($_POST['data'])){
        $po_number = $_POST['po_number'];
        $name = $_POST['name'];
        $po_item = $_POST['po_item'];
        $asset_sub_group = $_POST['asset_sub_group'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $ser_no1 = $_POST['ser_no1'];
        $ser_no2 = $_POST['ser_no2'];
        $ser_no3 = $_POST['ser_no3'];
        $ser_no4 = $_POST['ser_no4'];
        $remarks = $_POST['remarks'];
        $ref_doc_no = $_POST['ref_doc_no'];
        $ass_id = $_POST['ass_id'];
        $emp_id = $_POST['emp_id'];
        $emp_id2 = $_POST['emp_id2'];

        // header
        $maxDoc = "SELECT max(DOCUMENT_NO) from IT_ASSET_TRANSFER_TRN_HDR";
            $stmt = oci_parse(connection(), $maxDoc);
            oci_execute($stmt);
            $row = oci_fetch_row($stmt);
            if ($row[0] == '') {
                $doc_no = date('y')."TR0001";
            }
            else{
                $doc_no = $row[0];
                $doc_no++;
            }

            $sql= "INSERT INTO IT_ASSET_TRANSFER_TRN_HDR 
                (DOCUMENT_NO, PO_NUMBER, PO_ITEM, REF_DOC_NO, TRANSFER_FROM, TRANSFER_TO, TRANSFER_DATE, 
                USER_CREATE, CREATE_DATE)
                VALUES 
                (:doc_no, :po_number, :po_item, :ref_doc_no, :emp_id, :emp_id2, to_date(:trans_date, 'DD/MM/YY HH:MI:SS am'), 
                :user_name, to_date(:user_date, 'DD/MM/YY HH:MI:SS am'))";
            $res = oci_parse(connection(), $sql);
            oci_bind_by_name($res, ':doc_no', $doc_no);
            oci_bind_by_name($res, ':po_number', $po_number);
            oci_bind_by_name($res, ':po_item', $po_item);
            oci_bind_by_name($res, ':ref_doc_no', $ref_doc_no);
            oci_bind_by_name($res, ':emp_id', $emp_id);
            oci_bind_by_name($res, ':emp_id2', $emp_id2);
            oci_bind_by_name($res, ':trans_date', $date);
            oci_bind_by_name($res, ':user_name', $name);
            oci_bind_by_name($res, ':user_date', $date);
            
            // details
            if(oci_execute($res, OCI_NO_AUTO_COMMIT)){
                $doc_num = "SELECT DOCUMENT_NO FROM IT_ASSET_TRANSFER_TRN_HDR WHERE PO_NUMBER = :po_no";
                $res_doc_num = oci_parse(connection(), $doc_num); 
                oci_bind_by_name($res_doc_num, ':po_no', $po_number);
                oci_execute($res_doc_num);
                $row1 = oci_fetch_row($res_doc_num);

                $dtl_sql = "INSERT INTO IT_ASSET_TRANSFER_TRN_DTL 
                    (DOCUMENT_NO, ASSET_ID, ASSET_SUB_GROUP, BRAND_CODE, MODEL_CODE, SERIAL_1, SERIAL_2, SERIAL_3, SERIAL_4,
                    REMARKS, USER_CREATE, CREATE_DATE)
                    VALUES
                    (:doc_no, :ass_id, :ass_sub_grp, :brand, :model, :ser_no1, :ser_no2, :ser_no3, :ser_no4,
                    :remarks, :user_name, to_date(:user_date, 'DD/MM/YY HH:MI:SS am'))";
                $res_dtl = oci_parse(connection(), $dtl_sql);
                oci_bind_by_name($res_dtl, ':doc_no', $row1[0]);
                oci_bind_by_name($res_dtl, ':ass_id', $ass_id);
                oci_bind_by_name($res_dtl, ':ass_sub_grp', $asset_sub_group);
                oci_bind_by_name($res_dtl, ':brand', $brand);
                oci_bind_by_name($res_dtl, ':model', $model);
                oci_bind_by_name($res_dtl, ':ser_no1', $ser_no1);
                oci_bind_by_name($res_dtl, ':ser_no2', $ser_no2);
                oci_bind_by_name($res_dtl, ':ser_no3', $ser_no3);
                oci_bind_by_name($res_dtl, ':ser_no4', $ser_no4);
                oci_bind_by_name($res_dtl, ':remarks', $remarks);
                oci_bind_by_name($res_dtl, ':user_name', $name);
                oci_bind_by_name($res_dtl, ':user_date', $date);

                if(oci_execute($res_dtl, OCI_NO_AUTO_COMMIT)){

                    oci_commit(connection());
                   
                    echo json_encode(array('success' => 1, 'message' => "SAVED", 'icon' => "success"));
                }
                else{
                    oci_rollback(connection());
                    
                    echo json_encode(array('success' => 0, 'message' => "ERROR", 'icon' => "error"));
                }
                oci_free_statement($res_dtl);
            }
            oci_free_statement($res);
    }
    else{
        oci_rollback(connection());
        echo json_encode(array('success' => 0, 'message' => "ERROR", 'icon' => "error"));
    }

?>