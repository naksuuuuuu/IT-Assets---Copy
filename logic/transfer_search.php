<?php

require "../config/connection.php";

if (isset($_POST['data'])){

    if(isset($_POST['po_no']) and !isset($_POST['ser_no']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
    and !isset($_POST['emp_name'])){
        $po_no = $_POST['po_no'];

        $sql1 = "SELECT a.DOC_NO, b.ASSET_ID, b.EMPL_ID, G.ASSET_SUB_GRP_NAME, I.MODEL_NAME, H.BRAND_NAME, b.PO_item, 
            b.PO_NO, b.REQ_GRP_ID, E.REQ_GRP_NAME, b.REQ_TYPE_ID, D.REQ_TYPE_NAME, b.ASSET_GRP_CODE, F.ASSET_GRP_NAME, 
            b.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME as SUB_NAME, b.BRAND_CODE, H.BRAND_NAME as BR_NAME, b.MODEL_CODE AS MODEL_CODE, I.MODEL_NAME AS MODEL_NAME_HIDDEN
            FROM IT_ASSET_HEADER a, IT_ASSET_DETAILS b, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
            IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
            WHERE b.REQ_TYPE_ID = D.REQ_TYPE_ID
            AND b.REQ_GRP_ID = E.REQ_GRP_ID
            AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
            AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
            AND B.BRAND_CODE = H.BRAND_CODE
            AND B.MODEL_CODE = I.MODEL_CODE
            AND A.DOC_NO	= B.DOC_NO
            AND B.PO_NO = :po_no
            ORDER BY A.DOC_NO DESC";
                
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
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["ASSET_ID"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row["ASSET_SUB_GRP_NAME"]."</td>
                        <td>".$row["BRAND_NAME"]."</td>
                        <td>".$row["MODEL_NAME"]."</td>
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
                        <td hidden>" . $row['EMPL_ID'] . "</td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                    </tr>";
        }
        echo $result;
        // echo json_encode($array);
    }

    // ser_no
    else if(isset($_POST['ser_no']) and !isset($_POST['po_no']) and !isset($_POST['from_date']) and !isset($_POST['to_date'])
        and !isset($_POST['emp_name'])){
        $ser_no = $_POST['ser_no'];

        $sql1 = "SELECT a.DOC_NO, b.ASSET_ID, b.EMPL_ID, G.ASSET_SUB_GRP_NAME, I.MODEL_NAME, H.BRAND_NAME, b.PO_item, 
            b.PO_NO, b.REQ_GRP_ID, E.REQ_GRP_NAME, b.REQ_TYPE_ID, D.REQ_TYPE_NAME, b.ASSET_GRP_CODE, F.ASSET_GRP_NAME, 
            b.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME as SUB_NAME, b.BRAND_CODE, H.BRAND_NAME as BR_NAME, b.MODEL_CODE AS MODEL_CODE, I.MODEL_NAME AS MODEL_NAME_HIDDEN
            FROM IT_ASSET_HEADER a, IT_ASSET_DETAILS b, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
            IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
            WHERE b.REQ_TYPE_ID = D.REQ_TYPE_ID
            AND b.REQ_GRP_ID = E.REQ_GRP_ID
            AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
            AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
            AND B.BRAND_CODE = H.BRAND_CODE
            AND B.MODEL_CODE = I.MODEL_CODE
            AND A.DOC_NO	= B.DOC_NO
            AND B.SERIAL_NO1 = :ser_no
            ORDER BY A.DOC_NO DESC";
                
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
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["ASSET_ID"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row["ASSET_SUB_GRP_NAME"]."</td>
                        <td>".$row["BRAND_NAME"]."</td>
                        <td>".$row["MODEL_NAME"]."</td>
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
                        <td hidden>" . $row['EMPL_ID'] . "</td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                    </tr>";
        }
        echo $result;
    }

    // po_doc_date
    else if(isset($_POST['from_date']) and isset($_POST['to_date']) and !isset($_POST['po_no']) and !isset($_POST['ser_no']) 
        and !isset($_POST['emp_name'])){
        
        $from_date = date_format(date_create($_POST['from_date']), 'd/m/Y');
        $to_date = date_format(date_create($_POST['to_date']), 'd/m/Y');

        $sql1 = "SELECT a.DOC_NO, b.ASSET_ID, b.EMPL_ID, G.ASSET_SUB_GRP_NAME, I.MODEL_NAME, H.BRAND_NAME, b.PO_item, 
            b.PO_NO, b.REQ_GRP_ID, E.REQ_GRP_NAME, b.REQ_TYPE_ID, D.REQ_TYPE_NAME, b.ASSET_GRP_CODE, F.ASSET_GRP_NAME, 
            b.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME as SUB_NAME, b.BRAND_CODE, H.BRAND_NAME as BR_NAME, b.MODEL_CODE AS MODEL_CODE, I.MODEL_NAME AS MODEL_NAME_HIDDEN
            FROM IT_ASSET_HEADER a, IT_ASSET_DETAILS b, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
            IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
            WHERE b.REQ_TYPE_ID = D.REQ_TYPE_ID
            AND b.REQ_GRP_ID = E.REQ_GRP_ID
            AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
            AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
            AND B.BRAND_CODE = H.BRAND_CODE
            AND B.MODEL_CODE = I.MODEL_CODE
            AND A.DOC_NO	= B.DOC_NO
            AND A.DOC_DATE
            BETWEEN to_date(:from_date, 'DD/MM/YY') AND to_date(:to_date, 'DD/MM/YY')
            ORDER BY A.DOC_NO DESC";
                
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
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["ASSET_ID"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row["ASSET_SUB_GRP_NAME"]."</td>
                        <td>".$row["BRAND_NAME"]."</td>
                        <td>".$row["MODEL_NAME"]."</td>
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
                        <td hidden>" . $row['EMPL_ID'] . "</td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                    </tr>";
        }
        echo $result;
    }

    // emp_name
    else if(isset($_POST['emp_name']) and !isset($_POST['po_no']) and !isset($_POST['ser_no']) 
            and !isset($_POST['from_date']) and !isset($_POST['to_date'])){
        
        $emp_name = $_POST['emp_name'];

        $sql1 = "SELECT a.DOC_NO, b.ASSET_ID, b.EMPL_ID, G.ASSET_SUB_GRP_NAME, I.MODEL_NAME, H.BRAND_NAME, b.PO_item, 
                b.PO_NO, b.REQ_GRP_ID, E.REQ_GRP_NAME, b.REQ_TYPE_ID, D.REQ_TYPE_NAME, b.ASSET_GRP_CODE, F.ASSET_GRP_NAME, 
                b.ASSET_SUB_GRP_CODE, G.ASSET_SUB_GRP_NAME as SUB_NAME, b.BRAND_CODE, H.BRAND_NAME as BR_NAME, b.MODEL_CODE AS MODEL_CODE, I.MODEL_NAME AS MODEL_NAME_HIDDEN
                FROM IT_ASSET_HEADER a, IT_ASSET_DETAILS b, IT_ASSET_REQ_TYPE D, IT_ASSET_REQ_GROUP E,
                IT_ASSET_GROUP F, IT_ASSET_SUB_GROUP G, IT_ASSET_BRAND H, IT_ASSET_MODEL I
                WHERE b.REQ_TYPE_ID = D.REQ_TYPE_ID
                AND b.REQ_GRP_ID = E.REQ_GRP_ID
                AND B.ASSET_SUB_GRP_CODE = G.ASSET_SUB_GRP_CODE
                AND B.ASSET_GRP_CODE = F.ASSET_GRP_CODE
                AND B.BRAND_CODE = H.BRAND_CODE
                AND B.MODEL_CODE = I.MODEL_CODE
                AND A.DOC_NO	= B.DOC_NO
                AND B.EMPL_ID = :emp_name
                ORDER BY A.DOC_NO DESC";
                
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
                        <td>".$row["DOC_NO"]."</td>
                        <td>".$row["PO_ITEM"]."</td>
                        <td>".$row["ASSET_ID"]."</td>
                        <td>".$row1["NAMEENG"]."</td>
                        <td>".$row["ASSET_SUB_GRP_NAME"]."</td>
                        <td>".$row["BRAND_NAME"]."</td>
                        <td>".$row["MODEL_NAME"]."</td>
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
                        <td hidden>" . $row['EMPL_ID'] . "</td>
                        <td hidden><input class='po_item' value=".$row["PO_ITEM"]." hidden></td>
                        <td hidden><input class='doc_no1' value=".$row["DOC_NO"]." hidden></td>
                    </tr>";
        }
        echo $result;
    }
}

?>
