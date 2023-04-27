<?php

require "../config/connection.php";

// cancel
if(isset($_POST['doc_no'])){
    $doc_no = $_POST['doc_no'];

    // $sql = "SELECT DOCUMENT_NO FROM IT_ASSET_HEADER WHERE DOCUMENT_NO = :doc_num";
    
    $sql1 = "SELECT A.DOCUMENT_NO, A.DOCUMENT_DATE, A.PO_NUMBER, A.PO_DOCUMENT_DATE, A.DEPARTMENT_CODE, B.VENDOR_NAME
             FROM IT_ASSET_HEADER A, IT_ASSET_VENDORS B 
             WHERE A.VENDOR_CODE = B.VENDOR_CODE
             AND A.DOCUMENT_NO = :doc_num";
            
    $res = oci_parse(connection(), $sql1);
    oci_bind_by_name($res, ':doc_num', $doc_no);
    oci_execute($res);

    $result = "";
    while($row = oci_fetch_assoc($res)){
        $deptId = $row['DEPARTMENT_CODE'];

        $dept_code = "SELECT DESCR FROM DEPARTMENT_TBL WHERE DEPTID = :dept";
                    $stmt = oci_parse(connection1(), $dept_code);
                    oci_bind_by_name($stmt, ':dept', $deptId);
                    oci_execute($stmt);
                
                    $row1 = oci_fetch_assoc($stmt);

        $result.="<tr>
                    <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
                    <td>".$row["DOCUMENT_NO"]."</td>
                    <td>".$row["DOCUMENT_DATE"]."</td>
                    <td>".$row["PO_NUMBER"]."</td>
                    <td>".$row["PO_DOCUMENT_DATE"]."</td>
                    <td>".$row1["DESCR"]."</td>
                    <td>".$row["VENDOR_NAME"]."</td>
                    <td hidden><input hidden class='po_no' value='".$row["PO_NUMBER"]."'></td>
                  </tr>";
    }
    echo $result;
    // echo json_encode($array);
}

?>
