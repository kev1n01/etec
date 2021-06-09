<?php
	session_start();
	$_SESSION["Username"] = null;
	header('Location: index.php');
	// echo "<script>window.open('index.php','_self',null,true)</script>";
?>

