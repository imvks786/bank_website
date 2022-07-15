<?php
session_start();
if(!isset($_SESSION['usr_acc'])){
	header('location: index.php');
}
unset($_SESSION['usr_acc']);
header('location: index.php');

?>