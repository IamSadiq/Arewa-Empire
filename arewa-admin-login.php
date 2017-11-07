<?php require_once('header.php');session_start();?>
<body>
<?php 

if (!isset($_SESSION['user'])){ ?>

	<div id = 'log_reg_background'>
		<br><br>

		<!--Login Form-->
		<span class = "msg2users">
			<?php if (isset($_POST['login_btn'])){require("login.php");}?>
		</span>
		
		<div id = "login_div">
		<br>
			<form name = "login_form" method = "post">
				<input type = "text" name = "username" class = "login-field" placeholder = "E-mail or username" required = "required" />
				<input type = "password" name = "password" class = "login-field" placeholder = "Password" required = "required" />
				<input type = "submit" name = "login_btn" id = "login-btn" value = "LOGIN" style = "cursor: pointer"/>
			</form>
		</div>
		<br><br>

		<!--Register Form-->
		<span class = "msg2users">
			<?php if (isset($_POST['signup_btn'])){ require("register.php"); }?>
		</span>
			
		<div id ="signup_div">
			<form name = "signUp_form" method = "post">
				<input style="width: 95%;" class = "input" type = text name = "email" placeholder = "E-mail" required = "required" />
				<br><span></span><br>
				<input style="width: 95%;" class = "input" type = password name = "password" placeholder = "Password" required = "required" />
				<br><span></span><br>
				<input style="width: 95%;" class = "input" type = password name = "cpassword" placeholder = "Confirm Password" required = "required" />
				<br><span></span><br>
				<input style="width: 95%;cursor:pointer;" class = "input" type = submit name = "signup_btn" value = "SIGN UP" style = "cursor: pointer"/>
			</form>
		</div>
		<br><br><br>
	</div>
<?php 
}

if (isset($_SESSION['user'])){ 
	header("Location: arewa-admin-area.php");
	exit();
}

include('footer.php');
?>