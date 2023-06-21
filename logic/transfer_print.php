<?php
 
header("Content-Type:application/json");

require "../config/connection.php";

if(isset($_POST['doc_no1'])){
    $doc_no1 = $_POST['doc_no1'];
    $po_item1 = $_POST['po_item1'];
    // $po_item = $_POST['po_item'];
  
    $sql = "SELECT DISTINCT J.DOC_NO, A.VENDOR_CODE, B.DOC_NO, to_char(to_date(B.DOC_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as DOC_DATE, B.PO_NO, 
    to_char(to_date(B.DEL_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as DEL_DATE, B.REQ_GRP_ID, B.REQ_TYPE_ID, B.ASSET_GRP_CODE, B.ASSET_SUB_GRP_CODE, B.BRAND_CODE, B.MODEL_CODE, B.SERIAL_NO1, 
    B.SERIAL_NO2, B.SERIAL_NO3,B.SERIAL_NO4, B.ASS_CODE, B.UNIT, B.QTY,
    B.PO_ITEM, B.UNIT_PRICE, to_char(to_date(B.LICENSE_START_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as LICENSE_START_DATE, 
    B.LICENSE_MONTH, to_char(to_date(B.LICENSE_EXPIRE_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as LICENSE_EXPIRE_DATE,
    to_char(to_date(B.WARRANTY_START_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as WARRANTY_START_DATE, 
    B.WARRANTY_MONTH, to_char(to_date(B.WARRANTY_EXPIRE_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as WARRANTY_EXPIRE_DATE, B.DEL_NOTE, B.MTRL_SHORT, B.REMARKS,
    B.EMPL_ID, C.REQ_GRP_NAME, D.REQ_TYPE_NAME, E.ASSET_GRP_NAME, F.ASSET_SUB_GRP_NAME, G.BRAND_NAME, H.MODEL_NAME, SERIES,
    B.ASSET_ID, J.TRANSFER_FROM, K.TRANSFER_REMARKS
    FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_REQ_GROUP C, IT_ASSET_REQ_TYPE D, IT_ASSET_GROUP E,
    IT_ASSET_SUB_GROUP F, IT_ASSET_BRAND G, IT_ASSET_MODEL H, IT_ASSET_VENDORS I, IT_ASSET_TRANSFER_TRN_HDR J, IT_ASSET_TRANSFER_TRN_DTL K
    WHERE A.PO_NO = B.PO_NO
    AND A.VENDOR_CODE = I.VENDOR_CODE
    AND B.REQ_GRP_ID = C.REQ_GRP_ID
    AND B.REQ_TYPE_ID = D.REQ_TYPE_ID
    AND B.ASSET_GRP_CODE = E.ASSET_GRP_CODE
    AND B.ASSET_SUB_GRP_CODE = F.ASSET_SUB_GRP_CODE
    AND B.BRAND_CODE = G.BRAND_CODE
    AND B.MODEL_CODE = H.MODEL_CODE
    AND B.DOC_NO = J.REF_DOC_NO
    AND J.DOC_NO = K.DOC_NO
    AND J.DOC_NO = :doc_no1
    AND J.PO_ITEM = :po_item1";
    $res = oci_parse(connection(), $sql);
    oci_bind_by_name($res, ':doc_no1', $doc_no1);
    oci_bind_by_name($res, ':po_item1', $po_item1);
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

            'SUPPLIER' => $row['VENDOR_CODE'], 'REQ_GRP' => $row['REQ_GRP_ID'], 'REQ_TYPE' => $row['REQ_TYPE_ID'], 
            'ASS_GRP' => $row['ASSET_GRP_CODE'], 'ASS_SUB_GRP' => $row['ASSET_SUB_GRP_CODE'], 
            'BRAND' => $row['BRAND_CODE'], 'MODEL_CODE' => $row['MODEL_CODE'], 'SERIES' => $row['SERIES'],
            'PRICE' => $row['UNIT_PRICE'], 'SER_NO1' => $row['SERIAL_NO1'], 
            'SER_NO2' => $row['SERIAL_NO2'],'SER_NO3' => $row['SERIAL_NO3'], 'SER_NO4' => $row['SERIAL_NO4'],
            'ASS_CODE' => $row['ASS_CODE'], 'DEL_NOTE' => $row['DEL_NOTE'], 'DEL_DATE' => $row['DEL_DATE'], 
            'MTRL_SHORT' => $row['MTRL_SHORT'], 'LICENSE_START' => $row['LICENSE_START_DATE'], 'LICENSE_MONTH' => $row['LICENSE_MONTH'],
            'LICENSE_EXP' => $row['LICENSE_EXPIRE_DATE'],
            'WAR_START' => $row['WARRANTY_START_DATE'], 'WAR_MONTH' => $row['WARRANTY_MONTH'], 
            'WAR_EXP' => $row['WARRANTY_EXPIRE_DATE'],'REMARKS' => $row['REMARKS'], 'REQ_GRP_NAME' => $row['REQ_GRP_NAME'], 
            'REQ_TYPE_NAME' => $row['REQ_TYPE_NAME'], 
            'ASS_GRP_NAME' => $row['ASSET_GRP_NAME'], 'ASS_SUB_GRP_NAME' => $row['ASSET_SUB_GRP_NAME'], 
            'BRAND_NAME' => $row['BRAND_NAME'], 'MODEL_NAME' => $row['MODEL_NAME'], 'PO_NUMBER' => $row['PO_NO'], 
            'PO_ITEM' => $row['PO_ITEM'], 'DOC_NO' => $row['DOC_NO'], 'ASS_ID' => $row['ASSET_ID'], 
            'TRANSFER_REMARKS' => $row['TRANSFER_REMARKS']));
    }
}
?>