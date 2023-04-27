<?php

require '../config/connection.php';

if (isset($_POST['qty']) or isset($_POST['unitPrice'])) {
    $qty = $_POST['qty'];
    $price = $_POST['unitPrice'];

    if ($qty ==null and $price == null) {
        $total = '';
        $result .= "<input name='amount[]' class='rowAmount' id='amount' type='text' data-type='currency' size='10' value='".$total."'>";

        echo $result;
    }
    else{
    $total = intval(preg_replace('/[^\d.]/', '' ,$qty)) * intval($price);

    $result .= "<input name='amount[]' class='rowAmount' id='amount' type='text' data-type='currency' size='10' value='".number_format($total,2, '.' , ',')."'>";

    echo $result;
}
}