<?Php

// define('database','TALUAT');
// define('schema','CENTERSTOCK');
// define('password','CENTERPHL');

function connection(){
    $db = "TALUAT";
    $schema = "FEED";
    $password = "FEEDPHL";

    $conn = oci_connect($schema, $password, $db) or die ("could not connect to the server.");
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        return false;
    }
    else{
        return $conn;
    }
}

function connection1(){
    $db1 = "SBCETE";
    $schema1 = "HRPHL";
    $password1 = "prd#hphlr14";

    $conn1 = oci_connect($schema1, $password1, $db1) or die ("could not connect to the server.");
    if (!$conn1) {
        $e1 = oci_error();
        trigger_error(htmlentities($e1['message'], ENT_QUOTES), E_USER_ERROR);
        return false;
    }
    else{
        return $conn1;
    }
}

?>
