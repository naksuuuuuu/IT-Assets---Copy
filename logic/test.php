<?php

require '../config/connection.php';

foreach ($_POST['type'] as $key => $value) {
    $type = $_POST['type'][$key];
    $desc = $_POST['desc'][$key];
    $qty = $_POST['qty'][$key];
    $price = $_POST['unitPrice'][$key];
    $amount = $_POST['amount'][$key];
    echo $type." ".$desc." ".$qty." ".$price." ".$amount.", ";
}
