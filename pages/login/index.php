<!DOCTYPE html>
<html lang="en">
<head>
	<title>ITAMS LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="../../assets/sweetalert2/dist/sweetalert2.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<?php echo "<form action='".$_SERVER["PHP_SELF"]."' method='POST' class='login100-form validate-form'>";?>
					<span class="login100-form-title p-b-26">
						Log In
					</span>
					<!--<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>-->

					<div class="wrap-input100 validate-input" data-validate = "Username is Required">
						<input class="input100" type="text" id="user_name" name="txtuser_id" autocomplete="off">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" id="password" name="txtuser_pass" autocomplete='off'>
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<!-- <div class="buArea" style='margin-bottom: 10px'>
						<input type="text" name="buHead" list='buHeads' placeholder="BU" autocomplete='off' size='3'>
						<datalist id='buHeads'>
							<option value='FM'></option>
							<option value='HO'></option>
							<option value='SW'></option>
							<option value='PT'></option>
						</datalist>
					</div> -->

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type='button' id="btn" name='btnlogin' class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="../../assets/sweetalert2/dist/sweetalert2.all.js"></script>

	<!-- <script>
		$('[name=btnlogin]').click(function(){
			alert("Error")
			return false; 
		})
	</script> -->

</body>
<script>
        $(document).ready(function(){

            $("#btn").click(function(){
                var login = $("#user_name").val()
                var pass = $("#password").val()
                console.log(login + " " + pass) 

                if (login == ""){
                    alert("LogIn Error")

                }
                else if (pass == ""){
                    alert("Password Error")
                }
                else{
                    $.ajax({
                    url:'config.php',
                    method:'post',
                    data:{login:login,pass:pass},
                    success:function(res){
                       if (res.success == 0){
							notify(res.icon,res.message)
							
							window.setInterval(function(){
								window.location.replace("../user/dash.php")
							},2000)
					   }
					   else if (res.success == 1){
					  		notify(res.icon,res.message)
					   }
					   else if (res.success == 2){
					  		notify(res.icon,res.message)
					   }
                    }
                	});
                }
            })

        })

		function notify(icon, message){
        Swal.fire({
                    toast: true,
                    position: 'top-end',
                    title: message,
                    icon: icon,
                    timer: 2500,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    showCancelButton: false
                })
    	}
</script>

</html>