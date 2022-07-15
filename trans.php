<?php 
session_start();
include_once 'bank_config.php';

if(!isset($_SESSION['usr_acc'])){
	header('location: ./index.php');
}
else{
	$usrname=$_SESSION['usr_acc'];
	$n=mysqli_query($bank,"SELECT * FROM acc_detail WHERE username='$usrname'");
	$nn=mysqli_fetch_assoc($n);
	$cid=$nn['cust_id'];
	$name=$nn['name'];
	$acc_no=$nn['acc_no'];
	$bal=$nn['total_bal'];

}
?>
<!DOCTYPE html>
<head>
	<title>Transcations</title>
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
  <li><a href="./e-bank.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./trans.php" class="w3-bar-item w3-button w3-red"><i class="fa fa-shield"></i> Transcations</a></li>
  <li><a href="./mpay.php" class="w3-bar-item w3-button"><i class="w3-green fa fa-money"></i> MPay</a></li>
  <li><a href="./usr_logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>
  
  <li class="right" ><a href="#" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['usr_acc']; ?></a></li>
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
		<h3>Hi <?php echo $name;?>, Your Current Account Balance is <b style="color:green">Rs. <?php echo $bal;?></b></h3>
	</div>
<!--Transcations-->
<h3>Your latest transcations are given below:</h3>
<p>Your account no is: <b><?php echo $acc_no;?></b></p>
<p>Your customer ID is: <b><?php echo $cid;?></b></p>
<p></p>
<p></p>
<?php
$sql ="SELECT * FROM pass_book where cust_id='$cid'  ORDER BY trans_id DESC";

if($result=mysqli_query($bank,$sql)){
	if(mysqli_num_rows($result)>0){
		echo "<br>";
		echo "<div class='w3-container'>";
		echo "<table  class='w3-card w3-table-all w3-striped'>";
		   echo "<tr>";
				echo "<th>Credited</th>";
				echo "<th>Debited</th>";
				echo "<th>Total Amount </th>";
				echo "<th>Recived From</th>";
				echo "<th>Paid To</th>";
				echo "<th>Mode</th>";
				echo "<th>Transcation ID</th>";
				echo "<th>Time</th>";
			echo "</tr>";
			
			while($row=mysqli_fetch_array($result)){
			
			echo "<tr class='w3-center w3-hover-blue'>";
				echo "<td><p style='color:green'>".$row["amt_add"]."</p></td>";
				echo "<td><p style='color:red'>".$row["amt_loss"]."</td>";
				echo "<td>".$row["total"]."</td>";
				echo "<td><p style='color:green'>".$row["pfrom"]."</p></td>";
				echo "<td><p style='color:red'>".$row["to_pay"]."</p></td>";
				echo "<td><p style='color:blue'>".$row["mode"]."</p></td>";
				echo "<td>".$row["trans_id"]."</td>";
				echo "<td>".$row["time"]."</td>";
			}
		echo "</table>";
		 mysqli_free_result($result);
		echo "</div>";
	}
	else{
		echo "<div class='w3-container w3-center'><h3>No Transcations Founds !</h3></div>";
	}
}
mysqli_close($bank)

?>







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
</style>
</body>
</html>