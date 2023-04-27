<?php

require "../config/connection.php";

if (isset($_POST['data'])){

    if(isset($_POST['po_no']) and !isset($_POST['ser_no'])){
        $po_no = $_POST['po_no'];

        $sql1 = "SELECT A.DOCUMENT_NO, A.DOCUMENT_DATE, A.PO_NUMBER, A.PO_DOCUMENT_DATE, B.EMPL_ID, C.VENDOR_NAME
                FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C 
                WHERE A.PO_NUMBER = B.PO_NUMBER
                AND A.VENDOR_CODE = C.VENDOR_CODE
                AND B.PO_NUMBER = :po_no";
                
        $res = oci_parse(connection(), $sql1);
        oci_bind_by_name($res, ':po_no', $po_no);
        oci_execute($res);

        $result = "";
        while($row = oci_fetch_assoc($res)){
            $empId = $row["EMPL_ID"];
                                                        
            $dept_code = "SELECT B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
            JOBCUR_EE C WHERE B.DEPTID = C.DEPTID
            AND A.EMPLID = C.EMPLID
            AND A.EMPLID = :empl";
            $stmt = oci_parse(connection1(), $dept_code);
            oci_bind_by_name($stmt, ':empl', $empId);
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

    // ser_no
    else if(isset($_POST['ser_no']) and !isset($_POST['po_no'])){
        $ser_no = $_POST['ser_no'];

        $sql1 = "SELECT A.DOCUMENT_NO, A.DOCUMENT_DATE, A.PO_NUMBER, A.PO_DOCUMENT_DATE, B.EMPL_ID, C.VENDOR_NAME
                FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C 
                WHERE A.PO_NUMBER = B.PO_NUMBER
                AND A.VENDOR_CODE = C.VENDOR_CODE
                AND B.SERIAL_NO1 = :ser_no";
                
        $res = oci_parse(connection(), $sql1);
        oci_bind_by_name($res, ':ser_no', $ser_no);
        oci_execute($res);

        $result = "";
        while($row = oci_fetch_assoc($res)){
            $empId = $row["EMPL_ID"];
                                                        
            $dept_code = "SELECT B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
            JOBCUR_EE C WHERE B.DEPTID = C.DEPTID
            AND A.EMPLID = C.EMPLID
            AND A.EMPLID = :empl";
            $stmt = oci_parse(connection1(), $dept_code);
            oci_bind_by_name($stmt, ':empl', $empId);
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
    }
}

?>
