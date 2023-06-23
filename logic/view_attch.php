<?php

    require "../config/connection.php";
    $doc_no1 = $_POST['doc_no1'];

    // $res = "";
                                                                 
    //     $attch_sql = "SELECT ATTACHMENT FROM IT_ASSET_ATTACHMENT 
    //     WHERE DOC_NO = :doc_no"; 
    //     $res1 = oci_parse(connection(), $attch_sql);
    //     oci_bind_by_name($res1, ':doc_no', $doc_no1);

    //     oci_execute($res1);
    //     while($attach_row = oci_fetch_row($res1)){
    //     $fileExtension = pathinfo($attach_row[0], PATHINFO_EXTENSION);
    //     if (in_array($fileExtension, ['jpg', 'jpeg', 'png'])) {
    //         $res.="<tr>
    //         <td><img id='view_attch' class='view_attch' src='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."'>";
    //     } 

    //     else if ($fileExtension === 'pdf') {
    //         $res.="<a id='view_pdf' href='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."' target='_blank'>Download/Open</a>";
    //     } 

    //     else {
    //         $res.="Unsupported file format";
    //     }
    //         $res.="</td>
    //     </tr>";
    //     }
        
    // echo $res;

    $res = "";
                                                                 
        $attch_sql = "SELECT ATTACHMENT FROM IT_ASSET_ATTACHMENT 
        WHERE DOC_NO = :doc_no"; 
        $res1 = oci_parse(connection(), $attch_sql);
        oci_bind_by_name($res1, ':doc_no', $doc_no1);

        oci_execute($res1);
        while($attach_row = oci_fetch_row($res1)){
        $fileExtension = pathinfo($attach_row[0], PATHINFO_EXTENSION);
        if (in_array($fileExtension, ['jpg', 'jpeg', 'png'])) {
            $res.="
            <div class='col-6'>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>Image</h5>
                        <img id='view_attch' class='view_attch' src='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."'>
                    </div>
                </div>
            </div>
            <br>";
        } 

        else if ($fileExtension === 'pdf') {
            $res.="
            <div class='col-6'>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>PDF File</h5>
                        <a id='view_pdf' href='http://localhost/assetmonitoring/pages/user/uploads/".$attach_row[0]."' target='_blank'>Download/Open</a>
                    </div>
                </div>
            </div>
            <br>";
        } 

        else {
            $res.="Unsupported file format";
        }
            $res.="<br>";
        }
        
    echo $res;
?>