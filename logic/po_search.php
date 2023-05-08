<?php
 
// header("Content-Type:application/json");

require "../config/connection.php";

if(isset($_POST['po_num']) and !isset($_POST['po_item1'])){
    $po_num = $_POST['po_num'];

    // $sql = "SELECT * FROM IT_ASSET_PO WHERE PO_NO = :po_num ORDER BY PO_ITEM asc ";
    // $res = oci_parse(connection(), $sql);
    // oci_bind_by_name($res, ':po_num', $po_num);
    // oci_execute($res);
    $not_in = "SELECT a.* from it_asset_po a where a.PO_NO = :po_no
        and a.PO_ITEM not in (SELECT po_item from it_asset_details1 where po_number = :po_no)
        order by po_item asc";
    $stmt = oci_parse(connection(), $not_in);
    oci_bind_by_name($stmt, ':po_no', $po_num);
    oci_execute($stmt);

    $result = "";
    while($PO = oci_fetch_assoc($stmt)){
        // array_push($array, array('VENDOR_NAME' => htmlspecialchars($PO['VENDOR_NAME'],ENT_IGNORE)));
        $result.="<tr>
                    <td style='text-align: center'><img id='plusImg' class='add_po' src='../../assets/add-button.png'></i></td>
                    <td><input class='po_num form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_NO']."'></td>
                    <td><input class='po_item form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_ITEM']."'></td>
                    <td><input class='plant form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PLANT']."'></td>
                    <td><input class='supp_name form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['VENDOR_NAME']."'></td>
                    <td><input class='short_text form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['SHORT_TEXT']."'></td>
                    <td><input class='po_itm_txt form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_ITEM_TEXT']."'></td>
                    <td><input class='po_qty form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_QTY']."'></td>
                    <td><input class='order_unt form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['ORDER_UNT']."'></td>
                    <td><input class='po_itm_price form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_UNT_PRICE']."'></td>
                    <td><input class='po_doc_date form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_DOC_DATE']."'></td>
                    <td><input class='po_stat form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_STATUS']."'></td>
                  </tr>";
    }

    $in_sql = "SELECT a.* from it_asset_po a where a.PO_NO = :po_no
        and a.PO_ITEM in (SELECT po_item from it_asset_details1 where po_number = :po_no and CANCEL_ASSET_FLAG is null)
        order by po_item asc";
    $stmt = oci_parse(connection(), $in_sql);
    oci_bind_by_name($stmt, ':po_no', $po_num);
    oci_execute($stmt);

    while($PO = oci_fetch_assoc($stmt)){
        // array_push($array, array('VENDOR_NAME' => htmlspecialchars($PO['VENDOR_NAME'],ENT_IGNORE)));
        $result.="<tr>
                    <td style='text-align: center'><i class='fa-solid fa-check in_po' id='plusImg' style='color: #08F11B'></i></td>
                    <td><input class='po_num form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_NO']."'></td>
                    <td><input class='po_item form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_ITEM']."'></td>
                    <td><input class='plant form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PLANT']."'></td>
                    <td><input class='supp_name form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['VENDOR_NAME']."'></td>
                    <td><input class='short_text form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['SHORT_TEXT']."'></td>
                    <td><input class='po_itm_txt form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_ITEM_TEXT']."'></td>
                    <td><input class='po_qty form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_QTY']."'></td>
                    <td><input class='order_unt form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['ORDER_UNT']."'></td>
                    <td><input class='po_itm_price form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_UNT_PRICE']."'></td>
                    <td><input class='po_doc_date form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_DOC_DATE']."'></td>
                    <td><input class='po_stat form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_STATUS']."'></td>
                  </tr>";
    }

    $cancel_sql = "SELECT a.* from it_asset_po a where a.PO_NO = :po_no
    and a.PO_ITEM in (SELECT po_item from it_asset_details1 where po_number = :po_no and cancel_asset_flag = 'Y')
    order by po_item asc";
    $stmt = oci_parse(connection(), $cancel_sql);
    oci_bind_by_name($stmt, ':po_no', $po_num);
    oci_execute($stmt);

    while($PO = oci_fetch_assoc($stmt)){
        // array_push($array, array('VENDOR_NAME' => htmlspecialchars($PO['VENDOR_NAME'],ENT_IGNORE)));
        $result.="<tr>
                    <td style='text-align: center'><img id='plusImg' class='add_po' src='../../assets/add-button.png'></i></td>
                    <td><input class='po_num form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_NO']."'></td>
                    <td><input class='po_item form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_ITEM']."'></td>
                    <td><input class='plant form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PLANT']."'></td>
                    <td><input class='supp_name form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['VENDOR_NAME']."'></td>
                    <td><input class='short_text form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['SHORT_TEXT']."'></td>
                    <td><input class='po_itm_txt form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_ITEM_TEXT']."'></td>
                    <td><input class='po_qty form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_QTY']."'></td>
                    <td><input class='order_unt form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['ORDER_UNT']."'></td>
                    <td><input class='po_itm_price form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_UNT_PRICE']."'></td>
                    <td><input class='po_doc_date form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_DOC_DATE']."'></td>
                    <td><input class='po_stat form-control' style='border: none; border-bottom: 1px solid blue; border-radius:0px; background-color: transparent; width: 200px;' value='".$PO['PO_STATUS']."'></td>
                  </tr>";
    }

    echo $result;
    // echo json_encode($array);
}

else if (isset($_POST['po_num']) and isset($_POST['po_item1'])){
    
}
?>