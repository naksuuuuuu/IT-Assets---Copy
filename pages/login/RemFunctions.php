<?php
include 'conn.php';
	function UserLogin($uname,$uplantcode){
		$username = "";
		$access = "";
		$plantCode = "";
		include 'conn.php';
		$queryUser = "Select a.user_name, a.access_type, b.plant_code From FS_USER_ACCOUNT a, FS_PLANT_CODE b
						Where a.user_name = b.user_name And a.user_name = :userID And b.plant_code = :userPlantCode";
		$statement1 = oci_parse($c, $queryUser);
		//Bind the values
		oci_bind_by_name($statement1, ':userID', $uname);
		oci_bind_by_name($statement1, ':userPlantCode', $uplantcode);
		$result = oci_execute($statement1);
		while ($row = oci_fetch_row($statement1))
		{
			$username = $row[0];
			$access = $row[1];
			$plantcode = $row[2];
		}
		if ($username == $uname){
			if($plantcode == $uplantcode){
				$_SESSION['agroiduser'] = $username;
				$_SESSION['plantcode'] = $plantcode;
				if($access == "FRONTSALES"){
					header("Location:../dashboard/dashboard.php");
				}
				elseif($access == "SALES"){
					header("Location:../dashboard/dashboardSalesman.php");
				}
				elseif($access == "ADMIN"){
					header("Location:../dashboard/setupArea.php");
				}
				elseif($access == "ACCOUNTING"){
					header("Location:../dashboard/uploadFormula.php");
				}
				elseif($access == "CUSTOMER"){
					header("Location:../dashboard/dashboardSalesman.php");
				}
			}
			else
			{
				echo '<script>';
				echo 'alert ("Plant Code selected is not Registered for the User!");';
				echo '</script>';
			}
		}else{
			echo '<script>';
			echo 'alert ("User Not Registered in the System. Contact your Administrator to Register");';
			echo '</script>';
			//header("Location:index.php");
		}
	}

?>