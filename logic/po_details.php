<?php
 
// header("Content-Type:application/json");

require "../config/connection.php";

// PO
if(isset($_POST['po_num']) and !isset($_POST['get'])){
    $po_num = $_POST['po_num'];

    $sql = "SELECT * FROM IT_ASSET_PO WHERE PO_NO = :po_num ";
    $res = oci_parse(connection(), $sql);

    oci_bind_by_name($res, ':po_num', $po_num);
    oci_execute($res);

    $result = "";
    while($PO = oci_fetch_assoc($res)){
        // array_push($array, array('VENDOR_NAME' => htmlspecialchars($PO['VENDOR_NAME'],ENT_IGNORE)));
        $result.="<tr>
                    <td style='text-align: center'><i name='icon[]' class='fa-solid fa-trash-can' onclick='SomeDeleteRowFunction(this)' style='cursor: pointer; color:red'></i></td>
                    <td hidden><input class='po_num form-control' hidden style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value=''></td>
                    <td hidden><input class='supp_code form-control' hidden style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['VENDOR_CODE']."'></td>
                    <td><input class='supp form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['VENDOR_NAME']."'></td>
                    <td hidden><input class='type_code form-control' hidden style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value=''></td>
                    <td><input class='type_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value=''></td>
                    <td hidden><input class='brand_code form-control' hidden style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value=''></td>
                    <td><input class='brand_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value=''></td>
                    <td><input class='price_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_UNT_PRICE']."'></td>
                    <td><input class='ser_no_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value=''></td>
                    <td><input class='ass_code_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value=''></td>
                    <td><input class='del_note_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value=''></td>
                    <td><input class='del_date_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO["PO_DEL_DATE"]."'></td>
                    <td><input class='malt_shrt_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO["SHORT_TEXT"]."'></td>
                    <td><input class='rem_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO["PO_ITEM_TEXT"]."'></td>
                    <td><input name='attch_1[]' type='file' multiple class='attch_td form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;'></td>
                </tr>";
    }
    echo $result;
    // echo json_encode($array);
}

else if(isset($_POST['po_num']) and isset($_POST['get'])){
    $po_num = $_POST['po_num'];

    $sql =  "SELECT DISTINCT PO_DOC_DATE FROM IT_ASSET_PO WHERE PO_NO = :po_num";
    $res = oci_parse(connection(), $sql);

    oci_bind_by_name($res, ':po_num', $po_num);
    oci_execute($res);

    $result = oci_fetch_row($res);
    $date = date_format(date_create($result[0]), "Y-m-d");
    echo $date;
}

?>