<?php
session_start();
if(isset($_SESSION['userName'])){
	header('Location:products.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Youze - Rent you Things</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<meta name="keywords" content="" />
<!-- Custom Theme files -->
<link href="Admin/css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/index_styles.css" rel="stylesheet" type="text/css" media="all">
<!-- //Custom Theme files -->
<!-- web-font -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<!-- //web-font -->
<script src="js/jquery-2.2.3.min.js"></script>
</head>
<body>
	<!-- login starts here -->
	<div class="login agile">
		<div class="w3agile-border">
			<h2>Youze - Rent you Things</h2>
			<div class="login-main login-agileits"> 
				<h1>Login</h1> 
				<form action="#" method="post" name="login_form" id="login_form">
					<p>Email</p>
					<input type="text" placeholder="Email address here" name="mail" required="">
					<p>Password</p>
					<input type="password" placeholder="Password here" name="password" required="">
					<input type="submit" value="Login">
				</form>
				<br>
				<h3>Not a member yet ? <a href="#small-dialog" class="sign-in popup-top-anim"> Sign Up Now !</a></h3>
				<h3>Forget Your Password ? <a href="#forget-dialog" class="sign-in popup-top-anim"> Click Here !</a></h3>
				<h3>Frequently ask questions ? <a href="#faq-dialog" class="sign-in popup-top-anim"> Click Here !</a></h3>
			</div>
		</div>
		<!-- modal -->
		<div id="small-dialog" class="mfp-hide">
			<h5 class="w3ls-title">Sign Up</h5>
			<div class="login-modal login"> 
				<form action="" method="post"  name="signup_form" id="signup_form">
					<p>Your Name</p>
					<input type="text" placeholder="Your Name" name="name" required="">
					<p>Email</p>
					<input type="text" placeholder="email address" name="mail" required="">
					<p>Password</p>
					<input type="password" placeholder="Password" name="password" required="">
					<input type="submit" value="Sign Up">
				</form>
				<br>
				<h3>Forget Your Password ? <a href="#forget-dialog" class="sign-in popup-top-anim"> Click Here !</a></h3>
			</div> 
		</div>
		<!-- //modal -->
		<!-- modal -->
		<div id="forget-dialog" class="mfp-hide">
			<h5 class="w3ls-title">Forget Passowrd</h5>
			<div class="login-modal login">
				<form action="#" method="post" name="forgetPassword_form" id="forgetPassword_form">
					<p>Email</p>
					<input type="text" placeholder="Your email address" name="mail" required="">
					<input type="submit" value="Submit">
				</form>

			</div>
		</div>
		<!-- //modal -->
		<!-- modal for FAQ-->
		<div id="faq-dialog" class="mfp-hide">
			<h5 class="w3ls-title">FAQs</h5>
			<div class="login-modal " id="faq">
			</div>

			<div class="">
				<div class="row">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					</div>
				</div>
			</div>

		</div>
		<!-- //modal for FAQ-->
	</div>
	<!-- //login ends here -->
	<!-- copyrights -->  
	<div class="copy-rights wthree">
	</div>
	<!-- //copyright -->
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/indexJS.js"></script>
</body>
</html>