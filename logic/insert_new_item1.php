<?php 
// echo var_dump($_POST)
    header('Content-Type: application/json');

    require "../config/connection.php";

    date_default_timezone_set('Asia/Manila');
    $doc_date = date('d/m/Y');
    $date = date('d/m/Y h:i:s a');

    $username = $_POST['username'];
    $emp_id = $_POST['emp_id'];
    $po_num = $_POST['po_num'];
    $supp1 = $_POST['supp1'];
    $req_grp1 = $_POST['req_grp1'];
    $req_type1 = $_POST['req_type1'];
    $ass_grp1 = $_POST['ass_grp1'];
    $ass_sub_grp1 = $_POST['ass_sub_grp1'];
    $brand1 = $_POST['brand1'];
    $model1 = $_POST['model1'];
    $series = $_POST['series'];
    $unit_price = $_POST['unit_price'];
    $ser_no1 = $_POST['ser_no1'];
    $ser_no2 = $_POST['ser_no2'];
    $ser_no3 = $_POST['ser_no3'];
    $ser_no4 = $_POST['ser_no4'];
    $ass_code = $_POST['ass_code'];
    $del_note = $_POST['del_note'];
    $del_date = date_format(date_create($_POST['del_date']), 'd/m/Y');
    $mtrl_short = $_POST['mtrl_short'];
    if($_POST['lic_start'] == ""){
        $lic_start = "";
    }
    else{
        $lic_start = date_format(date_create($_POST['lic_start']), 'd/m/Y');
    }
    $lic_month = $_POST['lic_month'];

    if($_POST['lic_exp'] == ""){
        $lic_exp = "";
    }
    else{
        $lic_exp = date_format(date_create($_POST['lic_exp']), 'd/m/Y');
    }
    $war_start = date_format(date_create($_POST['war_start']), 'd/m/Y');
    $war_month = $_POST['war_month'];
    $war_exp = date_format(date_create($_POST['war_exp']), 'd/m/Y');
    $ass_flagT = $_POST['ass_flagT'];
    $rem = $_POST['rem'];
    $po_doc_date1 = date_format(date_create($_POST['po_doc_date1']), 'd/m/Y');
    $plant1 = $_POST['plant1'];
    $status = $_POST['status'];
    $qty = $_POST['qty'];
    $unit = $_POST['unit'];
    $po_item1 = $_POST['po_item1'];
    $count = 0;
    
    // if(isset($_POST['image']['name'])){
        // $maxDoc = "SELECT max(DOC_NO) from IT_ASSET_HEADER";
        // $stmt1 = oci_parse(connection(), $maxDoc);
        // oci_execute($stmt1);
        // $row = oci_fetch_row($stmt1);
        // if ($row[0] == '') {
        //     $doc_no = date('y')."AS0001";
        // }
        // else{
        //     $doc_no = $row[0];
        //     $doc_no++;
        // }

        // ----------
        // $maxDoc = "SELECT MAX(DOC_NO) FROM IT_ASSET_HEADER";
        // $stmt = oci_parse(connection(), $maxDoc);
        // oci_execute($stmt);
        // $row = oci_fetch_row($stmt);

        // if ($row[0] == '') {
        //     $lastDocNo = 'AS0000';
        // } else {
        //     $lastDocNo = $row[0];
        // }

        // $numericPart = intval(substr($lastDocNo, 4));
        // $newNumericPart = str_pad(($numericPart + 1), 4, '0', STR_PAD_LEFT);
        // $doc_no = 'AS' . $newNumericPart;        

        // ------------
        // $maxDoc = "SELECT MAX(DOC_NO) FROM IT_ASSET_HEADER";
        // $stmt1 = oci_parse(connection(), $maxDoc);
        // oci_execute($stmt1);
        // $row = oci_fetch_row($stmt1);

        // if ($row[0] == '') {
        //     $lastDocNo = date('y') . 'AS0000';
        // } else {
        //     $lastDocNo = $row[0];
        // }

        // $currentYear = date('y');
        // $lastYear = substr($lastDocNo, 0, 2);
        // $numericPart = intval(substr($lastDocNo, 4));

        // if ($currentYear == $lastYear) {
        //     $newNumericPart = str_pad(($numericPart + 1), 4, '0', STR_PAD_LEFT);
        // } else {
        //     $newNumericPart = 'AS0001';
        // }
        // $doc_no = $currentYear . 'AS' . $newNumericPart;

        // ------------
        // $currentYear = date('y');

        // $maxDoc = "SELECT MAX(DOC_NO) FROM IT_ASSET_HEADER WHERE SUBSTR(DOC_NO, 1, 2) = :current_year";
        // $stmt1 = oci_parse(connection(), $maxDoc);
        // oci_bind_by_name($stmt1, ':current_year', $currentYear);
        // oci_execute($stmt1);
        // $row = oci_fetch_row($stmt1);

        // if ($row[0] == '') {
        //     $lastNumericPart = '0000';
        // } else {
        //     $lastDocNo = $row[0];
        //     $lastNumericPart = intval(substr($lastDocNo, 4));
        // }

        // $newNumericPart = str_pad(($lastNumericPart + 1), 4, '0', STR_PAD_LEFT);
        // $doc_no = $currentYear . 'AS' . $newNumericPart;

        // __________
        $currentYear = date('y');
        $maxDoc = "SELECT max(DOC_NO) from IT_ASSET_HEADER";
        $stmt1 = oci_parse(connection(), $maxDoc);
        oci_execute($stmt1);
        $row = oci_fetch_row($stmt1);

        if ($row[0] == '') {
            $doc_no = date('y')."AS0001";
        } else {
            $doc_no = $row[0];
            $doc_no = substr($doc_no, -4);
            $doc_no = (int)$doc_no;
            $doc_no++;
            $doc_no = $currentYear."AS".str_pad($doc_no, 4, '0', STR_PAD_LEFT);
        }

        $sql = "INSERT INTO IT_ASSET_HEADER
        (DOC_NO, DOC_DATE, PO_DOC_DATE, PO_NO, VENDOR_CODE, PLANT_CODE, 
        TOTAL_AMOUNT, STATUS,  USER_CREATE, USER_CREATED_DATE) 
        VALUES 
        (:doc_no, to_date(:doc_date, 'DD/MM/YY'), to_date(:po_doc_date, 'DD/MM/YY'), :po_no, :supplier, :plant, 
        :amt, :status, :user_created, to_date(:user_date, 'DD/MM/YY HH:MI:SS am'))";
        $res= oci_parse(connection(), $sql);

        oci_bind_by_name($res, ':doc_no', $doc_no);
        oci_bind_by_name($res, ':doc_date', $doc_date);
        oci_bind_by_name($res, ':po_doc_date', $po_doc_date1);
        oci_bind_by_name($res, ':po_no', $po_num);
        oci_bind_by_name($res, ':supplier', $supp1);
        oci_bind_by_name($res, ':plant', $plant1);
        oci_bind_by_name($res, ':amt', $unit_price);
        oci_bind_by_name($res, ':status', $status);
        oci_bind_by_name($res, ':user_created', $username);
        oci_bind_by_name($res, ':user_date', $date);
        
        // DETAILS
        if(oci_execute($res,OCI_NO_AUTO_COMMIT)){
            oci_commit(connection());
            
            $ass_id_sql = "SELECT max(ASSET_ID) from IT_ASSET_DETAILS";
            $stmt = oci_parse(connection(), $ass_id_sql);
            oci_execute($stmt);
            $ass_row = oci_fetch_row($stmt);
            if ($ass_row[0] == '') {
                $ass_id = date('y')."AID0001";
            }
            else{
                $ass_id = $ass_row[0];
                $ass_id++;
            }

            // $ass_id_sql = "SELECT max(ASSET_ID) from IT_ASSET_DETAILS";
            // $stmt = oci_parse(connection(), $ass_id_sql);
            // oci_execute($stmt);
            // $ass_row = oci_fetch_row($stmt);
            // if ($ass_row[0] == '') {
            //     $ass_id = date('y')."AID0001";
            // } else {
            //     $ass_id = $ass_row[0];
            //     $ass_id = intval(substr($ass_id, 3)); // Extract the numeric part
            //     $ass_id++; // Increment the numeric part
            //     $ass_id = date('y')."AID".str_pad($ass_id, 4, '0', STR_PAD_LEFT); // Concatenate the parts
            // }
            
            $det_sql = "INSERT INTO IT_ASSET_DETAILS
            (DOC_NO, DOC_DATE, PO_NO, PO_ITEM, DEL_DATE, REQ_GRP_ID, REQ_TYPE_ID, ASSET_GRP_CODE, 
            ASSET_SUB_GRP_CODE, BRAND_CODE, MODEL_CODE, SERIES, SERIAL_NO1, SERIAL_NO2, SERIAL_NO3, SERIAL_NO4, ASS_CODE, UNIT,
            QTY, UNIT_PRICE, ASSET_ID, ASSET_FLAG, LICENSE_START_DATE, LICENSE_MONTH, LICENSE_EXPIRE_DATE, 
            WARRANTY_START_DATE, WARRANTY_MONTH, WARRANTY_EXPIRE_DATE, DEL_NOTE, MTRL_SHORT, REMARKS,
            EMPL_ID, USER_CREATE, USER_CREATED_DATE)
            VALUES 
            (:doc_no, to_date(:doc_date, 'DD/MM/YY'), :po_no, :po_item, to_date(:del_date, 'DD/MM/YY'), :req_grp1, :req_type1, :ass_grp1, 
            :ass_sub_grp1, :brand1, :model1, :series, :serial_no1, :serial_no2, :serial_no3, :serial_no4, :ass_code, :unit, 
            :qty, :unit_price, :ass_id, :ass_flag, to_date(:lic_start, 'DD/MM/YY'), :lic_month, to_date(:lic_exp, 'DD/MM/YY'), 
            to_date(:war_start, 'DD/MM/YY'), :war_month, to_date(:war_exp, 'DD/MM/YY'), :del_note, :mtrl_short, :rem,
            :emp_id, :username, to_date(:user_date, 'DD/MM/YY HH:MI:SS am'))";

            $result= oci_parse(connection(), $det_sql);

            oci_bind_by_name($result, ':doc_no', $doc_no);
            oci_bind_by_name($result, ':doc_date', $doc_date);
            oci_bind_by_name($result, ':po_no', $po_num);
            oci_bind_by_name($result, ':po_item', $po_item1);
            oci_bind_by_name($result, ':del_date', $del_date);
            oci_bind_by_name($result, ':req_grp1', $req_grp1);
            oci_bind_by_name($result, ':req_type1', $req_type1);
            oci_bind_by_name($result, ':ass_grp1', $ass_grp1);
            oci_bind_by_name($result, ':ass_sub_grp1', $ass_sub_grp1);
            oci_bind_by_name($result, ':brand1', $brand1);
            oci_bind_by_name($result, ':model1', $model1);
            oci_bind_by_name($result, ':series', $series);
            oci_bind_by_name($result, ':serial_no1', $ser_no1);
            oci_bind_by_name($result, ':serial_no2', $ser_no2);
            oci_bind_by_name($result, ':serial_no3', $ser_no3);
            oci_bind_by_name($result, ':serial_no4', $ser_no4);
            oci_bind_by_name($result, ':ass_code', $ass_code);
            oci_bind_by_name($result, ':unit', $unit);
            oci_bind_by_name($result, ':qty', $qty);
            oci_bind_by_name($result, ':unit_price', $unit_price);
            oci_bind_by_name($result, ':ass_id', $ass_id);
            oci_bind_by_name($result, ':ass_flag', $ass_flagT);
            oci_bind_by_name($result, ':lic_start', $lic_start);
            oci_bind_by_name($result, ':lic_month', $lic_month);
            oci_bind_by_name($result, ':lic_exp', $lic_exp);
            oci_bind_by_name($result, ':war_start', $war_start);
            oci_bind_by_name($result, ':war_month', $war_month);
            oci_bind_by_name($result, ':war_exp', $war_exp);
            oci_bind_by_name($result, ':del_note', $del_note);
            oci_bind_by_name($result, ':mtrl_short', $mtrl_short);
            oci_bind_by_name($result, ':rem', $rem);
            oci_bind_by_name($result, ':emp_id', $emp_id);
            oci_bind_by_name($result, ':username', $username);
            oci_bind_by_name($result, ':user_date', $date);
            
            if(oci_execute($result, OCI_NO_AUTO_COMMIT)){
                oci_commit(connection());
                $count++;
                // echo json_encode(array('success' => 1, 'message' => "SAVED", 'icon' => "success"));
            }
            else{
                oci_rollback(connection());
                $count = 0;
                // echo json_encode(array('success' => 0, 'message' => "ERROR", 'icon' => "error"));
            }
            oci_free_statement($result);
    }
    oci_free_statement($res);
    oci_free_statement($stmt1);

    if ($count != 0){
        echo json_encode(array('success' => 1, 'message' => "SUCCESS", 'icon' => "success"));
        exit();
    }
    else{
        echo json_encode(array('success' => 0, 'message' => "ERROR", 'icon' => "error"));
        exit();
    }
// }
?>