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
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		 <?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
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
						<?php if($Username == null){echo '<li><a href="registro.php?ActionType=Register "><i class="fa fa-user-circle"></i>Registrarme</a></li>';} ?>
						<?php if($Username == null){echo '<li><a href="login.php?Role=User"><i class="fa fa-user-circle-o"></i>Iniciar sesion</a></li>';} else {echo '<li><i class="fa fa-sign-in"></i><a href="Logout.php">Salir</a></li>';} ?>

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
									<img src="./img/logo.png" alt="">
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
												<?php $conn = mysqli_connect("localhost","root","Ggnoobsdemrd2001","etec");
												$sql = "SELECT * FROM categoria";
												$Resulta = mysqli_query($conn,$sql);
												while($Rows = mysqli_fetch_array($Resulta)){
												echo '
													<option value="'.$Rows[0].'">'.$Rows[1].'</option>
													';}?>
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
										<span>Tus deseos</span>
										<div class="qty">0</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Tu carrito</span>
										<div class="qty">0</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<!-- <div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div> -->
										</div>
										<!-- <div class="cart-summary">
											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div> -->
										<div class="cart-btns">
											<a href="#">Ver carrito</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
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
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="store.php">Tienda</a></li>
						<li><a href="Categorias.php">Categorias</a></li>
						<li><a href="Laptops.php">Laptops</a></li>
						<li><a href="Smartphone.php">Smartphones</a></li>
						<li><a href="Camaras.php">Cámaras</a></li>
						<li><a href="Accesorios.php">Accesorios</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Dirección de Envio</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="nombre" placeholder="Nombres">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="apellido" placeholder="Apellidos">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Correo Electrónico">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="direccion" placeholder="Dirección">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="ciudad" placeholder="Ciudad">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="distrito" placeholder="Distrito">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="provincia" placeholder="Provincia">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="Código zip">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telefono">
							</div>
						
						</div>
						<!-- /Billing Details -->

						
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Notas"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Tu lista de pedido</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCTO</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<div class="order-col">
									<div>Producto 1</div>
									<div>S/. 100.00</div>
								</div>
								<div class="order-col">
									<div>Producto 2</div>
									<div>S/. 80.00</div>
								</div>
							</div>
							<div class="order-col">
								<div>Envio</div>
								<div><strong>GRATIS</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">S/. 180.00</strong></div>
							</div>
						</div>
						<div class="payment-method">
						<div class="section-title text-center">
									<h3 class="title">Método de Pago</h3>
								</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Transferencia bancaria
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Yape
								</label>
								<div class="caption">
									<form action="" method="post">
										<input  class="input" type="text" placeholder="Envie el pago total a este número: 933835965" disabled>
										<hr>
										<input  class="input" type="text" placeholder="Ingrese su número de celular">
									</form>
									<p>Verificaremos su pago identificando su número de celular </p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-3">
									<span></span>
									Agora
								</label>
								<div class="caption">
									<form action="" method="post">
									<input  class="input" type="text" placeholder="Envie el pago total a este número: 933835965" disabled>
									</form>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-4">
									<span></span>
									Paypal 
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								He leído y acepto los <a href="#">términos y condiciones.</a>
							</label>
						</div>
						<a href="#" class="primary-btn order-submit"> Realizar pedido</a>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Regístrese para <strong>MÁS INFORMACIÓN</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Suscribir</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="https://www.facebook.com/E-TEC-108746421042930/"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-whatsapp"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Nosotros</h3>
								<p>Somos una empresa de comercialización de herramientas electronicos necesarios para el dia a dia</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Jr. Hullayco 1244</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+51 933835965</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>etec@gmail.com</a></li>
								</ul>		
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
							<h3 class="footer-title">Categorias</h3>
								<ul class="footer-links">
									<li><a href="#">Mejores ofertas</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Camaras</a></li>
									<li><a href="#">Accesorios</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
							<h3 class="footer-title">Información</h3>
								<ul class="footer-links">
									<li><a href="#">Nosotros</a></li>
									<li><a href="#">Contactenos</a></li>
									<li><a href="#">Politica privacidad</a></li>
									<li><a href="#">Pedidos y Devoluciones</a></li>
									<li><a href="#">Terminos y condiciones</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
							<h3 class="footer-title">Servicios</h3>
								<ul class="footer-links">
									<li><a href="#">Mi cuenta</a></li>
									<li><a href="#">Ver carrito</a></li>
									<li><a href="#">Lista de deseos</a></li>
									<li><a href="#">Seguimiento de mi pedido</a></li>
									<li><a href="#">Ayuda</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<p>
								<?php echo '<strong>'.$Username.'</strong>'; ?><br>
								<strong>
									<?php //if($Username != null){echo '<a href="ManageAccount.php?Role=User">Manage Account</a> |';} ?> 
									<?php if($Username == null){echo '<a href="login.php?Role=User">Ingresar</a>';} else {echo '<a href="Logout.php">Salir</a>';} ?> | 
									<a href="#">Volver al inicio</a>
								</strong>
								<p>
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Tienda Online de <a href="index.php" target="_blank">Etec</a>
								</p> 
							</p>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
