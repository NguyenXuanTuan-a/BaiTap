<?php
error_reporting(0);
	$host = "localhost";
	$user = "root";
	$password = "080720";
	$datbase = "projectweb";
	$con= mysqli_connect($host,$user,$password);
	mysqli_select_db($con,$datbase);
	mysqli_set_charset($con,"utf8");
	session_start();
	$img ="/phpeComPart18/media/product/";
?>