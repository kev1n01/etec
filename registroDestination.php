<?php
	
	require 'Connection.php';
	
	$ActionType = $_GET['ActionType'];
	$Location = $_GET["Loc"];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$nombres = $_POST['Nombres'];
	$apellidos = $_POST['Apellidos'];
	$dni = $_POST['Dni'];
	$email = $_POST['Email'];
	$celular = $_POST['Celular'];

	$sqlid = "SELECT idclientes FROM clientes";
	$ID = mysqli_query($Conn,$sqlid);

	if(empty($Username) || empty($Password) || empty($nombres) || empty($apellidos) || empty($dni) || empty($celular) || empty($email))
	{
		echo '<script>window.alert("Cannot leave the page blank"); window.open("register.php","_self",null,true);</script>';
	}
	else
	{
		if($ActionType == "Register")
		{
			$sql = "INSERT INTO `clientes`(`nombres`,`apellidos`,`Username`, `Password`, `rol`,`dni`, `email`, `celular`)" .
					" VALUES ('$nombres','$apellidos','$Username','$Password','User','$dni','$email','$celular')";
			$res = mysqli_query($Conn,$sql);
			if(!$res)
			{
				echo "Failed " . mysqli_connect_error();
			}else
			{
				echo '<script>window.alert("Registro Completado Por favor Ingresar"); 
						window.open("login.php?Role=User","_self",null,true);</script>'; 
			}
		}
		else
		{
			$ID = $_GET['ID'];
			$sqlI = "UPDATE `clientes` SET `Username`='$Username',`Password`='$Password',`nombres`='$nombres'," .
			"`apellidos`='$apellidos',`dni`='$dni',`celular`='$celular',`email`='$email' WHERE idclientes = $ID";
			$res = mysqli_query($Conn,$sqlI);
			if(!$res)
			{
				echo "Failed " . mysqli_connect_error();
			}else
			{	
				// if($Location == "MA"){
				echo "<script>window.open('index.php?ID=$ID','_self',null,true);</script>";
				// }
				// else if($Location == "MC"){
				// echo '<script>window.open("Management_Customers.php","_self",null,true);</script>';}
			}
		}
		
	}

?>















