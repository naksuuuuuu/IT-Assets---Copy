<?php
 
header("Content-Type:application/json");

require "../config/connection.php";

// employee details
if (isset($_POST['empl_name'])){
    $empl_name = $_POST['empl_name'];
    $sql = "SELECT a.*, d.DESCR as dept, b.LOCATION, b.EMPL_STATUS, c.DESCR from PERSON_TBL a, JobCur_ee b , 
    location_tbl c, DEPARTMENT_TBL d
    WHERE a.EMPLID = b.EMPLID
    and b.LOCATION = c.LOCATION
    AND b.DEPTID = d.DEPTID
    and b.EMPL_STATUS = 'A'
    and a.EMPLID = :empl_name";

    $result = oci_parse(connection1(),$sql);
    oci_bind_by_name($result,':empl_name', $empl_name);
    oci_execute($result);

    $details = oci_fetch_assoc($result);
    echo json_encode( array('DEPT' => $details['DEPT'], 'EMPLID'=> $details['EMPLID'], 
    'ADDRESS' => $details['SOI'].$details['TAMBOL'].$details['AMPHUR'], 'LOCATION' => $details['DESCR'], 
    'OFFICEPHONE' =>$details['OFFICEPHONE'], 'MOBILEPHONE' => $details['MOBILEPHONE'], 'HIREDDATE' => $details['HIRE_DATE'], 
    'PERSONAL_EMAIL' => $details['PERSONELMAIL'], 'BUSINESS_EMAIL' => $details['BUSINESSMAIL']));
}

// edit info modal
else if (isset($_POST['empl_name1'])){
    $empl_name1 = $_POST['empl_name1'];
    $sql = "SELECT a.*, d.DESCR as dept, b.LOCATION, b.EMPL_STATUS, c.DESCR from PERSON_TBL a, JobCur_ee b , 
    location_tbl c, DEPARTMENT_TBL d
    WHERE a.EMPLID = b.EMPLID
    and b.LOCATION = c.LOCATION
    AND b.DEPTID = d.DEPTID
    and b.EMPL_STATUS = 'A'
    and a.EMPLID = :empl_name1";

    $result = oci_parse(connection1(),$sql);
    oci_bind_by_name($result,':empl_name1', $empl_name1);
    oci_execute($result);

    $details = oci_fetch_assoc($result);
    echo json_encode( array('DEPT' => $details['DEPT'], 'EMPLID'=> $details['EMPLID'], 
    'ADDRESS' => $details['SOI'].$details['TAMBOL'].$details['AMPHUR'], 'LOCATION' => $details['DESCR'], 
    'OFFICEPHONE' =>$details['OFFICEPHONE'], 'MOBILEPHONE' => $details['MOBILEPHONE'], 'HIREDDATE' => $details['HIRE_DATE'], 
    'PERSONAL_EMAIL' => $details['PERSONELMAIL'], 'BUSINESS_EMAIL' => $details['BUSINESSMAIL']));
}

else if (isset($_POST['empl_name2'])){
    $empl_name2 = $_POST['empl_name2'];
    $sql = "SELECT a.*, d.DESCR as dept, b.LOCATION, b.EMPL_STATUS, c.DESCR from PERSON_TBL a, JobCur_ee b , 
    location_tbl c, DEPARTMENT_TBL d
    WHERE a.EMPLID = b.EMPLID
    and b.LOCATION = c.LOCATION
    AND b.DEPTID = d.DEPTID
    and b.EMPL_STATUS = 'A'
    and a.EMPLID = :empl_name2";

    $result = oci_parse(connection1(),$sql);
    oci_bind_by_name($result,':empl_name2', $empl_name2);
    oci_execute($result);

    $details = oci_fetch_assoc($result);
    echo json_encode( array('DEPT' => $details['DEPT'], 'EMPLID'=> $details['EMPLID'], 
    'ADDRESS' => $details['SOI'].$details['TAMBOL'].$details['AMPHUR'], 'LOCATION' => $details['DESCR'], 
    'OFFICEPHONE' =>$details['OFFICEPHONE'], 'MOBILEPHONE' => $details['MOBILEPHONE'], 'HIREDDATE' => $details['HIRE_DATE'], 
    'PERSONAL_EMAIL' => $details['PERSONELMAIL'], 'BUSINESS_EMAIL' => $details['BUSINESSMAIL']));
}

