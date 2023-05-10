<?php

require "../config/connection.php";

if (isset($_POST['data'])){

    if(isset($_POST['po_no']) and !isset($_POST['ser_no']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
    and !isset($_POST['emp_name'])){
        $po_no = $_POST['po_no'];

        $sql1 = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
        FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E
        WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
        AND A.BRAND = C.BRAND_CODE
        AND A.MODEL = D.MODEL_CODE
        AND A.DOCUMENT_NO = E.REF_DOC_NO
        AND E.PO_NUMBER = :po_no";
                
        $res = oci_parse(connection(), $sql1);
        oci_bind_by_name($res, ':po_no', $po_no);
        oci_execute($res);

        $result = "";
        while($row = oci_fetch_assoc($res)){
            $empId = $row["EMPL_ID"];
                                                        
            $dept_code = "SELECT NAMEENG FROM PERSON_TBL 
            WHERE EMPLID = :empl";
            $stmt = oci_parse(connection1(), $dept_code);
            oci_bind_by_name($stmt, ':empl', $empId);
            oci_execute($stmt);
        
            $row1 = oci_fetch_assoc($stmt);

            $result.="<tr>
                        <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
                        <td>".$row["DOCUMENT_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["ASSET_ID"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row["ASSET_SUB_GROUP_NAME"]."</td>
                        <td>".$row["BRAND_NAME"]."</td>
                        <td>".$row["MODEL"]."</td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input hidden class='po_no' value='".$row["PO_NUMBER"]."'></td>
                    </tr>";
        }
        echo $result;
        // echo json_encode($array);
    }

    // ser_no
    else if(isset($_POST['ser_no']) and !isset($_POST['po_no']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
        and !isset($_POST['emp_name'])){
        $ser_no = $_POST['ser_no'];

        $sql1 = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
                FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E
                WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
                AND A.BRAND = C.BRAND_CODE
                AND A.MODEL = D.MODEL_CODE
                AND A.DOCUMENT_NO = E.REF_DOC_NO
                AND A.SERIAL_NO1 = :ser_no";
                
        $res = oci_parse(connection(), $sql1);
        oci_bind_by_name($res, ':ser_no', $ser_no);
        oci_execute($res);

        $result = "";
        while($row = oci_fetch_assoc($res)){
            $empId = $row["EMPL_ID"];
                                                        
            $dept_code = "SELECT NAMEENG FROM PERSON_TBL 
            WHERE EMPLID = :empl";
            $stmt = oci_parse(connection1(), $dept_code);
            oci_bind_by_name($stmt, ':empl', $empId);
            oci_execute($stmt);
        
            $row1 = oci_fetch_assoc($stmt);

            $result.="<tr>
                        <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
                        <td>".$row["DOCUMENT_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["ASSET_ID"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row["ASSET_SUB_GROUP_NAME"]."</td>
                        <td>".$row["BRAND_NAME"]."</td>
                        <td>".$row["MODEL"]."</td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input hidden class='po_no' value='".$row["PO_NUMBER"]."'></td>
                    </tr>";
        }
        echo $result;
    }

    // po_doc_date
    else if(isset($_POST['from_date']) and isset($_POST['to_date']) and !isset($_POST['po_no']) and !isset($_POST['ser_no']) 
        and !isset($_POST['emp_name'])){
        
        $from_date = date_format(date_create($_POST['from_date']), 'd/m/Y');
        $to_date = date_format(date_create($_POST['to_date']), 'd/m/Y');

        $sql1 = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
            FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E, IT_ASSET_HEADER1 F
            WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
            AND A.BRAND = C.BRAND_CODE
            AND A.MODEL = D.MODEL_CODE
            AND A.DOCUMENT_NO = E.REF_DOC_NO
            AND A.PO_NUMBER = F.PO_NUMBER
            AND F.PO_DOCUMENT_DATE
            BETWEEN to_date(:from_date, 'DD/MM/YY') AND to_date(:to_date, 'DD/MM/YY')";
                
        $res = oci_parse(connection(), $sql1);
        oci_bind_by_name($res, ':from_date', $from_date);
        oci_bind_by_name($res, ':to_date', $to_date);
        oci_execute($res);

        $result = "";
        while($row = oci_fetch_assoc($res)){
            $empId = $row["EMPL_ID"];
                                                        
            $dept_code = "SELECT NAMEENG FROM PERSON_TBL 
            WHERE EMPLID = :empl";
            $stmt = oci_parse(connection1(), $dept_code);
            oci_bind_by_name($stmt, ':empl', $empId);
            oci_execute($stmt);
        
            $row1 = oci_fetch_assoc($stmt);

            $result.="<tr>
                        <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
                        <td>".$row["DOCUMENT_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["ASSET_ID"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row["ASSET_SUB_GROUP_NAME"]."</td>
                        <td>".$row["BRAND_NAME"]."</td>
                        <td>".$row["MODEL"]."</td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input hidden class='po_no' value='".$row["PO_NUMBER"]."'></td>
                    </tr>";
        }
        echo $result;
    }

    // emp_name
    else if(isset($_POST['emp_name']) and !isset($_POST['po_no']) and !isset($_POST['ser_no']) 
            and !isset($_POST['from_date']) and !isset($_POST['to_date'])){
        
        $emp_name = $_POST['emp_name'];

        $sql1 = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
                FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E
                WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
                AND A.BRAND = C.BRAND_CODE
                AND A.MODEL = D.MODEL_CODE
                AND A.DOCUMENT_NO = E.REF_DOC_NO
                AND A.EMPL_ID = :emp_name";
                
        $res = oci_parse(connection(), $sql1);
        oci_bind_by_name($res, ':emp_name', $emp_name);
        oci_execute($res);

        $result = "";
        while($row = oci_fetch_assoc($res)){
            $empId = $row["EMPL_ID"];
                                                        
            $dept_code = "SELECT NAMEENG FROM PERSON_TBL 
            WHERE EMPLID = :empl";
            $stmt = oci_parse(connection1(), $dept_code);
            oci_bind_by_name($stmt, ':empl', $empId);
            oci_execute($stmt);
        
            $row1 = oci_fetch_assoc($stmt);

            $result.="<tr>
                        <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
                        <td>".$row["DOCUMENT_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["ASSET_ID"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row["ASSET_SUB_GROUP_NAME"]."</td>
                        <td>".$row["BRAND_NAME"]."</td>
                        <td>".$row["MODEL"]."</td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input hidden class='po_no' value='".$row["PO_NUMBER"]."'></td>
                    </tr>";
        }
        echo $result;
    }
}

?>
