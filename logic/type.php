<?php 
    require "../config/connection.php";

    if(isset($_POST["req_grp"])){
        $req_grp = $_POST["req_grp"];
        $sql = "SELECT Req_Type_ID, Req_Type_Name FROM IT_ASSET_REQ_TYPE WHERE Req_Grp_ID = :req_grp";
        $result = oci_parse(connection(), $sql);
        oci_bind_by_name($result, ":req_grp", $req_grp);
        oci_execute($result);
        $res = "";
        $res="<option value=''></option>";
        while($row=oci_fetch_row($result)){
            $res.="<option value='$row[0]'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
        }
        echo $res;
    }

   else if(isset($_POST["type"])){
        $req_id = $_POST["type"];
        $sql = "SELECT Asset_Grp_code, Asset_Grp_NAME FROM IT_ASSET_GROUP WHERE Req_Type_ID=:req_id";
        $result = oci_parse(connection(),$sql);
        oci_bind_by_name($result,":req_id",$req_id);
        oci_execute($result);
        $res="";
        $res.="<option value=''></option>";
        while($row=oci_fetch_row($result)){
            $res.="<option value='$row[0]'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
        }
        echo $res;
    }

    else if(isset($_POST["asset_group"])){
        $ass_code = $_POST["asset_group"];
        $sql = "SELECT Asset_Sub_Grp_code, Asset_Sub_Grp_Name FROM it_asset_sub_group WHERE Asset_Grp_Code=:ass_code";
        $stmt = oci_parse(connection(), $sql);
        oci_bind_by_name($stmt,":ass_code",$ass_code);
        oci_execute($stmt);
       
        $res="";
        $res.="<option value=''></option>";
        while($row = oci_fetch_row($stmt)){
            $res.="<option value='$row[0]'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
        }
        echo $res;
        // echo var_dump($_POST);
    }

    else if(isset($_POST["asset_sub_group"])){
        $brand = $_POST["asset_sub_group"];
        $sql = "SELECT Brand_code, Brand_Name FROM it_asset_brand WHERE Asset_Sub_Grp_Code=:brand";
        $stmt = oci_parse(connection(), $sql);
        oci_bind_by_name($stmt,":brand",$brand);
        oci_execute($stmt);
       
        $res="";
        $res.="<option value=''></option>";
        while($row = oci_fetch_row($stmt)){
            $res.="<option value='$row[0]'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
        }
        echo $res;
        // echo var_dump($_POST);
    }

    else if(isset($_POST["brand"])){
        $brand = $_POST["brand"];
        $sql = "SELECT Model_Code, Model_Name FROM it_asset_model WHERE Brand_Code=:brand";
        $stmt = oci_parse(connection(), $sql);
        oci_bind_by_name($stmt,":brand",$brand);
        oci_execute($stmt);
       
        $res="";
        $res.="<option value=''></option>";
        while($row = oci_fetch_row($stmt)){
            $res.="<option value='$row[0]'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
        }
        echo $res;
        // echo var_dump($_POST);
    }


?>