// add po button
else if(isset($_POST['po_no'])){
    $po_no = $_POST['po_no'];
    $po_item = $_POST['po_item'];

    $sql = "SELECT * FROM IT_ASSET_PO WHERE PO_NO = :po_no and PO_ITEM = :po_item";

    $result = oci_parse(connection(), $sql);
    oci_bind_by_name($result, ':po_no', $po_no);
    oci_bind_by_name($result, ':po_item', $po_item);
    oci_execute($result);

    $details = oci_fetch_assoc($result);
    $po_date = date_format(date_create($details['PO_DELIVERY_DATE']), "Y-m-d");
    $po_doc_date = date_format(date_create($details['PO_DOC_DATE']), "Y-m-d");
    
    echo json_encode(array('PO_NO' => $details['PO_NO'], 'ITEM' => $details['PO_ITEM'], 'PO_DOC_DATE' => $po_doc_date, 'PLANT' => $details['PLANT'], 
    'PO_STATUS' => $details['PO_STATUS'], 'VENDOR_CODE' => $details['VENDOR_CODE'], 'PO_UNIT_PRICE' => $details['PO_UNIT_PRICE'], 
    'PO_DELIVERY_DATE' => $po_date, 'MATERIAL_SHORT' => $details['SHORT_TEXT'],
    'QUANTITY' => $details['PO_QUANTITY'], 'UNIT' => $details['ORDER_UNIT']));
}

// PO
// else if(isset($_POST['po_num']) and !isset($_POST['po_dtls'])){
//     $po_num = $_POST['po_num'];

//     $sql = "SELECT * FROM IT_ASSET_PO WHERE PO_NO = :po_num ";
//     $res = oci_parse(connection(), $sql);

//     oci_bind_by_name($res, ':po_num', $po_num);
//     oci_execute($res);

//     $array = array();
//     while($PO = oci_fetch_assoc($res)){
//         array_push($array, array('VENDOR_NAME' => htmlspecialchars($PO['VENDOR_NAME'],ENT_IGNORE)));
//     }
//     echo json_encode($array);
// }


// else if(isset($_POST['po_num']) and isset($_POST['po_dtls'])){
//     $po_num = $_POST['po_num'];

//     $sql = "SELECT PO_NO, PLANT, VENDOR_NAME, SHORT_TEXT, PO_ITEM_TEXT, PO_QTY, ORDER_UNT, PO_UNT_PRICE, PO_DOC_DATE, PO_STATUS 
//             WHERE PO_NO :po_no";
//     $res = oci_parse(connection(), $sql);

//     oci_bind_by_name($res, ':po_num', $po_num);
//     oci_execute($res);

//     $details = oci_fetch_assoc($result);
//          echo json_encode( array('PO_NO'=> $details['PO_NO'], 'PLANT' => $details['PLANT'], 'VENDOR_NAME' => $details['VENDOR_NAME'], 'SHORT_TEXT' => $details['SHORT_TEXT'], 
//                  'PO_ITEM_TEXT' => $details['PO_ITEM_TEXT'], 'PO_QTY' => $details['PO_QTY'], 'ORDER_UNT' => $details['ORDER_UNT'],
//                  'PO_UNT_PRICE' => $details['PO_UNT_PRICE'], 'PO_DOC_DATE' => $details['PO_DOC_DATE'], 'PO_STATUS' => $details['PO_STATUS']));

// }

?>