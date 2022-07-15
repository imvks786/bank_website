<?php 

session_start();

include_once '../bank_config.php';



if(isset($_SESSION['reg_usr'])){

    $usr=$_SESSION['reg_usr'];

}

    $r=mysqli_query($bank,"SELECT acc_no FROM `acc_detail` WHERE username='$usr' ");

    if(mysqli_num_rows($r) > 0) {

     $row = mysqli_fetch_assoc($r);

     $acc_no=$row['acc_no'];

    }

if (isset($_POST['change'])){

    $npin=$_POST['pin'];

    $usr=$_SESSION['reg_usr'];





    //UPDATE PIN

    mysqli_query($bank,"UPDATE acc_detail SET pin=$npin WHERE username='$usr' ");



    // Free result set

    mysqli_free_result($r);

    mysqli_close($bank);

    header('location: ./finish.php');

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

</div>

	

	<hr>

	<!--NEW ACCOUNT FORM-->

		<div class="w3-container">

			<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

                <div class='w3-card-4 w3-round w3-container'>

                    <h3>Your Account Number is:<b style='color:orange;'> <?php echo $acc_no; ?></b></h3>

                    <h3>Your Username is:<b style='color:orange;'> <?php echo $usr; ?></b></h3>

                    <h1 style='text-align:center;color:orange;'>Change Your PIN</h1><hr>



                    <label>New PIN:</label><br>

                    <input class="w3-input w3-round" placeholder="4-Digit PIN" name="pin" type="number" max-length='4' required></input><br><br>

                    <div class='w3-center'>

                        <button class="w3-button w3-orange w3-round" name="change" value="change">Change PIN</button><br><br><br>

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

