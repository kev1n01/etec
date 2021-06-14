<?php
$idcliente = $_POST['id_cliente'];
$idProducto = $_POST["id_producto"];
// if (!isset($_POST["id_producto"])) {
//     echo "<scrip>alert('Error papi')</script>";
// } else {

$conn = mysqli_connect("localhost", "root", "Ggnoobsdemrd2001", "etec");
$sql = "INSERT INTO carrito(idcliente, id_producto) VALUES ($idcliente,$idProducto)";
$Resulta = mysqli_query($conn, $sql);
header("Location: index.php?ID=$idcliente");
