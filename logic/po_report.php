<?php
 
// header("Content-Type:application/json");

require "../config/connection.php";
// report.php
if(isset($_POST['po_num']) and !isset($_POST['po_no']) and !isset($_POST['po_number'])){
    $po_num = $_POST['po_num'];

    $sql = "SELECT B.DOCUMENT_NO, B.DOCUMENT_DATE, A.PO_NUMBER, B.DEL_DATE, B.PO_ITEM, C.BRAND_NAME, D.MODEL, B.SERIAL_NO1, 
    B.ASS_CODE, B.UNIT, B.QTY, B.UNIT_PRICE, B.DEL_NOTE, B.MTRL_SHORT, B.REMARKS, B.ATTACHMENT 
    FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_BRAND C, IT_ASSET_MODEL D 
    WHERE A.PO_NUMBER = B.PO_NUMBER
    AND B.BRAND = C.BRAND_CODE
    AND B.MODEL = D.MODEL_CODE
    AND A.PO_NUMBER = :po_num";

    $res = oci_parse(connection(), $sql);
    oci_bind_by_name($res, ':po_num', $po_num);
    oci_execute($res);

    $result = "";
    while($row = oci_fetch_assoc($res)){
        $result.="<tr>
        <td><input class='doc_no form-control' value='".$row['DOCUMENT_NO']."' readonly style='border: none; border-radius:0px; background-color: transparent; width:115px'></td>
        <td><input class='doc_date form-control' value='".$row['DOCUMENT_DATE']."' readonly style='border: none; border-radius:0px; background-color: transparent; width:115px'></td>
        <td><input class='po_num form-control' value='".$row['PO_NUMBER']."' readonly style='border: none; border-radius:0px; background-color: transparent; width:115px'></td>
        <td><input class='del_date form-control' value='".$row['DEL_DATE']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='item form-control' value='".$row['PO_ITEM']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='brand_name form-control' value='".$row['BRAND_NAME']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='model form-control' value='".$row['MODEL']."' readonly style='border: none; border-radius:0px; background-color: transparent; width:100px'></td>
        <td><input class='ser_no form-control' value='".$row['SERIAL_NO1']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='ass_code form-control' value='".$row['ASS_CODE']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='unit form-control' value='".$row['UNIT']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='qty form-control' value='".$row['QTY']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='unit_price form-control' value='".$row['UNIT_PRICE']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='del_note form-control' value='".$row['DEL_NOTE']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='mtrl_shrt form-control' value='".$row['MTRL_SHORT']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='remarks form-control' value='".$row['REMARKS']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
        <td><input class='attch form-control' value='".$row['ATTACHMENT']."' readonly style='border: none; border-radius:0px; background-color: transparent;'></td>
      </tr>";
    }
    echo $result;
    // echo json_encode($array);
}

// cancel.php
else if(isset($_POST['po_no']) and !isset($_POST['po_number'])){
    $po_no = $_POST['po_no'];

    $sql = "SELECT B.DOCUMENT_NO, B.DOCUMENT_DATE, A.PO_NUMBER, B.EMPL_ID, B.DEL_DATE, B.ITEM, C.BRAND_NAME, D.MODEL, 
            B.SERIAL_NO, B.ASS_CODE, B.UNIT, B.QTY, B.UNIT_PRICE, B.DEL_NOTE, B.MTRL_SHORT, B.REMARKS, B.ATTACHMENT 
            FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_BRAND C, IT_ASSET_MODEL D 
            WHERE A.PO_NUMBER = B.PO_NUMBER
            AND B.BRAND_CODE = C.BRAND_CODE
            AND B.MODEL_CODE = D.MODEL_CODE
            AND A.PO_NUMBER = :po_no";
    $res = oci_parse(connection(), $sql);
    oci_bind_by_name($res, ':po_no', $po_no);
    oci_execute($res);

    $result = "";
    while($row = oci_fetch_assoc($res)){
      $empId = $row["EMPL_ID"];

      $dept_code = "SELECT NAMEENG FROM PERSON_TBL WHERE EMPLID = :empl";
                    $stmt = oci_parse(connection1(), $dept_code);
                    oci_bind_by_name($stmt, ':empl', $empId);
                    oci_execute($stmt);
                
                    $row1 = oci_fetch_assoc($stmt);

        $result.="
        <div class='modal-body'>
          <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='doc_no form-control' value='".$row['DOCUMENT_NO']."'>
                <label>Document Number:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='doc_date form-control' value='".$row['DOCUMENT_DATE']."'>
                <label>Document Number:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='po_num form-control' value='".$row['PO_NUMBER']."'>
                <label>Document Number:</label>
              </div>
            </div>
        </div>

        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='empl_name form-control' value='".$row1['NAMEENG']."'>
                <label>Employee Name:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='del_date form-control' value='".$row['DEL_DATE']."'>
                <label>Delivery Date:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='item form-control' value='".$row['ITEM']."'>
                <label>Item:</label>
              </div>
            </div>
        </div>

        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='brand_name form-control' value='".$row['BRAND_NAME']."'>
                <label>Brand:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='model form-control' value='".$row['MODEL']."'>
                <label>Model:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='ser_no form-control' value='".$row['SERIAL_NO']."'>
                <label>Serial Number:</label>
              </div>
            </div>
        </div>

        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='ass_code form-control' value='".$row['ASS_CODE']."'>
                <label>Asset Code:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='unit form-control' value='".$row['UNIT']."'>
                <label>Unit:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='qty form-control' value='".$row['QTY']."'>
                <label>Quantity:</label>
              </div>
            </div>
        </div>

        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='unit_price form-control' value='".$row['UNIT_PRICE']."'>
                <label>Unit Price:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='del_note form-control' value='".$row['DEL_NOTE']."'>
                <label>Delivery Note:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='mtrl_shrt form-control' value='".$row['MTRL_SHORT']."'>
                <label>Material Short:</label>
              </div>
            </div>
        </div>

        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='remarks form-control' value='".$row['REMARKS']."'>
                <label>Remarks:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='attch form-control' value='".$row['ATTACHMENT']."' type='file'>
              </div>
            </div>
        </div>
      </div>";
    }
    echo $result;
    // echo json_encode($array);
}

