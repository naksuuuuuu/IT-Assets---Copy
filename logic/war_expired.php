<?php 

$war_duration = $_POST['war_duration']; //war Months
$war_start = $_POST['war_start']; //war Start
$war_exp = date('Y-m-d', strtotime("+".$war_duration." months", strtotime($war_start))); //war Expire
echo $war_exp;

?>