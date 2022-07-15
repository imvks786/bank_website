<?php 
session_start();
include_once 'bank_config.php';

if(isset($_SESSION['usr_acc'])){
	header('location: ./e-bank.php');
}
if (isset($_POST['submit'])){
	$usr=$_POST['usr'];
	$pwd=$_POST['pwd'];
	
	$ret=mysqli_query($bank,"SELECT * FROM acc_detail WHERE username='$usr' and password='$pwd'");
	$row = mysqli_fetch_assoc($ret); 
	if(!$row) { 
		header('location:index.php');
	}
	else{
		$_SESSION['usr_acc']=$usr;
		header('location: e-bank.php');
	}	
}
if (isset($_GET['reg'])){
	$rname=$_GET['rname'];
	$rusr=$_GET['rusr'];
	$racct=$_GET['racct'];
	$rid=$_GET['rid'];
	$rpwd=$_GET['rpwd'];
	$rrpwd=$_GET['rrpwd'];
	
	mysqli_query($bank,"INSERT INTO acc_detail(cust_id,username,password,name,acc_no) VALUES('$rid','$rusr','$rpwd','$rname','$racct')");
	
	header('location: index.php');
}
?>
<!DOCTYPE html>
<head>
	<title>E-Banking</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
	
	  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!--NAV BAR-->
<img src="./logo.png"></img>
<ul class="topnav">
  <li><a href="#">HB|Banking</a></li>
  <li><a href="./e-bank.php" class="w3-bar-item w3-button w3-red"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="#" class="w3-bar-item "><i class="fa fa-id-card-o"></i> My Account</a></li>
  <li><a href="./trans.php" class="w3-bar-item w3-button"><i class="fa fa-shield"></i> Transcations</a></li>
  <li><a href="#" class="w3-bar-item w3-button"><i class="w3-green fa fa-money"></i> Finance</a></li>
  
<li class="right"><a href="./index.php" class="w3-bar-item w3-button w3-orange"><i class="fa fa-user-circle-o"></i>Netbanking</a></li>
</ul>	
<marquee style="background: rgb(255, 204, 204);
    color: rgb(116, 54, 0);" width="auto" direction="left" height="20px">
        <p><b>HB-Banking never asks for your Card/PIN/OTP/CVV details on phone, message or email. Please do not click on links received on your email or mobile asking your Bank/Card details. &nbsp;&nbsp;|&nbsp;&nbsp;  Dear Customer Login to our Website to avail business banking services.</b></p>
    </marquee>
<!--CONTENT-->
  <div class="w3-container">
    <h3>Welcome to <b style='color:orange;'>HB-Banking</b></h3>
  </div>
	<hr>
 <!--features of banking--->
  <div class='w3-container'>
    <h2 style='color:orange;'>Features</h2>
  </div>
  <div class='w3-container'>
  <div class='w3-half'>
    <ul>
      <li>Mobile banking</li>
      <li>SMS Alerts</li>
      <li>Inter-Net banking
        M-payment</li>
      <li>HB Bank Anywhere.</li>
      <li>Quick Missed call facility.</li>
      <li>First 10 cheque leaves free in a financial year.</li>
      <li>No limit on Maximum balance</li>
    </ul>
  </div>
<div class='w3-half'>
<ul>
    <li>A Pass Book is issued to record the transactions.</li>
    <li>Duplicate pass book can be issued if original is lost, on payment of charges. Statement of accounts can also be sent through e-mail.</li>
    <li>Free Consolidated Account Statement.</li>
    <li>The facility of transfer of accounts through Internet Banking channel.</li>
    <li>Nomination facility is Available
      Monthly Average Balance: NIL</li>
    </ul>
  </div>
  </div>
  <!--features end-->
  <br>
  <br>
  <!--NEW ACCOUNT--->
  <div class='w3-container w3-card-4 w3-round wdth'>
    <h1>Open A New <b style='color:orange;'>Saving Account</b></h1>
    <div class='w3-center'>
      <i class="material-icons" style="font-size:70px;color:orange;">account_box</i><br>
    <h3>Dcouments Required</h3> <br>
      <ul>
        <li>(a) Proof of identity (any of the following with authenticated photographs thereon): (i) Passport. (ii) Voter ID card. (iii) PAN Card. (iv) Govt./Defence ID card.</li>
<li>(b) Proof of current address (any of the following) (i) Credit Card Statement. (ii) Salary slip. (iii) Income/Wealth Tax Assessment Order.</li>
        </ul>
      <a href='/bank/new_account/'><button class='w3-button w3-round w3-orange' ><b style='color:white;' >APPLY NOW</b></button></a>
      <br> <br>
    </div>
    </div>
<!--LOGIN/REGISTER FORM-->
	<div class="w3-center">
		<div class="w3-container">
					<i class="material-icons" style="font-size:60px;color:green">account_circle</i>
					<h3>Dear customer, Please login to continue.</h3><hr>
					<form class="w3-container w3-center" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
						<label>Username</label><br>
						<input class="w3-input w3-round" placeholder="Your Username" name="usr" type="text" required></input><br>
						<label>Password</label><br>
						<input class="w3-input w3-round" placeholder="Your Password" name="pwd" type="password" required></input><br><br>
						<button class="w3-button w3-blue w3-round" name="submit" value="submit">Login</button><br>
					</form>
		</div>	
	</div>



</div>
<!--FOOTER-->
<div class="w3-center w3-container" style="margin-top: 100px;">
		<hr  style="margin-top: 100px;">
    <span><b>IMPORTANT:</b> Our bank never ask for your user id / password / pin no. through phone call / SMSes / e-mails. Any such phone call / SMSes / e-mails asking you to reveal credential or One Time Password through SMS could be attempt to withdraw money from your account.NEVER share these details to anyone. Our Banks wants you to be secure. If you come across any such instances please inform us through e-mail to the following address- hb@banking.com </span><br>
	
	<a href="https://home.imvks.rf.gd//bank/"><img style="height:30px;" src="/img/bank_logo.png"></img>
	<a href="https://home.imvks.rf.gd//store/"><img style="height:30px;" src="/img/store_logo.png"></img><BR>
    <p style="color:gray;">&copy; HB|Team 2020-2021</p>

</div>	
<!--FOOTER ENDS-->
<style>
div li{
  position: relative
  font-family: Arial
  font-size: 16px
  margin: 10px
}
.wdth{
  display: flex;
  justify-content: center;
    align-items: center;
  text-align: center;

}
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