// modify.php
else if(isset($_POST['po_number'])){
  $po_number = $_POST['po_number'];

  $sql = "SELECT B.DOCUMENT_NO, B.DOCUMENT_DATE, A.PO_NUMBER, B.EMPL_ID, B.DEL_DATE, B.PO_ITEM, C.BRAND_NAME, D.MODEL, 
          B.SERIAL_NO1, B.ASS_CODE, B.UNIT, B.QTY, B.UNIT_PRICE, B.DEL_NOTE, B.MTRL_SHORT, B.REMARKS, B.ATTACHMENT 
          FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_BRAND C, IT_ASSET_MODEL D 
          WHERE A.PO_NUMBER = B.PO_NUMBER
          AND B.BRAND = C.BRAND_CODE
          AND B.MODEL = D.MODEL_CODE
          AND A.PO_NUMBER = :po_number";
  $res = oci_parse(connection(), $sql);
  oci_bind_by_name($res, ':po_number', $po_number);
  oci_execute($res);

  $result = "";
  while($row = oci_fetch_assoc($res)){
    $empId = $row["EMPL_ID"];

    $dept_code = "SELECT NAMEENG FROM PERSON_TBL WHERE EMPLID = :empl";
                  $stmt = oci_parse(connection1(), $dept_code);
                  oci_bind_by_name($stmt, ':empl', $empId);
                  oci_execute($stmt);
              
                  $row1 = oci_fetch_assoc($stmt);

      $result.="
      <div class='modal-body'>
        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='doc_no form-control' value='".$row['DOCUMENT_NO']."'>
                <label>Document Number:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='doc_date form-control' value='".$row['DOCUMENT_DATE']."'>
                <label>Document Number:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='po_num form-control' value='".$row['PO_NUMBER']."'>
                <label>Document Number:</label>
              </div>
            </div>
        </div>

        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='empl_name form-control' value='".$row1['NAMEENG']."'>
                <label>Employee Name:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='del_date form-control' value='".$row['DEL_DATE']."'>
                <label>Delivery Date:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='item form-control' value='".$row['PO_ITEM']."'>
                <label>Item:</label>
              </div>
            </div>
        </div>

        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='brand_name form-control' value='".$row['BRAND_NAME']."'>
                <label>Brand:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='model form-control' value='".$row['MODEL']."'>
                <label>Model:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='ser_no form-control' value='".$row['SERIAL_NO1']."'>
                <label>Serial Number:</label>
              </div>
            </div>
        </div>

        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='ass_code form-control' value='".$row['ASS_CODE']."'>
                <label>Asset Code:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='unit form-control' value='".$row['UNIT']."'>
                <label>Unit:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='qty form-control' value='".$row['QTY']."'>
                <label>Quantity:</label>
              </div>
            </div>
        </div>

        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='unit_price form-control' value='".$row['UNIT_PRICE']."'>
                <label>Unit Price:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='del_note form-control' value='".$row['DEL_NOTE']."'>
                <label>Delivery Note:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='mtrl_shrt form-control' value='".$row['MTRL_SHORT']."'>
                <label>Material Short:</label>
              </div>
            </div>
        </div>

        <div class='row g-2' style='margin-left: 40px;'>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='remarks form-control' value='".$row['REMARKS']."'>
                <label>Remarks:</label>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='form-floating mb-3' style='margin-right: 40px;'>
                <input class='attch form-control' value='".$row['ATTACHMENT']."' type='file'>
              </div>
            </div>
        </div>
      </div>";
    }
  echo $result;
}
?>