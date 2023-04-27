<?php
require '../config/connection.php';

if (isset($_POST['plantCode'])){

    $code = $_POST['plantCode'];
    
    if ($code == 'F301') {
       $plantName = 'Plant1';
       $result .= "<input name='plantName' id='plantName' value='$plantName' type='text' style='border:none; pointer-events:none'>";
       echo $result;
    }
    if ($code == 'F302') {
        $plantName = 'Plant2';
        $result .= "<input name='plantName' id='plantName' value='$plantName' type='text' style='border:none; pointer-events:none'>";
        echo $result;
    }
    if ($code == 'F303') {
        $plantName = 'Plant3';
       $result .= "<input name='plantName' id='plantName' value='$plantName' type='text' style='border:none; pointer-events:none'>";
       echo $result;
    }
    if ($code == 'F304') {
        $plantName = 'Plant4';
        $result .= "<input name='plantName' id='plantName' value='$plantName' type='text' style='border:none; pointer-events:none'>";
        echo $result;
    }
    if ($code == 'F305') {
        $plantName = 'Plant5';
        $result .= "<input name='plantName' id='plantName' value='$plantName' type='text' style='border:none; pointer-events:none'>";
        echo $result;
    }
    if ($code == 'F306') {
        $plantName = 'Plant6';
        $result .= "<input name='plantName' id='plantName' value='$plantName' type='text' style='border:none; pointer-events:none'>";
        echo $result;
    }
}