<?php 
    require "../config/connection.php";

    if(isset($_POST["req_grp1"])){
        $req_grp1 = $_POST["req_grp1"];
        $sql = "SELECT Req_Type_ID, Req_Type_Name FROM IT_ASSET_REQ_TYPE WHERE Req_Group_ID = :req_grp1";
        $result = oci_parse(connection(), $sql);
        oci_bind_by_name($result, ":req_grp1", $req_grp1);
        oci_execute($result);
        $res = "";
        $res="<option value=''></option>";
        while($row=oci_fetch_row($result)){
            $res.="<option value='$row[0]'>".htmlspecialchars($row[1],ENT_IGNORE)."</option>";
        }
        echo $res;
    }

   else if(isset($_POST["req_type1"])){
        $req_id = $_POST["req_type1"];
        $sql = "SELECT Asset_Group_code, Asset_Group_NAME FROM IT_ASSET_GROUP WHERE Req_Type_ID=:req_id";
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

    else if(isset($_POST["asset_group1"])){
        $ass_code = $_POST["asset_group1"];
        $sql = "SELECT Asset_Sub_Group_code, Asset_Sub_Group_Name FROM it_asset_sub_group WHERE Asset_Group_Code=:ass_code";
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

    else if(isset($_POST["asset_sub_group1"])){
        $brand = $_POST["asset_sub_group1"];
        $sql = "SELECT Brand_code, Brand_Name FROM it_asset_brand WHERE Asset_Sub_Group_Code=:brand";
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

    else if(isset($_POST["brand1"])){
        $brand1 = $_POST["brand1"];
        $sql = "SELECT Model_Code, Model FROM it_asset_model WHERE Brand_Code=:brand1";
        $stmt = oci_parse(connection(), $sql);
        oci_bind_by_name($stmt,":brand1",$brand1);
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