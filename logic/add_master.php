<?php 
    require "../config/connection.php";

    if(isset($_POST["req_grp"])){
        $req_grp = $_POST["req_grp"];
        $sql = "SELECT REQ_TYPE_ID, REQ_TYPE_NAME FROM IT_ASSET_REQ_GROUP WHERE REQ_GROUP_ID=:req_grp";
        $result = oci_parse(connection(),$sql);
        oci_bind_by_name($result,":req_grp",$req_grp);
        oci_execute($result);
        $res="";
        $res.="<option value=''></option>";
        while($row=oci_fetch_row($result)){
            $res.="<option value='$row[0]'>$row[1]</option>";
        }
        echo $res;
    }

    if(isset($_POST["type"])){
        $req_id = $_POST["type"];
        $sql = "SELECT Asset_Group_code, Asset_Group_NAME FROM IT_ASSET_GROUP WHERE Req_Type_ID=:req_id";
        $result = oci_parse(connection(),$sql);
        oci_bind_by_name($result,":req_id",$req_id);
        oci_execute($result);
        $res="";
        $res.="<option value=''></option>";
        while($row=oci_fetch_row($result)){
            $res.="<option value='$row[0]'>$row[1]</option>";
        }
        echo $res;
    }


    if(isset($_POST["asset"])){
        $ass_code = $_POST["asset"];
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

    if(isset($_POST["brand"])){
        $brand = $_POST["brand"];
        $sql = "SELECT Brand_code, Brand FROM it_asset_brand WHERE Asset_Sub_Group_Code=:brand";
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

    if(isset($_POST["model"])){
        $model = $_POST["model"];
        $sql = "SELECT Model_Code, Model FROM it_asset_model WHERE Brand_Code=:model";
        $stmt = oci_parse(connection(), $sql);
        oci_bind_by_name($stmt,":model",$model);
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

