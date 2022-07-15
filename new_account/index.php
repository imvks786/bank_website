<?php 
session_start();
include_once '../bank_config.php';
if(isset($_SESSION['reg_usr'])){
	header('location: ../e-bank.php');

}

if (isset($_POST['reg'])){
    
    $fname=$_POST['fname'];
    $gen=$_POST['gen'];
	$dob=$_POST['dob'];
	$m_status=$_POST['m_status'];
	$f_m_name=$_POST['f_m_name'];
	$g_name=$_POST['g_name'];
	$nation=$_POST['nation'];
	$email=$_POST['email'];
	$rusr=$_POST['rusr'];
    $rpwd=$_POST['rpwd'];
    
    //ACCOUNT DATA TABLE
	mysqli_query($bank,"INSERT INTO acc_data(fname,gen,dob,m_status,f_m_name,g_name,nation,rusr,pwd,email) VALUES('$fname','$gen','$dob','$m_status','$f_m_name','$g_name','$nation','$rusr','$rpwd','$email')");
	
    $r=mysqli_query($bank,"SELECT cust_id FROM `acc_data` WHERE rusr='$rusr'");
    if(mysqli_num_rows($r) > 0) {
     $row = mysqli_fetch_assoc($r);
     $c_id=$row['cust_id'];
    }
    $pin=rand(1111,9999);

    //ACCOUNT DETAILS
    mysqli_query($bank,"INSERT INTO acc_detail(cust_id,username,password,pin,name,total_bal) VALUES($c_id,'$rusr','$rpwd',$pin,'$fname',0.0)");

    $_SESSION['reg_usr']=$rusr;
    // Free result set
    mysqli_free_result($r);
    mysqli_close($bank);
    ?>
    <script>
          location.replace("./change.php")
    </script>
    <?php
}
?>
<!DOCTYPE html>
<head>
	<title>New Account</title>
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
<div class="w3-container">
	<h3>Welcome to HB-Banking,</h3>
	<p>Let's Open New Account.</p>
</div>
	
	<hr>
	<!--NEW ACCOUNT FORM-->
		<div class="w3-container">
			<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                <div class='w3-card-4 w3-round w3-container'>
                <h1 style='text-align:center;color:orange;'>Some Basic Details</h1><hr>
                <label>Full Name:</label><br>
                <input class="w3-input w3-round" placeholder="Enter your name" name="fname" type="text" required></input><br>

                <label>Gender:</label><br>
                <input class="w3-radio" name="gen" type="radio" value='M' required>  MALE</input><br>
                <input class="w3-radio" name="gen" type="radio" value='F' required>  FEMALE</input><br>
                <input class="w3-radio" name="gen" type="radio" value='O' required>  OTHER</input><br><br>

                <label>Date of Birth:</label><br>
                <input class="w3-input w3-round" placeholder="DOB" name="dob" type="date" required></input><br>

                <label>Marital Status:</label><br>
                <input class="w3-radio" name="m_status" type="radio" value='YES' required>  YES</input><br>
                <input class="w3-radio" name="m_status" type="radio" value='NO' required>  NO</input><br><br>

                <label>Name of Father/Mother:</label><br>
                <input class="w3-input w3-round" placeholder="Father's/Mother's Name" name="f_m_name" type="text" required></input><br>

                <label>Name of Guardian:</label><br>
                <input class="w3-input w3-round" placeholder="Guardian Name" name="g_name" type="text" required></input><br>

                <label>Nationality:</label><br>
                <input class="w3-input w3-round" placeholder="Choose Nationality" name="nation" type="text" required></input><br>
                </div><br><br>
                <div class='w3-card-4 w3-round w3-container'>
                <h1 style='text-align:center;color:orange;'>Few more Details</h1><hr>

                <label>Email ID:</label><br>
                <input class="w3-input w3-round" placeholder="ABC@IMVKS.COM" name="email" type="email" required></input><br>

                <label>Username</label><br>
                <input class="w3-input w3-round" placeholder="Choose username" name="rusr" type="text" required></input><br>

                <label>Password:</label><br>
                <input class="w3-input w3-round" placeholder="Choose password" name="rpwd" type="password" required></input><br>
                <label>Re-enter Password:</label><br>
                <input class="w3-input w3-round" placeholder="Re-enter password" name="rrpwd" type="password" required></input><br><br>

                <!---TERMS--->
                <input type='checkbox' class='w3-check' required /><label>&nbsp;&nbsp; I am not a minor.</label><br>

                <input type='checkbox' class='w3-check' required /><label>&nbsp;&nbsp; I am a resident Indian.</label><br>
 
                <input type='checkbox' class='w3-check' required /><label>&nbsp;&nbsp; I am not a politically exposed person.</label><br>
  
                <input type='checkbox' class='w3-check' required /><label>&nbsp;&nbsp; I am not an exisiting customer.</label><br>
        
                <input type='checkbox' class='w3-check' required /><label>&nbsp;&nbsp; I am not Lunatic, Blind or illiterate person.</label><br>
                <!--end of terms-->

                <br>
                <div class='w3-center'>
                <button class="w3-button w3-orange w3-round" name="reg" value="reg">Open my account</button><br><br><br>
                </div>
                </div>
             </form>
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
