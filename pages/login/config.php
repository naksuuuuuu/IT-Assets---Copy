<?php
    // $username = "FARM";
    // $password = "farmphl";
    // $dbname = "SBCPRD";
    // //Connect to Oracle Database 
    // $c = oci_connect($username, $password, $dbname);
    header('Content-Type: application/json');

// session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
	$username = htmlentities($_POST['login']);
	$password = htmlentities($_POST['pass']);

	if(empty($username)){
		http_response_code(400);
		echo json_encode(array('success' => false));
	}
	else if(empty($password)){
		http_response_code(400);
		echo json_encode(array('success' => false));
	}
	else{
	
		$ch = curl_init();
	    $query = array('username' => $username, 'password' => $password, 'group' => '');
	    curl_setopt($ch, CURLOPT_URL,"https://agro.cpf-phil.com/api/AD/");
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $res =  curl_exec ($ch);
		if($res == 0){
			session_start();
            http_response_code(200);
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			$_SESSION["login"] = true;
			echo json_encode(array('success' => 0, 'message' => 'Login successfully', 'icon' =>'success'));
		}	
		else if($res == 1){
			session_unset();
			echo json_encode(array('success' => 1, 'message' => 'Authorization failed. Please Contact IT', 'icon' =>'error' ));
		}
		else{
			session_unset();
			echo json_encode(array('success' => 2, 'message' => 'Invalid AD Username/Password.', 'icon' =>'error'));
		}
	    curl_close ($ch);
	}
}
else{
	 http_response_code(404);
	 header('location: ../');
}


//login_sessionStart.php

?>