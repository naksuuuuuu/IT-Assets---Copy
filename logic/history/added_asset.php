<?php

require "../../config/connection.php";

if (isset($_POST['data'])){

    // PO Number
    if(isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) and !isset($_POST['dept']) 
        and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date']) and !isset($_POST['ser_no1'])
        and !isset($_POST['rem'])){

            $po_num = $_POST['po_num'];

            $sql = "SELECT DISTINCT A.DOC_NO, A.PO_NO, C.VENDOR_NAME, 
                B.EMPL_ID, B.MTRL_SHORT, B.PO_ITEM, B.REQ_GRP_ID, E.REQ_GRP_NAME, B.REQ_TYPE_ID, D.REQ_TYPE_NAME, 
                B.ASSET_GRP_CODE, F.ASSET_GRP_NAME, B.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME, B.BRAND_CODE, H.BRAND_NAME, 
                B.MODEL_CODE, I.MODEL_NAME
                FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_VENDORS C, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
                IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
                WHERE A.DOC_NO = B.DOC_NO
                AND B.REQ_TYPE_ID = D.REQ_TYPE_ID
                AND B.REQ_GRP_ID = E.REQ_GRP_ID
                AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
                AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
                AND B.BRAND_CODE = H.BRAND_CODE
                AND B.MODEL_CODE = I.MODEL_CODE
                AND A.VENDOR_CODE = C.VENDOR_CODE
                AND B.CANCEL_ASSET_FLAG is null
                AND B.LAST_USER_UPDATE is null
                AND A.PO_NO = :po_num
                ORDER BY A.DOC_NO DESC";

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
                            <td>".$row["DOC_NO"]."</td>
                            <td>".$row["PO_ITEM"]."</td>
                            <td>".$row["PO_NO"]."</td>
                            <td>".$row1["NAMEENG"]."</td>
                            <td>".$row1["DESCR"]."</td>
                            <td>".$row["MTRL_SHORT"]."</td>
                            <td>".$row["VENDOR_NAME"]."</td>
                            <td>".$row1["BUSINESSMAIL"]."</td>
                            <td>";
                            $attch_sql = "SELECT ATTACHMENT FROM IT_ASSET_ATTACHMENT 
                            WHERE DOC_NO = :doc_no
                            AND PO_NO = :po_no
                            AND PO_ITEM = :po_item"; 
                            $res1 = oci_parse(connection(), $attch_sql);
                            oci_bind_by_name($res1, ':doc_no', $row['DOC_NO']);
                            oci_bind_by_name($res1, ':po_no', $row['PO_NO']);
                            oci_bind_by_name($res1, ':po_item', $row['PO_ITEM']);

                            oci_execute($res1);
                            while($attach_row = oci_fetch_row($res1)){
                                $fileExtension = pathinfo($attach_row[0], PATHINFO_EXTENSION);
                                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $result.="<img id='view_attch' class='view_attch' src='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."'>";
                                } 
                                
                                else if ($fileExtension === 'pdf') {
                                    $result.="<a href='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."' target='_blank'>".$attach_row[0]."</a>";
                                } 
                                
                                else {
                                    $result.="Unsupported file format";
                                }
                            }
                            $result.="</td>
                            <td><button class='btn btn-primary upload_attch' id='upload_attch'><i class='fa-solid fa-upload'></i></button></td>
                            <td hidden><input class='req_grp_code' value='".$row["REQ_GRP_ID"]."'></td>
                            <td hidden><input class='req_grp_name' value='".$row["REQ_GRP_NAME"]."'></td>
                            <td hidden><input class='req_type_code' value='".$row["REQ_TYPE_ID"]."'></td>
                            <td hidden><input class='req_type_name' value='".$row["REQ_TYPE_NAME"]."'></td>
                            <td hidden><input class='ass_grp_code' value='".$row["ASSET_GRP_CODE"]."'></td>
                            <td hidden><input class='ass_grp_name' value='".$row["ASSET_GRP_NAME"]."'></td>
                            <td hidden><input class='ass_sub_grp_code' value='".$row["ASSET_SUB_GRP_CODE"]."'></td>
                            <td hidden><input class='ass_sub_grp_name' value='".$row["ASSET_SUB_GRP_NAME"]."'></td>
                            <td hidden><input class='brand_code' value='".$row["BRAND_CODE"]."'></td>
                            <td hidden><input class='brand_name' value='".$row["BRAND_NAME"]."'></td>
                            <td hidden><input class='model_code' value='".$row["MODEL_CODE"]."'></td>
                            <td hidden><input class='model_name' value='".$row["MODEL_NAME"]."'></td>
                            <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                            <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                        </tr>";
            }
            echo $result;
    }

    // employee name
    else if(isset($_POST['emp_name']) and !isset($_POST['po_num']) and !isset($_POST['brand']) and !isset($_POST['dept']) 
        and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date']) and !isset($_POST['ser_no1'])
        and !isset($_POST['rem'])){

        $emp_name = $_POST['emp_name'];

        $sql = "SELECT DISTINCT A.DOC_NO, A.PO_NO, C.VENDOR_NAME, 
                B.EMPL_ID, B.MTRL_SHORT, B.PO_ITEM, B.REQ_GRP_ID, E.REQ_GRP_NAME, B.REQ_TYPE_ID, D.REQ_TYPE_NAME, 
                B.ASSET_GRP_CODE, F.ASSET_GRP_NAME, B.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME, B.BRAND_CODE, H.BRAND_NAME, 
                B.MODEL_CODE, I.MODEL_NAME
                FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_VENDORS C, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
                IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
                WHERE A.DOC_NO = B.DOC_NO
                AND B.REQ_TYPE_ID = D.REQ_TYPE_ID
                AND B.REQ_GRP_ID = E.REQ_GRP_ID
                AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
                AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
                AND B.BRAND_CODE = H.BRAND_CODE
                AND B.MODEL_CODE = I.MODEL_CODE
                AND A.VENDOR_CODE = C.VENDOR_CODE
                AND B.CANCEL_ASSET_FLAG is null
                AND B.LAST_USER_UPDATE is null
                AND B.EMPL_ID = :emp_name
                ORDER BY A.DOC_NO DESC";

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
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["PO_NO"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td>";
                            $attch_sql = "SELECT ATTACHMENT FROM IT_ASSET_ATTACHMENT 
                            WHERE DOC_NO = :doc_no
                            AND PO_NO = :po_no
                            AND PO_ITEM = :po_item"; 
                            $res1 = oci_parse(connection(), $attch_sql);
                            oci_bind_by_name($res1, ':doc_no', $row['DOC_NO']);
                            oci_bind_by_name($res1, ':po_no', $row['PO_NO']);
                            oci_bind_by_name($res1, ':po_item', $row['PO_ITEM']);

                            oci_execute($res1);
                            while($attach_row = oci_fetch_row($res1)){
                                $fileExtension = pathinfo($attach_row[0], PATHINFO_EXTENSION);
                                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $result.="<img id='view_attch' class='view_attch' src='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."'>";
                                } 
                                
                                else if ($fileExtension === 'pdf') {
                                    $result.="<a href='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."' target='_blank'>".$attach_row[0]."</a>";
                                } 
                                
                                else {
                                    $result.="Unsupported file format";
                                }
                            }
                        $result.="</td>
                        <td><button class='btn btn-primary upload_attch' id='upload_attch'><i class='fa-solid fa-upload'></i></button></td>
                        <td hidden><input class='req_grp_code' value='".$row["REQ_GRP_ID"]."'></td>
                        <td hidden><input class='req_grp_name' value='".$row["REQ_GRP_NAME"]."'></td>
                        <td hidden><input class='req_type_code' value='".$row["REQ_TYPE_ID"]."'></td>
                        <td hidden><input class='req_type_name' value='".$row["REQ_TYPE_NAME"]."'></td>
                        <td hidden><input class='ass_grp_code' value='".$row["ASSET_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_grp_name' value='".$row["ASSET_GRP_NAME"]."'></td>
                        <td hidden><input class='ass_sub_grp_code' value='".$row["ASSET_SUB_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_sub_grp_name' value='".$row["ASSET_SUB_GRP_NAME"]."'></td>
                        <td hidden><input class='brand_code' value='".$row["BRAND_CODE"]."'></td>
                        <td hidden><input class='brand_name' value='".$row["BRAND_NAME"]."'></td>
                        <td hidden><input class='model_code' value='".$row["MODEL_CODE"]."'></td>
                        <td hidden><input class='model_name' value='".$row["MODEL_NAME"]."'></td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                    </tr>";
        }
        echo $result;
    }

    // brand
    else if(isset($_POST['brand']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['dept']) 
        and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date']) and !isset($_POST['ser_no1'])
        and !isset($_POST['rem'])){

        $brand = $_POST['brand'];

        $sql = "SELECT DISTINCT A.DOC_NO, A.PO_NO, C.VENDOR_NAME, 
                B.EMPL_ID, B.MTRL_SHORT, B.PO_ITEM, B.REQ_GRP_ID, E.REQ_GRP_NAME, B.REQ_TYPE_ID, D.REQ_TYPE_NAME, 
                B.ASSET_GRP_CODE, F.ASSET_GRP_NAME, B.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME, B.BRAND_CODE, H.BRAND_NAME, 
                B.MODEL_CODE, I.MODEL_NAME
                FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_VENDORS C, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
                IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
                WHERE A.DOC_NO = B.DOC_NO
                AND B.REQ_TYPE_ID = D.REQ_TYPE_ID
                AND B.REQ_GRP_ID = E.REQ_GRP_ID
                AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
                AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
                AND B.BRAND_CODE = H.BRAND_CODE
                AND B.MODEL_CODE = I.MODEL_CODE
                AND A.VENDOR_CODE = C.VENDOR_CODE
                AND B.CANCEL_ASSET_FLAG is null
                AND B.LAST_USER_UPDATE is null
                AND B.BRAND_CODE = :brand
                ORDER BY A.DOC_NO DESC";

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
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["PO_NO"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td>";
                            $attch_sql = "SELECT ATTACHMENT FROM IT_ASSET_ATTACHMENT 
                            WHERE DOC_NO = :doc_no
                            AND PO_NO = :po_no
                            AND PO_ITEM = :po_item"; 
                            $res1 = oci_parse(connection(), $attch_sql);
                            oci_bind_by_name($res1, ':doc_no', $row['DOC_NO']);
                            oci_bind_by_name($res1, ':po_no', $row['PO_NO']);
                            oci_bind_by_name($res1, ':po_item', $row['PO_ITEM']);

                            oci_execute($res1);
                            while($attach_row = oci_fetch_row($res1)){
                                $fileExtension = pathinfo($attach_row[0], PATHINFO_EXTENSION);
                                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $result.="<img id='view_attch' class='view_attch' src='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."'>";
                                } 
                                
                                else if ($fileExtension === 'pdf') {
                                    $result.="<a href='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."' target='_blank'>".$attach_row[0]."</a>";
                                } 
                                
                                else {
                                    $result.="Unsupported file format";
                                }
                            }
                        $result.="</td>
                        <td><button class='btn btn-primary upload_attch' id='upload_attch'><i class='fa-solid fa-upload'></i></button></td>
                        <td hidden><input class='req_grp_code' value='".$row["REQ_GRP_ID"]."'></td>
                        <td hidden><input class='req_grp_name' value='".$row["REQ_GRP_NAME"]."'></td>
                        <td hidden><input class='req_type_code' value='".$row["REQ_TYPE_ID"]."'></td>
                        <td hidden><input class='req_type_name' value='".$row["REQ_TYPE_NAME"]."'></td>
                        <td hidden><input class='ass_grp_code' value='".$row["ASSET_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_grp_name' value='".$row["ASSET_GRP_NAME"]."'></td>
                        <td hidden><input class='ass_sub_grp_code' value='".$row["ASSET_SUB_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_sub_grp_name' value='".$row["ASSET_SUB_GRP_NAME"]."'></td>
                        <td hidden><input class='brand_code' value='".$row["BRAND_CODE"]."'></td>
                        <td hidden><input class='brand_name' value='".$row["BRAND_NAME"]."'></td>
                        <td hidden><input class='model_code' value='".$row["MODEL_CODE"]."'></td>
                        <td hidden><input class='model_name' value='".$row["MODEL_NAME"]."'></td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
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

    else if(isset($_POST['dept']) && !isset($_POST['po_num']) && !isset($_POST['emp_name']) && !isset($_POST['brand']) 
        && !isset($_POST['vendor']) && !isset($_POST['from_date']) && !isset($_POST['to_date']) && !isset($_POST['ser_no1'])
        && !isset($_POST['rem'])){

        $dept = $_POST['dept'];

        $sql = "SELECT A.EMPLID, C.NAMEENG, C.BUSINESSMAIL, B.DESCR FROM JOBCUR_EE A 
                INNER JOIN DEPARTMENT_TBL B ON A.DEPTID = B.DEPTID
                INNER JOIN PERSON_TBL C ON C.EMPLID = A.EMPLID
                WHERE B.DEPTID = :dept_id AND A.EMPL_STATUS = 'A'";

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
                if($row1['PO_NUMBER'] == "" ){
                    $result.=" ";
                }
                else{
                    $po_num = $row1['PO_NUMBER'];

                    $head_sql = "SELECT A.DOCUMENT_NO, A.PO_NUMBER, B.MTRL_SHORT, B.PO_ITEM, C.VENDOR_NAME FROM IT_ASSET_HEADER1 A 
                                INNER JOIN IT_ASSET_VENDORS C ON A.VENDOR_CODE = C.VENDOR_CODE 
                                INNER JOIN IT_ASSET_DETAILS1 B ON A.DOCUMENT_NO = B.DOCUMENT_NO
                                WHERE A.PO_NUMBER = :po
                                AND B.CANCEL_ASSET_FLAG is null
                                AND B.LAST_USER_UPDATE is null
                                ORDER BY A.DOCUMENT_NO DESC";

                    $res2 = oci_parse(connection(), $head_sql);
                    oci_bind_by_name($res2, ':po', $po_num);
                    oci_execute($res2);

                    $row2 = oci_fetch_assoc($res2);

                    $result.="<tr>
                        <td style='text-align: center'><img id='plusImg' class='view_dtl' src='../../assets/add-free-icon-font.png'></td>
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["PO_NO"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td hidden><input class='req_grp_code' value='".$row["REQ_GRP_ID"]."'></td>
                        <td hidden><input class='req_grp_name' value='".$row["REQ_GRP_NAME"]."'></td>
                        <td hidden><input class='req_type_code' value='".$row["REQ_TYPE_ID"]."'></td>
                        <td hidden><input class='req_type_name' value='".$row["REQ_TYPE_NAME"]."'></td>
                        <td hidden><input class='ass_grp_code' value='".$row["ASSET_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_grp_name' value='".$row["ASSET_GRP_NAME"]."'></td>
                        <td hidden><input class='ass_sub_grp_code' value='".$row["ASSET_SUB_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_sub_grp_name' value='".$row["ASSET_SUB_GRP_NAME"]."'></td>
                        <td hidden><input class='brand_code' value='".$row["BRAND_CODE"]."'></td>
                        <td hidden><input class='brand_name' value='".$row["BRAND_NAME"]."'></td>
                        <td hidden><input class='model_code' value='".$row["MODEL_CODE"]."'></td>
                        <td hidden><input class='model_name' value='".$row["MODEL_NAME"]."'></td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                    </tr>";
                }
            }
        }
        echo $result;
    }

    // vendor
    else if(isset($_POST['vendor']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['dept']) and !isset($_POST['from_date']) and !isset($_POST['to_date']) and !isset($_POST['ser_no1']) 
        and !isset($_POST['rem'])){

        $vendor = $_POST['vendor'];

        $sql = "SELECT DISTINCT A.DOC_NO, A.PO_NO, C.VENDOR_NAME, 
                B.EMPL_ID, B.MTRL_SHORT, B.PO_ITEM, B.REQ_GRP_ID, E.REQ_GRP_NAME, B.REQ_TYPE_ID, D.REQ_TYPE_NAME, 
                B.ASSET_GRP_CODE, F.ASSET_GRP_NAME, B.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME, B.BRAND_CODE, H.BRAND_NAME, 
                B.MODEL_CODE, I.MODEL_NAME
                FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_VENDORS C, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
                IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
                WHERE A.DOC_NO = B.DOC_NO
                AND B.REQ_TYPE_ID = D.REQ_TYPE_ID
                AND B.REQ_GRP_ID = E.REQ_GRP_ID
                AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
                AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
                AND B.BRAND_CODE = H.BRAND_CODE
                AND B.MODEL_CODE = I.MODEL_CODE
                AND A.VENDOR_CODE = C.VENDOR_CODE
                AND B.CANCEL_ASSET_FLAG is null
                AND B.LAST_USER_UPDATE is null
                AND A.VENDOR_CODE = :vendor
                ORDER BY A.DOC_NO DESC";

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
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["PO_NO"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td>";
                            $attch_sql = "SELECT ATTACHMENT FROM IT_ASSET_ATTACHMENT 
                            WHERE DOC_NO = :doc_no
                            AND PO_NO = :po_no
                            AND PO_ITEM = :po_item"; 
                            $res1 = oci_parse(connection(), $attch_sql);
                            oci_bind_by_name($res1, ':doc_no', $row['DOC_NO']);
                            oci_bind_by_name($res1, ':po_no', $row['PO_NO']);
                            oci_bind_by_name($res1, ':po_item', $row['PO_ITEM']);

                            oci_execute($res1);
                            while($attach_row = oci_fetch_row($res1)){
                                $fileExtension = pathinfo($attach_row[0], PATHINFO_EXTENSION);
                                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $result.="<img id='view_attch' class='view_attch' src='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."'>";
                                } 
                                
                                else if ($fileExtension === 'pdf') {
                                    $result.="<a href='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."' target='_blank'>".$attach_row[0]."</a>";
                                } 
                                
                                else {
                                    $result.="Unsupported file format";
                                }
                            }
                        $result.="</td>
                        <td><button class='btn btn-primary upload_attch' id='upload_attch'><i class='fa-solid fa-upload'></i></button></td>
                        <td hidden><input class='req_grp_code' value='".$row["REQ_GRP_ID"]."'></td>
                        <td hidden><input class='req_grp_name' value='".$row["REQ_GRP_NAME"]."'></td>
                        <td hidden><input class='req_type_code' value='".$row["REQ_TYPE_ID"]."'></td>
                        <td hidden><input class='req_type_name' value='".$row["REQ_TYPE_NAME"]."'></td>
                        <td hidden><input class='ass_grp_code' value='".$row["ASSET_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_grp_name' value='".$row["ASSET_GRP_NAME"]."'></td>
                        <td hidden><input class='ass_sub_grp_code' value='".$row["ASSET_SUB_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_sub_grp_name' value='".$row["ASSET_SUB_GRP_NAME"]."'></td>
                        <td hidden><input class='brand_code' value='".$row["BRAND_CODE"]."'></td>
                        <td hidden><input class='brand_name' value='".$row["BRAND_NAME"]."'></td>
                        <td hidden><input class='model_code' value='".$row["MODEL_CODE"]."'></td>
                        <td hidden><input class='model_name' value='".$row["MODEL_NAME"]."'></td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                    </tr>";
        }
        echo $result;
    }

    //doc_date
    else if(isset($_POST['from_date']) and isset($_POST['to_date']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['dept']) and !isset($_POST['vendor']) and !isset($_POST['ser_no1']) and !isset($_POST['rem'])){

        $from_date = date_format(date_create($_POST['from_date']), 'd/m/Y');
        $to_date = date_format(date_create($_POST['to_date']), 'd/m/Y');

        $sql = "SELECT DISTINCT A.DOC_NO, A.PO_NO, C.VENDOR_NAME, 
        B.EMPL_ID, B.MTRL_SHORT, B.PO_ITEM, B.REQ_GRP_ID, E.REQ_GRP_NAME, B.REQ_TYPE_ID, D.REQ_TYPE_NAME, 
        B.ASSET_GRP_CODE, F.ASSET_GRP_NAME, B.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME, B.BRAND_CODE, H.BRAND_NAME, 
        B.MODEL_CODE, I.MODEL_NAME
        FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_VENDORS C, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
        IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
        WHERE A.DOC_NO = B.DOC_NO
        AND B.REQ_TYPE_ID = D.REQ_TYPE_ID
        AND B.REQ_GRP_ID = E.REQ_GRP_ID
        AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
        AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
        AND B.BRAND_CODE = H.BRAND_CODE
        AND B.MODEL_CODE = I.MODEL_CODE
        AND A.VENDOR_CODE = C.VENDOR_CODE
        AND B.CANCEL_ASSET_FLAG is null
        AND B.LAST_USER_UPDATE is null
        AND A.DOC_DATE
        BETWEEN to_date(:from_date, 'DD/MM/YY') AND to_date(:to_date, 'DD/MM/YY')
        ORDER BY A.DOC_NO DESC";

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
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["PO_NO"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td>";
                            $attch_sql = "SELECT ATTACHMENT FROM IT_ASSET_ATTACHMENT 
                            WHERE DOC_NO = :doc_no
                            AND PO_NO = :po_no
                            AND PO_ITEM = :po_item"; 
                            $res1 = oci_parse(connection(), $attch_sql);
                            oci_bind_by_name($res1, ':doc_no', $row['DOC_NO']);
                            oci_bind_by_name($res1, ':po_no', $row['PO_NO']);
                            oci_bind_by_name($res1, ':po_item', $row['PO_ITEM']);

                            oci_execute($res1);
                            while($attach_row = oci_fetch_row($res1)){
                                $fileExtension = pathinfo($attach_row[0], PATHINFO_EXTENSION);
                                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $result.="<img id='view_attch' class='view_attch' src='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."'>";
                                } 
                                
                                else if ($fileExtension === 'pdf') {
                                    $result.="<a href='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."' target='_blank'>".$attach_row[0]."</a>";
                                } 
                                
                                else {
                                    $result.="Unsupported file format";
                                }
                            }
                        $result.="</td>
                        <td><button class='btn btn-primary upload_attch' id='upload_attch'><i class='fa-solid fa-upload'></i></button></td>
                        <td hidden><input class='req_grp_code' value='".$row["REQ_GRP_ID"]."'></td>
                        <td hidden><input class='req_grp_name' value='".$row["REQ_GRP_NAME"]."'></td>
                        <td hidden><input class='req_type_code' value='".$row["REQ_TYPE_ID"]."'></td>
                        <td hidden><input class='req_type_name' value='".$row["REQ_TYPE_NAME"]."'></td>
                        <td hidden><input class='ass_grp_code' value='".$row["ASSET_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_grp_name' value='".$row["ASSET_GRP_NAME"]."'></td>
                        <td hidden><input class='ass_sub_grp_code' value='".$row["ASSET_SUB_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_sub_grp_name' value='".$row["ASSET_SUB_GRP_NAME"]."'></td>
                        <td hidden><input class='brand_code' value='".$row["BRAND_CODE"]."'></td>
                        <td hidden><input class='brand_name' value='".$row["BRAND_NAME"]."'></td>
                        <td hidden><input class='model_code' value='".$row["MODEL_CODE"]."'></td>
                        <td hidden><input class='model_name' value='".$row["MODEL_NAME"]."'></td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                    </tr>";
        }
        echo $result;
    }

    // Ser_no1
    else if(isset($_POST['ser_no1']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['dept']) and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
        and !isset($_POST['rem'])){

       $ser_no1 = $_POST['ser_no1'];

        $sql = "SELECT DISTINCT A.DOC_NO, A.PO_NO, C.VENDOR_NAME, 
        B.EMPL_ID, B.MTRL_SHORT, B.PO_ITEM, B.REQ_GRP_ID, E.REQ_GRP_NAME, B.REQ_TYPE_ID, D.REQ_TYPE_NAME, 
        B.ASSET_GRP_CODE, F.ASSET_GRP_NAME, B.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME, B.BRAND_CODE, H.BRAND_NAME, 
        B.MODEL_CODE, I.MODEL_NAME
        FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_VENDORS C, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
        IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
        WHERE A.DOC_NO = B.DOC_NO
        AND B.REQ_TYPE_ID = D.REQ_TYPE_ID
        AND B.REQ_GRP_ID = E.REQ_GRP_ID
        AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
        AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
        AND B.BRAND_CODE = H.BRAND_CODE
        AND B.MODEL_CODE = I.MODEL_CODE
        AND A.VENDOR_CODE = C.VENDOR_CODE
        AND B.CANCEL_ASSET_FLAG is null
        AND B.LAST_USER_UPDATE is null
        AND B.SERIAL_NO1 = :ser_no1
        ORDER BY A.DOC_NO DESC";

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
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["PO_NO"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td>";
                            $attch_sql = "SELECT ATTACHMENT FROM IT_ASSET_ATTACHMENT 
                            WHERE DOC_NO = :doc_no
                            AND PO_NO = :po_no
                            AND PO_ITEM = :po_item"; 
                            $res1 = oci_parse(connection(), $attch_sql);
                            oci_bind_by_name($res1, ':doc_no', $row['DOC_NO']);
                            oci_bind_by_name($res1, ':po_no', $row['PO_NO']);
                            oci_bind_by_name($res1, ':po_item', $row['PO_ITEM']);

                            oci_execute($res1);
                            while($attach_row = oci_fetch_row($res1)){
                                $fileExtension = pathinfo($attach_row[0], PATHINFO_EXTENSION);
                                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $result.="<img id='view_attch' class='view_attch' src='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."'>";
                                } 
                                
                                else if ($fileExtension === 'pdf') {
                                    $result.="<a href='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."' target='_blank'>".$attach_row[0]."</a>";
                                } 
                                
                                else {
                                    $result.="Unsupported file format";
                                }
                            }
                        $result.="</td>
                        <td><button class='btn btn-primary upload_attch' id='upload_attch'><i class='fa-solid fa-upload'></i></button></td>
                        <td hidden><input class='req_grp_code' value='".$row["REQ_GRP_ID"]."'></td>
                        <td hidden><input class='req_grp_name' value='".$row["REQ_GRP_NAME"]."'></td>
                        <td hidden><input class='req_type_code' value='".$row["REQ_TYPE_ID"]."'></td>
                        <td hidden><input class='req_type_name' value='".$row["REQ_TYPE_NAME"]."'></td>
                        <td hidden><input class='ass_grp_code' value='".$row["ASSET_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_grp_name' value='".$row["ASSET_GRP_NAME"]."'></td>
                        <td hidden><input class='ass_sub_grp_code' value='".$row["ASSET_SUB_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_sub_grp_name' value='".$row["ASSET_SUB_GRP_NAME"]."'></td>
                        <td hidden><input class='brand_code' value='".$row["BRAND_CODE"]."'></td>
                        <td hidden><input class='brand_name' value='".$row["BRAND_NAME"]."'></td>
                        <td hidden><input class='model_code' value='".$row["MODEL_CODE"]."'></td>
                        <td hidden><input class='model_name' value='".$row["MODEL_NAME"]."'></td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                    </tr>";
        }
        echo $result;
    }

    // rem
    else if(isset($_POST['rem']) and !isset($_POST['po_num']) and !isset($_POST['emp_name']) and !isset($_POST['brand']) 
        and !isset($_POST['dept']) and !isset($_POST['vendor']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
        and !isset($_POST['ser_no1'])){

       $rem = $_POST['rem'];

        $sql = "SELECT DISTINCT A.DOC_NO, A.PO_NO, C.VENDOR_NAME, 
        B.EMPL_ID, B.MTRL_SHORT, B.PO_ITEM, B.REQ_GRP_ID, E.REQ_GRP_NAME, B.REQ_TYPE_ID, D.REQ_TYPE_NAME, 
        B.ASSET_GRP_CODE, F.ASSET_GRP_NAME, B.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME, B.BRAND_CODE, H.BRAND_NAME, 
        B.MODEL_CODE, I.MODEL_NAME
        FROM IT_ASSET_HEADER A, IT_ASSET_DETAILS B, IT_ASSET_VENDORS C, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
        IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
        WHERE A.DOC_NO = B.DOC_NO
        AND B.REQ_TYPE_ID = D.REQ_TYPE_ID
        AND B.REQ_GRP_ID = E.REQ_GRP_ID
        AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
        AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
        AND B.BRAND_CODE = H.BRAND_CODE
        AND B.MODEL_CODE = I.MODEL_CODE
        AND A.VENDOR_CODE = C.VENDOR_CODE
        AND B.CANCEL_ASSET_FLAG is null
        AND B.LAST_USER_UPDATE is null 
        AND B.REMARKS = :rem
        ORDER BY A.DOC_NO DESC";

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
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["PO_NO"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row1["DESCR"]."</td>
                        <td>".$row["MTRL_SHORT"]."</td>
                        <td>".$row["VENDOR_NAME"]."</td>
                        <td>".$row1["BUSINESSMAIL"]."</td>
                        <td>";
                            $attch_sql = "SELECT ATTACHMENT FROM IT_ASSET_ATTACHMENT 
                            WHERE DOC_NO = :doc_no
                            AND PO_NO = :po_no
                            AND PO_ITEM = :po_item"; 
                            $res1 = oci_parse(connection(), $attch_sql);
                            oci_bind_by_name($res1, ':doc_no', $row['DOC_NO']);
                            oci_bind_by_name($res1, ':po_no', $row['PO_NO']);
                            oci_bind_by_name($res1, ':po_item', $row['PO_ITEM']);

                            oci_execute($res1);
                            while($attach_row = oci_fetch_row($res1)){
                                $fileExtension = pathinfo($attach_row[0], PATHINFO_EXTENSION);
                                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $result.="<img id='view_attch' class='view_attch' src='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."'>";
                                } 
                                
                                else if ($fileExtension === 'pdf') {
                                    $result.="<a href='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."' target='_blank'>".$attach_row[0]."</a>";
                                } 
                                
                                else {
                                    $result.="Unsupported file format";
                                }
                            }
                        $result.="</td>
                        <td><button class='btn btn-primary upload_attch' id='upload_attch'><i class='fa-solid fa-upload'></i></button></td>
                        <td hidden><input class='req_grp_code' value='".$row["REQ_GRP_ID"]."'></td>
                        <td hidden><input class='req_grp_name' value='".$row["REQ_GRP_NAME"]."'></td>
                        <td hidden><input class='req_type_code' value='".$row["REQ_TYPE_ID"]."'></td>
                        <td hidden><input class='req_type_name' value='".$row["REQ_TYPE_NAME"]."'></td>
                        <td hidden><input class='ass_grp_code' value='".$row["ASSET_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_grp_name' value='".$row["ASSET_GRP_NAME"]."'></td>
                        <td hidden><input class='ass_sub_grp_code' value='".$row["ASSET_SUB_GRP_CODE"]."'></td>
                        <td hidden><input class='ass_sub_grp_name' value='".$row["ASSET_SUB_GRP_NAME"]."'></td>
                        <td hidden><input class='brand_code' value='".$row["BRAND_CODE"]."'></td>
                        <td hidden><input class='brand_name' value='".$row["BRAND_NAME"]."'></td>
                        <td hidden><input class='model_code' value='".$row["MODEL_CODE"]."'></td>
                        <td hidden><input class='model_name' value='".$row["MODEL_NAME"]."'></td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
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
