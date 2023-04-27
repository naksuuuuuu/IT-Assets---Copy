<?php 

    header("Content-Type:application/json");

    require "../config/connection.php";

    echo(var_dump($_POST));

    // if(isset($_POST['po_no'])){
    //     $po_no = $_POST['po_no'];
    //     $po_item = $_POST['po_item'];
    
    //     $sql = "SELECT * FROM IT_ASSET_PO WHERE PO_NO = :po_no and PO_ITEM = :po_item";
    //     $result = oci_parse(connection(), $sql);
    //     oci_bind_by_name($result, ':po_no', $po_no);
    //     oci_bind_by_name($result, ':po_item', $po_item);
    //     oci_execute($result);
    
    //     $details = oci_fetch_assoc($result);
    //     $hire_date = date_format(date_create($details['HIRE_DATE']), "Y-m-d");
    //     $po_date = date_format(date_create($details['PO_DEL_DATE']), "Y-m-d");
    //     $po_doc_date = date_format(date_create($details['PO_DOC_DATE']), "Y-m-d");                

    //     echo json_encode(array('PO_NO' => $details['PO_NO'],'VENDOR_CODE' => $details['VENDOR_CODE'], 
    //     'PO_UNT_PRICE' => $details['PO_UNT_PRICE'], 'PO_DEL_DATE' => $po_date, 'MATERIAL_SHORT' => $details['SHORT_TEXT']));
    // }

    // if(isset($_POST["department"])){
    //     $dept = $_POST["department"];
    //     $sql = "SELECT a.EMPLID, c.NAMEENG from jobcur_ee a, department_tbl b, person_tbl c
    //     where a.DEPTID = b.DEPTID
    //     and a.EMPLID = c.EMPLID
    //     and a.EMPL_STATUS = 'A'
    //     and b.DEPTID = :DEPTID";

    //     $result = oci_parse(connection1(),$sql);
    //     oci_bind_by_name($result, ":DEPTID", $dept);
    //     oci_execute($result);
    //     $res="";

    //     $res.="<option value=''></option>";
        
    //     while($row=oci_fetch_row($result)){
    //         $res.="<option value='$row[0]'>$row[1]</option>";
    //     }
    //     echo $res;
    // }
?>