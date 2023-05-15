<?php

require "../config/connection.php";

if (isset($_POST['data'])){

    // PO Number
    if(isset($_POST['po_num1']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) and !isset($_POST['dept']) 
        and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date']) and !isset($_POST['ser_no1'])
        and !isset($_POST['rem'])){

            $po_num1 = $_POST['po_num1'];

            $sql = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
                FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E
                WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
                AND A.BRAND = C.BRAND_CODE
                AND A.MODEL = D.MODEL_CODE
                AND A.DOCUMENT_NO = E.REF_DOC_NO
                AND A.PO_NUMBER = :po_num1";

                $res = oci_parse(connection(), $sql);
                oci_bind_by_name($res, ':po_num1', $po_num1);
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

    // employee name
    else if(isset($_POST['emp_name']) and !isset($_POST['po_num1']) and !isset($_POST['brand']) and !isset($_POST['dept']) 
        and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date']) and !isset($_POST['ser_no1'])
        and !isset($_POST['rem'])){

        $emp_name = $_POST['emp_name'];

        $sql = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
                FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E
                WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
                AND A.BRAND = C.BRAND_CODE
                AND A.MODEL = D.MODEL_CODE
                AND A.DOCUMENT_NO = E.REF_DOC_NO
                AND A.EMPL_ID = :emp_name";

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

    // brand
    else if(isset($_POST['brand']) and !isset($_POST['po_num1']) and !isset($_POST['emp_name']) and !isset($_POST['dept']) 
        and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date']) and !isset($_POST['ser_no1'])
        and !isset($_POST['rem'])){

        $brand = $_POST['brand'];

        $sql = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
                FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E
                WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
                AND A.BRAND = C.BRAND_CODE
                AND A.MODEL = D.MODEL_CODE
                AND A.DOCUMENT_NO = E.REF_DOC_NO
                AND A.BRAND = :brand";

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

    // department
    // else if(isset($_POST['dept']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
    //     and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date']) and !isset($_POST['ser_no1'])
    //     and !isset($_POST['rem'])){

    //     $dept = $_POST['dept'];

    //     $sql = "SELECT A.EMPLID, C.NAMEENG, C.BUSINESSMAIL, B.DESCR FROM JOBCUR_EE A, DEPARTMENT_TBL B, PERSON_TBL C
    //             WHERE A.DEPTID = B.DEPTID
    //             AND B.DEPTID = :dept_id
    //             AND C.EMPLID = A.EMPLID
    //             AND A.EMPL_STATUS = 'A'";

    //         $res = oci_parse(connection1(), $sql);
    //         oci_bind_by_name($res, ':dept_id', $dept);
    //         oci_execute($res);    

    //         $result = "";
    //         while($row = oci_fetch_assoc($res)){
    //             $empId = $row["EMPLID"];
            
    //             $emp_id = "SELECT DISTINCT PO_NUMBER FROM IT_ASSET_DETAILS1
    //                     WHERE EMPL_ID = :emp_id";
    //             $stmt = oci_parse(connection(), $emp_id);
    //             oci_bind_by_name($stmt, ':emp_id', $empId);
    //             oci_execute($stmt);

    //             while($row1 = oci_fetch_assoc($stmt)){
    //                 if($row1['PO_NUMBER'] == "" ){
    //                     $result.=" ";
    //                 }
    //                 else{
    //                     $po_num = $row1['PO_NUMBER'];

    //                     $head_sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, B.MTRL_SHORT, C.VENDOR_NAME FROM IT_ASSET_HEADER1 A, 
    //                         IT_ASSET_VENDORS C, IT_ASSET_DETAILS1 B
    //                         WHERE A.VENDOR_CODE = C.VENDOR_CODE 
    //                         AND A.PO_NUMBER = B.PO_NUMBER
    //                         AND A.PO_NUMBER = :po";

    //                     $res = oci_parse(connection(), $head_sql);
    //                     oci_bind_by_name($res, ':po', $po_num);
    //                     oci_execute($res);

    //                     $row2 = oci_fetch_assoc($res);

    //                     $result.="<tr>
    //                        <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
    //                         <td>".$row2["DOCUMENT_NO"]."</td>
    //                         <td>".$row1["PO_NUMBER"]."</td>
    //                         <td>".$row["NAMEENG"]."</td>
    //                         <td>".$row["DESCR"]."</td>
    //                         <td>".$row2["MTRL_SHORT"]."</td>
    //                         <td>".$row2["VENDOR_NAME"]."</td>
    //                         <td>".$row["BUSINESSMAIL"]."</td>
                                // <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
    //                         <td hidden><input class='po_no' value='".$row1["PO_NUMBER"]."' hidden></td>
    //                     </tr>";
    //                 }
    //             }
    //         }
    //     echo $result;
    // }

    if(isset($_POST['dept']) && !isset($_POST['po_num']) && !isset($_POST['emp_name']) && !isset($_POST['brand']) && 
        !isset($_POST['vendor']) && !isset($_POST['from_date']) && !isset($_POST['to_date']) && !isset($_POST['ser_no1']) 
        && !isset($_POST['rem'])){
        $dept = $_POST['dept'];
        $sql = "SELECT A.EMPLID, A.NAMEENG, A.BUSINESSMAIL, B.DESCR FROM PERSON_TBL A
                INNER JOIN JOBCUR_EE C ON A.EMPLID = C.EMPLID
                INNER JOIN DEPARTMENT_TBL B ON B.DEPTID = C.DEPTID
                WHERE B.DEPTID = :dept_id AND C.EMPL_STATUS = 'A'";
        $res = oci_parse(connection1(), $sql);
        oci_bind_by_name($res, ':dept_id', $dept);
        oci_execute($res);    
    
        $result = "";
        while($row = oci_fetch_assoc($res)){
            $empId = $row["EMPLID"];

            $emp_id = "SELECT DISTINCT PO_NUMBER FROM IT_ASSET_DETAILS1 WHERE EMPL_ID = :emp_id";
            $stmt = oci_parse(connection(), $emp_id);
            oci_bind_by_name($stmt, ':emp_id', $empId);
            oci_execute($stmt);
    
            while($row1 = oci_fetch_assoc($stmt)){
                if($row1['PO_NUMBER'] == ""){
                    $result.=" ";
                } else {
                    $po_num = $row1['PO_NUMBER'];
                    $head_sql = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
                                 FROM IT_ASSET_DETAILS1 A
                                 INNER JOIN IT_ASSET_SUB_GROUP B ON A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
                                 INNER JOIN IT_ASSET_BRAND C ON A.BRAND = C.BRAND_CODE
                                 INNER JOIN IT_ASSET_MODEL D ON A.MODEL = D.MODEL_CODE
                                 INNER JOIN IT_ASSET_TRANSFER_TRN_HDR E ON A.DOCUMENT_NO = E.REF_DOC_NO
                                 WHERE A.PO_NUMBER = :po";
                    $res2 = oci_parse(connection(), $head_sql);
                    oci_bind_by_name($res2, ':po', $po_num);
                    oci_execute($res2);
    
                    while($row2 = oci_fetch_assoc($res2)){
                        $result.="<tr>
                                  <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></td>
                                  <td>".$row2["DOCUMENT_NO"]."</td>
                                  <td>".$row2["PO_ITEM"]."</td>
                                  <td>".$row2["ASSET_ID"]."</td>
                                  <td>".$row["NAMEENG"]."</td>
                                  <td>".$row2["ASSET_SUB_GROUP_NAME"]."</td>
                                  <td>".$row2["BRAND_NAME"]."</td>
                                  <td>".$row2["MODEL"]."</td>
                                  <td hidden><input class='po_item' value=".$row2["PO_ITEM"]." hidden></td>
                                  <td hidden><input hidden class='po_no' value='".$row2["PO_NUMBER"]."'></td>
                                  </tr>";
                    }
                }
            }
        }
        echo $result;
    }
    
    // vendor
    else if(isset($_POST['vendor']) and !isset($_POST['po_num1']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['dept']) and !isset($_POST['from_date']) and !isset($_POST['to_date']) and !isset($_POST['ser_no1']) 
        and !isset($_POST['rem'])){

        $vendor = $_POST['vendor'];

        $sql = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
            FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E, IT_ASSET_HEADER1 F
            WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
            AND A.BRAND = C.BRAND_CODE
            AND A.MODEL = D.MODEL_CODE
            AND A.DOCUMENT_NO = E.REF_DOC_NO
            AND A.DOCUMENT_NO = F.DOCUMENT_NO
            AND F.VENDOR_CODE = :vendor";

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
    else if(isset($_POST['from_date']) and isset($_POST['to_date']) and !isset($_POST['po_num1']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['dept']) and !isset($_POST['vendor']) and !isset($_POST['ser_no1']) and !isset($_POST['rem'])){

        $from_date = date_format(date_create($_POST['from_date']), 'd/m/Y');
        $to_date = date_format(date_create($_POST['to_date']), 'd/m/Y');

        $sql = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
            FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E, IT_ASSET_HEADER1 F
            WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
            AND A.BRAND = C.BRAND_CODE
            AND A.MODEL = D.MODEL_CODE
            AND A.DOCUMENT_NO = E.REF_DOC_NO
            AND A.PO_NUMBER = F.PO_NUMBER
            AND F.PO_DOCUMENT_DATE
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

    // Ser_no1
    else if(isset($_POST['ser_no1']) and !isset($_POST['po_num1']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['dept']) and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
        and !isset($_POST['rem'])){

       $ser_no1 = $_POST['ser_no1'];

        $sql = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
        FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E
        WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
        AND A.BRAND = C.BRAND_CODE
        AND A.MODEL = D.MODEL_CODE
        AND A.DOCUMENT_NO = E.REF_DOC_NO 
        AND A.SERIAL_NO1 = :ser_no1";

            $res = oci_parse(connection(), $sql);
            oci_bind_by_name($res, ':ser_no1', $ser_no1);
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

    // rem
    else if(isset($_POST['rem']) and !isset($_POST['po_num1']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['dept']) and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
        and !isset($_POST['ser_no1'])){

       $rem = $_POST['rem'];

        $sql = "SELECT DISTINCT E.DOCUMENT_NO, A.PO_ITEM, A.PO_NUMBER, A.ASSET_ID, A.EMPL_ID, B.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, D.MODEL
        FROM IT_ASSET_DETAILS1 A, IT_ASSET_SUB_GROUP B, IT_ASSET_BRAND C, IT_ASSET_MODEL D, IT_ASSET_TRANSFER_TRN_HDR E
        WHERE A.SUB_ASSET_GROUP = B.ASSET_SUB_GROUP_CODE
        AND A.BRAND = C.BRAND_CODE
        AND A.MODEL = D.MODEL_CODE
        AND A.DOCUMENT_NO = E.REF_DOC_NO 
        AND A.REMARKS = :rem";

            $res = oci_parse(connection(), $sql);
            oci_bind_by_name($res, ':rem', $rem);
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

    // new_item
    // else if(isset($_POST['new_item']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
    //     and !isset($_POST['dept']) and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
    //     and !isset($_POST['ser_no1']) and !isset($_POST['rem']) and !isset($_POST['modified_item']) and !isset($_POST['cancelled_item'])){

    //    $new_item = $_POST['new_item'];

    //     $sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, B.PO_ITEM, C.VENDOR_NAME, B.EMPL_ID, B.MTRL_SHORT
    //         FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C
    //         WHERE A.PO_NUMBER = B.PO_NUMBER
    //         AND A.VENDOR_CODE = C.VENDOR_CODE
    //         AND B.CANCEL_ASSET_FLAG is null
    //         AND B.LAST_USER_UPDATE is null
    //         AND A.PO_NUMBER = :po_num";

    //         $res = oci_parse(connection(), $sql);
    //         oci_bind_by_name($res, ':po_num', $new_item);
    //         oci_execute($res);    

    //         $result = "";
    //         while($row = oci_fetch_assoc($res)){
    //             $empId = $row["EMPL_ID"];
            
    //             $dept_code = "SELECT A.NAMEENG, A.BUSINESSMAIL, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
    //                 JOBCUR_EE C WHERE B.DEPTID = C.DEPTID
    //                 AND A.EMPLID = C.EMPLID
    //                 AND A.EMPLID = :empl";
    //             $stmt = oci_parse(connection1(), $dept_code);
    //             oci_bind_by_name($stmt, ':empl', $empId);
    //             oci_execute($stmt);
            
    //             $row1 = oci_fetch_assoc($stmt);
        
    //         $result.="<tr>
    //                    <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
    //                     <td>".$row["DOCUMENT_NO"]."</td>
    //                     <td>".$row["PO_ITEM"]."</td>
    //                     <td>".$row["PO_NUMBER"]."</td>
    //                     <td>".$row1["NAMEENG"]."</td>
    //                     <td>".$row1["DESCR"]."</td>
    //                     <td>".$row["MTRL_SHORT"]."</td>
    //                     <td>".$row["VENDOR_NAME"]."</td>
    //                     <td>".$row1["BUSINESSMAIL"]."</td>
    //                     <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
    //                     <td hidden><input class='po_no' value='".$row["PO_NUMBER"]."' hidden></td>
    //                 </tr>";
    //     }
    //     echo $result;
    // }

    // modified_item
    // else if(isset($_POST['modified_item']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
    //     and !isset($_POST['dept']) and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
    //     and !isset($_POST['ser_no1']) and !isset($_POST['rem']) and !isset($_POST['new_item']) and !isset($_POST['cancelled_item'])){

    //    $modified_item = $_POST['modified_item'];

    //     $sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, B.PO_ITEM, C.VENDOR_NAME, B.EMPL_ID, B.MTRL_SHORT
    //         FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C
    //         WHERE A.PO_NUMBER = B.PO_NUMBER
    //         AND A.VENDOR_CODE = C.VENDOR_CODE
    //         AND B.CANCEL_ASSET_FLAG is null
    //         AND B.LAST_USER_UPDATE is not null
    //         AND A.PO_NUMBER = :po_num";

    //         $res = oci_parse(connection(), $sql);
    //         oci_bind_by_name($res, ':po_num', $modified_item);
    //         oci_execute($res);    

    //         $result = "";
    //         while($row = oci_fetch_assoc($res)){
    //             $empId = $row["EMPL_ID"];
            
    //             $dept_code = "SELECT A.NAMEENG, A.BUSINESSMAIL, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
    //                 JOBCUR_EE C WHERE B.DEPTID = C.DEPTID
    //                 AND A.EMPLID = C.EMPLID
    //                 AND A.EMPLID = :empl";
    //             $stmt = oci_parse(connection1(), $dept_code);
    //             oci_bind_by_name($stmt, ':empl', $empId);
    //             oci_execute($stmt);
            
    //             $row1 = oci_fetch_assoc($stmt);
        
    //         $result.="<tr>
    //                    <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
    //                     <td>".$row["DOCUMENT_NO"]."</td>
    //                     <td>".$row["PO_ITEM"]."</td>
    //                     <td>".$row["PO_NUMBER"]."</td>
    //                     <td>".$row1["NAMEENG"]."</td>
    //                     <td>".$row1["DESCR"]."</td>
    //                     <td>".$row["MTRL_SHORT"]."</td>
    //                     <td>".$row["VENDOR_NAME"]."</td>
    //                     <td>".$row1["BUSINESSMAIL"]."</td>
    //                     <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
    //                     <td hidden><input class='po_no' value='".$row["PO_NUMBER"]."' hidden></td>
    //                 </tr>";
    //     }
    //     echo $result;
    // }

    // modified_item
    // else if(isset($_POST['cancelled_item']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
    //     and !isset($_POST['dept']) and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
    //     and !isset($_POST['ser_no1']) and !isset($_POST['rem']) and !isset($_POST['new_item']) and !isset($_POST['modified_item'])){

    //    $cancelled_item = $_POST['cancelled_item'];

    //     $sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, B.PO_ITEM, C.VENDOR_NAME, B.EMPL_ID, B.MTRL_SHORT
    //         FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_VENDORS C
    //         WHERE A.PO_NUMBER = B.PO_NUMBER
    //         AND A.VENDOR_CODE = C.VENDOR_CODE
    //         AND B.CANCEL_ASSET_FLAG is not null
    //         AND A.PO_NUMBER = :po_num";

    //         $res = oci_parse(connection(), $sql);
    //         oci_bind_by_name($res, ':po_num', $cancelled_item);
    //         oci_execute($res);    

    //         $result = "";
    //         while($row = oci_fetch_assoc($res)){
    //             $empId = $row["EMPL_ID"];
            
    //             $dept_code = "SELECT A.NAMEENG, A.BUSINESSMAIL, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, 
    //                 JOBCUR_EE C WHERE B.DEPTID = C.DEPTID
    //                 AND A.EMPLID = C.EMPLID
    //                 AND A.EMPLID = :empl";
    //             $stmt = oci_parse(connection1(), $dept_code);
    //             oci_bind_by_name($stmt, ':empl', $empId);
    //             oci_execute($stmt);
            
    //             $row1 = oci_fetch_assoc($stmt);
        
    //         $result.="<tr>
    //                    <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></i></td>
    //                     <td>".$row["DOCUMENT_NO"]."</td>
    //                     <td>".$row["PO_ITEM"]."</td>
    //                     <td>".$row["PO_NUMBER"]."</td>
    //                     <td>".$row1["NAMEENG"]."</td>
    //                     <td>".$row1["DESCR"]."</td>
    //                     <td>".$row["MTRL_SHORT"]."</td>
    //                     <td>".$row["VENDOR_NAME"]."</td>
    //                     <td>".$row1["BUSINESSMAIL"]."</td>
    //                     <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
    //                     <td hidden><input class='po_no' value='".$row["PO_NUMBER"]."' hidden></td>
    //                 </tr>";
    //     }
    //     echo $result;
    // }
}
?>