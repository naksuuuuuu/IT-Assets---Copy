<?php

// require "../config/connection.php";

echo var_dump($_POST);


// date_default_timezone_set('Asia/Manila');
// header('Content-Type: application/json');

// if($_SERVER['REQUEST_METHOD'] == 'POST'){

//     $date = date('d/m/Y h:i:s a');
//     if (isset($_POST['data'])){

//             $name = $_POST['name'];
//             $department = $_POST['department'];
//             // $emp_name = $_POST['emp_name'];
//             // $emp_id = $_POST['emp_id'];
//             // $emp_add = $_POST['emp_add'];
//             // $work_loc = $_POST['work_loc'];
//             // $off_phone = $_POST['off_phone'];
//             // $mob_phone = $_POST['mob_phone'];
//             // $hired_date = $_POST['hired_date'];
//             // $per_email = $_POST['per_email'];
//             // $bus_email = $_POST['bus_email'];
//             // $ref_person = $_POST['ref_person'];
//             $po_no = $_POST['po_no'];
//             $po_date = $_POST['po_date'];
//             $plant = $_POST['plant'];
//             // $amt = $_POST['amt'];
//             $po_stat = $_POST['po_stat'];
//             // $supp = explode(",", $_POST['supp_code']);
//             // $vendor = explode(",", $_POST['supp']);
//             // $type_code = $_POST['type_code'];
//             // $type_td = $_POST['type_td'];
//             // $brand_code = $_POST['brand_code'];
//             // $brand_td = $_POST['brand_td'];
//             $price = $_POST['price_td'];
//             // $ser_no_td = $_POST['ser_no_td'];
//             // $ass_code = $_POST['ass_code'];
//             // $del_note_td = $_POST['del_note_td'];
//             // $del_date_td = explode(",", $_POST['del_date_td']);
//             // $mtrl = explode(",", $_POST['malt_shrt_td']);
//             // $rem = explode(",", $_POST['rem_td']);
//             // $attch_td = $_POST['attch_td'];

//             if(str_contains($_POST['price_td'], ",") !== false){
//                 $amt = explode(",", $_POST['price_td']);
//                $total_amount =  number_format(array_sum($amt), 2, '.', ',');
//             }
//             else{
//                 $total_amount = $_POST['price_td'];
//             };

//             $sql2 = "SELECT MAX(DOCUMENT_NO) FROM IT_ASSET_HEADER";
//             $stmt = oci_parse(connection(), $sql2);
//             oci_execute($stmt);
//             $row = oci_fetch_row($stmt);
//             $row[0]++;
//             $po_doc_date = date_format(date_create($po_date), "d/m/Y");

//             $sql = "INSERT INTO IT_ASSET_HEADER (DOCUMENT_NO, PO_DOCUMENT_DATE, PO_NUMBER, PLANT_CODE, DEPARTMENT_CODE, TOTAL_AMOUNT, STATUS, USER_CREATE, USER_CREATED_DATE)
//                     VALUES (:doc_no, to_date(:po_date, 'DD/MM/YY'), :po_no, :plant, :department, :amt, :po_stat, :user_created, to_date(:user_created_date, 'DD/MM/YY HH:MI:SS am'))";
//                     $res= oci_parse(connection(), $sql);

//                     oci_bind_by_name($res, ':doc_no', $row[0]);
//                     oci_bind_by_name($res, ':po_date', $po_doc_date);
//                     oci_bind_by_name($res, ':po_no', $po_no);
//                     oci_bind_by_name($res, ':plant', $plant);
//                     oci_bind_by_name($res, ':amt', $total_amount);
//                     oci_bind_by_name($res, ':po_stat', $po_stat);
//                     oci_bind_by_name($res, ':department', $department);
//                     oci_bind_by_name($res, ':user_created',$name);
//                     oci_bind_by_name($res, ':user_created_date', $date);
                    
//                     if(oci_execute($res)){
//                         echo json_encode(array('success' => true, 'Code' => 200));
//                     }
//                     else{
//                         echo json_encode(array('success' => true, 'Code' => 400));
//                     }
//                     oci_free_statement($stmt);
//                     oci_free_statement($res);
//                     // oci_close(connection());
                    

//             // $sql = "INSERT INTO IT_ASSET_DETAILS (DOCUMENT_NO, DEL_DATE, ITEM, REQ_TYPE_ID, BRAND_CODE, MODEL_CODE, SERIAL_NO, ASS_CODE, 
//             // UNIT, QTY, UNIT_PRICE, MTRL_SHORT_TEXT, REMARKS, ATTACHMENT";

//             //   foreach($supp as $key => $value){
//             //       $supp_code = $supp[$key];  
//             //       $supplier_name = $vendor[$key];
//             //       $price_td = $price[$key];
//             //       $del_date = $del_date_td[$key];
//             //       $malt_shrt_td = $mtrl[$key];
//             //       $rem_td = $rem[$key];

//             //    echo $supp_code . ' ' . $supplier_name .' '. $price_td .' '. $del_date .' '. $malt_shrt_td .' '. $rem_td;
//             //   }

          
//             };
   
// }
// else{
// 	http_response_code(404);
// 	header('location: ./error');
// }



?>