<?php
// echo var_dump($_POST);

header('Content-Type: application/json');

require "../config/connection.php";

date_default_timezone_set('Asia/Manila');
$doc_date = date('d/m/Y');

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = date('d/m/Y h:i:s a');

    if (isset($_POST['data'])){
        $image_data = $_POST['image']; 
        $decoded_image = base64_decode($image_data);
        // Generate a unique file name
        $file_name = uniqid() . '.png';
        // Save the image data to a file
        $file_path = '../pages/user/uploads/' . $file_name;
        file_put_contents($file_path, $decoded_image);

            $name = $_POST['name'];
            $department = $_POST['department'];
            // $empl_name = $_POST['empl_name'];
            $emp_id = $_POST['emp_id'];
            $emp_add = $_POST['emp_add'];
            $work_loc = $_POST['work_loc'];
            $off_phone = $_POST['off_phone'];
            $mob_phone = $_POST['mob_phone'];
            $hired_date = date_format(date_create($_POST['hired_date']), 'd/m/Y');
            $per_email = $_POST['per_email'];
            $bus_email = $_POST['bus_email'];
            $ref_person = $_POST['ref_person'];
            // $po_name = $_POST['po_name'];
            $po_no = $_POST['po_no'];
            $po_doc_date = $_POST['po_doc_date'];
            $plant = $_POST['plant'];
            $status = $_POST['status'];
            $supplier = $_POST['supplier'];
            $del_date = date_format(date_create($_POST['del_date']), 'd/m/Y');
            $item = $_POST['item'];
            $req_grp = $_POST['req_grp'];
            $type = $_POST['type'];
            $asset_group = $_POST['asset_group'];
            $asset_sub_group = $_POST['asset_sub_group'];
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $ser_no = $_POST['ser_no'];
            $ass_code = $_POST['ass_code'];
            $unit = $_POST['unit'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $del_note = $_POST['del_note'];
            $malt_shrt = $_POST['malt_shrt'];
            $remarks = $_POST['remarks'];
            $po_date = date_format(date_create($po_doc_date),'d/m/Y');

            $mysql = "SELECT COUNT(PO_NUMBER) FROM IT_ASSET_HEADER WHERE PO_NUMBER = :po_no";
                $posql = oci_parse(connection(), $mysql);   
                oci_bind_by_name($posql, ':po_no', $po_no);
                oci_execute($posql);
                $row = oci_fetch_row($posql);

            if ($row[0] != 0){
                // DETAILS
                $doc_num = "SELECT DOCUMENT_NO, DOCUMENT_DATE FROM IT_ASSET_HEADER WHERE PO_NUMBER = :po_no";
                    $res_doc_num = oci_parse(connection(), $doc_num); 
                    oci_bind_by_name($res_doc_num, ':po_no', $po_no);
                    oci_execute($res_doc_num);
                    $row1 = oci_fetch_row($res_doc_num);
                    
                    $det_sql = "INSERT INTO IT_ASSET_DETAILS 
                    (PO_NUMBER, DEL_DATE, REQ_GROUP_ID, ITEM, REQ_TYPE_ID,
                    BRAND_CODE, MODEL_CODE, SERIAL_NO, ASS_CODE, UNIT,
                    QTY, UNIT_PRICE, DEL_NOTE, MTRL_SHORT, REMARKS, 
                    ATTACHMENT, EMPL_ID, EMPL_ADR, WRK_LOC, 
                    OFF_PHONE, MOB_PHONE, HIRED_DATE, PERSON_EMAIL, BUS_EMAIL, 
                    REF_PERSON, ASSET_GROUP_CODE, ASSET_SUB_GROUP_CODE, DOCUMENT_NO, 
                    DOCUMENT_DATE, USER_CREATE, USER_CREATED_DATE)
                    VALUES 
                    (:po_no, to_date(:del_date, 'DD/MM/YY'), :req_group_id, :item, :req_type_id, 
                    :brand_code, :model_code, :serial_no, :ass_code, :unit, 
                    :qty, :unit_price, :del_note, :mtrl_short, :remarks, 
                    :attch, :emp_id, :emp_adr, :wrk_loc, 
                    :off_phone, :mob_phone, to_date(:hired_date, 'DD/MM/YY'), :person_email, :bus_email, 
                    :ref_person, :ass_grp_code, :ass_sub_grp_code, :doc_num, to_date(:doc_date, 'DD/MM/YY'),
                    :username, to_date(:user_date, 'DD/MM/YY HH:MI:SS am'))";

                    $result= oci_parse(connection(), $det_sql);

                    // oci_bind_by_name($result, ':po_no', $po_name);
                    oci_bind_by_name($result, ':po_no', $po_no);
                    oci_bind_by_name($result, ':del_date', $del_date);
                    oci_bind_by_name($result, ':req_group_id', $req_grp);
                    oci_bind_by_name($result, ':item', $item);
                    oci_bind_by_name($result, ':req_type_id', $type);
                    oci_bind_by_name($result, ':brand_code', $brand);
                    oci_bind_by_name($result, ':model_code', $model);
                    oci_bind_by_name($result, ':serial_no', $ser_no);
                    oci_bind_by_name($result, ':ass_code', $ass_code);
                    oci_bind_by_name($result, ':unit', $unit);
                    oci_bind_by_name($result, ':qty', $qty);
                    oci_bind_by_name($result, ':unit_price', $price);
                    oci_bind_by_name($result, ':del_note', $del_note);
                    oci_bind_by_name($result, ':mtrl_short', $malt_shrt);
                    oci_bind_by_name($result, ':remarks', $remarks);
                    oci_bind_by_name($result, ':attch', $file_name);
                    // oci_bind_by_name($result, ':empl_name', $empl_name);
                    oci_bind_by_name($result, ':emp_id', $emp_id);
                    oci_bind_by_name($result, ':emp_adr', $emp_add);
                    oci_bind_by_name($result, ':wrk_loc', $work_loc);
                    oci_bind_by_name($result, ':off_phone', $off_phone);
                    oci_bind_by_name($result, ':mob_phone', $mob_phone);
                    oci_bind_by_name($result, ':hired_date', $hired_date);
                    oci_bind_by_name($result, ':person_email', $per_email);
                    oci_bind_by_name($result, ':bus_email', $bus_email);
                    oci_bind_by_name($result, ':ref_person', $ref_person);
                    oci_bind_by_name($result, ':ass_grp_code', $asset_group);
                    oci_bind_by_name($result, ':ass_sub_grp_code', $asset_sub_group);
                    oci_bind_by_name($result, ':doc_num', $row1[0]);
                    oci_bind_by_name($result, ':doc_date', $row1[1]);
                    oci_bind_by_name($result, ':username', $name);
                    oci_bind_by_name($result, ':user_date', $date);

                if(oci_execute($result, OCI_NO_AUTO_COMMIT)){
                    $unt_price = "SELECT UNIT_PRICE FROM IT_ASSET_DETAILS WHERE PO_NUMBER = :po_no";
                    $result = oci_parse(connection(), $unt_price);
                    // oci_bind_by_name($result, ':po_no', $po_name);
                    oci_bind_by_name($result, ':po_no', $po_no);
                    oci_execute($result);

                    $total = array();
                    while ($row = oci_fetch_row($result)){
                        array_push($total, $row[0]);
                    }
                    $total_amount = array_sum($total);
 
                        $update = "UPDATE IT_ASSET_HEADER SET TOTAL_AMOUNT = :total_amount WHERE PO_NUMBER = :po_no";
                        $res = oci_parse(connection(), $update);

                        oci_bind_by_name($res, ':total_amount', $total_amount);
                        // oci_bind_by_name($res, ':po_no', $po_name);
                        oci_bind_by_name($res, ':po_no', $po_no);

                        if(oci_execute($res, OCI_NO_AUTO_COMMIT)){
                            oci_commit(connection());
                            echo json_encode(array('success' => 1, 'message' => "SAVED", 'icon' => "success"));
                        }
                        else{
                            oci_rollback(connection());
                            echo json_encode(array('success' => 0, 'message' => "ERROR", 'icon' => "error"));
                        }
                }
                else{
                    oci_rollback(connection());
                    echo json_encode(array('success' => 0, 'message' => "ERROR", 'icon' => "error"));
                }
                oci_free_statement($result);
            }

            // HEADER & DETAILS
            else{
                $maxDoc = "SELECT max(DOCUMENT_NO) from IT_ASSET_HEADER";
                $stmt = oci_parse(connection(), $maxDoc);
                oci_execute($stmt);
                $row = oci_fetch_row($stmt);
                if ($row[0] == '') {
                    $doc_no = date('y')."AS0001";
                }
                else{
                    $doc_no = $row[0];
                    $doc_no++;
                }
                // echo json_encode(array('success'=>1,'docno'=>$doc_no));
                $sql = "INSERT INTO IT_ASSET_HEADER 
                (DOCUMENT_NO, DOCUMENT_DATE, PO_DOCUMENT_DATE, PO_NUMBER, VENDOR_CODE, PLANT_CODE, 
                DEPARTMENT_CODE, TOTAL_AMOUNT, STATUS,  USER_CREATE, USER_CREATED_DATE) 
                VALUES 
                (:doc_no, to_date(:doc_date, 'DD/MM/YY'), to_date(:po_doc_date, 'DD/MM/YY'), :po_no, :supplier, :plant, 
                :department, :amt, :status, :user_created, to_date(:user_date, 'DD/MM/YY HH:MI:SS am'))";
                $res= oci_parse(connection(), $sql);

                oci_bind_by_name($res, ':doc_no', $doc_no);
                oci_bind_by_name($res, ':doc_date', $doc_date);
                oci_bind_by_name($res, ':po_doc_date', $po_date);
                // oci_bind_by_name($res, ':po_no', $po_name);
                oci_bind_by_name($res, ':po_no', $po_no);
                oci_bind_by_name($res, ':supplier', $supplier);
                oci_bind_by_name($res, ':plant', $plant);
                oci_bind_by_name($res, ':amt', $price);
                oci_bind_by_name($res, ':status', $status);
                oci_bind_by_name($res, ':department', $department);
                oci_bind_by_name($res, ':user_created', $name);
                oci_bind_by_name($res, ':user_date', $date);
                
                // DETAILS
                if(oci_execute($res, OCI_NO_AUTO_COMMIT)){
                    
                    $doc_num = "SELECT DOCUMENT_NO, DOCUMENT_DATE FROM IT_ASSET_HEADER WHERE PO_NUMBER = :po_no";
                    $res_doc_num = oci_parse(connection(), $doc_num); 
                    oci_bind_by_name($res_doc_num, ':po_no', $po_no);
                    oci_execute($res_doc_num);
                    $row1 = oci_fetch_row($res_doc_num);
                    
                    $det_sql = "INSERT INTO IT_ASSET_DETAILS 
                    (PO_NUMBER, DEL_DATE, REQ_GROUP_ID, ITEM, REQ_TYPE_ID,
                    BRAND_CODE, MODEL_CODE, SERIAL_NO, ASS_CODE, UNIT,
                    QTY, UNIT_PRICE, DEL_NOTE, MTRL_SHORT, REMARKS, 
                    ATTACHMENT, EMPL_ID, EMPL_ADR, WRK_LOC, 
                    OFF_PHONE, MOB_PHONE, HIRED_DATE, PERSON_EMAIL, BUS_EMAIL, 
                    REF_PERSON, ASSET_GROUP_CODE, ASSET_SUB_GROUP_CODE, DOCUMENT_NO, 
                    DOCUMENT_DATE, USER_CREATE, USER_CREATED_DATE)
                    VALUES 
                    (:po_no, to_date(:del_date, 'DD/MM/YY'), :req_group_id, :item, :req_type_id, 
                    :brand_code, :model_code, :serial_no, :ass_code, :unit, 
                    :qty, :unit_price, :del_note, :mtrl_short, :remarks, 
                    :attch, :emp_id, :emp_adr, :wrk_loc, 
                    :off_phone, :mob_phone, to_date(:hired_date, 'DD/MM/YY'), :person_email, :bus_email, 
                    :ref_person, :ass_grp_code, :ass_sub_grp_code, :doc_num, to_date(:doc_date, 'DD/MM/YY'),
                    :username, to_date(:user_date, 'DD/MM/YY HH:MI:SS am'))";

                    $result= oci_parse(connection(), $det_sql);

                    // oci_bind_by_name($result, ':po_no', $po_name);
                    oci_bind_by_name($result, ':po_no', $po_no);
                    oci_bind_by_name($result, ':del_date', $del_date);
                    oci_bind_by_name($result, ':req_group_id', $req_grp);
                    oci_bind_by_name($result, ':item', $item);
                    oci_bind_by_name($result, ':req_type_id', $type);
                    oci_bind_by_name($result, ':brand_code', $brand);
                    oci_bind_by_name($result, ':model_code', $model);
                    oci_bind_by_name($result, ':serial_no', $ser_no);
                    oci_bind_by_name($result, ':ass_code', $ass_code);
                    oci_bind_by_name($result, ':unit', $unit);
                    oci_bind_by_name($result, ':qty', $qty);
                    oci_bind_by_name($result, ':unit_price', $price);
                    oci_bind_by_name($result, ':del_note', $del_note);
                    oci_bind_by_name($result, ':mtrl_short', $malt_shrt);
                    oci_bind_by_name($result, ':remarks', $remarks);
                    oci_bind_by_name($result, ':attch', $file_name);
                    // oci_bind_by_name($result, ':empl_name', $empl_name);
                    oci_bind_by_name($result, ':emp_id', $emp_id);
                    oci_bind_by_name($result, ':emp_adr', $emp_add);
                    oci_bind_by_name($result, ':wrk_loc', $work_loc);
                    oci_bind_by_name($result, ':off_phone', $off_phone);
                    oci_bind_by_name($result, ':mob_phone', $mob_phone);
                    oci_bind_by_name($result, ':hired_date', $hired_date);
                    oci_bind_by_name($result, ':person_email', $per_email);
                    oci_bind_by_name($result, ':bus_email', $bus_email);
                    oci_bind_by_name($result, ':ref_person', $ref_person);
                    oci_bind_by_name($result, ':ass_grp_code', $asset_group);
                    oci_bind_by_name($result, ':ass_sub_grp_code', $asset_sub_group);
                    oci_bind_by_name($result, ':doc_num', $row1[0]);
                    oci_bind_by_name($result, ':doc_date', $row1[1]);
                    oci_bind_by_name($result, ':username', $name);
                    oci_bind_by_name($result, ':user_date', $date);
                    
                    if(oci_execute($result, OCI_NO_AUTO_COMMIT)){
                        oci_commit(connection());
                        echo json_encode(array('success' => 1, 'message' => "SAVED", 'icon' => "success"));
                    }
                    else{
                        oci_rollback(connection());
                        echo json_encode(array('success' => 0, 'message' => "ERROR", 'icon' => "error"));
                    }
                    oci_free_statement($result);
                }
                oci_free_statement($res);
            }
    }   
    else{
        oci_rollback(connection());
        echo json_encode(array('success' => 0, 'message' => "ERROR", 'icon' => "error"));
    }
// }
// else{
//  	http_response_code(404);
//  	header('location: ./error');
//  }
?>