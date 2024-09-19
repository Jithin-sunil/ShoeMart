<?php
	include("../Assets/Connection/Connection.php");
	
	session_start();
	if(isset($_POST["btn_login"]))
	{
		$email=$_POST["txt_email"];
		$password=$_POST["txt_password"];
		$selqry="SELECT * FROM tbl_admin WHERE admin_email='".$email."'and admin_password='".$password."'";
		$resadmin=$con->query($selqry);

			$selquy="SELECT * FROM tbl_user WHERE user_email='".$email."'and user_password='".$password."'";
		$resuser=$con->query($selquy);

		$selshop=" SELECT * FROM tbl_shop WHERE shop_email='".$email."'and shop_password='".$password."'";
		$resshop=$con->query($selshop);

		if($resadmin->num_rows>0)
		{
			$data=$resadmin->fetch_assoc();
			$_SESSION['aid']=$data['admin_id'];
			$_SESSION['aname']=$data['admin_name'];
			header("location:../Admin/HomePage.php");	
		}
		else if($resuser->num_rows>0)
		{
			$data=$resuser->fetch_assoc();
			$_SESSION['uid']=$data['user_id'];
			$_SESSION['uname']=$data['user_name'];
			header("location:../User/Homepage.php");				
		}
		else if($resshop->num_rows>0)
		{
			$data=$resshop->fetch_assoc();
			$_SESSION['sid']=$data['shop_id'];
			$_SESSION['sname']=$data['shop_name'];
			header("location:../Shop/Homepage.php");				
		}
		else
		{
			?>
             <script>

				alert("Invalid Credentials")
				window.location("login.php")
			 </script>
			<?php
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../Assets/Template/Login/images/design.jpg');">
			<div class="wrap-login100">
				<form class="login100-form" method="post">
					<span class="login100-form-logo" >
						<img src="../Assets/Template/Login/images/bg-01.jpg" width="150" height="150" style="border-radius: 50%;" alt="">
						<!-- <i class="zmdi zmdi-landscape"></i> -->
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100" data-validate = "Enter username">
						<input class="input100" type="text" name="txt_email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100" data-validate="Enter password">
						<input class="input100" type="password" name="txt_password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="btn_login">
							Login
						</button>
					</div>
					
					<br>  <div class="container-login100-form-btn"><a href="newuser.php">
						<button class="login100-form-btn" type="Button" name="btn_signup">
							Create new account
						</button></a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="../Assets/Template/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Assets/Template/Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/js/main.js"></script>

</body>
</html>