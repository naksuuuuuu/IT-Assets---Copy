<?Php

// define('database','TALUAT');
// define('schema','CENTERSTOCK');
// define('password','CENTERPHL');

// class Conn {

// public function Conn(){
    $db = "TALUAT";
    $schema = "FEED";
    $password = "FEEDPHL";

    $conn = oci_connect($schema, $password, $db) or die ("could not connect to the server.");
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        // return false;
    }
    // else{
    //     return $conn;
    // }

// }

// }

?>
