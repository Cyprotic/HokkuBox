<!DOCTYPE html>
<?php 
    include("config/config.php");
    error_reporting(0);
?>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body class="animsition">

	<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="index.php" class="logo">
			<img src="images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="index.php">Home</a>
					</li>
				
                    
                    <li>
						<a href="promocao.php">Promoção</a>
					</li>

					<li>
						<a href="about.php">Sobre</a>
					</li>

					<li>
						<a href="contact.php">Contactos</a>
					</li>
				</ul>
			</nav>
		</div>
        
        
		<!-- Header Icon -->
		<div class="header-icons">
			<div class="header-wrapicon2" >
                <span  class="topbar-email">
                    <?php
                        session_start();
                    
                        if($stmt = $mysqli->prepare("SELECT first_name, last_name FROM client WHERE id_client=?")) {
                            $mysqli->set_charset('utf8mb4');
                            $stmt->bind_param("i", $_SESSION['id_client']);
                            $stmt->execute();
                            $stmt->store_result();
                            $stmt->bind_result($first_name, $last_name);
                            $stmt->fetch();
                            echo $first_name.' ', $last_name;
                        } else {
                            echo "ERROR";
                        }
                    ?>
                </span>
                
				<img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
                    <?php 
                        session_start();
                        if ($_SESSION['user'] == "") {
                            // session isn't started
                            echo '<form id="login-form" action="auth.php" method="POST">
                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <div class="bo4 of-hidden size15 m-b-20">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" id="user" type="text" name="user" placeholder="Username">
                                </div>
                                <button class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" type="submit">
                                    Login
                                </button>
                            </div>
                            <div class="header-cart-wrapbtn">
                                <div class="bo4 of-hidden size15 m-b-20">
                                    <input id="password" type="password" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="password" placeholder="Password">
                                </div>
                                <!-- Button -->
                                <a href="register.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Register
                                </a>
                            </div>
                        </div>
                    </form>';
                        }
                    else
                    {
                        
                        echo'<a href="signout.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" >
                            Logout
                        </a>';
                    }
                        
                    ?>
				</div>
			</div>
            
			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span id="target" class="header-icons-noti">0</span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/nigiri.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nigiri salmão (4p)
										</a>

										<span class="header-cart-item-info">
											1 x 2.99€
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/sashimi.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Sashimi (6 p)
										</a>

										<span class="header-cart-item-info">
											1 x 1.99€
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/original_bento.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Original Bento
										</a>

										<span class="header-cart-item-info">
											1 x 5.99€
										</span>
									</div>
								</li>
							</ul>
                        

					<div class="header-cart-total">
						Total: 10.97€
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
				</div>

				<!-- Logo2 -->
				<a href="index.html" class="logo2">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<div class="topbar-child2">
					<span class="topbar-email">
						<?php
                        session_start();
                    
                        if($stmt = $mysqli->prepare("SELECT first_name, last_name FROM client WHERE id_client=?")) {
                            $mysqli->set_charset('utf8mb4');
                            $stmt->bind_param("i", $_SESSION['id_client']);
                            $stmt->execute();
                            $stmt->store_result();
                            $stmt->bind_result($first_name, $last_name);
                            $stmt->fetch();
                            echo $first_name.' ', $last_name;
                        } else {
                            echo "ERROR";
                        }
                    ?>
					</span>

					<!--  -->
					<a class="header-wrapicon1 dis-block m-l-30">
						<img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					
                    

					<span class="linedivide1"></span>

					<div class="header-wrapicon2 m-r-13">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
                        
				</div>
			</div>

			<div class="wrap_header">

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="index.php">Home</a>
							</li>

                            <li>
                                <a href="promocao.php">Promoção</a>
                            </li>

							<li>
								<a href="about.php">Sobre</a>
							</li>

							<li>
								<a href="contact.php">Contactos</a>
							</li>
						</ul>
					</nav>
				</div>

				
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>
                        
						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								eva@ishot.com
							</span>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.php">Home</a>
					</li>

                    <li class="item-menu-mobile">
						<a href="about.php">Promoção</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.php">Sobre</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.php">Contactos</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/fundo2.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
							
						</h2>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
							
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
                            <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">	
							</a>
							<a class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">	
							</a>
                            <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
                            <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/fundo1.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
                            <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">	
							</a>
							<a class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">	
							</a>
                            <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
                            <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
                        <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
                        <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
                        <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
                        <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
                        <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
                        
						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="lightSpeedIn">
							Descubra as nossas ofertas
						</span>
                            <a  class="flex-c-m size2 bo-rad-24 s-text2   trans-0-4">
							</a>
						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="promocao.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Descubra já
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




	<!-- Our product -->
	<section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Os nossos produtos
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#featured" role="tab">Veggie</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Quentes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Sushi</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-35">
					<!-- - -->
					<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
						<div class="row">
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative ">
										<img src="images/maki.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a class="block2-name dis-block s-text3 p-b-5">
											Maki salmão (4p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											3.99€
										</span>
									</div>
								</div>
							</div>


							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<img src="images/nigiri.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button onclick="incrementValue()" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a class="block2-name dis-block s-text3 p-b-5">
											Nigiri salmão (4p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											2.99€
										</span>
									</div>
								</div>
							</div>

							

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<img src="images/gunkan.jpg" alt="IMG-PRODUCT"height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a class="block2-name dis-block s-text3 p-b-5">
											Gunkan maki (2p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											2.99€
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<img src="images/temaki.jpg" alt="IMG-PRODUCT"height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a class="block2-name dis-block s-text3 p-b-5">
											Temaki (1p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											1.99€
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- - -->
					<div class="tab-pane fade" id="featured" role="tabpanel">
						<div class="row">
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative ">
										<img src="images/maki_aipo.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Maki aipo (4p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											3.99€
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative ">
										<img src="images/maki_ovo.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Maki ovo (4 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											3.99€
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative ">
										<img src="images/maki_espinafre.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Maki Espinafres (2 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											2.99€
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<img src="images/uramaki_veggie.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Urumaki Veggie (4 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											3.99€
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--  -->
					<div class="tab-pane fade" id="sale" role="tabpanel">
						<div class="row">
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative ">
										<img src="images/hot_shrimp.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Camarão quente (6 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											4.99€
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative ">
										<img src="images/tempura.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Tempura camarão (4 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											3.99€
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative ">
										<img src="images/foie_gras.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Foie gras (4 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											5.99€
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative ">
										<img src="images/tempura_gimbap.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Tempura gimbap (4 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											3.99€
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--  -->
					<div class="tab-pane fade" id="top-rate" role="tabpanel">
						<div class="row">
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative ">
										<img src="images/nigiri_atum.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Nigiri atum (4 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											2.99€
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<img src="images/ebi.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Ebi (4 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											2.99€
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<img src="images/sashimi.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											Sashimi (6 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											1.99€
										</span>
									</div>
								</div>
							</div>

							

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative ">
										<img src="images/california_rolls.jpg" alt="IMG-PRODUCT" height="270" width="270">

										<div class="block2-overlay trans-0-4">
											

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											California rolls (4 p)
										</a>

										<span class="block2-price m-text6 p-r-5">
											3.99€
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner video -->
	<section class="parallax0 parallax100" style="background-image: url(images/fundo3.jpg);">
		<div class="overlay0 p-t-190 p-b-200">
			<div class="flex-col-c-m p-l-15 p-r-15">
				<span class="m-text9 p-t-45 fs-20-sm">
					uma caixa que 
				</span>

				<h3 class="l-text1 fs-35-sm">
				    não vai querer partilhar
				</h3>

				
			</div>
		</div>
	</section>

	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Combinados
				</h3>
			</div>

			<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-img wrap-pic-w of-hidden pos-relative ">
                <img src="images/veggie_bento.jpg" alt="IMG-PRODUCT" height="220" width="270">

                <div class="block2-overlay trans-0-4">


                    <div class="block2-btn-addcart w-size1 trans-0-4">
                        <!-- Button -->
                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="block2-txt p-t-20">
                <a class="block2-name dis-block s-text3 p-b-5">
                    Veggie Bento
                </a>

                <p class="block2-price m-text6 p-r-5">
                    12€
                </p>
                <p class="s-text8 p-t-16">
                    Uma caixa vegetariana, para quem gosta de se sentir leve.
                </p>
            </div>
            
        </div>
    </div>


    <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                <img src="images/fish_bento.jpg" alt="IMG-PRODUCT" height="220" width="270">

                <div class="block2-overlay trans-0-4">


                    <div class="block2-btn-addcart w-size1 trans-0-4">
                        <!-- Button -->
                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="block2-txt p-t-20">
                <a class="block2-name dis-block s-text3 p-b-5">
                    Fish Bento
                </a>

                <p class="block2-price m-text6 p-r-5">
                    9.99€
                </p>
                <p class="s-text8 p-t-16">
                    A nossa caixa de Nigiri, para quem gosta de escolher e levar o seu peixe preferido para qualquer lado.
                </p>
            </div>
        </div>
    </div>



    <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                <img src="images/original_bento.jpg" alt="IMG-PRODUCT" height="220" width="270">

                <div class="block2-overlay trans-0-4">


                    <div class="block2-btn-addcart w-size1 trans-0-4">
                        <!-- Button -->
                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="block2-txt p-t-20">
                <a class="block2-name dis-block s-text3 p-b-5">
                    Original Bento
                </a>

                <p class="block2-price m-text6 p-r-5">
                    5.99€
                </p>
                <p class="s-text8 p-t-16">
                    Uma caixa original para quem segue as regras.
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                <img src="images/hot_bento.jpg" alt="IMG-PRODUCT"height="220" width="270">

                <div class="block2-overlay trans-0-4">


                    <div class="block2-btn-addcart w-size1 trans-0-4">
                        <!-- Button -->
                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="block2-txt p-t-20">
                <a class="block2-name dis-block s-text3 p-b-5">
                    Hot Bento
                </a>

                <p class="block2-price m-text6 p-r-5">
                    9.99€
                </p>
                <p class="s-text8 p-t-16">
                    A nossa caixa quentinha, para quem não quer peixe naquele dia.
                </p>
            </div>
        </div>
    </div>
</div>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2019 All rights reserved. | This template is designed by Eva Falcão <i class="fa fa-heart-o" aria-hidden="true"></i>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/Nt8ZrWY2Cmk?rel=0&amp;showinfo=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <script type="text/javascript">
         function incrementValue()
        {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number').value = value;
        }
            </script>

        };

</body>
</html>
