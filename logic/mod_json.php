<?php
 
header("Content-Type:application/json");

require "../config/connection.php";

if(isset($_POST['doc_no1'])){
    $doc_no1 = $_POST['doc_no1'];
    $po_item = $_POST['po_item'];
    $req_grp_code = $_POST['req_grp_code'];
    $req_grp_name = $_POST['req_grp_name'];
    $req_type_code = $_POST['req_type_code'];
    $req_type_name = $_POST['req_type_name'];
    $ass_grp_code = $_POST['ass_grp_code'];
    $ass_grp_name = $_POST['ass_grp_name'];
    $ass_sub_grp_code = $_POST['ass_sub_grp_code'];
    $ass_sub_grp_name = $_POST['ass_sub_grp_name'];
    $brand_code = $_POST['brand_code'];
    $brand_name = $_POST['brand_name'];
    $model_code = $_POST['model_code'];
    $model_name = $_POST['model_name'];

    $sql = "SELECT A.DOC_NO, A.VENDOR_CODE, B.DOC_NO, to_char(to_date(B.DOC_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as DOC_DATE, B.PO_NO, 
      to_char(to_date(B.DEL_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as DEL_DATE, B.REQ_GRP_ID, B.REQ_TYPE_ID, B.ASSET_GRP_CODE, B.ASSET_SUB_GRP_CODE, B.BRAND_CODE, B.MODEL_CODE, B.SERIAL_NO1, 
      B.SERIAL_NO2, B.SERIAL_NO3, B.SERIAL_NO4, B.ASS_CODE, B.ASSET_ID, B.UNIT, B.QTY,
      B.PO_ITEM, B.UNIT_PRICE, to_char(to_date(B.LICENSE_START_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as LICENSE_START_DATE, 
      B.LICENSE_MONTH, to_char(to_date(B.LICENSE_EXPIRE_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as LICENSE_EXPIRE_DATE,
      to_char(to_date(B.WARRANTY_START_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as WARRANTY_START_DATE, 
      B.WARRANTY_MONTH, to_char(to_date(B.WARRANTY_EXPIRE_DATE, 'DD/MM/YY'), 'YYYY-MM-DD') as WARRANTY_EXPIRE_DATE, B.DEL_NOTE, B.MTRL_SHORT, B.REMARKS,
      B.EMPL_ID, C.REQ_GRP_NAME, D.REQ_TYPE_NAME, E.ASSET_GRP_NAME, F.ASSET_SUB_GRP_NAME, G.BRAND_NAME, H.MODEL_NAME, B.SERIES, B.ASSET_FLAG
      FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_REQ_GROUP C, IT_ASSET_REQ_TYPE D, IT_ASSET_GROUP E,
      IT_ASSET_SUB_GROUP F, IT_ASSET_BRAND G, IT_ASSET_MODEL H, IT_ASSET_VENDORS I
      WHERE A.DOC_NO = B.DOC_NO
      AND A.VENDOR_CODE = I.VENDOR_CODE
      AND B.REQ_GRP_ID = C.REQ_GRP_ID
      AND B.REQ_TYPE_ID = D.REQ_TYPE_ID
      AND B.ASSET_GRP_CODE = E.ASSET_GRP_CODE
      AND B.ASSET_SUB_GRP_CODE = F.ASSET_SUB_GRP_CODE
      AND B.BRAND_CODE = G.BRAND_CODE
      AND B.MODEL_CODE = H.MODEL_CODE
      AND A.DOC_NO = :doc_no1
      AND B.PO_ITEM = :po_item";
    $res = oci_parse(connection(), $sql);
    oci_bind_by_name($res, ':doc_no1', $doc_no1);
    oci_bind_by_name($res, ':po_item', $po_item);
    oci_execute($res);
  
    $result = "";
    while($row = oci_fetch_assoc($res)){

      // req_grp
      if ($row["REQ_GRP_ID"] == "REQGR01"){
        $req = "<option value='".$row["REQ_GRP_ID"]."'>".$row["REQ_GRP_NAME"]."</option>
                <option value='REQGR02'>Installation</option>
                <option value='REQGR03'>Repair</option>";  
      }
      else if($row["REQ_GRP_ID"] == "REQGR02") {
        $req = "<option value='".$row["REQ_GRP_ID"]."'>".$row["REQ_GRP_NAME"]."</option>
                <option value='REQGR01'>Purchase</option>
                <option value='REQGR03'>Repair</option>";  
      }
      else if($row["REQ_GRP_ID"] == "REQGR03") {
        $req = "<option value='".$row["REQ_GRP_ID"]."'>".$row["REQ_GRP_NAME"]."</option>
                <option value='REQGR01'>Purchase</option>
                <option value='REQGR02'>Installation</option>";
      }

      // req_type
      $req_type1_sql = "SELECT REQ_TYPE_ID, REQ_TYPE_NAME FROM IT_ASSET_REQ_TYPE
          WHERE REQ_GRP_ID = :req_grp 
          AND REQ_TYPE_ID != :req_type_id
          AND REQ_TYPE_NAME != :req_type_name";
        $req_type1_res = oci_parse(connection(), $req_type1_sql);
        oci_bind_by_name($req_type1_res, ':req_grp', $req_grp_code);
        oci_bind_by_name($req_type1_res, ':req_type_id', $req_type_code);
        oci_bind_by_name($req_type1_res, ':req_type_name', $req_type_name);
        oci_execute($req_type1_res);
        $req_type = "<option value='".$req_type_code."'>".$req_type_name."</option>";

        while($req_type_row = oci_fetch_assoc($req_type1_res)){
          $req_type .= "<option value='".$req_type_row['REQ_TYPE_ID']."'>".$req_type_row['REQ_TYPE_NAME']."</option>";
        };

        // ass_grp
      $ass_sql = "SELECT ASSET_GRP_CODE, ASSET_GRP_NAME FROM IT_ASSET_GROUP
      WHERE REQ_TYPE_ID = :req_type_id
      AND ASSET_GRP_CODE != :ass_code
      AND ASSET_GRP_NAME != :ass_name";
      $ass_res = oci_parse(connection(), $ass_sql);
      oci_bind_by_name($ass_res, ':req_type_id', $req_type_code);
      oci_bind_by_name($ass_res, ':ass_code', $ass_grp_code);
      oci_bind_by_name($ass_res, ':ass_name', $ass_grp_name);
      oci_execute($ass_res);
      $ass_grp = "<option value='".$ass_grp_code."'>".$ass_grp_name."</option>";

      while($ass_row = oci_fetch_assoc($ass_res)){
        $ass_grp .= "<option value='".$ass_row['ASSET_GRP_CODE']."'>".$ass_row['ASSET_GRP_NAME']."</option>";
      }

      // ass_sub_grp
      $sub_sql = "SELECT ASSET_SUB_GRP_CODE, ASSET_SUB_GRP_NAME FROM IT_ASSET_SUB_GROUP
      WHERE ASSET_GRP_CODE = :ass_code
      AND ASSET_SUB_GRP_CODE != :ass_sub_grp
      AND ASSET_SUB_GRP_NAME != :ass_sub_name";
      $sub_res = oci_parse(connection(), $sub_sql);
      oci_bind_by_name($sub_res, ':ass_code', $ass_grp_code);
      oci_bind_by_name($sub_res, ':ass_sub_grp', $ass_sub_grp_code);
      oci_bind_by_name($sub_res, ':ass_sub_name', $ass_sub_grp_name);
      oci_execute($sub_res);
      $ass_sub_grp = "<option value='".$ass_sub_grp_code."'>".$ass_sub_grp_name."</option>";

      while($sub_row = oci_fetch_assoc($sub_res)){
        $ass_sub_grp .= "<option value='".$sub_row['ASSET_SUB_GRP_CODE']."'>".$sub_row['ASSET_SUB_GRP_NAME']."</option>";
      }

      // brand
      $brand = "SELECT BRAND_CODE, BRAND_NAME FROM IT_ASSET_BRAND
      WHERE ASSET_SUB_GRP_CODE = :ass_sub_grp
      AND BRAND_CODE != :brand_code
      AND BRAND_NAME != :brand_name";
      $brand_res = oci_parse(connection(), $brand);
      oci_bind_by_name($brand_res, ':ass_sub_grp', $ass_sub_grp_code);
      oci_bind_by_name($brand_res, ':brand_code', $brand_code);
      oci_bind_by_name($brand_res, ':brand_name', $brand_name);
      oci_execute($brand_res);
      $brand_grp = "<option value='".$brand_code."'>".$brand_name."</option>";

      while($brand_row = oci_fetch_assoc($brand_res)){
        $brand_grp .= "<option value='".$brand_row['BRAND_CODE']."'>".$brand_row['BRAND_NAME']."</option>";
      }

      // model
      $model_sql = "SELECT MODEL_CODE, MODEL_NAME FROM IT_ASSET_MODEL
      WHERE BRAND_CODE = :brand_code
      AND MODEL_CODE != :model_code
      AND MODEL_NAME != :model";
      $model_res = oci_parse(connection(), $model_sql);
      oci_bind_by_name($model_res, ':brand_code', $brand_code);
      oci_bind_by_name($model_res, ':model_code', $model_code);
      oci_bind_by_name($model_res, ':model', $model_name);
      oci_execute($model_res);
      $model_grp = "<option value='".$model_code."'>".$model_name."</option>";

      while($model_row = oci_fetch_assoc($model_res)){
        $model_grp .= "<option value='".$model_row['MODEL_CODE']."'>".$model_row['MODEL_NAME']."</option>";
      }

      $empId = $row["EMPL_ID"];
  
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
      
            echo json_encode(array('DEPT' => $row1['DEPT'], 'EMP_ID'=> $row1['EMPLID'], 
            'EMP_ADD' => $row1['SOI'].$row1['TAMBOL'].$row1['AMPHUR'], 'WORK_LOC' => $row1['DESCR'], 
            'OFF_PHONE' =>$row1['OFFICEPHONE'], 'MOB_PHONE' => $row1['MOBILEPHONE'], 'HIRED_DATE' => $row1['HIRE_DATE'], 
            'PER_EMAIL' => $row1['PERSONELMAIL'], 'BUS_EMAIL' => $row1['BUSINESSMAIL'], 
            'SUPPLIER' => $row['VENDOR_CODE'], 'REQ_GRP' => $req, 'REQ_TYPE' => $req_type, 
            'ASS_GRP' => $ass_grp, 'ASS_SUB_GRP' => $ass_sub_grp, 
            'BRAND' => $brand_grp, 'MODEL_CODE' => $model_grp, 'SERIES' => $row['SERIES'],
            'PRICE' => $row['UNIT_PRICE'], 'SER_NO1' => $row['SERIAL_NO1'], 
            'SER_NO2' => $row['SERIAL_NO2'],'SER_NO3' => $row['SERIAL_NO3'], 'SER_NO4' => $row['SERIAL_NO4'],
            'ASS_CODE' => $row['ASS_CODE'], 'DEL_NOTE' => $row['DEL_NOTE'], 'DEL_DATE' => $row['DEL_DATE'], 
            'MTRL_SHORT' => $row['MTRL_SHORT'], 'LICENSE_START' => $row['LICENSE_START_DATE'], 'LICENSE_MONTH' => $row['LICENSE_MONTH'],
            'LICENSE_EXP' => $row['LICENSE_EXPIRE_DATE'],
            'WAR_START' => $row['WARRANTY_START_DATE'], 'WAR_MONTH' => $row['WARRANTY_MONTH'], 
            'WAR_EXP' => $row['WARRANTY_EXPIRE_DATE'], 'ASS_FLAG' => $row['ASSET_FLAG'],
            'REMARKS' => $row['REMARKS'], 'PO_NUMBER' => $row['PO_NO'], 
            'PO_ITEM' => $row['PO_ITEM'], 'DOC_NO' => $row['DOC_NO'], 'ASS_ID' => $row['ASSET_ID']));
    }
}

else if(isset($_POST['po_no'])){
  $po_no = $_POST['po_no'];
  $po_item = $_POST['po_item'];

  $sql = "SELECT EMPL_ID FROM IT_ASSET_DETAILS
    WHERE PO_NO = :po_no
    AND PO_ITEM = :po_item";
  $res = oci_parse(connection(), $sql);
  oci_bind_by_name($res, ':po_no', $po_no);
  oci_bind_by_name($res, ':po_item', $po_item);
  oci_execute($res);

  $result = "";

  while($row = oci_fetch_assoc($res)){
    $empId = $row['EMPL_ID'];

    $emp_sql = "SELECT a.*, d.DESCR as dept, b.LOCATION, b.EMPL_STATUS, c.DESCR from PERSON_TBL a, JobCur_ee b , 
            location_tbl c, DEPARTMENT_TBL d
            WHERE a.EMPLID = b.EMPLID
            and b.LOCATION = c.LOCATION
            AND b.DEPTID = d.DEPTID
            and b.EMPL_STATUS = 'A'
            and a.EMPLID = :empl";
            $stmt = oci_parse(connection1(), $emp_sql);
            oci_bind_by_name($stmt, ':empl', $empId);
            oci_execute($stmt);
        
            $row1 = oci_fetch_assoc($stmt);

            echo json_encode(array('DEPT' => $row1['DEPT'], 'EMP_ID'=> $row1['EMPLID'], 
            'EMP_ADD' => $row1['SOI'].$row1['TAMBOL'].$row1['AMPHUR'], 'WORK_LOC' => $row1['DESCR'], 
            'OFF_PHONE' =>$row1['OFFICEPHONE'], 'MOB_PHONE' => $row1['MOBILEPHONE'], 'HIRED_DATE' => $row1['HIRE_DATE'], 
            'PER_EMAIL' => $row1['PERSONELMAIL'], 'BUS_EMAIL' => $row1['BUSINESSMAIL']));
  }
}

?>