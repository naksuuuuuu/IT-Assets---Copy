<?php 
    header('Content-Type: application/json');

    require "../config/connection.php";

    date_default_timezone_set('Asia/Manila');
    $date = date('d/m/Y h:i:s a');
    $username = $_POST['username'];
    $po_noM = $_POST['po_noM'];
    $po_itemM = $_POST['po_itemM'];
    $doc_noM = $_POST['doc_noM'];
    $count = 0;
    if(isset($_FILES['image']['name'])){
        foreach($_FILES['image']['name'] as $key => $value){
            $file_name = $_FILES['image']['name'][$key];
            $file_size = $_FILES['image']['size'][$key];
            $file_tmp = $_FILES['image']['tmp_name'][$key];
            $file_type = $_FILES['image']['type'][$key];
            $file_text = explode('.', $file_name);

            $attch_sql = "INSERT INTO IT_ASSET_ATTACHMENT
            (DOC_NO, PO_NO, PO_ITEM, ATTACHMENT, USER_CREATE, USER_CREATED_DATE)
            VALUES
            (:doc_no, :po_no, :po_item, :attch, :user_creates, to_date(:user_date, 'DD/MM/YY HH:MI:SS am'))";
            $attch_res = oci_parse(connection(), $attch_sql);

            oci_bind_by_name($attch_res, ':doc_no', $doc_noM);
            oci_bind_by_name($attch_res, ':po_no', $po_noM);
            oci_bind_by_name($attch_res, ':po_item', $po_itemM);
            oci_bind_by_name($attch_res, ':attch', $file_name);
            oci_bind_by_name($attch_res, ':user_creates', $username);
            oci_bind_by_name($attch_res, ':user_date', $date);  
            
            if(oci_execute($attch_res, OCI_NO_AUTO_COMMIT)){
                oci_commit(connection());
                $count++;
            }
            else{
                oci_rollback(connection());
                $count = 0;
            }
            oci_free_statement($attch_res);

            $uploadPath = '../pages/user/uploads/'.$file_name;
            if(move_uploaded_file($file_tmp, $uploadPath)){
                $count++;
            }
            else{
                $count = 0;
                unlink('../pages/user/uploads/'.$file_name);
                exit(0);
            }
        }//foreach end

        if ($count != 0){
            echo json_encode(array('success' => 1, 'message' => "SUCCESS", 'icon' => "success"));
            // oci_close(connection());
        }
        else{
            echo json_encode(array('success' => 0, 'message' => "ERROR", 'icon' => "error"));
            // oci_close(connection());
        }
    }
?>
