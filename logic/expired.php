<?php 

$licenseDuration = $_POST['duration']; //License Months
$startLicense = $_POST['license_start']; //License Start
$endLicense = date('Y-m-d', strtotime("+".$licenseDuration." months", strtotime($startLicense))); //License Expire
echo $endLicense;

?>