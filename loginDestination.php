<?php
	session_start();
	$conn = mysqli_connect("localhost","root","Ggnoobsdemrd2001","etec");
		if(!$conn)
			{
				die("Connection Failed" . mysqli_connect_error());
			}
	$_un = $_POST['Username'];
	$_pass = $_POST['Password'];
	$_Role = $_GET['Role'];
	
		$query = "SELECT * FROM `clientes` WHERE `Username` = '".$_un."' and `Password` = '".$_pass."' and `rol` = '".$_Role."'";
		$res = mysqli_query($conn,$query);
			if($res===false)
				{
					die("Error" . mysqli_error($conn));
				}
		$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
		// $ID=$row[0];
		$r = $row["idclientes"];
		
			if($row)
				{
					if($_Role == "User")
					{
					$_SESSION["Username"] = $_un;
					$_SESSION["Password"] = $_pass;
					// $_SESSION["ID"] = $ID;
					// $_SESSION[$r]=$ID;
					echo "<script>window.open('index.php?ID=$r','_self',null,true)</script>";
					// header('Location: index.php?ID=echo $r');
					die("Logged in");
					}
					else if($_Role == "Admin")
					{	$_SESSION['Admin'] = "Logged";
						echo "<script>window.open('Management_Orders.php','_self',null,true)</script>";
					}
				}
			else
				{
					echo "<script>alert('Usuario o contraseña incorrectos');
					window.open('login.php?Role=User','_self',null,true);</script>";
					
				}
?>

