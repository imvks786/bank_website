<?php 
session_start();
include_once '../bank_config.php';
   unset($_SESSION['reg_usr']);
?>
<!DOCTYPE html>
<head>
	<title>Finish</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<!--NAV BAR-->
<img src="../logo.png"></img>
<marquee style="background: rgb(255, 204, 204);
    color: rgb(116, 54, 0);" width="auto" direction="left" height="20px">
        <p><b>HB-Banking never asks for your Card/PIN/OTP/CVV details on phone, message or email. Please do not click on links received on your email or mobile asking your Bank/Card details. &nbsp;&nbsp;|&nbsp;&nbsp;  Dear Customer Login to our Website to avail business banking services.</b></p>
    </marquee>
<!--CONTENT-->
<div class="w3-container w3-center">
    <h1>You have successfully created your Account</h1>
    <h2>Thank You</h2>
	<h3>Redirecting to Home,</h3>
    <h4>OR, <a href='../index.php' >Click here to Redirect</a></h4>
</div>

	

<div class="w3-center w3-container" style="margin-top: 100px;">
		<hr  style="margin-top: 100px;">
	<p style="color:gray;">&copy; HB|Team 2020-2021</p>
    <a href="https://home.imvks.rf.gd/monopoly/"><img style="height:30px;" src="/img/game_logo.png"></img>&nbsp;&nbsp;
	<a href="https://home.imvks.rf.gd/bank/"><img style="height:30px;" src="/img/bank_logo.png"></img>
	<a href="https://home.imvks.rf.gd/store/"><img style="height:30px;" src="/img/store_logo.png"></img>
</div>	

<style>
label,h1,h2,h3{font-family: 'Poppins', sans-serif;}
</style>
</body>
</html>
