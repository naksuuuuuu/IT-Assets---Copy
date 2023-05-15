<?php
 
header("Content-Type:application/json");

require "../config/connection.php";

if(isset($_POST['doc_no1'])){
    $doc_no1 = $_POST['doc_no1'];
    // $po_item = $_POST['po_item'];
  
    $sql = "SELECT A.VENDOR_CODE, B.DOCUMENT_NO, to_char(B.DOCUMENT_DATE, 'YYYY-MM-DD') as DOCUMENT_DATE, B.PO_NUMBER, 
    to_char(B.DEL_DATE, 'YYYY-MM-DD') as DEL_DATE, B.REQ_GRP, B.REQ_TYPE, B.ASSET_GROUP, B.SUB_ASSET_GROUP, B.BRAND, B.MODEL as model_code, B.SERIAL_NO1, 
    B.SERIAL_NO2, B.SERIAL_NO3,B.SERIAL_NO4, B.ASS_CODE, B.UNIT, B.QTY,
    B.PO_ITEM, B.UNIT_PRICE, to_char(B.LICENSE_START_DATE, 'YYYY-MM-DD') as LICENSE_START_DATE, 
    B.LICENSE_MONTH, to_char(B.LICENSE_EXPIRE_DATE, 'YYYY-MM-DD') as LICENSE_EXPIRE_DATE,
    to_char(B.WARRANTY_START_DATE, 'YYYY-MM-DD') as WARRANTY_START_DATE, 
    B.WARRANTY_MONTH, to_char(B.WARRANTY_EXPIRE_DATE, 'YYYY-MM-DD') as WARRANTY_EXPIRE_DATE, B.DEL_NOTE, B.MTRL_SHORT, B.REMARKS,
    B.EMPL_ID, C.REQ_GROUP_NAME, D.REQ_TYPE_NAME, E.ASSET_GROUP_NAME, F.ASSET_SUB_GROUP_NAME, G.BRAND_NAME, H.MODEL, SERIES,
    B.ASSET_ID, J.TRANSFER_FROM
    FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_REQ_GROUP C, IT_ASSET_REQ_TYPE D, IT_ASSET_GROUP E,
    IT_ASSET_SUB_GROUP F, IT_ASSET_BRAND G, IT_ASSET_MODEL H, IT_ASSET_VENDORS I, IT_ASSET_TRANSFER_TRN_HDR J
    WHERE A.PO_NUMBER = B.PO_NUMBER
    AND A.VENDOR_CODE = I.VENDOR_CODE
    AND B.REQ_GRP = C.REQ_GROUP_ID
    AND B.REQ_TYPE = D.REQ_TYPE_ID
    AND B.ASSET_GROUP = E.ASSET_GROUP_CODE
    AND B.SUB_ASSET_GROUP = F.ASSET_SUB_GROUP_CODE
    AND B.BRAND = G.BRAND_CODE
    AND B.MODEL = H.MODEL_CODE
    AND B.DOCUMENT_NO = J.REF_DOC_NO
    AND J.DOCUMENT_NO = :doc_no1";
    $res = oci_parse(connection(), $sql);
    oci_bind_by_name($res, ':doc_no1', $doc_no1);
    // oci_bind_by_name($res, ':po_item', $po_item);
    oci_execute($res);
  
    $result = "";
    while($row = oci_fetch_assoc($res)){
      $empId = $row["EMPL_ID"];
      $empId2 = $row['TRANSFER_FROM'];
  
      $dept_code = "SELECT a.*, d.DESCR as dept, b.LOCATION, b.EMPL_STATUS, c.DESCR from PERSON_TBL a, JobCur_ee b , 
            location_tbl c, DEPARTMENT_TBL d
            WHERE a.EMPLID = b.EMPLID
            and b.LOCATION = c.LOCATION
            AND b.DEPTID = d.DEPTID
            and b.EMPL_STATUS = 'A'
            and a.EMPLID = :empl";
            $stmt = oci_parse(connection1(), $dept_code);
            oci_bind_by_name($stmt, ':empl', $empId);
            oci_execute($stmt);
        
            $row1 = oci_fetch_assoc($stmt);

            $dept_code1 = "SELECT a.*, d.DESCR as dept, b.LOCATION, b.EMPL_STATUS, c.DESCR from PERSON_TBL a, JobCur_ee b , 
            location_tbl c, DEPARTMENT_TBL d
            WHERE a.EMPLID = b.EMPLID
            and b.LOCATION = c.LOCATION
            AND b.DEPTID = d.DEPTID
            and b.EMPL_STATUS = 'A'
            and a.EMPLID = :empl";
            $stmt = oci_parse(connection1(), $dept_code);
            oci_bind_by_name($stmt, ':empl', $empId2);
            oci_execute($stmt);
        
            $row2 = oci_fetch_assoc($stmt);
        
            echo json_encode( array('DEPT' => $row1['DEPT'], 'EMP_ID'=> $row1['EMPLID'], 
            'EMP_ADD' => $row1['SOI'].$row1['TAMBOL'].$row1['AMPHUR'], 'WORK_LOC' => $row1['DESCR'], 
            'OFF_PHONE' =>$row1['OFFICEPHONE'], 'MOB_PHONE' => $row1['MOBILEPHONE'], 'HIRED_DATE' => $row1['HIRE_DATE'], 
            'PER_EMAIL' => $row1['PERSONELMAIL'], 'BUS_EMAIL' => $row1['BUSINESSMAIL'],
            'DEPT2' => $row2['DEPT'], 'EMP_ID2'=> $row2['EMPLID'], 
            'WORK_LOC2' => $row2['DESCR'], 'BUS_EMAIL2' => $row2['BUSINESSMAIL'], 
            'SUPPLIER' => $row['VENDOR_CODE'], 'REQ_GRP' => $row['REQ_GRP'], 'REQ_TYPE' => $row['REQ_TYPE'], 
            'ASS_GRP' => $row['ASSET_GROUP'], 'ASS_SUB_GRP' => $row['SUB_ASSET_GROUP'], 
            'BRAND' => $row['BRAND'], 'MODEL_CODE' => $row['MODEL_CODE'], 'SERIES' => $row['SERIES'],
            'PRICE' => $row['UNIT_PRICE'], 'SER_NO1' => $row['SERIAL_NO1'], 
            'SER_NO2' => $row['SERIAL_NO2'],'SER_NO3' => $row['SERIAL_NO3'], 'SER_NO4' => $row['SERIAL_NO4'],
            'ASS_CODE' => $row['ASS_CODE'], 'DEL_NOTE' => $row['DEL_NOTE'], 'DEL_DATE' => $row['DEL_DATE'], 
            'MTRL_SHORT' => $row['MTRL_SHORT'], 'LICENSE_START' => $row['LICENSE_START_DATE'], 'LICENSE_MONTH' => $row['LICENSE_MONTH'],
            'LICENSE_EXP' => $row['LICENSE_EXPIRE_DATE'],
            'WAR_START' => $row['WARRANTY_START_DATE'], 'WAR_MONTH' => $row['WARRANTY_MONTH'], 
            'WAR_EXP' => $row['WARRANTY_EXPIRE_DATE'],'REMARKS' => $row['REMARKS'], 'REQ_GRP_NAME' => $row['REQ_GROUP_NAME'], 
            'REQ_TYPE_NAME' => $row['REQ_TYPE_NAME'], 
            'ASS_GRP_NAME' => $row['ASSET_GROUP_NAME'], 'ASS_SUB_GRP_NAME' => $row['ASSET_SUB_GROUP_NAME'], 
            'BRAND_NAME' => $row['BRAND_NAME'], 'MODEL_NAME' => $row['MODEL'], 'PO_NUMBER' => $row['PO_NUMBER'], 
            'PO_ITEM' => $row['PO_ITEM'], 'DOC_NO' => $row['DOCUMENT_NO'], 'ASS_ID' => $row['ASSET_ID']));
    }
}
?>