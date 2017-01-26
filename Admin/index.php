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
<meta name="keywords" content="" />
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- //Custom Theme files -->
<!-- web-font -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<!-- //web-font -->
<!-- pop-up-box -->
<script src="js/jquery-2.2.3.min.js"></script> 
<script>
	$(document).ready(function() {
		$('.popup-top-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});																							
	}); 
</script>
<!-- //pop-up-box --> 
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
					<input type="text" placeholder="example@gmail.com" name="mail" required="">
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
				<form action="#" method="post">
					<p>Email</p>
					<input type="text" placeholder="Your email address" name="mail" required="">
					<input type="submit" value="Submit">
				</form>

			</div>
		</div>
		<!-- //modal -->
	</div>
	<!-- //login ends here -->
	<!-- copyrights -->  
	<div class="copy-rights wthree">
	</div>
	<!-- //copyright -->
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<script>
		$(document).ready(function () {
			$('#signup_form').on('submit', function (e) {
				e.preventDefault();
				$.ajax({
					url:"signup_form_handler.php",
					type:"post",
					data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data){
//						alert(data);
						abc=$.parseJSON(data);
						if(abc.error){
							alert(abc.error.msg);
						}else if(abc.verified){
							alert(abc.verified.msg);
						}

					},
					error: function(){
						alert("Ajax call error in custom.js")
					}
				});
			});

			//********** Start Login Form handler ***********//
			$('#login_form').on('submit', function (e) {
				e.preventDefault();
				$.ajax({
					url:"login_handler.php",
					type:"post",
					data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data){
						json_response=$.parseJSON(data);
						if(json_response.verified){
							console.log(json_response.verified.name);
							window.location.replace("products.php");
						}
						if(json_response.error){
							console.log(json_response.error.msg);
							alert(json_response.error.msg);
						}

					},
					error: function(){
						alert("Ajax call error in custom.js")
					}
				});
			})
			//********** End Login Form handler ***********//
		})
	</script>
</body>
</html>