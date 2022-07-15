<?php 
session_start();
include_once 'bank_config.php';

if(!isset($_SESSION['usr_acc'])){
	header('location: ./index.php');
}
else{
	$usrname=$_SESSION['usr_acc'];
	$r=mysqli_query($bank,"SELECT * FROM acc_detail WHERE username='$usrname'");
	$ro=mysqli_fetch_assoc($r);	
	$bal=$ro['total_bal'];
	$name=$ro['name'];
    $acc_no=$ro['acc_no'];
    $uid=$ro['uid'];
}
if(isset($_POST['submit'])){
	$acc=$_POST['acc'];
    $pin=$_POST['pin'];

    $uid=$usrname."@UID";
    mysqli_query($bank,"UPDATE acc_detail SET uid='$uid' WHERE acc_no=$acc");
}
?>
<!DOCTYPE html>
<head>
	<title>E-Banking</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--NAV BAR-->
<img src="./logo.png"></img>
<ul class="topnav">
  <li><a href="#">HB|Banking</a></li>
  <li><a href="./e-bank.php" class="w3-bar-item w3-button w3-red"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./trans.php" class="w3-bar-item w3-button"><i class="fa fa-shield"></i> Transcations</a></li>
  <li><a href="./mpay.php" class="w3-bar-item w3-button"><i class="w3-green fa fa-money"></i> Mpay</a></li>
  <li><a href="./usr_logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>
  
  <li class="right" ><a href="./welcome.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['usr_acc']; ?></a></li>
</ul>	
<marquee style="background: rgb(255, 204, 204);
    color: rgb(116, 54, 0);" width="auto" direction="left" height="20px">
        <p><b>HB-Banking never asks for your Card/PIN/OTP/CVV details on phone, message or email. Please do not click on links received on your email or mobile asking your Bank/Card details. &nbsp;&nbsp;|&nbsp;&nbsp;  Dear Customer Login to our Website to avail business banking services.</b></p>
</marquee>
<!--CONTENT-->
<div class="w3-container">
	<h3>Welcome to HB-Banking,</h3>
	<p>Let's Start Today Work.</p>	
    <div class="w3-center">
		<h3>Hi <?php echo $name;?>, Your Current Account Balance is <b style="color:green">Rs.<?php echo $bal;?></b></h3>
	</div>
    <h3>Your Account No is: <b style="color:orange"><?php echo $acc_no;?></b></h3>
    <h3>Your UID is: <b style="color:orange"><?php echo $uid;?></b></h3>
	<div class="w3-center">
		<p style="color:blue">If slowness is observed during Login Page loading, Please refresh the page for better experience.</p>
		<p style="color:blue">HB-Banking never asks for confidential information such as PIN and OTP from customers. Any such call can be made only by a fraudster. Please do not share personal info.</p>
	</div>
	<hr>
    <div class='w3-container'>
        <div class='w3-half w3-center'>
        <i class="material-icons" style="font-size:80px;color:orange">recent_actors</i>
            <h1>Get a <b style='color:orange'>Unique ID</b><br>  for Easy Transcations.</h1>
            <h3>Your unique id is used for any online Transcations.</h3>
            <h3>You get your id like ABC@UID.</h3>
            
        </div>
         <div class='w3-half'>
            <h1>Generate Your ID Here</h1>
            <form method='POST' action=''>
                <label>Your Account Number</label>
                <input name='acc' type='number' class='w3-input' required></input><br>
                
                <label>Your PIN</label>
                <input name='pin' type='number' class='w3-input' required></input><br><br>

                <button class='w3-button w3-orange w3-round' name='submit' type='submit'>Generate</button>
        </div>
    </div>

</div>
<div class="w3-center w3-container" style="margin-top: 100px;">
		<hr  style="margin-top: 100px;">
	<p style="color:gray;">&copy; HB|Team 2020-2021</p>
	<div class="">
	<a href="https://home.imvks.rf.gd//banking/"><img style="height:30px;" src="/img/bank_logo.png"></img>
	<a href="https://home.imvks.rf.gd//store/"><img style="height:30px;" src="/img/store_logo.png"></img>
	</div>
</div>	
<style>
ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
  display: block;
  color: white;
  text-align: center;
  padding: 7px 16px;
  text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: #4CAF50;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
  ul.topnav li.right, 
  ul.topnav li {float: none;}
}
</style>
</body>
</html>
