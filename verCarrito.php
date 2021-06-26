<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>ETEC</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/favi.ico" type="image/x-icon">

    <?php
    $Username = null;
    if (!empty($_SESSION["Username"])) {
        $Username = $_SESSION["Username"];
    }

    $ID = null;
    if (!empty($_GET['ID'])) {
        $ID = $_GET['ID'];
    }
    ?>
</head>


<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +51 933835965</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> etec@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Jr. Hullayco 1244</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <!-- <li><a href=""><i class="fa fa-dollar"></i> USD</a></li> -->
                    <!-- onclick="actionEdit("Edit",$ID)" -->
                    <?php if ($Username == null) {
                        echo '<li><a href="registro.php?ActionType=Register "><i class="fa fa-user-circle"></i>Registrarme</a></li>';
                    } ?>
                    <?php if ($ID != null) {
                        echo '<li><a href="registro.php?ActionType=Edit&ID=' . $ID . '"><i class="fa fa-cog"></i>Editar mis datos</a></li>';
                    } ?>
                    <?php if ($Username == null) {
                        echo '<li><a href="login.php?Role=User"><i class="fa fa-user-circle-o"></i>Iniciar sesion</a></li>';
                    } else {
                        echo '<li><i class="fa fa-sign-in"></i><a href="Logout.php">Salir</a></li>';
                    } ?>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->
        <!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php" class="logo">
								<img src="./img/logo.png">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<select class="input-select">
									<option value="0">Categorias</option>
									<?php $conn = mysqli_connect("localhost", "root", "Ggnoobsdemrd2001", "etec");
									$sql = "SELECT * FROM categoria";
									$Resulta = mysqli_query($conn, $sql);
									while ($Rows = mysqli_fetch_array($Resulta)) {
										echo '
										<option value="' . $Rows[0] . '">' . $Rows[1] . '</option>
									';
									} ?>
								</select>
								<input class="input" placeholder="Buscar aquí">
								<button class="search-btn">Buscar</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<div>
								<a href="#">
									<i class="fa fa-heart-o"></i>
									<span>Tus Deseos</span>
									<div class="qty">0</div>
								</a>
							</div>
							<!-- /Wishlist -->

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Tu carrito</span>
									<?php
									if ($ID == null) {
											
									} else {
										$conn = mysqli_connect("localhost", "root", "Ggnoobsdemrd2001", "etec");
										$sql = "SELECT COUNT(*) as cont FROM carrito WHERE idcliente=$ID";
										$Resulta = mysqli_query($conn, $sql);
										foreach ($Resulta as $row) {
											$cont = $row["cont"];
										}
									}
									?>

									<div class="qty"><?php if ($ID == null) {
															echo "0";
														} else {
															echo $cont;
														} ?></div>
								</a>
								<?php
								$conn = mysqli_connect("localhost", "root", "Ggnoobsdemrd2001", "etec");
								$sql = "SELECT productos.idproductos, productos.nombre,productos.imgProducto, productos.precio, marca,carrito.idcliente,
									ROUND(productos.precio-(productos.precio*(productos.descuento/100))) as 'precio descuento'
									FROM productos
									INNER JOIN carrito
									ON productos.idproductos = carrito.id_producto INNER JOIN marca ON productos.id_marca_productos = marca.idmarca
									WHERE carrito.idcliente = '$ID'";
								$Resulta = mysqli_query($conn, $sql);

								?>

								<div class="cart-dropdown">
									<div class="cart-list">
										<?php while ($Rows = mysqli_fetch_array($Resulta)) : ?>
											<div class="product-widget">
												<div class="product-img">
													<img src="img/<?php echo $Rows[2]; ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#"><?php echo $Rows[1]; ?></a></h3>
													<h4 class="product-brand"><a href="#"><?php echo $Rows[4]; ?></a></h4>
													<h4 class="product-price"><span class="qty">1x</span>S/.<?php if ($Rows[6] == null) {
																												echo $Rows[3];
																											} else {
																												echo $Rows[6];
																											} ?></h4>
												</div>
												<form action="eliminarCarrito.php" method="post">
													<input type="hidden" name="id_cliente" value="<?php echo $Rows[5]; ?>">
													<input type="hidden" name="id_producto" value="<?php echo $Rows[0]; ?>">
													<button class="delete"><i class="fa fa-close"></i></button>
												</form>
											</div>
										<?php endwhile; ?>
									</div>
									<div class="cart-summary">
										<?php
										

										if ($ID == null) {
											
										} else {
											$conn = mysqli_connect("localhost", "root", "Ggnoobsdemrd2001", "etec");
											$sql = "SELECT COUNT(*) as 'cont', sum(ROUND(productos.precio-(productos.precio*(productos.descuento/100)))) as 'desctotal', sum(productos.precio) as 'totalnodesc'
											FROM productos INNER JOIN carrito ON productos.idproductos = carrito.id_producto 
											WHERE carrito.idcliente = $ID";

											$Resultapre = mysqli_query($conn, $sql);
											foreach ($Resultapre as $row) {
												$totalConDesc = $row["desctotal"];
												$totalSinDesc = $row["totalnodesc"];
												$cont = $row["cont"];
											}
										}
										
										?>
										<small><?php if ($ID == null) {
													echo "0";
												} else {
													if ($cont == null)
														echo "0";
													else
														echo $cont;
												} ?> Item(s) seleccionados</small>
										<h5>
											SUBTOTAL: S/.<?php if ($ID == null) {
																echo "00.00";
															} else {
																if ($totalConDesc == null) {
																	echo $totalSinDesc;
																} else {
																	echo $totalConDesc;
																}
															} ?>
										</h5>
									</div>
									<div class="cart-btns">
										<a href="verCarrito.php?ID=<?php echo $ID; if($cont!=null){ echo "&Row=$cont";}else{echo "0";} ?>" type="submit">Ver carrito</a>

										<a href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>

								</div>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->

    </header>
    
    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="<?php if ($ID == null) {
                                                    echo "index.php";
                                                } else {
                                                    echo "index.php?ID=$ID";
                                                } ?>">Home</a></li>
                    <li><a href="<?php if ($ID == null) {
                                        echo "store.php";
                                    } else {
                                        echo "store.php?ID=$ID";
                                    } ?>">Tienda</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="ayuda.php">Ayuda</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <?php
    $ID = null;
    if (!empty($_GET['ID'])) {
        $ID = $_GET['ID'];
    } 

    $CONT = null;

    if (!empty($_GET['Row'])) {
        $CONT = $_GET['Row'];
    } 
    

    $conn = mysqli_connect("localhost", "root", "Ggnoobsdemrd2001", "etec");
    $sql = " SELECT pro.idproductos, pro.nombre, pro.color,pro.precio,ROUND(pro.precio-(pro.precio*(pro.descuento/100))) as 'preciodescuento',
    pro.stock,pro.imgProducto,c.idcliente
        FROM productos as pro
        INNER JOIN carrito as c
        ON pro.idproductos = c.id_producto
        WHERE c.idcliente=$ID
    ";

    $productos = mysqli_query($conn, $sql);

    if ($CONT == 0) {
    ?>
        <section class="hero is-info">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Tu carrito está vacio¡¡</h1>
                            <h2 class="subtitle">
                                Visita la tienda para agregar productos a tu carrito
                            </h2>
                            <a href="store.php?ID=<?php echo $ID; ?>" class="btn btn-danger">Ir tienda</a>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <div class="col-md-7" style="flex: auto;">
            <div class="columns">
                <div class="column">
                    <h2 class="is-size-2">Mi carrito de compras</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Color</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($productos as $producto) {
                                if ($producto["preciodescuento"] == null) {
                                    $total += $producto["precio"];
                                } else {
                                    $total += $producto["preciodescuento"];
                                }
                            ?>
                                <tr>
                                    <td><img width="100px" src="img/<?php echo $producto["imgProducto"] ?>" alt=""></td>
                                    <td><?php echo $producto["nombre"] ?></td>
                                    <td><?php echo $producto["color"] ?></td>
                                    <td>S/.<?php if ($producto["preciodescuento"] == null) {
                                                echo $producto["precio"];
                                            } else {
                                                echo $producto["preciodescuento"];
                                            } ?></td>

                                    <td><?php echo $producto["stock"] ?></td>
                                    <td>
                                        <form action="eliminarCarrito.php?Site=verCarrito" method="post">
                                            <input type="hidden" name="id_producto" value="<?php echo $producto["idproductos"] ?>">
                                            <input type="hidden" name="id_cliente" value="<?php echo $ID ?>">
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash-o"> Eliminar</i>
                                            </button>
                                        </form>
                                    </td>
                                <?php } ?>
                                </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="is-size-4 has-text-right"><strong>
                                        <h3>Total</h3>
                                    </strong></td>
                                <td colspan="2" class="is-size-4">
                                    <h3>S/.<?php echo $total ?></h3>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <a href="checkout.php?ID=<?php echo $ID; ?>" class="primary-btn order-submit"><i class="fa fa-check"></i>&nbsp;Terminar compra</a>
                </div>
            </div>
        </div>
    <?php }
    ?>


    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="js/funciones.js"></script> -->
    <script src="js/reloj/countdown-timezone/js/countdown.js"></script>
    <script src="js/reloj/countdown-timezone/js/countdown.jquery.js"></script>
</body>

</html>