<?php

require '../config/connection.php';
$total = 0;

if (isset($_POST['sumVal'])) {

    $var = number_format($_POST['sumVal'], 2, '.', ',');

    $result .= "<p id='colSum'>Total Amount:</p><p>$var</p>";
    echo $result;
}