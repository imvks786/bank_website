<?php 
session_start();
include_once 'bank_config.php';

if(!isset($_SESSION['usr_acc'])){
	header('location: ./index.php');
}

	$usrname=$_SESSION['usr_acc'];
	$r=mysqli_query($bank,"SELECT * FROM acc_detail WHERE username='$usrname'");
	$ro=mysqli_fetch_assoc($r);	
	$bal=$ro['total_bal'];
	$name=$ro['name'];
	$ucid=$ro['cust_id'];
	
if (isset($_POST['pay'])){
	$cid=$_POST['cid'];
	$cname=$_POST['cname'];
	$amt=$_POST['amt'];
	$pfrom=$_POST['pfrom'];
	$mode=$_POST['mode'];
	
	$rcid=$cname.'@'.$cid;
	
	if($cid==$ucid){
	?>
	<script>
		alert('You cannot Pay Yourself.');
	</script>
	<?php
	}
	else{
		$chkid=mysqli_query($bank,"SELECT * FROM acc_detail WHERE cust_id='$cid'");
		if(mysqli_num_rows($chkid)>0){
			if($bal>=$amt){
			mysqli_query($bank,"UPDATE acc_detail SET total_bal=(total_bal-$amt) WHERE cust_id='$ucid'");
			$fbal=mysqli_query($bank,"SELECT * FROM acc_detail WHERE cust_id='$ucid'");
			$row1=mysqli_fetch_assoc($fbal);
			$dbal=$row1['total_bal'];
			mysqli_query($bank,"INSERT INTO pass_book(cust_id,amt_loss,total,to_pay,mode) value('$ucid','$amt','$dbal','$rcid','$mode')");
			
			mysqli_query($bank,"UPDATE acc_detail SET total_bal=(total_bal+$amt) WHERE cust_id='$cid'");
			$check=mysqli_query($bank,"SELECT * FROM acc_detail WHERE cust_id='$cid'");
			$row=mysqli_fetch_assoc($check);
			$tbal=$row['total_bal'];
			mysqli_query($bank,"INSERT INTO pass_book(cust_id,amt_add,total,pfrom,mode) value('$cid','$amt','$tbal','$pfrom','$mode')");	
	
			header('location: ./mpay.php');
			}
			else{
			?>
			<script>
				alert('You have no sufficient Balance to pay.');
			</script>
			<?php
			}
		}
		else{
			?>
			<script>
				alert('Incorrect Customer ID!');
			</script>
			<?php
		}
	}
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!--NAV BAR-->
<img src="./logo.png"></img>
<ul class="topnav">
  <li><a href="#">HB|Banking</a></li>
  <li><a href="./e-bank.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./trans.php" class="w3-bar-item w3-button"><i class="fa fa-shield"></i> Transcations</a></li>
  <li><a href="./mpay.php" class="w3-bar-item w3-button w3-red"><i class="w3-green fa fa-money"></i> Mpay</a></li>
  <li><a href="./usr_logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>
  
  <li class="right" ><a href="./welcome.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['usr_acc']; ?></a></li>
</ul>
<!--CONTENT-->
<div class="w3-container">
	<h3>Welcome to HB-Banking,</h3>
	<p>Let's Start Today Work.</p>
	<div class="w3-center">
		<p style="color:blue">If slowness is observed during Login Page loading, Please refresh the page for better experience.</p>
		<p style="color:blue">HB-Banking never asks for confidential information such as PIN and OTP from customers. Any such call can be made only by a fraudster. Please do not share personal info.</p>
	</div>
	<marquee style="background: rgb(255, 204, 204);
    color: rgb(116, 54, 0);" width="auto" direction="left" height="20px">
        <p><b>HB-Banking never asks for your Card/PIN/OTP/CVV details on phone, message or email. Please do not click on links received on your email or mobile asking your Bank/Card details. &nbsp;&nbsp;|&nbsp;&nbsp;  Dear Customer Login to our Website to avail business banking services.</b></p>
    </marquee>
	<hr>
	<div class="w3-center">
		<h3>Hi <?php echo $name;?>, Your Current Account Balance is <b style="color:green">Rs.<?php echo $bal;?></b></h3>
		<h4>Want to pay money or transfer money to someone's account. Its is easy now just enter the <b>CID</b> and pay to them cashless payment.</h4>
	</div>
	<hr>
</div>
	<div class="bkg" style="height:500px;">

	<div class=" w3-white w3-card-4 w3-round" style="height:auto;width:400px;margin-left:100px;">
	
		<form class="w3-container" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
			<h3 style="font-size:25px;color:Blue"><i class="fa fa-shield"></i> M-PAY|HB-Banking</h3><br>
			<label>Enter CID</label><br>
			<input class="w3-input w3-round" placeholder="Customer ID" name="cid" type="text" required></input><br>
			<label>Reciver Name</label><br>
			<input class="w3-input w3-round" placeholder="Customer Name" name="cname" type="text" required></input><br>
			<label>Amount</label><br>
			<input class="w3-input w3-round" placeholder="Rs.0" name="amt" type="number" required></input><br>
			<input name="mode" value="ONLINE" type="hidden" required></input>
			<input name="pfrom" value="<?php echo $name;?>@<?php echo $ucid;?>" type="hidden" required></input>
			<button class="w3-button w3-green w3-round" name="pay" value="pay">Pay Now</button><br>
			<p>By clicking pay button you have to accept <b>T&C</b> of HB-Banking.</p>
		</form>
	</div>
	

</div>
</div>
<div class="w3-center w3-container" style="margin-top: 100px;">
		<hr  style="margin-top: 100px;">
	<p style="color:gray;">&copy; HB|Team 2020-2021</p>
	<div class="">
	<a href="https://home.imvks.rf.gd//bank/"><img style="height:30px;" src="/img/bank_logo.png"></img>
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
.bkg {
  background-image: url("https://cdn.wallpapersafari.com/94/96/kr6p7a.jpg");
	background-repeat: no-repeat;
}
</style>
</body>
</html>
