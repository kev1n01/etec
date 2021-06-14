<?php
$idProducto = $_POST["id_producto"];
$idcliente = $_POST['id_cliente'];
$sitio = $_GET["Site"];


if ($sitio == "verCarrito") {
    $conn = mysqli_connect("localhost", "root", "Ggnoobsdemrd2001", "etec");
    $sql = "DELETE from carrito where id_producto=$idProducto";
    $Resulta = mysqli_query($conn, $sql);
    header("Location: verCarrito.php");
} else {
    $conn = mysqli_connect("localhost", "root", "Ggnoobsdemrd2001", "etec");
    $sql = "DELETE from carrito where id_producto=$idProducto";
    $Resulta = mysqli_query($conn, $sql);

    header("Location: index.php?ID=$idcliente");
}
