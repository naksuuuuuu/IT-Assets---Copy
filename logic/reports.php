<?php

require "../config/connection.php";

if (isset($_POST['data'])){

    // PO Number
    if(isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) and !isset($_POST['dept']) 
        and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])) {

            $po_num = $_POST['po_num'];

            $sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, C.VENDOR_NAME, B.EMPL_ID, B.MTRL_SHORT
            FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C
            WHERE A.PO_NUMBER = B.PO_NUMBER
            AND A.VENDOR_CODE = C.VENDOR_CODE
            AND A.PO_NUMBER = :po_num";

                $res = oci_parse(connection(), $sql);
                oci_bind_by_name($res, ':po_num', $po_num);
                oci_execute($res);    

                $result = "";
                while($row = oci_fetch_assoc($res)){
                    $empId = $row["EMPL_ID"];
                
                    $dept_code = "SELECT A.NAMEENG, A.BUSINESSMAIL, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
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
                            <td>".$row["PO_NUMBER"]."</td>
                            <td>".$row1["NAMEENG"]."</td>
                            <td>".$row1["DESCR"]."</td>
                            <td>".$row["MTRL_SHORT"]."</td>
                            <td>".$row["VENDOR_NAME"]."</td>
                            <td>".$row1["BUSINESSMAIL"]."</td>
                            <td hidden><input class='po_no' value='".$row["PO_NUMBER"]."' hidden></td>
                        </tr>";
            }
            echo $result;
    }

    // employee name
    else if(isset($_POST['emp_name']) and !isset($_POST['po_num']) and !isset($_POST['brand']) and !isset($_POST['dept']) 
        and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])) {

        $emp_name = $_POST['emp_name'];

        $sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, C.VENDOR_NAME, 
                B.EMPL_ID, B.MTRL_SHORT
                FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C
                WHERE A.PO_NUMBER = B.PO_NUMBER
                AND A.VENDOR_CODE = C.VENDOR_CODE
                AND B.EMPL_ID = :emp_name";

            $res = oci_parse(connection(), $sql);
            oci_bind_by_name($res, ':emp_name', $emp_name);
            oci_execute($res);    

            $result = "";
            while($row = oci_fetch_assoc($res)){
                $empId = $row["EMPL_ID"];
            
                $dept_code = "SELECT A.NAMEENG, A.BUSINESSMAIL, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
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
                        <td>".$row["PO_NUMBER"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td hidden><input class='po_no' value='".$row["PO_NUMBER"]."' hidden></td>
                    </tr>";
        }
        echo $result;
    }

    // brand
    else if(isset($_POST['brand']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['dept']) 
        and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])) {

        $brand = $_POST['brand'];

        $sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, C.VENDOR_NAME, 
                B.EMPL_ID, B.MTRL_SHORT
                FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C
                WHERE A.PO_NUMBER = B.PO_NUMBER
                AND A.VENDOR_CODE = C.VENDOR_CODE
                AND B.BRAND = :brand";

            $res = oci_parse(connection(), $sql);
            oci_bind_by_name($res, ':brand', $brand);
            oci_execute($res);    

            $result = "";
            while($row = oci_fetch_assoc($res)){
                $empId = $row["EMPL_ID"];
            
                $dept_code = "SELECT A.NAMEENG, A.BUSINESSMAIL, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
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
                        <td>".$row["PO_NUMBER"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td hidden><input class='po_no' value='".$row["PO_NUMBER"]."' hidden></td>
                    </tr>";
        }
        echo $result;
    }

    // department
    else if(isset($_POST['dept']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])){

        $dept = $_POST['dept'];

        $sql = "SELECT A.EMPLID, C.NAMEENG, C.BUSINESSMAIL, B.DESCR FROM JOBCUR_EE A, DEPARTMENT_TBL B, PERSON_TBL C
                WHERE A.DEPTID = B.DEPTID
                AND B.DEPTID = :dept_id
                AND C.EMPLID = A.EMPLID
                AND A.EMPL_STATUS = 'A'";

            $res = oci_parse(connection1(), $sql);
            oci_bind_by_name($res, ':dept_id', $dept);
            oci_execute($res);    

            $result = "";
            while($row = oci_fetch_assoc($res)){
                $empId = $row["EMPLID"];
            
                $emp_id = "SELECT DISTINCT PO_NUMBER FROM IT_ASSET_DETAILS1
                        WHERE EMPL_ID = :emp_id";
                $stmt = oci_parse(connection(), $emp_id);
                oci_bind_by_name($stmt, ':emp_id', $empId);
                oci_execute($stmt);

                while($row1 = oci_fetch_assoc($stmt)){
                    if($row1['PO_NUMBER'] == "" ){
                        $result.=" ";
                    }
                    else{
                        $po_num = $row1['PO_NUMBER'];

                        $head_sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, B.MTRL_SHORT, C.VENDOR_NAME FROM IT_ASSET_HEADER1 A, 
                            IT_ASSET_VENDORS C, IT_ASSET_DETAILS1 B
                            WHERE A.VENDOR_CODE = C.VENDOR_CODE 
                            AND A.PO_NUMBER = B.PO_NUMBER
                            AND A.PO_NUMBER = :po";

                        $res = oci_parse(connection(), $head_sql);
                        oci_bind_by_name($res, ':po', $po_num);
                        oci_execute($res);

                        $row2 = oci_fetch_assoc($res);

                        $result.="<tr>
                            <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
                            <td>".$row2["DOCUMENT_NO"]."</td>
                            <td>".$row1["PO_NUMBER"]."</td>
                            <td>".$row["NAMEENG"]."</td>
                            <td>".$row["DESCR"]."</td>
                            <td>".$row2["MTRL_SHORT"]."</td>
                            <td>".$row2["VENDOR_NAME"]."</td>
                            <td>".$row["BUSINESSMAIL"]."</td>
                            <td hidden><input class='po_no' value='".$row1["PO_NUMBER"]."' hidden></td>
                        </tr>";
                    }
                }
            }
        echo $result;
    }

    // else if(isset($_POST['dept']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
    //     and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])){
            
    //     $dept = $_POST['dept'];

    //     $sql = "SELECT A.EMPLID, C.NAMEENG, C.BUSINESSMAIL, B.DESCR 
    //             FROM JOBCUR_EE A, DEPARTMENT_TBL B, PERSON_TBL C
    //             WHERE A.DEPTID = B.DEPTID
    //             AND B.DEPTID = :dept_id
    //             AND C.EMPLID = A.EMPLID
    //             AND A.EMPL_STATUS = 'A'";
        
    //     $res = oci_parse(connection1(), $sql);
    //     oci_bind_by_name($res, ':dept_id', $dept);
    //     oci_execute($res);
        
    //     $empIds = array();
    //     while($row = oci_fetch_assoc($res)){
    //         $empIds[] = $row["EMPLID"];
    //     }

    //     $result = "";

    //     foreach($empIds as $empId) {
    //         $emp_id = "SELECT DISTINCT PO_NUMBER FROM IT_ASSET_DETAILS1
    //                 WHERE EMPL_ID = :emp_id";
    //         $stmt = oci_parse(connection(), $emp_id);
    //         oci_bind_by_name($stmt, ':emp_id', $empId);
    //         oci_execute($stmt);

    //         while($row1 = oci_fetch_assoc($stmt)){
    //             if($row1['PO_NUMBER'] == "" ){
    //                 $result.=" ";
    //             }
    //             else{
    //                 $po_num = $row1['PO_NUMBER'];

    //                 $head_sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, B.MTRL_SHORT, C.VENDOR_NAME 
    //                             FROM IT_ASSET_HEADER1 A, IT_ASSET_VENDORS C, IT_ASSET_DETAILS1 B
    //                             WHERE A.VENDOR_CODE = C.VENDOR_CODE 
    //                             AND A.PO_NUMBER = B.PO_NUMBER
    //                             AND A.PO_NUMBER = :po";

    //                 $res = oci_parse(connection(), $head_sql);
    //                 oci_bind_by_name($res, ':po', $po_num);
    //                 oci_execute($res);

    //                 $row2 = oci_fetch_assoc($res);

    //                 $result.="<tr>
    //                         <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
    //                         <td>".$row2["DOCUMENT_NO"]."</td>
    //                         <td>".$row1["PO_NUMBER"]."</td>
    //                         <td>".$row["NAMEENG"]."</td>
    //                         <td>".$row["DESCR"]."</td>
    //                         <td>".$row2["MTRL_SHORT"]."</td>
    //                         <td>".$row2["VENDOR_NAME"]."</td>
    //                         <td>".$row["BUSINESSMAIL"]."</td>
    //                         <td hidden><input class='po_no' value='".$row1["PO_NUMBER"]."' hidden></td>
    //                     </tr>";
    //             }
    //         }
    //     }
    //     echo $result;
    // }

    // vendor
    else if(isset($_POST['vendor']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['dept']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])){

        $vendor = $_POST['vendor'];

        $sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, C.VENDOR_NAME, 
                B.EMPL_ID, B.MTRL_SHORT
                FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C
                WHERE A.PO_NUMBER = B.PO_NUMBER
                AND A.VENDOR_CODE = C.VENDOR_CODE
                AND A.VENDOR_CODE = :vendor";

            $res = oci_parse(connection(), $sql);
            oci_bind_by_name($res, ':vendor', $vendor);
            oci_execute($res);    

            $result = "";
            while($row = oci_fetch_assoc($res)){
                $empId = $row["EMPL_ID"];
            
                $dept_code = "SELECT A.NAMEENG, A.BUSINESSMAIL, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
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
                        <td>".$row["PO_NUMBER"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td hidden><input class='po_no' value='".$row["PO_NUMBER"]."' hidden></td>
                    </tr>";
        }
        echo $result;
    }

    // po_doc_date
    else if(isset($_POST['from_date']) and isset($_POST['to_date']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['dept']) and !isset($_POST['vendor'])){

        $from_date = date_format(date_create($_POST['from_date']), 'd/m/Y');
        $to_date = date_format(date_create($_POST['to_date']), 'd/m/Y');

        $sql = "SELECT DISTINCT A.DOCUMENT_NO, A.PO_NUMBER, A.PO_DOCUMENT_DATE, C.VENDOR_NAME, 
        B.EMPL_ID, B.MTRL_SHORT 
        FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C
        WHERE A.PO_NUMBER = B.PO_NUMBER AND A.VENDOR_CODE = C.VENDOR_CODE AND A.PO_DOCUMENT_DATE
        BETWEEN to_date(:from_date, 'DD/MM/YY') AND to_date(:to_date, 'DD/MM/YY')";

            $res = oci_parse(connection(), $sql);
            oci_bind_by_name($res, ':from_date', $from_date);
            oci_bind_by_name($res, ':to_date', $to_date);
            oci_execute($res);    

            $result = "";
            while($row = oci_fetch_assoc($res)){
                $empId = $row["EMPL_ID"];
            
                $dept_code = "SELECT A.NAMEENG, A.BUSINESSMAIL, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
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
                        <td>".$row["PO_NUMBER"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td hidden><input class='po_no' value='".$row["PO_NUMBER"]."' hidden></td>
                    </tr>";
        }
        echo $result;
    }
}
?>
